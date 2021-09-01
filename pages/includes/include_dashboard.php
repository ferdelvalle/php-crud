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
// Finds the agent's Name and Lastname based on ID


// Attempt select query execution
$sql = "SELECT * FROM properties";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-bordered table-striped'>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>State</th>";
                    echo "<th>City</th>";
                    echo "<th>Address</th>";
                    echo "<th>Service Type</th>";
                    echo "<th>Community</th>";
                    echo "<th>Agent</th>";
                    echo "<th>Published</th>";
                    echo "<th>Actions</th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['loc_state'] . "</td>";
                    echo "<td>" . $row['loc_city'] . "</td>";
                    echo "<td>" . $row['loc_address'] . "</td>";
                    echo "<td>" . $row['prop_info_serv_type'] . "</td>";
                    echo "<td>" . $row['prop_info_com_name'] . "</td>";

                    if($row['agent'] == 0){
                        echo "<td>Not assigned</td>";
                    } else {
                        echo "<td>" . $row['agent'] . "</td>";
                    }

                    if($row['published'] == 0){
                        echo "<td>No</td>";
                    } elseif($row['published'] == 1){
                        echo "<td>Yes</td>";
                    }
                    echo "<td>";
                        echo "<a href='read.php?id=". $row['id'] ."' title='Details' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                        echo "<a href='update.php?id=". $row['id'] ."' title='Edit Property' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                        echo "<a href='assign_agent.php?id=". $row['id'] ."' title='Assign Agent' data-toggle='tooltip'><span class='glyphicon glyphicon-user'></span></a>";
                        echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Property' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
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