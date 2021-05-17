var Cart = function(id, name, instructor, price) {
    this.id = id;
    this.name = name;
    this.instructor = instructor;
    this.price = price;
};

var PreviewItemCart = function(id, title, instructor, price, imageUrl) {
    this.id = id;
    this.title = title;
    this.instructor = instructor;
    this.price = price;
    this.imageUrl = imageUrl;
}

PreviewItemCart.prototype = {
    setId: function (id) {
        this.id = id;
    },
    getHtml: function () {
        var html = '<div class="card" style="width: 720px; margin-top: 10px;">';
        html += '<div class="row no-gutters">';
        html += '<div class="col-sm-5">';
        html += '<img class="card-img" src="' + this.imageUrl +'" alt="Suresh Dasari Card">';
        html += '</div>';
        html += '<div class="col-sm-7">';
        html += '<div class="card-body">';
        html += '<h5 class="card-title">' + this.title + '</h5>';
        html += '<p class="card-text">by ' + this.instructor + '</p>';
        html += '<div class="col-12" style="text-align: end;">';
        html += '<div class="row">';
        html += '<div class="col-6" style="text-align: start;">';
        if(this.price == 0) {
            html += '<p class="card-text"><small class="cost">FREE</small></p>';
        } else {
            html += '<p class="card-text"><small class="cost">$' + this.price + ' MX</small></p>';            
        }
        html += '</div>';
        html += '<div class="col-6" style="text-align: end;">';
        html += '<button value="' + this.id + '" class="btn btn-danger btnDeleteItem">Delete</button>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        return html;
    }
};