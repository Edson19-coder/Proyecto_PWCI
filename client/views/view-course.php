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
    <link rel="stylesheet" href="css/view-course.css">
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
    <div class="container col-12 view-course" style="padding: 20px;">
        <div class="row">

            <div class="col-md-8 video-course">

                <div id="content-view">
                </div>

                <div class="description-course">
                    <h2 id="title"></h2>
                    <p id="intructor"><i class="fas fa-user-alt"></i></p>
                    <p id="lastUpdate"><i class="fas fa-calendar"></i></p>
                    <p><i class="fas fa-user-graduate"></i>1200 paticipants</p>
                    <h5 id="shortDescription"></h5>
                    <p class="fw-bold">Description:</p>
                    <p id="longDescription"></p>
                </div>

                <div class="col-12">
                    <h1 style="text-align: center;">Comments</h1>
                    <div class="col-12 ">

                        <div class="container global container-comments" style="padding: 10px 50px ">
                            <h1 style="text-align: center;">There are no comments in this course</h1>
                        </div>

                        <!-- Create message -->
                        <form action="">
                            <div class="container">
                                <div class="col-12" style="padding-top: 20px;">
                                    <div class="col-12" style="padding: 10px; border-radius: 10px;">
                                        <div class="row">
                                            <div class="col-10">
                                                <textarea class="form-control" id="textComment"
                                                    placeholder="Comment on the course"></textarea>
                                            </div>
                                            <div class="col-2" style="text-align: center;">
                                                <input type="button" value="Enviar" class="btn btn-primary publicar-btn"
                                                    id="btnSendComment" style="line-height: 35px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- /Create message -->

                    </div>
                </div>
            </div>

            <div class="col-md-4 seactions-course">

                <div class="col-12 title text-start">
                    <h3>Content</h3>
                    <hr>
                </div>

                <div id="lessonList">
                </div>

                <button type="button" id="btn-get-certificate" class="btn btn-primary" style="width: 100%; margin-top: 20px;">GET CERTIFICATE</button>
            </div>

        </div>

    </div>
    <!-- /CONTENT -->
    <!-- JS -->
    <script src="js/bootstrap.min.js"></script>
    <script src="../models/course.js"></script>
    <script src="../models/lesson.js"></script>
    <script src="../models/comment.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- /JS -->

    <script type="module">
        import { GLOBAL } from '../services/GLOBAL.js';

        var currentLesson;

        $(document).ready(() => {

            var courseId = getParameterByName('course');
            getCourseViewId(courseId);
            getLessonByCourse(courseId);
            getComments(courseId);

            $('#lessonList').on('click', '.lessonViewBtn', function () {
                currentLesson = $(this).attr('id');
                getLessonById(currentLesson);
            });

            $('#btnSendComment').click( () => {
                var textComment = $('#textComment').val();
                createComment(textComment, <?php echo $id = $_SESSION['id']; ?>, courseId);
                $('#textComment').val("");
            });

            $('#btn-get-certificate').click(() => {
                window.location.href = "../services/DiplomaService/DiplomaGenerate.php?user=" + '<?php echo $id = $_SESSION['firstName']; ?>';
            })
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
                success: function (course) {
                    $('#title').append(course.title);
                    $('#intructor').append(course.firstName + " " + course.lastNames);
                    $('#lastUpdate').append("Last update " + course.createdAt);
                    $('#shortDescription').append(course.shortDescription);
                    $('#longDescription').append(course.longDescription);
                },
                error: function (x, y, z) {
                    alert("Error en la api: " + x + y + z);
                }
            });

        }

        function getLessonByCourse(courseId) {

            $.ajax({
                url: GLOBAL.url + "/getLessonsByCourseId/" + courseId,
                async: true,
                type: 'GET',
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function (lessons) {
                    for (let less of lessons) {
                        var lesson = new LessonPreview(less.id, less.title);
                        $('#lessonList').append(lesson.getHtml());
                    }
                },
                error: function (x, y, z) {
                    alert("Error en la api: " + x + y + z);
                }
            });

        }

        function getLessonById(lessonId) {
            $.ajax({
                url: GLOBAL.url + "/getLessonsView/" + lessonId,
                async: true,
                type: 'GET',
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function (lesson) {
                    var lesson = new LessonView(lesson.id, lesson.title, lesson.decription, lesson.video, lesson.doc);
                    $('#content-view').empty();
                    $('#content-view').append(lesson.getHtml());
                    $('.description-course').remove();
                },
                error: function (x, y, z) {
                    alert("Error en la api: " + x + y + z);
                }
            });
        }

        function getComments(courseId) {
           
            $.ajax({
            url: GLOBAL.url + "/getCommentsByCourse/" + courseId,
            async: true,
			type: 'GET',
			dataType: 'json',
            contentType: 'application/json; charset=utf-8',
			success: function(data) {
                $('.container-comments').empty();
                if(data.message == undefined) { 
                    data.forEach(element => {
                        var com = new Commentary(element.txtCommentary, element.username, element.createdAt, element.emmiter, element.profilePicture);
                        $('.container-comments').append(com.getHtml(<?php echo $id = $_SESSION['id']; ?>));
                    });
                } else {
                    console.log(data);
                }
            },
			error: function(x, y, z) {
				alert("Error en la api: " + x + y + z);				
            }
			});
        }

        function createComment(txtCommentary, emmiter, course) {
            var commentaryData = {
                txtCommentary: txtCommentary,
                emmiter: parseInt(emmiter),
                course: parseInt(course)
            };

            var commentaryDataJson = JSON.stringify(commentaryData);
            
            $.ajax({
            url: GLOBAL.url + "/addCommentary",
            async: true,
			type: 'POST',
            data: commentaryDataJson,
			dataType: 'json',
            contentType: 'application/json; charset=utf-8',
			success: function(data) {
                console.log(data);
                getComments(course);
            },
			error: function(x, y, z) {
				alert("Error en la api: " + x + y + z);				
            }
			});
        }

        function sendView() {
            
        }

    </script>
</body>

</html>