<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class NewProductComponent extends Component
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
        return view('components.new-product-component',[
            'products' => Product::with('category')->FilterActive()->latest()->limit(5)->get(),
        ]);
    }
}
