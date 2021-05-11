<?php

    class LessonModelBase{
        protected $id;
        protected $lessonTitle;
        protected $lessonDescription;
        protected $date;

        public function __construct($id, $lessonTitle, $lessonDescription, $date){
            $this->id = $id;
            $this->lessonTitle = $lessonTitle;
            $this->lessonDescription = $lessonDescription;
            $this->date = $date;
        }

        public function setId($id){
            $this->id = $id;
        }
        public function getId(){
            return $this->id;
        }

        public function setLessonTitle($lessonTitle){
            $this->lessonTitle = $lessonTitle;
        }
        public function getLessonTitle(){
            return $this->lessonTitle;
        }

        public function setLessonDescription($lessonDescription){
            $this->lessonDescription = $lessonDescription;
        }
        public function getLessonDescription(){
            return $this->lessonDescription;
        }

        public function setDate($date){
            $this->date = $date;
        }
        public function getDate(){
            return $this->date;
        }
    }

?>