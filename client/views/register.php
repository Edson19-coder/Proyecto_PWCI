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
    <link rel="stylesheet" href="css/register.css">
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
    <div class="register-content container" style="display: flex; justify-content: center; padding: 70px;">
        <div class="col-6">
            <div class="col-12 text-center background-register">
                <div class="col-12" style="margin: 20px 0px;">
                    <a href="" class="navbar-brand fw-bold d-none-d-sm-block flex-shrink-0"
                        style="color:black;">Crealink Digital<span class="text-primary">.</span></a>
                </div>
                <div class="col-12" style="display: flex; justify-content: center; padding: 20px;">
                    <form class="col-10">
                        <div class="mb-3">
                            <label for="InputUserRegister" class="form-label">User name</label>
                            <input type="text" class="form-control" id="InputUserRegister">
                            <span class="hide" id="span-user-name" style="color: red">*User name is required</span>
                        </div>
                        <div class="mb-3">
                            <label for="InputNameRegister" class="form-label">Name</label>
                            <input type="text" class="form-control" id="InputNameRegister">
                            <span class="hide" id="span-user-name" style="color: red">*Name is required</span>
                        </div>
                        <div class="mb-3">
                            <label for="InputSecondNameRegister" class="form-label">Second name</label>
                            <input type="text" class="form-control" id="InputSecondNameRegister">
                        </div>
                        <div class="mb-3">
                            <label for="InputLastNameRegister" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="InputLastNameRegister">
                            <span class="hide" id="span-user-name" style="color: red">*Last name is required</span>
                        </div>
                        <div class="mb-3">
                            <label for="InputEmailRegister" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="InputEmailRegister"
                                aria-describedby="emailHelp">
                            <span class="hide" id="span-email" style="color: red">*Email is required</span>
                        </div>
                        <div class="mb-3">
                            <label for="InputPasswordRegister" class="form-label">Password</label>
                            <input type="password" class="form-control" id="InputPasswordRegister">
                            <span class="hide" id="span-password" style="color: red">*Password is required</span>
                        </div>
                        <div class="mb-3">
                            <label for="InputConfirmPasswordRegister" class="form-label">Confirm password</label>
                            <input type="password" class="form-control" id="InputConfirmPasswordRegister">
                            <span class="hide" id="span-confirm-password" style="color: red">*Confirm password is required</span>
                        </div>
                        <button type="submit" id="btn-sign-up" class="col-12 btn btn-primary" style="margin-bottom: 20px ;">Sign Up</button>
                        <a href="#" class="login-a" style="margin-top: 10px; color: black; text-decoration: none;">Log In</a>
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
    <script src="js/validation-register.js"></script>
    <script src="../models/user.js"></script>
    <!-- /JS -->

    <script type="module">
        
        import { GLOBAL } from '../services/GLOBAL.js';

        $(document).ready( () => {

            $('#btn-sign-up').on("click",function(event){
                event.preventDefault();

                var user = new User($('#InputUserRegister').val(), $('#InputNameRegister').val(), $('#InputSecondNameRegister').val(), 
                $('#InputLastNameRegister').val(), $('#InputEmailRegister').val(), $('#InputPasswordRegister').val());

                addUser(user);
            });

        });

        function addUser(user) {

            var userData = {
                userName: user.userName,
                firstName: user.name,
                secondName: user.secondName,
                lastName: user.lastName,
                email: user.userEmail,
                userPassword: user.userPassword
            };

            var userDataJson = JSON.stringify(userData);

            $.ajax({
            url: GLOBAL.url + "/addUser",
            async: true,
			type: 'POST',
            data: userDataJson,
			dataType: 'json',
            contentType: 'application/json; charset=utf-8',
			success: function(data) {
                console.log(data);
                window.location.reload();
			},
			error: function(x, y, z) {
				alert("Error en la api: " + x + y + z);				
            }
			});
        };

    </script>

</body>

</html>