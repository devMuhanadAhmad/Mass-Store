<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth:sanctum')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $stores= Store::paginate();
        return response()->json($stores,200);
       }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',

            ],
            'notes' => [
                'nullable', 'string',
            ],
            'status' => 'nullable|in:active,inactive',
                ]);

                $store=Store::create($request->all());
                return $store;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return $store;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Store $store)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'notes' => 'nullable|string|max:255',
            'status' => 'in:active,inactive',
                ]);

                $store->update($request->all());
                return $store;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Store::destroy($id);
        return response()->json([
            'message'=>'Sore deleted successfully'
        ],200);
    }
}
