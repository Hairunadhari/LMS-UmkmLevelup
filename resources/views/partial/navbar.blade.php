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