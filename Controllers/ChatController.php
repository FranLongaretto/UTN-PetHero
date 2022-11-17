<?php
    namespace Controllers;

    use Controllers\UserController as UserController;
    use DAO\ChatDAOBD as ChatDAOBD;
    use Models\Chat as Chat;

    class ChatController
    {
        private $chatDAOBD;
        private $userController;

        public function __construct()
        {
            $this->chatDAOBD = new ChatDAOBD();
            $this->userController = new UserController();
        }

        public function HomeOwner($message = "")
        {
            $frontMessage = $message;
            require_once(VIEWS_PATH."home-owner.php");
        }

        public function ShowKeeperList($message = "")
        {
            $this->userController->ShowAllKeepersAvailables();
        }

        public function ShowChat($message = "")
        {
            $frontMessage = $message;
            require_once(VIEWS_PATH."chat.php");
        }

        public function ShowMyChats($message = "")
        {
            $userId = $_SESSION["loggedUser"]->getId();
            $userRole = $_SESSION["loggedUser"]->getRole();

            $chatListFront = $this->chatDAOBD->GetAllByUserPDO($userId);

            $usersRecipient = [];
            $searchUser = null;
            
            if($chatListFront) {
                foreach ($chatListFront as $key => $value) {
                    if($userRole == "Owner"){
                        $searchUser = $this->keeperController->GetUserById($value->getKeeper());
                    }else{
                        $searchUser = $this->keeperController->GetUserById($value->getOwner());
                    }
                    array_push($usersRecipient, $searchUser);
                }
            }else{
                $message = "Couldn't find Chats";
            }

            $frontMessage = $message;
            require_once(VIEWS_PATH."chats-list.php");
        }

        public function Add($keeperId)
        {
            $ownerId = $_SESSION["loggedUser"]->getId();
            $validateChat = false;

            if($keeperId){
                $validateChat = $this->chatDAOBD->ValidateChat($ownerId, $keeperId);
                if($validateChat){
                    $chat = new Chat();
                    $chat->setOwner($ownerId);
                    $chat->setKeeper($keeperId);
        
                    $this->chatDAOBD->Add($chat);
                    $this->ShowChat();
                }else{
                    $this->HomeOwner("Chat with keeper is Active\nGo to 'Show My Chats'");
                }
            }else{
                $this->HomeOwner("Error finding Keeper\nTry Again");
            }
        }

        public function UpdateChat($owner, $keeper)
        {
            $chat = new Chat();
            $chat->setOwner($owner);
            $chat->setKeeper($keeper);
        }
    }
?>