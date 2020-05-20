<header>
    <div class="header fixed-top">
        <div class="container d-flex">

            <a href="{{ url()->previous() }}"> <img src={{ asset('images/back.svg') }} class="filter-secondary inline" width="48" height="48" title="add" alt=""></a>
            @if (Request::is('*baskets'))
            <a href="{{ route('baskets.create') }}"> <img src={{ asset('images/plus.svg') }} class="filter-secondary inline mt-2 mr-2" width="32" height="32" title="add" alt=""></a>
            @else
            <a href="{{ route('songs.create') }}"> <img src={{ asset('images/plus.svg') }} class="filter-secondary inline mt-2 mr-2" width="32" height="32" title="add" alt=""></a>
            @endif
            @unless (Request::is('*create*') || Request::is('*tools*') || Request::is('*edit*') || Request::is('*settings*'))
            <form method="GET" class="form-inline my-2 my-lg-0" action="{{ route('search') }}">
                @csrf
                <div class=" input-group input-group-sm">
                    <input name='q' type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search in lists and songs...">
                    <div class="input-group-append">
                        <button type="submit" class="btn">
                            <img src={{ asset('images/search.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">
                        </button>
                    </div>
                </div>
            </form>
            @endunless
        </div>
    </div>
</header>