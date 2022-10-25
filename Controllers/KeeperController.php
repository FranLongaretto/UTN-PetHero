<?php
    namespace Controllers;

    use DAO\KeeperDAO as KeeperDAO;
    use Models\Keeper as Keeper;
   

    class KeeperController
    {
        private $keeperDAO;

        public function __construct()
        {
            $this->keeperDAO = new KeeperDAO();
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

        
        public function ShowAddView()
        {
            //require_once("validate-session.php");
            require_once(VIEWS_PATH."add-keeper.php");
        }

        public function ShowListView($message = "")
        {
            $errorMessage = $message;
            $keeperList = $this->keeperDAO->getAll();
            
            require_once(VIEWS_PATH."keeper-list.php");
        }

        public function ShowListViewFilter($dateStart, $dateEnd)
        {
            $keeperListFilter = $this->keeperDAO->getAllFilter($dateStart, $dateEnd);
            
            require_once(VIEWS_PATH."keeper-listfilter.php");
        }

        public function ShowModifyView($id) {
            $keeper = $this->keeperDAO->GetById($id);
           
            require_once(VIEWS_PATH."modify-keeper.php");
            
        }


        public function RegistrationKeeper(){
            require_once(VIEWS_PATH."add-keeper.php");
        }
       

        public function Add($size,$salary, $available,$dateStart, $dateEnd)
        {
            $keeper = new Keeper();
            $keeper->setSize($size);
            $keeper->setSalary($salary);
            $keeper->setAvailable($available);
            $keeper->setDateStart($dateStart);
            $keeper->setDateEnd($dateEnd);

            $this->keeperDAO->Add($keeper);

            $this->HomeKeeper();

            /*$validationUser = ($keeper != null) && ($keeper->getPassword() === $password);
    
            if($validationUser){
                $this->HomeKeeper();
            }else{
                $this->Index();
            }*/
            
        }

        public function CheckAvailability($dateStart, $dateEnd){
            $this->ShowListViewFilter($dateStart, $dateEnd);

        }

        public function Reservation($size,$salary, $available,$dateStart, $dateEnd)
        {

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