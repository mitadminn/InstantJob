<?php 
session_start();
include('admin/inc/function.php');
$obj = new Instantjobs(); 
//Include Google Configuration File
include('gconfig.php');
  

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
//It will Attempt to exchange a code for an valid authentication token. 
$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
//This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
if(!isset($token['error']))
{
//Set the access token used for requests
$google_client->setAccessToken($token['access_token']);
//Store "access_token" value in $_SESSION variable for future use.
$_SESSION['access_token'] = $token['access_token'];
//Create Object of Google Service OAuth 2 class
$google_service = new Google_Service_Oauth2($google_client); 
//Get user profile data from google
$data = $google_service->userinfo->get();
//Below you can find Get profile data and store into $_SESSION variable
if(!empty($data['given_name']))
{
  $_SESSION['user_first_name'] = $data['given_name'];
}
if(!empty($data['family_name']))
{
  $_SESSION['user_last_name'] = $data['family_name'];
}
if(!empty($data['email']))
{
  $_SESSION['user_email_address'] = $data['email'];
}
if(!empty($data['gender']))
{
  $_SESSION['user_gender'] = $data['gender'];
}
if(!empty($data['picture']))
{
   $_SESSION['user_image'] = $data['picture'];
}


$emails = $_SESSION['user_email_address'];
$guser = $obj->CheckUserByEmail($emails);
if($guser){
// print_r($result);
$_SESSION['Userid'] = $guser['id'];
} else {
      $googlemail = $_SESSION['user_email_address'];
      $gogoletoken = $_SESSION['access_token'];
      $ProfileName = $_SESSION['user_first_name'].' '.$_SESSION['user_last_name'];
      $ProfilePic =$_SESSION['user_image'];
      $user_reg = $obj->GoogleUserSignup($googlemail, $gogoletoken, $ProfileName, $ProfilePic);
      if ($user_reg) {
           $goog_user = $obj->GetUsersByGoogle($googlemail);
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
      $user_id = $tokenresult['id'];
    $user_information = $obj->GetUsersById($user_id);
  } 
} 
} 
 
$_SESSION['referid'] = $_GET['uid'];

$user_id = $_SESSION['Userid'];
$user_information = $obj->GetUsersById($user_id);

$useridd = $obj->GetUserrById($user_id);
$services = $obj->GetAllServices();
$jobs = $obj->GetAllJobs();

$ip = $obj->getIpAddress();
$isValidIpAddress = $obj->isValidIpAddress($ip);
$geoLocationData = $obj->getLocation($ip);
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
        
        
        
        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
 <!--       <link media="all" type="text/css" rel="stylesheet" href="assets/css/frontend.css">-->
 <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
  <link rel="stylesheet" href="assets/css/stylesheet-onboarding.css">
 <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">-->
 <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>-->
  
  
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--<link rel="stylesheet" href="stylesheet.css">-->
        <link rel="stylesheet" href="assets/css/stylesheet.css">
        <link rel="stylesheet" href="assets/css/custom.css">

