    <?php session_start() ?>
    <?php if(isset($_SESSION['email'])) { ?>
    <!-- NAVBAR LOGIN-->
    <div class="navbar-sticky bg-light">
            <div class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a href="index.php" class="navbar-brand fw-bold d-none-d-sm-block flex-shrink-0">Crealink Digital<span
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

                        <?php if($_SESSION['accountType'] == 1) { ?>
                        <a href="my-course.php" class="nav-link navbar-tool d-none d-lg-flex">My course</a>
                        <?php } ?>
                        <a href="" class="nav-link navbar-tool d-none d-lg-flex">My learning</a>

                        <a href="cart.php" class="nav-link navbar-tool d-none d-lg-flex">
                            <i class="fas fa-shopping-cart">
                                <span id="cartCountItems" class="badge rounded-pill badge-notification bg-danger"></span>
                            </i>
                        </a>

                        <div class="dropdown navbar-tool">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo $_SESSION['profilePicture'] ?>" class="rounded-circle"
                                    height="30" alt="" loading="lazy" />
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="settings.php"><span class="fas fa-user-circle"></span> Account</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><span class="fas fa-credit-card"></span> Payment options</a></li>
                                <?php if($_SESSION['accountType'] == 1) { ?>
                                <li><a class="dropdown-item" href="create-course.php"><span class="fas fa-plus"></span> Create course</a></li>
                                <?php } ?>
                                <li><a class="dropdown-item" href="../services/logout.php"><span class="fas fa-sign-out-alt"></span> Logout</a>
                                </li>
                            </ul>
                        </div>
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
                        <?php if($_SESSION['accountType'] == 1) { ?>
                        <li class="nav-item">
                            <a href="" class="nav-link">My course</a>
                        </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a href="" class="nav-link">My learning</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
         import { GLOBAL } from '../services/GLOBAL.js';

        $(document).ready( () => {
            
            getCartCountItems(<?php echo $id = $_SESSION['id']; ?>);

        });

        function getCartCountItems(userId) {

            $.ajax({
            url: GLOBAL.url + "/getCartCountItems/" + userId,
            async: true,
			type: 'GET',
			dataType: 'json',
            contentType: 'application/json; charset=utf-8',
			success: function(data) {
                $('#cartCountItems').append(data.itemInCart);
            },
			error: function(x, y, z) {
				alert("Error en la api: " + x + y + z);				
            }
			});
        }
    </script>

    <!-- /NAVBAR LOGIN-->
    <?php } else {?>
    <!-- NAVBAR NOT LOGIN-->
    <div class="navbar-sticky bg-light">
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a href="index.php" class="navbar-brand fw-bold d-none-d-sm-block flex-shrink-0">Crealink Digital<span
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

                    <a href="login.php" class="nav-link navbar-tool d-none d-lg-flex btn-login">Log In</a>

                    <a href="register.php" class="nav-link navbar-tool d-none d-lg-flex btn-register btn">Register</a>

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
                        <a href="login.php" class="nav-link">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a href="register.php" class="nav-link">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /NAVBAR NOT LOGIN -->
    <?php } ?>