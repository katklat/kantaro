@extends('layouts/app')
@section('content')

<main>
    <form method="POST" action="{{route('baskets.store')}}">
        @csrf
        <div class="form-group mt-4">
            <label for="name">give it a name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter a name for the list">
        </div>
        <div class="form-group">
            <label for="occasion">add an occasion</label>
            <div class="segmented-control" id="sc1">
                <input type="radio" name="occasion" id="sc-3-1-1" value="travel">
                <input type="radio" name="occasion" id="sc-3-1-2" value="festival">
                <input type="radio" name="occasion" id="sc-3-1-3" value="other" checked>
                <label for="sc-3-1-1" data-value="travel">travel</label>
                <label for="sc-3-1-2" data-value="festival">festival</label>
                <label for="sc-3-1-3" data-value="other">other</label>
            </div>
        </div>

        <div class="form-group">
            <label for="month">select a month and year</label>
            <div class="row">
                <div class="col-8">
                    <input type="month" class="form-control" name="month" placeholder="enter month">
                </div>
                <div class="col-4">
                    <input type="number" name="year" class="form-control" min="1900" max="2099" step="1" value="2020">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="location">add a location</label>
            <input type="text" class="form-control" name="location" placeholder=" enter city, region or country">
        </div>

        <div class="mt-6">
            <a class="btn btn_cancel" href="{{ route('baskets.index') }}">Cancel</a>
            <button type="submit" class="btn ml-2 btn_save">Save </button>
        </div>
    </form>
</main>

@endsection