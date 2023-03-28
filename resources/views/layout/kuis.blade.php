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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />

      <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
      
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css"
        rel="stylesheet">
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
      
      <script type="text/javascript" src="js/jquery.signature.min.js"></script>
      <script type="text/javascript" src="js/jquery.ui.touch-punch.min.js"></script>
      <link rel="stylesheet" type="text/css" href="css/jquery.signature.css">

    <title>Kuisioner 2 || UMKM GO ONLINE</title>

    <style>
      .photos img {
        width: 50%;
        aspect-ratio: 3/2;
        object-fit: contain;
      }
      .kbw-signature { 
        width: 535px; 
        height: 295px;
        border-radius: 5px;
      }

      #sig canvas{
          width: 100% !important;
          height: auto;
      }
      
      .container {
        max-width: 1320px !important;
      }
    </style>
  </head>
  <body
    style="
      background-image: url('./assets/background_kuis2.png');
      background-repeat: no-repeat;
      background-position-x: right;
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
  </body>
</html>
