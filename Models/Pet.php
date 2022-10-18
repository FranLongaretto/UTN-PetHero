<?php

    namespace Models;

    class Pet {
        private $id;
        private $race;
        private $size;
        private $vaccination; // esto creo que es imagen de vacunacion
        private $description;
        private $image; // esto no iria por lo de arriba

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

        public function getSize(){
            return $this->size;
        }

        public function setSize($size){
            $this->size = $size;
            return $this;
        }

        public function getVaccination(){
            $petImageNameNoExtension = substr($this->image["name"], 0, strpos($this->image["name"], "."));
            $imgVaccination = $petImageNameNoExtension . "_" . $this->vaccination["name"];
            return $imgVaccination;
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
                return $this->image["name"];
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