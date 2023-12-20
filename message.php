<?php 
    include('auth.php');   
    $page = 'Message';
    include('inc/header.php');   
    include('inc/sidebar.php'); 
 // Message By Dist Notification Start
    $userid = $_SESSION['Userid'];
    $Loginuserid = $_SESSION['Userid'];
    $messages = $obj->GetMessageByOnetoOneUser($userid);
    $messagesadmin = $obj->GetMessageByOnetoOneUserWithAdmin($userid);
    $messagess = $obj->GetInvitationMessageByUser($userid);
    $msg_services = $obj->GetServicesMessageByUser($userid);
    $msg_jobs = $obj->GetJobsMessageByUser($userid);
    

?>     
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
<div class="middle_container" id="myTabContent">
    <div class="head-mid">
        <h2 class="message_title">Messages</h2>
    </div>
    <!---->
    <div class="tab-content p-0">
        <!--------------------message content start----------------------------->
        <?php if($_GET['tab'] == 'msg') { ?>
        <div id="message" class="tab-pane active">
            <?php 
             $data_found = false;
            while($row = mysqli_fetch_array($messages)) {
              
                //   print_r($row);
                    $viewuserid = $row["from_user"]; 
                    $to_user = $row["to_user"]; 
                    $from_user = $row["from_user"]; 
                    // $to_user = $userid; 
                    $userinfo = $obj->GetUSerByUserId($viewuserid);
                    $data_found = true;
                    $messageinfo = $obj->GetMessageByFromUsers($from_user,$to_user);
                    $dateString = $messageinfo['date_created'];
                    $timestamp = strtotime($dateString);
                    $formattedDate = date('d F Y', $timestamp);
                    $post_id = $messageinfo['post_id'];
                    $isGoogleImage = strpos($userinfo['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
                    if ($isGoogleImage) {
                          $userimg = $userinfo['ProfilePic'];
                     } elseif($row['post_type'] == 'adminchat') {
                          $userimg =  'admin/assets/img/profile/avataaars.png';
                          $m_type = 'adminchat';
                    }
                    else {
                          $userimg = 'admin/assets/img/profile/'.$userinfo['ProfilePic'];
                          $m_type = 'direct';
                    }
                    
              
            ?>
            
                 
             <div class="d-flex my-2 align-items-center bg-white p-2 position-relative">
                  
                <a href="discussion?stid=0&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=direct&msgid=<?=$messageinfo["id"];?>">
                    <a href="discussion?stid=0&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=direct&msgid=<?=$messageinfo["id"];?>">
                <div class="hh-1 img_notif_wrap msg_person_img position-relative">
                     <img class="cir-img " src="<?=$userimg;?>" alt="<?=$userinfo['ProfileName'];?>">
                     <div data-cy="dot" class=" message-dot"  ></div>
                </div>
                <div class=" col-md-8 col-8  p-0">
                     <p class="pp mr-in title-name"><?=$userinfo['ProfileName'];?>  </p>
                   <!--<p class="senders_name">john send you a message:</p>-->
                   <a href="discussion?stid=0&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$m_type;?>&msgid=<?=$messageinfo["id"];?>"><p class="content-para p-0"><?=$messageinfo['message'];?> </p></a>
                   <!--<p class="senders_msg">"Good Day Sir "</p>-->
                   <p class="notification_time font-weight-bold"><?php echo $formattedDate; ?></p>
                </div>
                </a>
               
                  
                    </div>
                    
            <!----------------------------------------------------------------------------------------------------------------------->
            <?php   }  ?>
            
            <?php if (!$data_found) {echo '<div class="nodatafound">
     <div class="img-p">
             <div class="all-cnt">
                 <p class="pp2 no-posts"> You currently have no messages.</p>
                 
            </div>
        </div>
         
    </div>';} ?>
            
        </div>
        <!-----------------------------------message content end-------------------->
         <?php } elseif($_GET['tab'] == 'msg-job') { ?>
        <!-----------------------------------job status content start-------------------->
        <div id="job" class="tab-pane active"  >
              <?php 
               $data_found = false;
                while($row = mysqli_fetch_array($msg_jobs)) {

                    if($row['post_type'] == 'job') {
                    $postid = $row['post_id'];
                    $post_data = $obj->GetJobByPostId($postid);
                    $data_found = true;
                    $viewuserid = $post_data["user_id"]; 
                    $from_user = $post_data["from_user"]; 
                    $to_user = $userid; 
                    $userinfo = $obj->GetUSerByUserId($viewuserid);
                    $price = $post_data['price'];
                    $userid = $post_data['user_id'];
                    $formattedPrice = number_format($price, 0, '.', ',');
                    $reviews_avg = $obj->GetReviewAvgByUser($userid);
                    // Calculate the average rating and total number of reviews
                    $avg_rating = number_format($reviews_avg['avg_communication_rating'], 1);
                    $total_reviews = $reviews_avg['total_reviews'];
                 if (!empty($post_data['photos'])) {
     $post_img ='admin/assets/img/services/' . $post_data['photos'];
 } else {
     $post_img = 'assets/img/dummy-post.jpg';
    // Make sure to verify the resulting $post_img path
}

                   $isGoogleImage = strpos($userinfo['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
            if ($isGoogleImage) {
                  $userimg = $userinfo['ProfilePic'];
             } else {
                  $userimg = 'admin/assets/img/profile/'.$userinfo['ProfilePic'];
            }
              
             ?>
                            <div class="img-p">
                                   <a class="name_topic" href="messagejob?stid=<?=$postid;?>&lgn=<?=$Loginuserid;?>&dis_id=<?=$from_user;?>&type=<?=$row['post_type'];?>">
                                <div class="hh-1"><img class="hhh" src=" <?=$post_img;?>" alt="<?=$post_data['photos'];?>"></div>
                                        </a>
                                <div class="all-cnt">
                                    <div class="inner">
                                        <a href="user-view?viewuserid=<?=$userinfo['id'];?>">
                                            <div class="d-flex two-lb align-items-center heart-img-head">
                                                <div class="img-heart-nm">
                                                <img class="sm-img" src="<?=$userimg;?>" alt="<?=$userinfo['ProfilePic'];?>">
                                                    <p class="pp mr-in">
                                                        <?=$userinfo["ProfileName"];?> 
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        
                                    </div>
                                    
                                    <a class="name_topic" href="messagejob?stid=<?=$postid;?>&lgn=<?=$Loginuserid;?>&dis_id=<?=$from_user;?>&type=<?=$row['post_type'];?>">
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
            <?php } } ?>
 
            <?php if (!$data_found) {echo '<div class="nodatafound">
     <div class="img-p">
             <div class="all-cnt">
                 <p class="pp2 no-posts"> You currently have no Job.</p>
                 
            </div>
        </div>
         
    </div>';} ?>
        </div>
         <?php } elseif($_GET['tab'] == 'msg-professional') { ?>
        <div id="service" class="tab-pane active"  >
            
            <?php 
             $data_found = false;
                while($row = mysqli_fetch_array($msg_services)) {
                    
                    if($row['post_type'] == 'service'){
                    $serviceid = $row['post_id'];
                    $post_data = $obj->GetServiceById($serviceid);
                    $viewuserid = $post_data["user_id"]; 
                    $from_user = $row["from_user"]; 
                    $to_user = $userid; 
                    $userinfo = $obj->GetUSerByUserId($viewuserid);
                  $data_found = true;
                  
                  $price = $post_data['price'];
                    $userid = $post_data['user_id'];
                    $formattedPrice = number_format($price, 0, '.', ',');
                    $reviews_avg = $obj->GetReviewAvgByUser($userid);
                    // Calculate the average rating and total number of reviews
                    $avg_rating = number_format($reviews_avg['avg_communication_rating'], 1);
                    $total_reviews = $reviews_avg['total_reviews'];
            $isGoogleImage = strpos($userinfo['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
            if ($isGoogleImage) {
                  $userimg = $userinfo['ProfilePic'];
             } else {
                  $userimg = 'admin/assets/img/profile/'.$userinfo['ProfilePic'];
            }
                  if (!empty($post_data['photos'])) {
     $post_img ='admin/assets/img/services/' . $post_data['photos'];
 } else {
     $post_img = 'assets/img/dummy-post.jpg';
    // Make sure to verify the resulting $post_img path
}  
             ?>
                            <div class="img-p">
                                   <a class="name_topic" href="messageservice?stid=<?=$serviceid;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$row['post_type'];?>">
                                <div class="hh-1"><img class="hhh" src="<?=$post_img;?>" alt="<?=$post_data['photos'];?>"></div>
                                        </a>
                                <div class="all-cnt">
                                    <div class="inner">
                                        <a href="user-view?viewuserid=<?=$userinfo['id'];?>">
                                            <div class="d-flex two-lb align-items-center heart-img-head">
                                                <div class="img-heart-nm">
                                                <img class="sm-img" src="<?php echo $userimg; ?>" alt="">
                                                    <p class="pp mr-in">
                                                        <?=$userinfo["ProfileName"];?> 
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    <a class="name_topic" href="messageservice?stid=<?=$serviceid;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$row['post_type'];?>">
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
            <?php  } } ?>
             
            <?php if (!$data_found) {echo '<div class="nodatafound">
     <div class="img-p">
             <div class="all-cnt">
                 <p class="pp2 no-posts"> You currently have no Service.</p>
                 
            </div>
        </div>
         
    </div>';} ?>
        </div>
         <?php }else { }?>
    </div>
    <!-----------------------------------job status content End-------------------->
</div>
<?php include('inc/footer.php'); ?>


<script>
    //  drop down js of (message page)
function toggleDropdownMsg() {
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