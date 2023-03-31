<nav class="navbar navbar-light bg-light">
    @auth
        <div class="container-fluid justify-content-between container-sm">
    @endauth
    @guest
        <div class="container-fluid justify-content-center container-sm">
    @endguest
        <div>
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/logo_kominfo.png')}}" alt="logo_kominfo" style="" />
            </a>
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/logo_modi.png')}}" alt="logo_modi" />
            </a>
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/logo_umkm.png')}}" alt="logo_umkm" />
            </a>
        </div>
        @auth
            <div class="">
                Hi, {{ auth()->user()->name }} | <a href="#">Histori</a> | <a href="#">Profil</a> | <a href="logout">Logout</a>
            </div>
        @endauth
    </div>
</nav>