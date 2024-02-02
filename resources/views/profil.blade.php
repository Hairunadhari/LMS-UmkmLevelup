
@extends('layout.main')

@section('container')
<div
    class="pt-5"
    style="
      background-image: url('./assets/background_regist_bawah.png');
      background-repeat: no-repeat;
      background-size: cover;
      background-position-y: bottom;
      height: 30vh;
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
    <h2
      class="text-uppercase text-center font-bold"
      style="font-size: 3rem; font-weight: bolder"
    >
    Profil, {{ auth()->user()->name }}!
    </h2>
  </div>
</div>
<div class="container pt-5">

<style>
    .form-floating>.form-control:focus, .form-floating>.form-control:not(:placeholder-shown), .form-floating>.form-select{
        padding-top: 1.725rem;
        padding-bottom: 0.425rem;
    }
</style>
    <form action="{{route('update-profil')}}" method="POST">
        @csrf
      <div class="row">
        <div class="col-md-12 mb-4 mt-2">
          <div class="row">
            <div class="col">
              <hr>
            </div>
            <div class="col text-center">
              Informasi Umum : 
            </div>
            <div class="col">
              <hr>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-floating shadow  mb-1 rounded-pill">
            <input
              type="text"
              class="form-control rounded-pill px-4"
              id="namaPemilik"
              name="namaPemilik"
              required
              
              value="{{$user->nama_pemilik}}"
              oninput="validatenamapemilik()"
              oninvalid="this.setCustomValidity('Silahkan isi kolom ini!')"
                                onchange="this.setCustomValidity('')"
                                readonly
            />
            <label for="namaPemilik" class="ms-4">
              <i class="fa-solid fa-user me-2"></i> Nama Lengkap Pemilik 
              <span style="color: red; font-weight:bold">*</span>
            </label>
            
          </div>
              <div class="" style="color: red; font-weight: bold;"><p class="" style="
              opacity: .5" id="error-namalengkap"></p></div>
        </div>

        <div class="col-lg-3">
            <div class="form-floating mb-1 shadow rounded-pill">
                <select
                  class="form-select rounded-pill shadow px-4"
                  id="jenisKelamin"
                  name="jenisKelamin"
                  required
                  aria-label="Floating label select example"
                  oninvalid="this.setCustomValidity('Silahkan isi kolom ini!')"
                  onchange="this.setCustomValidity('')"
                  onclick="validatekelamin()"
                >
                  <option value="" disabled>-- Pilih --</option>
                  <option value="Pria" {{$user->jenis_kelamin == "Pria" ? "selected" : ""}}>Laki-laki</option>
                  <option value="Perempuan" {{$user->jenis_kelamin == "Perempuan" ? "selected" : ""}}>Perempuan</option>
                </select>
                <label for="jenisKelamin" class="ms-4"
                  ><i
                    class="fa-solid fa-up-right-and-down-left-from-center me-2"
                  ></i
                  >Jenis Kelamin <span style="color: red; font-weight:bold">*</span></label
                >
            </div>
            <div class="" style="color: red; font-weight: bold;"><p class="" style="
              opacity: .5" id="error-kelamin"></p></div>
        </div>

        <div class="col-lg-3">
          <div class="form-floating shadow  mb-1 rounded-pill">
            <input
              type="text"
              class="form-control rounded-pill px-4"
              id="namaUsaha"
              name="namaUsaha"
              required
              placeholder="Toko ...."
              value="{{$user->nama_usaha}}"
              oninvalid="this.setCustomValidity('Silahkan isi kolom ini!')"
              onchange="this.setCustomValidity('')"
              oninput="validatenamausaha()"
            />
            <label for="namaUsaha" class="ms-4"><i class="fa-solid fa-user me-2">
              </i> Nama Usaha (Toko) 
              <span style="color: red; font-weight:bold">*</span>
            </label>
          </div>
          <div class="" style="color: red; font-weight: bold;"><p class="" style="opacity: .5" id="error-namausaha"></p></div>
        </div>

        <div class="col-lg-3">
          <div class="form-floating shadow  mb-1 rounded-pill">
            <input
              type="email"
              class="form-control rounded-pill px-4"
              id="email"
              name="email"
              required
              readonly
              placeholder="toko@***.com"
              value="{{$user->email_usaha}}"
              oninvalid="this.setCustomValidity('Silahkan isi kolom ini!')"
                                onchange="this.setCustomValidity('')"
              oninput="validateemailusaha()"

            />
            <label for="email" class="ms-4"
              ><i class="fa-solid fa-user me-2"></i> Email Usaha (Toko) <span style="color: red; font-weight:bold">*</span>
                </label
            >
          </div>
              <div class="" style="color: red; font-weight: bold;"><p class="" style="
                opacity: .5" id="error-emailusaha"></p></div>
        </div>

        <div class="col-md-12 mb-4 mt-4">
          <div class="row">
            <div class="col">
              <hr>
            </div>
            <div class="col text-center">
              Alamat Usaha (Provinsi) : 
            </div>
            <div class="col">
              <hr>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="row">
                <div class="col-lg-6">
                <div class="form-floating mb-1 shadow rounded-pill">
                    <select
                    class="form-select rounded-pill shadow px-4"
                    id="provinsi"
                    name="provinsi"
                    required
                    aria-label="Floating label select example"
                    oninvalid="this.setCustomValidity('Silahkan isi kolom ini!')"
                                onchange="this.setCustomValidity('')"
                                onclick="validateprovinsi()"
                    >
                    <option value="" disabled>-- Pilih --</option>
                    @foreach ($dataProv as $item)
                        <option  value="{{$item->id_provinsi}}" {{$item->id_provinsi == $user->id_provinsi ? "selected" : ""}}>{{$item->nama_provinsi}}</option>
                    @endforeach
                    </select>
                    <label for="provinsi" class="ms-4"
                    ><i
                        class="fa-solid fa-up-right-and-down-left-from-center me-2"
                    ></i
                    >Alamat Usaha <span style="color: red; font-weight:bold">*</span></label
                    >
                </div>
                <div class="" style="color: red; font-weight: bold;"><p class="" style="
                  opacity: .5" id="error-provinsi"></p></div>
                </div>

                <div class="col-lg-6">
                <div class="form-floating mb-1 shadow rounded-pill">
                    <select
                    class="form-select rounded-pill shadow px-4"
                    id="kabupaten"
                    name="kabupaten"
                    required
                    aria-label="Floating label select example"
                    oninvalid="this.setCustomValidity('Silahkan isi kolom ini!')"
                                onchange="this.setCustomValidity('')"
                                onclick="validatekabupaten()"

                    >
                    <option selected value="{{$user->id_kabupaten}}">{{$nama_kabupaten}}</option>
                    </select>
                    <label for="kabupaten" class="ms-4"
                    ><i
                        class="fa-solid fa-up-right-and-down-left-from-center me-2"
                    ></i
                    >Kabupaten / Kota <span style="color: red; font-weight:bold">*</span></label
                    >
                    {{-- <small for="floatingSelect">alamat usaha harus berada sesuai dengan target lokasi untuk pelaksanaan program pemdampingan umkm levelup</small> --}}
                </div>
                <div class="" style="color: red; font-weight: bold;"><p class="" style="
                  opacity: .5" id="error-kabupaten"></p></div>
                </div>

                <div class="col-lg-6">
                <div class="form-floating mb-1 shadow rounded-pill">
                    <select
                    class="form-select rounded-pill shadow px-4"
                    id="kecamatan"
                    name="kecamatan"
                    required
                    aria-label="Floating label select example"
                    oninvalid="this.setCustomValidity('Silahkan isi kolom ini!')"
                                onchange="this.setCustomValidity('')"
                                onclick="validatekecamatan()"
                    >
                    <option selected value="{{$user->id_kecamatan}}">{{$nama_kecamatan}}</option>
                    </select>
                    <label for="kecamatan" class="ms-4"
                    ><i
                        class="fa-solid fa-up-right-and-down-left-from-center me-2"
                    ></i
                    >Kecamatan <span style="color: red; font-weight:bold">*</span></label
                    >
                    {{-- <small for="floatingSelect">alamat usaha harus berada sesuai dengan target lokasi untuk pelaksanaan program pemdampingan umkm levelup</small> --}}
                </div>
                <div class="" style="color: red; font-weight: bold;"><p class="" style="
                  opacity: .5" id="error-kecamatan"></p></div>
                </div>
                <div class="col-lg-6">
                <div class="form-floating mb-1 shadow rounded-pill">
                    <select
                    class="form-select rounded-pill shadow px-4"
                    id="kelurahan"
                    name="kelurahan"
                    required
                    aria-label="Floating label select example"
                    oninvalid="this.setCustomValidity('Silahkan isi kolom ini!')"
                                onchange="this.setCustomValidity('')"
                                onclick="validatekelurahan()"
                    >
                    <option selected value="{{$user->id_keluarahan}}">{{$nama_kelurahan}}</option>
                    </select>
                    <label for="kelurahan" class="ms-4"
                    ><i
                        class="fa-solid fa-up-right-and-down-left-from-center me-2"
                    ></i
                    >Kelurahan <span style="color: red; font-weight:bold">*</span></label
                    >
                    {{-- <small for="floatingSelect">alamat usaha harus berada sesuai dengan target lokasi untuk pelaksanaan program pemdampingan umkm levelup</small> --}}
                </div>
                <div class="" style="color: red; font-weight: bold;"><p class="" style="
                  opacity: .5" id="error-kelurahan"></p></div>
                </div>
                </div>
                </div>
                <div class="col-lg-5">
                    <div class="form-floating mb-1 shadow ">
                        <textarea oninvalid="this.setCustomValidity('Silahkan isi kolom ini!')" oninput="validatealamat()"
                        onchange="this.setCustomValidity('')" class="form-control  shadow px-4" placeholder="Alamat Lengkap" id="alamat" name="alamat" required style="height: 130px">{{$user->alamat_lengkap}}</textarea>
                        <label for="alamat" class="ms-2"
                        ><i
                        class="fa fa-edit me-2"
                        ></i
                        >Alamat Lengkap <span style="color: red; font-weight:bold">*</span></label>
                    </div>
                    <div class="" style="color: red; font-weight: bold;"><p class="" style="
                      opacity: .5" id="error-alamat"></p></div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-4 mt-4">
          <div class="row">
            <div class="col">
              <hr>
            </div>
            <div class="col text-center">
              Informasi Khusus : 
            </div>
            <div class="col">
              <hr>
            </div>
          </div>
        </div>

      <div class="row">
        <div class="col-lg-4">
          <div class="form-floating shadow  mb-3 rounded-pill">
            <input
              type="text"
              class="form-control rounded-pill px-4"
              id="no_telp"
              name="no_telp"
              placeholder="+021 *****"
              value="{{$user->no_telp}}"
            />
            <label for="no_telp" class="ms-4"
              ><i class="fa-solid fa-user me-2"></i> No Telpon Utama </label
            >
          </div>
        </div>

        <div class="col-lg-4" style="display: none">
          <div class="form-floating shadow  mb-3 rounded-pill">
            <input
              type="text"
              class="form-control rounded-pill px-4"
              id="no_hp"
              name="no_hp"
              {{-- required --}}
              placeholder="+062 *****"
              value=""
            />
            <label for="no_hp" class="ms-4"
              ><i class="fa-solid fa-user me-2"></i> No Telpon Paket Data <span style="color: red; font-weight:bold">*</span></label
            >
          </div>
        </div>

        <div class="col-lg-4">
          <div class="form-floating shadow  mb-3 rounded-pill">
            <input
              type="text"
              class="form-control rounded-pill px-4"
              id="nik"
              name="nik"
              placeholder="3175******"
              value="{{$user->nik}}"
            />
            <label for="nik" class="ms-4"
              ><i class="fa-solid fa-user me-2"></i> NIK</label
            >
          </div>
        </div>

        <div class="col-lg-4">
          <div class="form-floating shadow  mb-3 rounded-pill">
            <input
              type="text"
              class="form-control rounded-pill px-4"
              id="nib"
              name="nib"
              required
              placeholder="128******"
              value="{{$user->nib}}"
              oninvalid="this.setCustomValidity('Silahkan isi kolom ini!')"
                                onchange="this.setCustomValidity('')"
                                oninput="validatenib(this)"
            />
            <label for="nib" class="ms-4"
              ><i class="fa-solid fa-user me-2"></i> NIB <span style="color: red; font-weight:bold">*</span></label
            >
          </div>
          <div class="" style="color: red; font-weight: bold;"><p class="" style="
            opacity: .5" id="error-nib"></p></div>
            <div style="margin-left: 10px;">

              <small>(Bagi yang belum memiliki NIB isi kolom dengan 0 (angka 0))</small>
            </div>
        </div>
      </div>
      <div class="col-md-12 text-center mb-5 mt-5">
        <button type="submit" class="btn btn-primary rounded-pill p-3 "
            style="
              background: linear-gradient(
                93.89deg,
                #0100cc 0%,
                #0166fe 47.54%,
                #18d1ff 100.92%
              );
              display: inline;
              width:200px;
              margin: 0 auto;
            ">
            Update
        </button>
      </div>
    </form>
