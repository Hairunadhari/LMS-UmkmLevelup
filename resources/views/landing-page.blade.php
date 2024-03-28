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
            <a class="nav-link" aria-current="page" href="#">Beranda</a>
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

  <!-- landing page -->
  <section style="background-color: #EBF3FF;">
    <div class="container-fluid pt-2 pb-5 py-md-5">
      <div class="row justify-content-around">
        <div class="col-md-6 d-flex justify-content-center align-items-center order-md-2">
          <div class="p-2 p-md-0">
            <img src="{{url('/')}}/asset/keranjang.png" alt="" class="img-fluid w-100 d-block mx-auto p-4 p-md-0">
          </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center order-md-1">
          <div class="p-1 p-md-0">
            <h1 class="fw-bold" style="color: #0C438D;">UMKM Level Up</h1>
            <p class="text-body-secondary">UMKM Level Up adalah sebuah Program yang diselenggarakan oleh Kementerian Komunikasi dan Informatika dalam rangka mendorong para pelaku UMKM #LevelUp dari sisi adopsi teknologi digital untuk memperluas akses pemasaran, meningkatkan efektivitas dan efisiensi proses bisnis, meningkatkan daya saing dan inovasi, serta meningkatkan transaksi penjualan pelaku UMKM.</p>
          </div>
        </div>
      </div>
      <div class="row w-100">
        <div class="col-12 text-center">
          <a href="#"><img src="{{url('/')}}/asset/button.png" alt="" class="img-fluid button" width="45"></a>
        </div>
      </div>
    </div>
  </section>
  <!-- landing page -->

  <!-- keterangan -->
  <section style="background-image: linear-gradient(180deg, rgba(235, 243, 255, 0) 0%, #EBF3FF 100%);">
    <div class="container-fluid py-2 py-md-5">
      <div class="row row-cols-1 row-cols-md-2 gap-2 gap-md-0 p-0 p-md-0">
        <div class="col">
          <div class="card h-100 p-4">
            <div class="card-body">
              <img src="{{url('/')}}/asset/pendampingan-dan-fasilitasi-umkm-level-up.png" alt="" class="img-fluid mb-2" width="700">
              <h5 class="fw-semibold text-center">Pendampingan dan Fasilitasi UMKM Level Up</h5>
              <p class="text-body-secondary">Pendampingan dan pelatihan kepada 20.000 UMKM dalam rangka mendorong UMKM #LevelUp dari sisi adopsi teknologi digital.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 p-4">
            <div class="card-body">
              <img src="{{url('/')}}/asset/umkm-level-up-business-incubator.png" alt="" class="img-fluid mb-2" width="700">
              <h5 class="fw-semibold text-center">UMKM Level Up Business Incubator</h5>
              <p class="text-body-secondary">Inkukbasi bisnis kepada 100 UMKM dalam rangka mendorong UMKM #LevelUp dari sisi transaksi penjualan, akses pemasaran, serta daya saing dalam pasar domestik dan global.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- keterangan -->

  <!-- #bikinusahamujadilevelup -->
  <section>
    <div class="container-fluid py-4 py-md-5">
      <div class="text-center mb-4">
        <h1 class="fw-bold mb-4" style="color: #0C438D;">Siap Untuk <span class="fw-normal text-dark">#BikinUsahamuJadiLevelUp?</span></h1>
        {{-- <a href="#" class="btn btn-primary fw-bold">REGISTRASI</a> --}}
      </div>
      <div class="row row-cols-1 row-cols-md-3 justify-content-around align-items-center gap-2 gap-md-0 p-0 p-md-0">
        <div class="col order-lg-2 text-center">
          <img src="{{url('/')}}/asset/handphone.png" alt="" class="img-fluid">
        </div>
        <div class="col h-100 order-lg-1">
          <div class="row align-items-center mb-4">
            <div class="col-4 order-lg-2">
              <img src="{{url('/')}}/asset/www.png" alt="" class="bg-white d-flex align-items-center mx-auto rounded-circle border p-1" width="65" height="65" style="object-fit: contain">
            </div>
            <div class="col-8 order-lg-1 text-start text-md-end">
              <p class="fs-6 fw-semibold">Registrasi</p>
            </div>
          </div>
          <div class="row align-items-center mb-4">
            <div class="col-4 order-lg-2">
              <img src="{{url('/')}}/asset/email000000.png" alt="" class="bg-white d-flex align-items-center mx-auto rounded-circle border p-1" width="65" height="65" style="object-fit: contain">
            </div>
            <div class="col-8 order-lg-1 text-start text-md-end">
              <p class="fs-6 fw-semibold">Verifikasi Kode OTP melalui e-mail</p>
            </div>
          </div>
          <div class="row align-items-center mb-4">
            <div class="col-4 order-lg-2">
              <img src="{{url('/')}}/asset/registration.png" alt="" class="bg-white d-flex align-items-center mx-auto rounded-circle border p-1" width="65" height="65" style="object-fit: contain">
            </div>
            <div class="col-8 order-lg-1 text-start text-md-end">
              <p class="fs-6 fw-semibold">Lengkapi data diri</p>
            </div>
          </div>
        </div>
        <div class="col h-100 order-lg-3">
          <div class="row align-items-center mb-4">
            <div class="col-4 order-lg-1">
              <img src="{{url('/')}}/asset/mengisi-kuisioner.png" alt="" class="bg-white d-flex align-items-center mx-auto rounded-circle border p-1" width="65" height="65" style="object-fit: contain">
            </div>
            <div class="col-8 order-lg-2 text-start">
              <p class="fs-6 fw-semibold">Mengisi kuesioner asesmen level adopsi teknologi digital</p>
            </div>
          </div>
          <div class="row align-items-center mb-4">
            <div class="col-4 order-lg-1">
              <img src="{{url('/')}}/asset/verifikasi-kode-otp.png" alt="" class="bg-white d-flex align-items-center mx-auto rounded-circle border p-1" width="65" height="65" style="object-fit: contain">
            </div>
            <div class="col-8 order-lg-2 text-start">
              <p class="fs-6 fw-semibold">Validasi data UMKM</p>
            </div>
          </div>
          <div class="row align-items-center mb-4">
            <div class="col-4 order-lg-1">
              <img src="{{url('/')}}/asset/button.png" alt="" class="bg-white d-flex align-items-center mx-auto rounded-circle border p-1" width="65" height="65" style="object-fit: contain">
            </div>
            <div class="col-8 order-lg-2 text-start">
              <p class="fs-6 fw-semibold">Lolos seleksi peserta UMKM Level Up</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- #bikinusahamujadilevelup -->

  <!-- lokasilokasikawasanprioritas -->
  {{-- <section>
    <div class="container-fluid py-2 py-md-5">
      <div class="d-flex justify-content-center align-items-center mb-2 mb-md-5">
        <h1 class="fw-bold" style="color: #0C438D;">15 Kawasan Prioritas</h1>
      </div>
      <div class="row mb-2 mb-md-4">
        <img src="{{url('/')}}/asset/lokasi-lokasi-kawasan-prioritas.png" alt="" class="img-fluid">
      </div>
      <div class="row">
        <p class="fs-4 fw-bold" style="color: #0C438D;">Highlight Provinsi :</p>
        <div class="col-12 col-md-3 fw-semibold text-body-secondary">
          <ul>
            <li>Sumatra Utara</li>
            <li>Bangka Belitung</li>
            <li>Banten</li>
            <li>DKI Jakarta</li>
            <li>Jawa Barat</li>
            <li>Jawa Tengah</li>
            <li>DI Yogyakarta</li>
            <li>Jawa Timur</li>
          </ul>
        </div>
        <div class="col-12 col-md-3 fw-semibold text-body-secondary">
          <ul>
            <li>Nusa Tenggara Barat</li>
            <li>Nusa Tenggara Timur</li>
            <li>Kalimantan Barat</li>
            <li>Sulawesi Tenggara</li>
            <li>Maluku Utara</li>
            <li>Maluku Utara</li>
            <li>Papua Barat</li>
            <li>Papua</li>
          </ul>
        </div>
      </div>
    </div>
  </section> --}}
  <!-- lokasilokasikawasanprioritas -->

  <!-- partner -->
  <section style="background-color: #EBF3FF;">
    <div class="container-fluid py-5 py-md-5">
      <div class="d-flex justify-content-center align-items-center mb-4">
        <h1 class="fw-bold" style="color: #0C438D;">Mitra</h1><img src="{{url('/')}}/asset/logo.png" alt="" class="img-fluid">
      </div>
      <div class="row justify-content-center">
        <div class="col-12 col-md-9 d-flex flex-wrap justify-content-center gap-2 gap-md-3">
          <img src="{{url('/')}}/asset/logo-bukalapak.png" alt="" class="bg-white d-flex align-items-center rounded p-2" width="100">
          <img src="{{url('/')}}/asset/logo-gojek.png" alt="" class="bg-white d-flex align-items-center rounded p-2" width="100">
          <img src="{{url('/')}}/asset/logo-shopee.png" alt="" class="bg-white d-flex align-items-center rounded p-2" width="100">
          <img src="{{url('/')}}/asset/logo-tokopedia.png" alt="" class="bg-white d-flex align-items-center rounded p-2" width="100">
          <img src="{{url('/')}}/asset/logo-padiumkm.png" alt="" class="bg-white d-flex align-items-center rounded p-2" width="100">
          <img src="{{url('/')}}/asset/logo-qris.png" alt="" class="bg-white d-flex align-items-center rounded p-2" width="100">
          <img src="{{url('/')}}/asset/logo-linkaja.png" alt="" class="bg-white d-flex align-items-center rounded p-2" width="100">
          <img src="{{url('/')}}/asset/logo-pospay.png" alt="" class="bg-white d-flex align-items-center rounded p-2" width="100">
          <img src="{{url('/')}}/asset/logo-siapik.png" alt="" class="bg-white d-flex align-items-center rounded p-2" width="100">
          <img src="{{url('/')}}/asset/logo-finatra.png" alt="" class="bg-white d-flex align-items-center rounded p-2" width="100">
          <img src="{{url('/')}}/asset/logo-posaja.png" alt="" class="bg-white d-flex align-items-center rounded p-2" width="100">
          <img src="{{url('/')}}/asset/logo-ovo.png" alt="" class="bg-white d-flex align-items-center rounded p-2" width="100">
          <img src="{{url('/')}}/asset/logo-moka.png" alt="" class="bg-white d-flex align-items-center rounded p-2" width="100">
          <img src="{{url('/')}}/asset/logo-majoo.png" alt="" class="bg-white d-flex align-items-center rounded p-2" width="100">
          <img src="{{url('/')}}/asset/logo-pawoon.png" alt="" class="bg-white d-flex align-items-center rounded p-2" width="100">
          <img src="{{url('/')}}/asset/logo-qasir.png" alt="" class="bg-white d-flex align-items-center rounded p-2" width="100">
          <img src="{{url('/')}}/asset/logo-sooltan-kasir.png" alt="" class="bg-white d-flex align-items-center rounded p-2" width="100">
          <img src="{{url('/')}}/asset/logo-forstok.png" alt="" class="bg-white d-flex align-items-center rounded p-2" width="100">
          <img src="{{url('/')}}/asset/logo-sirclo.png" alt="" class="bg-white d-flex align-items-center rounded p-2" width="100">
          <img src="{{url('/')}}/asset/logo-shipper.png" alt="" class="bg-white d-flex align-items-center rounded p-2" width="100">
          <img src="{{url('/')}}/asset/logo-selly.png" alt="" class="bg-white d-flex align-items-center rounded p-2" width="100">
          <img src="{{url('/')}}/asset/logo-brins.png" alt="" class="bg-white d-flex align-items-center rounded p-2" width="100">
        </div>
      </div>
    </div>
  </section>
  <!-- partner -->

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