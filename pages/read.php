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
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>#</label>
                        <p class="form-control-static"><?php echo $row["product_number"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>SKU</label>
                        <p class="form-control-static"><?php echo $row["sku"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Tipo</label>
                        <p class="form-control-static"><?php echo $row["meta_type"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Categorías</label>
                        <p class="form-control-static"><?php echo $row["categories"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Título</label>
                        <p class="form-control-static"><?php echo $row["post_title"]; ?></p>
                    </div>
                    <p><a href="../dashboard.php" class="btn btn-primary">Regresar</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>