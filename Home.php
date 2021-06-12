<?php
    session_start();
    if($_SESSION["LoggedIn"] !== true)
    {
        header("Location: login.html");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home - Joe's Coffee</title>
    <link rel="icon" href="http://dzone.mfac.edu.au/10SWD/2020/013253/Project/CoffeeShop/Images/favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Antic' rel='stylesheet'>
    <link rel="stylesheet" href="CSS/global.css">
</head>
<body>
    <div class="navbar">
        <img scr="http://dzone.mfac.edu.au/10SWD/2020/013253/Project/CoffeeShop/Images/favicon.ico">
        <a class="Tit" style="font-size: 40px; float:left;" href="#">Joe's Coffee</p\a>
        <a href="#"><img style="background-color: white;" src=<?php
            if($_SESSION["gender"] === "Male")
            {
                echo "Images/Male.ico";
            }
            if($_SESSION["gender"] === "Female"){
                echo "Images/Women.ico";
            }
        ?>></a>
        <a style="margin-top:10px;" href="#">Cart</a>
        <a style="margin-top:10px;" href="#">History</a>
        <a style="margin-top:10px;" href="#">Home</a>
    </div>
    <h1 id="Title" class="Tit" style="margin-top: 100px;font-size: 40px; display:block;"></h1>
    <img style="padding-left:20%" src=<?php
        if($_SESSION['favcoffee'] === "Espresso"){
            echo("Images/Espresso.jpg");
        }
        if($_SESSION['favcoffee'] === "Latte"){
            echo ("Images/Latte.jpg");
        }
        if($_SESSION['favcoffee'] === "FlatWhite"){
            echo("Images/FlatWhite.jpg");
        }
        if($_SESSION['favcoffee'] === "Cappuccino"){
            echo("Images/Cappuccino.jpg");
        }
    ?>>
    <script type="text/javascript">
        var i = 0;
        var txt = 'Hello There '+"<?php echo ($_SESSION['username']);?>"+', Welcome to Joe\'s Coffee !';
        var speed = 50;
        function typeWriter(){
            if(i < txt.length){
                document.getElementById("Title").innerHTML += txt.charAt(i);
                i++;
                setTimeout(typeWriter, speed)
            }
        }
        typeWriter();
    </script>
</body>
</html>