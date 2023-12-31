<?php
 
// Fetch the input parameter from the AJAX request
$input = $_GET['input'];
$city = $_GET['city'];
 
require_once('inc/db.php');
 
// Perform the database query to retrieve matching states
if(!empty($input)){
$sql = "SELECT DISTINCT(`state_name`) FROM cities WHERE state_name LIKE '$input%'";
$result = $connect->query($sql);

// Generate the HTML list of matching states with clickable options
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<p onclick=\"selectState('" . $row['state_name'] . "')\">" . $row['state_name'] . "</p>";
  }
} else {
  echo "<p>No matching states found</p>";
}

}elseif(!empty($city)){
   $sql = "SELECT DISTINCT(`city_name`) FROM cities WHERE city_name LIKE '$city%'";
$result = $connect->query($sql);

// Generate the HTML list of matching states with clickable options
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<p onclick=\"selectCity('" . $row['city_name'] . "')\">" . $row['city_name'] . "</p>";
  }
} else {
  echo "<p>No matching city found</p>";
} 
}else{}

$connect->close();
?>

