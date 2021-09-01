<?php
// Include DB config and CRUD
    require_once("../pages/includes/include_read.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalles de producto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/style.css">
</head> 
<body>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Property Details</h1>
                    </div>
                </div>
            </div>        
        </div>
    </div>

<div class="wrapper">

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <!-- 1 ESSENTIALS -->
    <h3>Essentials</h3>
    <br><br>
    <div class="filter-container-3">
        <div class="form-group">
            <label>Property Type</label>
            <p class="form-control-static"><?php echo $row["ess_prop_type"]; ?></p>
        </div>
        <div class="form-group">
            <label for="ess_prop_subtype">Property Sub-Type</label>
            <p class="form-control-static"><?php echo $row["ess_prop_subtype"]; ?></p>
        </div>
        <div class="form-group">
            <label for="ess_prop_style">Property Style</label>
            <p class="form-control-static"><?php echo $row["ess_prop_style"]; ?></p>
        </div>
    </div>

    <!-- 2 LOCATION -->
    <h3>Location</h3>
    <br><br>
    <div class="filter-container-3">
        <div class="form-group">
            <label>Address</label>
            <p class="form-control-static"><?php echo $row["loc_address"]; ?></p>
        </div>
        <div class="form-group">
            <label>Street</label>
            <p class="form-control-static"><?php echo $row["loc_street"]; ?></p>
        </div>
        <div class="form-group">
            <label>Appartment Number</label>
            <p class="form-control-static"><?php echo $row["loc_apart_no"]; ?></p>
        </div>
    </div>
    <div class="filter-container-3">
        <div class="form-group">
            <label for="loc_city">City</label>
            <p class="form-control-static"><?php echo $row["loc_city"]; ?></p>
        </div>
        <div class="form-group">
            <label for="loc_state">State</label>
            <p class="form-control-static"><?php echo $row["loc_state"]; ?></p>
        </div>
        <div class="form-group">
            <label>Zip Code</label>
            <p class="form-control-static"><?php echo $row["loc_zip"]; ?></p>
        </div>
    </div>
    <!-- LISTING INFORMATION -->
    <h3>Listing Information</h3>
    <br><br>
    <div class="form-group">
        <label for="list_info_office">Listing Office</label>
        <p class="form-control-static"><?php echo $row["list_info_office"]; ?></p>
    </div>
    <div class="filter-container-4">
        <div class="form-group">
            <label>List Day</label>
            <p class="form-control-static"><?php echo $row["list_info_start"]; ?></p>
        </div>
        <div class="form-group">
            <label>Expires on</label>
            <p class="form-control-static"><?php echo $row["list_info_exp"]; ?></p>
        </div>
    </div>
    <div class="filter-container-4">
        <div class="form-group">
            <label>List Price</label>
            <p class="form-control-static"><?php echo $row["list_info_price"]; ?></p>
        </div>
        <div class="form-group">
            <label for="list_info_freq">Frequency</label>
            <p class="form-control-static"><?php echo $row["list_info_freq"]; ?></p>
        </div>
    </div>
    <!-- PROPERTY INFORMATION --> 
    <h3>Property Information</h3>
    <br><br>
    <div class="filter-container-3">
        <div class="form-group">
            <label for="prop_info_beds">Bedrooms</label>
            <p class="form-control-static"><?php echo $row["prop_info_beds"]; ?></p>
        </div>
        <div class="form-group">
            <label for="prop_info_baths">Bathrooms</label>
            <p class="form-control-static"><?php echo $row["prop_info_baths"]; ?></p>
        </div>
        <div class="form-group">
            <label>Square Footage</label>
            <p class="form-control-static"><?php echo $row["prop_info_sq_ft"]; ?></p>
        </div>
    </div>
    <div class="filter-container-4">
        <div class="form-group">
            <label for="prop_info_serv_type">Service Type</label>
            <p class="form-control-static"><?php echo $row["prop_info_serv_type"]; ?></p>
        </div>
        <div class="form-group">
            <label>Community Name</label>
            <p class="form-control-static"><?php echo $row["prop_info_com_name"]; ?></p>
        </div>
    </div>
    <!-- REMARKS -->
    <h3>Remarks</h3>
    <br><br>
    <div class="form-group">
        <label>Property Description</label>
        <p class="form-control-static"><?php echo $row["remarks_desc"]; ?></p>
    </div>
    <!-- UPLOAD PHOTOS -->
    <h3>Property Photos</h3>
    <!--
    <div class="form-group center-photos">
        <label for="remarks_imgs">Select Photos</label>
        <input style="padding-left: 80px;" type="file" id="remarks_imgs" name="remarks_imgs" multiple>
        <span class="help-block"><?php echo $remarks_imgs_err;?></span>
    </div>
    -->
</form>
</div>

<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <p><a href="../pages/dashboard.php" class="btn btn-primary">Return</a></p>
            </div>
        </div>        
    </div>
</div>
</body>
</html>