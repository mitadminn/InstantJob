<?php 
//Include Google Configuration File
// include('gconfig.php');

// session_start();
// // Connect to database
// $hostname = "localhost";
// $username = "vinikuma_instant";
// $password = "instant@123$";
// $database = "vinikuma_instantjob";

// $conn = mysqli_connect($hostname, $username, $password, $database);

// // if($_SESSION['access_token'] == '') {
// // header("Location: profile");
// // } 
// //This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
// if(isset($_GET["code"]))
// { 
// //It will Attempt to exchange a code for an valid authentication token. 
// $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
// //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
// if(!isset($token['error']))
// {
// //Set the access token used for requests
// $google_client->setAccessToken($token['access_token']);
// //Store "access_token" value in $_SESSION variable for future use.
// $_SESSION['access_token'] = $token['access_token'];
// //Create Object of Google Service OAuth 2 class
// $google_service = new Google_Service_Oauth2($google_client); 
// //Get user profile data from google
// $data = $google_service->userinfo->get();

// $google_account_info = $google_service->userinfo->get();
//   $userinfo = [
//     'email' => $google_account_info['email'],
//     'first_name' => $google_account_info['givenName'],
//     'last_name' => $google_account_info['familyName'],
//     'gender' => $google_account_info['gender'],
//     'full_name' => $google_account_info['name'],
//     'picture' => $google_account_info['picture'],
//     'verifiedEmail' => $google_account_info['verifiedEmail'],
//     'token' => $google_account_info['id'],
//   ];
// // print_r($userinfo);

 
//  $sql = "SELECT * FROM users WHERE Email ='{$userinfo['email']}'";
//   $result = mysqli_query($conn, $sql);
//   if (mysqli_num_rows($result) > 0) {
//     // user is exists
//     $userinfo = mysqli_fetch_assoc($result);
//     // print_r($userinfo);
//       $token = $userinfo['token'];
//   } else {
      
//       $ProfileName = $userinfo['first_name'].' '.$userinfo['last_name'];
//       $ProfilePic = $userinfo['picture'];
      
//     // user is not exists
//       $sql = "INSERT INTO users (Email, 
//     ProfileName, 
//     ProfilePic,
//     Token) 
//     VALUES (
//         '{$userinfo['email']}', 
//         '{$ProfileName}',
//         '{$ProfilePic}', 
//         '{$userinfo['token']}')";
//      $result = mysqli_query($conn, $sql);
//     if ($result) {
//       $token = $userinfo['token'];
//     } else {
//       echo "User is not created";
//     //   die();
//     }
//   }
//   // save user data into session
//   $_SESSION['user_token'] = $token;
//   $_SESSION['google_email'] =$userinfo['email'];
// } else {
//   if (!isset($_SESSION['user_token'])) {
//     // header("Location: index.php");
//     // die();
//   }

//   // checking if user is already exists in database
//   $sql = "SELECT * FROM users WHERE Token ='{$_SESSION['user_token']}'";
//   $result = mysqli_query($conn, $sql);
//   if (mysqli_num_rows($result) > 0) {
//     // user is exists
//     $userinfo = mysqli_fetch_assoc($result);
//     // print_r($userinfo);
//   $_SESSION['google_email'] = $userinfo['Email'];
//   }
// }

//   echo $_SESSION['google_email'] = $google_account_info['email'];
// //Below you can find Get profile data and store into $_SESSION variable
// if(!empty($data['given_name']))
// {
//     $guser['ProfileName'] = $data['given_name'];
// }
// if(!empty($data['family_name']))
// {
//   $_SESSION['user_last_name'] = $data['family_name'];
// }
// if(!empty($data['email']))
// {
//   $_SESSION['user_email_address'] = $data['email'];
// }
// if(!empty($data['gender'])) 
// {
//   $_SESSION['user_gender'] = $data['gender'];
// }
// if(!empty($data['picture']))
// {
//   $_SESSION['user_image'] = $data['picture'];
// }
// }



?>  
   <style>
   .msg-png{width:25px;}
   .instant-sidebar-profile-meta .btn-primary:hover {;
background-color: #05BA50 !important;
border-color: #05BA50 !important;
}
/*   a#btn_signup_main:hover {*/
/*    background: #05BA50 !important;*/
/*    border-color: #05BA50 !important;*/
/*}*/
   .instant-sidebar-profile-meta p{margin-top: -9px;font-size: 13px;}
.cover{display:none;}
#myDIV{display:none;}
#srch_filter_contain{display:none;}
button.search-button {background: #fff; padding: 0px;}
.two_btn_head {display: inline-flex;align-items: center;}
button.btn-content-hide { background: no-repeat;padding:0;}
.btn_signup_button{   
    border-radius: 10px !important;
    padding: 10px 18px !important;
    font-size: 12px !important;
    display: block !important;
    margin: 0px auto !important;
    background: #33ad33 !important;}
/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 110px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    left: 198px;
    top: -30px;
    text-align: center;
}
/* Links inside the dropdown */
.dropdown-content a {
  color:#000;
  display: block;
  border-bottom: 1px solid #cfcccc;
  padding: 8px;
  background: #fff;
}
/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}

