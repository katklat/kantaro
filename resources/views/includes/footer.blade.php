<footer class="p-0 fixed-bottom">
    <ul class="nav nav-pills navbar-dark d-flex flex-row text-center justify-content-around">
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="{{ route('home') }}">Home</a> </li>
        <li class="nav-item">
            <a class="nav-link nav-link--selected" data-toggle="tab" href="{{ route('baskets.index') }}">Lists</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="{{ route('songs.index') }}">Songs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="{{ route('settings') }}">Settings</a>
        </li>
    </ul>
</footer>