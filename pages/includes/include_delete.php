<?php
// Process delete operation after confirmation
if(isset($_POST["id"]) && !empty($_POST["id"])){
  // // Include DB config and CRUD
  require_once("../pages/includes/config.php");
  
  // Prepare a delete statement
  $sql = "DELETE FROM products WHERE id = ?";
  
  if($stmt = mysqli_prepare($link, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "i", $param_id);
      
      // Set parameters
      $param_id = trim($_POST["id"]);
      
      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
          // Records deleted successfully. Redirect to landing page
          header("location: ../dashboard.php");
          exit();
      } else{
          echo "Algo salió mal. Por favor, inténtalo más tarde.";
      }
  }
   
  // Close statement
  mysqli_stmt_close($stmt);
  
  // Close connection
  mysqli_close($link);
} else{
  // Check existence of id parameter
  if(empty(trim($_GET["id"]))){
      // URL doesn't contain id parameter. Redirect to error page
      header("location: error.php");
      exit();
  }
}