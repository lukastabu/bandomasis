<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $foods = Food::all();
 
        return view('front.index', ['foods' => $foods]);
    }

    public function rate(Food $food)
    {
        $restaurants = Restaurant::all();

        return view('front.rate', [
            'food' => $food,
            'restaurants' => $restaurants,
        ]);
    }

    public function update(Request $request, Food $food)
    {
        $food->rating = $request->rating;

        $food->save();

        return redirect()->route('front-index')->with('success', 'Your Rating is submitted');
    }


}
