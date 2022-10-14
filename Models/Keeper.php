<?php
    namespace Models;

    use Models\User as User;

    class Keeper extends User{
        private $typeOfDog; ///small, medium or big
        private $salary; 

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