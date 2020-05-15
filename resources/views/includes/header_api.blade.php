<header>
    <div class="header fixed-top">
        <div class="container d-flex">

            <a href="{{ route('songs.index') }}"> <img src={{ asset('images/back.svg') }} class="filter-secondary inline" width="48" height="48" title="add" alt=""></a>

            <form method="POST" class="form-inline my-2 my-lg-0" action="{{ route('apisearch') }}">
                @csrf
                <div class=" input-group input-group-sm">
                    <input name='q' type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search with Spotify...">
                    <div class="input-group-append">
                        <button type="submit" class="btn">
                            <img src={{ asset('images/search.svg') }} class="filter-secondary inline mr-2" width="28" height="28" title="add" alt="">
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</header>