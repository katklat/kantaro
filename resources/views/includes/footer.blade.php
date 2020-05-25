<footer class="p-0 fixed-bottom">
    @if (Request::is('books') || Request::is('books/create'))
    <ul class="nav nav-pills navbar-dark d-flex flex-row text-center justify-content-start">
        <li class="nav-item">
            <a class="nav-link {{Request::is('books/create') ? 'nav-link--selected' : 'nav__option'}}" href="{{ route('books.create') }}">new Book</a>
        </li>
    </ul>
    @endif
    @if (Request::is('books/*') && !Request::is('books/*/*') && !Request::is('*create*'))
    <ul class="nav nav-pills navbar-dark d-flex flex-row text-center justify-content-start">
        <li class="nav-item">
            <a class="nav-link nav__option" data-toggle="tab" href="{{ route('songs.create') }}">add Song</a>
        </li>
    </ul>
    @endif
    @if (Request::is('songs')||Request::is('songs/create'))
    <ul class="nav nav-pills navbar-dark d-flex flex-row text-center justify-content-end">
        <li class="nav-item">
            <a class="nav-link {{Request::is('songs/create*') ? 'nav-link--selected' : 'nav__option'}}" data-toggle="tab" href="{{ route('songs.create') }}">new Song</a>
        </li>
    </ul>
    @endif
    <ul class="nav nav-pills nav__primary navbar-dark d-flex flex-row text-center justify-content-around">
        <li class="nav-item">
            <a class="nav-link {{Request::is('*/') || Request::is('home') ? 'nav-link--selected' : ''}}" data-toggle=" tab" href="{{ route('home') }}">Home</a> </li>
        <li class="nav-item">
            <a class="nav-link {{Request::is('books*') ? 'nav-link--selected' : ''}}" data-toggle="tab" href="{{ route('books.index') }}">Books</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{Request::is('songs*') ? 'nav-link--selected' : ''}}" data-toggle="tab" href="{{ route('songs.index') }}">Songs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{Request::is('profile') ? 'nav-link--selected' : ''}}" data-toggle="tab" href="{{ url('/profile') }}">Profile</a>
        </li>
    </ul>
</footer>