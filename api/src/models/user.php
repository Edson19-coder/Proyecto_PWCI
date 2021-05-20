<?php

    class UserModelBase{

        private $id;
        private $email;
        private $userPassword;
        private $userName;
        private $firstName;
        private $secondName;
        private $lastName;
        private $birthday;
        private $country;
        private $state;
        private $city;
        private $postalCode;
        private $profilePicture;

        public function __construct($id, $email, $userPassword, $userName) {
            $this->id = $id;
            $this->email = $email;
            $this->userPassword = $userPassword;
            $this->userName = $userName;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getId() {
            return $this->id;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getUserPassword() {
            return $this->userPassword;
        }

        public function setUserPassword($userPassword) {
            $this->userPassword = $userPassword;
        }

        public function getUserName() {
            return $this->userName;
        }

        public function setUserName($userName) {
            $this->userName = $userName;
        }

        public function getFirstName() {
            return $this->firstName;
        }

        public function setFirstName($firstName) {
            $this->firstName = $firstName;
        }

        public function getSecondName() {
            return $this->secondName;
        }

        public function setSecondName($secondName) {
            $this->secondName = $secondName;
        }

        public function getLastName() {
            return $this->lastName;
        }

        public function setLastName($lastName) {
            $this->lastName = $lastName;
        }

        public function getBirthday(){
            return $this->birthday;
        }

        public function setBirthday($birthday){
            $this->birthday = $birthday;
        }

        public function getCountry(){
            return $this->country;
        }

        public function setCountry($country){
            $this->country = $country;
        }

        public function getState(){
            return $this->state;
        }

        public function setState($state){
            $this->state = $state;
        }

        public function getCity(){
            return $this->city;
        }

        public function setCity($city){
            $this->city = $city;
        }

        public function getPostalCode(){
            return $this->postalCode;
        }

        public function setPostalCode($postalCode){
            $this->postalCode = $postalCode;
        }

        public function getProfilePicture(){
            return $this->profilePicture;
        }

        public function setProfilePicture($profilePicture){
            $this->profilePicture = $profilePicture;
        }

    }

    class UserModelReduced extends UserModelBase{
        
        public function __construct($id, $email, $userPassword, $userName, $firstName, $secondName, $lastName) {
            $this->id = $id;
            $this->email = $email;
            $this->userPassword = $userPassword;
            $this->userName = $userName;
            $this->firstName = $firstName;
            $this->secondName = $secondName;
            $this->lastName = $lastName;
        }

    }

    class UserModelExtended extends UserModelBase{

        public function __construct($id, $email, $userPassword, $userName, $firstName, $secondName, $lastName, $birthday, $country, $state, $city, $postalCode, $profilePicture) {
            $this->id = $id;
            $this->email = $email;
            $this->userPassword = $userPassword;
            $this->userName = $userName;
            $this->firstName = $firstName;
            $this->secondName = $secondName;
            $this->lastName = $lastName;
            $this->birthday = $birthday;
            $this->country = $country;
            $this->state = $state;
            $this->city = $city;
            $this->postalCode = $postalCode;
            $this->profilePicture = $profilePicture;
        }

    }

?>