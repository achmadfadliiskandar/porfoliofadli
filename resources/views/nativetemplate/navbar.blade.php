<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#F76E11;">
    <div class="container">
        <a class="navbar-brand" href="/">Achmad Fadli Iskandar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/#about">About</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="/#kemampuan">Kemampuan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/#blog">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/#contact">Contact</a>
            </li>
            <li class="nav-item dropdown">
                @if (empty(Auth::user()->name))
                    <li class="nav-item">
                        <a href="/loginuser" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="/registeruser" class="nav-link">Register</a>
                    </li>
                @else
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->name}}
                </a>
                <ul class="dropdown-menu bg-danger" aria-labelledby="navbarDropdown">
                    <li>
                        <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('yakin ingin logout?')">
                            @csrf

                            {{-- <a class="text-danger text-decoration-none text-center" href="route('logout')"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a> --}}
                            <div class="d-grid gap-2">
                            <button class="btn btn-danger btn btn-block">Log Out</button>
                            </div>
                        </form>
                    </li>
                </ul>
                @endif
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>