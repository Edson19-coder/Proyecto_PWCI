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
    <link rel="stylesheet" href="css/shopping-cart.css">
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

    <!-- CONTAINER -->
    <div class="container col-12" style="padding: 20px;">
        
        <div class="row shopping-cart-container" style="background-color: white;">

                <div class="col-8 learnings-list" style="padding: 10px;">
    
                    <h3>Shopping Cart</h3>
                    <hr>

                    <div id="itemsShoppingCart">

                    </div>
    
                </div>
                <div class="col-4 total-to-pay" style="padding: 10px;">
                    <h3>Total:</h3>
                    <hr>
                    <h1 id="montoTotal"></h1>
                    <div class="col-12" style="margin-bottom: 20px;">
                        <button type="button" id="btn-check-out" class="btn btn-primary" style="width: 100%;">Check out</button>
                    </div>
                    <hr>
                    <h3>Card:</h3>
                    <form class="credit-card-div">
                        <div class="col-12">
                            <input type="number" class="form-control" name="" id="card-number" placeholder="Enter Card Number">
                        </div>
                        <div class="row">
                            <div class="col-4 credit-card-inp">
                                <span class="help-block text-muted small-font">Expiry Month</span>
                                <input type="number" minlength="0" max="2" name="" id="card-mouth" class="form-control" placeholder="MM">
                            </div>
                            <div class="col-4 credit-card-inp">
                                <span class="help-block text-muted small-font">Expiry Year</span>
                                <input type="number" name="" id="card-year" class="form-control" placeholder="YYYY">
                            </div>
                            <div class="col-4 credit-card-inp">
                                <span class="help-block text-muted small-font">CCV</span>
                                <input type="number" name="" id="card-ccv" class="form-control" placeholder="CCV">
                            </div>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" name="" id="card-titular" placeholder="Name On The Card">
                        </div>
                        <div class="col-12 credit-card-inp">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Save details for fast payments.</label>
                        </div>
                    </form>
                </div>
        </div>
        
    </div>
    <!-- /CONTAINER -->

    <!-- JS -->
    <script src="js/bootstrap.min.js"></script>
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/validations-shopping-cart.js"></script>
    <script src="js/notifications-shopping-cart.js"></script>
    <script src="../models/cart.js"></script>
    <!-- /JS -->
    <script type="module">
         import { GLOBAL } from '../services/GLOBAL.js';

        $(document).ready( () => {
            
            $('#montoTotal').append("$0 MX");

            getCartByUser(<?php echo $id = $_SESSION['id']; ?>);

            $(document).on('click','.btnDeleteItem', function(){
                var itemId = $(this).val();
                deleteItem(itemId);
            })

        });

        function getCartByUser(userId) {

            $.ajax({
            url: GLOBAL.url + "/getCart/" + userId,
            async: true,
			type: 'GET',
			dataType: 'json',
            contentType: 'application/json; charset=utf-8',
			success: function(data) {
                var total = 0;
                if(Array.isArray(data)) {
                    data.forEach(element => {
                    var item = new PreviewItemCart(element.id, element.title, element.firstName + " " + element.lastNames, element.price, element.imageUrl);
                    total = total + parseInt(item.price);
                    $('#itemsShoppingCart').append(item.getHtml());
                });
                }
                $('#montoTotal').empty();
                $('#montoTotal').append("$" + total + " MX");
            },
			error: function(x, y, z) {
				alert("Error en la api: " + x + y + z);				
            }
			});
        }

        function deleteItem(itemId) {

            $.ajax({
            url: GLOBAL.url + "/deleteItemCart/" + itemId,
            async: true,
            type: 'POST',
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            success: function(data) {
                console.log(data);
                
                $( "#itemsShoppingCart" ).empty();
                
                $('#montoTotal').empty();
                $('#montoTotal').append("$0 MX");
                getCartByUser(<?php echo $id = $_SESSION['id']; ?>);
                getCartCountItems(<?php echo $id = $_SESSION['id']; ?>);
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