<style>
.head_rt_svg{
        background: #d5d5d5;
    padding: 0px 4px 2px 4px;
    border-radius: 50%;
}
form.form-check {justify-content: space-between;display: flex;align-items: center;}
.dots_bell-img svg {cursor:pointer; color: #000;}
.dots_bell-img:focus svg{ background:#10df66;}
button:hover{text-decoration:none;}
.service-create {float: left;}
.post-create{float: left;}
.create_sell_serivices{color:#fff; background-color:#00C853; border:#00C853; font-size: 13px;}
a.service-create.btn.btn-primary {padding: 0 16px !important;}
ul#myTab {justify-content: center;padding: 0 0 10px 0;}
.dots_bell-img {display: flex !important;gap: 10px !important; position:relative;}
i.fa-solid.fa-magnifying-glass {    position: absolute;left: 3%;z-index: 1;top: 31%;color: #bfbfbf;}
.text {
  display: table;
  margin: 20px auto;}
.t-dropdown-block {
  position:relative}
.t-dropdown-list {
  display: none;
  background-color: #FFF;
  border: 1px solid #DDD;
  z-index: 10;
  box-shadow: 4px 4px 5px rgba(0, 0, 0, .3);
  list-style: none;
  margin: 0;
  padding: 0;
  height: 150px;
  overflow: auto;
  position: absolute;
      right: 0;
}

.t-dropdown-item {
  padding: 5px 20px;
  margin: 0;
  cursor: pointer;
}

.t-dropdown-item:hover {
  background-color: #F1F1F1;
}

.t-dropdown-select {
  position: relative;
  overflow: hidden;
  box-sizing: content-box;
}

.t-dropdown-input {
padding-left:35px; width: 400px !important;border-radius: 20px;border-right: none;border-top: 2px solid #e5e9ed!important;border-left: 2px solid #e5e9ed!important;border-bottom: 2px solid #e5e9ed !important;
}

.t-select-btn {
  background-image: url(https://cdn4.iconfinder.com/data/icons/ui-indicatives/100/Indicatives-26-128.png);
      /*background: #e1e1e1;*/
  background-position: center;
  background-repeat: no-repeat;
  background-size: 7px 7px;
  position: absolute;
  width: 70px;
  top: 0;
  right: 0;
  height: 100%;
  border-left: 1px solid #DDD;
  border-right: 1px solid #DDD;
      border-radius: 20px;

}

.t-select-btn:active {
  background-color: #F1F1F1;
}  
.head_search{
    border-radius: 20px;
    border: 2px solid #d9d9d9;}
ul.t-dropdown-list {
    width: 101px !important;
    margin: 0 !important;
}
** Custom Select **/
.custom-select-wrapper {
  position: relative;
  display: inline-block;
  user-select: none;
}
  .custom-select-wrapper select {
    display: none;
  }
  .custom-select {
    position: relative;
    display: inline-block;
  }
    .custom-select-trigger {
         position: relative;
    display: block;
    width: 130px;
    padding: 0 84px 0 22px;
    font-size: 18px;
    font-weight: 300;
    line-height: 40px;
    background: #efefef;
    }
      .custom-select-trigger:after {
        position: absolute;
        display: block;
        content: '';
        width: 10px; height: 10px;
        top: 50%; right: 25px;
        margin-top: -3px;
        border-bottom: 1px solid #7a7a7a;
        border-right: 1px solid #7a7a7a;
        transform: rotate(45deg) translateY(-50%);
        transition: all .4s ease-in-out;
        transform-origin: 50% 0;
      }
      .custom-select.opened .custom-select-trigger:after {
        margin-top: 3px;
        transform: rotate(-135deg) translateY(-50%);
      }
  .custom-options {
    position: absolute;
    display: block;
    top: 100%; left: 0; right: 0;
    min-width: 100%;
    margin: 15px 0;
    border: 1px solid #b5b5b5;
    border-radius: 4px;
    box-sizing: border-box;
    box-shadow: 0 2px 1px rgba(0,0,0,.07);
    background: #fff;
    transition: all .4s ease-in-out;
    
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transform: translateY(-15px);
  }
  .custom-select.opened .custom-options {
    opacity: 1;
    visibility: visible;
    pointer-events: all;
    transform: translateY(0);
  }
    .option-hover:before {
      background: #f9f9f9;
    }
    .custom-option {
      position: relative;
      display: block;
      padding: 0 22px;
      /*border-bottom: 1px solid #b5b5b5;*/
      font-size: 14px;
      font-weight: 400;
      color: #273342;
      line-height: 44px;
      cursor: pointer;
      transition: all .4s ease-in-out;
    }
    .custom-option:first-of-type {
      border-radius: 4px 4px 0 0;
    }
    .custom-option:last-of-type {
      border-bottom: 0;
      border-radius: 0 0 4px 4px;
    }
    .custom-option:hover,
    .custom-option.selection {
      background: #10df66;
    }
span.custom-select-trigger {
    position: absolute;
    right: 0px;
    height: 40px;
    top: -2px;
    border-radius: 18px;
    width: 115px;
}
.sources {
     position: absolute;
    right: 0;
    width: 112px;
    border-radius: 20px;
    top: 3px;
}
input.t-dropdown-input.head_search:hover{
    background:#dddddd;
}
span.custom-select-trigger:hover{background:#fff; border:1px solid #dddddd;}
.dropbtn {
  /*background-color: #3498DB;*/
  color: white;
  font-size: 16px;
  border: none;
  cursor: pointer;
}
.dropbtn:hover, .dropbtn:focus,{
  background-color:#00c853;
}
.dropdown_menu:hover{
    background:#d5d5d5;
}
.dropdownn {
  position: relative;
  display: inline-block;
}

.dropdown-contentt {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    overflow: auto;
    box-shadow: -1px 8px 16px 0px rgb(0 0 0 / 20%);
    z-index: 1;
       left: -90px !important;
    top: 25px !important;
    text-align: center;
    width:130px;
}

.dropdown-contentt a {
  color: black;
      padding: 0;
  text-decoration: none;
  display: block;
      background: #fff;
          border-bottom: 1px solid #e9e9e9;
}
/*.dropdown a:hover {background-color: #ddd;}*/
.show {display: block;}
.dropdown_menu{padding:8px !important;}\

/********************************************************************************************************************************/
/********************************************************************************************************************************/
</style>
  <style>
.tab {padding: 40px !important; padding-bottom: 38px !important;background: #fff;}
.inbox_img{width:20px;}
  </style>
             </head>
    <body class="background-container">
        
           <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
                            <a class="navbar-brand instant-brand" href="service-provider">
            <img src="assets/img/new-instant-logo.png">
        </a>
                            
        <div class="two-btn" style="position:relative;">
             
            <ul class=" nav-tabs card-header-tabs" id="myTab" role="tablist" style="margin-left:0;">
              
                       <i class="fa-solid fa-magnifying-glass"></i>
<div class="t-dropdown-block">
  <div class="t-dropdown-select">
      <form action="" class="form-2">
          <input type="text"  class="t-dropdown-input head_search" placeholder="Search" onkeyup="showResult(this.value)"/>
                             </form>
    
  
  </div>
</div>
 <div class="center">
  <select name="sources" id="sources" class="custom-select sources" placeholder="Select">
    <option value="settings">Skills</option>
    <option value="invite">Interest</option>
    <option value="invite">Services</option>
    <option value="logout">Jobs</option>
  </select>
</div>
           </ul>
          
         </div>
    <div class="btnn-icn">
        <div class="dots_bell-img" class="dropdownn">
            <a class="head_rt_svg">
                <svg style="width:18px;height:18px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M10 21H14C14 22.1 13.1 23 12 23S10 22.1 10 21M21 19V20H3V19L5 17V11C5 7.9 7 5.2 10 4.3V4C10 2.9 10.9 2 12 2S14 2.9 14 4V4.3C17 5.2 19 7.9 19 11V17L21 19M17 11C17 8.2 14.8 6 12 6S7 8.2 7 11V18H17V11Z" />
                </svg>
            </a>
            <a class="head_rt_svg">
                <svg onclick="myDropFunction()" class="dropbtn" style="width:18px;height:18px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12,16A2,2 0 0,1 14,18A2,2 0 0,1 12,20A2,2 0 0,1 10,18A2,2 0 0,1 12,16M12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12A2,2 0 0,1 12,10M12,4A2,2 0 0,1 14,6A2,2 0 0,1 12,8A2,2 0 0,1 10,6A2,2 0 0,1 12,4Z" />   
                </svg>
                <div id="myDropdown" class="dropdown-contentt">
                    <a class="dropdown_menu" href="#home">Home</a>
                    <a class="dropdown_menu" href="#about">About</a>
                    <a class="dropdown_menu" href="#contact">Contact</a>
                </div>
            </a>
        </div>
                    
                                   <?php if($page == 'Job Marketplace') { ?>
                                    <a href="<?php if(!empty($_SESSION['user_first_name'])) { echo 'create-post'; } elseif(!empty($_SESSION['Userid'])) { echo 'create-post'; } else { echo 'signin';}?>" class="post-create">
                                        <button type="button" class="btn btn-success create_sell_serivices"> Create Post</button>
                                    </a>
                                 <?php } elseif($page == 'Service Provider') { ?>
                                    <a href="<?php if(!empty($_SESSION['user_first_name'])) { echo 'create-service'; } elseif(!empty($_SESSION['Userid'])) { echo 'create-service'; } else { echo 'signin';}?>" class="service-create btn btn-primary">
                                        <button type="button" class="btn btn-success create_sell_serivices"> Create Service</button>
                                    </a>
                                  <?php } else {} ?>
                                  
                             
                            </div>
                        </nav>
						
						
    <main role="main" class="container-fluid">
        <div class="row">
 <!-------------------------------------------search bar content---------------------------------------->

 <!-------------------------------------------search bar content END---------------------------------------->
  <script>
$(".custom-select").each(function() {
  var classes = $(this).attr("class"),
      id      = $(this).attr("id"),
      name    = $(this).attr("name");
  var template =  '<div class="' + classes + '">';
      template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
      template += '<div class="custom-options">';
      $(this).find("option").each(function() {
        template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
      });
  template += '</div></div>';
  
  $(this).wrap('<div class="custom-select-wrapper"></div>');
  $(this).hide();
  $(this).after(template);
});
$(".custom-option:first-of-type").hover(function() {
  $(this).parents(".custom-options").addClass("option-hover");
}, function() {
  $(this).parents(".custom-options").removeClass("option-hover");
});
$(".custom-select-trigger").on("click", function() {
  $('html').one('click',function() {
    $(".custom-select").removeClass("opened");
  });
  $(this).parents(".custom-select").toggleClass("opened");
  event.stopPropagation();
});
$(".custom-option").on("click", function() {
  $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
  $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
  $(this).addClass("selection");
  $(this).parents(".custom-select").removeClass("opened");
  $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
});
                </script>       
                         
<!--search bar js-->
<script>
    $(function () {
  $('[data-tooltip="tooltip"]').tooltip()
	});
</script>
  <!--search bar js-->
  
  <!--drop down menu of vertical dots-->
  <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myDropFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-contentt");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>


<script>

 /* Keyword Search for Service Provider */
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
     return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
       document.getElementById("livesearch").innerHTML=this.responseText; 
       document.getElementById("livesearch").style.border="1px solid red;";
     $("#servicedata").hide(); 
    }else {
          $("#servicedata").show();
    }
  }
  xmlhttp.open("GET","admin/inc/process.php?searchservice="+str,true);
  xmlhttp.send();
}
</script>

 <!--drop down menu of vertical dots-->
