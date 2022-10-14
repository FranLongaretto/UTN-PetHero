<?php
    namespace Models;

    class Payment{
        private $totalAmount;
        private $date;

        public funtion getTotalAmount(){
            return $this->totalAmount;
        }

        public function setTotalAmount($totalAmount){
            $this->totalAmount = $totalAmount;
            return $this;
        }

        public funtion getDate(){
            return $this->date;
        }

        public function setDate($date){
            $this->date = $date;
            return $this;
        }
    }
?>