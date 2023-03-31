@extends('layout.layOtp')

@section('container')
    <div class="container-fluid">
      <form method="POST" action="{{ route('submit-otp') }}">
        @csrf
        <input type="hidden" class="hidden" name="id_user" value="{{$id_user}}">
        <input type="hidden" class="hidden" name="email" value="{{$email}}">
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

      <div class="container my-5">
        <form class="w-50 mx-auto">
          <div class="row">
            <div class="col">
              <input type="text" name="otp1" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" id="one" onkeyup="clickEvent(this,'sec')" class="form-control mx-auto text-center" style="width: 4vw; height: 10vh; background-color: #EDEDED;">
            </div>
            <div class="col">
              <input type="text" name="otp2" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" id="sec" onkeyup="clickEvent(this,'third')" class="form-control mx-auto text-center" style="width: 4vw; height: 10vh; background-color: #EDEDED;">
            </div>
            <div class="col">
              <input type="text" name="otp3" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" id="third" onkeyup="clickEvent(this,'fourth')" class="form-control mx-auto text-center" style="width: 4vw; height: 10vh; background-color: #EDEDED;">
            </div>
            <div class="col">
              <input type="text" name="otp4" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" id="fourth" onkeyup="clickEvent(this,'fifth')" class="form-control mx-auto text-center" style="width: 4vw; height: 10vh; background-color: #EDEDED;">
            </div>
            <div class="col">
              <input type="text" name="otp5" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" id="fifth" onkeyup="clickEvent(this,'sixth')" class="form-control mx-auto text-center" style="width: 4vw; height: 10vh; background-color: #EDEDED;">
            </div>
            <div class="col">
              <input type="text" name="otp6" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" id="sixth" class="form-control mx-auto text-center text-bold" style="width: 4vw; height: 10vh; background-color: #EDEDED;">
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