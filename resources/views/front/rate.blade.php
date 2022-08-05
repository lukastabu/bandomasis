@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit this Restaurant</div>

                    <div class="card-body">
                        <div class="">
                            <h3>{{ $food->name }}</h3>
                            <br>
                            <span>Find at: {{ $food->food_restaurant->title }}</span>
                            <br>
                            <span>Price: {{ $food->price }}</span>
                            <br>
                            <span>Rating: {{ $food->rating }}</span>
                            <br>
                            <span>Photo: <img src="{{ $food->photo }}"></span>
                        </div>

                        <form action="{{ route('front-update', $food) }}" method="POST">
                            Rating: <input type="text" name="rating" value={{ $food->rating }}>
                            <br><br>
                            @csrf
                            @method('put')
                            <button class="btn btn-outline-success" type="submit">Save Changes</button>
                            <a class="btn btn-outline-danger ml-3" href="{{ route('front-index') }}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
