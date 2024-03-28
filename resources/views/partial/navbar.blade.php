<style>
    @media only screen and (max-width: 600px) {
        .keranjangumkm {
            width: 130px;
        }
        .bungkusimg{
            margin-bottom: 1rem;;
        }
       
    }

</style>
<nav class="navbar">
    @auth
    <div class="container-fluid  container-sm">
        @endauth
        @guest
        <div class="container-fluid  container-sm">
            @endguest
            <div class="bungkusimg">
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
                                <img src="{{asset('asset/logo.png')}}" class="keranjangumkm" alt="logo umkm levelup" />
                            </a>
            </div>
            @auth
            <nav class="for-dropdown">
                <ul>
                    <li><span class="badge badge-primary bg-success"><i class="fa fa-user"></i> Hi,
                            {{ auth()->user()->name }}</span></li>
                    <li><a href="home"><i class="fa fa-home"></i> Home</a></li>
                    @if (auth()->user()->profil == 1)
                    <li><a href="profil"><i class="fa fa-address-book"></i> Profil</a></li>
                    @endif
                    <li><a href="logout"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
            </nav>
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
