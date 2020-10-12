<?php
    // Include DB config and CRUD
    require_once("../pages/includes/include_update.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Editar producto</h2>
                    </div>
                    <p>Por favor, ingresa la nueva información del producto.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        
                        <div class="form-group <?php echo (!empty($product_number_err)) ? 'has-error' : ''; ?>">
                            <label>#</label>
                            <input type="text" name="product_number" class="form-control" value="<?php echo $product_number; ?>">
                            <span class="help-block"><?php echo $product_number_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($sku_err)) ? 'has-error' : ''; ?>">
                            <label>SKU</label>
                            <input type="text" name="sku" class="form-control" value="<?php echo $sku; ?>">
                            <span class="help-block"><?php echo $sku_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($meta_type_err)) ? 'has-error' : ''; ?>">
                            <label>Tipo</label>
                            <input type="text" name="meta_type" class="form-control" value="<?php echo $meta_type; ?>">
                            <span class="help-block"><?php echo $meta_type_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($categories_err)) ? 'has-error' : ''; ?>">
                            <label>Categorías</label>
                            <input type="text" name="categories" class="form-control" value="<?php echo $categories; ?>">
                            <span class="help-block"><?php echo $categories_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($post_title_err)) ? 'has-error' : ''; ?>">
                            <label>Título</label>
                            <input type="text" name="post_title" class="form-control" value="<?php echo $post_title; ?>">
                            <span class="help-block"><?php echo $post_title_err;?></span>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Editar">
                        <a href="../pages/dashboard.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>