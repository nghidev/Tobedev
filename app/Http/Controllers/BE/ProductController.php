<?php

namespace App\Http\Controllers\BE;

use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public $path = 'images/product';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','DESC')->paginate(5);
        // dd(DB::table('products')->paginate(2));
        return view('be.product.index', ['products'=>$products, 'pagination' => DB::table('products')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return view('be.product.createbook', ['cats'=>$cats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //dd($request->file('product_galleries'));
        //dd($path);
        //
        $rules = [
            'code' => 'unique:products|required|max:10',
            'name' => 'required'
        ];
        
        $messages = [
            'code.required' => 'Mã sách không được bỏ trống !',
            'code.max' => 'Trường này chỉ tối đa 6 ký tự',
            'name.required' => 'Tên sách không được bỏ trống!'
        ];

        $request->validate($rules);
        //$request->validate($rules, $messages);

        
        $file = $request->file('feature_image');
        $file_name  = $file->getClientOriginalName();
        //$file_type  = $file->getClientOriginalExtension();
        $filename = uniqid().'-'.$file_name;
        $file->storeAs('public/images/product', $filename);
        
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->code = $request->code;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->detail = $request->detail;
        $product->real_price = $request->real_price;
        $product->sale_price = $request->sale_price;

        $product->feature_image = $filename;
        
        $product->inventory_number = $request->inventory_number;
        $product->save();


        //Add product_galleries

        $file_product_galleries = $request->file('product_galleries');
        foreach($file_product_galleries as $fileItem){
            $fileItem_name  = $fileItem->getClientOriginalName();
            $fileItemName = uniqid().'-'.$fileItem_name;
            $fileItem->storeAs('public/images/product', $fileItemName);

            $productGallery =  new ProductGallery();
            $productGallery->product_id = $product->id;
            $productGallery->image = $fileItemName;
            $productGallery->save();
        }

        // return $this->index();
        return redirect()->route('be.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $findUptdate = Product::find($id);
        $check = isset($id)?true:false;
        // dd($check);
        return view('be.add_book',['FindUptdate'=>$findUptdate,'check'=>$check]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $cats = Category::all();
        
        return view('be.product.editbook',['findUpdate'=>$product,'cats'=>$cats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $rules = [
            'code' => 'required|unique:products,code,'.$request->input('id'),
            //'code' => 'unique:products|required|max:6',
            'name' => 'required'
        ];
         $messages =[
            'code.unique'=> 'Mã không được phép trùng nhau'
         ];
        $request->validate($rules,$messages);
        
        $id_book = $request->input('id');
        // dd($find_id);
        $products = Product::find($id_book);

        // $products->code = $request->input('code');
        // $products->$request->input('sach');
        // $products->$request->input('mo_ta');
        // $products->$request->input('chi_tiet');
        // $products->$request->input('gia_that');
        // $products->$request->input('gia_sale');
        // $products->$request->input('so_luong')
        $products->category_id = $request->category_id;
        
        $products->code = $request->code;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->detail = $request->detail;
        $products->real_price = $request->real_price;
        $products->sale_price = $request->sale_price;

        
        if ($request->hasFile('feature_image')) {
            if ($products->feature_image && Storage::disk('public')->exists('images/product/' . $products->feature_image)) {
                Storage::disk('public')->delete('images/product/' . $products->feature_image);
            }

            $file = $request->file('feature_image');
            $file_name  = $file->getClientOriginalName();
            $filename = uniqid().'-'.$file_name;
            $file->storeAs('public/images/product', $filename);
            
            $products->feature_image = $filename;
        }


        $products->inventory_number = $request->inventory_number;
       
        // dd($request->input());
        $products->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        // dd($products);
        $products->delete();
        return $this->index();
    }
}
