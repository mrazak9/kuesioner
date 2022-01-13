<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link"  href="#">Program Beasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Program Prtisipasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">PPA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontak</a>
                </li>
            </ul>
            @auth
                <div class="d-flex user-logged nav-item dropdown no-arrow">
                    <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Halo, {{ Auth::user()->name }}!
                        @if (Auth::user()->avatar)
                            <img src="{{ Auth::user()->avatar }}" class="user-photo" alt="" style="border-radius: 50%">
                        @else
                            <img src="https://ui-avatars.com/api?name=Admin" class="user-photo" alt="" style="border-radius: 50%">
                        @endif                        
                        <ul class="dropdown-menu" aria-labelledby="drpodownMenuLink" style="right: 0; left:auto">
                            <li>
                                <a href="#" class="dropdown-item">My Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Sign Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                            </li>
                        </ul>
                    </a>
                </div>
            @else
                <div class="d-flex">
                    <a href="{{ route('login') }}" class="btn btn-master btn-secondary me-3">
                        Sign In
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>
