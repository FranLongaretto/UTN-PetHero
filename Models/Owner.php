<?php
    namespace Models;

    class Owner{
        private $userName;
        private $password;

        public funtion getUserName(){
            return $this->userName;
        }

        public function setRace($userName){
            $this->userName = $userName;
            return $this;
        }

        public funtion getPassword(){
            return $this->password;
        }

        public function setPassword($password){
            $this->password = $password;
            return $this;
        }
}

?>