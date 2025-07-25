<nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('homepage') }}">Presto.it</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('homepage') }}">Home</a>
                </li>
            </ul>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('article.index') }}">Tutti gli articoli</a>
            </li>
           
<form class="d-flex ms-auto" role="search" action="{{ route('article.search') }}" method="GET">
    <div class="input-group">
        <input type="search" name="query" class="form-control" placeholder="Search" aria-label="search">
        <button type="submit" class="input-group-text btn btn-outline-success"
                id="basic-addon2">Search</button>
    </div>
</form>
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Ciao, {{ Auth::user()->name }}
                    </a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Categorie
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item"
                                        href="{{ route('byCategory', ['category' => $category]) }}">{{ $category->name }}</a>
                                </li>
                                @if (!$loop->last)
                                    <hr class="dropdown-divider">
                                @endif
                            @endforeach
                        </ul>
                    </li>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li><a class="dropdown-item" href="{{ route('create.article') }}">Crea</a></li>

             

                        @auth
    @if (Auth::user()->is_revisor)
        <li class="nav-item">
            <a class="nav-link btn btn-outline-success btn-sm position-relative w-sm-25"
                href="{{ route('revisor.index') }}">Zona revisore
                <span
                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ \App\Models\Article::toBeRevisedCount() }}
                </span>
            </a>
        </li>
    @endif
@endauth

                    </ul>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Ciao, utente!
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('login') }}">Accedi</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                    </ul>
                </li>
            @endauth
        </ul>
    </div>
</div>
</nav>