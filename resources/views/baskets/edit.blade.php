@extends('layouts/app')
@section('content')

<main>

    <section class="tools mt-3">
        <form method="POST" action="{{ route('baskets.update', $basket->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="tools__dropdown">
                <input id="tools__dropdown1" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown1" class="dropdown__label"><img src={{ asset('images/tag.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Change name</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="{{ old('name') ?? $basket->name }}">
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
                            <textarea class="form-control" rows="5" name="entry" placeholder="say something about this list">{{ old('entry') ?? $basket->entry }}</textarea>
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
                            <label for="month">edit month and year</label>
                            <div class="row">
                                <div class="col-8">
                                    <input type="month" class="form-control" name="month" placeholder="enter a month" value="{{ old('month') ?? $basket->month }}">
                                </div>
                                <div class="col-4">
                                    <input <input type="integer" name="year" class="form-control" placeholder="year" value="{{ old('year') ?? $basket->year }}">
                                </div>
                            </div>
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
                            <input type="text" class="form-control" name="location" placeholder="add a location or festival" value="{{ old('location') ?? $basket->location}}">
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
                                <span class="input-group-text"><i class="far fa-file-image"></i></span>
                            </div>
                            <div class="custom-file">
                                <input name="image" type="file" id="inputFile" class="custom-file-input">
                                <label class="custom-file-label" for="inputFile">choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tools__dropdown">

                <input id="tools__dropdown6" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown6" class="dropdown__label"><img src={{ asset('images/emoji.svg') }} class="filter-secondary inline mr-1" width="28" height="28" title="add" alt="">Add emojis</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">
                        <div class="form-group">
                            <input type="text" class="form-control" name="emoji" value="{{ old('emoji') ?? $basket->emoji }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6">
                <a class="btn btn_cancel ml-2 " href="{{ route('baskets.show',$basket) }}">Cancel</a>
                <button class="btn btn_save ml-2" type="submit">Save</button>
            </div>
        </form>
        <div class="tools__dropdown mt-4">
            <form method='POST' action="{{ route('baskets.destroy', $basket->id) }}">
                @csrf
                @method('DELETE')
                <input id="tools__dropdown7" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown7" class="dropdown__label"><img src={{ asset('images/delete.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Delete list</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">
                        <div class="form-group text-right">
                            <button class="btn ml-2 btn_delete" type="submit">Delete</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>

@endsection