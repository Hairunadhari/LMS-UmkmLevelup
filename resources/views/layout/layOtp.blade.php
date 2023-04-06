<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>OTP || UMKM GO ONLINE</title>

    <style>
      .photos img {
        width: 50%;
        aspect-ratio: 3/2;
        object-fit: contain;
      }
      input {
        font-size: 32px !important;
        font-weight: bold !important;
      }
    </style>
  </head>
  <body
    style="
      background-image: url('./assets/new_background_login.png');
      background-repeat: no-repeat;
      background-size: contain;
      background-position-y: bottom;
      height: 100vh;
    "
  >
    @include('partial.navbar')

     @yield('container')

    @yield('js')

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      @if(session('alert'))
      $.toast({
        heading: 'Terjadi kesalahan :',
        text: "{{ session('alert')['message'] }}",
        icon: "{{ session('alert')['type'] }}",
        loader: true,        // Change it to false to disable loader
        position: 'top-right',
        loaderBg: '#9EC600'  // To change the background
      })
      @endif


      @if(session('success'))
      $.toast({
        heading: 'Notifikasi :',
        text: "{{ session('success')['message'] }}",
        icon: "{{ session('success')['type'] }}",
        loader: true,        // Change it to false to disable loader
        position: 'top-right',
        loaderBg: '#9EC600'  // To change the background
      })
      @endif
  </script>
  </body>
</html>
