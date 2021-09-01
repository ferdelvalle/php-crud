<?php
    // Include DB config and CRUD
    require_once("../pages/includes/include_assign_agent.php");
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assign Property</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Assign Property</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                        <div class="form-group <?php echo (!empty($agent_err)) ? 'has-error' : ''; ?>">
                            <label for="agent">Assign Agent</label>
                            <select class="form-control" name="agent" id="agent">
                                <?php 
                                    agents_options ($users_arr);
                                ?>
                            </select>
                            <span class="help-block"><?php echo $agent_err; ?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($published_err)) ? 'has-error' : ''; ?>">
                            <label for="published">Publish</label>
                            <select class="form-control" name="published" id="published">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                            <span class="help-block"><?php echo $published_err; ?></span>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Edit">
                        <a href="../pages/dashboard.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>