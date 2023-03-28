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
        height: 180vh;
      "
    >
      <div
        class="pt-5"
        style="
          background-image: url('./assets/background_regist_bawah.png');
          background-repeat: no-repeat;
          background-size: contain;
          background-position-y: bottom;
          height: 240vh;
        "
      >
        <div class="container pt-5">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-end">
              <li class="breadcrumb-item active">Home</li>
              <li class="breadcrumb-item active" aria-current="page">
                Step By Step
              </li>
            </ol>
          </nav>
          <h1
            class="text-uppercase text-center font-bold"
            style="font-size: 3rem; font-weight: bolder"
          >
            Registrasi
          </h1>
          <h6 class="text-uppercase text-center">Umkm Go Online</h6>

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

          <form action="">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-floating mb-5 shadow rounded-pill">
                  <input
                    type="text"
                    class="form-control rounded-pill px-4"
                    id="floatingInput"
                    placeholder="name@example.com"
                  />
                  <label for="floatingInput" class="ms-4"
                    ><i class="fa-solid fa-user me-3"></i> Nama Pemilik
                    Usaha</label
                  >
                </div>
                <div class="form-floating mb-5 shadow rounded-pill">
                  <input
                    type="text"
                    class="form-control rounded-pill px-4"
                    id="floatingInput"
                    placeholder="name@example.com"
                  />
                  <label for="floatingInput" class="ms-4"
                    ><i class="fa-solid fa-shop me-3"></i> Nama Toko</label
                  >
                </div>
                <div class="form-floating mb-5 shadow rounded-pill">
                  <input
                    type="Text"
                    class="form-control rounded-pill px-4"
                    id="floatingInput"
                    placeholder="name@example.com"
                  />
                  <label for="floatingInput" class="ms-4"
                    ><i class="fa-solid fa-venus me-3"></i> Jenis Kelamin</label
                  >
                </div>
                <div class="form-floating mb-5 shadow rounded-pill">
                  <input
                    type="text"
                    class="form-control rounded-pill px-4"
                    id="floatingInput"
                    placeholder="name@example.com"
                  />
                  <label for="floatingInput" class="ms-4"
                    ><i class="fa-solid fa-credit-card me-3"></i> NIK</label
                  >
                </div>
                <div class="form-floating mb-5 shadow rounded-pill">
                  <input
                    type="text"
                    class="form-control rounded-pill px-4"
                    id="floatingInput"
                    placeholder="name@example.com"
                  />
                  <label for="floatingInput" class="ms-4"
                    ><i class="fa-solid fa-credit-card me-3"></i> NPWP</label
                  >
                </div>
                <div class="form-floating mb-5">
                  <input
                    type="tel"
                    class="form-control rounded-pill shadow px-4"
                    id="floatingInput"
                    placeholder="name@example.com"
                  />
                  <label for="floatingInput" class="ms-4"
                    ><i class="fa-solid fa-phone me-3"></i> Kontak</label
                  >
                  <div id="emailHelp" class="form-text text-danger">
                    Noted: Kartu Harus Prabayar
                  </div>
                </div>
                <div class="form-floating mb-5 shadow rounded-pill">
                  <input
                    type="tel"
                    class="form-control rounded-pill px-4"
                    id="floatingInput"
                    placeholder="name@example.com"
                  />
                  <label for="floatingInput" class="ms-4"
                    ><i class="fa-brands fa-whatsapp me-3"></i> No Usaha
                    (Whatsapp Bisnis)</label
                  >
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-floating mb-5 shadow rounded-pill">
                  <select
                    class="form-select rounded-pill shadow px-4"
                    id="floatingSelect"
                    aria-label="Floating label select example"
                  >
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  <label for="floatingSelect" class="ms-4"
                    ><i
                      class="fa-solid fa-up-right-and-down-left-from-center me-3"
                    ></i
                    >Jenis Usaha</label
                  >
                </div>
                <div class="form-floating mb-5 shadow rounded-pill">
                  <select
                    class="form-select rounded-pill shadow px-4"
                    id="floatingSelect"
                    aria-label="Floating label select example"
                  >
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  <label for="floatingSelect" class="ms-4"
                    ><i class="fa-solid fa-ellipsis me-3"></i>Jenis Usaha
                    Anda</label
                  >
                </div>
                <div class="form-floating mb-5 shadow rounded-pill">
                  <select
                    class="form-select rounded-pill shadow px-4"
                    id="floatingSelect"
                    aria-label="Floating label select example"
                  >
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  <label for="floatingSelect" class="ms-4"
                    ><i class="fa-solid fa-box-open me-3"></i>Works with
                    selects</label
                  >
                </div>
                <div class="form-floating mb-5 shadow rounded-pill">
                  <input
                    type="text"
                    class="form-control shadow rounded-pill px-4"
                    id="floatingInput"
                    placeholder="name@example.com"
                  />
                  <label for="floatingInput" class="ms-4"
                    ><i class="fa-solid fa-location-dot me-3"></i>Alamat
                    UMKM</label
                  >
                </div>
                <div class="form-floating mb-5 shadow rounded-pill">
                  <select
                    class="form-select rounded-pill shadow px-4"
                    id="floatingSelect"
                    aria-label="Floating label select example"
                  >
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  <label for="floatingSelect" class="ms-4"
                    ><i class="fa-solid fa-house me-3"></i>Provinsi</label
                  >
                </div>
                <div class="form-floating mb-5">
                  <select
                    class="form-select rounded-pill shadow px-4"
                    id="floatingSelect"
                    aria-label="Floating label select example"
                  >
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  <label for="floatingSelect" class="ms-4"
                    ><i class="fa-solid fa-house me-3"></i>Kota /
                    Kabupaten</label
                  >

                  <div id="emailHelp" class="form-text text-danger">
                    Noted: Kartu Harus Prabayar
                  </div>
                </div>
                <div class="form-floating mb-5 shadow rounded-pill">
                  <select
                    class="form-select rounded-pill shadow px-4"
                    id="floatingSelect"
                    aria-label="Floating label select example"
                  >
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  <label for="floatingSelect" class="ms-4"
                    ><i class="fa-regular fa-circle-dot me-3"></i>Wilayah Lokasi
                    Pelatihan</label
                  >
                </div>
              </div>
            </div>
          </form>

          <div class="d-grid gap-2 mx-auto w-25">
            <a href="/registrasi" class="btn btn-primary rounded-pill p-3"
            style="
              background: linear-gradient(
                93.89deg,
                #0100cc 0%,
                #0166fe 47.54%,
                #18d1ff 100.92%
              );
            ">
            <h5>Masuk</h5>
          </a>
          </div>
        </div>
      </div>
    </div>
@endsection