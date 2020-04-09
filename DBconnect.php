<?php 
class DbConnect
{
    private $servername = '127.0.0.1';
    private $db   = 'coffeeDB';
    private $username = 'root';
    private $password = 'password';
   
    public function AddCustomer($Customer)
    {
        try 
        {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->db", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $conn->prepare("INSERT INTO Customers (Name, PassKey, Gender, FavCoffee, Theme) 
            VALUES (:Name, :PassKey, :Gender, :FavCoffee, :Theme)");

            $CustomerName = $Customer->get_CustomerName();
            $CustomerPasskey = $Customer->get_Passkey();
            $CustomerGender=get_Genger();
            $CustomerFavCoffee =get_FavCoffee();
            $CustomerTheme =get_Theme();   
            
            $stmt->bindParam(':Name', $CustomerName);
            $stmt->bindParam(':PassKey', $CustomerPasskey);
            $stmt->bindParam(':Gender', $CustomerGender);
            $stmt->bindParam(':FavCoffee', $CustomerFavCoffee);
            $stmt->bindParam(':Theme', $CustomerTheme);
           

            
            if($stmt->execute())
                echo "New record created successfully";
            else
                echo "failed to insert";
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
            $conn = null;
        }
    }

}