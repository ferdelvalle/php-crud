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
                    <a href="create.php" class="btn btn-success pull-right">Agregar nuevo producto</a>
                        <div class="pull-left">
                            <h2 >Productos</h2>
                            <h4>Puedes filtrar seleccionado un nivel y un subnivel al mismo tiempo.</h4>
                            <br><br>
                            <form method="GET">
                            
                                <div class="filter-container">
                                    <div class="filter-column form-group">
                                        <h4>Nivel</h4>
                                        <input type="radio" class="form-check-input" id="lvl-all" name="level" value="all">
                                        <label for="lvl-all">Todos</label><br>

                                        <input type="radio" class="form-check-input" id="a1" name="level" value="^(A1, )">
                                        <label for="a1">A1</label><br>

                                        <input type="radio" class="form-check-input" id="a2" name="level" value="^(A2, )">
                                        <label for="a2">A2</label><br>

                                        <input type="radio" class="form-check-input" id="b1" name="level" value="^(B1, )">
                                        <label for="b1">B1</label><br>

                                        <input type="radio" class="form-check-input" id="b1-plus" name="level" value="^(B1+, )">
                                        <label for="b1-plus">B1+</label><br>

                                        <input type="radio" class="form-check-input" id="b2" name="level" value="^(B2, )">
                                        <label for="b2">B2</label><br>

                                        <input type="radio" class="form-check-input" id="c1" name="level" value="^(C1, )">
                                        <label for="c1">C1</label><br>
                                    </div>
                                    <div class="filter-column form_group">
                                        <h4>Sub Nivel</h4>
                                        <input type="radio" class="form-check-input" id="slvl-all" name="slevel" value="all">
                                        <label for="slvl-all">Todos</label><br>

                                        <input type="radio" class="form-check-input" id="a" name="slevel" value="( A)$">
                                        <label for="a">A</label><br>

                                        <input type="radio" class="form-check-input" id="b" name="slevel" value="( B)$">
                                        <label for="b">B</label><br>
                                        <br>
                                        <br>
                                        <br>
                                        <input type="submit" class="btn btn-primary" value="filtrar"> 
                                    </div>
                                </div>
                            </form>
                        </div>
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