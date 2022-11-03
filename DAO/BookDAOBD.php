<?php
    namespace DAO;

    use DAO\IKeeperDAOBD as IKeeperDAOBD;
    use DAO\IBookDAOBD as IBookDAOBD;
    use Models\Keeper as Keeper;
    use Models\Pet as Pet;
    use Models\Book as Book;
    use Models\User as User;
    use \Exception as Exception;
    use DAO\Connection as Connection;

    class BookDAOBD implements IBookDAOBD
    {
        private $bookList = array();
        private $connection;
        private $tableName = "book";
        private $tableNameUser = "user";
        private $tableNameKeeper = "keeper";

    
        public function GetAllPDO() {
            try {
                $bookList = array();
                $query = "SELECT * FROM " . $this->tableName;
                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->Execute($query);
                foreach($resultSet as $row) {
                    $book = new book();
                    $book->setId($row["id"]);

                    $keeper = new Keeper();
                    $keeper->setId($row["idKeeper"]);

                    $user = new User();
                    $user->setId($row["idUser"]);
                
                    $book->setKeeper($keeper);
                    $book->setUser($user);
                    $book->setStatus($row["status"]);

                    array_push($bookList, $book);
                    
                }
                return $bookList;
            } catch(Exception $ex) {
                throw $ex;
            }
        }

          public function GetBookByKeeper($idKeeper) {
            try {
                $bookList = array();

                $query = "SELECT * FROM ". $this->tableName. " bo INNER JOIN ". $this->tableNameKeeper. " k on k.id = bo.idKeeper WHERE '".$idKeeper."'=k.id";

                $parameters['idKeeper'] = $idKeeper;
                $this->connection = Connection::GetInstance();
                //$resultSet = $this->connection->Execute($query, $parameters);
                $bookList = $this->connection->Execute($query, $parameters);
               // var_dump("book: ",$bookList);
                //var_dump("bookList: ",$bookList[0][0]);
                foreach ($bookList as $row) {     
                    //$book['id'] = $row["id"];           
                    $book['id'] = $row[0];           
                    $book['idUser'] = $row["idUser"];
                    $book['idKeeper'] = $row["idKeeper"];
                    $book['status'] = $row["status"];
                
                    array_push($bookList, $book);

                }
                return $bookList[1];
            } catch(\PDOException $ex) {
                throw $ex;
            }
        }
    
        public function GetById($id) 
        {
            try
            {
                $bookList = array();
    
                $query = "SELECT * FROM ".$this->tableName." WHERE (id = :id);";
    
                $parameters['id'] = $id;
    
                $this->connection = Connection::GetInstance();
    
                $resultSet = $this->connection->Execute($query, $parameters);
                
                foreach ($resultSet as $row)
                {      
                    
                    $book = new Book();
                    $book->setId($row["id"]);
                    $book->setKeeper($row["idKeeper"]);
                    $book->setUser($row["idUser"]);
                    $book->setStatus($row["status"]);
                    
                    array_push($bookList, $book);
                }
    
                    ///return the array in position 0
                    return (count($bookList) > 0) ? $bookList[0] : null;
            }catch(\PDOException $ex)
            {
                throw $ex;
            }
        }    
        public function Add(Book $book)
        {
            try
            {
                if($_SESSION["loggedUser"]->getRole()=="Owner")
                {
                    $query = "INSERT INTO ".$this->tableName." (id,idKeeper,idUser, status) VALUES (:id, :idKeeper, :idUser, :status);";
                    
                    $parameters["id"] = $book->getId();
                    $parameters["idKeeper"] = $book->getKeeper()->getId();
                    $parameters["idUser"] = $book->getUser()->getId();
                    $parameters["status"] = "pending";

                    $this->connection = Connection::GetInstance();
                    $this->connection->ExecuteNonQuery($query, $parameters);
                    
                }else{
                    $query= "UPDATE ".$this->tableName." SET status=:status WHERE status='pending';";

                    $parameters["status"] = "confirmed";
                    $this->connection = Connection::GetInstance();
    
                    $this->connection->ExecuteNonQuery($query, $parameters);
                }
                
                
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
       
    }
?>