<?php
    namespace Controllers;

    use DAO\IOwnerDAO as IOwnerDAO;
    use Models\Owner as Owner;
    use Models\Pet as Pet;
    use DAO\OwnerDAO as OwnerDAO;
    use DAO\KeeperDAO as KeeperDAO;
    use Models\Keeper as Keeper;
   

    class OwnerController
    {
        private $ownerDAO;
        private $keeperDAO;

        public function __construct()
        {
            $this->ownerDAO = new ownerDAO();
            $this->keeperDAO = new keeperDAO();
        }

        public function Index($message = "")
        {
            require_once(VIEWS_PATH."index.php");
        }
        public function Home($message = "")
        {
            require_once(VIEWS_PATH."home.php");
        }

        public function HomeKeeper($message = "")
        {
            require_once(VIEWS_PATH."home-keeper.php");
        }

        public function HomeOwner($message = "")
        {
            require_once(VIEWS_PATH."home-owner.php");
        }
        
        public function ShowAddView()
        {
            //require_once("validate-session.php");
            require_once(VIEWS_PATH."add-owner.php");
        }

        public function ShowListView()
        {
            $ownerList = $this->ownerDAO->getAll();
            
            require_once(VIEWS_PATH."owner-list.php");
        }
        public function ShowListKeeperView($message = "")
        {
            $errorMessage = $message;
            $keeperList = $this->keeperDAO->getAll();
            require_once(VIEWS_PATH."keeper-list.php");
        }

        public function ShowModifyView($id) {
            $owner = $this->ownerDAO->GetById($id);
           
            require_once(VIEWS_PATH."modify-owner.php");
            
        }

        public function RegistrationPet(){
            require_once(VIEWS_PATH."add-pet.php");
        }

        public function AddPet($race, $size, $vaccination, $description, $image)
        {
            $pet = new Pet();
            $pet->setRace($race);
            $pet->setSize($size);
            $pet->setVaccination($vaccination);
            $pet->setDescription($description);
            $pet->setImage($image);

            $this->ownerDAO->AddPet($pet);
        }

        // public function Modify($email, $password, $id)
        // {
        //     require_once(VIEWS_PATH."validate-session.php");

        //     $user = new User();
        //     $user->setId($id);
        //     $user->setEmail($email);
        //     $user->setPassword($password);

        //     $this->userDAO->Modify($user);
           

        //     $this->ShowListView();
        // }

        // public function Delete($id)
        // {
        //     $this->userDAO->Delete($id);

        //     $this->ShowListView();
        // }
    }        
?>