<nav class="navbar navbar-light bg-light">
    @auth
        <div class="container-fluid justify-content-between container-sm">
    @endauth
    @guest
        <div class="container-fluid justify-content-center container-sm">
    @endguest
        <div>
            @auth
                <a class="navbar-brand" href="home">
            @endauth
            @guest
                <a class="navbar-brand" href="#">
            @endguest
                <img src="{{asset('assets/logo_kominfo.png')}}" alt="logo_kominfo" style="" />
            </a>
            @auth
                <a class="navbar-brand" href="home">
            @endauth
            @guest
                <a class="navbar-brand" href="#">
            @endguest
                <img src="{{asset('assets/logo_modi.png')}}" alt="logo_modi" />
            </a>
            @auth
                <a class="navbar-brand" href="home">
            @endauth
            @guest
                <a class="navbar-brand" href="#">
            @endguest
                <img src="{{asset('asset/logo.png')}}" alt="logo umkm levelup" />
            </a>
        </div>
        @auth
            <div class="">
                Hi, {{ auth()->user()->name }} | <a href="home">Kuesioner</a> | <a href="profil">Profil</a> | <a href="logout">Logout</a>
            </div>
        @endauth
    </div>
</nav>

{{-- 
<nav class="navbar navbar-expand-lg">
    <div class="container nav-menu">
        <a class="navbar-brand" href="#">
            <img src="{{asset('asset/logo.png')}}" alt="" width="100">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">UMKM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pendaftaran</a>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}