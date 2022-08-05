@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Autoservices</div>

                    <div class="card-body list-group">
                        @forelse($restaurants as $restaurant)
                            <li class="list-group-item">
                                <div class="">
                                    <h3>{{ $restaurant->title }}</h3>
                                    <br>
                                    <span>City: {{ $restaurant->city }}</span>
                                    <br>
                                    <span>Address: {{ $restaurant->address }}</span>
                                    <br>
                                    <span>Open hours: {{ $restaurant->open }}</span>
                                </div>
                            </li>
                            {{-- <a class="btn btn-outline-primary" href="{{ route('restaurant-show', $restaurant->id) }}">Learn more</a> --}}
                            @if (Auth::user()->role > 3)
                                <a class="btn btn-outline-success"
                                    href="{{ route('restaurant-edit', $restaurant) }}">Edit</a>
                                <form class="" action="{{ route('restaurant-delete', $restaurant) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger" type="submit">Delete</button>
                                </form>
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
