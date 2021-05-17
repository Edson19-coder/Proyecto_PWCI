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
    <link rel="stylesheet" href="css/course.css">
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
    <div class="container col-12" style="padding: 20px;">
        <div class="row">
            <div class="col-md-8 description-course">
                <h2 id="title"></h2>
                <p id="intructor"><i class="fas fa-user-alt"></i></p>
                <p id="lastUpdate"><i class="fas fa-calendar"></i></p>
                <p><i class="fas fa-user-graduate"></i>1200 paticipants</p>
                <h5 id="shortDescription"></h5>
                <p>
                <p class="fw-bold">Description:</p>
                <p id="longDescription"></p>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div id="imagePreview">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title" style="text-align: center; color: green;" id="price"></h3>
                        <div class="col-12">
                            <a id="addToCart" class="col-12 btn-shop btn btn-primary add-cart">Add to cart</a>
                            <button type="button" class="col-12 btn-shop btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalBuyNow">
                                Buy now
                            </button>

                            <!-- Modal Edit Lesson -->
                            <div class="modal fade" id="modalBuyNow" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold" id="staticBackdropLabel">RESUME<span
                                                    class="text-primary">.</span></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="col-12 mb-3">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5>Price:</h5>
                                                        </div>
                                                        <div class="col-6 text-end">
                                                            <h5 style="color: green;" id="priceBuyNow"></h5>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h5>Card</h5>
                                                    <form class="credit-card-div">
                                                        <div class="col-12 mb-3">
                                                            <input type="number" class="form-control" name="" id="card-number" placeholder="Enter Card Number">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4 mb-3">
                                                                <span class="help-block text-muted small-font">Expiry Month</span>
                                                                <input type="number" minlength="0" max="2" name="" id="card-mouth" class="form-control" placeholder="MM">
                                                            </div>
                                                            <div class="col-4 mb-3">
                                                                <span class="help-block text-muted small-font">Expiry Year</span>
                                                                <input type="number" name="" id="card-year" class="form-control" placeholder="YYYY">
                                                            </div>
                                                            <div class="col-4 mb-3">
                                                                <span class="help-block text-muted small-font">CCV</span>
                                                                <input type="number" name="" id="card-ccv" class="form-control" placeholder="CCV">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <input type="text" class="form-control" name="" id="card-titular" placeholder="Name On The Card">
                                                        </div>
                                                    </form>
                                                    <hr>
                                                    <p style="font-size: x-small;">
                                                        Crealink Digital está obligado por ley a recaudar los impuestos sobre las
                                                        transacciones de las compras realizadas en determinadas
                                                        jurisdicciones fiscales.
                                                        <br>
                                                        Al completar la compra, aceptas las Condiciones de uso.
                                                    </p>
                                                </div>
                                                <div class="text-end">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" id="btn-check-out" data-bs-dismiss="modal" class="btn btn-primary">Check out</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Modal Edit Lesson -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /CONTENT -->

    <!-- JS -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/course-notifications.js"></script>
    <script src="../models/cart.js"></script>
    <script src="../models/course.js"></script>
    <!-- /JS -->

    <script type="module">
         import { GLOBAL } from '../services/GLOBAL.js';

        var currentCourse;

        $(document).ready( () => {
            var courseId = getParameterByName('course');
            getCourseViewId(courseId);

            $('#addToCart').on('click', (event) => {
                addToCart();
            });

            $('#btn-check-out').on('click', (event) => {
                checkOut();
            });

        });

        function getParameterByName(name) {
            name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
            var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
            return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
        }

        function getCourseViewId(courseId) {

            $.ajax({
            url: GLOBAL.url + "/getCourseById/" + courseId,
            async: true,
			type: 'POST',
			dataType: 'json',
            contentType: 'application/json; charset=utf-8',
			success: function(course) {
                $('#title').append(course.title);
                $('#intructor').append(course.firstName + " " + course.lastNames);
                $('#lastUpdate').append("Last update " + course.createdAt);
                $('#shortDescription').append(course.shortDescription);
                $('#longDescription').append(course.longDescription);
                $('#imagePreview').append('<img src="'+ course.imageUrl +'" class="card-img-top" alt="...">');
                if(course.price > 0) {
                    $('#price').append("$"+ course.price +" MX");
                    $('#priceBuyNow').append("$"+ course.price +" MX");
                } else {
                    $('#price').append("FREE");
                    $('#priceBuyNow').append("FREE");
                }                
			},
			error: function(x, y, z) {
				alert("Error en la api: " + x + y + z);				
            }
			});
        }

        function addToCart() {
            var courseId = getParameterByName('course');
            var userId = <?php echo $id = $_SESSION['id']; ?>;
        
            var itemData = {
                userId: userId,
                courseId: courseId
            };

            var itemDataJson = JSON.stringify(itemData);

            $.ajax({
                url: GLOBAL.url + "/addCart",
                async: true,
                type: 'POST',
                data: itemDataJson,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function(data) {
                    console.log(data);
                    getCartCountItems(<?php echo $id = $_SESSION['id']; ?>);
                },
                error: function(x, y, z) {
                    alert("Error en la api: " + x + y + z);				
                }
			});

        }

        function checkOut() {
            var courseId = getParameterByName('course');
            getCourseId(courseId, "checkOut");
        }

        function getCourseId(courseId, action) {
            $.ajax({
            url: GLOBAL.url + "/getCourseById/" + courseId,
            async: true,
            type: 'POST',
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            success: function(course) {
                course = new Course(courseId, course.title, course.firstName + " " + course.lastNames, course.createdAt, 1200, 
                course.shortDescription, course.longDescription, course.price);                
                if(action == "addCart") {
                    console.log(course);
                    console.log("Añadido al carrito");
                } else {
                    console.log(course);
                    console.log("Buy now");
                }
            },
            error: function(x, y, z) {
                alert("Error en la api: " + x + y + z);				
            }
            });
        }

        function getCartCountItems(userId) {

            $.ajax({
            url: GLOBAL.url + "/getCartCountItems/" + userId,
            async: true,
            type: 'GET',
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            success: function(data) {
                $('#cartCountItems').empty();
                $('#cartCountItems').append(data.itemInCart);
            },
            error: function(x, y, z) {
                alert("Error en la api: " + x + y + z);				
            }
            });
        }
        
    </script>

</body>

</html>