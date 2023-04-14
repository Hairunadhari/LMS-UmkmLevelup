@extends('layout.main')

@section('container')
<div class="container-fluid mt-2" >
  @if ($done == true)
      <h4 style="color: red; text-align:center">Anda sudah mengisi kuesioner ini </h4><br>
      <div class="text-center"><a class="" href="home">Kembali</a></div>
  @else
    <iframe style="border:none;width:100%; height: 75vh" onload="resizeIframe(this)" src="{{$_GET['href']}}"></iframe>
  @endif
  
</div>
 
@endsection