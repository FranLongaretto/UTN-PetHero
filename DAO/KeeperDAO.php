<?php
    namespace DAO;

    use DAO\IKeeperDAO as IKeeperDAO;
    use Models\Keeper as Keeper;
    use Models\Pet as Pet;

    class KeeperDAO implements IKeeperDAO
    {
        private $keeperList = array();
        private $fileName = ROOT."Database/keeper.json";

        public function Add(Keeper $keeper)
        {
            $this->RetrieveData();
            
            $keeper->setId($this->GetNextId());
            
            array_push($this->keeperList, $keeper);

            $this->SaveData();
        }

       
        public function GetAll()
        {
            $this->RetrieveData();

            return $this->keeperList;
        }

        public function Delete($id)
        {            
            $this->RetrieveData();
            
            $this->keeperList = array_filter($this->keeperList, function($keeper) use($id){                
                return $keeper->getId() != $id;
            });
            
            $this->SaveData();
        }

        private function RetrieveData()
        {
             $this->keeperList = array();

             if(file_exists($this->fileName))
             {
                 $jsonToDecode = file_get_contents($this->fileName);

                 $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();
                 
                 foreach($contentArray as $content)
                 {
                     $keeper = new Keeper();
                     $keeper->setId($content["id"]);
                     $keeper->setSize($content["size"]);
                     $keeper->setSalary($content["salary"]);
                     $keeper->setAvailable($content["available"]);
                     $keeper->setDate($content["date"]);

                     array_push($this->keeperList, $keeper);
                 }
             }
        }

    

        function Modify(Keeper $keeper)
        {
            $this->RetrieveData();
            $id = $keeper->getId();
            $this->keeperList = array_filter($this->keeperList, function($keeper) use($id){
                return $keeper->getId() != $id;
            });

            array_push($this->keeperList, $keeper);

            $this->SaveData();
        }

        function GetById($id)
        {
            //var_dump($id);
            $this->RetrieveData();

            $keeper = array_filter($this->keeperList, function($keeper) use($id){
                return $keeper->getId() == $id;
            });

            $keeper = array_values($keeper); //Reorderding array
            

            return (count($keeper) > 0) ? $keeper[0] : null;
        }

        public function GetByEmail($email)
        {
            $keeper = null;

            $this->RetrieveData();

            $keepers = array_filter($this->keeperList, function($keeper) use($email){
                return $keeper->getEmail() == $email;
            });

            $keepers = array_values($keepers); //Reordering array indexes

            return (count($keepers) > 0) ? $keepers[0] : null;
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->keeperList as $keeper)
            {
                $valuesArray = array();
                $valuesArray["id"] = $keeper->getId();
                $valuesArray["size"] = $keeper->getSize();
                $valuesArray["salary"] = $keeper->getSalary();
                $valuesArray["available"] = $keeper->getAvailable();
                $valuesArray["date"] = $keeper->getDate();
             
                array_push($arrayToEncode, $valuesArray);
            }

            $fileContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

            file_put_contents($this->fileName, $fileContent);
        }

     

        private function GetNextId()
        {
            $id = 0;

            foreach($this->keeperList as $keeper)
            {
                $id = ($keeper->getId() > $id) ? $keeper->getId() : $id;
            }

            return $id + 1;
        }

  
    }
?>