<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Throwable;

class CheckoutController extends Controller
{
    public function index()
    {
         //if empty cart redurect back
         $cart=Cart::with('product')->where('cookie_id', Cart::cookie_id())->get();

         if($cart->count() == 0){
             return redirect()->back()->with('warning','empty cart');
         }
         return view('front.checkout',[
             'cart'=>new Cart(),
         ]);
    }
    public function store(Request $request)
    {

        $request->validate([
            'billing_first_name' => 'required|string|min:3|max:255',

            'billing_last_name' => 'required|string|min:3|max:255',
            'billing_email' => 'required|email',
            'billing_phone_number' => 'required',
            'billing_street_address' => 'required|string|min:5|max:255',
            'billing_city' => 'required|string|min:5|max:255',
            'billing_postal_code' => 'required|string',
            'billing_country' => 'required|string|min:5|max:255',
            'billing_state' =>'required|string|min:5|max:255',

            'shipping_first_name' =>'required|string|min:3|max:255',
            'shipping_last_name' => 'required|string|min:3|max:255',
            'shipping_email' =>'required|email',
            'shipping_phone_number' => 'required',
            'shipping_street_address' => 'required|string|min:5|max:255',
            'shipping_city' => 'required|string|min:5|max:255',
            'shipping_postal_code' =>'required',
            'shipping_state' =>'required|string|min:5|max:255',
            'shipping_country' =>'required|string|min:5|max:255',
        ]);
        DB::beginTransaction();

        try{
            $items = Cart::where('cookie_id', Cart::cookie_id())->with('product')->get();

            //$items=Cart::with('product')->where('cookie_id', Cart::cookie_id())->get();
            $items=$items->groupBy('product.store_id')->all();
            foreach($items as $store_id => $cart_items){
                $order = Order::create([
                    'store_id' => $store_id,
                    'user_id' => Auth::id(),
                    'payment_method' => 'code',
                ]);

            }

            $item=Cart::with('product')->get();

            foreach($cart_items as  $item){

                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' =>$item->quantity,
                    'product_name_copy'=> $item->product->name,
                    'product_price_copy'=>$item->product->price

                ]);
            }


            OrderAddress::create([
                'order_id' => $order->id,

                'billing_first_name' => $request->post('billing_first_name'),
                'billing_last_name' => $request->post('billing_last_name'),
                'billing_email' => $request->post('billing_email'),
                'billing_phone_number' => $request->post('billing_phone_number'),
                'billing_street_address' => $request->post('billing_street_address'),
                'billing_city' => $request->post('billing_city'),
                'billing_postal_code' => $request->post('billing_postal_code'),
                'billing_country' => $request->post('billing_country'),
                'billing_state' => $request->post('billing_state'),

                'shipping_first_name' => $request->post('shipping_first_name'),
                'shipping_last_name' => $request->post('shipping_last_name'),
                'shipping_email' => $request->post('shipping_email'),
                'shipping_phone_number' => $request->post('shipping_phone_number'),
                'shipping_street_address' => $request->post('shipping_street_address'),
                'shipping_city' => $request->post('shipping_city'),
                'shipping_postal_code' => $request->post('shipping_postal_code'),
                'shipping_state' => $request->post('shipping_state'),
                'shipping_country' => $request->post('shipping_country'),
            ]);



            DB::commit();
        }catch(Throwable $e){
                DB::rollBack();
                throw $e;
        }

        return redirect()->back()->with('success','success process');

    }

}
