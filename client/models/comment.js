var Commentary = function(textMessage, username, createdAt, emmiter, profilePicture) {
    this.txtCommentary = textMessage;
    this.username = username;
    this.createdAt = createdAt;
    this.emmiter = emmiter; 
    this.profilePicture = profilePicture; 
};
Commentary.prototype = {
    setId: function (id) {
        this.id = id;
    },
    getHtml: function (meId) {
        var html = '<div class="card" style="margin-top: 20px">';
            if(parseInt(this.emmiter) == meId) {
                html += '<div class="card-header message-m">';
                html += '<div class="col-12" style="text-align: right;">' + this.username + "  " + '<img src="' + this.profilePicture + '" class="rounded-circle" height="50" alt="" loading="lazy" /> </div>';
            } else {
                html += '<div class="card-header message-f">';
                html += '<div class="col-12"> <img src="' + this.profilePicture + '" class="rounded-circle" height="50" alt="" loading="lazy" />' +  "  " + this.username + '</div>';
            }
            html += '</div>';
            html += '<div class="card-body">' + this.txtCommentary + " " + " - " + this.createdAt + '</div>';
            html += '</div>';
        
        return html;
    }
};