<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Auth;
class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //$order = Order::find(2)->getListDetail;
        // dd($order);
        $orders = Order::all();

        // email data
        // $email_data = array(
        //     'count' => $orders->count()
        // );

        // // send email with the template
        // Mail::send('mails.welcome_email', $email_data, 
        // function ($message) use ($email_data) {
        //     $message->to('nghiphanhuu@gmail.com')
        //         ->subject('Tobe DEV')
        //         ->from('nghiphanhuu@gmail.com', 'Chien.Le.Mentor');
        // });
        $produc = Product::all();
        $data["email"] = "nghiphanhuu@gmail.com";
        $data["title"] = "this is subjec";
        $data["body"] = " <h1>This is Demo Mail Attechment Pdf File</h1>";
        $data["item"] = [(object)["id"=>"1","name"=>'nghi'],(object)["id"=>"2","name"=>'chien']];
        $attechfiles = [
            public_path('file/demo.jpg'),
            public_path('file/test1.pdf'),
            public_path('file/test2.pdf')
        ];
 
        Mail::send('mails.fileAttechmemtMail', $data, function($message)use($data, $attechfiles) {
            $message->to($data["email"], "nghi")
           
                        ->subject($data["title"]);
            foreach ($attechfiles as $file){
                $message->attach($file);
            }
        });
        return view('order',['order'=>$orders]);
    }

    public function order_detail($id){
        $orders = Order::all()->where('user.id',$id);
        // dd($orders);
        // $detail = DB::table('order_details')
        // ->join('orders', 'orders.id', '=', 'order_details.order_id')
     
        // ->select('order_details.price', 'orders.consignee_name')
        // ->where('order_details.order_id','=',1)
        // ->get();
       
        return view('order_detail',['orders'=>$orders]);
    }
}
