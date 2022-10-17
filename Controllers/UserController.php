<?php
    namespace Controllers;

    use DAO\UserDAO as UserDAO;
    use Models\User as User;

    class UserController
    {
        private $userDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
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

        public function HomeOwner($message = "")
        {
            require_once(VIEWS_PATH."home-owner.php");
        }
        
        public function ShowAddView()
        {
            //require_once("validate-session.php");
            require_once(VIEWS_PATH."add-user.php");
        }

        public function ShowListView()
        {
            $userList = $this->userDAO->getAll();
            
            require_once(VIEWS_PATH."user-list.php");
        }

        public function ShowModifyView($id) {
            $user = $this->userDAO->GetById($id);
           
            require_once(VIEWS_PATH."modify-user.php");
            
        }

        public function SignUp(){
            require_once(VIEWS_PATH."add-user.php");
        }

        public function Add($email, $password, $role, $firstName, $lastName, $dni, $phoneNumber)
        {

            $user = new User();
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setRole($role);
            $user->setFirstName($firstName);
            $user->setLastName($lastName);
            $user->setDni($dni);
            $user->setPhoneNumber($phoneNumber);

            $this->userDAO->Add($user);

            $validationUser = ($user != null) && ($user->getPassword() === $password);
            $validationRolKeeper= ($user->getRole() === "Keeper");
            $validationRolOwner= ($user->getRole() === "Owner");

            if($validationUser && $validationRolKeeper){
                $this->HomeKeeper();
            }else if($validationUser && $validationRolOwner){
                $this->HomeOwner();
            }else{
                $this->Home();
            }
            
        }


        public function Modify($email, $password, $id)
        {
            require_once(VIEWS_PATH."validate-session.php");

            $user = new User();
            $user->setId($id);
            $user->setEmail($email);
            $user->setPassword($password);

            $this->userDAO->Modify($user);
           

            $this->ShowListView();
        }

       

        public function Delete($id)
        {
            $this->userDAO->Delete($id);

            $this->ShowListView();
        }

        

        ///LOGEO 
        
        public function Login($email, $password) {

            $user = $this->userDAO->GetByEmail($email);

            $validationUser = ($user != null) && ($user->getPassword() === $password);
            $validationRolKeeper= ($user->getRole() === "Keeper");
            $validationRolOwner= ($user->getRole() === "Owner");

            if($validationUser && $validationRolKeeper)
            {   //Entra a home Keeper
                $_SESSION["loggedUser"] = $user;
                $this->HomeKeeper();
                
            }else if($validationUser && $validationRolOwner){
                //Entra a home Owner
                $_SESSION["loggedUser"] = $user;
                $this->HomeOwner();
                
            }else{
                //Devuelve al Login por error en validacion de datos.
                echo "<script> if(confirm('Verify your information'));";
                echo "window.location = '../index.php';
                    </script>";
                //$this->Index("Usuario y/o Contraseña incorrecto");
            }
        }
        public function Logout () {
			session_destroy();
            //$this->Index();
            
            //use javascript to redirect to index to show the icon.
            echo "<script>window.location = '../index.php';
                </script>";
            
            
        }
    }        
?>