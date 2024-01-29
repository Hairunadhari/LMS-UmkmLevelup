@extends('layout.main')

@section('container')
<div
class="pt-5"
style="
      background-image: url('./assets/bg-home.png');
      background-repeat: no-repeat;
      background-size: cover;
      background-position-X: bottom;
      height: 40vh;
      "
  >
 
  
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-end">
          {{-- <li class="breadcrumb-item active">Registrasi</li> --}}
          {{-- <li class="breadcrumb-item active" aria-current="page">
            Step By Step
          </li> --}}
        </ol>
      </nav>
      <h2
        class="text-uppercase text-center font-bold pt-3"
        style="font-size: 3rem; font-weight: bolder;"
      >
      Home Umkm Levelup
      </h2>
    </div>
  </div>
  <div style="background: url('{{asset('assets/bg2.png')}}'); background-size:cover; padding-bottom:7%; padding-top:7%;">
    <div class="container">
      @if (auth()->user()->profil == 0)
        @include('profil-pengisian')
      @else
      <div class="row">
        <div class="col text-center">
        @if ($done == true)
          {{-- <span class="card" style="width: 100%rem;">
            <div class="card-body">
              <h4>Banner "{{$data[0]['title']}}"</h4>
              <span style="color: red; text-decoration:none; position: absolute; right:20px; top : 20px;">Sudah terisi</span>  
              <p class="card-text">{{$data[0]['desc']}}</p>
    
          </span> --}}
          @foreach ($data as $item)
          <div  class="card" style="width: 100%; border:none; background:none; border: 1px solid #ababab">
            <div class="card-body">
              <h4>Kuesioner : <strong>{{$item['title']}}</strong></h4>
              <div class="card-text">{!! $item['desc'] !!}</div>
              {{-- <a class="btn btn-info">Ikuti Kuesioner</a> --}}
              <hr />
              <div><small class="text-danger">Anda sudah mengikuti ini</small></div>
            </div>
          </div>
          @endforeach
        @else
          @foreach ($data as $item)
            <div class="card" style="width: 100%; border:none; background:none; border: 1px solid #c2c2c2">
              <div class="card-body">
                <h4>Kuesioner : <strong>{{$item['title']}}</strong></h4>
                <hr/>
                <div class="card-text">{!! $item['desc'] !!}</div>
                <a href="{{$item['link']}}" class="btn btn-primary"><i class="fa fa-list"></i> Ikuti Kuesioner</a>
              </div>
            </div>
          @endforeach
        @endif
        </div>
        <div class="col text-center">
          <div class="card" style="width: 100%; border:none; background:none; border: 1px solid #c2c2c2">
            <div class="card-body">
              <h4><strong>Modul Pembelajaran </strong> Umkm Levelup</h4>
              <hr/>
              <div class="card-text">
                <p>"Kembangkan Usaha Mikro, Kecil, dan Menengahmu dengan Pembelajaran Levelup. Temukan strategi terbaik untuk pertumbuhan dan keberhasilan usahamu. Pelajari langkah-langkah praktis untuk meningkatkan performa dan daya saing dalam bisnismu. Raih kesuksesan melalui pengetahuan yang tepat dan terpercaya."</p></div>
              <a href="dashboard" class="btn btn-danger"><i class="fa fa-graduation-cap"></i> Ikuti Learning</a>
            </div>
          </div>
        </div>
      </div>
        {{-- <br><br> --}}
        {{-- <div class="row">
          <div class="col-md-4">
            <a class="card" href="#">Dashboard</a>
          </div>
          <div class="col-md-4">
            <a class="card" href="dashboard">LMS</a>
          </div>
        </div> --}}
      @endif
    </div>
  </div>
@endsection