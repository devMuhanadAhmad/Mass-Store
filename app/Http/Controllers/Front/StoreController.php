<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Review;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $request=Request();
        return view('front.store', [
            'stores' => Store::FilterActive()->Filter($request->query())->latest()->paginate(8),
        ]);
    }

    public function show(Store $store)
    {
        $request = Request();

        return view('front.AllProduct',
            [
                'store' => Store::where('id', $store->id)->pluck('slug')->first(),
                'categories' => Category::FilterActive()->whereNull('parent_id')->latest()->limit(6)->get(),
                'products' => Product::FilterActive()->Filter($request->query())->with(['category', 'store'])
                    ->where('store_id', $store->id)
                    ->latest()
                    ->paginate(12),
            ]);
    }

    public function showProduct(Product $product)
    {
        return view('front.showProduct', [
            'productImages' => ProductImage::where('product_id', $product->id)->latest()->limit(5)->get(),
            'product' => Product::with(['category'])->findOrFail($product->id),
            'reviews' => Review::with('user')->where('product_id', $product->id)->latest()->get(),
        ]);
    }
}
