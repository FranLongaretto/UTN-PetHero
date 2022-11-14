<?php
    namespace Controllers;

    use Controllers\KeeperController as KeeperController;
    use Controllers\OwnerController as OwnerController;
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
            $frontMessage = $message;
            require_once(VIEWS_PATH."chats-list.php");
        }

        public function Add($keeperId)
        {
            if($keeperId){
                $ownerId = $_SESSION["loggedUser"]->getId();
                
                $chat = new Chat();
                $chat->setOwner($ownerId);
                $chat->setKeeper($keeperId);

                $this->chatDAOBD->Add($chat);
                $this->ShowChat();
            }else{
                $this->HomeOwner("Error al buscar el Keeper \nIntente nuevamente");
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