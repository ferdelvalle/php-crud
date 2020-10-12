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
    <title>Inventario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="page-header">
        <h1>Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenid@.</h1>
        <p>
        <a href="../pages/reset-password.php" class="btn btn-warning">Cambiar Contraseña</a>
        <a href="../pages/logout.php" class="btn btn-danger">Salir</a>
        </p>
    </div>

    <div class="wrapper" id="dashboard-wrapper">
        <div class="container-fluid">
            <div>
                <div class="col-lg-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Productos</h2>
                        <a href="create.php" class="btn btn-success pull-right">Agregar nuevo producto</a>
                    </div>
                    <?php
                    // Include DB config and CRUD
                    require_once("../pages/includes/include_dashboard.php");
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>