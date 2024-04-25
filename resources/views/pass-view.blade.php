<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Reset Password || UMKM LEVELUP</title>
</head>

<body>
    <div class="card" style="width: 30rem; margin: auto; margin-top: 10rem;">
        <div class="card-body">
            <h5 class="card-title">Form Reset Password</h5>
            <form action="/update-password" method="POST">
                @csrf
                <div class="mb-3">
                    @if (session('error'))
                        
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                       {{session('error')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                    <div class="alert alert-info" role="alert">
                        Masukkan Password Baru Untuk Email {{$email}}
                      </div>
                    <label for="exampleInputEmail1" class="form-label">Password <small style="color: red">*</small></label>
                    <input type="password" class="form-control" name="password" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    <input type="hidden" value="{{$email}}" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
