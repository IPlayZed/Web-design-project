<?php
    //A regisztrációnál megadott adatokat tárolja el.
    class Account {
        private $email;
        private $username;
        private $password;
        private $born;
        private $gender;

        public function setEmail($email) {
            $this->email = $email;
        }
        public function setUsername($username) {
            $this->username = $username;
        }
        public function setPassword($password) {
            $this->password = $password;
        }
        public function setBorn($born) {
            $this->born = $born;
        }
        public function setGender($gender) {
            $this->gender = $gender;
        }

        public function getEmail() {
            return $this->email;
        }
        public function getUsername() {
            return $this->username;
        }
        public function getPassword() {
            return $this->password;
        }
        public function getBorn() {
            return $this->born;
        }
        public function getGender() {
            return $this->gender;
        }

        public function __construct($email, $username, $password, $born, $gender) {
            $this->setEmail($email);
            $this->setUsername($username);
            $this->setPassword($password);
            $this->setBorn($born);
            $this->setGender($gender);
        }

        public function writeToFile($filePointer) {
            $newline="\n";
            fwrite($filePointer, $this->getEmail());
            fwrite($filePointer, $newline);
            fwrite($filePointer, $this->getUsername());
            fwrite($filePointer, $newline);
            fwrite($filePointer, $this->getPassword());
            fwrite($filePointer, $newline);
            fwrite($filePointer, $this->getBorn());
            fwrite($filePointer, $newline);
            fwrite($filePointer, $this->getGender());
            fwrite($filePointer, $newline);
        }
    } 
?>