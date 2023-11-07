@extends('layout.layOtp')

@section('container')
    <div class="container-fluid">
      <form method="POST" action="{{ route('submit-otp') }}">
        @csrf
        <input type="text" class="text" name="id_user" value="{{$id_user}}">
        <input type="text" class="text" name="email" value="{{$email}}">
      <div class="container" style="margin-top: 10vh;">
        <div>
          <span class="step-heading">
            <h1 class="text-uppercase text-center font-bold mt-5" style="font-size: 4rem; font-weight: bolder">
              Masukan OTP
            </h1>
            <h5 class="text-center">Kami telah mengirimkan kode <br>
              akses melalui email "{{$email}}" untuk verifikasi OTP</h5>
          </span>
        </div>
        <br>
      <style>
        .otp-input-wrapper {
          width: 380px;
          text-align: left;
          display: inline-block;
        }
        .otp-input-wrapper input {
          padding: 0;
          width: 404px;
          font-size: 32px;
          font-weight: 600;
          color: #3e3e3e;
          background-color: transparent;
          border: 0;
          margin-left: 12px;
          letter-spacing: 48px;
          font-family: sans-serif !important; 
        }
        .otp-input-wrapper input:focus {
          box-shadow: none;
          outline: none;
        }
        .otp-input-wrapper svg {
          position: relative;
          display: block;
          width: 380px;
          height: 2px;
        }

      </style>
      <div class="container my-5">
        <form class="w-50 mx-auto">
          <div class="row">
           
              {{-- <input type="text" name="otp1" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" id="one" onkeyup="clickEvent(this,'sec')" class="form-control mx-auto text-center" style="width: 4vw; height: 10vh; background-color: #EDEDED;">
           
           
              <input type="text" name="otp2" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" id="sec" onkeyup="clickEvent(this,'third')" class="form-control mx-auto text-center" style="width: 4vw; height: 10vh; background-color: #EDEDED;">
           
           
              <input type="text" name="otp3" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" id="third" onkeyup="clickEvent(this,'fourth')" class="form-control mx-auto text-center" style="width: 4vw; height: 10vh; background-color: #EDEDED;">
           
           
              <input type="text" name="otp4" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" id="fourth" onkeyup="clickEvent(this,'fifth')" class="form-control mx-auto text-center" style="width: 4vw; height: 10vh; background-color: #EDEDED;">
           
           
              <input type="text" name="otp5" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" id="fifth" onkeyup="clickEvent(this,'sixth')" class="form-control mx-auto text-center" style="width: 4vw; height: 10vh; background-color: #EDEDED;">
           
           
              <input type="text" name="otp6" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" id="sixth" class="form-control mx-auto text-center text-bold" style="width: 4vw; height: 10vh; background-color: #EDEDED;"> --}}
              <div class="col-12 text-center">
                <div class="otp-input-wrapper">
                  <input type="text" maxlength="6" name="otp" pattern="[0-9]*" autocomplete="off">
                  <svg viewBox="0 0 380 1" xmlns="http://www.w3.org/2000/svg">
                    <line x1="0" y1="0" x2="380" y2="0" stroke="#3e3e3e" stroke-width="2" stroke-dasharray="44,22" />
                  </svg>
                </div>
              </div>
          </div>
        </form>
      </div>

        <div class="d-grid gap-2 mx-auto w-25">
          <button
            class="btn btn-primary rounded-pill p-3"
            type="submit"
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
        </button>
        </div>
        <div class="mt-5">
          {{-- <h5 class="text-center">Tidak menerima Kode OTP ?</h5>
          <h5 class="text-center text-primary">kirim ulang kode</h5> --}}
        </div>
      </div>
      </form>
    </div>
  <script>
    function clickEvent(first,last){
      // ev = ev || window.event; // Event object 'ev'
      // var key = ev.which || ev.keyCode; // Detecting keyCode
      // if (key == 86 && ctrl) {
      // // print in console.
      // console.log("Ctrl+V is pressed.");
      // }else{
        if(first.value.length){
          document.getElementById(last).focus();
        }
      // }
    }
  </script>
@endsection