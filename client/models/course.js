var CourseComple = function(userName, name, secondName, lastName,userEmail, userPassword) {
    this.id = 0;
    this.userName = userName;
    this.name = name;
    this.secondName = secondName;
    this.lastName = lastName;
    this.userEmail = userEmail;
    this.userPassword = userPassword;
};

var CourseInformation = function(courseTitle, ShortDescription, longDescription, categorie, imageMiniature, price) {
    this.courseTitle = courseTitle;
    this.ShortDescription = ShortDescription;
    this.longDescription = longDescription;
    this.categorie = categorie;
    this.imageMiniature = imageMiniature;
    this.price = price
};

var CoursePaymentDestination = function(cardNumber, expMonth, expYear, ccv, titular) {
    this.cardNumber = cardNumber;
    this.expMonth = expMonth;
    this.expYear = expYear;
    this.ccv = ccv;
    this.titular = titular;
};