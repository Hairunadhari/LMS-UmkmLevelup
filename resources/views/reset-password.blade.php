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
            Reset Password
          </h1>
          <h6 class="text-uppercase text-center">harap masukkan password baru dan konfirmasi password nya</h6>

          <form method="POST" action="{{ route('resetting') }}">
            @csrf
            <div class="row pt-5">
              <div class="col-lg-6 offset-lg-3">
                <div class="form-floating mb-4 shadow rounded-pill">
                  <input class="hidden" name="id" type="hidden" value="{{$id}}">
                  <input class="hidden" name="url" type="hidden" value="{{$url}}">
                    <input
                      type="password"
                      class="form-control rounded-pill px-4"
                      id="floatingInput"
                        name="password"
                      placeholder=""
                    />
                    <label for="floatingInput" class="ms-4"
                      ><i class="fa fa-key me-3"></i> Password</label
                    >
                </div>
              </div>
              <div class="col-lg-6 offset-lg-3">
                <div class="form-floating mb-4 shadow rounded-pill">
                    <input
                      type="password"
                      class="form-control rounded-pill px-4"
                      id="floatingInput"
                        name="konfirmasi_password"
                      placeholder=""
                    />
                    <label for="floatingInput" class="ms-4"
                      ><i class="fa fa-key me-3"></i> Konfirmasi Password</label
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
            Reset Password
            </button>
          </div>
        </form>
      </div>      
    </div>
</div>
    
@endsection