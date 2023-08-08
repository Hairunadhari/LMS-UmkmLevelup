<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css') }} " rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Fonts Google -->
    <link rel="preconnect" href="{{ asset('https://fonts.googleapis.com') }}  ">
    <link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }} " crossorigin>
    <link href="{{ asset('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&family=Poppins:wght@300;500;700&display=swap') }}"rel="stylesheet">

    <!-- Fonts Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('path/to/font-awesome/css/font-awesome.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <style>
     @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&family=Poppins:wght@300;500;700&display=swap');

@font-face {
  font-family: "seven segment";
  src: url('../fonts/Seven-Segment.ttf');
}
*{
  font-family: 'Montserrat', sans-serif;
  z-index: 2;
}
nav{
  background: #FFFFFF;
  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  z-index: 3;
}
.form-control{
  border: none;
  background-color: #d4cfcf;
  border-radius: 5px 0 0 5px;
  height: 36px;
}
.form-control:focus{
  background-color: #d4cfcf;
  outline:0px !important;
  -webkit-appearance:none;
  box-shadow: none !important;
}
#navbarDropdownMenuLink{
  color: #47E1A8;
}
.nav-dl{
  color: #000;
}
.news__dropdown {
  /* position: absolute; */
  /* z-index: 1000; */
  display: none;
  min-width: 1rem;
  padding: 0.5rem 1rem;
  margin: 0 0 0 ;
  font-size: 1rem;
  color: #212529;
  text-align: left;
  list-style: none;
  background-color: #F1F1F1;
  background-clip: padding-box;
  border: 1px solid rgba(0,0,0,.15);
  border-radius: 0.25rem;
}
.notification .dropdown-menu{
  margin-left: -500%;
}
@media only screen and (max-width: 902px) {
  .notification .dropdown-menu{
      margin-left: 0;
  }
}
.news{
  width: 100%;
  align-items: center;
}
.news__left{
  width: 100%;
}
.news__left p{
  font-weight: normal;
  width: 15rem;
  white-space: normal;
}
.news__left a{
  text-decoration: none;
  color: #000;
  text-transform: none;
}
.dropdown-menu{
  background: #F1F1F1;
  border-radius: 10px;
  border: none;
}
.btn-search{
  border: none;
  background-color: #d4cfcf;
  border-radius: 0 5px 5px 0;
}
.dropdown-news{
  padding: .5rem 1rem .5rem 0;
}
.dropdown-news::after {
  display: none;
  margin-left: 0.255em;
  vertical-align: 0.255em;
  content: "";
  border-top: 0.3em solid;
  border-right: 0.3em solid transparent;
  border-bottom: 0;
  border-left: 0.3em solid transparent;
}
.btn-notif{
  padding: 0.375rem 0.75rem 0.375rem 0;
  background: #F1F1F1;
  border-radius: 10px;
}
.btn-notif img{
  width:1.5rem;
}
   </style>

    <title>
      @yield('title')
    </title>
  </head>
  <body>

    @include('lms.navbar')

     <!-- Style -->

  {{-- <link rel="stylesheet" href=" {{ asset('../css/daftarLowongan.css')}}">
  <link rel="stylesheet" href=" {{ asset('../css/exam-vid.css')}}">
  <link rel="stylesheet" href=" {{ asset('../css/lowongan_2.css')}}">
  <link rel="stylesheet" href=" {{ asset('../css/profil.css')}}">
  <link rel="stylesheet" href=" {{ asset('../css/register.css')}}">
  <link rel="stylesheet" href=" {{ asset('../css/styleLogin.css')}}"> --}}

    @yield('container') 

    {{-- Jquery --}}
    <script src="{{ asset('https://code.jquery.com/jquery-3.6.3.min.js')}} " integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.1/parsley.min.js)}} "></script> --}}




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> --}}

    @yield('custom__script')
    @yield('custom__script__filter')
  </body>
</html>