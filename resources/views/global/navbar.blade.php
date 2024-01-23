<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">TimeDoor Test</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav  mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="{{ $pages == 'home' ? 'nav-link  active' : 'nav-link'}}" aria-current="page" href="{{ route('books_list.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="{{ $pages == 'author' ? 'nav-link  active' : 'nav-link'}}" href="{{ route('books_author.index') }}">Author List</a>
                </li>
                <li class="nav-item">
                    <a class="{{ $pages == 'rating' ? 'nav-link  active' : 'nav-link'}}" href="{{ route('books_rating.rating') }}">Rating</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
