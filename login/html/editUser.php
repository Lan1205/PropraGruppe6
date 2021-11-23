<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Reifenmanagement</title>
</head>
<body>
    <form class="box" action="admin.php" method="post">
        <h1 style="color:rgb(212, 212, 212)">Benutzer Bearbeiten</h1>
        <label for="vorname">Vorname</label> 
        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
        <label for="nachname">Nachname</label><br>

        <?php
 $userID=$_POST['user_id'];
 //echo $text;
?>

  <?php

  //require("admin.php");
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "propra";
    $row = '';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql = "SELECT * from user where userID = '$userID'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {?>
        <tr>
      <!-- <td data-label="User-ID">Ken Griffey Jr.</td> -->
      <input type="text" id="vorname" name = "vorname" value="<?php echo $row['firstName']; ?>">&ensp;&ensp;&ensp;&ensp;
      <input type="text" id = "nachname" name = "nachname" value="<?php echo $row['lastName']; ?>"><br>
      <label for="birthday">Geburtsdatum</label>&ensp;&ensp;
      <input type="date" id="birthday" name= "birthdate" value="<?php echo $row['birthdate']; ?>"><br>
      <label for="email">Email</label>&ensp;&ensp;
      <input type="email" id="email" name = "email" value="<?php echo $row['email']; ?>"><br>
      <label for="phone">Phone number</label>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
      <label for="stelle">Stelle</label><br>
      <input type="text" name ="phonenumber" value="<?php echo $row['phonenumber']; ?>">&ensp;&ensp;&ensp;&ensp;&nbsp;
      
      <select name="position" id="stelle">
            <option value="mitarbeiter">Mitarbeiter</option>
            <option value="reifenmanager">Reifenmanager</option>
            <option value="ingenieur">Ingenieur</option>
          </select><br>
      
      
      <label for="password">Password</label><br>
      <input type="password" name = "password" value="<?php echo $row['password']; ?>"><br>
      <label for="confirmPassword">Confirm your password</label><br>
      <input type="password" name= "confirmPassword" value="<?php echo $row['password']; ?>"><br>

    </tr>
    <?php }?>
    <?php
    } else {
      //echo "0 results";
    }
    $conn->close();
    ?>
    <!--Register Form-->
    
        
    
        <input type="submit" value = "Aktualisieren" name="submit" class="register">
        <a href="admin.php" class="back">zurück</a>
        

    </form>
</body>
</html>