var Course = function(id, title , intructor, lastUpdate, paticipants, shortDescription, longDescription, price) {
    this.id = id;
    this.title = title;
    this.intructor = intructor;
    this.lastUpdate = lastUpdate;
    this.paticipants = paticipants;
    this.shortDescription = shortDescription;
    this.longDescription = longDescription;
    this.price = price;
};

var CourseInformation = function(courseTitle, shortDescription, longDescription, category, imageMiniature, price, instructor) {
    this.courseTitle = courseTitle;
    this.shortDescription = shortDescription;
    this.longDescription = longDescription;
    this.category = category;
    this.imageMiniature = imageMiniature;
    this.price = price;
    this.instructor = instructor;
};

var CoursePreview = function(id, courseTitle, shortDescription, longDescription, imageMiniature, price) {
    this.id = id;
    this.courseTitle = courseTitle;
    this.shortDescription = shortDescription;
    this.longDescription = longDescription;
    this.imageMiniature = imageMiniature;
    this.price = price;
};

CoursePreview.prototype = {
    setId: function (id) {
        this.id = id;
    },
    getHtml: function () {
        var html = '<a href="course.php?course='+ this.id +'" class="a-course">';
            html += '<div class="card p-0" style="width: 18rem;">';
            html += '<img src="' + this.imageMiniature +'"';
            html += 'class="card-img-top" alt="...">';
            html += '<div class="card-body">';
            html += '<h5 class="card-title">'+ this.courseTitle +'</h5>';
            html += '<p class="card-text">'+ this.shortDescription +'</p>';
            if(this.price > 0) {
                html += '<p class="card-text" style="text-align: right;"><small class="cost">$'+ this.price +'</small></p>';
            } else {
                html += '<p class="card-text" style="text-align: right;"><small class="cost">FREE</small></p>';
            }
            html += '</div>';
            html += '</div>';
            html += '</a>';
        return html;
    }
};

var CoursePreviewSmall = function(id, courseTitle, imageMiniature, createdAt) {
    this.id = id;
    this.courseTitle = courseTitle;
    this.imageMiniature = imageMiniature;
    this.createdAt = createdAt;
};

CoursePreviewSmall.prototype = {
    setId: function (id) {
        this.id = id;
    },
    getHtml: function () {
        var html = '<a href="view-course.php?course='+ this.id +'">';
        html += '<div class="card p-0" style="width: 15rem;">';
        html += '<img src="' + this.imageMiniature + '" class="card-img-top" alt="...">';
        html += '<div class="card-body">';
        html += '<h5 class="card-title">'+ this.courseTitle +'</h5>';
        html += '</div>';
        html += '<div class="card-footer" style="text-align: right;">';
        html += '<p class="card-text"><small class="text-muted">'+ this.createdAt +'</small></p>';
        html += '</div>';
        html += '</div>';
        html += '</a>';
        return html;
    }
};

var CourseMy = function(id, tituloCurso, imageUrl, porcentaje) {
    this.id = id;
    this.tituloCurso = tituloCurso;
    this.imageUrl = imageUrl;
    this.porcentaje = porcentaje;
};

CourseMy.prototype = {
    setId: function (id) {
        this.id = id;
    },
    getHtml: function () {
        var html = '<a class="a-course" href="view-course.php?course='+ this.id +'">';
            html += '<div class="card p-0" style="width: 18rem;">';
            html += '<img src="' + this.imageUrl + '" class="card-img-top" alt="...">';
            html += '<div class="card-body">';
            html += '<p class="card-text">' + this.tituloCurso + '</p>'; 
            html += '<div class="progress">';
            html += '<div class="progress-bar" role="progressbar" style="width: '+ this.porcentaje +'%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">'+ this.porcentaje +'%</div> </div>';
            html += '</div>';
            html += '<div class="card-footer" style="text-align: right;">';
            html += '</div>';
            html += '</div>';
            html += '</a>';
        return html;
    }
};

var CoursePreviewSmallC = function(title, inscritos, dinero) {
    this.title = title;
    this.inscritos = inscritos;
    this.dinero = dinero;
};

CoursePreviewSmallC.prototype = {
    setId: function (id) {
        this.id = id;
    },
    getHtml: function () {
        var html = '<a>';
        html += '<div class="card p-0" style="width: 15rem;">';
        html += '<div class="card-body">';
        html += '<h5 class="card-title">'+ this.title +'</h5>';
        html += '<h6 class="card-title" style="color:blue"> Personas inscritas:'+ this.inscritos +'</h6>';
        html += '<h6 class="card-title" style="color:green"> Dinero recoudado: $'+ this.dinero +'</h6>';
        html += '</div>';
        html += '<div class="card-footer" style="text-align: right;">';
        html += '<p class="card-text"><small class="text-muted"></small></p>';
        html += '</div>';
        html += '</div>';
        html += '</a>';
        return html;
    }
};