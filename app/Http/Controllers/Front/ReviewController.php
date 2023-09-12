<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        if(!$user){
            return redirect()->route('login');
        }
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'notes' => 'nullable|string',
            'rating' => 'required|in:1,2,3,4,5',
        ]);


        Review::updateOrCreate([
            //Add unique field combo to match here
            //For example, perhaps you only want one entry per user:
            'user_id'   => Auth::user()->id,
        ],[
            'product_id' => $request->post('product_id'),
            'notes' => $request->post('notes'),
            'rating' => $request->post('rating'),
            'user_id' => $user->id,
            //'rate'=>''
        ]);
        $rating = DB::table('reviews')->where('product_id',$request->post('product_id'))->avg('rating');
        Product::where('id',$request->post('product_id'))->updateOrCreate([
            //Add unique field combo to match here
            //For example, perhaps you only want one entry per user:
            'id'   => $request->post('product_id'),
        ],[
            'rating'=>$rating
        ]);

        return redirect()->back()->with('success', 'Thank you ');

    }
}
