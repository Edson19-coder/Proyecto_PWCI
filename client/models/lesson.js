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