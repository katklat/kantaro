@extends('layouts/app')
@section('content')

<main>


    <form method="GET">
        <div class="form-group">
            <label for="name">give it a name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name">
        </div>

        <div class="form-group">
            <label for="email2">select a date</label>
            <input type="date" class="form-control" id="date" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="location">add a location</label>
            <input type="text" class="form-control" id="location" placeholder="city, region or country">
        </div>

        <div class="form-group">
            <label for="sc-1">add an occasion</label>
            <div class="segmented-control" id="sc1">
                <input type="radio" name="sc-1" id="sc-3-1-1" checked>
                <input type="radio" name="sc-1" id="sc-3-1-2">
                <input type="radio" name="sc-1" id="sc-3-1-3">

                <label for="sc-3-1-1" data-value="travel">travel</label>
                <label for="sc-3-1-2" data-value="festival">festival</label>
                <label for="sc-3-1-3" data-value="other">other</label>
            </div>
        </div>
        <div class="mt-6">
            <a class="btn btn_cancel " href="{{ route('lists.index') }}">Cancel</a>
            <a class="btn ml-2" href="{{ route('lists.create.success') }}"> Save </a>
            <!-- <button class="btn ml-2" type="submit">Save</button> -->
        </div>
    </form>
</main>

@endsection