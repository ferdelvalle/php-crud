<?php
// Include config file
require_once("../pages/includes/config.php");

 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $name = $lastname = $role = "";
$username_err = $password_err = $confirm_password_err = $name_err = $lastname_err = $role_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Input a new name";
    } else{
        $name = $input_name;
    }

    // Validate lastname
    $input_lastname = trim($_POST["lastname"]);
    if(empty($input_lastname)){
        $lastname_err = "Input a new last name";
    } else{
        $lastname = $input_lastname;
    }

      // Validate role
      $input_role = trim($_POST["role"]);
      if(empty($input_role)){
          $role_err = "Select a new role";
      } else{
          $role = $input_role;
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
        // Prepare an update statement
        $sql = "UPDATE products SET product_number=?, sku=?, meta_type=?, categories=?, post_title=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssi", $param_product_number, $param_sku, $param_meta_type, $param_categories, $param_post_title, $param_id);
            
            // Set parameters
            $param_product_number = $product_number;
            $param_sku = $sku;
            $param_meta_type = $meta_type;
            $param_categories = $categories;
            $param_post_title = $post_title;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: ../pages/dashboard.php");
                exit();
            } else{
                echo "Something went wrong, please try again later";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM products WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $product_number = $row["product_number"];
                    $sku = $row["sku"];
                    $meta_type =$row["meta_type"];
                    $categories = $row["categories"];
                    $post_title = $row["post_title"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Something went wrong, please try again later";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}