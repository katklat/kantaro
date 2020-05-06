<header>
    <div class="header fixed-top">
        <div class="container d-flex">
            <a href="{{ route('lists.index') }}"> <img src={{ asset('images/back.svg') }} class="filter-primary inline" width="48" height="48" title="add" alt=""></a>
            @unless (Request::is('*create*') || Request::is('*tools*'))

            <a href="{{ route('lists.create') }}"> <img src={{ asset('images/plus.svg') }} class="filter-primary inline mt-2 mr-2" width="32" height="32" title="add" alt=""></a>

            <form method="GET" class="form-inline my-2 my-lg-0" action="">
                @csrf
                <div class="input-group input-group-sm">
                    <input name='q' type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search in lists and songs...">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary btn-number">

                        </button>
                        <img src="/images/search.svg" class="filter-primary inline mr-2" width="28" height="28" title="add" alt="">
                    </div>
                </div>
            </form>
            @endunless
        </div>
    </div>
</header>