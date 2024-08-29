<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hamko - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <section>
        <div class="container">
            <div class="row vh-100 align-items-center">
                <div class="card col-lg-4 mx-auto border-0 shadow">
                    <div class="card-body">
                        <form action="{{ route('login.verify') }}" method="POST">
                            @csrf
                            <a href="#"><img src="{{ asset('images/logo.webp') }}"
                                    style="max-width: 130px;margin:auto;display:block;margin-bottom:20px" alt=""></a>
                            <input type="text" class="form-control" placeholder="Email" name="email" value="hamko@gmail.com">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input value="password" type="password" class="form-control my-2" placeholder="*******" name="password">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <button class="btn btn-success rounded-0 w-100">Login</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>