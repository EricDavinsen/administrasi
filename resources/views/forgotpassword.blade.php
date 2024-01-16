<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
</head>

<body>
    <section class="background-wall vh-100 gradient-form">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100 z-index 1">
                <div class="col-xl-10">
                    <div class="homepage card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6 col-sm-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                    <h3><i class="fa fa-lock fa-4x"></i></h3>
                                    <h2 class="text-center">Forgot Password?</h2>
                                     <p>You can reset your password here.</p>
                                    </div>
                                    <form action="{{ url('/changepassword') }}" method="post">
                                        @csrf
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example11">Email</label>
                                            <input type="email" id="EMAIL_PEGAWAI" name="EMAIL_PEGAWAI" class="form-control"
                                                placeholder="Please enter your email address" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example22">Password</label>
                                            <input type="password" id="passwordinput" name="password"
                                                class="form-control" placeholder="********" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example22">Re-Password</label>
                                            <input type="password" id="repasswordinput" name="repassword"
                                                class="form-control" placeholder="********" />
                                        </div>

                                        <div class="register-button d-flex align-items-center gap-3">
                                            <button class="btn btn-primary btn-block fa-lg gradient-custom-4" type="submit">Confirm</button>
                                            <a href="{{ url('home') }}"  class="btn-back gradient-custom-5">Back</a>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 d-flex align-items-center gradient-custom-2">
                                <div class="w-100">    
                                    <h5 class="bpbd-title mb-1">ADMINISTRATOR WEBSITE</h5>
                                    <h1 class="bpbd-subtitle mb-4">PUSDALOPS-PB</h1>
                                </div>
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
