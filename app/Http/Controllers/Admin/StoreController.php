<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('store.view');
        $stores=Store::with('user')->latest()->simplepaginate(15);
        return view('admin.store.index',compact('stores'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $store = new Store();
        return view('admin.store.create',compact('store'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {


        $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);
        $data = $request->except('image');
        if ($request->hasFile('image')) { //check isset image
            $file = $request->file('image'); //return object
            $path = $file->store('store', ['disk' => 'public']);
            $data['image'] = $path;
        }

       // dd($data);
        $store=Store::create($data);


        $admin = DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(array('store_id'=>$store->id));

        return redirect()->route('dashboard')->with('success', 'operation accomplished successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('store.update');
        $store = Store::findOrFail($id);
        return view('admin.store.edit',compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $id)
    {
        Gate::authorize('store.update');
        $store = Store::findOrFail($id);

        $old_image = $store->image;

        $data = $request->except('image');
        $request->merge(['slug' => Str::slug($request->post('name'))]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('Categories', ['disk' => 'public']);
            $data['image'] = $path;
        }
        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }
        $store->update($data);
        return redirect()->route('store.index')->with('success', 'operation accomplished successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        Gate::authorize('store.delete');
        $store->delete();

        if ($store->image) {
            Storage::disk('public')->delete($store->image);
        }

       return redirect()->route('store.index')->with('success', 'operation accomplished successfully');

    }
}
