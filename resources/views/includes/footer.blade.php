<footer class="p-0 fixed-bottom">
    <ul class="nav nav-pills navbar-dark d-flex flex-row text-center justify-content-around">
        <li class="nav-item">
            <a class="nav-link {{Request::is('*/') || Request::is('home') ? 'nav-link--selected' : ''}}" data-toggle=" tab" href="{{ route('home') }}">Home</a> </li>
        <li class="nav-item">
            <a class="nav-link {{Request::is('books*') ? 'nav-link--selected' : ''}}" data-toggle="tab" href="{{ route('books.index') }}">Books</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{Request::is('songs*') ? 'nav-link--selected' : ''}}" data-toggle="tab" href="{{ route('songs.index') }}">Songs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{Request::is('settings') ? 'nav-link--selected' : ''}}" data-toggle="tab" href="{{ route('settings') }}">Settings</a>
        </li>
    </ul>
</footer>