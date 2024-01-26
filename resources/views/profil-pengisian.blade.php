<style>
    .form-floating>.form-control:focus, .form-floating>.form-control:not(:placeholder-shown), .form-floating>.form-select{
        padding-top: 1.725rem;
        padding-bottom: 0.425rem;
    }
</style>
<h4>Harap lengkapi profil usaha anda terlebih dahulu: </h4>
    <br>
    <form action="{{route('submit-profil')}}" method="POST" >
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
              {{-- value="{{auth()->user()->name}}" --}}
              required
              aria-label="Floating label select example"
              oninvalid="this.setCustomValidity(
                $.toast({
            heading: 'Mohon Lakukan',
            text: "Mohon Lengkapi Kolom " + msg,
            icon: "error",
            hideAfter: false,
            position: 'top-right',
            loaderBg: '#9EC600'
        })
              )"
              onchange="this.setCustomValidity('')"
              readonly
            />
            <label for="namaPemilik" class="ms-4"
              ><i class="fa-solid fa-user me-2"></i> Nama Lengkap Pemilik <span style="color: red; font-weight:bold">*</span></label
            >
          </div>
        </div>
      
      <div class="col-md-12 text-center mb-5 mt-5">
        <button  class="btn btn-primary rounded-pill p-3 "  
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
    
    function submitProfil() {
    let namaPemilik = $('#namaPemilik').val();
    let msg = '';

    if (namaPemilik == '') {
        msg = "Nama Lengkap Pemilik";
    }

    if (msg !== '') {
        $.toast({
            heading: 'Mohon Lakukan',
            text: "Mohon Lengkapi Kolom " + msg,
            icon: "error",
            hideAfter: false,
            position: 'top-right',
            loaderBg: '#9EC600'
        });

        // Prevent form submission
        return false;
    }

    // If all validations pass, submit the form
    // (Note: This assumes your form has an ID, replace 'yourFormId' with the actual ID)
    $('#yourFormId').submit();
}

</script>