<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $request=Request();
        // $user=$request->user();
        // if(!$user->tokenCan('category.delete')){
        //     return response()->json([
        //         'message'=>'not allowed'
        //       ],403);
        // }
        $categories = Category::with('parent')->paginate(15);
        return response()->json($categories,200);

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
            'name' => 'required|string|max:255',
            'notes' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'status' => 'in:active,inactive',
                ]);
                $user=$request->user();
                if(!$user->tokenCan('category.create')){
                    return response()->json([
                        'message'=>'not allowed'
                      ],403);
                }
                $category=Category::create($request->all());
                return $category;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //return Category::findOrFail($id);
        //return single category
        // $request=Request();
        // $user=$request->user();
        // if(!$user->tokenCan('category.view')){
        //     return response()->json([
        //         'message'=>'not allowed'
        //       ],403);
        // }
        return $category
             ->load('parent');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $category)
    {

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'notes' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'status' => 'in:active,inactive',
                ]);

                $user=$request->user();
                if(!$user->tokenCan('category.update')){
                    return response()->json([
                        'message'=>'not allowed'
                      ],403);
                }

                $category->update($request->all());

                return $category;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=Auth::guard('sanctum')->user();
        if(!$user->tokenCan('category.delete')){
              return response()->json([
                'message'=>'not allowed'
              ],403);
        }
        Category::destroy($id);
        return response()->json([
            'message'=>'Category deleted successfully'
        ],200);
    }
}
