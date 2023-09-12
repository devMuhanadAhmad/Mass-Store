<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Role;
use Illuminate\View\Component;

class TopCategoresComponent extends Component
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
        return view('components.top-categores-component',[
            'categories'=>Category::Count('parent_id')->latest()->paginate()
        ]);
    }
}
