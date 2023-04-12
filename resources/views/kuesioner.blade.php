@extends('layout.main')

@section('container')
  <div
    class="pt-5"
    style="
      background-image: url('./assets/background_regist_bawah.png');
      background-repeat: no-repeat;
      background-size: cover;
      background-position-y: bottom;
      height: 30vh;
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
        class="text-uppercase text-center font-bold"
        style="font-size: 3rem; font-weight: bolder"
      >
      Test Kuesioner
      </h2>
    </div>
  </div>
  <div class="container-fluid pt-5">
    @if ($done == true)
        <h4 style="color: red; text-align:center">Anda sudah mengisi kuesioner ini </h4><br>
        <div class="text-center"><a class="" href="home">Kembali</a></div>
    @else
      <iframe style="border:none;width:100%;" height="620px" src="{{$_GET['href']}}"></iframe>
    @endif
    
  </div>
@endsection