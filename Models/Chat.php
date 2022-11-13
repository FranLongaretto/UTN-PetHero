<?php
    namespace Models;

    class Chat{
        private $id;
        private $owner;
        private $keeper;
        private $messages_owner;
        private $messages_keeper;

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
            return $this;
        }

        public function getOwner()
        {
            return $this->owner;
        }

        public function setOwner($owner)
        {
            $this->owner = $owner;
            return $this;
        }

        public function getKeeper()
        {
            return $this->keeper;
        }
        
        public function setKeeper($keeper)
        {
            $this->keeper = $keeper;
            return $this;
        }

        public function getMessages_owner()
        {
            return $this->messages_owner;
        }

        public function setMessages_owner($messages_owner)
        {
            $this->messages_owner = $messages_owner;
            return $this;
        }
        
        public function getMessages_keeper()
        {
            return $this->messages_keeper;
        }
        
        public function setMessages_keeper($messages_keeper)
        {
            $this->messages_keeper = $messages_keeper;
            return $this;
        }
    }
?>