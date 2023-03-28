@extends('layout.main')

@section('container')
    <div
      class=""
      style="
        background-image: url(./assets/background_regist_body.png);
        background-repeat-y: no-repeat;
        background-repeat-x: no-repeat;
        background-size: cover;
        background-position-y: bottom;
        height: 82svh;
      "
    >
      <div
        class="pt-5"
        style="
          background-image: url('./assets/background_regist_bawah.png');
          background-repeat: no-repeat;
          background-size: contain;
          background-position-y: bottom;
          height: 82vh;
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
          <h1
            class="text-uppercase text-center font-bold"
            style="font-size: 3rem; font-weight: bolder"
          >
          Welcome, {{ auth()->user()->name }}!
          </h1>
          <h6 class="text-uppercase text-center">Harap Lengkapi data diri</h6>

          <div class="row my-5">
            <div class="col-lg-4 pt-3">
              <div class="card h-100">
                <div class="card-body">
                  <h5 class="card-title text-center my-3">Makro</h5>
                  <p class="card-text m-0">Memiliki modal usaha</p>
                  <h6 class="card-text bolder">
                    <= Rp1.000.000.000,00 (satu miliar rupiah)
                  </h6>
                  <p class="card-text m-0">Hasil penjualan tahunan</p>
                  <h6 class="card-text bolder">
                    <=Rp2.000.000.000,00 (dua miliar rupiah)
                  </h6>
                  <br />
                </div>
              </div>
            </div>
            <div class="col-lg-4 pt-3">
              <div class="card h-100">
                <div class="card-body">
                  <h5 class="card-title text-center my-3">Kecil</h5>
                  <p class="card-text m-0">Memiliki modal usaha</p>
                  <h6 class="card-text bolder">
                    Rp.1.000.000.000,00 (satu miliar rupiah) -
                    Rp.5.000.000.000,00 (lima miliar rupiah)
                  </h6>
                  <p class="card-text m-0">
                    Memiliki hasil penjualan tahunan lebih dari
                  </p>
                  <h6 class="card-text bolder">
                    Rp.2.000.000.000,00 (dua miliar rupiah)-Rp.15.000.000.000,00
                    (lima belas miliar rupiah)
                  </h6>
                  <br />
                </div>
              </div>
            </div>
            <div class="col-lg-4 pt-3">
              <div class="card h-100">
                <div class="card-body">
                  <h5 class="card-title text-center my-3">Menengah</h5>
                  <p class="card-text m-0">Memiliki modal usaha</p>
                  <h6 class="card-text bolder">
                    Rp.5.000.000.000,00 (lima miliar rupiah) -
                    Rp.10.000.000.000,00 (sepuluh rniliar rupiah)
                  </h6>
                  <p class="card-text m-0">
                    Memiliki hasil penjualan tahunan lebih dari
                  </p>
                  <h6 class="card-text bolder">
                    Rp.15.000.000.000,00 (lima belas miliar rupiah) -
                    Rp.50.000.000.000,00 (lima puluh miliar rupiah)
                  </h6>
                  <br />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection