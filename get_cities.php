<?php
require_once('inc/db.php');

// Connect to the database
  
// Get the selected state from the AJAX request
$state = $_POST['state'];

// Prepare the query to retrieve the list of cities based on the selected state
$stmt = mysqli_prepare($connect, "SELECT city_name FROM cities WHERE state_name = ?");

// Bind the state parameter to the query
mysqli_stmt_bind_param($stmt, 's', $state);

// Execute the query
mysqli_stmt_execute($stmt);

// Bind the result to a variable
mysqli_stmt_bind_result($stmt, $city);

// Create an array to store the list of cities
$cities = array();

// Loop through the result set and add each city to the array
while (mysqli_stmt_fetch($stmt)) {
      $cities[] = $city;
      
      echo '<option value="'.$city.'">'.$city.'</option>';
}

// Close the statement
mysqli_stmt_close($stmt);

// Close the connection
mysqli_close($connect);

  
?>



