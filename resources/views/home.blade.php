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
      Welcome, {{ auth()->user()->name }}!
      </h2>
    </div>
  </div>
  <div class="container pt-5">
    @if (auth()->user()->profil == 0)
      @include('profil-pengisian')
    @else
      @if ($done == true)
      <span class="card" style="width: 100%rem;">
        <div class="card-body">
          <h4>Banner "{{$data[0]['title']}}"</h4>
          <span style="color: red; text-decoration:none; position: absolute; right:20px; top : 20px;">Sudah terisi</span>  
          <p class="card-text">{{$data[0]['desc']}}</p>

      </span>
      @else
        @foreach ($data as $item)
          <a href="{{$item['link']}}" class="card" style="width: 100%rem;">
            <div class="card-body">
              <h4>Banner "{{$item['title']}}"</h4>
              {{-- @if ($done == true)
                <span style="color: red; text-decoration:none; position: absolute; right:20px; top : 20px;">Sudah terisi</span>  
              @else
                  
              @endif --}}
              <p class="card-text">{{$item['desc']}}</p>
            </div>
          <a>
        @endforeach
      @endif
    @endif
  </div>
@endsection