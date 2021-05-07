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
    <link rel="stylesheet" href="css/create-course.css">
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
    <div class="col-12 container" style="padding: 20px;">
        <div class="row">

            <div class="col-2 options-list">
                <ul>
                    <p class="fw-bold">Create Course</p>

                    <a class="nav-link" id="id-index-course-information" style="color: #153ff7 !important;">Course
                        information</a>
                    <a class="nav-link" id="id-index-course-lessons">Course lessons</a>
                    <a class="nav-link" id="id-index-payment">Price and payment destination</a>
                    <a class="nav-link" id="id-index-course-create">Create</a>
                </ul>
            </div>

            <div class="col-10 content-menu" style="padding: 20px;">

                <div id="id-course-information">
                    <!-- Course information -->
                    <div class="col-12 title text-start">
                        <h4 class="fw-bold">Course information<span class="text-primary">.</span></h4>
                        <hr>
                    </div>

                    <form>
                        <div class="mb-3">
                            <label for="InputTitle" class="form-label">Course title</label>
                            <input type="text" class="form-control" id="InputTitle">
                        </div>
                        <div class="mb-3">
                            <label for="InputShortDescription" class="form-label">Short Description</label>
                            <input type="text" class="form-control" id="InputShortDescription">
                        </div>
                        <div class="mb-3">
                            <label for="InputLongDescription" class="form-label">Long Description</label>
                            <textarea class="form-control" id="InputLongDescription"></textarea>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="InputCategory">Categories</label>
                            <select class="form-control" id="InputCategory">
                                <option>Programación</option>
                                <option>Diseño grafico</option>
                                <option>Marketing</option>
                                <option>Base de datos</option>
                                <option>Idiomas</option>
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="miniature-course">Miniature of the course</label>
                            <input type="file" class="form-control-file form-control" id="miniature-course">
                        </div>
                        <div class="text-end">
                            <button type="button" id="btn-next-course-information" class="btn btn-primary">Next</button>
                        </div>
                    </form>
                </div>

                <div class="un-active" id="id-course-lessons">
                    <!-- Course lessons -->
                    <div class="col-12 title text-start">
                        <h4 class="fw-bold">Course lessons<span class="text-primary">.</span></h4>
                        <hr>
                    </div>

                    <button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal"
                        data-bs-target="#addLesson">
                        <i class="fas fa-plus"></i> Add lesson
                    </button>

                    <!-- Modal Add lesson -->
                    <div class="modal fade" id="addLesson" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold" id="staticBackdropLabel">ADD LESSON<span
                                            class="text-primary">.</span></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="InputLessonTitle" class="form-label">Lesson title</label>
                                        <input type="text" class="form-control" id="InputLessonTitleAdd">
                                    </div>
                                    <div class="mb-3">
                                        <label for="InputLessonDescription" class="form-label">Description</label>
                                        <textarea class="form-control" id="InputLessonDescriptionAdd"></textarea>
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label for="InputVideoLesson">Video lesson</label>
                                        <input type="file" class="form-control-file" id="InputVideoLessonAdd">
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label for="InputFileLesson">File lesson</label>
                                        <input type="file" class="form-control-file" id="InputFileLessonAdd">
                                    </div>
                                    <div class="text-end">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="btnLessonAdd">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Modal Add lesson -->

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Lesson title</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="lessonTBody">
                            
                        </tbody>
                    </table>

                    <!-- Modal Edit Lesson -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold" id="staticBackdropLabel">EDIT LESSON<span
                                            class="text-primary">.</span></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="InputLessonTitle" class="form-label">Lesson title</label>
                                            <input type="text" class="form-control" id="InputLessonTitleEdit">
                                        </div>
                                        <div class="mb-3">
                                            <label for="InputLessonDescription" class="form-label">Description</label>
                                            <textarea class="form-control" id="InputLessonDescriptionEdit"></textarea>
                                        </div>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" id="btnLessonEdit">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Modal Edit Lesson -->

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 text-end">
                                <button type="button" id="btn-prev-course-lesson"
                                    class="btn btn-primary">Previous</button>
                                <button type="button" id="btn-next-course-lesson" class="btn btn-primary">Next</button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="un-active" id="id-price-payment">
                    <!-- Price and payment destination -->
                    <div class="col-12 title text-start">
                        <h4 class="fw-bold">Price and payment destination<span class="text-primary">.</span></h4>
                        <hr>
                    </div>

                    <h5 class="mb-3">Price:</h5>
                    <div class="col-3 mb-3">
                        <input type="number" min="0" class="form-control" name="" id="InputPrice">
                    </div>
                    <p style="color: #ff0000;">* If the cost is $0 it will marked as FREE</p>
                    <h5 class="mb-3">Payment destination:</h5>
                    <form class="credit-card-div">
                        <div class="col-12 mb-3">
                            <input type="text" class="form-control" name="" id="cardNumber" placeholder="Enter Card Number">
                        </div>
                        <div class="row mb-3">
                            <div class="col-4 credit-card-inp">
                                <span class="help-block text-muted small-font">Expiry Month</span>
                                <input type="text" name="" id="expMonth" class="form-control" placeholder="MM">
                            </div>
                            <div class="col-4 credit-card-inp">
                                <span class="help-block text-muted small-font">Expiry Year</span>
                                <input type="text" name="" id="expYear" class="form-control" placeholder="YYYY">
                            </div>
                            <div class="col-4 credit-card-inp">
                                <span class="help-block text-muted small-font">CCV</span>
                                <input type="text" name="" id="ccv" class="form-control" placeholder="CCV">
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <input type="text" class="form-control" name="" id="titular" placeholder="Name On The Card">
                        </div>
                    </form>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 text-end">
                                <button type="button" id="btn-prev-payment" class="btn btn-primary">Previous</button>
                                <button type="submit" id="btn-create-course" class="btn btn-primary">Create</button>
                            </div>
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
    <script src="js/notification-create-course.js"></script>
    <script src="../models/course.js"></script>
    <script src="../models/lesson.js"></script>
    <!-- /JS -->

    <script type="module">
        import { GLOBAL } from '../services/GLOBAL.js';

        var lessonList = [];
        var courseInformation;
        var indiceEditActive = -1;

        $(document).ready(() => {

            //Obtenemos la información del curso
            $('#btn-create-course').on('click', (event) => {
                event.preventDefault();

                courseInformation = new CourseInformation($('#InputTitle').val(), $('#InputShortDescription').val(), $('#InputLongDescription').val(), $( "#InputCategory option:selected" ).text(), "", $('#InputPrice').val());
                debugger;
            });

            //Agregamos una nueva clase para el curso
            $('#btnLessonAdd').on('click', (event) => {
                event.preventDefault();

                var newLesson = new Lesson($('#InputLessonTitleAdd').val(), $('#InputLessonDescriptionAdd').val(), "", "");
                lessonList.push(newLesson);
                newLesson.setId(lessonList.length);
                $('#lessonTBody').append(newLesson.getHtml());	
                $('#InputLessonTitleAdd').val('');
                $('#InputLessonDescriptionAdd').val('');
            });

            //Borramos una clase del curso
            $('.table tbody').on('click', '.btn-delete-lesson', function() {
                $(this).closest('tr').remove();
                var indiceString = $(this).parents('td').parents('tr').children('td.titleCol').html();
                var indice = lessonList.findIndex(function(o) { return o.lessonTitle === indiceString; })
                lessonList.splice(indice , 1);
                debugger;
            });

            //Mostramos en editar la clase seleccionada
            $('.table tbody').on('click', '.btn-edit-lesson', function() {
                var indiceString = $(this).parents('td').parents('tr').children('td.titleCol').html();
                indiceEditActive = lessonList.findIndex(function(o) { return o.lessonTitle === indiceString; }) 
                $('#InputLessonTitleEdit').val(lessonList[indiceEditActive].lessonTitle);
                $('#InputLessonDescriptionEdit').val(lessonList[indiceEditActive].lessonDescription);
            });

            //Editamos una clase existente del curso
            $('#btnLessonEdit').on('click', (event) => {
                event.preventDefault();
                lessonList[indiceEditActive].lessonTitle = $('#InputLessonTitleEdit').val(); 
                lessonList[indiceEditActive].lessonDescription = $('#InputLessonDescriptionEdit').val();
                $(".table tbody tr").remove(); 
                for(let lesson of lessonList) {
                    var newLesson = new LessonTwo(lesson.id,lesson.lessonTitle , lesson.lessonDescription, "", "");
                    $('#lessonTBody').append(newLesson.getHtml());	
                }
            });
        });

    </script>
</body>

</html>