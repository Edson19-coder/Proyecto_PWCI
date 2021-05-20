var Lesson = function (lessonTitle, lessonDescription, lessonVideo, lessonFile) {
    this.id = 0;
    this.lessonTitle = lessonTitle;
    this.lessonDescription = lessonDescription;
    this.lessonVideo = lessonVideo;
    this.lessonFile = lessonFile;
};

Lesson.prototype = {
    setId: function (id) {
        this.id = id;
    },
    getHtml: function () {
        var html = '<tr>';
            html += '<th scope="row" class="rowLesson">'+ this.id +'</th>';
            html += '<td class="titleCol">'+ this.lessonTitle +'</td>';
            html += '<td>';
            html += '<button type="button" style="margin-right: 5px;" class="btn btn-edit-lesson btn-primary btn-sm px-3" data-bs-toggle="modal"';
            html += 'data-bs-target="#staticBackdrop">';
            html += '<i class="fas fa-edit"></i>';
            html += '</button>';
            html += '<button type="button" class="btn btn-danger btn-delete-lesson btn-sm px-3">'
            html += '<i class="fas fa-times"></i>'
            html += '</button>';
            html += '</td>';
            html += '</tr>';
        return html;
    }
};


var LessonTwo = function (id, lessonTitle, lessonDescription, lessonVideo, lessonFile) {
    this.id = id;
    this.lessonTitle = lessonTitle;
    this.lessonDescription = lessonDescription;
    this.lessonVideo = lessonVideo;
    this.lessonFile = lessonFile;
};

LessonTwo.prototype = {
    setId: function (id) {
        this.id = id;
    },
    getHtml: function () {
        var html = '<tr>';
            html += '<th scope="row" class="rowLesson">'+ this.id +'</th>';
            html += '<td class="titleCol">'+ this.lessonTitle +'</td>';
            html += '<td>';
            html += '<button type="button" style="margin-right: 5px;" class="btn btn-edit-lesson btn-primary btn-sm px-3" data-bs-toggle="modal"';
            html += 'data-bs-target="#staticBackdrop">';
            html += '<i class="fas fa-edit"></i>';
            html += '</button>';
            html += '<button type="button" class="btn btn-danger btn-delete-lesson btn-sm px-3">'
            html += '<i class="fas fa-times"></i>'
            html += '</button>';
            html += '</td>';
            html += '</tr>';
        return html;
    }
};

var LessonPreview = function(id, title) {
    this.id = id;
    this.title = title;
}

LessonPreview.prototype = {
    setId: function (id) {
        this.id = id;
    },
    getHtml: function () {
        var html = '<a class="lessonViewBtn" style="cursor: pointer;" id="' + this.id + '">';
            html += '<div class="card content-course">';
            html += '<div class="card-body col-12 video-seen">';
            html += '<div class="row">';
            html += '<div class="col-10">';
            html += '<p>' + this.title + '<p>';
            html += '</div>';
            html += '<div class="col-2">';
            html += '<input class="form-check-input" type="checkbox" value="" style="vertical-align: middle;">';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '</a>';
        return html;
    }
};

var LessonView = function(id, title, description, video, document) {
    this.id = id;
    this.title = title;
    this.description = description;
    this.video = video;
    this.document = document;
}

LessonView.prototype = {
    setId: function (id) {
        this.id = id;
    },
    getHtml: function () {
        var html = '<div class="col-12 title text-start">';
            html += '<h3>' + this.title + '</h3>';
            html += '<hr>';
            html += '</div>';
            if(this.video != null && this.video != "") {
                html += '<h3>Video de la clase:</h3>'
                html += '<video controls>';
                html += '<source src="' + this.video + '" type="video/mp4">';
                html += '</video>';
            }
            if(this.video != null && this.video != "" && this.document != null && this.document != "") {
                html += '<hr>';
            }
            if(this.document != null && this.document != "") {
                html += '<h3>Documento de la clase: </h3>'
                html += '<a href="' + this.document + '" class="btn btn-primary" download="Documento">Descargar Archivo</a>';
            }
            html += '<hr>';
            html += '<h5 class="fw-bold">Description:</h5>';
            html += '<p>' + this.description + '</p>';
        return html;
    }
};
