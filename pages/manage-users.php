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
    <title>Manage Users</title>
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
                                <a href="register.php" class="btn btn-success pull-right">Add New User</a>
                                </div>
                                <div class="filter-column-2 form-group">
                                    <label for="transaction">Role</label>
                                    <select class="form-control" name="role" id="role">
                                        <option value="all">All</option>
                                        <option value="agent">Real State Agent</option>
                                        <option value="manager">Community Manager</option>
                                        <option value="admin">Site Administrator</option>
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
                    require_once("../pages/includes/include_manage_users.php");
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>