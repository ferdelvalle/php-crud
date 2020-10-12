<?php
/* Attempt MySQL server connection. */
$link = mysqli_connect("localhost", "root", "hirefer", "store");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create table query execution
$sql = "CREATE TABLE products (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  product_number VARCHAR(100),
  sku VARCHAR(100),
  meta_type VARCHAR(100) ,
  categories VARCHAR(100),
  post_title VARCHAR(100),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)";
if(mysqli_query($link, $sql)){
    echo "Products table created successfully.\n\n";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

