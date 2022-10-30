<?php
    namespace Controllers;

    use Models\Pet as Pet;
    use DAO\KeeperDAO as KeeperDAO;
    use Models\Keeper as Keeper;
   

    class OwnerController
    {
        private $keeperDAO;

        public function __construct()
        {
            $this->keeperDAO = new keeperDAO();
        }

        public function Index($message = "")
        {
            require_once(VIEWS_PATH."index.php");
        }

        public function HomeOwner($message = "")
        {
            require_once(VIEWS_PATH."home-owner.php");
        }
        
    
        public function ShowListKeeperView($message = "")
        {
            $errorMessage = $message;
            $keeperList = $this->keeperDAO->getAll();
            require_once(VIEWS_PATH."keeper-list.php");
        }

        public function RegistrationPet(){
            require_once(VIEWS_PATH."add-pet.php");
        }

        
    }        
?>