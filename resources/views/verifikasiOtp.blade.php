@extends('layout.layOtp')

@section('container')
    <div class="container-fluid">
      <div class="container" style="margin-top: 15vh;">
        <div>
          <span class="step-heading">
            <h1 class="text-uppercase text-center font-bold mt-5" style="font-size: 4rem; font-weight: bolder">
              Masukan OTP
            </h1>
            <h5 class="text-center">Kami telah mengirimkan kode <br>
              akses melalui whatsapp untuk verifikasi nomor</h5>
          </span>
        </div>
        <br>

      

      <div class="container my-5">
        <form class="w-50 mx-auto">
          <div class="row">
            <div class="col">
              <input type="text" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control mx-auto text-center" style="width: 4vw; height: 10vh; background-color: #EDEDED;">
            </div>
            <div class="col">
              <input type="text" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control mx-auto text-center" style="width: 4vw; height: 10vh; background-color: #EDEDED;">
            </div>
            <div class="col">
              <input type="text" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control mx-auto text-center" style="width: 4vw; height: 10vh; background-color: #EDEDED;">
            </div>
            <div class="col">
              <input type="text" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control mx-auto text-center" style="width: 4vw; height: 10vh; background-color: #EDEDED;">
            </div>
            <div class="col">
              <input type="text" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control mx-auto text-center" style="width: 4vw; height: 10vh; background-color: #EDEDED;">
            </div>
            <div class="col">
              <input type="text" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control mx-auto text-center text-bold" style="width: 4vw; height: 10vh; background-color: #EDEDED;">
            </div>
          </div>
        </form>
      </div>

        <div class="d-grid gap-2 mx-auto w-25">
          <a
            class="btn btn-primary rounded-pill p-3"
            href="login"
            type="button"
            style="
              background: linear-gradient(
                93.89deg,
                #0100cc 0%,
                #0166fe 47.54%,
                #18d1ff 100.92%
              );
            "
          >
            <h5>Masuk</h5>
        </a>
        </div>
        <div class="mt-5">
          <h5 class="text-center">Tidak menerima Kode OTP ?</h5>
          <h5 class="text-center text-primary">kirim ulang kode</h5>
        </div>
      </div>
    </div>
@endsection