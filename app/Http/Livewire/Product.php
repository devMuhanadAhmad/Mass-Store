<?php

namespace App\Http\Livewire;

use App\Models\Product as ModelsProduct;
use App\Models\Store;
use Livewire\Component;

class Product extends Component
{
    public $name='';
    public $price='';
    protected $queryString = ['name','price'];




    public function render()
    {

        //'products' => ModelsProduct::where('store_id', $store->id)->FilterActive()->with('category')->latest()->simplepaginate(3),

        return view('livewire.product', [
            //'parent'=>Category::where('id','parent_id'),
            'products' => ModelsProduct::FilterActive()->with('category')->where('name', 'like', '%'.$this->name.'%')->latest()->simplepaginate(3),
        ]);
    }
}
