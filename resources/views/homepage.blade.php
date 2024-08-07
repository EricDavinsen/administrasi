<!DOCTYPE html>
<html lang="en">

<head>
    @include('vendor/laravelpwa/meta')
    @laravelPWA
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUSDALOPS-PB</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset("img/logo.png")}}" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Core theme CSS (includes Bootstrap)-->
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css" />
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    
</head>

<body>
    <section class="background-wall vh-100 gradient-form">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100 z-index 1">
                <div class="col-xl-10">
                    <div class="homepage card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-5 col-sm-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <img src="{{ 'img/logo.png' }}" style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">PUSDALOPS-PB</h4>
                                    </div>
                                    <form action="{{ url('/login') }}" method="post">
                                        @csrf
                                        <p>Please login to your account</p>
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="emailinput">Email or Username</label>
                                            <input type="text" id="emailinput" name="email" class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Please enter your email address" value="{{ old('email') }}" />
                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="passwordinput">Password</label>
                                            <input type="password" id="passwordinput" name="password"
                                                class="form-control @error('password') is-invalid @enderror" placeholder="********" />
                                            @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="text-center pt-1 mb-3 pb-1">
                                            <button class="btn-login btn btn-primary btn-success" name="login" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="sidecard-login col-lg-7 col-sm-6 d-flex align-items-center">
                                <div class="content-sidecard w-100 "></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('sweetalert::alert')

</body>
</html>
