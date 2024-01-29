@extends('lms.main')
@section('title') Home @endsection
@section('container')
<style>
    /* Custom CSS */
.accordion-button:not(.collapsed) {
    color: black;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
}

</style>
<link rel="stylesheet" href="{{ asset('css/lowongan.css')}}">
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
                <div class="row">
                    <div class="col-md-8">
                        {{-- <hr class="bg-dark border-2 border-top border-dark"> --}}
                        <h4>List Materi </h4>
                        <hr />
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-materiSales" role="tabpanel"
                                aria-labelledby="pills-materiSales-tab">
                                <div class="row d-flex tc__mapel">
                                    @foreach ($Materi as $item)
                                    <div class="col-lg-4 col-xl-4 col-md-4 col-sm-6 mt-3"  id="mapel">
                                        <a href="{{url('/lowonganHomeExam/'.$item->id)  }}">
                                            <div class="tc__content " style="border: 1px solid gray">
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
                                                            <p>{{$item->jumlahData ?? 0}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="tccb__content gap-2" id="tccb__last">
                                                        <div class="tccbl__left " style="color: gray">
                                                            <i class="fas fa-user-check"></i>
                                                        </div>
                                                        <div class="tccbl__right">
                                                            <p>{{$item->jumlah_progres_user_selesai}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="tccb__content gap-2" id="tccb__last">
                                                        <div class="tccbl__left " style="color: gray">
                                                            <i class="fas fa-user-clock"></i>
                                                        </div>
                                                        <div class="tccbl__right">
                                                            <p>{{$item->jumlah_progres_user_belom_selesai}}</p>
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
                    <div class="col-md-4">
                        <h4 class="">Pengumuman</h4>
                        <hr/>
                        {{-- <div class="pengumuman__content mt-2">
                            <div class="pc__content mt-2" id="place__notifikasi">
                                @foreach ($Notifikasi as $item)
                                <div style="float: right">
                                    <span class="badge badge-sm bg-primary"><i class="fa fa-calendar-days"></i> {{$item->tanggal}}</span>
                                </div>
                                    <h4>{{$item->judul_notifikasi}}</h4>
                                    <hr />
                                    <div class="row">
                                        <div class="col-12">
                                            {!! $item->keterangan !!}
                                        </div>
                                    </div>
                                @endforeach
        
        
                            </div>
                        </div> --}}
                        <div class="card" >
                            <div class="card-body" style="background-color: #FAE3D3;">
                                <div class="accordion accordion-flush" id="accordionFlushExample" >
                                    @foreach ($Notifikasi as $item)
                                    <div class="accordion-item" style="background-color: #FAE3D3;">
                                        <h2 class="accordion-header" id="flush-heading{{$item->id}}">
                                            <button class="accordion-button collapsed" style="background-color: #FAE3D3;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$item->id}}" aria-expanded="false" aria-controls="flush-collapse{{$item->id}}">
                                                {{$item->judul_notifikasi}}
                                            </button>
                                        </h2>
                                        <div id="flush-collapse{{$item->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$item->id}}" data-bs-parent="#accordionFlushExample">
                                            <span class="badge badge-sm bg-primary mt-3 ms-3"><i class="fa fa-calendar-days"></i> {{$item->tanggal}}</span>
                                            <div class="accordion-body">{!! $item->keterangan !!}</div>
                                        </div>
                                    </div>
                                    @endforeach
                                  </div>
                            </div>
                        </div>
                    </div>
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
