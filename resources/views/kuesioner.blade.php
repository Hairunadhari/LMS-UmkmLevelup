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
  <div class="container pt-1">
    <iframe style="border:none;width:100%;" height="620px" src="http://194.59.165.67:8082/forms/test-kuesioner"></iframe>
    
  </div>
@endsection