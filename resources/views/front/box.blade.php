<div class="card">
    <div class="card-header">
        SORT FILTER SEARCH
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="">
                    <form class="" action="{{ route('front-index') }}" method="GET">
                        <label>Sort by</label>
                        <select name="sort">
                            <option value="default" @if ($sort == 'default') selected @endif>Recommended</option>
                            <option value="food-asc" @if ($sort == 'food-asc') selected @endif>Dishes A-Z</option>
                            <option value="food-desc" @if ($sort == 'food-desc') selected @endif>Dishes Z-A</option>
                            <option value="restaurant-asc" @if ($sort == 'restaurant-asc') selected @endif>Restaurants A-Z</option>
                            <option value="restaurant-desc" @if ($sort == 'restaurant-desc') selected @endif>Restaurants Z-A</option>
                            <option value="rating-asc" @if ($sort == 'rating-asc') selected @endif>Rating min-max</option>
                            <option value="rating-desc" @if ($sort == 'rating-desc') selected @endif>Rating max-min</option>
                        </select>
                        <button class="btn btn-outline-info ml-1" type="submit">Sort</button>
                        <div>
                            <select name="restaurant_id">
                                <option value="0" @if ($filter == 0) selected @endif>All Restaurants</option>
                                @foreach ($restaurants as $restaurant)
                                    <option value="{{ $restaurant->id }}"
                                        @if ($filter == $restaurant->id) selected @endif>{{ $restaurant->title }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-outline-success" type="submit">Filter</button>
                        </div>
                        <a class="btn btn-outline-danger" href="{{ route('front-index') }}">Reset</a>
                    </form>
                </div>
            </div>
        </div>

        <form class="" action="{{ route('front-index') }}" method="GET">
            <div class="container">
                <div class="row">
                    <div class="">
                    <label>Search by keyword:</label>
                    <input class="" type="text" name="s" value="{{$s}}"/>
                    </div>
                </div>
                <button class="btn btn-outline-success" type="submit">Find</button>

            </div>
        </form>
    </div>
</div>
