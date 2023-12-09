<?php
// Database configuration 
// $dbHost     = "localhost";
// $dbUsername = "vinikuma_instant";
// $dbPassword = "instant@123$";
// $dbName     = "vinikuma_instantjob";



require_once('inc/db.php');
if (isset($_POST["query"])) {
    
    $category = $_POST["category"];
    
    if ($category == 4) {
        $output = '';
        $query  = "SELECT * FROM sell_your_service WHERE topic LIKE '%" . $_POST["query"] . "%'";
        $result = mysqli_query($connect, $query);
        $output = '<ul class="list-unstyled">';
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $output .= '<a href="search-result?Service=' . $row["topic"] . '"><li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                </svg>' . $row["topic"] . '</li></a>';
            }
        } else {
            $output .= '<li>Data Not Found</li>';
        }
    } elseif ($category == 3) {
        
        $output = '';
        $query  = "SELECT * FROM CreateJob WHERE topic LIKE '%" . $_POST["query"] . "%'";
        $result = mysqli_query($connect, $query);
        $output = '<ul class="list-unstyled">';
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $output .= '<a href="search-result?Jobs=' . $row["topic"] . '"><li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                </svg>' . $row["topic"] . '</li></a>';
            }
        } else {
            $output .= '<li>Data Not Found</li>';
        }
        
        
    } elseif ($category == 2) {
        $output = '';
        $query  = "SELECT DISTINCT(`Interest`) FROM `Interest` WHERE Interest LIKE '%" . $_POST["query"] . "%'";
        $result = mysqli_query($connect, $query);
        $output = '<ul class="list-unstyled">';
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $output .= '<a href="search-result?Interest=' . $row["Interest"] . '"><li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                </svg>' . $row["Interest"] . '</li></a>';
            }
        } else {
            $output .= '<li>Data Not Found</li>';
        }
        
    } elseif ($category == 1) {
        
        $output = '';
        $query  = "SELECT DISTINCT(`Skills`) FROM `Skills` WHERE Skills LIKE '%" . $_POST["query"] . "%'";
        $result = mysqli_query($connect, $query);
        $output = '<ul class="list-unstyled">';
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $output .= '<a href="search-result?Skills=' . $row["Skills"] . '"><li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                </svg>' . $row["Skills"] . '</li></a>';
            }
        } else {
            $output .= '<li>Data Not Found</li>';
        }
        
        
    } else {
    }
    
    
    
    $output .= '</ul>';
    echo $output;
}

?>