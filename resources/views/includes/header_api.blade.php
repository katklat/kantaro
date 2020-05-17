<header>
    <div class="header fixed-top">
        <div class="container d-flex">
            <form method="POST" class="form-inline my-2 my-lg-0" @if (Request::is('*/songs*')) action="{{ url("/songs/search/track") }}" @elseif (Request::is('*/baskets*')) action="{{ url("/baskets/search/playlist") }}" @endif>
                @csrf
                <div class=" input-group input-group-sm">
                    <input name='q' type="text" class="form-control ml-4 mt-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search with Spotify...">
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