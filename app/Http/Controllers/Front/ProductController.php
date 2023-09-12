<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
        $store_id = Auth::user()->store_id;
        if (!$store_id) {
            return redirect()->route('dashboard');
        }
        $products = Product::with(['store', 'category', 'tag'])->where('store_id', $store_id)
            ->latest()
            ->paginate(15, '*', 'page');

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $store_id = Auth::user()->store_id;
        if (!$store_id) {
            return redirect()->route('dashboard');
        }

        $categories = Category::all();
        $product = new Product();
        $tags = [];
        return view('admin.product.create', compact('product', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $store_id = Auth::user()->store_id;
        if (!$store_id) {
            return redirect()->route('store.create');
        }
        $request->validate([
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',

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
                'nullable', 'in:active,inactive',
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
                'nullable',
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
        DB::beginTransaction();
        try {
            $request->merge([
                'slug' => Str::slug($request->post('name')),
            ]);

            $data = $request->except('image');
            if ($request->hasFile('image')) { //check isset image
                $file = $request->file('image'); //return object
                $path = $file->store('Product', ['disk' => 'public']);
                $data['image'] = $path;
            }

            $data['store_id'] = Auth::user()->store_id;
            $product = Product::create($data);

            // $tags = explode(',',  $request->input('tags'));
            $tags = json_decode($request->input('tags'));
            //  dd($product);
            $product->syncTags($tags);

            //multiple other image to product
            if ($request->hasFile('gallary')) {
                foreach ($request->file('gallary') as $file) {
                    $path = $file->store('products', ['disk' => 'public']);
                    ProductImage::create([
                        'product_id' => $product->id,
                        'path' => $path,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('trader.product.index')->with('success', __("Operation accomplished successfully"));
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('errore', "Add Product failed ");
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store_id = Auth::user()->store_id;
        if (!$store_id) {
            return redirect()->route('dashboard');
        }
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $tags = $product->tag()->pluck('name')->toArray();
        return view('admin.product.edit', compact('product', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
                'nullable', 'in:active,inactive',
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
                'nullable'
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

        $store_id = Auth::user()->store_id;
        if (!$store_id) {
            return redirect()->route('store.create');
        }
        $product = Product::findOrFail($id);

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






        return redirect()->route('trader.product.index')->with('success', __("Operation accomplished successfully"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // dd(1);
        $store_id = Auth::user()->store_id;
        if (!$store_id) {
            return redirect()->route('store.create');
        }
        $product->delete();

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        return redirect()->route('trader.product.index')->with('success', __("Operation accomplished successfully"));
    }
}
