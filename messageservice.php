<?php 
include('auth.php'); 
$page = 'Message Service';
   include('inc/header.php');  
   include('inc/sidebar.php'); 
   
   
   $serviceid = $_GET['stid'];
   $post_data = $obj->GetServiceById($serviceid);
   
   $post_id = $serviceid;              
                    
   // Message By Dist Notification Start
      $userid = $_GET['lgn'];
      $post_type = $_GET['type'];
      $messages = $obj->GetMessageByUserService($userid,$post_id,$post_type);
      $messages_short = $obj->GetMessageByUserServiceShortlist($userid,$post_id,$post_type);
      
      $viewuserid = $post_data['user_id']; 
      $userinfo = $obj->GetUSerByUserId($viewuserid);
      $price = $post_data['price'];
      $formattedPrice = number_format($price, 0, '.', ',');
     $reviews_avg = $obj->GetReviewAvgByUser($userid);
    // Calculate the average rating and total number of reviews
    $avg_rating = number_format($reviews_avg['avg_communication_rating'], 1);
    $total_reviews = $reviews_avg['total_reviews'];
    // Display the rating
   $avg_rating . " (" . $total_reviews . ")";
 

 
   ?>     
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
<div class="middle_container" id="myTabContent" >
   <div class="head-mid">
      <h2 class="message_title">Messages (Professional Services)</h2>
   </div>
   <!---->
   <div class="tab-content p-0">
      <!--------------------message content start----------------------------->
      <div id="message" class="tab-pane active bg-white">
      
         <!----------------------------------------------------------------------------------------------------------------------->
         <div class="bg-white   main_wrapper-msg">
               <div class="msg-srvc-wrap">
        <div class="img-p">
 
                                <div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?=$post_data['photos'];?>" alt=""></div>
                                        <!--</a>-->
                                <div class="all-cnt">
                                    <div class="inner">
                                        <a href="user-view.php?viewuserid=1">
                                            <div class="d-flex two-lb align-items-center heart-img-head">
                                                <div class="img-heart-nm">
                                                <img class="sm-img" src="<?php if(!empty($_SESSION['user_image'])) { echo $_SESSION['user_image']; } elseif(empty($_SESSION['user_image'])) { echo 'admin/assets/img/profile/'.$userinfo['ProfilePic']; }  else { echo 'assets/img/dcc2ccd9.avif'; } ?>" alt="">
                                                    <p class="pp mr-in">
                                                        <?=$userinfo["ProfileName"];?> 
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
 
                                    <p class="pp2" alt="<?=$post_data['topic'];?>">
                                        <?=$post_data['topic'];?>                                   
                                    </p>
                                    
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="star">
                                            <i class="fa-solid fa-star"></i>
                                            <small><?=$avg_rating;?> (<?=$total_reviews;?>)</small>
                                        </div>

                                        <p>
                                            <small>From </small> 
                                            <b>RM<?=$formattedPrice;?></b> 
                                        </p>
                                    </div>
                                    </a>
                                </div>
                            </div>
         </div>
         
 
         <!--Shortlisted section-->
         <div class="Shortlisted_container bg-white">
             <?php 
              

             if($post_data['user_id'] === $userid && $messages_short->num_rows > 0)  { ?>
            <div class="Shortlist_title p-2">
               <h4 class="font-weight-bold">Shortlisted</h4>
               
               <?php  while($row = mysqli_fetch_array($messages_short)) {
                //   print_r($row);
               $viewuserid = $row["from_user"]; 
             $from_user = $row["from_user"]; 
              $to_user = $userid; 
            $userinfo = $obj->GetUSerByUserId($viewuserid);
            // print_r($userinfo);
            $messageinfo = $obj->GetMessageByFromUsersByType($from_user,$to_user,$post_type,$post_id);
            // print_r($row);
            $isGoogleImage = strpos($userinfo['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
            if ($isGoogleImage) {
                  $userimg = $userinfo['ProfilePic'];
             } else {
                  $userimg = 'admin/assets/img/profile/'.$userinfo['ProfilePic'];
            }
  ?>
               <div class="d-flex   align-items-center bg-white position-relative px-0 py-1">
                  <div class="hh-1 img_notif_wrap msg_person_img">
                       
                     <img class="cir-img " src="admin/assets/img/profile/<?=$userinfo["ProfilePic"];?>" alt="">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12,10A2,2 0 0,0 10,12C10,13.11 10.9,14 12,14C13.11,14 14,13.11 14,12A2,2 0 0,0 12,10Z" />
                     </svg>
                  </div>
                  
                  <div class=" col-md-8 col-8  p-0">
                      <a href="discussion?stid=<?=$post_id;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$_GET['type'];?>">
                      <p class="senders_name"><?=$userinfo['ProfileName'];?></p>
 
                     </a>
                  </div>
                  <div class="position-relative">
                     <div class=" col-md-2 p-0" id="myButtonDrop" onclick="toggleDropdownMsgg()">
                        <svg class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                           <path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z"></path>
                        </svg>
                     </div>
                     <div id="myDropdownDrop"  class="drop_msg_list">
                        <p class="p-1"><a class="font-weight-bold text-dark" href="#" onclick="CrossOut(<?=$userinfo['id'];?>)" data-type="<?=$userinfo['ProfileName'];?>">Cross Out</a></p>
                        <p class="p-1"><a class="font-weight-bold text-dark" href="propose-quote-budget">Propose Quote</a></p>
                        <p class="p-1"><a class="font-weight-bold text-dark" href="#">Hide User</a></p>
                        <p class="p-1"><a class="font-weight-bold text-dark" href="#">Report User</a></p>
                     </div>
                  </div>
               </div>
                <?php } ?>
            </div>
            <?php } else {} ?>
            <!--Message section-->
            <div class="Shortlist_title p-2">
               <h4 class="font-weight-bold">Message</h4>
                  <?php while($row = mysqli_fetch_array($messages)) {
            $viewuserid = $row["from_user"]; 
             $from_user = $row["from_user"]; 
              $to_user = $userid; 
            $userinfo = $obj->GetUSerByUserId($viewuserid);
            // print_r($userinfo);
            $messageinfo = $obj->GetMessageByFromUsersByType($from_user,$to_user,$post_type,$post_id);
            // print_r($row);
            $isGoogleImage = strpos($userinfo['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
            if ($isGoogleImage) {
                  $userimg = $userinfo['ProfilePic'];
             } else {
                  $userimg = 'admin/assets/img/profile/'.$userinfo['ProfilePic'];
            }
 
            ?>
                <div class="d-flex   align-items-center bg-white position-relative p-2">
                  <div class="hh-1 img_notif_wrap msg_person_img">
                     
                     <img class="cir-img " src="<?=$userimg;?>" alt="<?=$userinfo['ProfileName'];?>">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12,10A2,2 0 0,0 10,12C10,13.11 10.9,14 12,14C13.11,14 14,13.11 14,12A2,2 0 0,0 12,10Z" />
                     </svg>
                  </div>
                  
                  <div class=" col-md-8 col-8  p-0">
                      <a href="discussion?stid=<?=$post_id;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$_GET['type'];?>">
                      <p class="senders_name"><?=$userinfo['ProfileName'];?>:</p>
                     <p class="notification_time font-weight-bold"><?=$formattedDate;?></p>
                     </a>
                  </div>
                  
            
                    
                  <div class=" ">
                     <div class=" col-md-2 p-0 msg-info-service" id="myButtonDrop" onclick="ExtraMenu(<?php echo $messageinfo['id']; ?>)" data-id="<?=$messageinfo['id'];?>">
                        <svg class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                           <path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z"></path>
                        </svg>
                     </div>
                     <div id="<?=$messageinfo['id'];?>"  class="drop_msg_list msg-drop-list">
 
                        <p class="p-1"><a class="font-weight-bold text-dark"  onclick="Shortlist(<?=$userinfo['id'];?>)" data-type="<?=$userinfo['ProfileName'];?>">Shortlist</a></p>
                       <?php if($user_id == $post_data['user_id']) { ?>
                        <p class="p-1"><a class="font-weight-bold text-dark" href="payment-release?id=<?=$stid;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$_GET['type'];?>">Payment Summary</a></p>

                        <p class="p-1"><a class="font-weight-bold text-dark" href="propose-quote-budget?stid=<?=$post_id;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$_GET['type'];?>&msgid=<?php echo $messageinfo['id']; ?>">Propose Quote</a></p>
                       <?php }else{} ?>
                        <p class="p-1"><a class="font-weight-bold text-dark" href="#">Hide User</a></p>
                        <p class="p-1"><a class="font-weight-bold text-dark" href="#">Report User</a></p>
                     </div>
                  </div>
                  
               </div>
               <?php   } ?>
            </div>
           
         </div>
         </div>
         <!----------------------------------------------------------------------------------------------------------------------->
         
      </div>
      <!-----------------------------------message content end-------------------->
   </div>
</div>
<?php include('inc/footer.php'); ?>
<script>
    //  drop down js of (message page)
function toggleDropdownMsgg() {
  var dropdownew = document.getElementById("myDropdownDrop");
  dropdownew.classList.toggle("shown");
}

window.onclick = function(event) {
  if (!event.target.matches('#myButtonDrop')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('shown')) {
        openDropdown.classList.remove('shown');
      }
    }
  }
}
</script>
<script>
    //  drop down js of (message page)
    
    
function toggleDropdownMsgs() {
  var dropdownews = document.getElementById("myDropdownDropp");
  dropdownews.classList.toggle("shown");
}

window.onclick = function(event) {
  if (!event.target.matches('#myButtonDrop')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('shown')) {
        openDropdown.classList.remove('shown');
      }
    }
  }
}

 
    function ExtraMenu(post_id) {
        // var post_id = $(this).data('id');
        
      document.getElementById(post_id).classList.toggle("show");
    }
 
    
    
    
    
    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
 
      if (!event.target.matches('.dropbtn')) {
    
        var dropdowns = document.getElementsByClassName("drop_msg_list");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
//  }
   
    
function toggleDropdownnnn() {
        var dropdownContentt = document.querySelector(".drop_msg_list");
        dropdownContentt.classList.toggle("show-dropdown");
      }
      
      

   
   
   
function Shortlist(userId) {
    var senderId = <?=$userid;?>; // Assuming you have a variable called 'userid' in your PHP script
    var PostId = <?=$post_id;?>; // Assuming you have a variable called 'userid' in your PHP script
    var Posttype = '<?=$post_type;?>'; // Assuming you have a variable called 'userid' in your PHP script

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "admin/inc/process.php?action=ShortList", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            if (response === "success") {
                alert("Shortlisted successfully!");
                // Redirect to another page after successful shortlisting
                window.location.reload();
            } else {
                // Handle the case where shortlisting failed
                alert("Shortlisted successfully!");
                // Redirect to another page after successful shortlisting
                window.location.reload();
            }
        }
    };
    // Concatenate multiple parameters with &
    xhr.send("userId=" + userId + "&senderId=" + senderId + "&postid=" + PostId + "&posttype=" + Posttype);
}



function CrossOut(userId) {
 var senderId = <?=$userid;?>; // Assuming you have a variable called 'userid' in your PHP script
    var PostId = <?=$post_id;?>; // Assuming you have a variable called 'userid' in your PHP script
    var Posttype = '<?=$post_type;?>'; // Assuming you have a variable called 'userid' in your PHP script

    // Send an AJAX request to update the shortlist status to 0 (cross out)
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "admin/inc/process.php?action=CrossOut", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the response from the server (if needed)
            var response = xhr.responseText;
            // Update the UI based on the response
            if (response === "success") {
                
                // Update the UI to indicate successful cross out
                alert("Crossed out successfully!");
                window.location.reload();
                // You can also update the UI further if necessary
            } else {
                // Handle the case where cross out failed
                 alert("Crossed out successfully!");
                window.location.reload();
                // alert("Failed to cross out. Please try again later.");
            }
        }
    };
    // Send the user ID and action type to the server
 
     xhr.send("userId=" + userId + "&senderId=" + senderId  + "&postid=" + PostId + "&posttype=" + Posttype);
}

      
</script>