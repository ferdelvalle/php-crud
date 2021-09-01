<?php
/* Attempt MySQL server connection. */
$link = mysqli_connect("localhost", "elder", "ElPatoFeo99", "listings");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create table query execution
$sql = "CREATE TABLE sales_referals (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  own_info_first_name VARCHAR(50) NOT NULL, 
  own_info_last_name VARCHAR(50) NOT NULL, 
  own_info_phone INT(10) NOT NULL, 
  own_info_email VARCHAR(50) NOT NULL, 
  home_info_street VARCHAR(50) NOT NULL, 
  home_info_city VARCHAR(50) NOT NULL, 
  home_info_state VARCHAR(50) NOT NULL, 
  home_info_zip INT(10) NOT NULL,
  agent INT(10)   NOT NULL DEFAULT '0',
  published INT(10)  NOT NULL DEFAULT '0',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)";
if(mysqli_query($link, $sql)){
    echo "sales_referals table created successfully.\n\n";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

?>
