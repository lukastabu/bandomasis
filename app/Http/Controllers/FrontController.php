<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Restaurant;
use DB;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        if($request->s) {
            $foodsDir = [DB::table('food')
                ->join('restaurants', 'restaurants.id', '=', 'food.restaurant_id')
                ->select('food.*', 'restaurants.*')
                ->orderBy('food.id', 'asc')
                ->where('food.name', 'like', '%'.$request->s.'%')
                ->get(), 'default'];
                $filter = 0;
        } else {
            if(!$request->restaurant_id)
            {
                $foodsDir = match($request->sort) {
                'food-asc' => [DB::table('food')
                    ->join('restaurants', 'restaurants.id', '=', 'food.restaurant_id')
                    ->select('food.*', 'restaurants.*')
                    ->orderBy('food.name', 'asc')
                    ->get(),'food-asc'],
                'food-desc' => [DB::table('food')
                    ->join('restaurants', 'restaurants.id', '=', 'food.restaurant_id')
                    ->select('food.*', 'restaurants.*')
                    ->orderBy('food.name', 'desc')
                    ->get(), 'food-desc'],
                'restaurant-asc' => [DB::table('food')
                    ->join('restaurants', 'restaurants.id', '=', 'food.restaurant_id')
                    ->select('food.*', 'restaurants.*')
                    ->orderBy('restaurants.title', 'asc')
                    ->get(),'restaurant-asc'],
                'restaurant-desc' => [DB::table('food')
                    ->join('restaurants', 'restaurants.id', '=', 'food.restaurant_id')
                    ->select('food.*', 'restaurants.*')
                    ->orderBy('restaurants.title', 'desc')
                    ->get(), 'restaurant-desc'],
                'rating-asc' => [DB::table('food')
                    ->join('restaurants', 'restaurants.id', '=', 'food.restaurant_id')
                    ->select('food.*', 'restaurants.*')
                    ->orderBy('food.rating', 'asc')
                    ->get(),'rating-asc'],
                'rating-desc' => [DB::table('food')
                    ->join('restaurants', 'restaurants.id', '=', 'food.restaurant_id')
                    ->select('food.*', 'restaurants.*')
                    ->orderBy('food.rating', 'desc')
                    ->get(), 'rating-desc'],
                default => [DB::table('food')
                ->join('restaurants', 'restaurants.id', '=', 'food.restaurant_id')
                ->select('food.*', 'restaurants.*')
                ->orderBy('food.id', 'asc')
                ->get(), 'default']
                };
                $filter = 0;
            } else {
                $foodsDir = match($request->sort) {
                    'food-asc' => [DB::table('food')
                        ->join('restaurants', 'restaurants.id', '=', 'food.restaurant_id')
                        ->select('food.*', 'restaurants.*')
                        ->where('food.restaurant_id', $request->restaurant_id)
                        ->orderBy('food.name', 'asc')
                        ->get(),'food-asc'],
                    'food-desc' => [DB::table('food')
                        ->join('restaurants', 'restaurants.id', '=', 'food.restaurant_id')
                        ->select('food.*', 'restaurants.*')
                        ->where('food.restaurant_id', $request->restaurant_id)
                        ->orderBy('food.name', 'desc')
                        ->get(), 'food-desc'],
                    'restaurant-asc' => [DB::table('food')
                        ->join('restaurants', 'restaurants.id', '=', 'food.restaurant_id')
                        ->select('food.*', 'restaurants.*')
                        ->where('food.restaurant_id', $request->restaurant_id)
                        ->orderBy('restaurants.title', 'asc')
                        ->get(),'restaurant-asc'],
                    'restaurant-desc' => [DB::table('food')
                        ->join('restaurants', 'restaurants.id', '=', 'food.restaurant_id')
                        ->select('food.*', 'restaurants.*')
                        ->where('food.restaurant_id', $request->restaurant_id)
                        ->orderBy('restaurants.title', 'desc')
                        ->get(), 'restaurant-desc'],
                    'rating-asc' => [DB::table('food')
                        ->join('restaurants', 'restaurants.id', '=', 'food.restaurant_id')
                        ->select('food.*', 'restaurants.*')
                        ->where('food.restaurant_id', $request->restaurant_id)
                        ->orderBy('food.rating', 'asc')
                        ->get(),'rating-asc'],
                    'rating-desc' => [DB::table('food')
                        ->join('restaurants', 'restaurants.id', '=', 'food.restaurant_id')
                        ->select('food.*', 'restaurants.*')
                        ->where('food.restaurant_id', $request->restaurant_id)
                        ->orderBy('food.rating', 'desc')
                        ->get(), 'rating-desc'],
                    default => [DB::table('food')
                    ->join('restaurants', 'restaurants.id', '=', 'food.restaurant_id')
                    ->select('food.*', 'restaurants.*')
                    ->where('food.restaurant_id', $request->restaurant_id)
                    ->orderBy('food.id', 'asc')
                    ->get(), 'default']
                };
                $filter = (int) $request->restaurant_id;
            }
        }
        return view('front.index', [
            'foods' => $foodsDir[0],
            'sort' => $foodsDir[1],
            'restaurants' => Restaurant::all(),
            'filter' => $filter,
            's' => $request->s ?? '',
        ]);
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
