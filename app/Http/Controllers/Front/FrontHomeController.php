<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontHomeController extends Controller
{
    public function __construct()
    {
    }
    public function index(){
        $categories= Category::FilterActive()->whereNull('parent_id')->latest()->limit(6)->get();
        $products=Product::with('category')->FilterActive()->latest()->limit(8)->get();

        return view('front.home',compact('categories','products'));
    }

   
}
