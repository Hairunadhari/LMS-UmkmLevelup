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
        height: 85vh;
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
          Login
        </h1>
        <h6 class="text-uppercase text-center">Umkm Levelup</h6>
        <form method="POST" action="{{ route('submit-login') }}">
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
              <div class="form-floating mb-5 shadow rounded-pill">
                  <input
                    type="password"
                    class="form-control rounded-pill px-4"
                    name="password"
                    id="floatingInput"
                    placeholder="name@example.com"
                  />
                  <label for="floatingInput" class="ms-4"
                    ><i class="fa fa-key me-3"></i> Password</label
                  >
              </div>
            </div>
          </div>
          
          <div class="gap-2 mx-auto w-50">
            <button type="submit" class="btn btn-primary rounded-pill p-3 w-25"
            style="
              background: linear-gradient(
                93.89deg,
                #0100cc 0%,
                #0166fe 47.54%,
                #18d1ff 100.92%
              );
              float:left;
            ">
            Login
            </button>
            <div class="" style="float: right">
              <p>Lupa Password? <a href="forgot">klik disini</a></p> 
              Belum memiliki akun? <a type="button" class="btn btn-primary"
              style="
                background: linear-gradient(
                  93.89deg,
                  #cc6600 0%,
                  #fe9d01 47.54%,
                  #ffcd18 100.92%
                );
                border:none;
                
              "
              href="pendaftaran">
              Daftar
              </a>
            </div>
          </div>
        </form>
      </div>      
    </div>
    @include('footer')
</div>
    
@endsection