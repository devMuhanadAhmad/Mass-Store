<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Gate::authorize('product.view');
        $products = Product::with(['store', 'category', 'tag'])
            ->latest()
            ->paginate(15, '*', 'page');

        return view('admin.productControl.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Gate::authorize('category.update');
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $tags = $product->tag()->pluck('name')->toArray();
        return view('admin.productControl.edit', compact('product', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        //Gate::authorize('product.update');
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                "unique:products,name,$id",
            ],

            'category_id' => [
                'required', 'int', 'exists:categories,id',
            ],

            'notes' => [
                'nullable', 'string',
            ],

            'image' => [
                'nullable', 'image',
            ],
            'status' => [
                 'nullable','in:active,inactive',
            ],
            'price' => [
                'nullable', 'numeric ', 'min:0',
            ],
            'compare_price' => [
                'nullable', 'numeric ', 'min:0',
            ],
            'quantity' => [
                'required', 'numeric ', 'min:0',
            ],
            'rating' => [
                'nullable',
            ],
            'featured' => [
                'nullable',
            ],
            'options' => [
                'nullable',
            ],
            'type' => [
                  'nullable','in:silver,diamond, gold,general',
            ],
            'size' => [
                'nullable', 'numeric',
            ],
            'manufacturer_company' => [
                'nullable', 'string',
            ],
            'product_material' => [
                'nullable', 'string',
            ],
        ]);


        $old_image = $product->image;

        $data = $request->except('image');
        $request->merge(['slug' => Str::slug($request->post('name'))]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('Product', ['disk' => 'public']);
            $data['image'] = $path;
        }
        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }
        $product->update($request->all());

        $tags = json_decode($request->input('tags'));
        $product->syncTags($tags);

        return redirect()->route('product.index')->with('success', __("Operation accomplished successfully"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //Gate::authorize('product.delate');
         $product->delete();

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        return redirect()->route('product.index')->with('success', __("Operation accomplished successfully"));
    }}
