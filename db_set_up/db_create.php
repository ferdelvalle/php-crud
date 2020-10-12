<?php

//crear base de datos 

/* Attempt MySQL server connection. */
$link = mysqli_connect("localhost", "root", "hirefer");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create database query execution
$sql = "CREATE DATABASE store";
if(mysqli_query($link, $sql)){
    echo "store database created successfully.\n\n";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);