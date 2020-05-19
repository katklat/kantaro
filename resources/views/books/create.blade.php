@extends('layouts/app')
@section('content')

<main>
    <form method="POST" action="{{route('books.store')}}">
        @csrf
        <div class="form-group mt-4">
            <label for="name">give your new book a name</label>
            <input type="text" class="form-control" name="name" placeholder="">
            @error('name')<p>{{ $errors->first('name') }}</p>@enderror
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
            <label for="month">enter month and year</label>
            <div class="row">
                <div class="col-8">
                    <input type="month" class="form-control" name="month" placeholder="enter month">
                </div>
                <div class="col-4">
                    <input type="integer" name="year" class="form-control" placeholder="year">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="location">add a location or a festival name</label>
            <input type="text" class="form-control" name="location" placeholder=" enter city, country or festival">
        </div>

        <div class="mt-6">
            <a class="btn btn_cancel" href="{{ route('books.index') }}">Cancel</a>
            <button type="submit" class="btn ml-2 btn_save">Save </button>
        </div>
    </form>
</main>

@endsection