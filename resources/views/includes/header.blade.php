<header class="">
    <div class="includes fixed-top">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{route('lists.index')}}"> <img src="/images/back.svg" class="filter-primary inline" width="44" height="44" title="add" alt=""> </a>
            <img src="/images/plus.svg" class="filter-primary inline" width="36" height="36" title="add" alt="">
            <form method="GET" class="form-inline my-2 my-lg-0" action="">
                @csrf
                <div class="input-group input-group-sm">
                    <input name='q' type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search in playlists...">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary btn-number">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</header>