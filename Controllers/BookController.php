<?php
    namespace Controllers;

    use Controllers\KeeperController as KeeperController;
    use DAO\UserDAO as UserDAO;
    use DAO\UserDAOBD as UserDAOBD;
    use DAO\BookDAO as BookDAO;
    use DAO\BookDAOBD as BookDAOBD;
    use DAO\KeeperDAO as KeeperDAO;
    use DAO\KeeperDAOBD as KeeperDAOBD;
    use Models\Book as Book;
    use Models\Keeper as Keeper;
    use Models\User as User;
   

    class BookController
    {
        private $bookDAO;
        private $bookDAOBD;
        private $keeperDAO;
        private $keeperDAOBD;
        private $userDAOBD;
        private $keeperController;

        public function __construct()
        {
            $this->bookDAO = new BookDAO();
            $this->bookDAOBD = new BookDAOBD();
            $this->keeperDAO = new KeeperDAO();
            $this->keeperDAOBD = new KeeperDAOBD();
            $this->userDAOBD = new UserDAOBD();
            $this->keeperController = new KeeperController();
        }

        public function Index($message = "")
        {
            require_once(VIEWS_PATH."index.php");
        }
        public function Home($message = "")
        {
            require_once(VIEWS_PATH."home.php");
        }

        public function HomeOwner($message = "")
        {
            $frontMessage = $message;
            require_once(VIEWS_PATH."home-owner.php");
        }



        public function ShowListView($message = "")
        {
            $frontMessage = $message;
            //$bookList = $this->bookDAO->getAll();
            $bookList = $this->bookDAOBD->GetAllPDO();

            foreach($bookList as $book)
            {
                $userId = $book->getUser()->getId();
                $user = $this->userDAOBD->GetById($userId);
                //var_dump($user);

                $keeperId = $book->getKeeper()->getId();
                $keeper = $this->keeperDAOBD->GetById($keeperId);

                $book->setUser($user);
                $book->setKeeper($keeper);

                $countDays = $this->CountDays($keeper);
                $book->setCountDays($countDays);
                
                $amount = $this->GetAmount($keeper, $countDays);
                $book->setAmount($amount);
                

            }
            require_once(VIEWS_PATH."book-list.php");
        }

        public function CountDays($keeperId)
        {
            //***total days */
            $datetime1 = strtotime($keeperId->getDateStart());
            $datetime2 = strtotime($keeperId->getDateEnd());
            $difference = $datetime2 - $datetime1;
            // 1 day = 24 hours
            // 24 * 60 * 60 = 86400 seconds
            $result = abs(round($difference / 86400));
            return $result;
        }

        //recieve CountDays Result
        public function GetAmount($keeperId, $result)
        {
            $amount= $result * $keeperId->getSalary();
            return $amount; 
        }

        public function ShowModifyView($keeperId) {
            
            //$Book = $this->bookDAO->GetById($keeperId);
            $keeper = $this->keeperDAO->GetById($keeperId);
            //require_once(VIEWS_PATH."modify-book.php");
            
        }


        public function Reservation($keeperId){
            //$keeper = $this->keeperDAO->GetById($keeperId);
            $keeper = $this->keeperDAOBD->GetById($keeperId);
            
            if($keeper!=NULL){
                $_SESSION["keeperAvailable"]= $keeper;

                require_once(VIEWS_PATH."add-book.php");
                //$this->keeperController->ShowListView("Keeper has to accept the reservation");
            }
        }

        public function ConfirmReservation($idKeeper)
        {
            $book = $this->bookDAOBD->GetBookByKeeper($idKeeper);
            $keeper = $this->keeperDAOBD->GetById($idKeeper);
            //var_dump($idKeeper);
           
            //var_dump("book: ",$book[0][0]);
            if($book!=NULL){
                $_SESSION["bookAvailable"]= $book;
                
                require_once(VIEWS_PATH."add-book.php");
            }    
        }
       

        public function Add($idKeeper)
        {
            $book = new Book();
            //$book->setId($id);

            $keeper= new Keeper();
            $keeper->setId($idKeeper);

            $book->setKeeper($keeper);
            //$idOwner = $_SESSION["loggedUser"]->getId();

            $user = new User();
            $idUser = $_SESSION["loggedUser"]->getId();
            $user->setId($idUser);
            
            $book->setUser($user);

           //$book->setDateBook($dateBook);
            if($book !=null){
                //$this->bookDAO->Add($book);
                $this->bookDAOBD->Add($book);
                $this->HomeOwner("&#x2705; Book created correctly");  
            }else{
                $errorMessage = "";
                $this->HomeOwner($errorMessage);
            }
            
        }

        

    }        
?>