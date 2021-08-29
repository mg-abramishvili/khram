<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Setting;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $settings = Setting::where('id', '1')->first();
        $reviews = Review::all();
        return view('reviews.index', compact('reviews', 'settings'));
    }

    public function delete($id)
    {
        $reviews = Review::find($id);
        $reviews->delete();
        return redirect('/reviews');
    }
}
