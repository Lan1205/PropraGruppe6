<?php
    
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
    
    $sql = "SELECT position from user where Email = $user and pass = $pass";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        // echo "userID: " . $row["userID"]. " - Name: " . $row["firstName"]. " " . $row["lastName"]. "<br>";
        // echo '<br>';
        // echo $row["userID"];
        $pos = $row['position'];
        echo $pos;
        
      }
    } else {
      echo "0 results";
    }
    $conn->close();
    echo "<br>";

    
    ?>