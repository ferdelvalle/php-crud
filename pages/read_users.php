<?php
// Include DB config and CRUD
    require_once("../pages/includes/include_read_users.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>User Details</h1>
                    </div>
                    <div class="form-group">
                        <label>User ID</label>
                        <p class="form-control-static"><?php echo $row["id"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>User</label>
                        <p class="form-control-static"><?php echo $row["username"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $row["name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <p class="form-control-static"><?php echo $row["lastname"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <p class="form-control-static"><?php echo $row["role"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Registration date</label>
                        <p class="form-control-static"><?php echo $row["created_at"]; ?></p>
                    </div>
                    <p><a href="../pages/manage-users.php" class="btn btn-primary">Return</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>