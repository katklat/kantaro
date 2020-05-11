<header>
    <div class="header fixed-top">
        <div class="container d-flex">
            @if (Request::is('*songs*'))
            <a href="{{ route('songs.index') }}"> <img src={{ asset('images/back.svg') }} class="filter-primary inline" width="48" height="48" title="add" alt=""></a>
            <a href="{{ route('songs.create') }}"> <img src={{ asset('images/plus.svg') }} class="filter-primary inline mt-2 mr-2" width="32" height="32" title="add" alt=""></a>
            @elseif (Request::is('*baskets*'))
            <a href="{{ route('baskets.index') }}"> <img src={{ asset('images/back.svg') }} class="filter-primary inline" width="48" height="48" title="add" alt=""></a>
            <a href="{{ route('baskets.create') }}"> <img src={{ asset('images/plus.svg') }} class="filter-primary inline mt-2 mr-2" width="32" height="32" title="add" alt=""></a>
            @endif
            @unless (Request::is('*create*') || Request::is('*tools*') || Request::is('*edit*') || Request::is('*settings*'))
            <form method="GET" class="form-inline my-2 my-lg-0" action="">
                @csrf
                <div class="input-group input-group-sm">
                    <input name='q' type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search in lists and songs...">
                    <div class="input-group-append">
                        <button type="submit" class="btn">
                        </button>
                        <img src={{ asset('images/search.svg') }} class="filter-primary inline mr-2" width="28" height="28" title="add" alt="">
                    </div>
                </div>
            </form>
            @endunless
        </div>
    </div>
</header>