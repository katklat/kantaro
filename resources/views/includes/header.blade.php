<header>
    <div class="header fixed-top">
        <div class="container d-flex">
            @if (Request::is('*edit*')||Request::is('*tools*'))
            <a href="{{ url()->previous() }}"> <img src={{ asset('images/back.svg') }} class="filter-secondary inline" width="48" height="48" title="add" alt=""></a>
            @elseif (Request::is('*books*'))
            <a href="{{ route('books.index') }}"> <img src={{ asset('images/back.svg') }} class="filter-secondary inline" width="48" height="48" title="add" alt=""></a>
            @elseif (Request::is('*songs*'))
            <a href="{{ route('songs.index') }}"> <img src={{ asset('images/back.svg') }} class="filter-secondary inline" width="48" height="48" title="add" alt=""></a>
            @else
            <a href="{{ route('home') }}"> <img src={{ asset('images/back.svg') }} class="filter-secondary inline" width="48" height="48" title="add" alt=""></a>
            @endif

            @if (Request::is('home*') || Request::is('books') || Request::is('books/show/*') || Request::is('songs'))
            <form method="GET" class="form-inline my-2 my-lg-0" action="{{ route('search') }}">
                @csrf
                <div class=" input-group input-group-sm">
                    <input name='q' type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search in books and songs...">
                    <div class="input-group-append">
                        <button type="submit" class="btn">
                            <img src={{ asset('images/search.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">
                        </button>
                    </div>
                </div>
            </form>
            @endif

        </div>
    </div>
</header>