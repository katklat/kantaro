<header>
    <div class="header fixed-top">
        <div class="container d-flex">
            <a href="{{route('lists.index')}}"> <img src="/images/back.svg" class="filter-primary inline" width="44" height="44" title="add" alt=""> </a>
            @if (!Request::is('*create*'))

            <a href="{{route('lists.create')}}"> <img src="/images/plus.svg" class="filter-primary inline mt-1 mr-2" width="36" height="36" title="add" alt=""></a>

            <form method="GET" class="form-inline my-2 my-lg-0" action="">
                @csrf
                <div class="input-group input-group-sm">
                    <input name='q' type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search in lists and songs...">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary btn-number">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            @else <h2 class="ml-2 header-dark">Create a new list</h2>
            @endif
        </div>
    </div>
</header>