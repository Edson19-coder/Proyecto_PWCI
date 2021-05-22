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
    <link rel="stylesheet" href="css/my-learning.css">
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
    <!-- CONTENT -->
    <div class="container col-12 my-learning" style="padding: 20px;">
        <div class="col-12" style="background-color: white; padding: 20px;">

            <div class="row">

                <div class="col-12 title text-center">
                    <h3>Results</h3>
                    <hr>
                </div>

                <div id="courses" class="row">
                    
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
    <script src="../models/course.js"></script>
    <!-- /JS -->

    <script type="module">
         import { GLOBAL } from '../services/GLOBAL.js';

        $(document).ready( () => {
            var search = getParameterByName('search');
            var categorie = getParameterByName('categorie');

            if(search != "") {
                getCourseBySearch(search);
            } else if(categorie != "") {
                getCourseByCategorie(categorie);
            }

        });

        function getParameterByName(name) {
            name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
            var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
            return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
        }

        function getCourseBySearch(search) {
            $.ajax({
                url: GLOBAL.url + "/getCourseSearch/" + search,
                async: true,
                type: 'GET',
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function(cursos) {
                    if(cursos.message) return null;
                    for(let curso of cursos) {
                        var cursoA = new CoursePreview(curso.id, curso.title, curso.shortDescription, curso.longDescription, curso.imageUrl, curso.price)
                        $('#courses').append(cursoA.getHtml());
                    }
                },
                error: function(x, y, z) {
                    alert("Error en la api: " + x + y + z);				
                }
			});
        }

        function getCourseByCategorie(categorie) {
            $.ajax({
                url: GLOBAL.url + "/getCourseByCategorieId/" + categorie,
                async: true,
                type: 'GET',
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function(cursos) {
                    if(cursos.message) return null;
                    for(let curso of cursos) {
                        var cursoA = new CoursePreview(curso.id, curso.title, curso.shortDescription, curso.longDescription, curso.imageUrl, curso.price)
                        $('#courses').append(cursoA.getHtml());
                    }
                },
                error: function(x, y, z) {
                    alert("Error en la api: " + x + y + z);				
                }
			});
        }

        function getCourse() {
            $.ajax({
                url: GLOBAL.url + "/getCourseByInstructor/" + <?php echo $_SESSION['id'] ?>,
                async: true,
                type: 'GET',
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function(cursos) {
                    if(cursos.message) return null;
                    
                    for(let curso of cursos) {
                        var cursoA = new CoursePreviewSmall(curso.id, curso.title, curso.imageUrl, curso.createdAt);
                        $('#courses').append(cursoA.getHtml());
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