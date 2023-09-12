<?php

namespace App\View\Components;

use App\Models\Cart;
use Illuminate\View\Component;

class CartComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $carts=Cart::with('product')->where('cookie_id', Cart::cookie_id())->latest()->get();
        return view('components.cart-component',[
            'carts'=>$carts,
            'cart'=>new Cart(),

        ]);
    }
}
