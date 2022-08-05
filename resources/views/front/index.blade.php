@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Dishes</div>

                    <div class="card-body list-group">
                        @forelse($foods as $food)
                            <li class="list-group-item">
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
                            </li>
                            <a class="btn btn-outline-primary" href="{{ route('food-show', $food->id) }}">Learn more</a>
                            <a class="btn btn-outline-success" href="{{ route('front-rate', $food) }}">Rate it!</a>
                            <a class="btn btn-outline-success" href="{{ route('login') }}">Log in to Rate!</a>

                        @empty
                            <li class="list-group-item">Nothing to show :/</li>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
