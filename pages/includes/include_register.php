<?php
// Include config file
require_once("../pages/includes/config.php");

 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $name = $lastname = $role = "";
$username_err = $password_err = $confirm_password_err = $name_err = $lastname_err = $role_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "User already exists";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Something went wrong, please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate name
    if(empty(trim($_POST["name"]))){
        $name_err = "Input a name.";     
    } else{
        $name = trim($_POST["name"]);
    }

    // Validate lastname
    if(empty(trim($_POST["lastname"]))){
        $lastname_err = "Input a lastname.";     
    } else{
        $lastname = trim($_POST["lastname"]);
    }

    // Validate role
    if(empty(trim($_POST["role"]))){
        $role_err = "Select a role";     
    } else{
        $role = trim($_POST["role"]);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Input a password.";     
    } elseif(strlen(trim($_POST["password"])) < 8){
        $password_err = "Passwords must be at least 8 characters long";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Confirm the password";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Passwords don't match";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($name_err) && empty($lastname_err) && empty($role_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, name, lastname, role,  password) VALUES (?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_name, $param_lastname, $param_role, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_name = $name;
            $param_lastname = $lastname;
            $param_role = $role;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: ../pages/manage-users.php");
            } else{
                echo "Something went wrong, please try again later";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
