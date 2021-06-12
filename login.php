<?php
  include 'Customer.php';
  include 'DbConnect.php';

  if(isset($_POST['Submit'])){
     if(!isset($_POST['Username'])|| $_POST['Username'] === "" ){
         $OK = false;
        }
     else{
         $Username =$_POST['Username'];
        }
    if(!isset($_POST['Password'])|| $_POST['Password'] === "" ){
            $OK = false;
        }
    else{ 
            $Password =$_POST['Password'];
        }

            $Customer =new Customer;
            $DbConnect = new DbConnect;
            $Customer->set_Passkey($Password);
            $Customer->set_CustomerName($Username);
            $Custonect = new DbConnect;
            $DbConnect->Search($Customer);
      
        }
?>