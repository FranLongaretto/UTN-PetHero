<?php
    namespace Controllers;

    use DAO\MessageDAOBD as MessageDAOBD;
    use Controllers\ChatController as ChatController;
    use Controllers\UserController as UserController;
    use Models\Message as Message;

    class MessageController
    {
        private $messageDAOBD;
        private $chatController;
        private $userController;

        public function __construct()
        {
            $this->messageDAOBD = new MessageDAOBD();
            $this->chatController = new ChatController();
            $this->userController = new UserController();
        }

        public function ShowNewChat($message = "")
        {
            $frontMessage = $message;
            require_once(VIEWS_PATH."new-message.php");
        }

        public function Add($message, $id_chat)
        {
            $loggedUserId = $_SESSION["loggedUser"]->getId();

            $message = new Message();
            $message->setIdChat($id_chat);
            $message->setUser($loggedUserId);
            $message->setMessage($message);
            $message->setDate(date("Y-m-d H:i:s"));
        }
    }
?>