</div>
<script>
    $( "#provinsi" ).change(function() {
        var optionValue = $(this).val();
        $("#kabupaten").html("<option value=''>-- Pilih --</option>");
        $("#kabupaten").val('').change();
        $("#kecamatan").html("<option value=''>-- Pilih --</option>");
        $("#kecamatan").val('').change();
        $("#kelurahan").html("<option value=''>-- Pilih --</option>");
        $("#kelurahan").val('').change();
        if (optionValue !== "") {
        $.ajax({
            type: "GET",
            url: "/getKabupaten/" + optionValue, // Replace with your API endpoint
            success: function(data) {
                $("#kabupaten").html("<option value=''>-- Pilih --</option>");
            $.each(data, function(index, option) {
                $("#kabupaten").append("<option value='" + option.id + "'>" + option.value + "</option>");
            });
            },
            error: function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX error: " + textStatus + " - " + errorThrown);
            }
        });
        } else {
            $("#kabupaten").html("<option value=''>-- Pilih --</option>");
            $("#kabupaten").val('').change();
            $("#kecamatan").html("<option value=''>-- Pilih --</option>");
            $("#kecamatan").val('').change();
            $("#kelurahan").html("<option value=''>-- Pilih --</option>");
            $("#kelurahan").val('').change();
        }
    });

    $( "#kabupaten" ).change(function() {
        var optionValue = $(this).val();
        $("#kecamatan").html("<option value=''>-- Pilih --</option>");
        $("#kecamatan").val('').change();
        $("#kelurahan").html("<option value=''>-- Pilih --</option>");
        $("#kelurahan").val('').change();
        if (optionValue !== "") {
        $.ajax({
            type: "GET",
            url: "/getKecamatan/" + optionValue, // Replace with your API endpoint
            success: function(data) {
                $("#kecamatan").html("<option value=''>-- Pilih --</option>");
            $.each(data, function(index, option) {
                $("#kecamatan").append("<option value='" + option.id + "'>" + option.value + "</option>");
            });
            },
            error: function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX error: " + textStatus + " - " + errorThrown);
            }
        });
        } else {
        // Clear second select if first select is reset
            $("#kecamatan").html("<option value=''>-- Pilih --</option>");
            $("#kecamatan").val('').change();
            $("#kelurahan").html("<option value=''>-- Pilih --</option>");
            $("#kelurahan").val('').change();
        }
    });

    $( "#kecamatan" ).change(function() {
        var optionValue = $(this).val();
        $("#kelurahan").html("<option value=''>-- Pilih --</option>");
        $("#kelurahan").val('').change();
        if (optionValue !== "") {
        $.ajax({
            type: "GET",
            url: "/getKelurahan/" + optionValue, // Replace with your API endpoint
            success: function(data) {
                $("#kelurahan").html("<option value=''>-- Pilih --</option>");
            $.each(data, function(index, option) {
                $("#kelurahan").append("<option value='" + option.id + "'>" + option.value + "</option>");
            });
            },
            error: function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX error: " + textStatus + " - " + errorThrown);
            }
        });
        } else {
        // Clear second select if first select is reset
            $("#kelurahan").html("<option value=''>-- Pilih --</option>");
            $("#kelurahan").val('').change();
        }
    });
  
    function validatenamapemilik() {
        var inputNamaPemilik = $("#namaPemilik").val();
        var errorMessage = $("#error-namalengkap");

        // Clear previous error message
        errorMessage.text("");

        // Check if the input is empty
        if (inputNamaPemilik.trim() === "") {
            // Display the error message
            errorMessage.text("Silahkan isi kolom ini!");
        }
    }
    function validatenamausaha() {
        var inputNamaPemilik = $("#namaUsaha").val();
        var errorMessage = $("#error-namausaha");

        // Clear previous error message
        errorMessage.text("");

        // Check if the input is empty
        if (inputNamaPemilik.trim() === "") {
            // Display the error message
            errorMessage.text("Silahkan isi kolom ini!");
        }
    }
    function validateemailusaha() {
        var inputNamaPemilik = $("#email").val();
        var errorMessage = $("#error-emailusaha");

        // Clear previous error message
        errorMessage.text("");

        // Check if the input is empty
        if (inputNamaPemilik.trim() === "") {
            // Display the error message
            errorMessage.text("Silahkan isi kolom ini!");
        }
    }
    function validatekelamin() {
        var inputNamaPemilik = $("#jenisKelamin").val();
        var errorMessage = $("#error-kelamin");

        // Clear previous error message
        errorMessage.text("");

        // Check if the input is empty
        if (inputNamaPemilik.trim() === "") {
            // Display the error message
            errorMessage.text("Silahkan isi kolom ini!");
        }
    }
    function validateprovinsi() {
        var inputNamaPemilik = $("#provinsi").val();
        var errorMessage = $("#error-provinsi");

        // Clear previous error message
        errorMessage.text("");
        
        // Check if the input is empty
        if (inputNamaPemilik == null) {
            errorMessage.text("Silahkan isi kolom ini!");
        }
    }
    function validatekabupaten() {
        var inputNamaPemilik = $("#kabupaten").val();
        var errorMessage = $("#error-kabupaten");
        // Clear previous error message
        errorMessage.text("");
        
        // Check if the input is empty
        if (inputNamaPemilik === "") {
            errorMessage.text("Silahkan isi kolom ini!");
        }
    }
    function validatekecamatan() {
        var inputNamaPemilik = $("#kecamatan").val();
        var errorMessage = $("#error-kecamatan");

        // Clear previous error message
        errorMessage.text("");
        
        // Check if the input is empty
        if (inputNamaPemilik === "") {
            errorMessage.text("Silahkan isi kolom ini!");
        }
    }
    function validatekelurahan() {
        var inputNamaPemilik = $("#kelurahan").val();
        var errorMessage = $("#error-kelurahan");

        // Clear previous error message
        errorMessage.text("");
        
        // Check if the input is empty
        if (inputNamaPemilik === "") {
            errorMessage.text("Silahkan isi kolom ini!");
        }
    }
    function validatealamat() {
        var inputNamaPemilik = $("#alamat").val();
        var errorMessage = $("#error-alamat");

        // Clear previous error message
        errorMessage.text("");
        
        // Check if the input is empty
        if (inputNamaPemilik === "") {
            errorMessage.text("Silahkan isi kolom ini!");
        }
    }
    function validatekelamin() {
        var inputNamaPemilik = $("#jenisKelamin").val();
        var errorMessage = $("#error-kelamin");
        // Clear previous error message
        errorMessage.text("");
        
        // Check if the input is empty
        if (inputNamaPemilik == null) {
            errorMessage.text("Silahkan isi kolom ini!");
        }
    }
    function validatenib(input) {
        var inputNamaPemilik = $("#nib").val();
        var errorMessage = $("#error-nib");
        const value = input.value.replace(/\D/g, ''); // Hapus karakter non-angka
        input.value = value.substring(0, 16); 
        // Clear previous error message
        errorMessage.text("");
        
        // Check if the input is empty
        if (inputNamaPemilik === "") {
            errorMessage.text("Silahkan isi kolom ini!");
        }
    }

    function onSubmit(token) {
        console.log(token);
        let name = $("input[name='name']").val();
        let email = $("input[name='email']").val();
        let no_wa = $("input[name='no_wa']").val();
        let password = $("input[name='password']").val();
        let konfirmasi_password = $("input[name='konfirmasi_password']").val();
        // Simpan nilai input dalam sebuah objek
        let nilaiInput = {
          name: name,
          email: email,
          no_wa: no_wa,
          password: password,
          konfirmasi_password: konfirmasi_password
        };
        console.log(nilaiInput.name);

        if (name != '' && password != '' && email != '' && no_wa != '') {
          if (konfirmasi_password != password) {
            $.toast({
              heading: 'Mohon Lakukan',
              text: "Konfirmasi password tidak sama dengan password yang dimasukkan",
              icon: "error",
              hideAfter: false,
              position: 'top-right',
              loaderBg: '#9EC600'
            });

          } else {
            $(".for-loading").attr('style', 'display:');
            document.getElementById("formDaftar").submit();
          }
        } else {
          let msg = '';
          if (name == '') {
            msg = "Nama Lengkap (Sesuai KTP)"
          } else if (email == '') {
            msg = "Email"
          } else if (no_wa == '') {
            msg = "No. Telp (WhatsApp Aktif)"
          } else {
            msg = "Password / Konfirmasi"
          }

          $.toast({
            heading: 'Mohon Lakukan',
            text: "Pengisian " + msg + " dengan benar",
            icon: "error",
            hideAfter: false,
            position: 'top-right',
            loaderBg: '#9EC600'
          })
        }
    }
</script>
@endsection