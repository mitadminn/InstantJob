<?php
ob_start();
 

// 2.Strict-Transport-Security (HSTS)
header("Strict-Transport-Security: max-age=31536000; includeSubDomains");
// 3.X-Frame-Options (Clickjacking protection):
header("X-Frame-Options: DENY");
// 4.X-XSS-Protection (Cross-Site Scripting protection):
header("X-XSS-Protection: 1; mode=block");
// 5.X-Content-Type-Options (Prevent MIME type sniffing):
header("X-Content-Type-Options: nosniff");
// 6.Referrer-Policy (Control referral information sent to other websites):
header("Referrer-Policy: strict-origin-when-cross-origin");
// 7.Feature-Policy (Control allowed features and APIs):
header("Feature-Policy: geolocation 'self'; camera 'none';");
// 8.Cache-Control (Control caching behavior):
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
// 9.Public-Key-Pins (HPKP - HTTP Public Key Pinning):
header("Strict-Transport-Security: max-age=31536000; includeSubDomains");

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
            $google_service = new Google_Service_Oauth2($google_client);
            //Get user profile data from google
            $data = $google_service->userinfo->get();
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
            $_SESSION['user_email'] = $_SESSION['user_email_address'];
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
                    $goog_user= $obj->GetUsersByGoogle($googlemail);
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
            $gtoken = $_SESSION['user_token'];
            // checking if user is already exists in database
            $tokenresult = $obj->GetUsersByToken($gtoken);
            if ($tokenresult) {
                $user_id          = $tokenresult['id'];
                $user_information = $obj->GetUsersById($user_id);
            }
        }
    }
    
    $_SESSION['referid'] = $_GET['uid'];
    $user_id = $_SESSION['Userid'];
    $user_information = $obj->GetUsersById($user_id);
    $user_verifyn = $obj->GetVerifyAccount($user_id);
 
    $useridd  = $obj->GetUserrById($user_id);
    $services = $obj->GetAllServices();
    $jobs     = $obj->GetAllJobs();
    
    $ip                  = $obj->getIpAddress();
    $isValidIpAddress    = $obj->isValidIpAddress($ip);
    $geoLocationData     = $obj->getLocation($ip);
    $_SESSION['Country'] = $geoLocationData['country'];
    $skills              = $obj->GetSkillsByUserId($user_id);
    $intrest             = $obj->GetIntrestByUserId($user_id);
    $states             = $obj->GetAllStates();
    $googlekey             = $obj->GetGoogleApiKeys();
    $all_job_user = $obj->GetAllJobByUser($user_id);

    // $script_skilss = array();
        foreach ($skills as $sk) {
            $sas = str_replace("''", ',', $sk['Skills']);
              $script_skilss[] =  "'$sas',";
        }

 
         if(empty($user_information['ProfilePic'])){
              $p_pic =  $_SESSION['user_image'];
        $obj->UpdateImage($user_id,$p_pic);
         }
        $isGoogleImage = strpos($user_information['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
        if ($isGoogleImage) {
         } else {
             
        }
/* Service Tax */
 $chrgs = $obj->GetServiceTax();
$service = $chrgs['Service'];
$sst = $chrgs['Tax'];
 
 
  
 // print_r($user_information);
if($user_information['Approval'] == 1) {
 
   $appcls = 'approved';
    // $isUserNotApproved = true;
}else{
     $appcls = 'not-approved';
} 

     ?>
<link rel="stylesheet" href="assets/css/header.css">
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="tuf19atYlsS6V7nJtxjvVoz5HGzZXzDCqiVLpSmI">
        <title>Instantjob | Home</title>
        <meta name="description" content="Instant Jobs">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0">
        <link rel="stylesheet" href="assets/css/stylesheet-onboarding.css">
        <!--fav-icon-->
        <link rel="icon" href="assets/images/fav-icon.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="assets/css/stylesheet.css">
        <link rel="stylesheet" href="assets/css/custom.css">
        <?php
            if ($page === 'Account') {
            ?>
        <link rel="stylesheet" href="assets/css/account.css">
        <?php
            } elseif ($page === 'Invite For Job Post') {
            ?> 
        <link rel="stylesheet" href="assets/css/invite-for-job-post.css">
        <?php
            } elseif ($page === 'Add Coupon') {
            ?>
        <link href="assets/css/add-coupon.css">
        <?php
            } elseif ($page === 'Checkout') {
            ?> 
        <link href="assets/css/checkout.css">
        <?php
            } elseif ($page === 'Create Job') {
            ?> 
        <link rel="stylesheet" href="assets/css/create-post.css">
        <?php
            } elseif ($page === 'Create Service') {
            ?> 
        <link rel="stylesheet" href="assets/css/create-service.css">
        <?php
            } elseif ($page === 'Discussion Budget Summary') {
            ?> 
        <link ="stylesheet" href="assets/css/discussion-budget-summary.css">
        <?php
            } elseif ($page === 'Discussion Budget') {
            ?> 
        <link rel="stylesheet" href="assets/css/discussion-budget.css">
        <?php
            } elseif ($page === 'Discussion') {
            ?> 
        <link rel="stylesheet" href="assets/css/discussion.css">
        <?php
            } elseif ($page === 'Email Confirmation') {
            ?> 
        <link rel="stylesheet" href="assets/css/email-confirm.css">
        <?php
            } elseif ($page === 'Invite For Interview') {
            ?> 
        <link rel="stylesheet" href="assets/css/invite-for-interview.css">
        <?php
            } elseif ($page === 'Job Details') {
            ?> 
        <link rel="stylesheet" href="assets/css/job-detail.css">
        <?php
            } elseif ($page === 'Job Marketplace') {
            ?> 
        <link rel="stylesheet" href="assets/css/job-marketplace.css">
        <?php
            } elseif ($page === 'Job Status') {
            ?> 
        <link rel="stylesheet" href="assets/css/job-summary.css">
        <?php
            } elseif ($page === 'Manage Post') {
            ?> 
        <link rel="stylesheet" href="assets/css/manage-post.css">
        <?php
            } elseif ($page === 'Message') {
            ?> 
        <link rel="stylesheet" href="assets/css/message.css">
        <?php
            } elseif ($page === 'Payment Release Success') {
            ?> 
        <link rel="stylesheet" href="assets/css/payment-release-success.css">
        <?php
            } elseif ($page === 'Release Payment') {
            ?>
        <link rel="stylesheet" href="assets/css/payment-release.css">
        <link rel="stylesheet" href="assets/css/create-service.css">
        <?php
            } elseif ($page === 'Service Provider') {
            ?>
        <link rel="stylesheet" href="assets/css/professional-service.css">
        <link rel="stylesheet" href="assets/css/service-provider.css">
        <?php
            } elseif ($page === 'Profile Edit') {
            ?> 
        <link rel="stylesheet" href="assets/css/profile-edit.css">
        <?php
            } elseif ($page === 'Profile Info') {
            ?> 
        <link rel="stylesheet" href="assets/css/profile-info.css">
        <link rel="stylesheet" href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
        <link href="assets/css/style-drag.css" rel="stylesheet" type="text/css">
        <?php
            } elseif ($page === 'Sign in') {
            ?> 
        <link rel="stylesheet" href="assets/css/signin.css">
        <?php
            } elseif ($page === 'Profile View') {
            ?>
        <link rel="styleheet" href="assets/css/profile-view.css">
        <?php
            } elseif ($page === 'Profile') {
            ?> 
        <link rel="stylesheet" href="assets/css/profile.css">
        <?php
            } elseif ($page === 'Refer a friend') {
            ?> 
        <link rel="stylesheet" href="assets/css/refer.css">
        <?php
            } elseif ($page === 'Refer a friends') {
            ?>
        <link rel="stylesheet" href="assets/css/referfriend.css">
        <?php
            } elseif ($page === 'Reviews') {
            ?> 
        <link rel="stylesheet" href="assets/css/reviews-only.css">
        <?php
            } elseif ($page === 'Search result') {
            ?> 
        <link rel="stylesheet" href="assets/css/search-result.css">
        <?php
            } elseif ($page === 'Service Select') {
            ?> 
        <link rel="stylesheet" href="assets/css/profile-info.css">
        <?php
            } elseif ($page === 'Summary') {
            ?> 
        <link rel="stylesheet" href="assets/css/summary.css">
        
        <?php
            } elseif ($page === 'Payment Summary') {
            ?> 
        <link rel="stylesheet" href="assets/css/summary-payment.css">
        <link rel="stylesheet" href="assets/css/create-service.css">

        <?php
            } elseif ($page === 'Wallet Top up') {
            ?> 
        <link rel="stylesheet" href="assets/css/top-up-wallet.css">
        <?php
            } elseif ($page === 'Transaction') {
            ?> 
        <link rel="stylesheet" href="assets/css/transaction.css">
        <?php
            } elseif ($page === 'Profile User View') {
            ?>
        <link rel="stylesheet" href="assets/css/user-view.css">
        <?php
            } elseif ($page === 'Wallet') {
            // Check if the user is already logged in, redirect to the main page if true
 
  
            ?>
        <link rel="stylesheet" href="assets/css/wallet.css">
        <?php
            } elseif ($page === 'Withdrawal') {
            ?> 
        <link rel="stylesheet" href="assets/css/withdrawal.css">
        <?php
            } else {
            }
            ?> 
    </head>
    <body class="background-container">
        <main role="main" class="container-fluid">
        <header class="header">
            <div class="row align-items-center head_wrap_row">
                <div class="col-md-3 p-0">
                    <div class="logo_header">
                        <a href="service-provider">
                        <img src="assets/img/new-instant-logo.png" alt="Instant Jobs">
                        </a><?//=$user_id;?>
                    </div>
                </div>
                <div class="col-md-6 p-0 section">
                    <div class="top-search">
                        <form action="#" method="post" novalidate="novalidate">
                            <div class="row justify-content-center"> 
                                <div class="col-lg-10 col-md-3 col-sm-12 p-0" >
                                    <svg class="top_search_head_header"><
                                        <path fill="currentColor" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                                    </svg>
                                    <input type="text"name="user" id="user" class="form-control search-slt section" placeholder="Search" />
                                    <div id="userList"></div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-6 p-0">
                                    <svg class="chvron_svg" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                                    </svg>
                                    <select class="ddl-select" id="list" name="list" value="^">
                                        <option value="1" class="lang_optn">Skills</option>
                                        <option value="2" class="lang_optn">Interest</option>
                                        <option value="3" class="lang_optn">Jobs</option>
                                        <option value="4" class="lang_optn">Service</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3 p-0">
                    <div class="right-btns dropdownn">
                        <div class="icon-menu">
 
                      <ul class="nav navbar-nav navbar-right">
    
     <li class="dropdown">
      <a href="message?tab=msg" class="dropdown-toggle" data-toggle="dropdown">
          <div data-cy="dot" class="nav-dot" style="display:none">
              
          </div>
          <span class="fa fa-bell dropbtn bell_icon_head" style="font-size:18px;"></span>
      </a>  
       
        <ul class="dropdown-menu notification_header_list p-0">
            
          
        </ul>
         
     </li>
     
    </ul>
                          
                        </div>
                        <div class="icon-menu" onclick="myDropFunction()">
                            <svg class="dropbtn"  viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12,16A2,2 0 0,1 14,18A2,2 0 0,1 12,20A2,2 0 0,1 10,18A2,2 0 0,1 12,16M12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12A2,2 0 0,1 12,10M12,4A2,2 0 0,1 14,6A2,2 0 0,1 12,8A2,2 0 0,1 10,6A2,2 0 0,1 12,4Z" />
                            </svg>
                            <div id="myDropdown" class="dropdown-contentt">
                                <a class="dropdown_menu" href="#home">Home</a>
                                <a class="dropdown_menu" href="#about">About</a>
                                <a class="dropdown_menu" href="#contact">Contact</a>
                                <a class="dropdown_menu" href="logout">Logout</a>
                            </div>
                        </div>
                        <div class="create-btn">
                            <?php
                                if ($page == 'Job Marketplace') {
                                ?>
                            <a href="<?php
                                if (!empty($_SESSION['user_first_name'])) {
                                    echo 'select-services';
                                } elseif (!empty($_SESSION['Userid'])) {
                                    echo 'select-services';
                                } else {
                                    echo 'signin';
                                }
                                ?>" class="service-create btn btn-primary">
                            <button type="button" class="custom-btn bnt-fill-green post_wrap"> Create Post</button>
                            </a>
                            <?php
                                } elseif ($page == 'Service Provider') {
                                ?>
                            <a href="<?php
                                if (!empty($_SESSION['user_first_name'])) {
                                    echo 'select-services';
                                } elseif (!empty($_SESSION['Userid'])) {
                                    echo 'select-services';
                                } else {
                                    echo 'signin';
                                }
                                ?>" class="service-create btn btn-primary">
                            <button type="button" class="custom-btn bnt-fill-green"> Create Post</button>
                            </a>
                            <?php
                                } elseif ($page == 'Manage Post') {
                                ?>
                            <a href="<?php
                                if (!empty($_SESSION['user_first_name'])) {
                                    echo 'select-services';
                                } elseif (!empty($_SESSION['Userid'])) {
                                    echo 'select-services';
                                } else {
                                    echo 'signin';
                                }
                                ?>" class="service-create btn btn-primary">
                            <button type="button" class="custom-btn bnt-fill-green"> Create Post</button>
                            </a>
                            <?php
                                } else {
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="row main_row_wrapper">