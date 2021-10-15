<!DOCTYPE html>
<html lang="en">

<head>
<?php
    date_default_timezone_set('America/Monterrey');
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/home.css">
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

    <?php if(isset($_SESSION['email'])) { ?>
    <!-- WELCOME BACK -->
    <div class="container col-12" style="padding: 0px 60px;">
        <div class="home welcome col-12">
            <div class="row" style="padding: 12px;">
                <div class="col-12 col-xl-3" style="display: flex; justify-content: center; align-items: center;">
                    <img src="<?php echo $_SESSION['profilePicture'] ?>" class="rounded-circle"
                        height="150px" alt="" loading="lazy" />
                </div>
                <div class="text-welcome col-12 col-xl-9" style="display: flex; align-items: center;">
                    <div class="col-12">
                        <h1>Welcome back <span class="user-name"><?php echo $_SESSION['firstName'] ?></span></h1>
                        <p>Let´s learn something new today.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- WELCOME BACK -->

    <!-- IN PROGRESS -->
    <div class="home in-progress col-12" style="padding: 10px;">
        <div class="col-12 title text-center">
            <h3>In progress</h3>
            <hr>
        </div>

        <div class="col-12 in-progress-learning" style="padding: 10px;">

            <div class="row" id="inprogress" style="display: flex; justify-content:start;">


            </div>

        </div>

    </div>
    <!-- /IN PROGRESS -->
    <?php } ?>
    <!-- NEWEST -->
    <div class="home most-new col-12" style="padding: 10px;">
        <div class="col-12 title text-center">
            <h3>Newest</h3>
            <hr>
        </div>

        <div class="col-12 in-progress-learning" style="padding: 10px;">

            <div id="newestSection" class="row" style="display: flex; justify-content:start;">
            </div>

        </div>

        <div class="card-footer" style="text-align: right;">
            <a href="#">See more</a>
        </div>
    </div>
    <!-- /NEWEST  -->

    <!-- /Content -->

    <!-- JS -->
    <script src="js/bootstrap.min.js"></script>
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/notifications.js"></script>
    <script src="../models/course.js"></script>
    <!-- /JS -->

    <script type="module">
        import { GLOBAL } from '../services/GLOBAL.js';

        $(document).ready( () => {

            getCourse();
            getMyCourse()

        });

        function getCourse() {
            $.ajax({
                url: GLOBAL.url + "/getCourseLimit",
                async: true,
                type: 'GET',
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function(cursos) {
                    if(cursos.message) return null;
                    for(let curso of cursos) {
                        var cursoA = new CoursePreview(curso.id, curso.title, curso.shortDescription, curso.longDescription, curso.imageUrl, curso.price)
                        $('#newestSection').append(cursoA.getHtml());
                    }
                },
                error: function(x, y, z) {
                    alert("Error en la api: " + x + y + z);				
                }
			});
        }

        function getMyCourse() {
            $.ajax({
                url: GLOBAL.url + "/getCourseByPuchases/" + <?php echo $_SESSION['id'] ?>,
                async: true,
                type: 'GET',
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function(cursos) {

                    if(cursos.message) return null;
                    
                    for(let curso of cursos) {
                        
                        var data = {
                            courseId: curso.id,
                            userId: <?php echo $_SESSION['id'] ?>
                        };

                        var dataJson = JSON.stringify(data);
                        
                        $.ajax({
                            url: GLOBAL.url + "/getPorcentaje",
                            async: true,
                            type: 'POST',
                            data: dataJson,
			                dataType: 'json',
                            contentType: 'application/json; charset=utf-8',
                            success: function(porcentaje) {
                                console.log(curso);
                                console.log(porcentaje)
                                var cursoA = new CourseMy(curso.id, curso.title, curso.imageUrl, porcentaje.PV);
                                $('#inprogress').append(cursoA.getHtml());
                            },
                            error: function(x, y, z) {
                                alert("Error en la api: " + x + y + z);				
                            }
			            });

                    }
                },
                error: function(x, y, z) {
                    alert("Error en la api: " + x + y + z);				
                }
			});
        }
        
    </script>
</body>

</html>