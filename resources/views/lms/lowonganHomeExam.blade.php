@extends('lms.main')

@section('container')
<link rel="stylesheet" href=" {{ asset('css/lowongan_exam.css')}}">


<center>
    <section class="homeExam text-start" style="transform: translateY(7rem)">
        <div class="px-4 px-lg-5">
            <div class="row">
                <div class="col-12 back_home">
                    <a href="/dashboard" style="display: inline-block;">
                        <div class="back__he d-flex gap-2">
                            <div class="bh__left">
                              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512" style=""><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
                            </div>
                            <div class="bh__right">
                                <h3 class="mb-0">Kembali</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-2">
                    <center>
                        <div class="ls__left">
                            <img src="{{asset ('../img/senbud-icon.png')}}" alt="">
                        </div>
                        <div class="tcc__bottom d-flex mt-2">
                            <div class="tccb__content gap-2 ">
                                <div class="tccbl__left"><img src="{{asset ('../img/bg-left.png')}}"
                                        alt="" style="width: 1.5rem;">
                                </div>
                                <div class="tccbl__right">
                                    <p class="mt-1">{{$Materi->jumlahData}}</p>
                                </div>
                            </div>
                            <div class="tccb__content gap-2" id="tccb__last">
                                <div class="tccbl__left"><img src="{{asset ('../img/bg-right.png')}}"
                                        alt="" style="width: 1.25rem;">
                                </div>
                                <div class="tccbl__right">
                                    <p class="mt-1">{{$Materi->jumlah_user_berpartisipasi}}</p>
                                </div>
                            </div>
                        </div>
                    </center>
                </div>
                <div class="col-md-5">
                    <div class="left__side d-flex gap-5">
                        <div class="is__right">
                            <div class="isr__top px-auto">
                                <h2 class="mt-md-0 mt-5">{{$Materi->nama}}</h2>
                                <hr>
                                Author : <span class="badge badge-sm bg-secondary"><i class="fa fa-user"></i> {{$Materi->author}}</span>
                                
                                <p class="desc__mapel mt-3">{{$Materi->keterangan}}</p>
                            </div>
                        </div>
                    </div>
                    <center>
                        <img class="mt-5 w-75 d-none d-sm-block d-sm-none d-md-block"
                            src="{{asset ('../img/dashboard-icon-2.png')}}" alt="">
                    </center>
                </div>

                <div class="col-md-5 mt-3 mt-md-0">
                  <div class="right_content text-white p-4 p-xl-5 fw-bold" style="background-color: #6b859b; border-radius: 1rem;">
                    <h1>Materi yang Tersedia</h1>
                    <div class="place-materi" style="height:29rem; overflow: auto">
                        @forelse ($subMateri as $key => $item)
                        <a href="{{url('page-materi').'/'.$Materi->id.'/sub-materi/'.$item->id }}" style="font-decoration:none; text-decoration:none; color:#fff">
                            <div class="for_content mt-3 p-3 d-flex justify-content-between align-items-center">
                                <div class="fc_left" style="flex-basis: 20%;">
                                    <img src="{{asset ('../img/senbud-icon.png')}}" alt="">
                                </div>
                                <div class="fc_middle" style="flex-basis: 80%;">
                                    <h1 class="mb-0">{{$item->nama}}</h1>
                                    @if ($item->status == 1)
                                    <p class="fw-light mb-0">Anda Mengikutinya dengan baik</p>
                                    @else
                                    <p class="fw-light mb-0">Anda belum mengikuti Materi Ini</p>
                                    @endif
                                </div>
                                <div class="fc_right d-flex justify-content-end" style="flex-basis: 20%;">
                                    @if ($item->status == 1)
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400"><path d="M0 652.362v400h400v-400zm25 25h350v350H25zm306.557 63.375L157.43 928.657l-89.696-81.896-16.115 19.113 108.809 98.012L350.67 756.85z" style="opacity:1;fill:#0f0;fill-opacity:1;stroke:none;stroke-width:25;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" transform="translate(0 -652.362)"/></svg>
                                        
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="fill:#d31717"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M384 80c8.8 0 16 7.2 16 16V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V96c0-8.8 7.2-16 16-16H384zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"/></svg>
                                        
                                    @endif
                                </div>
                            </div>
                        </a>
                    @empty
                        
                    @endforelse
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>
</center>

@endsection
