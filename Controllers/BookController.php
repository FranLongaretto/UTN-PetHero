<?php
    namespace Controllers;

    use Controllers\KeeperController as KeeperController;
    use DAO\BookDAO as BookDAO;
    use DAO\KeeperDAO as KeeperDAO;
    use DAO\OwnerDAO as OwnerDAO;
    use Models\Book as Book;
    use Models\Keeper as Keeper;
    use Models\Owner as Owner;
   

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

        public function HomeBook($message = "")
        {
            require_once(VIEWS_PATH."home-book.php");
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


        public function ShowModifyView($id) {
            $Book = $this->bookDAO->GetById($id);
           
            require_once(VIEWS_PATH."modify-book.php");
            
        }


        public function Reservation($keeperId){
            $keeper = $this->keeperDAO->GetById($keeperId);
            if($keeper!=NULL){
                 $_SESSION["keeperAvailable"]= $keeper;
                 require_once(VIEWS_PATH."add-book.php");
            }else{
               $this->keeperController->ShowListView("Keeper doest´n exist");
            }
           
           
        
        }
       

        public function Add($id, $idKeeper, $idOwner)
        {

            $keeper = new Keeper();
            $keeper->setIdKeeper($idKeeper);
        
            $owner = new Owner();
            $owner->setIdOwner($idOwner);

            $book = new Book();
            $book->setId($id);
            $book->setIdKeeper($keeper);
            $book->setIdOwner($owner);
           // $book->setDateBook($dateBook);

          
            $this->bookDAO->Add($book);

            $this->HomeBook();

         
            
        }

        

    }        
?>