<?php
require_once("../pages/includes/config.php");
// Apply Filters

                    
if($_SERVER["REQUEST_METHOD"] == "GET"){
    // Validate name
    $role = $_GET["role"];
    $sql = "SELECT * FROM users";
    if($role === "agent"){
        $sql = "SELECT * FROM users WHERE role = 'agent'";
    } elseif($role === "manager"){
        $sql = "SELECT * FROM users WHERE role = 'manager'";
    } elseif($role === "admin"){
        $sql = "SELECT * FROM users WHERE role = 'admin'";
    }
}

// Attempt select query execution




if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-bordered table-striped'>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Username</th>";
                    echo "<th>Name</th>";
                    echo "<th>Last Name</th>";
                    echo "<th>Role</th>";
                    echo "<th>Actions</th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['lastname'] . "</td>";

                    if($row['role'] === "agent"){
                        echo "<td>Real State Agent</td>";
                    } elseif($row['role'] === "manager"){
                        echo "<td>Community Manager</td>";
                    } elseif($row['role'] === "admin"){
                        echo "<td>Site Administrator</td>";
                    }

                    echo "<td>";
                        echo "<a href='read_users.php?id=". $row['id'] ."' title='View User' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                        echo "<a href='update_users.php?id=". $row['id'] ."' title='Edit User' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                        echo "<a href='change_usr_password.php?id=". $row['id'] ."' title='Change Password' data-toggle='tooltip'><span class='glyphicon glyphicon-refresh'></span></a>";
                        echo "<a href='delete_users.php?id=". $row['id'] ."' title='Delete User' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
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