.dropdown a:hover {background-color: #ddd;}

.first_list_pro{    border-top: 1px solid #00000017;}


@media (min-width: 0) and (max-width: 567px){
    a#btn_anc_signup {
    background: #fff !important;
}
button.btn.btn-success.btn_signup_button {
    color: #fff !important;
    background: green !important;
    margin: 0;
    padding: 10px 30px 10px 30px !important;
}
.search-servc{width: 100% !important;border: none;}
.kmtrs {display: flex !important;justify-content: space-between !important;align-items: center !important;background: #dbdbdb;padding-left: 1.25rem;padding-right: 1.2rem;}
.contain-carousl {background: #fff;}
.search_services_cont {background: #fff;}
input.chck-box {margin: 13px;}
.label-contain label {padding: 10px;}
.form-check {padding-left: 10px !important;}
 .btn-wallet{border-radius: 28px;background: #047e04;padding: 8px 16px; width: 100%;}  
 .btn-filter{background: #fff; padding: 18px; }
 .search_services_cont {display: flex;align-items: center; padding:0 10px;}
.History_title{padding: 15px;}
.dropdown a:hover {background-color: #ddd;}
 /*button#showData{ cursor: pointer;padding: 2px;font-size: 10px; margin: 0;}*/
} 
</style>
 <div style="width:100%;">
     <!--<a class="ser-pro" href="service-provider"><img src="assets/img/new-instant-logo.png" alt=""></a>-->
                         <!-- hidden -->
 				<?php if($page == 'Manage Post'){ ?>
							<div class="d-flex hidn-objct sticky msg-header" id="msg-header">
							<div class="backbtn"> 
									<a href="account"><i class="fa-solid fa-arrow-left"></i></a>
								</div>
								
								<div class="prof-heigh-wid">
								    <div class="manage-as-lo">Manage Posts</div>
							    </div> 								
								<div class="rightsidemenu">
 								    <div><i class="fa-regular fa-bell"></i></div>
 								</div>
								
 								 
 							</div>
                         
						<?php  } elseif($page == 'Account'){ ?>
							<div class="d-flex hidn-objct">
							<div class="backbtn"> 
									<a href="service-provider"><i class="fa-solid fa-house"></i></a>
								</div>
								 
								<div class="prof-heigh-wid">
								    <a href="service-provider"> 
									   <img class="blck-logo" src="assets/img/instantjob-white-v2.png" alt="">
									</a>
							    </div> 								
								<div class="rightsidemenu">
 								    <a style="font-size:11px;" href="profile-edit?id=<?=$user_id;?>">Edit Profile</a>
 								</div>
  							</div>


						<?php  } elseif($page == 'Profile'){ ?>
							<div class="d-flex hidn-objct sticky">
								<div class="backbtn"> 
									<a href="account"><i class="fa-solid fa-arrow-left"></i></a>
								</div>
 								<div class="prof-heigh-wid">
								    <a href="service-provider"> 
									   <img class="blck-logo" src="assets/img/instantjob-white-v2.png" alt="">
									</a>
							    </div>
								 
								<div class="rightsidemenu">
								   <a style="font-size:11px;" href="profile-edit?id=<?=$user_id;?>">Edit Profile</a>
							    </div>
 							</div>

						<?php  } elseif($page == 'Reviews'){ ?>
							<div class="d-flex hidn-objct">
							
							<div class="backbtn"> 
									<a href="account"><i class="fa-solid fa-arrow-left"></i></a>
								</div>
								
								<div class="prof-heigh-wid">
								    <div class="manage-as-lo">Reviews</div>
							    </div> 								
								<div class="rightsidemenu">
 								    <div class="two_btn_head">
									<button class="search-button" onclick="myFunction()"><i class="fa-solid fa-magnifying-glass" id=""></i></button>
								    <i class="fa-regular fa-bell"></i>
									</div>
 								</div>
 							</div>
 								<!--------------------------------------search content hidden start ------------------------------------------------------------------------>
  							<?php include('search-toggle.php'); ?>
                             	<!--------------------------------------search content hidden end ------------------------------------------------------------------------>
						<?php  } elseif($page == 'Wallet'){ ?>
						<style>
						    
						   .wallet-cls {width: 100%;justify-content: center; float: left;}
						</style>
						<div class="d-flex hidn-objct">
						<div class="backbtn"> 
									<a href="account"><i class="fa-solid fa-arrow-left"></i></a>
								</div>
								
								<div class="prof-heigh-wid">
								    <div class="wallet-cls manage-as-lo">Wallet</div>
							    </div> 								
								<div class="rightsidemenu">
 								    <div>
									 
									</div>
 								</div>
								</div>
	            		<?php  } elseif($page == 'Transaction'){ ?>
							<div class="d-flex hidn-objct" style="padding:22px 0 22px 22px;">
							
							<div class="backbtn"> 
									<a href="account"><i class="fa-solid fa-arrow-left"></i></a>
								</div>
								
								<div class="prof-heigh-wid">
								    <div class="wallet-cls manage-as-lo">Transaction History</div>
							    </div> 								
								<div class="rightsidemenu">
  								    <!--<div ><i class="fa-solid fa-ellipsis-vertical"></i></div>-->
  								    <button class="btn-content-hide hide_allips" style="width: 100%; text-align: right;" ><i onclick="myFun()"class="fa-solid fa-ellipsis-vertical dropbtn"></i></button>
 								</div>
						 <!----------------three dot menu mobila view START--------------------->
                                    <div class="dropdown">
                                       <div id="myDropdown" class="dropdown-content">
                                         <a href="#">Download receipts</a>
                                         <a href="#">Contact support</a>
                                       </div>
                                     </div>
                          <!--------------------------three dot menu view End ----------------------------------->
								
								 
 							</div>
						<?php  } elseif($page == 'Refer a friend'){ ?>
							<div class="d-flex hidn-objct">
							
							<div class="backbtn"> 
									<a href="account"><i class="fa-solid fa-arrow-left"></i></a>
								</div>
								
								<div class="prof-heigh-wid">
								    <div class="manage-as-lo">Refer Friends</div>
							    </div> 								
								<div class="rightsidemenu">
								
 								    
 								</div>
								 
  							</div>
						<?php  } elseif($page == 'Contact Us'){ ?>


                        <?php  } elseif($page == 'Profile Edit'){ ?>
	                        <div class="d-flex hidn-objct sticky">
							
							<div class="backbtn"> 
									<a href="account"><i class="fa-solid fa-arrow-left"></i></a>
								</div>
 								<div class="prof-heigh-wid">
								    <a href="service-provider"> 
									   <img class="blck-logo" src="assets/img/instantjob-white-v2.png" alt="">
									</a>
							    </div>
 								<div class="rightsidemenu">
 							    </div>
								 </div>
                        <?php  } elseif($page == 'Message'){ ?>
	                        <div class="d-flex hidn-objct sticky">
								<div class="backbtn"> 
									<a href="account"><i class="fa-solid fa-arrow-left"></i></a>
								</div>
 								<div class="prof-heigh-wid">
								   <div>Messages</div>
							    </div>
 								<div class="rightsidemenu">
									<div class="trio-icon two_btn_head">
										<button class="search-button" onclick="myFunction()"><i class="fa-solid fa-magnifying-glass" id="hidden"></i></button>
										<div><i class="fa-regular fa-bell"></i></div>
										<div></div>  
										<!--<button class="btn-content-hide" ><i onclick="myFun()"class="fa-solid fa-ellipsis-vertical dropbtn"></i></button>-->
									</div>
  							    </div>
							</div>
								   <div class="d-flex scnd-hdn nav nav-tabs">
                                <a  data-toggle="tab" href="#message"><p>MESSAGES</p></a>
                                <a  data-toggle="tab" href="#job"><p>JOB STATUS</p></a>
                            </div>
			              <!----------------three dot menu mobila view START--------------------->
                                    <div class="dropdown">
                                       <div id="myDropdown" class="dropdown-content">
                                         <a href="#">Menu 1</a>
                                         <a href="#">Menu 2</a>
                                         <a href="#">Menu 3</a>
                                         <a href="#">Menu 4</a>
                                       </div>
                                     </div>
                          <!--------------------------three dot menu mobila view----------------------------------->
                          	<!--------------------------------------search content hidden ------------------------------------------------------------------------>
  							<?php include('search-toggle.php'); ?>
                             	<!--------------------------------------search content hidden ------------------------------------------------------------------------>
 							
                            
                            <?php  } elseif($page == 'Job Status'){ ?>
	                        <div class="d-flex hidn-objct sticky">
								<div class="backbtn"> 
									<a href="job-details?id=<?=$signle_job['id'];?>"><i class="fa-solid fa-arrow-left"></i></a>
								</div>
 								<div class="prof-heigh-wid">
								   <div>Messages</div>
							    </div>
 								<div class="rightsidemenu">
									<div class="trio-icon two_btn_head">
										<button class="search-button" onclick="myFunction()"><i class="fa-solid fa-magnifying-glass" id="hidden"></i></button>
										<div><i class="fa-regular fa-bell"></i></div>
										<!--<div><i class="fa-solid fa-ellipsis-vertical"></i></div>  -->
										<button class="btn-content-hide" ><i onclick="myFun()"class="fa-solid fa-ellipsis-vertical dropbtn"></i></button>
									</div>
  							    </div>
							</div>
							<!----------------three dot menu mobila view START--------------------->
                                    <div class="dropdown">
                                       <div id="myDropdown" class="dropdown-content">
                                         <a href="#">Link 1</a>
                                         <a href="#">Link 2</a>
                                         <a href="#">Link 3</a>
                                       </div>
                                     </div>
                          <!--------------------------three dot menu mobila view----------------------------------->
                          	<!--------------------------------------search content hidden ------------------------------------------------------------------------>
  							<?php include('search-toggle.php'); ?>
                             	<!--------------------------------------search content hidden ------------------------------------------------------------------------>
 								   <div class="d-flex scnd-hdn nav nav-tabs">
                                <a  data-toggle="tab" href="#message"><p>MESSAGES</p></a>
                                <a  data-toggle="tab" href="#job"><p>JOB STATUS</p></a>
                            </div>
                            
                            
                             <?php  } elseif($page == 'Job Marketplace'){ ?>
							<div class="d-flex hidn-objct sticky msg-header" id="msg-header">
								<div class="backbtn"> 
										<a href="account"><i class="fa-solid fa-house"></i></i></a>
									</div>
									
									<div class="prof-heigh-wid">
								    <a href="job-marketplace">  
									   <img class="blck-logo" src="assets/img/instantjob-white-v2.png" alt="">
									</a>
							    </div> 	
								
								<div class="rightsidemenu ">
									<div class="two_btn_head">
										 <i class="fa-regular fa-bell"></i> 
										 <button class="search-button" onclick="myFunction()"><i class="fa-solid fa-magnifying-glass" id="hidden"></i></button>
									</div>
								</div> 
  							</div>
  						  <div class="d-flex scnd-hdn">
  						      <button class="btn btn-default" value="Local" id="showData" style="">LOCAL</button>
                                <button class="btn btn-default" value="Overseas" id="showData" style="">OVERSEAS</button>
                                <!-- <a href="#"><p >Local</p></a>-->
                                <!--<a href="#"><p>Overseas</p></a>-->
  						   
                                <p class="sort">Sort by: NEW<i class="fa-solid fa-angle-down"></i></p>
                            </div>
                            <!--  <div class="d-flex scnd-hdn">-->
                            <!--     <a href="#"><p>Local</p></a>-->
                            <!--    <a href="#"><p>Overseas</p></a>-->
                            <!--    <p class="sort">Sort by: New<i class="fa-solid fa-angle-down"></i></p>-->
                            <!--</div>-->
  							<!--------------------------------------search content hidden ------------------------------------------------------------------------>
  						<?php include('search-toggle.php'); ?>
                             	<!--------------------------------------search content hidden ------------------------------------------------------------------------>
                             <!---------------search filter button content start ------------------->
                             <div class="search_filter_contain" id="srch_filter_contain">
                              <div class="search_services_cont">
                                  <a href="service-provider" style="padding: 10px; color: #000;"><i class="fa-solid fa-arrow-left"></i></a>
                                    <input type="text" id="search" name="search" class="search-servc" placeholder="Search">
                              </div>
                              <div class="History_title">
                                  <h2>History</h2>
                              </div>
                             </div>

                             <!---------------search filter button content end ------------------->
                             
  							<!--------------------------------------search content hidden ------------------------------------------------------------------------>
  						
  
                         
 
							
                       <?php  } elseif($page == 'Service Provider' || $page == 'Job Marketplace'){ ?>
							<div class="d-flex hidn-objct sticky msg-header" id="msg-header">
								<div class="backbtn"> 
										<a href="account"><i class="fa-solid fa-house"></i></i></a>
									</div>
									
									<div class="prof-heigh-wid">
								    <a href="service-provider">  
									   <img class="blck-logo" src="assets/img/instantjob-white-v2.png" alt="">
									</a>
							    </div> 	
								
								<div class="rightsidemenu ">
									<div class="two_btn_head">
										 <button class="search-button" onclick="myFunction()"><i class="fa-solid fa-magnifying-glass" id="hidden"></i></button>
										 <i class="fa-regular fa-bell"></i> 
									</div>
								</div> 
  							</div>
  						  <div class="d-flex scnd-hdn">
  						      <button class="btn btn-default" value="Local" id="showData" style="">LOCAL</button>
                                <button class="btn btn-default" value="Overseas" id="showData" style="">OVERSEAS</button>
                                <!-- <a href="#"><p >Local</p></a>-->
                                <!--<a href="#"><p>Overseas</p></a>-->
  						   
                                <p class="sort">Sort by: NEW<i class="fa-solid fa-angle-down"></i></p>
                            </div>
                            <!--  <div class="d-flex scnd-hdn">-->
                            <!--     <a href="#"><p>Local</p></a>-->
                            <!--    <a href="#"><p>Overseas</p></a>-->
                            <!--    <p class="sort">Sort by: New<i class="fa-solid fa-angle-down"></i></p>-->
                            <!--</div>-->
  							<!--------------------------------------search content hidden ------------------------------------------------------------------------>
  						<?php include('search-toggle.php'); ?>
                             	<!--------------------------------------search content hidden ------------------------------------------------------------------------>
                             <!---------------search filter button content start ------------------->
                             <div class="search_filter_contain" id="srch_filter_contain">
                              <div class="search_services_cont">
                                  <a href="service-provider" style="padding: 10px; color: #000;"><i class="fa-solid fa-arrow-left"></i></a>
                                    <input type="text" id="search" name="search" class="search-servc" placeholder="Search">
                              </div>
                              <div class="History_title">
                                  <h2>History</h2>
                              </div>
                             </div>

                             <!---------------search filter button content end ------------------->
                             
  							<!--------------------------------------search content hidden ------------------------------------------------------------------------>
  						
  
                         

							<?php  } elseif($page == 'Create Service'){ ?>
							<div class="d-flex hidn-objct sticky msg-header" id="msg-header">
									<div class="backbtn"> 
										<a href="account"><i class="fa-solid fa-arrow-left"></i></a>
									</div>
									
									<div class="prof-heigh-wid">
											<div>Sell Your Service</div>
									</div>
								
									<div class="rightsidemenu">
										<!--<div><i class="fa-solid fa-ellipsis-vertical"></i></div>  -->
										<!--<button class="btn-content-hide" ><i onclick="myFun()"class="fa-solid fa-ellipsis-vertical dropbtn"></i></button>-->
									</div>
								</div>
							<!----------------three dot menu mobila view START--------------------->
                                    <!--<div class="dropdown">-->
                                    <!--   <div id="myDropdown" class="dropdown-content">-->
                                    <!--     <a href="#">Home 1</a>-->
                                    <!--     <a href="#">Home 2</a>-->
                                    <!--     <a href="#">Home 3</a>-->
                                    <!--     <a href="#">Home 4</a>-->
                                    <!--   </div>-->
                                    <!-- </div>-->
                          <!--------------------------three dot menu mobila view----------------------------------->
  
						<?php  } elseif($page == 'Create Job'){ ?>
							<div class="d-flex hidn-objct sticky msg-header" id="msg-header">
									<div class="backbtn"> 
										<a href="account"><i class="fa-solid fa-arrow-left"></i></a>
									</div>
									
									<div class="prof-heigh-wid">
											<div>Create a Job offer</div>
									</div>
								
									<div class="rightsidemenu">
										<!--<button class="btn-content-hide" ><i onclick="myFun()"class="fa-solid fa-ellipsis-vertical dropbtn"></i></button>-->
									</div>
								</div>
 	<!----------------three dot menu mobila view START--------------------->
                                    <div class="dropdown">
                                       <div id="myDropdown" class="dropdown-content">
                                         <a href="#">Link 1</a>
                                         <a href="#">Link 2</a>
                                         <a href="#">Link 3</a>
                                       </div>
                                     </div>
                          <!--------------------------three dot menu mobila view----------------------------------->
                                      
						<?php } else {} ?>
                           <!-- hidden -->
						        

						   
                        <div class="w3-sidebar w3-light-grey w3-bar-block">
                             <div class="logo">
                                        	<a href="account"><i class="fa-solid fa-arrow-left"></i></a>
                                 <a class="ser-pro-acc" href="service-provider"><img src="assets/img/new-instant-logo.png" alt=""></a>
                                <div class="edit-pro-mob">
                                    <p><a href="">Edit profile</a></p>
                                </div>
                            </div>
							<?php //print_r($_SESSION['user_image']); ?>
							<div class="instant-sidebar-profile">
								<div class="instant-sidebar-profile-image">
								    <?php if(!empty($_SESSION['user_image'])) { ?>
                                         <img class="main-img" src="<?php echo $_SESSION['user_image'];?>" alt="">
                                    <?php } elseif(empty($_SESSION['user_image'])) { ?> 
                                         <img class="main-img img-main" src="<?php if(!empty($user_information['ProfilePic'])){ echo 'admin/assets/img/profile/'.$user_information['ProfilePic'];}else { echo 'assets/img/male-1.png';}?>" alt="">
                                    <?php } ?>
                                    <!--<img class="main-img" src="<?php // if(!empty($user_information['ProfilePic'])) { echo 'admin/assets/img/profile/'.$user_information['ProfilePic']; }  else { echo 'assets/img/user-dummy.png'; } ?>" alt="">-->
								   <!--<img src="<?php //if(!empty($guser['ProfilePic'])) { echo $guser['ProfilePic']; } elseif(!empty($_SESSION['Userid'])) { echo 'admin/assets/img/profile/'.$user_information['ProfilePic']; }  else { echo 'assets/img/dummy-profile-pic.png'; } ?>" alt="">-->

								</div>
								
								<?php //print_r($user_information['id']);?>
								<?php if(!empty($user_information['id']) ){ //&& empty($user_information['ProfileName'])){ ?> 
                                    <div class="dreamz">
                                        <div class="h-p">
                                            <h6> <?php if(!empty($guser['ProfileName'])) { echo $guser['ProfileName']; } elseif(!empty($_SESSION['Userid'])) { echo $user_information['ProfileName']; } else {}?></h6>
                                            <p> <img class="small-img-star " src="assets/img/star.svg" alt=""> New Member</p>
										</div>

                                        <div class="">
                                            <p>From: <?=$user_information['Country'];?></p>
                                            <p>Member Since: <?php $datee = date_create($user_information['Created_at']); echo date_format($datee,"M Y"); ?></p>
                                            <p>Avg.Response time:0 </p>
                                            <p>Total Earning: 0</p>
                                        </div>
                                    </div>
                                    
                                    <div class="onln-cnt">
                                        <button class="btn-on"><?php if(!empty($guser['ProfileName'])) { echo 'Online'; }  elseif(!empty($_SESSION['Userid'])) { echo 'Online'; } else { echo 'Offline';}?></button>
                                       
										<div class="batch mobile-hide"><img src="assets/img/reward.png" alt=""></div>
                                        <div class="batch desk-hide"><img src="assets/img/reward-white.png" alt=""></div>
                                        
                                        <p>Level 1 Seller</p>
                                    </div>
								<?php } else { ?>
								<div class="instant-sidebar-profile-meta sign_up_contain">
									<p>A skill marketplace for anyone to turn their spare time into-income</p>
									<a href="signin" class="btn btn-primary" id="btn_signup_main">
											Sign up, it's free
									</a>
									<!--<a href="signin"  id="btn_anc_signup">-->
         <!--                               <button type="button" class="btn btn-success btn_signup_button"> Sign up, it's free</button>-->
         <!--                           </a>-->
								</div>
								<?php } ?>
							</div>
				
                            
                             
                         <ul class="d-flex flex-column lists instant-sidebar-menu">
                                    <li class="first_list_pro">
                        <a href="service-provider">
                            			 <svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path fill="currentColor" d="M20,6C20.58,6 21.05,6.2 21.42,6.59C21.8,7 22,7.45 22,8V19C22,19.55 21.8,20 21.42,20.41C21.05,20.8 20.58,21 20,21H4C3.42,21 2.95,20.8 2.58,20.41C2.2,20 2,19.55 2,19V8C2,7.45 2.2,7 2.58,6.59C2.95,6.2 3.42,6 4,6H8V4C8,3.42 8.2,2.95 8.58,2.58C8.95,2.2 9.42,2 10,2H14C14.58,2 15.05,2.2 15.42,2.58C15.8,2.95 16,3.42 16,4V6H20M4,8V19H20V8H4M14,6V4H10V6H14Z" />
</svg>
                             <!--<img class="pro-jobs-servc" href="service-provider" src="assets/img/briefcase-outline-final.png" alt="">-->
                            <!-- <img src="https://mitdevelop.com/instajobs/assets/img/account-box-outline-svg.png" /> -->
                            <span>Professional service</span>
                        </a>
                    </li>
                           <li class="first_list_pro">
                        <a href="job-marketplace">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M16 3.23C16.71 2.41 17.61 2 18.7 2C19.61 2 20.37 2.33 21 3C21.63 3.67 21.96 4.43 22 5.3C22 6 21.67 6.81 21 7.76S19.68 9.5 19.03 10.15C18.38 10.79 17.37 11.74 16 13C14.61 11.74 13.59 10.79 12.94 10.15S11.63 8.71 10.97 7.76C10.31 6.81 10 6 10 5.3C10 4.39 10.32 3.63 10.97 3C11.62 2.37 12.4 2.04 13.31 2C14.38 2 15.27 2.41 16 3.23M22 19V20L14 22.5L7 20.56V22H1V11H8.97L15.13 13.3C16.25 13.72 17 14.8 17 16H19C20.66 16 22 17.34 22 19M5 20V13H3V20H5M19.9 18.57C19.74 18.24 19.39 18 19 18H13.65C13.11 18 12.58 17.92 12.07 17.75L9.69 16.96L10.32 15.06L12.7 15.85C13 15.95 15 16 15 16C15 15.63 14.77 15.3 14.43 15.17L8.61 13H7V18.5L13.97 20.41L19.9 18.57Z" />
            </svg>
                             <!--<img class="pro-jobs-servc" href="job-marketplace" src="assets/img/hand-heart-final.png" alt="">-->
                            <!-- <img src="https://mitdevelop.com/instajobs/assets/img/account-box-outline-svg.png" /> -->
                            <span>Job marketplace</span>
                        </a>
                    </li>
                           <li class="first_list_pro">
                        <a href="<?php if(!empty($guser['ProfileName'])) { echo 'message'; } elseif(empty($user_information['ProfileName']) && !empty($_SESSION['Userid'])){ echo 'profile-info'; } elseif(!empty($_SESSION['Userid'])) { echo 'message'; }  else { echo 'signin';}?>" onclick="showPosition();">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M20 2H4C2.9 2 2 2.9 2 4V22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2M20 16H5.2L4 17.2V4H20V16M17 11H15V9H17M13 11H11V9H13M9 11H7V9H9" />
              </svg>
                             <!--<img class="pro-jobs-servc msg-png" href="message" src="assets/img/message.png" alt="">-->
                            <!-- <img src="https://mitdevelop.com/instajobs/assets/img/account-box-outline-svg.png" /> -->
                            <span>Message</span>
                        </a>
                    </li>
                    <li class="first_list_pro">
                        <a href="<?php if(!empty($guser['ProfileName'])) { echo 'profile'; } elseif(empty($user_information['ProfileName']) && !empty($_SESSION['Userid'])){ echo 'profile-info'; } elseif(!empty($_SESSION['Userid'])) { echo 'profile'; }  else { echo 'signin';}?>" onclick="showPosition();">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M19,19H5V5H19M19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M16.5,16.25C16.5,14.75 13.5,14 12,14C10.5,14 7.5,14.75 7.5,16.25V17H16.5M12,12.25A2.25,2.25 0 0,0 14.25,10A2.25,2.25 0 0,0 12,7.75A2.25,2.25 0 0,0 9.75,10A2.25,2.25 0 0,0 12,12.25Z" />
                            </svg>
                            <!-- <img src="https://mitdevelop.com/instajobs/assets/img/account-box-outline-svg.png" /> -->
                            <span>Public Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php if(!empty($guser['ProfileName'])) { echo 'review-only'; } elseif(empty($user_information['ProfileName']) && !empty($_SESSION['Userid'])){ echo 'profile-info'; } elseif(!empty($_SESSION['Userid'])) { echo 'review-only'; } else { echo 'signin';}?>">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M23 7.5L16.53 6.96L14 1L11.47 6.96L5 7.5L9.9 11.77L8.44 18.1L14 14.74L19.56 18.1L18.09 11.77L23 7.5M16.14 12.23L16.54 13.94L15.03 13.03L14 12.41L12.97 13.03L11.46 13.94L11.85 12.23L12.13 11.05L11.22 10.26L9.88 9.1L11.64 8.95L12.84 8.85L13.31 7.74L14 6.12L14.69 7.74L15.16 8.85L16.36 8.95L18.11 9.1L16.78 10.26L15.86 11.05L16.14 12.23M1.16 12C.861 11.5 .989 10.89 1.45 10.59L4.18 8.79L5.75 10.15L2.55 12.26C2.38 12.37 2.19 12.43 2 12.43C1.68 12.43 1.36 12.27 1.16 12M1.45 20.16L7.31 16.31L7 17.76L6.66 19.13L2.55 21.84C2.38 21.95 2.19 22 2 22C1.68 22 1.36 21.84 1.16 21.55C.861 21.09 .989 20.47 1.45 20.16M7.32 11.5L8.24 12.31L7.97 13.5L2.55 17.05C2.38 17.16 2.19 17.21 2 17.21C1.68 17.21 1.36 17.06 1.16 16.76C.861 16.3 .989 15.68 1.45 15.38L7.32 11.5Z" />
                            </svg>
                            <!-- <img src="https://mitdevelop.com/instajobs/assets/img/star-shooting-outline-svg.png" /> -->
                            <span>Reviews</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php if(!empty($guser['ProfileName'])) { echo 'manage-post'; } elseif(empty($user_information['ProfileName']) && !empty($_SESSION['Userid'])){ echo 'profile-info'; } elseif(!empty($_SESSION['Userid'])) { echo 'manage-post'; } else { echo 'signin';}?>" onclick="showPosition();">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M3 3V21H21V3H3M18 18H6V17H18V18M18 16H6V15H18V16M18 12H6V6H18V12Z" />
                            </svg>
                            <!-- <img src="https://mitdevelop.com/instajobs/assets/img/post-svg.png" /> -->
                            <span>Manage Posts</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php if(!empty($guser['ProfileName'])) { echo 'wallet'; } elseif(empty($user_information['ProfileName']) && !empty($_SESSION['Userid'])){ echo 'profile-info'; } elseif(!empty($_SESSION['Userid'])) { echo 'wallet'; } else { echo 'signin';}?>">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M5,3C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V16.72C21.59,16.37 22,15.74 22,15V9C22,8.26 21.59,7.63 21,7.28V5A2,2 0 0,0 19,3H5M5,5H19V7H13A2,2 0 0,0 11,9V15A2,2 0 0,0 13,17H19V19H5V5M13,9H20V15H13V9M16,10.5A1.5,1.5 0 0,0 14.5,12A1.5,1.5 0 0,0 16,13.5A1.5,1.5 0 0,0 17.5,12A1.5,1.5 0 0,0 16,10.5Z" />
                            </svg>
                            <!-- <img src="https://mitdevelop.com/instajobs/assets/img/wallet-outline-svg.png" /> -->
                            <span>Wallet</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php if(!empty($guser['ProfileName'])) { echo 'transaction'; } elseif(empty($user_information['ProfileName']) && !empty($_SESSION['Userid'])){ echo 'profile-info'; } elseif(!empty($_SESSION['Userid'])) { echo 'transaction'; } else { echo 'signin';}?>">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M21 11.11V5C21 3.9 20.11 3 19 3H14.82C14.4 1.84 13.3 1 12 1S9.6 1.84 9.18 3H5C3.9 3 3 3.9 3 5V19C3 20.11 3.9 21 5 21H11.11C12.37 22.24 14.09 23 16 23C19.87 23 23 19.87 23 16C23 14.09 22.24 12.37 21 11.11M12 3C12.55 3 13 3.45 13 4S12.55 5 12 5 11 4.55 11 4 11.45 3 12 3M5 19V5H7V7H17V5H19V9.68C18.09 9.25 17.08 9 16 9H7V11H11.1C10.5 11.57 10.04 12.25 9.68 13H7V15H9.08C9.03 15.33 9 15.66 9 16C9 17.08 9.25 18.09 9.68 19H5M16 21C13.24 21 11 18.76 11 16S13.24 11 16 11 21 13.24 21 16 18.76 21 16 21M16.5 16.25L19.36 17.94L18.61 19.16L15 17V12H16.5V16.25Z" />
                            </svg>
                            <!-- <img src="https://mitdevelop.com/instajobs/assets/img/clipboard-text-clock-outline-svg.png" /> -->
                            <span>Transaction History</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php if(!empty($guser['ProfileName'])) { echo 'refer'; } elseif(empty($user_information['ProfileName']) && !empty($_SESSION['Userid'])){ echo 'profile-info'; } elseif(!empty($_SESSION['Userid'])) { echo 'refer'; } else { echo 'signin';}?>">
                         <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                               <path fill="currentColor" d="M10.59,13.41C11,13.8 11,14.44 10.59,14.83C10.2,15.22 9.56,15.22 9.17,14.83C7.22,12.88 7.22,9.71
                              9.17,7.76V7.76L12.71,4.22C14.66,2.27 17.83,2.27 19.78,4.22C21.73,6.17 21.73,9.34 19.78,11.29L18.29,12.78C18.3,11.96 18.17,11.14
                              17.89,10.36L18.36,9.88C19.54,8.71 19.54,6.81 18.36,5.64C17.19,4.46 15.29,4.46 14.12,5.64L10.59,9.17C9.41,10.34 9.41,12.24
                              10.59,13.41M13.41,9.17C13.8,8.78 14.44,8.78 14.83,9.17C16.78,11.12 16.78,14.29 14.83,16.24V16.24L11.29,19.78C9.34,21.73 6.17,21.73
                              4.22,19.78C2.27,17.83 2.27,14.66 4.22,12.71L5.71,11.22C5.7,12.04 5.83,12.86 6.11,13.65L5.64,14.12C4.46,15.29 4.46,17.19
                              5.64,18.36C6.81,19.54 8.71,19.54 9.88,18.36L13.41,14.83C14.59,13.66 14.59,11.76 13.41,10.59C13,10.2 13,9.56 13.41,9.17Z" />
                              </svg>
                            <!-- <img src="https://mitdevelop.com/instajobs/assets/img/link-variant-svg.png" /> -->
                            <span>Refer Friends</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php if(!empty($guser['ProfileName'])) { echo 'contact'; } elseif(empty($user_information['ProfileName']) && !empty($_SESSION['Userid'])){ echo 'profile-info'; } elseif(!empty($_SESSION['Userid'])) { echo 'contact'; } else { echo 'signin';}?>">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M19.79,15.41C20.74,13.24 20.74,10.75 19.79,8.59L17.05,9.83C17.65,11.21 17.65,12.78 17.06,14.17L19.79,15.41M15.42,4.21C13.25,3.26 10.76,3.26 8.59,4.21L9.83,6.94C11.22,6.35 12.79,6.35 14.18,6.95L15.42,4.21M4.21,8.58C3.26,10.76 3.26,13.24 4.21,15.42L6.95,14.17C6.35,12.79 6.35,11.21 6.95,9.82L4.21,8.58M8.59,19.79C10.76,20.74 13.25,20.74 15.42,19.78L14.18,17.05C12.8,17.65 11.22,17.65 9.84,17.06L8.59,19.79M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,8A4,4 0 0,0 8,12A4,4 0 0,0 12,16A4,4 0 0,0 16,12A4,4 0 0,0 12,8Z" />
                            </svg>
                            <!-- <img src="https://mitdevelop.com/instajobs/assets/img/lifebuoy-svg.png" /> -->
                            <span>Contact Support</span>
                        </a>
                    </li>
					<?php if(!empty($guser['ProfileName'] || !empty($_SESSION['Userid']))) { ?>
					<?php //if(!empty($guser['ProfileName'] || !empty($user_information['ProfileName']))) { ?>
					<li>
                        <a href="logout">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                  <path fill="currentColor"
                                 d="M14.08,15.59L16.67,13H7V11H16.67L14.08,8.41L15.5,7L20.5,12L15.5,17L14.08,15.59M19,3A2,2 0 0,1
                                 21,5V9.67L19,7.67V5H5V19H19V16.33L21,14.33V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3
                                 5,3H19Z" />
                                 </svg>
							
                            <!-- <img src="https://mitdevelop.com/instajobs/assets/img/lifebuoy-svg.png" /> -->
                            <span>Logout</span>
                        </a>
                    </li>
					<?php } else {}?>
					
                </ul>
                       </div> 
                    </div>
        <!-------------------------------------------search bar content script------------------------------------------------------------------>
     <script>
const accordionBtns = document.querySelectorAll(".accordion");
accordionBtns.forEach((accordion) => {
  accordion.onclick = function () {
    this.classList.toggle("is-open");

    let content = this.nextElementSibling;
    console.log(content);

    if (content.style.maxHeight) {
      //this is if the accordion is open
      content.style.maxHeight = null;
    } else {
      //if the accordion is currently closed
      content.style.maxHeight = content.scrollHeight + "px";
      console.log(content.style.maxHeight);
    }
  };
});
                 </script>
               
               
                 <!--mobile search popup script-->
      <script>
function myFunction() {
  var x = document.getElementById("myDIV");
  
  if (x.style.display === "block") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
<!--search filter -->
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFun() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
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
  <!--mobile search popup script-->  
        <!-------------------------------------------search bar content script------------------------------------------------------------------>
                    

                    
                    
                          
                
                   
  
  