<?php
    namespace DAO;

    use DAO\IOwnerDAO as IOwnerDAO;
    use Models\Owner as Owner;
    use Models\Pet as Pet;

    class OwnerDAO implements IOwnerDAO
    {
        private $ownerList = array();
        private $petList = array();
        private $fileName = ROOT."Database/owner.json";
        private $fileNamePet = ROOT."Database/pet.json";

        public function Add(Owner $owner)
        {
            $this->RetrieveData();
            
            $owner->setId($this->GetNextId());
            
            array_push($this->ownerList, $owner);

            $this->SaveData();
        }

        public function AddPet(Pet $pet)
        {
            $this->RetrieveDataPet();
            
            $pet->setId($this->GetNextIdPet());
            
            array_push($this->petList, $pet);

            $this->SaveDataPet();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->ownerList;
        }

        public function Delete($id)
        {            
            $this->RetrieveData();
            
            $this->ownerList = array_filter($this->ownerList, function($owner) use($id){                
                return $owner->getId() != $id;
            });
            
            $this->SaveData();
        }

        private function RetrieveData()
        {
             $this->ownerList = array();

             if(file_exists($this->fileName))
             {
                 $jsonToDecode = file_get_contents($this->fileName);

                 $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();
                 
                 foreach($contentArray as $content)
                 {
                     $owner = new Owner();
                     $owner->setId($content["id"]);
                     $owner->setEmail($content["email"]);
                     $owner->setPassword($content["password"]);
                     $owner->setRole($content["role"]);
                     $owner->setFirstName($content["firstName"]);
                     $owner->setLastName($content["lastName"]);
                     $owner->setDni($content["dni"]);
                     $owner->setPhoneNumber($content["phoneNumber"]);

                     array_push($this->ownerList, $owner);
                 }
             }
        }

        private function RetrieveDataPet()
        {
            $this->petList = array();

            if(file_exists($this->fileNamePet))
            {
                $jsonToDecode = file_get_contents($this->fileNamePet);

                $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();
                
                foreach($contentArray as $content)
                
                {
                    $pet = new Pet();
                    $pet->setId($content["id"]);
                    $pet->setRace($content["race"]);
                    $pet->setVaccination($content["vaccination"]);
                    $pet->setDescription($content["description"]);
                    $pet->setImage($content["image"]);

                    array_push($this->petList, $pet);
                }
            }
        }

        function Modify(Owner $owner)
        {
            $this->RetrieveData();
            $id = $owner->getId();
            $this->ownerList = array_filter($this->ownerList, function($owner) use($id){
                return $owner->getId() != $id;
            });

            array_push($this->ownerList, $owner);

            $this->SaveData();
        }

        function GetById($id)
        {
            //var_dump($id);
            $this->RetrieveData();

            $owner = array_filter($this->ownerList, function($owner) use($id){
                return $owner->getId() == $id;
            });

            $owner = array_values($owner); //Reorderding array
            

            return (count($owner) > 0) ? $owner[0] : null;
        }

        public function GetByEmail($email)
        {
            $owner = null;

            $this->RetrieveData();

            $owners = array_filter($this->ownerList, function($owner) use($email){
                return $owner->getEmail() == $email;
            });

            $owners = array_values($owners); //Reordering array indexes

            return (count($owners) > 0) ? $owners[0] : null;
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->ownerList as $owner)
            {
                $valuesArray = array();
                $valuesArray["id"] = $owner->getId();
                $valuesArray["email"] = $owner->getEmail();
                $valuesArray["password"] = $owner->getPassword();
                $valuesArray["role"] = $owner->getRole();
                $valuesArray["firstName"] = $owner->getFirstName();
                $valuesArray["lastName"] = $owner->getLastName();
                $valuesArray["dni"] = $owner->getDni();
                $valuesArray["phoneNumber"] = $owner->getPhoneNumber();
                array_push($arrayToEncode, $valuesArray);
            }

            $fileContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

            file_put_contents($this->fileName, $fileContent);
        }

        private function SaveDataPet()
        {
            $arrayToEncode = array();
           
            foreach($this->petList as $pet)
            {
                $valuesArray = array();
                $valuesArray["id"] = $pet->getId();
                $valuesArray["race"] = $pet->getRace();
                $valuesArray["vaccination"] = $pet->getVaccination();
                $valuesArray["description"] = $pet->getDescription();
                $valuesArray["image"] = $pet->getImage();
                array_push($arrayToEncode, $valuesArray);
            }

            $fileContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

            file_put_contents($this->fileNamePet, $fileContent);
        }

        private function GetNextId()
        {
            $id = 0;

            foreach($this->ownerList as $owner)
            {
                $id = ($owner->getId() > $id) ? $owner->getId() : $id;
            }

            return $id + 1;
        }

        private function GetNextIdPet()
        {
            $id = 0;

            foreach($this->petList as $pet)
            {
                $id = ($pet->getId() > $id) ? $pet->getId() : $id;
            }

            return $id + 1;
        }
    }
?>