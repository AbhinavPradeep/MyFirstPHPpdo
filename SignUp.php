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
         if(!isset($_POST['Gender'])|| $_POST['Gender'] === "" ){
             $OK = false;
         }
         else{
             $Gender =$_POST['Gender'];
         }
         if(!isset($_POST['FavCoffee'])|| $_POST['FavCoffee'] === "" ){
             $OK = false;
         }
         else{
             $FavCoffee =$_POST['FavCoffee'];
         }
         if(!isset($_POST['Theme'])|| $_POST['Theme'] === "" ){
             $OK = false;
         }
         else{
             $Theme =$_POST['Theme'];
         }
         if(!isset($_POST['TC'])|| $_POST['TC'] === "" ){
             $OK = false;
         }
         else{
             $TC =$_POST['TC'];
         }
      

            $Customer =new Customer;
            $Customer->set_CustomerName($Username);
            $Customer->set_Passkey($Password);
            $Customer->set_Gender($Gender);
            $Customer->set_Theme($Theme);
            $Customer->set_FavCoffee($FavCoffee);
            $DbConnect = new DbConnect;
            $DbConnect->AddCustomer($Customer);
      
        }
?>