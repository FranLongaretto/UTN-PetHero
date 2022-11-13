<?php
    namespace Controllers;

    use Controllers\KeeperController as KeeperController;
    use Controllers\OwnerController as OwnerController;
    use DAO\ChatDAOBD as ChatDAOBD;
    use Models\Chat as Chat;

    class ChatController
    {
        private $chatDAOBD;
        private $keeperController;
        private $ownerController;

        public function __construct()
        {
            $this->chatDAOBD = new ChatDAOBD();
            $this->keeperController = new KeeperController();
            $this->ownerController = new OwnerController();
        }

        public function ShowMyChats($message = "")
        {
            $frontMessage = $message;
            require_once(VIEWS_PATH."chats-list.php");
        }

        public function Add($owner, $keeper, $messages_owner, $messages_keeper)
        {
            $chat = new Chat();
            $chat->setOwner($owner);
            $chat->setKeeper($keeper);
            $chat->setMessages_owner($messages_owner);
            $chat->setMessages_keeper($messages_keeper);
        }
    }
?>