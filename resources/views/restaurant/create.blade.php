@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add a new Restaurant</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('restaurant-store') }}">
                            <li>Restaurant: <input type="text" name="title"></li>
                            <li>City: <input type="text" name="city"></li>
                            <li>Address: <input type="text" name="address"></li>
                            <li>Open hours: <input type="text" name="open"></li>
                            @csrf
                            <button type="submit">Add Restaurant</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
