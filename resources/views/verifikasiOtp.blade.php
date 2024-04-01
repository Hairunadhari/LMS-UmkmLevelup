@extends('layout.layOtp')

@section('container')
<style>
    .masukanotp {
        font-size: 4rem;
        font-weight: bolder;
    }

    .verifikasibutton {
        display: flex;
        justify-content: center;
    }

    .verifikasibutton button {
        padding: 1rem;
    }

    .otp-input-wrapper {
        width: 380px;
        text-align: left;
        display: inline-block;
    }

    input {
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

    @media only screen and (max-width: 600px) {
        .masukanotp {
            font-size: 1.5rem;
        }

        .verifikasibutton {
            padding: 0;
        }

        input {
            width: max-content;
            font-size: 20px;
            margin-left: 22px;
            letter-spacing: 30px;
        }

        .otp-input-wrapper {
            width: 100%;
            text-align: center;
            display: inline-block;
        }

        .svg {
            /* position: relative;
            display: block; */
            display: flex;
            justify-content: center;
            width: auto;
            height: 2px;
            /* margin-left: 15px; */
        }
        .otp-input-wrapper svg {
            position: relative;
            display: block;
            width: 240px;
            height: 2px;
        }
        .verifikasibutton button{
            padding: 10px;
        }

    }
   


</style>
<div class="container-fluid">
    <form method="POST" action="{{ route('submit-otp') }}">
        @csrf
        <input type="hidden" class="hidden" name="id_user" id="id_user" value="{{$id_user}}">
        {{-- <input type="hidden" class="hidden" name="email" id="email_user" value="hairunadhari@gmail.com"> --}}
        <input type="hidden" class="hidden" name="email" id="email_user" value="{{$email}}">
        <div class="container">
            <div>
                <span class="step-heading">
                    <h1 class="text-uppercase text-center font-bold mt-5 masukanotp" style="">
                        Masukan OTP
                    </h1>
                    <h5 class="text-center">Kami telah mengirimkan kode <br>
                        {{-- akses melalui email "{{$email}}" untuk verifikasi OTP</h5> --}}
                </span>
            </div>
            <br>

            <div class="container my-5">
                <form class="w-50 mx-auto">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="otp-input-wrapper">
                                <input type="text" required
                                    oninvalid="this.setCustomValidity('Harap Lengkapi Kode Otp!')"
                                    onchange="this.setCustomValidity('')" maxlength="6" name="otp" pattern="[0-9]*"
                                    autocomplete="off">
                                <div class="svg">
                                    <svg viewBox="0 0 380 1" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="0" y1="0" x2="380" y2="0" stroke="#3e3e3e" stroke-width="2"
                                            stroke-dasharray="44,22" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="verifikasibutton">
                <button class="btn btn-primary rounded-pill " type="submit" style="
              background: linear-gradient(
                93.89deg,
                #0100cc 0%,
                #0166fe 47.54%,
                #18d1ff 100.92%
              );
            ">
                    <h5>Verifikasi</h5>

                </button>
            </div>
            <div class="mt-5">
                <h5 class="text-center">Tidak menerima Kode OTP ?</h5>
                <h5 class="text-center text-primary" id="kirimulangotp" style="cursor:pointer">kirim ulang kode</h5>
                <h5 class="text-center text-primary" style="display:none" id="timer"> </h5>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function () {
        let localStorageKey = 'countdownStartTime';
        let id_user = $('#id_user').val();
        let email_user = $('#email_user').val();

        // Function to start countdown
        function startCountdown(targetTime) {
            // Memperbarui timer setiap 1 detik
            let countdownInterval = setInterval(function () {
                let now = new Date().getTime();
                let timeDifference = targetTime - now;

                // Menghitung menit dan detik
                let seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

                // Menampilkan timer di elemen dengan id "timer"
                if (seconds >= 0) {
                    $('#timer').html(
                        `<button class="btn btn-light rounded-pill p-3" disabled>Mengirim Ulang Kode OTP dalam ${seconds} detik</button>`
                    );
                } else {
                    $('#timer').html(
                        `<button class="btn btn-light rounded-pill p-3" disabled>Mengirim Ulang Kode OTP</button>`
                    );
                }

                // Jika waktu sudah habis, hentikan countdown dan hapus waktu awal dari localStorage
                if (timeDifference <= 0) {
                    clearInterval(countdownInterval);
                    $('#timer').hide();
                    $('#kirimulangotp').show();
                    localStorage.removeItem(localStorageKey);
                }
            }, 1000);
        }

        let statusOtp = localStorage.getItem("statusOtp");
        // Mengambil waktu awal dari localStorage
        let startTime = localStorage.getItem(localStorageKey);

        if (!statusOtp) {
            localStorage.setItem("statusOtp", true);


            // Jika tidak tersimpan, atur waktu awal saat ini dan simpan di localStorage
            if (!startTime) {
                startTime = new Date().getTime();
                localStorage.setItem(localStorageKey, startTime);
                $('#timer').hide();
            } else {
                // Menghitung waktu akhir (60 detik dari waktu awal)
                let endTime = parseInt(startTime) + (60 * 1000);

                // Memulai countdown timer
                startCountdown(endTime);
                $('#kirimulangotp').hide();
                $('#timer').show();
            }
        }
        if (startTime) {
            // Menghitung waktu akhir (60 detik dari waktu awal)
            let endTime = parseInt(startTime) + (60 * 1000);

            // Memulai countdown timer
            startCountdown(endTime);
            $('#kirimulangotp').hide();
            $('#timer').show();
        }


        $(document).on('click', '#kirimulangotp', function (e) {
            // Sembunyikan tombol "Kirim Ulang Kode OTP"
            $('#kirimulangotp').hide();

            // Tampilkan timer
            $('#timer').show();
            startTime = new Date().getTime();
            localStorage.setItem(localStorageKey, startTime);

            // Hitung waktu akhir (60 detik dari waktu awal)
            let endTime = parseInt(startTime) + (60 * 1000);
            $.ajax({
                method: 'get',
                url: '/resend-otp/' + email_user,
                success: function (res) {
                    console.log('status =', res);
                    $.toast({
                        heading: 'Notifikasi :',
                        text: "Kode Otp Berhasil Terkirim, Silahkan Cek Ulang Email " +
                            email_user,
                        icon: "success",
                        hideAfter: false,
                        position: 'top-right',
                        loaderBg: '#9EC600' // To change the background
                    })
                    startCountdown(endTime);
                },
                error: function (res) {
                    $.toast({
                        heading: 'Terjadi kesalahan :',
                        text: "Gagal mengirim kode Otp, " + res,
                        icon: "error",
                        hideAfter: false,
                        position: 'top-right',
                        loaderBg: '#9EC600' // To change the background
                    })
                }
            });
        });
    });

</script>
@endsection
