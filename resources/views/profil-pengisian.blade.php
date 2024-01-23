<style>
    .form-floating>.form-control:focus, .form-floating>.form-control:not(:placeholder-shown), .form-floating>.form-select{
        padding-top: 1.725rem;
        padding-bottom: 0.425rem;
    }
</style>
<h4>Harap lengkapi profil usaha anda terlebih dahulu: </h4>
    <br>
    <form action="{{route('submit-profil')}}" method="POST">
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
          <div class="form-floating shadow  mb-3 rounded-pill">
            <input
              type="text"
              class="form-control rounded-pill px-4"
              id="namaPemilik"
              name="namaPemilik"
              required
              value="{{auth()->user()->name}}"
              readonly
            />
            <label for="namaPemilik" class="ms-4"
              ><i class="fa-solid fa-user me-2"></i> Nama Lengkap Pemilik <span style="color: red; font-weight:bold">*</span></label
            >
          </div>
        </div>
        <div class="col-lg-3">
            <div class="form-floating mb-3 shadow rounded-pill">
                <select
                  class="form-select rounded-pill shadow px-4"
                  id="jenisKelamin"
                  name="jenisKelamin"
                  required
                  aria-label="Floating label select example"
                >
                  <option value="">-- Pilih --</option>
                  <option value="Pria">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
                <label for="jenisKelamin" class="ms-4"
                  ><i
                    class="fa-solid fa-up-right-and-down-left-from-center me-2"
                  ></i
                  >Jenis Kelamin <span style="color: red; font-weight:bold">*</span></label
                >
            </div>
        </div>
        <div class="col-lg-3">
          <div class="form-floating shadow  mb-3 rounded-pill">
            <input
              type="text"
              class="form-control rounded-pill px-4"
              id="namaUsaha"
              name="namaUsaha"
              required
              placeholder="Toko ...."
            />
            <label for="namaUsaha" class="ms-4"
              ><i class="fa-solid fa-user me-2"></i> Nama Usaha (Toko) <span style="color: red; font-weight:bold">*</span></label
            >
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-floating shadow  mb-3 rounded-pill">
            <input
              type="email"
              class="form-control rounded-pill px-4"
              id="email"
              name="email"
              required
              placeholder="toko@***.com"
              value="{{auth()->user()->email}}"
              readonly
            />
            <label for="email" class="ms-4"
              ><i class="fa-solid fa-user me-2"></i> Email Usaha (Toko) <span style="color: red; font-weight:bold">*</span></label
            >
          </div>
        </div>
        <div class="col-md-12 mb-4 mt-4">
          <div class="row">
            <div class="col">
              <hr>
            </div>
            <div class="col text-center">
              Alamat Usaha : 
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
                <div class="form-floating mb-3 shadow rounded-pill">
                    <select
                    class="form-select rounded-pill shadow px-4"
                    id="provinsi"
                    name="provinsi"
                    required
                    aria-label="Floating label select example"
                    >
                    <option value="">-- Pilih --</option>
                    @foreach ($dataProv as $item)
                        <option  value="{{$item->id_provinsi}}">{{$item->nama_provinsi}}</option>
                    @endforeach
                    </select>
                    <label for="provinsi" class="ms-4"
                    ><i
                        class="fa-solid fa-up-right-and-down-left-from-center me-2"
                    ></i
                    >Provinsi <span style="color: red; font-weight:bold">*</span></label
                    >
                </div>
                </div>
                <div class="col-lg-6">
                <div class="form-floating mb-3 shadow rounded-pill">
                    <select
                    class="form-select rounded-pill shadow px-4"
                    id="kabupaten"
                    name="kabupaten"
                    required
                    aria-label="Floating label select example"
                    >
                    <option selected value="">-- Pilih --</option>
                    </select>
                    <label for="kabupaten" class="ms-4"
                    ><i
                        class="fa-solid fa-up-right-and-down-left-from-center me-2"
                    ></i
                    >Kabupaten / Kota <span style="color: red; font-weight:bold">*</span></label
                    >
                    {{-- <small for="floatingSelect">alamat usaha harus berada sesuai dengan target lokasi untuk pelaksanaan program pemdampingan umkm levelup</small> --}}
                </div>
                </div>
                <div class="col-lg-6">
                <div class="form-floating mb-3 shadow rounded-pill">
                    <select
                    class="form-select rounded-pill shadow px-4"
                    id="kecamatan"
                    name="kecamatan"
                    required
                    aria-label="Floating label select example"
                    >
                    <option selected value="">-- Pilih --</option>
                    </select>
                    <label for="kecamatan" class="ms-4"
                    ><i
                        class="fa-solid fa-up-right-and-down-left-from-center me-2"
                    ></i
                    >Kecamatan <span style="color: red; font-weight:bold">*</span></label
                    >
                    {{-- <small for="floatingSelect">alamat usaha harus berada sesuai dengan target lokasi untuk pelaksanaan program pemdampingan umkm levelup</small> --}}
                </div>
                </div>
                <div class="col-lg-6">
                <div class="form-floating mb-3 shadow rounded-pill">
                    <select
                    class="form-select rounded-pill shadow px-4"
                    id="kelurahan"
                    name="kelurahan"
                    required
                    aria-label="Floating label select example"
                    >
                    <option selected value="">-- Pilih --</option>
                    </select>
                    <label for="kelurahan" class="ms-4"
                    ><i
                        class="fa-solid fa-up-right-and-down-left-from-center me-2"
                    ></i
                    >Kelurahan <span style="color: red; font-weight:bold">*</span></label
                    >
                    {{-- <small for="floatingSelect">alamat usaha harus berada sesuai dengan target lokasi untuk pelaksanaan program pemdampingan umkm levelup</small> --}}
                </div>
                </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="form-floating mb-3 shadow ">
                    <textarea class="form-control  shadow px-4" placeholder="Alamat Lengkap" id="alamat" name="alamat" required style="height: 130px"></textarea>
                    <label for="alamat" class="ms-2"
                    ><i
                    class="fa fa-edit me-2"
                    ></i
                    >Alamat Lengkap <span style="color: red; font-weight:bold">*</span></label>
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

        <div class="col-lg-3">
          <div class="form-floating shadow  mb-3 rounded-pill">
            <input
              type="text"
              class="form-control rounded-pill px-4"
              id="no_telp"
              name="no_telp"
              placeholder="+021 *****"
              value="{{auth()->user()->no_wa}}"
              readonly
            />
            <label for="no_telp" class="ms-4"
              ><i class="fa-solid fa-user me-2"></i> No Telpon Utama </label
            >
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-floating shadow  mb-3 rounded-pill">
            <input
              type="text"
              class="form-control rounded-pill px-4"
              id="no_hp"
              name="no_hp"
              required
              placeholder="+062 *****"
            />
            <label for="no_hp" class="ms-4"
              ><i class="fa-solid fa-user me-2"></i> No Telpon Paket Data <span style="color: red; font-weight:bold">*</span></label
            >
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-floating shadow  mb-3 rounded-pill">
            <input
              type="text"
              class="form-control rounded-pill px-4"
              id="nik"
              name="nik"
              placeholder="3175******"
              oninput="validateNik(this)"
            />
            <label for="nik" class="ms-4"
              ><i class="fa-solid fa-user me-2"></i> NIK</label
            >
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-floating shadow  mb-3 rounded-pill">
            <input
              type="text"
              class="form-control rounded-pill px-4"
              id="nib"
              name="nib"
              required
              placeholder="128******"
              oninput="validateNib(this)"
            />
            <label for="nib" class="ms-4"
              ><i class="fa-solid fa-user me-2"></i> NIB <span style="color: red; font-weight:bold">*</span></label
            >
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
            Simpan
        </button>
      </div>
    </form>

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

    function validateNik(input) {
        const value = input.value.replace(/\D/g, ''); // Hapus karakter non-angka
        input.value = value.substring(0, 13); // Hapus angka jika lebih dari 13 angka
    }
    function validateNib(input) {
        const value = input.value.replace(/\D/g, ''); // Hapus karakter non-angka
        input.value = value.substring(0, 13); // Hapus angka jika lebih dari 13 angka

    }
</script>