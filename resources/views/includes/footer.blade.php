<footer class="p-0 fixed-bottom">
    <ul class="nav nav-pills navbar-dark d-flex flex-row text-center justify-content-around">
        <li class="nav-item">
            <a class="nav-link {{Request::is('*/') ? 'nav-link--selected' : ''}}" data-toggle=" tab" href="{{ route('home') }}">Home</a> </li>
        <li class="nav-item">
            <a class="nav-link {{Request::is('baskets*') ? 'nav-link--selected' : ''}}" data-toggle="tab" href="{{ route('baskets.index') }}">Lists</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{Request::is('songs*') ? 'nav-link--selected' : ''}}" data-toggle="tab" href="{{ route('songs.index') }}">Songs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{Request::is('settings') ? 'nav-link--selected' : ''}}" data-toggle="tab" href="{{ route('settings') }}">Settings</a>
        </li>
    </ul>
    <script>
        document.querySelector('.custom-file-input').addEventListener('change', function(e) {
            var fileName = document.getElementById("inputFile").files[0].name;
            var nextSibling = e.target.nextElementSibling
            nextSibling.innerText = fileName
        })
    </script>
</footer>