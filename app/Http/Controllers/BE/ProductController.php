<?php

namespace App\Http\Controllers\BE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('be.product.index', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('be.product.createbook');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'code' => 'required|max:6',
            'name' => 'required'
        ];
        
        $messages = [
            'code.required' => 'Trường này là bắt buộc nhập!',
            'code.max' => 'Trường này chỉ tối đa 6 ký tự',
            'name.required' => 'Trường này là bắt buộc nhập!'
        ];

        $request->validate($rules);
        //$request->validate($rules, $messages);

        $product = new Product();
        $product->code = $request->code;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->detail = $request->detail;
        $product->real_price = $request->real_price;
        $product->sale_price = $request->sale_price;
        $product->feature_image = $request->feature_image;
        $product->inventory_number = $request->inventory_number;
        $product->save();
        return $this->index();
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
        //
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
        $products = Product::find(1);

        $products->$request->input('code');
        $products->$request->input('sach');
        $products->$request->input('mo_ta');
        $products->$request->input('chi_tiet');
        $products->$request->input('gia_that');
        $products->$request->input('gia_sale');
        $products->$request->input('so_luong');
       
        // dd($request->input());
        $products->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
