<?php
/* Attempt MySQL server connection. */
$link = mysqli_connect("localhost", "elder", "ElPatoFeo99", "listings");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt create table query execution
$sql = "CREATE TABLE properties (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    ess_prop_type VARCHAR(50) NOT NULL , 
    ess_prop_subtype VARCHAR(50) NOT NULL , 
    ess_prop_style VARCHAR(50) NOT NULL , 
    loc_address VARCHAR(150) NOT NULL , 
    loc_street VARCHAR(50) NOT NULL , 
    loc_apart_no VARCHAR(20) NOT NULL , 
    loc_city VARCHAR(50) NOT NULL , 
    loc_state VARCHAR(50) NOT NULL , 
    loc_zip VARCHAR(50) NOT NULL , 
    list_info_office VARCHAR(75) NOT NULL , 
    list_info_start VARCHAR(75)NOT NULL , 
    list_info_exp VARCHAR(75)NOT NULL , 
    list_info_price VARCHAR(50) NOT NULL , 
    list_info_freq VARCHAR(20) NOT NULL , 
    prop_info_beds VARCHAR(20) NOT NULL , 
    prop_info_baths VARCHAR(20) NOT NULL , 
    prop_info_sq_ft VARCHAR(20) NOT NULL , 
    prop_info_serv_type VARCHAR(50) NOT NULL , 
    prop_info_com_name VARCHAR(150) NOT NULL , 
    remarks_desc VARCHAR(650) NOT NULL , 
    remarks_imgs VARCHAR(150), 
    agent VARCHAR(20)  NOT NULL DEFAULT '0',
    published VARCHAR(10)  NOT NULL DEFAULT '0',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
  )";
if(mysqli_query($link, $sql)){
    echo "properties table created successfully.\n\n";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

?>
