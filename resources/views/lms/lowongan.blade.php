@extends('lms.main')
@section('title') Home @endsection
@section('container')
<link rel="stylesheet" href=" {{ asset('css/lowongan.css')}}">
<!-- NAV REKAYASA -->
<nav style="z-index: 2;" class="navbar navbar-expand-lg navbar-light bg-light position-relative w-100 py-3">
    <div class="container-fluid px-4 px-lg-5">
        <a class="navbar-brand" href="#"><img src="assets/img/spero-logo-removebg-preview-edit.png" class="w-75"
                alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle dropdown-materi" href="#" id="navbarDropdownMenuLink"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Materi
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Daftar Lowongan</a>
                </li>
            </ul>
            <div class="search me-5">
                <form class="d-flex">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-none btn-search" type="submit"><img src="assets/img/search-icon.png"
                            alt=""></button>
                </form>
            </div>
            <div class="notification d-flex gap-3">
                <button type="button" class="btn btn-notif position-relative">
                    <img class="" src="assets/img/lonceng-logo.png" alt="">
                    <span
                        class="position-absolute top-25 start-75 translate-middle p-2 bg-danger border border-light rounded-circle">
                        <span class="visually-hidden">New alerts</span>
                    </span>
                </button>
                <button type="button" class="btn btn-notif position-relative">
                    <img class="" src="assets/img/profil-icon.png" alt="">
                    <span
                        class="position-absolute top-25 start-75 translate-middle p-2 bg-danger border border-light rounded-circle">
                        <span class="visually-hidden">New alerts</span>
                    </span>
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- DASHBOARD -->
<section id="dashboard__content">
    <div class="px-4 px-lg-5">
        <div class="row">
            <div class="col-md-12 top mt-5">
                <h2 class="mb-4">Pengumuman</h2>
                <div class="pengumuman__content mt-2">
                    <div class="pc__content mt-2" id="place__notifikasi">
                        @foreach ($Notifikasi as $item)
                            <h4>{{$item->judul_notifikasi}}</h4>
                            <div class="pcc__c">
                                <div class="c-left">
                                    <p>{{$item->keterangan}}</p>
                                </div>
                                <div class="c-right">
                                    <p>{{$item->tanggal}}</p>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>

                {{-- <ul class="nav nav-pills mb-3 mt-5" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link daylist active" id="pills-materiSales-tab" data-bs-toggle="pill" data-bs-target="#pills-materiSales" type="button" role="tab" aria-controls="pills-materiSales" aria-selected="true">Materi Sales</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link daylist" id="pills-materiTeamLeader-tab" data-bs-toggle="pill" data-bs-target="#pills-materiTeamLeader" type="button" role="tab" aria-controls="pills-materiTeamLeader" aria-selected="false">Materi Team Leader</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link daylist" id="pills-materiAreaKoordinator-tab" data-bs-toggle="pill" data-bs-target="#pills-materiAreaKoordinator" type="button" role="tab" aria-controls="pills-materiAreaKoordinator" aria-selected="false">Materi Area Koordinator</button>
                        </li>
                      </ul> --}}
                <hr class="bg-dark border-2 border-top border-dark">

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-materiSales" role="tabpanel"
                        aria-labelledby="pills-materiSales-tab">
                        <div class="row d-flex tc__mapel">
                            @foreach ($Materi as $item)
                            <div class="col-lg-3 col-xl-3 col-md-4 col-sm-6 mt-3" id="mapel">
                                <a href="{{url('/lowonganHomeExam/'.$item->id)  }}">
                                    <div class="tc__content ">
                                        <div class="tcc__top d-flex gap-3">
                                            <div class="tcc__left"><img src="{{ asset('../img/matematica-icon.png')}}  "
                                                    alt=""></div>
                                            <div class="tcc__right">
                                                <h3>{{$item->nama}}</h3>
                                                <p>{{mb_strimwidth($item->keterangan, 0, 30, '...');}}</p>
                                            </div>
                                        </div>
                                        <div class="tcc__bottom">
                                            <div class="tccb__content gap-2 ">
                                                <div class="tccbl__left"><img src="{{ asset('../img/book-icon.png')}}  "
                                                        alt="" style="width: 1.5rem;">
                                                </div>
                                                <div class="tccbl__right">
                                                    <p>{{$item->jumlahData}}</p>
                                                </div>
                                            </div>
                                            <div class="tccb__content gap-2" id="tccb__last">
                                                <div class="tccbl__left"><img
                                                        src="{{ asset('../img/people-icon.png')}}  " alt=""
                                                        style="width: 1.25rem;">
                                                </div>
                                                <div class="tccbl__right">
                                                    <p>35</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-materiTeamLeader" role="tabpanel"
                        aria-labelledby="pills-materiTeamLeader-tab">SELASA</div>
                    <div class="tab-pane fade" id="pills-materiAreaKoordinator" role="tabpanel"
                        aria-labelledby="pills-materiAreaKoordinator-tab">RABU</div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@section('custom__script')
<script type="text/javascript">
    
    // Jquery Random Color
    $( document ).ready(function() {
        $(".tc__content").each(function(index) {
            var colorR = Math.floor((Math.random() * 356));
            var colorG = Math.floor((Math.random() * 356));
            var colorB = Math.floor((Math.random() * 356));
            $(this).css("background-color", "rgb(" + colorR + "," + colorG + "," + colorB + ")");
        });
    });

    // Jquery Waktu RealTime
    function getDateTime() {
        var now     = new Date(); 
        // var year    = now.getFullYear();
        // var month   = now.getMonth()+1; 
        // var day     = now.getDate();
        var hour    = now.getHours();
        var minute  = now.getMinutes();
        var second  = now.getSeconds(); 
        // if(month.toString().length == 1) {
        //      month = '0'+month;
        // }
        // if(day.toString().length == 1) {
        //      day = '0'+day;
        // }   
        if(hour.toString().length == 1) {
             hour = '0'+hour;
        }
        if(minute.toString().length == 1) {
             minute = '0'+minute;
        }
        if(second.toString().length == 1) {
             second = '0'+second;
        }   
        var dateTime = hour+':'+minute+':'+second+' '+'WIB';   
         return dateTime;
    }
    // example usage: realtime clock
    setInterval(function(){
        currentTime = getDateTime();
        document.getElementById("digital-clock").innerHTML = currentTime;
    }, 1000);
</script>
@endsection
