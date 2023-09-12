<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $carts=Cart::with('product')->where('cookie_id', Cart::cookie_id())->latest()->get();
        return view('front.cart',[
            'carts'=>$carts,
            'cart'=>new Cart(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'product_id' => ['required', 'int', 'exists:products,id'],
            'quantity' => ['required', 'int', 'min:1'],
        ]);
        $product=Product::findOrFail($request->post('product_id'));
        $cart = Cart::where('product_id', '=', $product->id)->where('cookie_id', Cart::cookie_id())
            ->first();

        if (!$cart) {
             Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->post('product_id'),
                'quantity' => $request->post('quantity'),
             ]);
        }else{
            $cart->increment('quantity',  $request->post('quantity'));
        }

        return redirect()->route('front.cart.index')
        ->with('success', 'Product added to cart!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$quantity)
    {
        $request->validate([
            'quantity'=>'nullable,int'
        ]);
        return Cart::where('id', $id)->where('cookie_id', Cart::cookie_id())
        ->update([
            'quantity' => $quantity,
        ]);
        return redirect()->back()
        ->with('success', 'Quantity updated to cart!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $cart=Cart::findOrFail($id);

        $cart->delete();
        return redirect()->back()
        ->with('success', 'Product deleted to cart!');
    }

    public function empty($id) {
        Cart::query()->destroy();
 

    }


}
