<?php
    namespace Models;

    class Book{
        private $id;
        private $keeper; 
        private $user; 
        private $countDays;
        private $amount;
        private $status; 
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
         * Get the value of Keeper
         */ 
        public function getKeeper()
        {
                return $this->keeper;
        }

        /**
         * Set the value of Keeper
         *
         * @return  self
         */ 
        public function setKeeper(Keeper $keeper)
        {
                $this->keeper = $keeper;

                return $this;
        }

       

        /**
         * Get the value of User
         */ 
        public function getUser()
        {
                return $this->user;
        }

        /**
         * Set the value of User
         *
         * @return  self
         */ 
        public function setUser(User $user)
        {
                $this->user = $user;

                return $this;
        }

        /**
         * Get the value of countDays
         */ 
        public function getCountDays()
        {
                return $this->countDays;
        }

        /**
         * Set the value of countDays
         *
         * @return  self
         */ 
        public function setCountDays($countDays)
        {
                $this->countDays = $countDays;

                return $this;
        }

        /**
         * Get the value of amount
         */ 
        public function getAmount()
        {
                return $this->amount;
        }

        /**
         * Set the value of amount
         *
         * @return  self
         */ 
        public function setAmount($amount)
        {
                $this->amount = $amount;

                return $this;
        }

        /**
         * Get the value of status
         */ 
        public function getStatus()
        {
                return $this->status;
        }

        /**
         * Set the value of status
         *
         * @return  self
         */ 
        public function setStatus($status)
        {
                $this->status = $status;

                return $this;
        }
    }
?>