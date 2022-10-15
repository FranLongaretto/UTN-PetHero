<?php

    namespace Models;

    class Pet {
        private $race;
        private $vaccination;
        private $description;
        // imagen

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
            $this->description = $description
            return $this;
        }
}
?>