<?php
    namespace Models;

    class Review{
        private $description;
        private $rating;

        public funtion getDescription(){
            return $this->description;
        }

        public function setDescription($description){
            $this->description = $description;
            return $this;
        }

        public funtion getRating(){
            return $this->rating;
        }

        public function setRating($rating){
            $this->rating = $rating;
            return $this;
        }
    }
?>