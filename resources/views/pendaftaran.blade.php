@extends('layout.main')

@section('container')
<style>
  .for-loading{margin:0;padding:0;top:0;background-color:rgba(0,0,0,.418);position:fixed;width:100%;height:100%;z-index:99}.loading,.span-loader{left:50%;background:0 0}.loading{position:absolute;top:50%;transform:translate(-50%,-50%);width:150px;height:150px;border:3px solid #3c3c3c;border-radius:50%;text-align:center;line-height:150px;font-family:sans-serif;font-size:20px;color:#fff000;letter-spacing:4px;text-transform:uppercase;text-shadow:0 0 10px #fff000;box-shadow:0 0 20px rgba(0,0,0,.5)}.loading:before{content:'';position:absolute;top:-3px;left:-3px;width:100%;height:100%;border:3px solid transparent;border-top:3px solid #fff000;border-right:3px solid #fff000;border-radius:50%;animation:2s linear infinite loadingAnimateC}.span-loader{display:block;position:absolute;top:calc(50% - 2px);width:50%;height:4px;transform-origin:left;animation:2s linear infinite loadingAnimate}.span-loader:before{content:'';position:absolute;width:16px;height:16px;border-radius:50%;background:#fff000;top:-6px;right:-8px;box-shadow:0 0 20px #fff000}@keyframes loadingAnimateC{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}@keyframes loadingAnimate{0%{transform:rotate(45deg)}100%{transform:rotate(405deg)}}
</style>
  <div class="for-loading" style="display: none">
    <div class="loading">Loading
      <span class="span-loader"></span>
    </div>
  </div>
    <div
      class=""
      style="
        background-image: url(./assets/background_regist_body.png);
        background-repeat-y: no-repeat;
        background-repeat-x: no-repeat;
        background-size: cover;
        background-position-y: bottom;
        height: 90vh;
      "
    >
      <div
        class="pt-4"
        style="
          background-image: url('./assets/background_regist_bawah.png');
          background-repeat: no-repeat;
          background-size: contain;
          background-position-y: bottom;
          height: 90vh;
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
            Pendaftaran
          </h1>
          <h6 class="text-uppercase text-center">Umkm Levelup</h6>        
          <form id="formDaftar" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row pt-2">
              <div class="col-lg-6 offset-lg-3">
                <div class="form-floating mb-4 shadow rounded-pill">
                  <input
                    type="text"
                    class="form-control rounded-pill px-4"
                    name="name"
                    placeholder="name@example.com"
                    required
                  />
                  <label for="floatingInput" class="ms-4"
                    ><i class="fa-solid fa-user me-3"></i> Nama</label
                  >
                </div>
                <div class="form-floating mb-4 shadow rounded-pill">
                    <input
                      type="email"
                      class="form-control rounded-pill px-4"
                        name="email"
                      placeholder="name@example.com"
                      required
                    />
                    <label for="floatingInput" class="ms-4"
                      ><i class="fa fa-envelope me-3"></i> Email</label
                    >
                </div>
                <div class="form-floating mb-4 shadow rounded-pill">
                    <input
                      type="text"
                      class="form-control rounded-pill px-4"
                      name="no_wa"
                      placeholder="name@example.com"
                      required
                    />
                    <label for="floatingInput" class="ms-4"
                      ><i class="fa fa-phone me-3"></i> No Hp (Wa Aktif)</label
                    >
                </div>
                <div class="row">
                  <div class="col form-floating mb-4">
                      <input
                        type="password"
                        class="form-control rounded-pill px-4"
                        name="password"
                        placeholder="name@example.com"
                        required
                      />
                      <label for="floatingInput" class="ms-4"
                        ><i class="fa fa-key me-3"></i> Password</label
                      >
                  </div>
                  <div class="col form-floating mb-4 ">
                    <input
                      type="password"
                      class="form-control rounded-pill px-4"
                      name="konfirmasi_password"
                      placeholder="name@example.com"
                      required
                    />
                    <label for="floatingInput" class="ms-4"
                      ><i class="fa fa-key me-3"></i> Konfirmasi Password</label
                    >
                </div>
                </div>
              </div>
            </div>
            
            <div class="d-grid gap-2 mx-auto w-25">
              <button 
              {{-- type="submit"  --}}
              class="btn btn-primary rounded-pill p-3 g-recaptcha" 
              data-sitekey="{{env('CAPTCHA_SITE_KEY')}}" 
              onclick="onSubmit()" 
              {{-- data-action='submit' --}}
              style="
                background: linear-gradient(
                  93.89deg,
                  #0100cc 0%,
                  #0166fe 47.54%,
                  #18d1ff 100.92%
                );
              ">
              Daftar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection

@section('js')
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <script>
    function onSubmit(token) {
      let name = $( "input[name='name']" ).val();
      let email = $( "input[name='email']" ).val();
      let no_wa = $( "input[name='no_wa']" ).val();
      let password = $( "input[name='password']" ).val();
      let konfirmasi_password = $( "input[name='konfirmasi_password']" ).val();
      if (name != '' && password != '' && email != '' && no_wa != '') {
        if (konfirmasi_password != password) {
          $.toast({
          heading: 'Mohon Lakukan',
          text: "Konfirmasi password tidak sama dengan password yang dimasukkan",
          icon: "error",
          hideAfter: false,
          // loader: true,       // Change it to false to disable loader
          position: 'top-right',
          loaderBg: '#9EC600'  // To change the background
        })
        }else{
          $(".for-loading").attr('style', 'display:');
          document.getElementById("formDaftar").submit(); 
        }
      }else{
        msg = '';
        if (name == '' ) {
          msg = "Nama"
        }else if(email == ''){
          msg = "Email"
        }else if(no_wa == ''){
          msg = "No Wa"
        }else{
          msg = "Password / Konfirmasi"
        }
        $.toast({
          heading: 'Mohon Lakukan',
          text: "Pengisian "+ msg +" dengan benar",
          icon: "error",
          hideAfter: false,
          // loader: true,       // Change it to false to disable loader
          position: 'top-right',
          loaderBg: '#9EC600'  // To change the background
        })
      }
    }
  </script>
@endsection