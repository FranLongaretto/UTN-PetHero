<?php
    namespace Controllers;

    use Controllers\KeeperController as KeeperController;
    use Controllers\OwnerController as OwnerController;
    use DAO\UserDAO as UserDAO;
    use DAO\UserDAOBD as UserDAOBD;
    use DAO\BookDAO as BookDAO;
    use DAO\BookDAOBD as BookDAOBD;
    use DAO\KeeperDAO as KeeperDAO;
    use DAO\KeeperDAOBD as KeeperDAOBD;
    use DAO\PetDAOBD as PetDAOBD;
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
        private $petDAOBD;
        private $keeperController;
        private $ownerController;

        public function __construct()
        {
            $this->bookDAO = new BookDAO();
            $this->bookDAOBD = new BookDAOBD();
            $this->keeperDAO = new KeeperDAO();
            $this->keeperDAOBD = new KeeperDAOBD();
            $this->userDAOBD = new UserDAOBD();
            $this->petDAOBD = new PetDAOBD();
            $this->keeperController = new KeeperController();
            $this->ownerController = new OwnerController();
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

        public function HomeKeeper($message = "")
        {
            $frontMessage = $message;
            require_once(VIEWS_PATH."home-keeper.php");
        }

        public function BookConfirm($message = "")
        {
            $frontMessage = $message;
            require_once(VIEWS_PATH."add-book.php");
        }
        
        public function ShowStartBooking($message = "")
        {
            $frontMessage = $message;
            $petList = $this->petDAOBD->GetAllPDO();
            require_once(VIEWS_PATH."startBooking.php");
        }

        public function StartBooking($petsId)
        {
            $arrayPets = [];
            $catTrue = false;
            $dogTrue = false;
            $sizeTrue = false;
            // $firstId = $petsId[array_key_first($petsId)];
            // $sizeType = $this->petDAOBD->GetById($firstId)->getSize();
            $sizeType = 'small';
            if($petsId != null){
                foreach ($petsId as $key => $value) {
                    $pet = $this->petDAOBD->GetById($value);
                    if($pet && $pet->getType() == "Cat"){
                        $catTrue = true;
                    }else{
                        $dogTrue = true;
                    }
                    if($pet && $pet->getSize() == "medium" && $sizeType != "big"){
                        $sizeType = "medium";
                    }
                    if ($pet && $pet->getSize() == "big") {
                        $sizeType = "big";
                    }
                    array_push($arrayPets, $pet);
                }

                if($catTrue && $dogTrue){
                    $this->ShowStartBooking("Debe seleccionar mascotas del mismo tipo");
                }else{
                    $_SESSION["arrayPetsForBooking"] = $arrayPets;
                    $this->keeperController->ShowListView();
                }
            }else{
                require_once(VIEWS_PATH."home-keeper.php");
            }
        }

        public function ShowListView($message = "")
        {
            $frontMessage = $message;
            $bookListFront = array();
            $loggedUserId = $_SESSION["loggedUser"]->getId();
            $loggedUserRole = $_SESSION["loggedUser"]->getRole();

            if($loggedUserRole == "Owner"){
                $bookListFront = $this->bookDAOBD->GetBookByOwner($loggedUserId);
            }else{
                $bookListFront = $this->bookDAOBD->GetBookByKeeper($loggedUserId);
            }

            // foreach($bookListFront as $book)
            // {
            //     var_dump($book);
            //     // if($book->getStatus() =="confirmed")
            //     // {
            //     //     $userId = $book->getUser()->getId();
            //     //     $user = $this->userDAOBD->GetById($userId);
            //     //     //var_dump($user);
    
            //     //     $keeperId = $book->getKeeper()->getId();
            //     //     $keeper = $this->keeperDAOBD->GetById($keeperId);
    
            //     //     $book->setUser($user);
            //     //     $book->setKeeper($keeper);
    
            //     //     $countDays = $this->CountDays($keeper);
            //     //     $book->setCountDays($countDays);
                    
            //     //     $amount = $this->GetAmount($keeper, $countDays);
            //     //     $book->setAmount($amount);  
                  
            //     // }
            //     /*else{
            //         $this->HomeKeeper("You don't have confirmed book");
            //     }*/
                
                
            // }
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

        public function Reservation($bookDateStart, $bookDateEnd, $bookPrice, $keeperBookId){
            //$keeper = $this->keeperDAO->GetById($keeperId);
            $keeper = $this->keeperDAOBD->GetById($keeperBookId);
            
            if($keeper != NULL){
                $frontBookPets = $_SESSION["arrayPetsForBooking"];
                $frontKeeperBook = $keeperBookId;
                $frontOwnerBook = $_SESSION["loggedUser"];
                $frontKeeper = $this->userDAOBD->GetById($keeper->getIdKeeper());
                $frontDateStart = $bookDateStart;
                $frontDateEnd = $bookDateEnd;
                $frontPrice = $bookPrice;
                require_once(VIEWS_PATH."add-book.php");
            }else{
                $this->ownerController->HomeOwner("Error on book the Keeper");
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
                if($book["status"] !="confirmed")
                {
                    var_dump($book["status"] );
                    require_once(VIEWS_PATH."add-book.php");
                }else{
                    $this->HomeKeeper("You don't have pending's book");
                }
                
                
            }    
        }

        public function Add($idKeeper, $idOwner, $idKeeperBook, $dateStart, $dateEnd, $bookPrice)
        {
            $book = new Book();
            $book->setIdKeeper($idKeeper);
            $book->setIdOwner($idOwner);
            $book->setIdKeeperBook($idKeeperBook);
            $book->setDateStart($dateStart);
            $book->setDateEnd($dateEnd);
            $book->setBookPrice($bookPrice);

            // $book->setId($id);

            // $book->setKeeper($keeper);
            // $idOwner = $_SESSION["loggedUser"]->getId();

            // $user = new User();
            // $idUser = $_SESSION["loggedUser"]->getId();
            // $user->setId($idUser);
            
            // $book->setUser($user);
            
            // $book->setDateBook($dateBook);

            if($book != null){
                //$this->bookDAO->Add($book);
                $this->bookDAOBD->Add($book);
                $this->HomeOwner("&#x2705; Book created correctly");  
            }else{
                $this->HomeOwner("Book error, please try again");
            }
            
        }
    }        
?>