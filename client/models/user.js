var User = function(userName, name, secondName, lastName,userEmail, userPassword) {
    this.id = 0;
    this.userName = userName;
    this.name = name;
    this.secondName = secondName;
    this.lastName = lastName;
    this.userEmail = userEmail;
    this.userPassword = userPassword;
};
var UserComplete = function(id, userName, firstName, secondName, lastName,userEmail, userPassword, birthday, country, state, city, postalCode, profilePicture) {
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
