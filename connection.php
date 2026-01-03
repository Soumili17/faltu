<?php
$servername = "localhost"; // bydefault port 3306
$username = "root";  
$password = "";     
$dbname = "school"; // databasename

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error)
 {
    die("Connection failed: " . $conn->connect_error);
}
else
{
  //echo "Connection establish";
}
?>