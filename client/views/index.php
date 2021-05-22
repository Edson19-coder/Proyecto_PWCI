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

            <div class="row" style="display: flex; justify-content:start;">

                <a href="" class="a-course">
                    <div class="card p-0" style="width: 18rem;">
                        <img src="../src/image/php-curso.png"
                            class="card-img-top" alt="">
                        <div class="card-body">
                            <p class="card-text">Curso de PHP basico.</p>
                            <h5 class="card-title">1. Herramientas basicas.</h5>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">25%</div>
                            </div>
                        </div>
                        <div class="card-footer" style="text-align: right;">
                            <p class="card-text"><small class="text-muted">30 mins</small></p>
                        </div>
                    </div>
                </a>

                <a href="" class="a-course">
                    <div class="card p-0" style="width: 18rem;">
                        <img src="../src/image/gestion-de-desarollo.png"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Gestión y desarollo de proyec...</p> <!-- MAX CHARACTERS 32 -->
                            <h5 class="card-title">4. Metodologia SCRUM.</h5> <!-- MAX CHARACTERS 22 -->
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">80%</div>
                            </div>
                        </div>
                        <div class="card-footer" style="text-align: right;">
                            <p class="card-text"><small class="text-muted">10 mins</small></p>
                        </div>
                    </div>
                </a>

                <a href="" class="a-course">
                    <div class="card p-0" style="width: 18rem;">
                        <img src="../src/image/aprende-marketing-digital.png"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Aprende Marketing Digital.</p>
                            <h5 class="card-title">2. Google Ads.</h5>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">50%</div>
                            </div>
                        </div>
                        <div class="card-footer" style="text-align: right;">
                            <p class="card-text"><small class="text-muted">18 mins</small></p>
                        </div>
                    </div>
                </a>

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
        
    </script>
</body>

</html>