<?php
    namespace Models;

    class Book{
        private $id;
        private $idKeeper; 
        private $idOwner; 
        //private $dateBook;

        
          /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of idKeeper
         */ 
        public function getIdKeeper()
        {
                return $this->idKeeper;
        }

        /**
         * Set the value of idKeeper
         *
         * @return  self
         */ 
        public function setIdKeeper($idKeeper)
        {
                $this->idKeeper = $idKeeper;

                return $this;
        }

       

        /**
         * Get the value of idOwner
         */ 
        public function getIdOwner()
        {
                return $this->idOwner;
        }

        /**
         * Set the value of idOwner
         *
         * @return  self
         */ 
        public function setIdOwner($idOwner)
        {
                $this->idOwner = $idOwner;

                return $this;
        }
    }
?>