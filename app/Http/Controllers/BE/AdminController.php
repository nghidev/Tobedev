<?php

namespace App\Http\Controllers\BE;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use SebastianBergmann\FileIterator\Facade;
use Hash;


class AdminController extends Controller
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

    public function index()
    {
        
        // dd($produc);
        return view('be.index');
    }
    public function login()
    {
        
        
       
        // return Redirect::to('be');
        return view('be.auth.login');
    }
    
    public function handleLogin(Request $request)
    {
        // $rules = [
        //     'email' => 'required',
        //     'password' => 'required|min:6|max:32'
        // ];
        // $messages = [
        //     'email.required' => 'Trường này là bắt buộc nhập!',
        //     'password.required' => 'Trường này là bắt buộc nhập!',
        //     'password.min' => 'Mật khẩu phải ít nhất 6 kí tự!',
        //     'password.max' => 'Mật khẩu tối đa chỉ có 32 ký tự!'
        // ];

        // $request->validate($rules, $messages);

        if (Auth::attempt(request(['email', 'password']))) {
            return redirect()->route('be.index');
        } else {
            return redirect()->route('be.login')
                ->withInput($request->input())
                ->withErrors('Tên đăng nhập và mật khẩu không tồn tại');
        }
    }
    public function logout()
    {
        //Auth::logout();
        auth()->guard('web')->logout();
        return redirect()->route('be.login');
    }
    public function list()
    {
        $products = Product::all();
        // dd($produc);
        return view('be.data_table',['products'=>$products]);
    }
    public function add()
    {
        return view('be.add_book');
    }
}
