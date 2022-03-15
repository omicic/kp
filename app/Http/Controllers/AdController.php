<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;

class AdController extends Controller
{
    //

    public function index()
    {

        if (isset(request()->cat)) {
            // $cat = Category::where('name', request()->cat)->first();
            //$all_ads = Ad::with('category')->where('category_id', $cat->id)->get();
            //dd(request()->cat);
            $all_ads = Ad::whereHas('category', function ($query) {
                $query->where('id', request()->cat);
            })->get();

            //dd($all_ads);
        } else {

            $all_ads = Ad::all();
        }



        $categories = Category::all();
        // $all_ads = Ad::all();
        return view('welcome', compact('all_ads', 'categories'));
    }

    public function show($id)
    {
        $single_ad = Ad::find($id);
        if (auth()->check() && auth()->user()->id !== $single_ad->user_id) {
            $single_ad->increment('views');
        }

        return view('singleAd', compact('single_ad'));
    }
}