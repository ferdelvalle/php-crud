<?php
/* Database credentials */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'elder');
define('DB_PASSWORD', 'ElPatoFeo99');
define('DB_NAME', 'listings');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: No se ha podido establecer la conexión. " . mysqli_connect_error());
}
