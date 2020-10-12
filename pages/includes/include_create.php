<?php
require_once("../pages/includes/config.php");
// Define variables and initialize
$product_number = $sku = $meta_type = $categories = $post_title = "";
$product_number_err = $sku_err = $meta_type_err = $categories_err = $post_title_err = "";
 
// Processing form data
if($_SERVER["REQUEST_METHOD"] == "POST"){
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
        // Prepare an insert statement
        $sql = "INSERT INTO products (product_number, sku, meta_type, categories, post_title) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_product_number, $param_sku, $param_meta_type, $param_categories, $param_post_title);
            
            // Set parameters
            $param_product_number = $product_number;
            $param_sku = $sku;
            $param_meta_type = $meta_type;
            $param_categories = $categories;
            $param_post_title = $post_title;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
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
}