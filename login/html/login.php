<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Reifenmanagement</title>
</head>
<body>
    
    <?php

    require("dbConnect.php");
    if(isset($_POST['submit'])){
        
        $user = $_POST['u'];
        $pass = $_POST['p'];

    userLogin($user, $pass);
    }
    
    ?>

    <!--Login Form-->
    <form method="post" class="box" action="#">
        <h1 style="color:rgb(212, 212, 212)">Login</h1>
        <input type="text" name = "u" placeholder=" Username">
        <input type="password" name = "p" placeholder=" Password">
        <input type="submit" name="submit" value="Login">

        <!-- <p><a id="register" href="register.html">Not a member? Register here!</a></p> -->

    </form>
</body>
</html>