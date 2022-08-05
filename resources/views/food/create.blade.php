@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add a new Dish</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('food-store') }}">
                            <li>Name of the Dish: <input type="text" name="name"></li>
                            <li>Price in euros: <input type="number" name="price"></li>
                            <li>Link to Dish photo: <input type="text" name="photo"></li>
                            <li>Rating: <input type="text" name="rating"></li>
                            <li>In which Restaurant to find:
                                <select name="restaurant_id">
                                    @foreach ($restaurants as $restaurant)
                                        <option value="{{ $restaurant->id }}">{{ $restaurant->title }}</option>
                                    @endforeach
                                </select>
                            </li>
                            @csrf
                            <button type="submit">Add Dish</button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
