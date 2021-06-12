<?php
    class Customer
    {
        private $CustomerID;
        private $CustomerName;
        private $Gender;
        private $Passkey;
        private $Theme;
        private $FavCoffee;

        public function get_CustomerID()
        {
            return $this->CustomerID;
        }

        public function set_CustomerID($customerid)
        {
            $this->CustomerID = $customerid;
        }
        public function get_CustomerName()
        {
            return $this->CustomerName;
        }

        public function set_CustomerName($name)
        {
            $this->CustomerName = $name;
        }
        public function get_Passkey()
        {
            return $this->Passkey;
        }

        public function set_Passkey($passkey)
        {
            $this->Passkey = $passkey;
        }
        public function get_Gender()
        {
            return $this->Gender;
        }

        public function set_Gender($gender)
        {
            $this->Gender = $gender;
        }
        public function get_Theme()
        {
            return $this->Theme;
        }

        public function set_Theme($theme)
        {
            $this->Theme = $theme;
        }
        public function get_FavCoffee()
        {
            return $this->FavCoffee;
        }

        public function set_FavCoffee($favcoffee)
        {
            $this->FavCoffee = $favcoffee;
        }
    }
?>