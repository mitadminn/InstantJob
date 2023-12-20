<?php
    session_start();
    include('admin/inc/function.php');
    $obj = new Instantjobs();
    //Include Google Configuration File
    include('gconfig.php');
    
    
    //This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
    if (isset($_GET["code"])) {
        //It will Attempt to exchange a code for an valid authentication token. 
        $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
        //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
        if (!isset($token['error'])) {
            //Set the access token used for requests
            $google_client->setAccessToken($token['access_token']);
            //Store "access_token" value in $_SESSION variable for future use.
            $_SESSION['access_token'] = $token['access_token'];
            //Create Object of Google Service OAuth 2 class
            $google_service           = new Google_Service_Oauth2($google_client);
            //Get user profile data from google
            $data                     = $google_service->userinfo->get();
            //Below you can find Get profile data and store into $_SESSION variable
            if (!empty($data['given_name'])) {
                $_SESSION['user_first_name'] = $data['given_name'];
            }
            if (!empty($data['family_name'])) {
                $_SESSION['user_last_name'] = $data['family_name'];
            }
            if (!empty($data['email'])) {
                $_SESSION['user_email_address'] = $data['email'];
            }
            if (!empty($data['gender'])) {
                $_SESSION['user_gender'] = $data['gender'];
            }
            if (!empty($data['picture'])) {
                $_SESSION['user_image'] = $data['picture'];
            }
            
            
            $emails = $_SESSION['user_email_address'];
            $guser  = $obj->CheckUserByEmail($emails);
            if ($guser) {
                // print_r($result);
                $_SESSION['Userid'] = $guser['id'];
            } else {
                $googlemail  = $_SESSION['user_email_address'];
                $gogoletoken = $_SESSION['access_token'];
                $ProfileName = $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'];
                $ProfilePic  = $_SESSION['user_image'];
                $user_reg    = $obj->GoogleUserSignup($googlemail, $gogoletoken, $ProfileName, $ProfilePic);
                if ($user_reg) {
                    $goog_user          = $obj->GetUsersByGoogle($googlemail);
                    $_SESSION['Userid'] = $goog_user['id'];
                    //   echo 'Google User Register Successfully';
                    header('location:profile-info');
                    $token = $user_reg['Token'];
                } else {
                    echo "User is not created";
                    die();
                }
                
            }
            $_SESSION['user_token'] = $token;
        } else {
            if (!isset($_SESSION['user_token'])) {
                header("Location: index.php");
                die();
            }
            $gtoken      = $_SESSION['user_token'];
            // checking if user is already exists in database
            $tokenresult = $obj->GetUsersByToken($gtoken);
            if ($tokenresult) {
                $user_id          = $tokenresult['id'];
                $user_information = $obj->GetUsersById($user_id);
            }
        }
    }
    
    $_SESSION['referid'] = $_GET['uid'];
    
    $user_id          = $_SESSION['Userid'];
    $user_information = $obj->GetUsersById($user_id);
    
    $useridd  = $obj->GetUserrById($user_id);
    $services = $obj->GetAllServices();
    $jobs     = $obj->GetAllJobs();
    
    $ip                  = $obj->getIpAddress();
    $isValidIpAddress    = $obj->isValidIpAddress($ip);
    $geoLocationData     = $obj->getLocation($ip);
    $_SESSION['Country'] = $geoLocationData['country'];
    
    
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="tuf19atYlsS6V7nJtxjvVoz5HGzZXzDCqiVLpSmI">
        <title>Instantjob | Home</title>
        <meta name="description" content="Instant Jobs">
        <meta name="author" content="FasTrax Infotech">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0">
        <link rel="stylesheet" href="assets/css/header.css">
        <link rel="stylesheet" href="assets/css/stylesheet-onboarding.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="assets/css/stylesheet.css">
        <link rel="stylesheet" href="assets/css/custom.css">
    </head>
    <body class="background-container">