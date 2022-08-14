<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index()
    {
        $data = Product::all();
        return view('products', ['products' => $data]);
    }
    function show($id = null)
    {
        if (empty($id)) {
            return "No product found";
        } else {
            $data = Product::find($id);
            // return view('detail', ['product' => $data]);
            return response()->json($data);
        }
    }

    function search(Request $request)
    {
        $data = Product::where('name', 'like', '%' . $request->input('query') . '%')->get();
        return view('search', ['products' => $data]);
    }

    function addToCart(Request $request)
    {
        if ($request->session()->has('user')) {
            $cart = new Cart;
            $cart->user_id =  $request->session()->get('user')['id'];
            $cart->product_id = $request->product_id;
            $cart->save();
            return redirect('/login');
        } else {
            return redirect('/login');
        }
    }

    #the way we used this fumction in view is allowed only for static functions
    static function cartItem()
    {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }

    function cartlist()
    {
        if (!Session::has('user')) {
            return view('cartlist');
        };
        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->select('products.*', 'cart.id as cart_id')
            ->get();

        return view('cartlist', ['products' => $products]);
    }

    function removeCart($id)
    {

        Cart::destroy($id);
        return redirect('/cartlist');
    }

    function ordernow()
    {
        $userId = Session::get('user')['id'];
        $total = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->sum('products.price');
        return view('ordernow', ['total' => $total]);
    }
    function orderPlace(Request $req)
    {
        $userId = Session::get('user')['id'];
        $allCart = Cart::where('user_id', $userId)->get();
        foreach ($allCart as $cart) {
            $order = new Order;
            $order->user_id = $cart['user_id'];
            $order->product_id = $cart['product_id'];
            $order->status = 'pending';
            $order->payment_method = $req->pay;
            $order->payment_status = "pending";
            $order->address = $req->address;
            $order->save();
            $allCart = Cart::where('user_id', $userId)->delete();
        }
        return redirect('/');
    }

    function myOrders()
    {
        if (!Session::has('user')) {

            return view('myorders');
        };
        $userId = Session::get('user')['id'];
        $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', $userId)
            ->get();
        return view('myorders', ['orders' => $orders]);
    }
}
