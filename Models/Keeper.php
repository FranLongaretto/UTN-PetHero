<?php
    namespace Models;

    class Keeper{
        private $id;
        private $email;
        private $password;
        private $typeOfDog; ///small, medium or big
        private $salary; 

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
        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
            return $this;
        }

        public function getPassword(){
            return $this->password;
        }

        public function setPassword($password){
            $this->password = $password;
            return $this;
        }

   
        public function getTypeOfDog()
        {
                return $this->typeOfDog;
        }

        
        public function setTypeOfDog($typeOfDog)
        {
                $this->typeOfDog = $typeOfDog;

                return $this;
        }

     
        public function setSalary($salary)
        {
                $this->salary = $salary;

                return $this;
        }

      
    }
?>