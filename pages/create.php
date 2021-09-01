<?php
    // Include DB config and CRUD
    require_once("../pages/includes/include_create.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Listing</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="wrapper">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- 1 ESSENTIALS -->
            <h3>Essentials</h3>
            <br><br>
            <div class="filter-container-3">
                <div class="form-group <?php echo (!empty($ess_prop_type_err)) ? 'has-error' : ''; ?>">
                    <label>Property Type</label>
                    <input type="text" name="ess_prop_type" class="form-control" value="<?php echo $ess_prop_type; ?>">
                    <span class="help-block"><?php echo $ess_prop_type_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($ess_prop_subtype_err)) ? 'has-error' : ''; ?>">
                    <label for="ess_prop_subtype">Property Sub-Type</label>
                    <select class="form-control" name="ess_prop_subtype" id="ess_prop_subtype">
                        <option value="0">Select</option>
                        <option value="apartment">Apartment</option>
                        <option value="villa">Villa</option>
                        <option value="townhome">TownHome</option>
                    </select>
                    <span class="help-block"><?php echo $ess_prop_subtype_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($ess_prop_style_err)) ? 'has-error' : ''; ?>">
                    <label for="ess_prop_style">Property Style</label>
                    <select class="form-control" name="ess_prop_style" id="ess_prop_style">
                        <option value= "0">Select</option>
                        <option value="colonial">Colonial</option>
                        <option value="modern">Modern</option>
                        <option value="santa_fe">Santa Fe</option>
                    </select>
                    <span class="help-block"><?php echo $ess_prop_style_err; ?></span>
                </div>
            </div>

            <!-- 2 LOCATION -->
            <h3>Location</h3>
            <br><br>
            <div class="filter-container-3">
                <div class="form-group <?php echo (!empty($loc_address_err)) ? 'has-error' : ''; ?>">
                    <label>Address</label>
                    <input type="text" name="loc_address" class="form-control" value="<?php echo $loc_address; ?>">
                    <span class="help-block"><?php echo $loc_address_err;?></span>
                </div>
                <div class="form-group <?php echo (!empty($loc_street_err)) ? 'has-error' : ''; ?>">
                    <label>Street</label>
                    <input type="text" name="loc_street" class="form-control" value="<?php echo $loc_street; ?>">
                    <span class="help-block"><?php echo $loc_street_err;?></span>
                </div>
                <div class="form-group <?php echo (!empty($loc_apart_no_err)) ? 'has-error' : ''; ?>">
                    <label>Appartment Number</label>
                    <input type="text" name="loc_apart_no" class="form-control" value="<?php echo $loc_apart_no; ?>">
                    <span class="help-block"><?php echo $loc_apart_no_err;?></span>
                </div>
            </div>
            <div class="filter-container-3">
                <div class="form-group <?php echo (!empty($loc_city_err)) ? 'has-error' : ''; ?>">
                    <label for="loc_city">City</label>
                    <select class="form-control" name="loc_city" id="loc_city">
                        <option value= "0">Select</option>
                        <option value="Seattle">Seattle</option>
                    </select>
                    <span class="help-block"><?php echo $loc_city_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($loc_state_err)) ? 'has-error' : ''; ?>">
                    <label for="loc_state">State</label>
                    <select class="form-control" name="loc_state" id="loc_state">
                        <option value= "0">Select</option>
                        <option value="Washington">Washington</option>
                    </select>
                    <span class="help-block"><?php echo $loc_state_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($loc_zip_err)) ? 'has-error' : ''; ?>">
                    <label>Zip Code</label>
                    <input type="text" name="loc_zip" class="form-control" value="<?php echo $loc_zip; ?>">
                    <span class="help-block"><?php echo $loc_zip_err;?></span>
                </div>
            </div>
            <!-- LISTING INFORMATION -->
            <h3>Listing Information</h3>
            <br><br>
            <div class="form-group <?php echo (!empty($list_info_office_err)) ? 'has-error' : ''; ?>">
                <label for="list_info_office">Listing Office</label>
                <select class="form-control" name="list_info_office" id="list_info_office">
                    <option value= "0">Select</option>
                    <option value="sales_office">Retired Community Sales Office</option>
                    <option value="C21">C21 Address</option>
                </select>
                <span class="help-block"><?php echo $list_info_office_err; ?></span>
            </div>
            <div class="filter-container-4">
                <div class="form-group <?php echo (!empty($list_info_start_err)) ? 'has-error' : ''; ?>">
                    <label>List Day</label>
                    <input type="date" name="list_info_start" class="form-control" value="<?php echo $list_info_start; ?>">
                    <span class="help-block"><?php echo $list_info_start_err;?></span>
                </div>
                <div class="form-group <?php echo (!empty($list_info_exp_err)) ? 'has-error' : ''; ?>">
                    <label>Expires on</label>
                    <input type="date" name="list_info_exp" class="form-control" value="<?php echo $list_info_exp; ?>">
                    <span class="help-block"><?php echo $list_info_exp_err;?></span>
                </div>
            </div>
            <div class="filter-container-4">
                <div class="form-group <?php echo (!empty($list_info_price_err)) ? 'has-error' : ''; ?>">
                    <label>List Price</label>
                    <input type="text" name="list_info_price" class="form-control" value="<?php echo $list_info_price; ?>">
                    <span class="help-block"><?php echo $list_info_price_err;?></span>
                </div>
                <div class="form-group <?php echo (!empty($list_info_freq_err)) ? 'has-error' : ''; ?>">
                    <label for="list_info_freq">Frequency</label>
                    <select class="form-control" name="list_info_freq" id="list_info_freq">
                        <option value= "0">Select</option>
                        <option value="monthly">Monthly</option>
                    </select>
                    <span class="help-block"><?php echo $list_info_freq_err; ?></span>
                </div>
            </div>
            <!-- PROPERTY INFORMATION --> 
            <h3>Property Information</h3>
            <br><br>
            <div class="filter-container-3">
                <div class="form-group <?php echo (!empty($prop_info_beds_err)) ? 'has-error' : ''; ?>">
                    <label for="prop_info_beds">Bedrooms</label>
                    <select class="form-control" name="prop_info_beds" id="prop_info_beds">
                        <option value= "0">Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <span class="help-block"><?php echo $prop_info_beds_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($prop_info_baths_err)) ? 'has-error' : ''; ?>">
                    <label for="prop_info_baths">Bathrooms</label>
                    <select class="form-control" name="prop_info_baths" id="prop_info_baths">
                        <option value= "0">Select</option>
                        <option value="1">1</option>
                        <option value="1.5">1 1/2</option>
                        <option value="2">2</option>
                        <option value="2.5">2 1/2</option>
                        <option value="3">3</option>
                        <option value="3.5">3 1/2</option>
                    </select>
                    <span class="help-block"><?php echo $prop_info_baths_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($prop_info_sq_ft_err)) ? 'has-error' : ''; ?>">
                    <label>Square Footage</label>
                    <input type="text" name="prop_info_sq_ft" class="form-control" value="<?php echo $prop_info_sq_ft; ?>">
                    <span class="help-block"><?php echo $prop_info_sq_ft_err;?></span>
                </div>
            </div>
            <div class="filter-container-4">
                <div class="form-group <?php echo (!empty($prop_info_serv_type_err)) ? 'has-error' : ''; ?>">
                    <label for="prop_info_serv_type">Service Type</label>
                    <select class="form-control" name="prop_info_serv_type" id="prop_info_serv_type">
                        <option value= "0">Select</option>
                        <option value="independent">Independent</option>
                        <option value="assisted">Assisted</option>
                        <option value="memory">Memory Care</option>
                    </select>
                    <span class="help-block"><?php echo $prop_info_serv_type_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($prop_info_com_name_err)) ? 'has-error' : ''; ?>">
                    <label>Community Name</label>
                    <input type="text" name="prop_info_com_name" class="form-control" value="<?php echo $prop_info_com_name; ?>">
                    <span class="help-block"><?php echo $prop_info_com_name_err;?></span>
                </div>
            </div>
            <!-- REMARKS -->
            <h3>Remarks</h3>
            <br><br>
            <div class="form-group <?php echo (!empty($remarks_desc_err)) ? 'has-error' : ''; ?>">
                <label>Property Description</label>
                <textarea rows="8" name="remarks_desc" class="form-control" value="<?php echo $remarks_desc; ?>"></textarea>
                <span class="help-block"><?php echo $remarks_desc_err;?></span>
            </div>
            <!-- UPLOAD PHOTOS -->
            <h3>Property Photos</h3>
            <div class="form-group center-photos <?php echo (!empty($remarks_imgs_err)) ? 'has-error' : ''; ?>">
                <label for="remarks_imgs">Select Photos</label>
                <input style="padding-left: 80px;" type="file" id="remarks_imgs" name="remarks_imgs" multiple>
                <span class="help-block"><?php echo $remarks_imgs_err;?></span>
            </div>
            <br><br>
            <input type="submit" class="btn btn-primary" value="Upload Listing">
            <a href="../pages/dashboard.php" class="btn btn-default">Cancel</a>
        </form>
    </div>
</body>
</html>