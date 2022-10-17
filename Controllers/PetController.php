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
            $image_file = $_FILES["imagePet"];

            // Exit if no file uploaded
            if (!isset($image_file)) {
                die('No file uploaded.');
            }

            // Exit if is not a valid image file
            $image_type = exif_imagetype($image_file["tmp_name"]);
            if (!$image_type) {
                die('Uploaded file is not an image.');
            }

            // Move the temp image file to the images/ directory
            move_uploaded_file(
                // Temp image location
                $image_file["tmp_name"],

                // New image location
                IMG_PATH . "/img" . $image_file["name"]
            );
        }

        public function Add($race, $size, $vaccination, $description, $image)
        {
            $pet = new Pet();
            $pet->setRace($race);
            $pet->setSize($size);
            $pet->setVaccination($vaccination);
            $pet->setDescription($description);
            $pet->setImage($image);

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