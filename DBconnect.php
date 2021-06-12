<?php
session_start();
class DbConnect
{
    private $servername = '127.0.0.1';
    private $db   = 'CoffeeDB';
    private $username = 'root';
    private $password = 'password';

    public function AddCustomer($Customer)
    {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->db", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("INSERT INTO Customers (Username, PassKey, Gender, FavCoffee, Theme) 
            VALUES (:Username, :PassKey, :Gender, :FavCoffee, :Theme)");

            $CustomerName = $Customer->get_CustomerName();
            $CustomerPasskey = $Customer->get_Passkey();
            $CustomerGender = $Customer->get_Gender();
            $CustomerFavCoffee = $Customer->get_FavCoffee();
            $CustomerTheme = $Customer->get_Theme();

            $stmt->bindParam(':Username', $CustomerName);
            $stmt->bindParam(':PassKey', $CustomerPasskey);
            $stmt->bindParam(':Gender', $CustomerGender);
            $stmt->bindParam(':FavCoffee', $CustomerFavCoffee);
            $stmt->bindParam(':Theme', $CustomerTheme);



            if ($stmt->execute()) {
                header("Location: login.html");
                exit;
            } else {
                echo "Did not work";
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            $conn = null;
        }
    }

    public function Search($Customer)
    {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->db", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $CustomerName = $Customer->get_CustomerName();
            $CustomerPasskey =$Customer->get_PassKey();

            $stmt = $conn->prepare("SELECT Username,PassKey, FavCoffee, Gender, Theme FROM customers WHERE Username = '$CustomerName'");

            if ($stmt->execute()) {
                $rows = $stmt->fetch();
                $Username = $rows[0];
                $PassKey = $rows[1];
                $FavCoffee = $rows[2];
                $Gender = $rows[3];
                $Theme = $rows[4];
                if($PassKey === $CustomerPasskey ){
                $_SESSION["LoggedIn"] = true;
                $_SESSION["username"] = $Username;
                $_SESSION["favcoffee"] = $FavCoffee;
                $_SESSION["gender"] = $Gender;
                $_SESSION["theme"] = $Theme;
                header("Location: Home.php");
                exit;
                }
                else{
                    echo"Retry";
                    header("Location: Login.html");
                    exit;
                }
            } else {
                echo "Did not work";
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            $conn = null;
        }
    }
}
