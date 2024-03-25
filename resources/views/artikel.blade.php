<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{url('/')}}/asset/style.css">
</head>
<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-white sticky-top shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="{{url('/')}}/asset/logo.png" alt="" width="100%" height="70">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto gap-2 gap-md-3 fw-semibold">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/artikel">Artikel</a>
          </li>
          <a class="btn btn-primary fw-semibold fs-6" aria-current="page" href="pendaftaran">Pendaftaran</a>
          <a class="btn btn-warning fw-semibold fs-6" aria-current="page" href="login">Login</a>
        </ul>
      </div>
    </div>
  </nav>
  <!-- navbar -->

 <section class="p-5 w-100">
    <h3 style="color: #0C438D">Daftar Artikel</h3>
    <div class="row" style="height: 100%;">
        @foreach ($data as $item)
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 my-2 " style="height: 100% !important; border-radius: 10px">
            <div class="card" style="height: 100% !important; ">
                <img src="{{$item->gambar}}" class="card-img-top" alt="..." style="border-radius: 0 0 10px 10px">
                {{-- <img src="/storage/data_upload_lms/a14.jpg" class="card-img-top" alt="..." style="border-radius: 0 0 10px 10px"> --}}
                <div class="card-body" style="height: 100% !important;">
                 <div class="row  fw-semibold">
                  <div class="col-6">
                    Artikel
                  </div>
                  @php
                      $date = \Carbon\Carbon::parse($item->start)->locale('id');
                      $date->settings(['formatFunction' => 'translatedFormat']);
                  @endphp
                  <div class="col-6 text-end">{{ $date->format('d F, Y') }}</div>
                 </div>
                        <p class="card-text fw-bold">{{$item->judul}}</p>
            </div>
            <a href="/artikel/detail/{{$item->encryptId}}" class="text-decoration-none m-2 text-end">Selengkapnya >></a>
            </div>
        </div>
        @endforeach
    </div>
 </section>

  <!-- footer -->
  <section style="background-color: #0C438D;">
    <div class="container-fluid text-white pt-5 pt-md-5 pb-2 pb-md-2">
      <div class="row" style="font-size: 14px;">
        <div class="col-md-3">
          <div class="text-center mb-4">
            <h5 class="mb-4">Sebuah Program dari :</h5>
            <a href="#"><img src="{{url('/')}}/asset/logo-kominfo.png" alt="" class="img-fluid" width="80"></a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="text-center mb-4">
            <a href="#"><img src="{{url('/')}}/asset/logo-umkm-putih.png" alt="" class="img-fluid" width="150"></a>
          </div>
          <div class="text-center mb-4">
            <p>UMKM Level Up adalah Program yang diselenggarakan oleh Kementerian Komunikasi dan Informatika dalam rangka mendukung pelaku UMKM #SiapLevelUp melalui adopsi teknologi digital.</p>
          </div>
          <div class="col-6 col-md-4 d-flex justify-content-around mx-auto mb-4">
            {{-- <a href="test" style="color: #fff; text-decoration:none; line-height: 14px">
              <i class="fa-brands fa-facebook-f"></i>
            </a> --}}
            {{-- <a href="test" style="color: #fff; text-decoration:none; line-height: 14px">
              <i class="fa-brands fa-twitter"></i>
            </a> --}}
            <a href="https://instagram.com/umkm.levelup" target="_blank" style="color: #fff; text-decoration:none; line-height: 14px">
              <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://www.tiktok.com/@umkmlevelup" target="_blank" style="color: #fff; text-decoration:none; line-height: 14px">
              <i class="fa-brands fa-tiktok"></i>
            </a>
            <a href="https://www.youtube.com/@umkmlevelup" target="_blank" style="color: #fff; text-decoration:none; line-height: 14px">
              <i class="fa-brands fa-youtube"></i>
            </a>
            {{-- <i class="fa-solid fa-circle-play"></i> --}}
          </div>
        </div>
        <div class="col-md-3">
          <div class="text-center mb-4">
            <h5 class="mb-4">Contact us</h5>
          </div>
          <div class="text-center text-md-start">
            <p class="m-0"><i class="fa-solid fa-phone"></i> 0821-1999-7-210</p>
            <p class="m-0"><i class="fa-solid fa-envelope"></i> tanya@umkmlevelup.id</p>
          </div>
        </div>
      </div>
      <hr>
      <p class="text-center">Copyright © 2024 UMKM Level Up | Direktorat Pemberdayaan Informatika | Kementerian Komunikasi dan Informatika</p>
    </div>
  </section>
  <!-- footer -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>