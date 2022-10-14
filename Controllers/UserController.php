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

            $this->Home();
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

            if(($user != null) && ($user->getPassword() === $password))
            {
                $_SESSION["loggedUser"] = $user;
                $this->Home();
               
                
            }else{
                echo "<script> if(confirm('Verifique que los datos ingresados sean correctos'));";
                echo "window.location = '../index.php';
                    </script>";
                //$this->Index("Usuario y/o Contraseña incorrecto");    
            }
        }
        public function Logout () {
			session_destroy();
            $this->Index();
            
        }
    }        
?>