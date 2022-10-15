<?php

    namespace Models;

    class Pet {
        private $id;
        private $race;
        private $vaccination;
        private $description;
        private $image;

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
            return $this;
        }
        public function getRace(){
            return $this->race;
        }

        public function setRace($race){
            $this->race = $race;
            return $this;
        }

        public function getVaccination(){
            return $this->vaccination;
        }

        public function setVaccination($vaccination){
            $this->vaccination = $vaccination;
            return $this;
        }

        public function getDescription(){
            return $this->description;
        }

        public function setDescription($description){
            $this->description = $description;
            return $this;
        }

        /**
         * Get the value of imagen
         */ 
        public function getImage()
        {
                return $this->image;
        }

        /**
         * Set the value of imagen
         *
         * @return  self
         */ 
        public function setImage($image)
        {
                $this->image = $image;

                return $this;
        }
}
?>