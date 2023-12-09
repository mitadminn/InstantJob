<?php $page = 'Job Marketplace';
   include('inc/header.php'); 
   
   $ads = $obj->GetServiceByAds();
   $jobads = $obj->GetJobsByAds();
     
   ?>
<!-------- ASIDE SEC START -------->
<?php include('inc/sidebar.php'); ?>     
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row" id="row_job">
<div class="middle_container">
   <div id="myTabContent">
      <div class="tab-pane fade show active" id="two" role="tabpanel" aria-labelledby="two-tab">
         <div class="head-mid ">
            <h2>Job Marketplace</h2>
         </div>
         <div class="content_sec_service">
            <div class=" mid-i-p">
               <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <?php
                        $i = 1;
                        while($row = mysqli_fetch_array($jobads)){ 
                        $userid = $row['user_id'];
                        $userinfo = $obj->GetUserById($userid);
                          $postid = $row['id'];
                         $sponsordata = $obj->GetAllSponsorData($postid);
                         foreach($sponsordata as $sponsor){
                             
                              $startdate = $sponsor['startdate'];
                             if($sponsor['plan'] == '14.00') {$days = '7';}elseif($sponsor['plan'] == '50.00') {$days = '30';}
                        
                        
                                $startDate = strtotime($startdate);
                                $endDate = strtotime('+'.$days.' days', $startDate);
                                $currentDate = time();
                                
                                if ($currentDate <= $endDate) {
                                    $daysLeft = ceil(($endDate - $currentDate) / (60 * 60 * 24));
                        
                        
                        ?>
                     <div class="carousel-item <?php if($i == 1) { echo 'active';} else {} ?> p-20" style="background-image:url(admin/assets/img/services/<?=$row['photos'];?>);">
                        <div class="d-flex first-profl">
                           <div class="small-imgg">
                              <img class="sm-img" src="<?php if(!empty($data['picture'])) { echo $_SESSION['user_image']; } elseif(!empty($userinfo['ProfilePic'])) { echo 'admin/assets/img/profile/'.$userinfo['ProfilePic']; }  else { echo 'assets/img/dcc2ccd9.avif'; } ?>" alt="">
                              <p class="pp cl-w2 mr-in"><?=$userinfo['ProfileName'];?></p>
                           </div>
                           <div class="Sponsor">
                              <?php  $user_id = $_SESSION['Userid']; 
                                 if($user_idd == $_SESSION['Userid']){	
                                 ?>
                              <a class="spnsr-serv-pro" href="manage-post">Sponsored</a>  
                              <?php } else {	?>
                              <a href="create-service">Sponsored</a> 
                              <?php } ?>
                           </div>
                        </div>
                        <p class="pp2 cl-w2 w-75"><?= substr($row['topic'], 0, 80);?></p>
                     </div>
                     <?php } else {
                        // echo "Your ad is not sponsored now.";
                        // Add code here to hide the ad from the top
                        }
                        }
                        
                        $i++; } ?>
                  </div>
               </div>
            </div>
            <div id="livejobsearch"></div>
            <div id="searchdata"> </div>
            <!--<div id="servicedata">-->
            <!--<div id="searchjobdata"> </div>-->
            <div id="jobdata">
               <?php while($row=mysqli_fetch_array($jobs)){ 
                  $userid = $row['user_id'];
                  $userinfo = $obj->GetUserById($userid);
                   $text = $row['topic'];
                  $topic = $obj->slugify($text);
                  $postid= $row['id'];
                          $isGoogleImage = strpos($userinfo['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
                  if ($isGoogleImage) {
                  $userimg = $userinfo['ProfilePic'];
                  } else {
                  $userimg = 'admin/assets/img/profile/'.$userinfo['ProfilePic'];
                  }
                  
                  $price = $row['price'];
                  $formattedPrice = number_format($price, 0, '.', ',');
                  $reviews_avg = $obj->GetReviewAvgByUser($userid);
                  
                  // Calculate the average ratings for each category
                  $avg_communication_rating = number_format($reviews_avg['avg_communication_rating'], 1);
                  $avg_service_delivered_rating = number_format($reviews_avg['avg_service_delivered_rating'], 1);
                  $avg_price_budget_rating = number_format($reviews_avg['avg_price_budget_rating'], 1);
                  $avg_repeat_hire_rating = number_format($reviews_avg['avg_repeat_hire_rating'], 1);
                  // Calculate the overall average rating
                  $overall_avg_rating = number_format(($avg_communication_rating + $avg_service_delivered_rating + $avg_price_budget_rating + $avg_repeat_hire_rating) / 4, 1);
                  // Get the total number of reviews
                  $total_reviews = $reviews_avg['total_reviews'];
                  // Display the rating
                  if ($total_reviews > 0) {
                  $rating = $overall_avg_rating . ' (' . $total_reviews . ')';
                  } else {
                  $rating = 'New Member';
                  }
                  
                                      $checkproposal = $obj->CheckProposalSent($postid, $type);
                  ?> 
               <div class="service_provider_contain" style="position:relative;">
                  <div class="jobstatus">
                     <?php if($row['completed'] == 'Yes'){ echo '<span>Completed</span>'; }  elseif( $checkproposal['proposal_accept']== 'Yes') {echo '<span>Hired</span>'; }else {} ?>
                  </div>
                  <div class="outer">
                     <div class="img-p">
                        <a href="job-details?j=<?=$row['id'];?>&job=<?=$topic;?>">
                           <div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?=$row['photos'];?>" alt="">
                           </div>
                        </a>
                        <div class="all-cnt">
                           <div class="inner">
                              <a href="user-view?viewuserid=<?=$userinfo['id'];?>">
                                 <div class="d-flex two-lb align-items-center job-listing-fl  ">
                                    <div class="title_img">
                                       <img class="sm-img" src="<?=$userimg;?>" alt="">
                                       <p class="pp mr-in"><?=$userinfo['ProfileName'];?></p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <a href="job-details?j=<?=$row['id'];?>&job=<?=$topic;?>">
                              <p class="pp2" alt="<?=$row['topic'];?>"><?php echo substr($row['topic'], 0, 80);?> </p>
                              <div class="d-flex justify-content-between align-items-center amount_wrap">
                                 <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <small><?=$rating;?></small>
                                 </div>
                                 <div class="wrapper_cash_total">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                       <path fill="currentColor" d="M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z" />
                                    </svg>
                                    <!--<img class="cash-img" src="assets/img/cash.svg" >   -->
                                    <b style="color: green;">RM<?=$formattedPrice;?> <?//=$row['price_type'];?></b>
                                 </div>
                              </div>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <?php } ?>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="plus-sign">
   <a href="select-services">
      <svg class="text-light plus_svg_home" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
         <path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
      </svg>
   </a>
</div>
<?php include('inc/footer.php'); ?>
<script>
   $(document).ready(function(){
     //   $(".dislike").hide();
     //   $(".dislike").css('display','none'); 
   });
   $(document).on('click','#like',function(e){
        
     var like = $(this).attr('data-id');
     var postid = $(this).attr('post-id');
     var userid = <?=$user_id;?>;
    $.ajax({    
     type: "GET",
     url: "admin/inc/process.php?like="+like+"&postid="+postid+"&userid="+userid,             
     dataType: "html",                  
     success: function(data){                    
           $(".dislike").html(data); 
      }
   });  
   
   
   
   });
   
   
   $(document).ready(function(){
   if(navigator.geolocation){
     navigator.geolocation.getCurrentPosition(showLocation);
   }else{ 
     $('#location').html('Geolocation is not supported by this browser.');
   }
   });
   
   function showLocation(position){
   var latitude = position.coords.latitude;
   var longitude = position.coords.longitude;
   $.ajax({
     type:'POST',
     url:'getLocation.php',
     data:'latitude='+latitude+'&longitude='+longitude,
     success:function(msg){
         if(msg){
            $("#location").html(msg);
         }else{
             $("#location").html('Not Available');
         }
     }
   });
   }
</script>