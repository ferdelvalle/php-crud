<?php
require_once("../pages/includes/config.php");
// Apply Filters

$rgex = ".*\..*";
                    
if($_SERVER["REQUEST_METHOD"] == "GET"){
    // Validate name
    $input_level = $_GET["level"];
    $input_slevel =$_GET["slevel"];
    if($input_level === "all" && $input_slevel === "all"){
        $rgex = ".*\..*";
    } elseif($input_level === "all" && $input_slevel !== "all"){
        $rgex = $input_slevel;
    } elseif($input_level !== "all" && $input_slevel === "all"){
        $rgex = $input_level;
    } else{
        $rgex = $input_level . "\..*" . $input_slevel;
    }
}

// Attempt select query execution
$sql = "SELECT * FROM products";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-bordered table-striped'>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Transaction</th>";
                    echo "<th>Address</th>";
                    echo "<th>City</th>";
                    echo "<th>Agent</th>";
                    echo "<th>Actions</th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td>" . $row['product_number'] . "</td>";
                    echo "<td>" . $row['sku'] . "</td>";
                    echo "<td>" . $row['meta_type'] . "</td>";
                    echo "<td>" . $row['categories'] . "</td>";
                    echo "<td>" . $row['post_title'] . "</td>";
                    echo "<td>";
                        echo "<a href='read.php?id=". $row['id'] ."' title='Ver Producto' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                        echo "<a href='update.php?id=". $row['id'] ."' title='Editar Producto' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                        echo "<a href='delete.php?id=". $row['id'] ."' title='Borrar Producto' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                    echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";                            
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<p class='lead'><em>No records were found.</em></p>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);