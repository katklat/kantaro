@extends('layouts/app')
@section('content')

<main>

    <section class="tools mt-3">

        <form>
            <div class="tools__dropdown">
                <input id="tools__dropdown1" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown1" class="dropdown__label"><img src={{ asset('images/tag.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Change name</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">

                        <div class="form-group">
                            <input type="text" class="form-control" id="name" placeholder="Current name">
                        </div>

                    </div>
                </div>
            </div>

            <div class="tools__dropdown">
                <input id="tools__dropdown2" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown2" class="dropdown__label"><img src={{ asset('images/text.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Edit entry</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">
                        <div class="form-group">
                            <textarea class="form-control" rows="5" type="text" name="entry" value="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto accusantium voluptatibus voluptatem voluptate libero cumque eos, maxime aut, molestias laboriosam deserunt non a placeat consectetur eveniet beatae tempora, autem incidunt quam numquam ipsam quos natus unde rem. Ipsa quos quaerat quia mollitia, dolor, eius facere accusantium quidem, laudantium ea nam.</textarea>

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
                            <input type="text" class="form-control" id="location" placeholder="Current location">
                        </div>

                    </div>
                </div>
            </div>

            <div class="tools__dropdown">
                <input id="tools__dropdown5" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown5" class="dropdown__label"><img src={{ asset('images/image.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Choose list picture</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">
                        <label for="group2">add or change the picture for this list</label>
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
                <label for="tools__dropdown6" class="dropdown__label"><img src={{ asset('images/emoji.svg') }} class="filter-secondary inline mr-1" width="30" height="30" title="add" alt="">Add emojis</label>
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
            <div class="tools__dropdown">
                <input id="tools__dropdown7" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown7" class="dropdown__label"><img src={{ asset('images/delete.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Delete list</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">
                        <div class="form-group text-right">
                            <a class="btn ml-2 btn_delete" href="{{ route('songs.index') }}">Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="mt-6">
            <a class="btn btn_cancel ml-2 " href="{{ route('lists.show') }}">Cancel</a>
            <a class="btn btn_save ml-2" href="{{ route('lists.create.success') }}">Save</a>

        </div>
    </section>



</main>

@endsection