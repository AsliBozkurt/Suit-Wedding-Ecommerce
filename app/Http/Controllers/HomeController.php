<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Stripe;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    public function index(){
        $product=Product::all();
        return view('home.userpage',compact('product'));
    }
    public function redirect(){
        $usertype=Auth::user()->usertype;
        if($usertype=='1'){
            $total_product=product::all()->count();
            $total_order=order::all()->count();
            $total_user=user::all()->count();

            $order=order::all();
            $total_revenue=0;

            foreach($order as $order) {

                $total_revenue= $total_revenue+$order->price;
                

            }

            $total_delivered=order::where('delivery_status','=','delivered')->get()->count();

            $total_processing=order::where('delivery_status','=','processing')->get()->count();

            return view('admin.home',compact('total_product','total_order','total_user','total_revenue','total_delivered','total_processing'));
        }
        else
            {
                $product=Product::all();
                return view('home.userpage',compact('product'));
            }
    }

    public function product_details($id){
        $product=product::find($id);
        return view('home.product_details',compact('product'));
    }

    public function add_cart(Request $request,$id){

        if(Auth::id()){
            
            $user=Auth::user();
            $product=product::find($id);
            $cart = new cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;

            $cart->Product_title=$product->title;

            if($product->discount_price!=null){

                $cart->price=$product->discount_price * $request->quantity;

            }

            else{

                $cart->price=$product->price * $request->quantity;
            }


            $cart->price=$product->price;
            $cart->image=$product->image;
            $cart->Product_id=$product->id;
            $cart->quantity=$request->quantity;

            $cart->save();
            return redirect()->back();

        }
        else{

            return redirect('login');
        }
    }

public function show_cart(){

    if(Auth::id()) 
    {
        $id=Auth::user()->id;
        $cart=cart::where('user_id','=',$id)->get();
        return view('home.showcart',compact('cart'));
    
    }

    else{
        
        return redirect('login');
    }

}

public function remove_cart($id){

    $cart=cart::find($id);

    $cart->delete();



    return redirect()->back();
}


public function cash_order(){

    $user=Auth::user();
    $user_id=$user->id;

    $data=cart::where('user_id','=',$user_id)->get();

    foreach($data as $data){

        $order= new order;

        $order->name=$data->name;
        $order->email=$data->email;
        $order->phone=$data->phone;
        $order->address=$data->address;
        $order->user_id=$data->user_id;
        $order->product_title=$data->product_title;
        $order->price=$data->price;
        $order->quantity=$data->quantity;
        $order->image=$data->image;
        $order->product_id=$data->Product_id;

        $order->payment_status='Kapıda Ödeme';
        $order->delivery_status='processing';

        $order->save();

        $cart_id=$data->id;
        $cart=cart::find($cart_id);
        $cart->delete();



    }

    return redirect()->back()->with('message','Siparişinizi aldık, yakında iletişime geçeceğiz');
}

public function stripe($totalprice){


    return view('home.stripe',compact('totalprice'));


}

public function stripePost(Request $request, $totalprice): RedirectResponse
{
    // Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
  
    // Stripe\Charge::create ([
    //         "amount" => $totalprice * 100,
    //         "currency" => "usd",
    //         "source" => $request->stripeToken,
    //         "description" => "Thanks" 
    // ]);

            
    // return back()->with('success', 'Ödeme Başarılı!');
    if(Auth::check()){
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $totalprice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks For Payment!"
        ]);

        $user = Auth::user();
        $user_id = $user->id;
        $cartData = Cart::where('user_id', '=', $user_id)->get();

        foreach ($cartData as $data) {

            $order = new Order();
            $order->user_id = $data->user_id;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->product_title = $data->product_title;
            $order->product_id = $data->product_id;
            $order->quantity = $data->quantity;
            $order->price = $data->price;
            $order->image = $data->image;
            
            $order->delivery_status = 'pending';
            $order->payment_status = 'paid';
            $order->save();


            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }

       

        return back()->with('success', 'Ödeme Başarılı!');
    }else{
        return redirect('login');
    }
}


public function show_order(){

    if(Auth::id()){

        $user=Auth::user();
        $user_id=$user->id;

        $order=order::where('user_id','=',$user_id)->get();


        return view('home.order',compact('order'));
    }

    else{

        return redirect('login');

    }
}


public function cancel_order($id){

    $order=order::find($id);
    $order->delivery_status='You canceled the order';
    $order->save();

    return redirect()->back();

}

}
