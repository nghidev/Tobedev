<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        
        return view('home');
    }

    public function index(){
        $products = Product::all();
        // dd($products);
        $cats = Category::all();
        return view('index',['products'=>$products,'cats'=>$cats]);
    }

    public function list(){
        $products = Product::all();
        return view('list',['products'=> $products]);
    }

    public function detail(){
        return view('detail');
    }

    public function show($id){
        $product = Product::find($id);
        //dd($product->getListGallery()->get());
        //$productGallerys = ProductGallery::where('product_id', $id)->get();
        return view('detail',['sp' => $product]);
    }

    public function show2($id){
        $product = Product::find($id);
        $productGallerys = ProductGallery::where('product_id', $id)->get();
        return view('detail',['sp' => $product, 'productGallerys' => $productGallerys]);
    }

    public function order(){
        return view('order');
    }
    public function getProductByCat($id){
        $products = Product::where('category_id',$id)->get();
        // dd($product);
        $cats = Category::all();


        return view('index',['products' => $products,'cats'=>$cats]);
    }
}
