@extends('layouts/app')
@section('content')

<main>
    <div class="container text-center">
        <h2 class="m-3">Success!</h2>


        <div class="text-left my-4">
            <h4>Your new list is waiting for content.</h4>
            <h4>Visit your new list and click on <img class="inline filter-white" src={{ asset('images/plus.svg') }} class="filter-primary inline mt-1 mr-2" width="20" height="20" title="add" alt=""> to add some songs.</h4>
            <h4>There you can customize your list even more by clicking the <span class="text-light">Tools</span> tab.</h4>
        </div>
        <a class="btn ml-2" href="{{ route('lists.show') }}">Visit list now</a>
    </div>
</main>
@endsection