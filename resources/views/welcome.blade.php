@extends('layouts/app')
@section('content')

<main>


    <div class="logo mt-5">
        <h1 class="text-center">Welcome to Kantaro</h1>
    </div>

    <p> Grant Kantaro access to your Spotify account to enjoy it without limitations.</p>

    <div class="mt-6">
        <label for="now">Click here to get more information about the Spotify access.</label>
        <a class="btn btn_save mb-4" id="now" href="{{ route('auth') }}">Grant access now</a>
        <label for="later" class="text-muted">Or click here to skip this step for now. From your profile you can link your Spotify account anytime.</label>
        <a class="btn btn_cancel mb-4" id="later" href="{{ route('home') }}">Grant access later</a>
    </div>
    <p>And in case you change your mind, visit your Spotify account to remove the access.</p>

</main>

@endsection