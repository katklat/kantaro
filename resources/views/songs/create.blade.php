@extends('layouts/app')
@section('content')

<!-- issue: chosen file/emoji is not shown in input -->
<!-- ToDo: add basket selection -->

<main>

    <section class="tools mt-3">

        <form method="POST" action=" {{route('songs.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="tools__dropdown">
                <input id="tools__dropdown1" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown1" class="dropdown__label"><img src={{ asset('images/note.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="song" alt="">Search title</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">
                        <div class="form-group">
                            <div class="input-group input-group-append input-group-sm">
                                <input name='q' type="text" size="500" class="form-control input__query" aria-label="Small" aria-describedby="inputGroup-sizing-md" placeholder="Search Spotify database">
                                <button type="submit" class="btn"></button>
                                <img src={{ asset('images/search.svg') }} class="filter-secondary mr-2" width="28" height="28" title="search" alt="">
                            </div>
                            <div class="tools__dropdown mt-2">
                                <input id="tools__dropdown6" class="dropdown__toggle" type="checkbox">
                                <label for="tools__dropdown6" class="dropdown__label dropdown__label--underlined">Enter title and artist manually</label>
                                <div class="dropdown__hidden">
                                    <div class="dropdown__content">
                                        <div class="form-group">
                                            <label class="control-label">add title</label>
                                            <input type="text" class="form-control" name="title" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="artist">add artist</label>
                                            <input type="text" class="form-control" name="artist" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            <div class="tools__dropdown">
                <input id="tools__dropdown2" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown2" class="dropdown__label"><img src={{ asset('images/text.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="entry" alt="">Edit entry</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">
                        <div class="form-group">
                            <textarea class="form-control" rows="5" name="entry">Say something about this song</textarea>
                        </div>

                    </div>
                </div>
            </div>

            <div class="tools__dropdown">
                <input id="tools__dropdown3" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown3" class="dropdown__label"><img src={{ asset('images/image.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="picture" alt="">Choose song picture</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">
                        <div class="input-group">
                            <input name="image" type="file" class="custom-file-input" id="inputGroupImage" aria-describedby="inputGroupImage">
                            <label class="custom-file-label" for="inputGroupImage">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tools__dropdown">
                <input id="tools__dropdown4" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown4" class="dropdown__label"><img src={{ asset('images/emoji.svg') }} class="filter-secondary inline mr-1" width="30" height="30" title="emoji" alt="">Add emojis</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">
                        <div class="form-group">
                            <input type="text" class="form-control" name="emoji">
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="tools__dropdown">
                <input id="tools__dropdown5" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown5" class="dropdown__label"><img src={{ asset('images/list.svg') }} class="filter-secondary inline mr-1" width="30" height="30" title="emoji" alt="">Add this song to a list</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">
                        <div class="form-group">
                            <label for="group4">select lists </label>
                            <select autocomplete="off" class="form-control type=" text" name=" lists[]" size="10" multiple>
                                <option value=""> </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6">
                <a class="btn btn_cancel ml-2 " href="{{ route('songs.index') }}">Cancel</a>
                <button class="btn btn_save ml-2" type="submit">Save</button>
            </div>
        </form>
    </section>
</main>

@endsection