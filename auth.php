<?php session_start();

if (empty($_SESSION['Userid'])) {
    header("location: signin");
    // echo 'Not Login';
    // exit();
}
?>