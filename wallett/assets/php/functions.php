<?php
session_start();
require_once "database.php";

// for including pages in index.php
function viewPage($page, $page_title = "")
{
    include "assets/pages/$page.php";
}

//for creating full site urls
function site_url($path)
{
    $site_url = "https://mitdevelop.com/instajobs/";
    return $site_url . $path;
}

//for validating signup form
function validateSignup($data)
{
    $full_name = $data["full_name"] ?? "";
    $mobile = $data["Phone"] ?? "";
    $email = $data["email"] ?? "";
    $password = $data["password"] ?? "";
    
    $return_data = [
        "status" => true,
        "msg" => "all fields are perfect",
    ];

    if (!$password) {
        $return_data["status"] = false;
        $return_data["msg"] = "Password is blank";
        $return_data["field"] = "password";
    }

    if (!$email) {
        $return_data["status"] = false;
        $return_data["msg"] = "Email Id is blank";
        $return_data["field"] = "email";
    }

    if (!$mobile) {
        $return_data["status"] = false;
        $return_data["msg"] = "Mobile is blank";
        $return_data["field"] = "mobile";
    }
    if (!$full_name) {
        $return_data["status"] = false;
        $return_data["msg"] = "Full name is blank";
        $return_data["field"] = "full_name";
    }


// check if user is already registered

if (checkDuplicateEmail($email)) {
    $return_data["status"] = false;
    $return_data["msg"] = "Email Id Is Already Registered !";
    $return_data["field"] = "email";
}

if (checkDuplicateMobile($mobile)) {
    $return_data["status"] = false;
    $return_data["msg"] = "Mobile no is already registered !";
    $return_data["field"] = "Phone";
}



    return $return_data;
}

//for showing error messages
function showError($field)
{
    if (isset($_SESSION["error"]) && $_SESSION["error"]["field"] == $field) {
        echo ' <div class="alert alert-danger mt-2" role="alert">' .
            $_SESSION["error"]["msg"] .
            "</div>";
        unset($_SESSION["error"]);
    }
}

//for showing previous submited form values
function showFormValue($field)
{
    if (isset($_SESSION["form_data"])) {
        return $_SESSION["form_data"][$field];
    }
    return "";
}

//for checking email id is already registered or not
function checkDuplicateEmail($email){
global $db;
$query="SELECT COUNT(*) as row FROM users WHERE Email='$email'";
$run = mysqli_query($db,$query);
$return_data = mysqli_fetch_assoc($run);
return $return_data['row'];
}

//for checking email id is already registered or not
function checkDuplicateMobile($mobile){
    global $db;
    $query="SELECT COUNT(*) as row FROM users WHERE Phone='$mobile'";
    $run = mysqli_query($db,$query);
    $return_data = mysqli_fetch_assoc($run);
    return $return_data['row'];
}


//for creating new user
function createUser($data){
    global $db;
    $full_name =mysqli_real_escape_string($db,$data["full_name"]);
    $mobile = mysqli_real_escape_string($db,$data["Phone"]);
    $email = mysqli_real_escape_string($db,$data["email"]);
    $password = mysqli_real_escape_string($db,$data["password"]);

    $query = "INSERT INTO users (full_name,mobile,email,password) ";
    $query.= " VALUES ('$full_name','$mobile','$email','$password')";

    if(mysqli_query($db,$query)){
        $just_created_user_id = mysqli_insert_id($db);
        addJoiningBalance($just_created_user_id);

        return true;
    }

    return false;


}

// for checking user is exist or not
function checkUser($mobile_or_email,$password){
    global $db;
    $query="SELECT * FROM users WHERE (Phone='$mobile_or_email' || Email='$mobile_or_email') && Password=$password";

    $run = mysqli_query($db,$query);
    $return_data = mysqli_fetch_assoc($run) ?? array();
    return $return_data;
}

//for adding 1000 rs for new users
function addJoiningBalance($user_id){
    global $db;
    $query="INSERT INTO Transaction(from_user_id,to_user_id,amount) VALUES(121,$user_id,1000)";
    return mysqli_query($db,$query);
}

//for knowing the credited balance of user
function getCreditedBalance($user_id){
    global $db;
    $query="SELECT SUM(amount) as credit FROM Transaction WHERE to_user_id=$user_id";
    $run = mysqli_query($db,$query);
    $return_data = mysqli_fetch_assoc($run);
    return $return_data['credit'];
}

//for knowing the debited balance of user
function getDebitedBalance($user_id){
    global $db;
    $query="SELECT SUM(amount) as debit FROM Transaction WHERE from_user_id=$user_id";
    $run = mysqli_query($db,$query);
    $return_data = mysqli_fetch_assoc($run);
    return $return_data['debit'];
}


//for getting Transactionection history of user
function getTransactionHistory($user_id){
    global $db;
    $query="SELECT * FROM Transaction WHERE from_user_id=$user_id || to_user_id=$user_id ORDER BY ID DESC";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);
}


//for geting user information by id
function getUserById($user_id){
    global $db;
      $query="SELECT * FROM users WHERE id=$user_id";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_assoc($run); 
}

//for geting user_id by mobile o
function getUserIdByMobileNo($mobile_no){
    global $db;
     $query="SELECT id FROM users WHERE Phone='$mobile_no'";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_assoc($run)['id']; 
}

//for sending the money
function sendMoney($to_user_id,$from_user_id,$amount){
    global $db;
    $query="INSERT INTO Transaction(from_user_id,to_user_id,amount) VALUES($from_user_id,$to_user_id,$amount)";
    return mysqli_query($db,$query);
}