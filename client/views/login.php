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
    <?php 
        include 'navbar.php';
    ?>
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
                    <form class="col-10">
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
                        <a href="register.php" class="register-a" style="margin-top: 10px; color: black; text-decoration: none;">Register</a>
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
    <script src="../models/user.js"></script>
    <!-- /JS -->

    <script type="module">
         import { GLOBAL } from '../services/GLOBAL.js';

        $(document).ready( () => {

            <?php if(isset($_SESSION['email'])) { ?>
                window.location.replace("index.php");
            <?php } ?>
            
            $('#btn-sign-in').on('click', (event) => {
                event.preventDefault();

                var user = new User($('#InputEmailLogin').val(), $('#InputPasswordLogin').val());
                
                getUserByEmailPassword(user);
            });

        });

        function getUserByEmailPassword(user) {
            var userData = {
                email: user.userEmail,
                userPassword: user.userPassword
            };

            var userDataJson = JSON.stringify(userData);

            $.ajax({
            url: GLOBAL.url + "/getUserByEmailPassword",
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
        }
        
    </script>
</body>

</html>