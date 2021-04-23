var User = function(userName, name, secondName, lastName,userEmail, userPassword) {
    this.id = 0;
    this.userName = userName;
    this.name = name;
    this.secondName = secondName;
    this.lastName = lastName;
    this.userEmail = userEmail;
    this.userPassword = userPassword;
};
User = function(userEmail, userPassword) {
    this.id = 0;
    this.userEmail = userEmail;
    this.userPassword = userPassword;
};
User.prototype = {
    setId: function(id) {
        this.id = id;
    }
};
