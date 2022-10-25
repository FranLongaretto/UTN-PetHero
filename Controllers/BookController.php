<?php
    namespace Controllers;

    use Controllers\KeeperController as KeeperController;
    use DAO\UserDAO as UserDAO;
    use DAO\BookDAO as BookDAO;
    use DAO\KeeperDAO as KeeperDAO;
    use DAO\OwnerDAO as OwnerDAO;
    use Models\Book as Book;
    use Models\Keeper as Keeper;
    use Models\Owner as Owner;
    use Models\User as User;
   

    class BookController
    {
        private $bookDAO;
        private $keeperDAO;
        private $ownerDAO;
        private $keeperController;

        public function __construct()
        {
            $this->bookDAO = new BookDAO();
            $this->keeperDAO = new KeeperDAO();
            $this->ownerDAO = new OwnerDAO();
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

        
        public function ShowAddView()
        {
            //require_once("validate-session.php");
            require_once(VIEWS_PATH."add-book.php");
        }

        public function ShowListView()
        {
            $bookList = $this->bookDAO->getAll();
            
            require_once(VIEWS_PATH."book-list.php");
        }


        public function ShowModifyView($keeperId) {
            
            //$Book = $this->bookDAO->GetById($keeperId);
            $keeper = $this->keeperDAO->GetById($keeperId);
           
            //require_once(VIEWS_PATH."modify-book.php");
            require_once(VIEWS_PATH."add-book.php");
            
        }


        public function Reservation($keeperId){
            //var_dump($keeperId);
            $keeper = $this->keeperDAO->GetById($keeperId);
            //var_dump($keeperId);
            if($keeper!=NULL){
                 $_SESSION["keeperAvailable"]= $keeper;
                 
                // var_dump($keeper);
                

                 require_once(VIEWS_PATH."add-book.php");
            }else{
               $this->keeperController->ShowListView("Keeper doest´n exist");
            }
           
           
        
        }
       

        public function Add($idKeeper)
        {
            //var_dump($idKeeper);
            //$keeper = new Keeper();
            //$keeper->setId($idKeeper);
   
            $book = new Book();
            //$book->setId($id);
            $book->setIdKeeper($idKeeper);
            $idOwner = $_SESSION["loggedUser"]->getId();
            $book->setIdOwner($idOwner);

           //$book->setDateBook($dateBook);
            if($book !=null){
                $this->bookDAO->Add($book);

                $this->HomeOwner("&#x2705; Book created correctly");  
            }else{
                $errorMessage = "";
                $this->HomeOwner($errorMessage);
            }
          
            

         
            
        }

        

    }        
?>