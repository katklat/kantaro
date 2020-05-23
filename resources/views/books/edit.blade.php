@extends('layouts/app')
@section('content')

<main>

    <section class="tools mt-3">
        <div class="tools__dropdown">
            <form method="POST" action="{{ route('bookImage', $book->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input id="tools__image" class="dropdown__toggle" type="checkbox">
                <label for="tools__image" class="dropdown__label"><img src="{{ asset('images/image.svg') }}" class="filter-secondary inline mr-2" width="28" height="28" title="picture" alt="">Change book image</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">
                        <div class="input-group">
                            <input onChange="checkFile()" name="image" type="file" accept=".png, .jpg, .jpeg, .gif, .svg" class="custom-file-input" id="inputFile" aria-describedby="inputGroupImage">
                            <label class="custom-file-label" for="inputFile">choose image file</label>
                        </div>
                        <div class="mt-4 ">
                            <a onClick="removeFile()" class="btn btn_cancel ml-2 " href="">Cancel</a>
                            <button class="btn btn_save ml-2" type="submit">Upload</button>
                            <button name='delete' onClick="removeFile()" class="btn btn_delete ml-2" type="submit">Remove</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <form method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="tools__dropdown">
                <input id="tools__dropdown1" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown1" class="dropdown__label"><img src={{ asset('images/tag.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Change name</label>
                <div class="dropdown__hidden">
                    <div class="dropdown__content">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="{{ old('name') ?? $book->name }}">
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
                            <textarea class="form-control" rows="5" name="entry" placeholder="say something about this book">{{ old('entry') ?? $book->entry }}</textarea>
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
                                    <input type="month" class="form-control" name="month" placeholder="enter a month" value="{{ old('month') ?? $book->month }}">
                                </div>
                                <div class="col-4">
                                    <input <input type="integer" name="year" class="form-control" placeholder="year" value="{{ old('year') ?? $book->year }}">
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
                            <input type="text" class="form-control" name="location" placeholder="add a location or festival" value="{{ old('location') ?? $book->location}}">
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
                            <input type="text" class="form-control" name="emoji" value="{{ old('emoji') ?? $book->emoji }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6">
                <a class="btn btn_cancel ml-2 " href="{{ route('books.show',$book) }}">Cancel</a>
                <button class="btn btn_save ml-2" type="submit">Save</button>
            </div>
        </form>
        <div class="tools__dropdown mt-4">
            <form method='POST' action="{{ route('books.destroy', $book->id) }}">
                @csrf
                @method('DELETE')
                <input id="tools__dropdown7" class="dropdown__toggle" type="checkbox">
                <label for="tools__dropdown7" class="dropdown__label"><img src={{ asset('images/delete.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">Delete book</label>
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