<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::all();
 
        return view('food.index', ['foods' => $foods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::all();
        
        return view('food.create', ['restaurants' => $restaurants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFoodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $food = new Food;

        $food->name = $request->name;

        $food->restaurant_id = $request->restaurant_id;

        $food->price = $request->price;

        $food->rating = $request->rating;

        $food->photo = $request->photo;

        $food->save();

        return redirect()->route('food-index')->with('success', 'New Dish is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        $restaurants = Restaurant::all();

        return view('food.edit', [
            'food' => $food,
            'restaurants' => $restaurants,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFoodRequest  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $food->name = $request->name;

        $food->restaurant_id = $request->restaurant_id;

        $food->price = $request->price;

        $food->rating = $request->rating;

        $food->photo = $request->photo;

        $food->save();

        return redirect()->route('food-index')->with('success', 'The Dish is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food -> delete();
        return redirect()->back()->with('success', 'Dish is deleted ');
    }
}
