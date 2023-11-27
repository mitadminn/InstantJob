<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'mit_instantjob', '[PFC[mUGwBp4', 'mit_instantjobs'); 
 
// Get the selected state from the AJAX request
$state = $_POST['state'];

// Prepare the query to retrieve the list of cities based on the selected state
$stmt = mysqli_prepare($conn, "SELECT city_name FROM cities WHERE state_name = ?");

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
mysqli_close($conn);

 
// Establish a MySQL database connection
// $servername = "localhost";
// $username = "vinikuma_instant";
// $password = "instant@123$"; 
// $dbname = "vinikuma_instantjob";

// $conn = new mysqli($servername, $username, $password, $dbname);

// // Retrieve matching states and cities from the database
// $search = $_GET["term"];
//   $query = "SELECT DISTINCT state_name FROM cities WHERE state_name LIKE '%$search%' LIMIT 10"; // Change 'cities' to your table name
// $result = $conn->query($query);

// // Fetch and store the matching state names in an array
// $states = array();
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $states[] = $row['state_name'];
//     }
// }

// // Return the matching state names as JSON data
// echo json_encode($states);
 
?>



