<?php
    namespace Controllers;

    use DAO\PetDAO as PetDAO;
    use Models\Pet as Pet;

    class PetController
    {
        private $PetDAO;

        public function __construct()
        {
            $this->PetDAO = new PetDAO();
        }

        public function Index($message = "")
        {
            require_once(VIEWS_PATH."index.php");
        }

        public function HomeOwner($message = "")
        {
            require_once(VIEWS_PATH."home-owner.php");
        }

        public function HomeKeeper($message = "")
        {
            require_once(VIEWS_PATH."home-keeper.php");
        }

        public function ShowListView()
        {
            $petList = $this->PetDAO->getAll();
            
            require_once(VIEWS_PATH."pet-list.php");
        }

        public function ShowModifyView($id) {
            $pet = $this->petDAO->GetById($id);
        
            require_once(VIEWS_PATH."modify-pet.php");
        }

        public function SignUpPet(){
            require_once(VIEWS_PATH."add-pet.php");
        }

        public function UploadImage(){
            // Get reference to uploaded image
            $vaccinationImg_file = $_FILES["vaccinationImg"];
            $petImg_file = $_FILES["petImage"];

            // Exit if no file uploaded
            if (!isset($vaccinationImg_file) || !isset($petImg_file)) {
                die('No file uploaded.');
            }

            // Exit if is not a valid image file
            $vaccinationImg_type = exif_imagetype($vaccinationImg_file["tmp_name"]);
            $petImg_type = exif_imagetype($petImg_file["tmp_name"]);
            
            if (!$vaccinationImg_type || !$petImg_type) {
                die('Uploaded file is not an image.');
            }

            // Move the temp image file to the images/ directory
            $petImageNameNoExtension = substr($petImg_file["name"], 0, strpos($petImg_file["name"], "."));
            if (isset($vaccinationImg_file)) {
                move_uploaded_file(
                    // Temp image location
                    $vaccinationImg_file["tmp_name"],
                    // New image location
                    IMG_PATH . "/vaccination/". $petImageNameNoExtension . "_" . $vaccinationImg_file["name"]
                );
            }
            if (isset($petImg_file)) {
                move_uploaded_file(
                    // Temp image location
                    $petImg_file["tmp_name"],
    
                    // New image location
                    IMG_PATH . "/pets/" . $petImg_file["name"]
                );
            }
        }

        public function Add($race, $size, $vaccinationImg , $description, $petImage)
        {
            $pet = new Pet();
            $pet->setRace($race);
            $pet->setSize($size);
            $pet->setVaccination($vaccinationImg );
            $pet->setDescription($description);
            $pet->setImage($petImage);
            $this->UploadImage();

            $this->PetDAO->Add($pet);

            $validationPet = ($pet != null);

            if($validationPet){
                $this->HomeOwner();
            }
        }

        public function Delete($id)
        {
            $this->petDAO->Delete($id);

            $this->ShowListView();
        }
    }        
?>