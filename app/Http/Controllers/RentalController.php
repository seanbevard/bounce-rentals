<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use PDF;

class RentalController extends Controller
{
    function index(){
        $rentals = Rental::all();
        return view('rental', ['rentals'=>$rentals]);
    }

    function rental($id){
        $data =  Rental::find($id);
        return view('detail', ['rental'=>$data]);
    }

    function search(Request $req){
        $data = Rental::where('name', 'like', '%'.$req->input('query').'%')->get();
        return view('search',['rentals'=>$data]);
    }

    function addCart(Request $req){
        

        if($req->session()->has('user')){
            $userId = Session::get('user')['id'];
            if(Cart ::where('user_id',$userId)->count() >= 1){
                return redirect('/cart')->with('status', 'Profile updated!');

            }
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->rental_id = $req->rental_id;
            $cart->start_date = date('Y-m-d', strtotime($req->start_date));
            $cart->end_date = date('Y-m-d', strtotime($req->end_date));
            $cart->save();
            return redirect('/cart');

        }
        else{
            return redirect('/login');
        }
    }

    static function cartCount(){
        $userId = Session::get('user')['id'];
        return Cart ::where('user_id',$userId)->count();
    }

    function cart(){

        //get current user ID from session
        $userId = Session::get('user')['id'];

        $rentals = DB::table('cart')->join('rentals','cart.rental_id', '=', 'rentals.id')
        ->where('cart.user_id',$userId)->select('*','cart.id as cart_id')->get();

        return view('cart',['rentals'=>$rentals]);
    }

    function remove($id){
        Cart::destroy($id);
        return redirect('cart');
    }

    function order(){
        //get current user from session
        $userId = Session::get('user')['id'];

        //create order
        $orderTotal = DB::table('cart')->join('rentals','cart.rental_id', '=', 'rentals.id')
        ->where('cart.user_id',$userId)->sum('rentals.weekday_price');

        // $startDate = DB::table('cart')->join('rentals','cart.rental_id', '=', 'rentals.id')
        // ->select('')
        // ->where('cart.user_id',$userId)->get();

        return view('order',['orderTotal'=>$orderTotal]);
    }

    function submitOrder(Request $req){
        //get current user from session
        $userId = Session::get('user')['id'];

        $currentCart = Cart::where('user_id', $userId)->get();
        //empty cart and create new order
        foreach($currentCart as $cart){
            $order = new Order;
            $order->rental_id = $cart['rental_id'];
            $order->user_id = $cart['user_id'];
            $order->status = 'pending';
            $order->payment_method = $req->paymentmethod;
            $order->payment_status =  'pending';
            $order->address = $req->address;
            $order->start_date = $cart['start_date'];

            $order->save();
            Cart::where('user_id', $userId)->delete();
        }
        $req->input();
        return redirect('/');
    }
    
    function myOrders(){
        //get current user from session
        $userId = Session::get('user')['id'];

        //get orders by userID
        $myOrders = DB::table('orders')->join('rentals','orders.rental_id', '=', 'rentals.id')
        ->select('*','orders.id as order_id',)
        ->where('orders.user_id',$userId)->get();

        return view('myorders',['myOrders'=>$myOrders]);

    }

    function admin(){
        //get current user from session
        $userId = Session::get('user')['id'];

        //get ALL orders
        $allOrders = DB::table('orders')
        ->join('rentals','orders.rental_id', '=', 'rentals.id')
        ->join('users','orders.user_id','=', 'users.id')
        ->select('*','orders.id as order_id')
        ->get();

        return view('admin',['allOrders'=>$allOrders]);
    }
}