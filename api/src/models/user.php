<?php

    class UserModel {
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

        public function __construct($id, $email, $userPassword, $userName, $firstName, $secondName, $lastName) {
            $this->id = $id;
            $this->email = $email;
            $this->userPassword = $userPassword;
            $this->userName = $userName;
            $this->firstName = $firstName;
            $this->secondName = $secondName;
            $this->lastName = $lastName;
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

    }

?>