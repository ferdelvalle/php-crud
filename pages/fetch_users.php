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

    <div class="wrapper" id="dashboard-wrapper">
        <div class="container-fluid">
            <div>
                <div class="col-lg-12">                    
                  <div class="page-header clearfix">
                    <form method="GET">
                            <label for="transaction">Agents</label>
                            <select class="form-control" name="agent" id="agent">
                              <?php 
                                  require_once("../pages/includes/include_fetch_agents.php");
                                  agents_options ($users_arr);
                              ?>
                            </select>
                      </form>
                    </div>
                    <?php
                    // Fetch a dropdown of all real state agents

                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>