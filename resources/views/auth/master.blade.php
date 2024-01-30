<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>CMIS Login Panel</title>
</head>

<body>
    <section id="login" class="d-flex align-items-center pb-5">
        <div class="login-panel">
            <div class="login-section">
                <div>
                    <h3 class="mb-4 h4 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('logo2.svg') }}" width="30" alt="CMIS" class="me-2">
                        <span>CMIS LOGIN</span>
                    </h3>
                    <form action="#">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <img src="{{ asset('img/icon/user.svg') }}" alt="">
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <img src="{{ asset('img/icon/lock.svg') }}" alt="">
                                </span>
                            </div>
                            <input type="password" class="form-control br-0 password" placeholder="Password">
                            <div class="input-group-append">
                                <button type="button" class="btn input-group-text password-view password-icon">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3 forget d-flex justify-content-between">
                            <div class="form-group form-check text-left">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember</label>
                            </div>
                            <a href="#">Forget your password?</a>
                        </div>
                        <div class="">
                            <button class="btn submit-btn" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
