@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Dishes</div>
                    @include('front.box')

                    <div class="card-body list-group">
                        @forelse($foods as $food)
                            <li class="list-group-item">
                                <div class="">
                                    <h3>{{ $food->name }}</h3>
                                    <br>
                                    <span>Find at: {{ $food->title }}</span>
                                    <br>
                                    <span>Price: {{ $food->price }}</span>
                                    <br>
                                    <span>Rating: {{ $food->rating }}</span>
                                    <br>
                                    <span>Photo: <img src="{{ $food->photo }}"></span>
                                </div>
                            </li>
                            <a class="btn btn-outline-primary" href="{{ route('food-show', $food->id) }}">Learn more</a>
                            @if (Auth::user()?->role < 1)
                                <a class="btn btn-outline-success" href="{{ route('login') }}">Log in to Rate!</a>
                            @endif
                            @if (Auth::user()?->role > 0)
                                <a class="btn btn-outline-success" href="{{ route('front-rate', $food->id) }}">Rate it!</a>
                            @endif
                        @empty
                            <li class="list-group-item">Nothing to show :/</li>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
