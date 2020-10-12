<?php
// Include config file
require_once("../pages/includes/config.php");

 
// Define variables and initialize with empty values
$product_number = $sku = $meta_type = $categories = $post_title = "";
$product_number_err = $sku_err = $meta_type_err = $categories_err = $post_title_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate product_number
    $input_product_number = trim($_POST["product_number"]);
    if(empty($input_product_number)){
        $product_number_err = "Por favor, ingresa un número de producto.";
    } else{
        $product_number = $input_product_number;
    }

    // Validate product_number
    $input_product_number = trim($_POST["product_number"]);
    if(empty($input_product_number)){
        $product_number_err = "Por favor, ingresa un número de producto.";
    } else{
        $product_number = $input_product_number;
    }

    // Validate sku
    $input_sku = trim($_POST["sku"]);
    if(empty($input_sku)){
        $sku_err = "Por favor, ingresa un SKU.";
    } else{
        $sku = $input_sku;
    }

    // Validate meta_type
    $input_meta_type = trim($_POST["meta_type"]);
    if(empty($input_meta_type)){
        $meta_type_err = "Por favor, ingresa un tipo.";     
    } else{
        $meta_type = $input_meta_type;
    }

    // Validate categories
    $input_categories = trim($_POST["categories"]);
    if(empty($input_categories)){
        $categories_err = "Por favor, ingresa categorías.";     
    } else{
        $categories = $input_categories;
    }

    // Validate post_title
    $input_post_title = trim($_POST["post_title"]);
    if(empty($input_post_title)){
        $post_title_err = "Por favor, ingresa un título.";     
    } else{
        $post_title = $input_post_title;
    }
    
    // Check input errors before inserting in database
    if(empty($product_number_err) && empty($sku_err) && empty($meta_type_err) && empty($categories_err) && empty($post_title_err)){
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
                header("location: ../dashboard.php");
                exit();
            } else{
                echo "Algo salió mal. Por favor, inténtalo más tarde.";
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
                echo "Algo salió mal. Por favor, inténtalo más tarde.";
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