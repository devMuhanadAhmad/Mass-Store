<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class TrendingProductComponent extends Component
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
        return view('components.trending-product-component',[
            'products'=>Product::with('category')->latest()->limit(8)->get(),

        ]);
    }
}
