@extends('layout.main')

@section('container')
<style>
  @media only screen and (max-width: 500px) {
    .hidden-xs {
      display: none
    }
  }
</style>
<div
    class="pt-5 hidden-xs"
    style="
      background-image: url('./assets/bg-home.png');
      background-repeat: no-repeat;
      background-size: cover;
      background-position-x: center;
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
      Isi Kuesioner
      </h2>
    </div>
  </div>
  <div style="padding-bottom:2%; padding-top:2%;">
    <div class="container-fluid">
  @if ($done == true)
      <h4 style="color: red; text-align:center">Anda sudah mengisi kuesioner ini </h4><br>
      <div class="text-center"><a class="" href="home">Kembali</a></div>
  @else
    <iframe style="border:none;width:100%; height: 120vh" onload="resizeIframe(this)" src="{{$_GET['href']}}"></iframe>
  @endif
    </div>
  </div>
 
@endsection