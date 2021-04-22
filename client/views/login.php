<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <!-- /CSS -->
</head>

<body>
    <!-- NAVBAR -->
    <div class="navbar-sticky bg-light">
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a href="" class="navbar-brand fw-bold d-none-d-sm-block flex-shrink-0">Crealink Digital<span
                        class="text-primary">.</span></a>
                <div class="input-group d-none d-lg-flex mx-4">
                    <input type="text" class="form-control rounded-end" type="text" placeholder="Search for courses">
                </div>
                <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button>

                    <div class="dropdown navbar-tool">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu categories" aria-labelledby="navbarDropdownMenuLink">
                            <div class="row">
                                <div class="col-6">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </div>
                                <div class="col-6">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </div>
                            </div>
                        </ul>
                    </div>

                    <a href="" class="nav-link navbar-tool d-none d-lg-flex btn-login">Log In</a>

                    <a href="" class="nav-link navbar-tool d-none d-lg-flex btn-register btn">Register</a>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="navbar-collapse collapse" id="navbarCollapse">
                <!-- Search-->
                <div class="input-group d-lg-none my-3"><i
                        class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
                    <input class="form-control rounded-start" type="text" placeholder="Search for courses">
                </div>
                <!-- Primary menu-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /NAVBAR -->

    <!-- CONTENT -->
    <div class="login-content container" style="display: flex; justify-content: center; padding: 70px;">
        <div class="col-6">
            <div class="col-12 text-center background-login">
                <div class="col-12" style="margin: 20px 0px;">
                    <a href="" class="navbar-brand fw-bold d-none-d-sm-block flex-shrink-0"
                        style="color:black;">Crealink Digital<span class="text-primary">.</span></a>
                </div>
                <div class="col-12" style="display: flex; justify-content: center; padding: 20px;">
                    <form id="loginForm" class="col-10">
                        <div class="mb-3">
                            <label for="InputEmailLogin" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="InputEmailLogin"
                                aria-describedby="emailHelp">
                            <span class="hide" id="span-email" style="color: red">*Email is required</span>
                        </div>
                        <div class="mb-3">
                            <label for="InputPasswordLogin" class="form-label">Password</label>
                            <input type="password" minlength="8" class="form-control" id="InputPasswordLogin">
                            <span class="hide" id="span-password" style="color: red">*Password is required</span>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button id="btn-sign-in" type="submit" class="col-12 btn btn-primary" style="margin-bottom: 20px ;">Sign In</button>
                        <a href="#" class="register-a" style="margin-top: 10px; color: black; text-decoration: none;">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /CONTENT -->

    <!-- JS -->
    <script src="js/bootstrap.min.js"></script>
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/validations-login.js"></script>
    <!-- /JS -->

    <script type="module">
         import { GLOBAL } from '../services/GLOBAL.js';

        $('#loginForm').submit( (e) =>{
          
        });
    </script>
</body>

</html>