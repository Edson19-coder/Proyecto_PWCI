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
    <link rel="stylesheet" href="css/settings.css">
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

    <!-- Content -->

    <div class="container col-12 text-center" style="padding: 30px;">

        <div class="settings-content">
            <div class="col-12">
                <img id="user-image-view" src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle" height="200" alt="" loading="lazy" />
            </div>
            <div class="col-12" style="padding: 20px;">
                <h1 id="user-name-view"></h1>
            </div>
            <div class="form-content col-6" style="margin-left: auto; margin-right: auto;">
                <form class="col-10">
                       
                        <div class="form-group mb-3">
                            <label for="image" class="form-label">
                                Add photo to porfile
                            </label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                       </div>
                    
                       <div class="mb-3">
                            <label for="InputUserNameSettings" class="form-label">User name</label>
                            <input type="text" class="form-control" id="InputUserNameSettings">
                        </div>
                        
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="InputFirstNameSettings" class="form-label">First name</label>
                                        <input type="text" class="form-control" id="InputFirstNameSettings">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="InputSecondNameSettings" class="form-label">Second name</label>
                                        <input type="text" class="form-control" id="InputSecondNameSettings">
                                     </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="InputLastNameSettings" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="InputLastNameSettings">
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="InputCountrySettings" class="form-label">Country</label>
                                        <input type="text" class="form-control" id="InputCountrySettings">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="InputStateSettings" class="form-label">State</label>
                                        <input type="text" class="form-control" id="InputStateSettings">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="InputCitySettings" class="form-label">City</label>
                                        <input type="text" class="form-control" id="InputCitySettings">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="InputPCSettings" class="form-label">Postal code</label>
                                        <input type="text" class="form-control" id="InputPCSettings">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="InputEmailSettings" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="InputEmailSettings"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="InputPasswordSettings" class="form-label">Password</label>
                            <input type="password" minlength="8" class="form-control" id="InputPasswordSettings">
                        </div>
                        <button id="btn-update" type="submit" class="col-12 btn btn-primary" style="margin-bottom: 20px ;">Update</button>
                </form>
            </div>
        </div>
    </div>

    <!-- /Content -->

    <!-- JS -->
    <script src="js/bootstrap.min.js"></script>
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/notifications.js"></script>
    <script src="../models/user.js"></script>
    <!-- /JS -->

    <script type="module">
         import { GLOBAL } from '../services/GLOBAL.js';

        $(document).ready( () => {
            getUserById(<?php echo $_SESSION['id'] ?>)

            $('#btn-update').on('click', (event) => {
                event.preventDefault();

                var foto = $('input[name="image"]')[0].files[0];

                var user = new UserComplete(<?php echo $_SESSION['id'] ?> ,$("#InputUserNameSettings").val(), $("#InputFirstNameSettings").val(),  $("#InputSecondNameSettings").val(), $("#InputLastNameSettings").val(), 
                $("#InputEmailSettings").val(), $("#InputPasswordSettings").val(), null, $("#InputCountrySettings").val(), $("#InputStateSettings").val(), $("#InputCitySettings").val(), 
                $("#InputPCSettings").val(), foto);

                updateUser(user);
            });
        });

        function getUserById(userId) {
            var userData = {
                id: userId
            };

            var userDataJson = JSON.stringify(userData);

            $.ajax({
            url: GLOBAL.url + "/getUserById",
            async: true,
            type: 'POST',
            data: userDataJson,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
                success: function(user) {
                    console.log(user);
                    $("#InputUserNameSettings").val(user.username);
                    $("#InputFirstNameSettings").val(user.firstName);
                    $("#InputSecondNameSettings").val(user.secondName);
                    $("#InputLastNameSettings").val(user.lastNames);
                    $("#InputCountrySettings").val(user.country);
                    $("#InputStateSettings").val(user.state);
                    $("#InputCitySettings").val(user.city);
                    $("#InputPCSettings").val(user.postalCode);
                    $("#InputEmailSettings").val(user.email);
                    $("#InputPasswordSettings").val(user.userPassword);
                },
                error: function(x, y, z) {
                    alert("Error en la api: " + x + y + z);				
                }
            });
        }
        
        function updateUser(user) {
            var userData = {
                id: user.id,
                userName: user.userName,
                email: user.userEmail,
                userPassword: user.userPassword,
                firstName: user.name,
                secondName: user.secondName,
                lastName: user.lastName,
                birthday: user.birthday,
                country: user.country,
                state: user.state,
                city: user.city,
                postalCode: user.postalCode,
                profilePicture: user.profilePicture
            };

            var userDataJson = JSON.stringify(userData);

            $.ajax({
            url: GLOBAL.url + "/updateUser",
            async: true,
            type: 'POST',
            data: userDataJson,
            contentType: 'application/json; charset=utf-8',
                success: function(user) {
                    console.log(user);
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