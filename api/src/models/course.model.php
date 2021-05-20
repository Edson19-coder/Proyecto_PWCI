<?php

    class CourseModelBase{
        protected $id;
        protected $courseTitle;
        protected $shortDescription;
        protected $longDescription;
        protected $category;
        protected $price;
        protected $date;

        public function __construct($id, $courseTitle, $shortDescription, $longDescription, $category, $price, $date){
            $this->id = $id;
            $this->courseTitle = $courseTitle;
            $this->shortDescription = $shortDescription;
            $this->longDescription = $longDescription;
            $this->category = $category;
            $this->price = $price;
            $this->date = $date;
        }

        public function setId($id){
            $this->id = $id;
        }
        public function getId(){
            return $this->id;
        }

        public function setCourseTitle($courseTitle){
            $this->courseTitle = $courseTitle;
        }
        public function getCourseTitle(){
            return $this->courseTitle;
        }

        public function setShortDescription($shortDescription){
            $this->shortDescription = $shortDescription;
        }
        public function getShortDescription(){
            return $this->shortDescription;
        }

        public function setLongDescription($longDescription){
            $this->longDescription = $longDescription;
        }
        public function getLongDescription(){
            return $this->longDescription;
        }

        public function setCategory($category){
            $this->category = $category;
        }
        public function getCategory(){
            return $this->category;
        }

        public function setPrice($price){
            $this->price = $price;
        }
        public function getPrice(){
            return $this->price;
        }

        public function setDate($date){
            $this->date = $date;
        }
        public function getDate(){
            return $this->date;
        }
    }
?>