@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit this Restaurant</div>

                    <div class="card-body">
                        <form action="{{ route('food-update', $food) }}" method="POST">
                            The Dish : <input type="text" name="name" value={{ $food->name }}>
                            <br>
                            Find at:
                            <select name="restaurant_id">
                                @foreach ($restaurants as $restaurant)
                                    <option value="{{ $restaurant->id }}"  @if ($restaurant->id == $food->restaurant_id) selected @endif>
                                        {{ $restaurant->title }}
                                    </option>
                                @endforeach
                            </select>
                            <br>
                            Price: <input type="text" name="price" value={{ $food->price }}>
                            <br>
                            Rating: <input type="text" name="rating" value={{ $food->rating }}>
                            <br>
                            Link to Photo: <input type="text" name="photo" value={{ $food->photo }}>
                            <br><br>
                            @csrf
                            @method('put')
                            <button class="btn btn-outline-success" type="submit">Save Changes</button>
                            <a class="btn btn-outline-danger ml-3" href="{{ route('food-index') }}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
