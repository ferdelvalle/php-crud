<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../pages/login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    <style>

    </style>
</head>
<body>
    <div class="page-header">
        <h1><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>
        <p>
        <a href="../pages/sales-referals.php" class="btn btn-default">Sales Referals</a>
        <a href="../pages/dashboard.php" class="btn btn-default">Properties</a>
        <a href="../pages/manage-users.php" class="btn btn-default">Manage Users</a>
        <a href="../pages/reset-password.php" class="btn btn-warning">Change Password</a>
        <a href="../pages/logout.php" class="btn btn-danger">Exit</a>
        </p>
    </div>

    <div class="wrapper" id="dashboard-wrapper">
        <div class="container-fluid">
            <div>
                <div class="col-lg-12">
                    <div class="page-header clearfix">
                            <form method="GET">

                            <div class="filter-container-2">

                                <div class="filter-column form_group">
                                <a href="create.php" class="btn btn-success pull-right">Add New Listing</a>
                                </div>

                                <div class="filter-column-2 form-group">
                                    <label for="transaction">Transaction</label>
                                    <select class="form-control" name="transaction" id="transaction">
                                        <option value="all">All</option>
                                        <option value="rent">Rent</option>
                                        <option value="sale">Sale</option>
                                        <option value="unavailable">Unavailable</option>
                                    </select>
                                </div>
                                <div class="filter-column-2 form-group">
                                    <label for="transaction">Property</label>
                                    <select class="form-control" name="transaction" id="transaction">
                                        <option value="all">Apartment</option>
                                        <option value="rent">Town House</option>
                                        <option value="sale">House</option>
                                        <option value="unavailable">Duplex</option>
                                    </select>
                                </div>       
                                <div class="filter-column-2 form-group">    
                                    <label for="transaction">Type of Care</label>
                                    <select class="form-control" name="transaction" id="transaction">
                                        <option value="all">All</option>
                                        <option value="assisted">Assisted Living</option>
                                        <option value="continuing">Continuing Care</option>
                                        <option value="independent">Independent Living</option>
                                        <option value="memory">Memory Care</option>
                                    </select>
                                </div>
                                <div class="filter-column-2 form-group">    
                                    <label for="transaction">Budget</label>
                                    <select class="form-control" name="transaction" id="transaction">
                                        <option value="all">All</option>
                                        <option value="low">Accessible</option>
                                        <option value="average">Average</option>
                                        <option value="high">High Level</option>
                                        <option value="premium">Premium</option>
                                    </select>
                                </div>
                                <div class="filter-column-2 form-group">    
                                    <label for="transaction">City</label>
                                    <select class="form-control" name="transaction" id="transaction">
                                        <option value="all">All</option>
                                        <option value="seattle">Seattle</option>
                                    </select>
                                </div>

                                <div class="filter-column-2 form-group">    
                                    <label for="transaction">Agent</label>
                                    <select class="form-control" name="transaction" id="transaction">
                                        <option value="all">All</option>
                                        <option value="seattle">John Doe</option>
                                        <option value="seattle">Jane Doe</option>
                                    </select>
                                </div>

                                <div class="filter-column-2 form_group">
                                <input type="submit" class="btn btn-primary" value="Search"> 
                                </div>                                
                            </div>
                        </form>

                    </div>
                    <?php
                    // Include DB config and CRUD
                    require_once("../pages/includes/include_dashboard.php");
                    ?>
                </div>
                <a href="create.php" class="btn btn-info">Export Data</a>
            </div>        
        </div>
    </div>
</body>
</html>