<?php
namespace Models;

class Book{
        private $id;
        private $idKeeper;
        private $idOwner;
        private $idKeeperBook;
        private $dateStart;
        private $dateEnd; 
        private $bookPrice;
        private $status;

        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        public function getIdKeeper()
        {
                return $this->idKeeper;
        }

        public function setIdKeeper($idKeeper)
        {
                $this->idKeeper = $idKeeper;
                return $this;
        }

        public function getIdOwner()
        {
                return $this->idOwner;
        }

        public function setIdOwner($idOwner)
        {
                $this->idOwner = $idOwner;

                return $this;
        }

        public function getIdKeeperBook()
        {
                return $this->idKeeperBook;
        }

        public function setIdKeeperBook($idKeeperBook)
        {
                $this->idKeeperBook = $idKeeperBook;

                return $this;
        }

        public function getDateStart()
        {
                return $this->dateStart;
        }

        public function setDateStart($dateStart)
        {
                $this->dateStart = $dateStart;

                return $this;
        }
        
        public function getDateEnd()
        {
                return $this->dateEnd;
        }

        public function setDateEnd($dateEnd)
        {
                $this->dateEnd = $dateEnd;

                return $this;
        }

        public function getBookPrice()
        {
                return $this->bookPrice;
        }

        public function setBookPrice($bookPrice)
        {
                $this->bookPrice = $bookPrice;

                return $this;
        }

        public function getStatus()
        {
                return $this->status;
        }

        public function setStatus($status)
        {
                $this->status = $status;

                return $this;
        }
}
?>