<?php
// Include config file
require_once("../pages/includes/config.php");

 
// Define variables and initialize with empty values
$ess_prop_type = 
$ess_prop_style =
$ess_prop_subtype = 
$loc_address = 
$loc_street =
$loc_apart_no =
$loc_city =
$loc_state =
$loc_zip =
$list_info_office =
$list_info_start =
$list_info_exp =
$list_info_price =
$list_info_freq =
$prop_info_beds =
$prop_info_baths =
$prop_info_sq_ft =
$prop_info_serv_type =
$prop_info_com_name =
$remarks_desc_err = "";



$ess_prop_type_err = 
$ess_prop_style_err =
$ess_prop_subtype_err = 
$loc_address_err =
$loc_street_err =
$loc_apart_no_err =
$loc_city_err =
$loc_state_err =
$loc_zip_err =
$list_info_office_err =
$list_info_start_err =
$list_info_exp_err =
$list_info_price_err =
$list_info_freq_err =
$prop_info_beds_err =
$prop_info_baths_err =
$prop_info_sq_ft_err =
$prop_info_serv_type_err =
$prop_info_com_name_err =
$remarks_desc_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate ess_prop_type
    if(empty(trim($_POST["ess_prop_type"]))){
        $ess_prop_type_err = "Enter a Property Type.";
    } else{
        $ess_prop_type = trim($_POST["ess_prop_type"]);
    }
    
    // Validate ess_prop_subtype
    if(empty(trim($_POST["ess_prop_subtype"]))){
        $ess_prop_subtype_err = "Select a Property Sub-Type";     
    } else{
        $ess_prop_subtype = trim($_POST["ess_prop_subtype"]);
    }

    // Validate ess_prop_style
    if(empty(trim($_POST["ess_prop_style"]))){
        $ess_prop_style_err = "Select a Property Style";     
    } else{
        $ess_prop_style = trim($_POST["ess_prop_style"]);
    }

    // Validate loc_address
    if(empty(trim($_POST["loc_address"]))){
        $loc_address_err = "Enter a Property Address.";
    } else{
        $loc_address = trim($_POST["loc_address"]);
    }
    
    // Validate loc_street
    if(empty(trim($_POST["loc_street"]))){
        $loc_street_err = "Enter a Street.";
    } else{
        $loc_street = trim($_POST["loc_street"]);
    }

    // Validate loc_apart_no
    if(empty(trim($_POST["loc_apart_no"]))){
        $loc_apart_no_err = "Enter an Appartment Number.";
    } else{
        $loc_apart_no = trim($_POST["loc_apart_no"]);
    }

    // Validate loc_city
    if(empty(trim($_POST["loc_city"]))){
        $loc_city_err = "Select a city.";
    } else{
        $loc_city = trim($_POST["loc_city"]);
    }

    // Validate loc_state
    if(empty(trim($_POST["loc_state"]))){
        $loc_state_err = "Select a State.";
    } else{
        $loc_state = trim($_POST["loc_state"]);
    }

    // Validate loc_zip
    if(empty(trim($_POST["loc_zip"]))){
        $loc_zip_err = "Enter a Zip Code.";
    } else{
        $loc_zip = trim($_POST["loc_zip"]);
        $loc_zip += 0;
    }

    // Validate list_info_office
    if(empty(trim($_POST["list_info_office"]))){
        $list_info_office_err = "Select a Listing Office.";
    } else{
        $list_info_office = trim($_POST["list_info_office"]);
    }

    // Validate list_info_start
    if(empty(trim($_POST["list_info_start"]))){
        $list_info_start_err = "Select a start date.";
    } else{
        $list_info_start = trim($_POST["list_info_start"]);
    }

    // Validate list_info_exp
    if(empty(trim($_POST["list_info_exp"]))){
        $list_info_exp_err = "Select an expiration date.";
    } else{
        $list_info_exp = trim($_POST["list_info_exp"]);
    }

    // Validate list_info_price
    if(empty(trim($_POST["list_info_price"]))){
        $list_info_price_err = "Enter a Price.";
    } else{
        $list_info_price = trim($_POST["list_info_price"]);
        $list_info_price += 0;
    }

    // Validate list_info_freq
    if(empty(trim($_POST["list_info_freq"]))){
        $list_info_freq_err = "Select a frequency.";
    } else{
        $list_info_freq = trim($_POST["list_info_freq"]);
    }

    // Validate prop_info_beds
    if(empty(trim($_POST["prop_info_beds"]))){
        $prop_info_beds_err = "Select a number of beds.";
    } else{
        $prop_info_beds = trim($_POST["prop_info_beds"]);
        $prop_info_beds += 0;
    }

    // Validate prop_info_baths
    if(empty(trim($_POST["prop_info_baths"]))){
        $prop_info_baths_err = "Select a number of baths.";
    } else{
        $prop_info_baths = trim($_POST["prop_info_baths"]);
        $prop_info_baths += 0;
    }

    // Validate prop_info_sq_ft
    if(empty(trim($_POST["prop_info_sq_ft"]))){
        $prop_info_sq_ft_err = "Enter Square Footage.";
    } else{
        $prop_info_sq_ft = trim($_POST["prop_info_sq_ft"]);
        $prop_info_sq_ft += 0;
    }

    // Validate prop_info_serv_type
    if(empty(trim($_POST["prop_info_serv_type"]))){
        $prop_info_serv_type_err = "Select a Service Type.";
    } else{
        $prop_info_serv_type = trim($_POST["prop_info_serv_type"]);
    }

    // Validate prop_info_com_name
    if(empty(trim($_POST["prop_info_com_name"]))){
        $prop_info_com_name_err = "enter a Property Name.";
    } else{
        $prop_info_com_name = trim($_POST["prop_info_com_name"]);
    }

    // Validate remarks_desc
    if(empty(trim($_POST["remarks_desc"]))){
        $remarks_desc_err = "enter a Property Name.";
    } else{
        $remarks_desc = trim($_POST["remarks_desc"]);
    }

    // Check input errors before inserting in database
    if(
        empty($ess_prop_type_err) && empty($ess_prop_style_err) && empty($ess_prop_subtype_err) && empty($loc_address_err) && empty($loc_street_err) && empty($loc_apart_no_err) && empty($loc_city_err) && empty($loc_state_err) && empty($loc_zip_err) && empty($list_info_office_err) && empty($list_info_start_err) && empty($list_info_exp_err) && empty($list_info_price_err) && empty($list_info_freq_err) && empty($prop_info_beds_err) && empty($prop_info_baths_err) && empty($prop_info_sq_ft_err) && empty($prop_info_serv_type_err) && empty($prop_info_com_name_err) && empty($remarks_desc_err) 
        ){
            // Prepare an insert statement
            $sql = "INSERT INTO properties (ess_prop_type, ess_prop_subtype, ess_prop_style, loc_address, loc_street, loc_apart_no, loc_city, loc_state, loc_zip, list_info_office, list_info_start, list_info_exp, list_info_price, list_info_freq, prop_info_beds, prop_info_baths, prop_info_sq_ft, prop_info_serv_type, prop_info_com_name, remarks_desc) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssssssssssssssssssss", $param_ess_prop_type, $param_ess_prop_subtype,$param_ess_prop_style,  $param_loc_address, $param_loc_street, $param_loc_apart_no, $param_loc_city, $param_loc_state, $param_loc_zip, $param_list_info_office, $param_list_info_start, $param_list_info_exp, $param_list_info_price, $param_list_info_freq, $param_prop_info_beds, $param_prop_info_baths, $param_prop_info_sq_ft, $param_prop_info_serv_type, $param_prop_info_com_name, $param_remarks_desc);
                
                // Set parameters
                $param_ess_prop_type = $ess_prop_type;
                $param_ess_prop_subtype = $ess_prop_subtype;  
                $param_ess_prop_style = $ess_prop_style; 
                $param_loc_address = $loc_address;  
                $param_loc_street = $loc_street; 
                $param_loc_apart_no = $loc_apart_no; 
                $param_loc_city = $loc_city; 
                $param_loc_state = $loc_state; 
                $param_loc_zip = $loc_zip; 
                $param_list_info_office = $list_info_office; 
                $param_list_info_start = $list_info_start; 
                $param_list_info_exp = $list_info_exp; 
                $param_list_info_price = $list_info_price; 
                $param_list_info_freq = $list_info_freq; 
                $param_prop_info_beds = $prop_info_beds; 
                $param_prop_info_baths = $prop_info_baths; 
                $param_prop_info_sq_ft = $prop_info_sq_ft; 
                $param_prop_info_serv_type = $prop_info_serv_type; 
                $param_prop_info_com_name = $prop_info_com_name; 
                $param_remarks_desc = $remarks_desc; 
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Redirect to dashboard page
                    header("location: ../pages/dashboard.php");
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
