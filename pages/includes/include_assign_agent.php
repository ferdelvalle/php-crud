<?php
require_once("../pages/includes/config.php");
// Apply Filters

$agents_arr = [];                    
if($_SERVER["REQUEST_METHOD"] == "GET"){
    // Validate name
    $agents_sql = "SELECT * FROM users";
}

// Attempt select query execution
if($result = mysqli_query($link, $agents_sql)){
    if(mysqli_num_rows($result) > 0){
            while($agents_row = mysqli_fetch_array($result)){
                    if($agents_row['role'] === "agent"){
                        $usr_id = $agents_row['id'];
                        $full_name = $agents_row['name'] . ' ' . $agents_row['lastname'];
                        $users_arr[$usr_id] = $full_name;
                    } 
            }
        // Free result set
        mysqli_free_result($result);
    } 
} else{
    echo "ERROR: Could not able to execute $agents_sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);

function agents_options ($users_arr) {
  foreach($users_arr as $x => $x_value) {
    echo '<option value="' . $x . '">' . $x . ' ' . $x_value . '</option>';  
  }
}

/**
 *  USAGE
 *  <form method="GET">
 *    <label for="transaction">Agents</label>
 *    <select class="form-control" name="agent" id="agent">
 *    <?php 
 *        require_once("../pages/includes/include_fetch_users.php");
 *        agents_options ($users_arr);
 *    ?>
 *    </select>
 *  </form>
 */