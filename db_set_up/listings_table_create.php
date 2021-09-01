<?php
/* Attempt MySQL server connection. */
$link = mysqli_connect("localhost", "elder", "ElPatoFeo99", "listings");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create table query execution
$sql = "CREATE TABLE listings (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  availability VARCHAR(10),
  transaction VARCHAR(10),
  property VARCHAR(20),
  care VARCHAR(20),
  budget VARCHAR(20),
  city VARCHAR(50),
  state VARCHAR(50),
  agent INT(10),
  price VARCHAR(20),
  title VARCHAR(120),
  number VARCHAR(10),
  suite VARCHAR(20),
  street VARCHAR(50),
  zipcode VARCHAR(10),
  coordinates VARCHAR(50),	
  how_to_find VARCHAR(250),
  amenities VARCHAR(250),
  squareft VARCHAR(15),
  images VARCHAR(250),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)";
if(mysqli_query($link, $sql)){
    echo "listings table created successfully.\n\n";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
