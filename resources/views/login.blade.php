@extends('layout.main')

@section('container')
<style>
  .con-login{
    background-image: url('./assets/background_regist_body.png');
      background-repeat-y: no-repeat;
      background-repeat-x: no-repeat;
      background-size: cover;
      background-position-y: bottom;
      height: 82vh;
      
  }
  .con-login2{
    background-image: url('./assets/background_regist_bawah.png');
        background-repeat: no-repeat;
        background-size: contain;
        background-position-y: bottom;
        height: 85vh;
  }
  .buttonlogin{
    height: max-content;

    background: linear-gradient(
                93.89deg,
                #0100cc 0%,
                #0166fe 47.54%,
                #18d1ff 100.92%
              );
              /* float:left; */
  }
  .container-button{
    display: flex;
    justify-content: space-evenly;
  }
  .daftar-button{
    background: linear-gradient(93.89deg, #cc6600 0%, #fe9d01 47.54%, #ffcd18 100.92%);
    border:none;
    width: 100%;

  }
  .form-floating{
    margin-bottom: 2rem;
  }
    @media only screen and (max-width: 600px) {
        button {
            width: 40%;
        }
        

        .daftar-button {
            width: 40%;
            margin-top: 1rem;
        }
        .container-button{
          display: block;
          /* justify-content: center; */
          /* align-items: center; */
          text-align: center;
        }
        .con-login{
          /* margin-bottom: 1rem; */
        }
        .form-floating{
        margin-bottom: 1rem;
      }
    }

</style>
<div class="con-login" style="">
    <div class="pt-5 con-login2" style="">
        <div class="container">
            <h1 class="text-uppercase text-center font-bold" style="font-size: 3rem; font-weight: bolder">
                Login
            </h1>
            <h6 class="text-uppercase text-center">Umkm Levelup</h6>
            <form method="POST" action="{{ route('submit-login') }}">
                @csrf
                <div class="row pt-5">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="form-floating  shadow rounded-pill">
                            <input type="email" class="form-control rounded-pill px-4" id="floatingInput" name="email"
                                placeholder="name@example.com" />
                            <label for="floatingInput" class="ms-4"><i class="fa fa-envelope me-3"></i> Email</label>
                        </div>
                        <div class="form-floating shadow rounded-pill">
                            <input type="password" class="form-control rounded-pill px-4" name="password"
                                id="floatingInput" placeholder="name@example.com" />
                            <label for="floatingInput" class="ms-4"><i class="fa fa-key me-3"></i> Password</label>
                        </div>
                    </div>
                </div>

                <div class="container-button">
                    <button type="submit" class="btn btn-primary buttonlogin" >
                        Login
                    </button>
                    <div class="conbutton-daftar">
                      {{-- <div>
                        <p>Lupa Password? <a href="forgot">klik disini</a></p>
                        Belum memiliki akun? 

                      </div>
                        <a type="button" class="daftar-button btn btn-primary" style="width: 40%"  href="pendaftaran">
                            Daftar
                        </a> --}}

                        <a type="button" class="daftar-button btn btn-primary"   href="pendaftaran">
                            Daftar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
