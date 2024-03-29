<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once("../pages/includes/config.php");
    
    // Prepare a select statement
    $sql = "SELECT * FROM properties WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $ess_prop_type = $row["ess_prop_type"]; 
                $ess_prop_style = $row["ess_prop_style"];
                $ess_prop_subtype = $row["ess_prop_subtype"]; 
                $loc_address = $row["loc_address"]; 
                $loc_street = $row["loc_street"];
                $loc_apart_no = $row["loc_apart_no"];
                $loc_city = $row["loc_city"];
                $loc_state = $row["loc_state"];
                $loc_zip = $row["loc_zip"];
                $list_info_office = $row["list_info_office"];
                $list_info_start = $row["list_info_start"];
                $list_info_exp = $row["list_info_exp"];
                $list_info_price = $row["list_info_price"];
                $list_info_freq = $row["list_info_freq"];
                $prop_info_beds = $row["prop_info_beds"];
                $prop_info_baths = $row["prop_info_baths"];
                $prop_info_sq_ft = $row["prop_info_sq_ft"];
                $prop_info_serv_type = $row["prop_info_serv_type"];
                $prop_info_com_name = $row["prop_info_com_name"];
                $remarks_desc_err = $row["remarks_desc"];
 
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: ../pages/error.php");
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
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: ../pages/error.php");
    exit();
}