@extends('layouts/app')
@section('content')

<main>

    <section class="tools mt-3">

        <div class="tools__dropdown">

            <input id="tools__dropdown1" class="dropdown__toggle" type="checkbox">
            <label for="tools__dropdown1" class="dropdown__label"><img src={{ asset('images/upload.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Upload list to Spotify</label>
            <div class="dropdown__hidden">
                <div class="dropdown__content">
                    <div class="form-group">
                        <label for="spotify_name">name your Spotify playlist</label>
                        <input type="text" class="form-control" id="spotify_name" placeholder="Enter name">
                        <p class="mt-3">This upload will create a new playlist within your Spotify account using the song titles. It will not share photos and other information from this app. </p>
                        <a class="btn" href="#}">Upload</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <form>
            <div class="tools__dropdown">
                <input id="tools__dropdown2" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown2" class="dropdown__label"><img src={{ asset('images/tag.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Change name</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">

                        <div class="form-group">
                            <input type="text" class="form-control" id="name" placeholder="Enter name">
                        </div>

                    </div>
                </div>
            </div>

            <div class="tools__dropdown">
                <input id="tools__dropdown3" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown3" class="dropdown__label"><img src={{ asset('images/calendar.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt=""></i>Change date</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">

                        <div class="form-group">
                            <input type="text" class="form-control" id="date" placeholder="Enter date">
                        </div>

                    </div>
                </div>
            </div>

            <div class="tools__dropdown">
                <input id="tools__dropdown4" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown4" class="dropdown__label"><img src={{ asset('images/location.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Change location</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">

                        <div class="form-group">
                            <input type="text" class="form-control" id="location" placeholder="Enter location">
                        </div>

                    </div>
                </div>
            </div>

            <div class="tools__dropdown">
                <input id="tools__dropdown5" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown5" class="dropdown__label"><img src={{ asset('images/image.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Choose cover picture</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">
                        <label for="group2">add or change list picture</label>
                        <div class="input-group" id="group2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon2"><i class="far fa-file-image"></i></span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file2" aria-describedby="addon2">
                                <label class="custom-file-label" for="file2">choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tools__dropdown">
                <input id="tools__dropdown6" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown6" class="dropdown__label"><img src={{ asset('images/gem.svg') }} class="filter-secondary inline mr-1" width="28" height="28" title="add" alt="">Add emojis</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">
                        <div class="form-group">
                            <label for="group2">add upto six emojis</label>
                            <div class="input-group" id="group2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon2"><i class="far fa-file-image"></i></span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file2" aria-describedby="addon2">
                                    <label class="custom-file-label" for="file2">choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="mt-6">
            <a class="btn btn_cancel ml-2 " href="{{ route('lists.show') }}">Cancel</a>
            <a class="btn ml-2" href="{{ route('lists.create.success') }}">Save</a>
            <!-- <button class="btn ml-2" type="submit">Save</button> -->
        </div>
    </section>



</main>

@endsection