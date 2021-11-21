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

    $message = 'Wrong password or username!';
    
    $servername = "localhost";
    $username = "root";
    $password_sql = "";
    $dbname = "propra";
    $row = '';

    // $user = '';
    // $pass = '';
    if(isset($_POST['submit'])){
        
        $user = $_POST['u'];
        $pass = $_POST['p'];

        // if($user == "fadi"){
        //     // $url ="one.php";
        //     header("Location: one.php");
        //     die;
        // }
        //     else{
        //         header("Location: two.php");
        //     die;
        //     }

        $conn = new mysqli($servername, $username, $password_sql, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql = "SELECT position from user where Email = '$user' and password = '$pass' ";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $arr = array();
        $x = 0;
      // output data of each row
      while($row = $result->fetch_assoc()) {
        // echo "userID: " . $row["userID"]. " - Name: " . $row["firstName"]. " " . $row["lastName"]. "<br>";
        // echo '<br>';
        // echo $row["userID"];
        //$pos = $row['position'];
        $arr[] = $row['position'];
        echo $arr[$x];
        if($arr[$x] == 1)
        header("Location: prozess.php");
        else if($arr[$x] == 2)
        header("Location: manager.php");
        else if($arr[$x] == 3)
        header("Location: mitarbeiter.php");
       
        echo '<br>';
        $x++;
        
      }
    } else {
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
    $conn->close();
        }
    // Create connection

    
    ?>

    <!--Login Form-->
    <form method="post" class="box" action="#">
        <h1 style="color:rgb(212, 212, 212)">Login</h1>
        <input type="text" name = "u" placeholder=" Username">
        <input type="password" name = "p" placeholder=" Password">
        <input type="submit" name="submit" value="Login">

        <p><a id="register" href="register.html">Not a member? Register here!</a></p>

    </form>
</body>
</html>