var CourseComple = function(userName, name, secondName, lastName,userEmail, userPassword) {
    this.id = 0;
    this.userName = userName;
    this.name = name;
    this.secondName = secondName;
    this.lastName = lastName;
    this.userEmail = userEmail;
    this.userPassword = userPassword;
};

var CourseInformation = function(courseTitle, shortDescription, longDescription, category, imageMiniature, price) {
    this.courseTitle = courseTitle;
    this.shortDescription = shortDescription;
    this.longDescription = longDescription;
    this.category = category;
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