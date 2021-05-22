var User = function(userName, name, secondName, lastName,userEmail, userPassword, accountType) {
    this.id = 0;
    this.userName = userName;
    this.name = name;
    this.secondName = secondName;
    this.lastName = lastName;
    this.userEmail = userEmail;
    this.userPassword = userPassword;
    this.accountType = accountType; 
};
var UserComplete = function(id, userName, firstName, secondName, lastName,userEmail, userPassword, birthday, country, state, city, postalCode, profilePicture, accountType) {
    this.id = id;
    this.userName = userName;
    this.name = firstName;
    this.secondName = secondName;
    this.lastName = lastName;
    this.userEmail = userEmail;
    this.userPassword = userPassword;
    this.birthday = birthday;
    this.country = country;
    this.state = state;
    this.city = city;
    this.postalCode = postalCode;
    this.profilePicture = profilePicture;
    this.accountType = accountType; 
};
var UserLogin = function(userEmail, userPassword) {
    this.id = 0;
    this.userEmail = userEmail;
    this.userPassword = userPassword;
};
User.prototype = {
    setId: function(id) {
        this.id = id;
    }
};

var UserPreviewMessage = function(id, userName, profilePicture) {
    this.id = id;
    this.userName = userName;
    this.profilePicture = profilePicture; 
};
UserPreviewMessage.prototype = {
    setId: function (id) {
        this.id = id;
    },
    getHtml: function () {
        var html = '<div id="' + this.id + '" class="card col-12 preview preview-message" style="padding: 8px; cursor: pointer;">';
            html += '<div class="row">';
            html += '<div class="col-2">';
            html += '<img src="' + this.profilePicture + '" class="rounded-circle" height="50" alt="" loading="lazy" />';
            html += '</div>';
            html += '<div class="col-10 user_name">';
            html += '<h5>' + this.userName + '</h5>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
        return html;
    }
};