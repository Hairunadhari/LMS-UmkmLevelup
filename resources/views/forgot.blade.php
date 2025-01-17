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
            Lupa Password
          </h1>
          <h6 class="text-uppercase text-center">harap masukkan email yang ingin direset passwordnya</h6>

          {{-- <div class="row my-5">
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
          </div> --}}

          <form method="POST" action="/forgot-password">
            @csrf
            <div class="row pt-5">
              <div class="col-lg-6 offset-lg-3">
                <div class="form-floating mb-4 shadow rounded-pill">
                    <input
                      type="email"
                      class="form-control rounded-pill px-4"
                      id="floatingInput"
                        name="email"
                      placeholder="name@example.com"
                    />
                    <label for="floatingInput" class="ms-4"
                      ><i class="fa fa-envelope me-3"></i> Email</label
                    >
                </div>
              </div>
            </div>
            
            <div class="d-grid gap-2 mx-auto w-25">
            <button type="submit" class="btn btn-primary rounded-pill p-3"
            style="
              background: linear-gradient(
                93.89deg,
                #0100cc 0%,
                #0166fe 47.54%,
                #18d1ff 100.92%
              );
              float:left;
            ">
            Kirim email lupa password
            </button>
          </div>
        </form>
      </div>      
    </div>
</div>
    
@endsection