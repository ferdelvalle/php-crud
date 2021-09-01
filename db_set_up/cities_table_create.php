<?php
/* Attempt MySQL server connection. */
$link = mysqli_connect("localhost", "elder", "ElPatoFeo99", "listings");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create table query execution
$sql = "CREATE TABLE cities (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  city VARCHAR(50),
  state VARCHAR(50)
)";
if(mysqli_query($link, $sql)){
    echo "cities table created successfully.\n\n";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
