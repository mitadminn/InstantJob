<?php 
   $page = 'Job Details';
   include('inc/header.php'); 
   
   $val = $_GET['job'];
   $postid = $_GET['j'];
   $type = 'job';
   $job =  $obj->myUrlEncode($val);
   //$job = $_GET['job'];
   $signle_job = $obj->GetJobByTopic($job);
   $userid = $signle_job['user_id'];
   $postuser = $obj->GetUserById($userid);
   $user_id = $postuser['user_id'];
   $skills = $obj->GetSkillsByUserId($user_id);
   $checkproposal = $obj->CheckProposalSent($postid, $type);
   $post_img = $obj->GetImgByTopic($job);
   $post_imgs = $obj->GetImgByTopic($job);
                  $isGoogleImage = strpos($postuser['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
           if ($isGoogleImage) {
                 $userimg = $postuser['ProfilePic'];
            } else {
                 $userimg = 'admin/assets/img/profile/'.$postuser['ProfilePic'];
           }
           
           $price = $signle_job['price'];
           $formattedPrice = number_format($price, 0, '.', ',');
   
           $user_id = $signle_job['user_id'];
           $allreviews = $obj->GetReviewsById($user_id);
   $reviews_avg = $obj->GetReviewAvgByUser($userid);
   // Calculate the average rating and total number of reviews
   $avg_rating = number_format($reviews_avg['avg_communication_rating'], 1);
   $total_reviews = $reviews_avg['total_reviews'];
   
   if(!empty($total_reviews)) {$rating = $avg_rating.' ('.$total_reviews.')';} else {$rating = 'New Member';}        
     ?>
<?php include('inc/sidebar.php'); ?> 
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
<div class="middle_container" id="myTabContent">
   <div class="tab-pane fade show active wrap_content_mid" id="one" role="tabpanel" aria-labelledby="one-tab">
      <div class="head-mid">
         <h2>Job Marketplace</h2>
      </div>
      <div>
         <!-- for image and content -->
      </div>
      <div class="mid-pro">
         <div class="profsnl-servc">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                  <?php 
                     $i=1;
                     while($rows = mysqli_fetch_array($post_imgs)){  ?>
                  <li data-target="#carouselExampleIndicators" data-slide-to="<?=$i;?>" class="<?php if($i == 1) { echo 'active';} else {} ?>"></li>
                  <?php  $i++; } ?>
               </ol>
               <div class="carousel-inner">
                  <?php 
                     $i=1;
                       while($row = mysqli_fetch_array($post_img)){ 
                       $userid = $row['user_id'];
                       $userinfo = $obj->GetUserById($userid);
                       if($signle_job['photos'] == $row['photos']) {
                     ?>
                  <div class="carousel-item <?php if($i == 1) { echo 'active';} else {} ?>">
                     <img class="pro-big-img d-block w-100" src="admin/assets/img/services/<?=$signle_job['photos'];?>" alt="First slide">
                  </div>
                  <?php } else { ?>
                  <div class="carousel-item <?php if($i == 1) { echo 'active';} else {} ?>">
                     <img class="pro-big-img d-block w-100" src="admin/assets/img/services/<?=$row['photos'];?>" alt="First slide">
                  </div>
                  <?php } $i++; } ?>
               </div>
               <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
               </a>
            </div>
            <!--craousal section END-->
            <div class="scnd-bg-clr">
               <div class="img-cir-prof">
                  <img class="sm-img-profsonal" src="<?=$userimg;?>"alt="">
                  <div class="dream-p-img">
                     <p class="pp mr-in title-name "><?php echo $postuser['ProfileName'];?></p>
                     <p class="dream-p-impro" ><img class="cir-img star-yllo" src="assets/img/star-svg.png" alt=""><?=$rating;?></p>
                  </div>
               </div>
               <div class="myr">
                  <p class="jst-now">RM<?=$formattedPrice;?></p>
               </div>
            </div>
            <div class="third-sec-profsnl">
               <div class="hd-para">
                  <div>
                     <h6><?=$signle_job['topic'];?> </h6>
                  </div>
                  <div>
                     <p> <?=$signle_job['description'];?></p>
                  </div>
               </div>
            </div>
            <div>
               <ul class="pro-ul">
                  <li>Delivery:<?=$signle_job['fast_complete'];?></li>
                  <li>Preferred Day:<?=$signle_job['prefer_day'];?></li>
               </ul>
            </div>
         </div>
         <div class="flx">
            <div class="row user-info_row">
               <div class="col-lg-8">
                  <div class="dream">
                     <?php ?>
                     <img  class="main-img profile-in_mid" src="<?php echo $userimg; ?>" alt="">
                     <div class="dream-star">
                        <h6> <?php   echo $postuser['ProfileName'];?></h6>
                        <p> <img class="small-img-star " src="assets/img/star-svg.png" alt=""><?=$rating;?></p>
                        <p>Level 3 Member </p>
                     </div>
                  </div>
                  <div class="users_all_info">
                     <div class="users_info_container">
                        <div class="">
                           <table class="table_container">
                              <tr class="table-row_top">
                                 <th><?=$postuser['Country'];?></th>
                                 <th><?php $datee = date_create($postuser['Created_at']); echo date_format($datee,"M Y"); ?></th>
                                 <th>15min</th>
                                 <th>230k+</th>
                              </tr>
                              <tr class="table-row_users">
                                 <td>Country</td>
                                 <td>Member since</td>
                                 <td>Response time</td>
                                 <td>Earning MYR</td>
                              </tr>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div  class="profile-mid_right_btns">
                     <?php  if($checkproposal['proposal_accept'] != 'Yes'){   ?>
                     <div>
                        <a href="discussion?stid=<?=$signle_job["id"];?>&lgn=<?=$_SESSION['Userid'];?>&dis_id=<?=$postuser['id']?>&type=job"><button class="sell_servc_btn <?=$appcls;?>">Send a message</button></a>
                     </div>
                     <input type="hidden" name="job-id" id="jobid" value="<?=$signle_job['id'];?>">
                     <div>
                        <?php if($appcls == 'not-approved') { ?>
                        <button data-toggle="modal" class="invite-jop-post <?=$appcls;?>">Invite to your job post</button>
                        <?php } else {?>
                        <button data-toggle="modal" data-target="#exampleModal" class="invite-jop-post <?=$appcls;?>" value="<?=$postuser['id'];?>">Invite to your job post</button>
                        <?php  }?>
                     </div>
                     <?php } elseif($signle_job['completed'] === 'Yes') {?>
                     <a href="#"><button class="sell_servc_btn" style="background:red;">Completed</button></a>
                     <?php } else {?>
                     <a href="#"><button class="sell_servc_btn" style="background:red;">Hired</button></a>
                     <input type="hidden" name="job-id" id="jobid" value="<?=$signle_job['id'];?>">
                     <div>
                        <button data-toggle="modal" data-target="#exampleModal" class="invite-jop-post" value="<?=$postuser['id'];?> <?=$appcls;?>">Invite to your job post</button>
                     </div>
                     <?php  } ?>
                  </div>
               </div>
            </div>
         </div>
         <!--title & summary 1-->
         <div class="profile-mid-content">
            <div class="title-and-para">
               <div class="bio-title">
                  <h3>Profile Bio</h3>
               </div>
               <div class="bio">
                  <p> <?php echo $postuser['ProfileBio'];?></p>
               </div>
            </div>
         </div>
         <!--title & summary 1-->
         <!--title & summary 1-->
         <div class="profile-mid-content">
            <div class="title-and-para">
               <div class="bio-title title_bio">
                  <div class="pro-bio-contain">
                     <h3>Skills</h3>
                  </div>
               </div>
               <div class="row skill_hobbies_">
                  <?php
                     foreach ($skills as $skill) {
                          if (!empty($skill['Skills'])) {
                             $skills = explode(',', $skill['Skills']);
                             foreach ($skills as $s) {
                                 echo '<p class="skills">' . $s . '</p>';
                             }
                         } else {
                             echo 'Nothing added yet';
                         }
                     }
                     ?>
               </div>
            </div>
         </div>
         <!--title & summary 1-->
         <div class="profile-mid-content">
            <div class="title-and-para">
               <div class="bio-title title_bio">
                  <div class="pro-bio-contain">
                     <h3>Interest</h3>
                  </div>
               </div>
               <div class="row skill_hobbies_">
                  <?php
                     foreach ($intrest as $interest) {
                         if (!empty($interest['Interest'])) {
                             $interests = explode(',', $interest['Interest']);
                             foreach ($interests as $i) {
                                 echo '<p class="skills">' . $i . '</p>';
                             }
                         } else {
                             echo 'Nothing added yet';
                         }
                     }
                     ?>
               </div>
            </div>
         </div>
         <!--title & summary 1-->
         <!--title & summary 2-->
         <div class="profile-mid-content">
            <div class="title-and-para">
               <div class="bio-title">
                  <h3>Qualification / Awards</h3>
               </div>
               <div class="bio-quali">
                  <p><?=$postuser['Qualifications'];?>  <?=$postuser['Year'];?></p>
               </div>
            </div>
         </div>
         <!--title & summary 2-->
         <!---->
         <!--reviews-->
         <div class="review-section hidn-aftr-fotr">
            <div class="review-sec-profile">
               <div class="bio-title fl-sm">
                  <h3>Reviews</h3>
                  <div class="show-all">
                     <a href="reviews">Show All</a>
                  </div>
               </div>
               <?php
                  $totalRating = 0; // Variable to store the sum of all rating values
                  
                  while($row = mysqli_fetch_array($allreviews)){ 
                          $userid = $row['sendby'];
                          $reviewuser = $obj->GetUserById($userid);
                        $isGoogleImage = strpos($reviewuser['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
                          if ($isGoogleImage) {
                                $userimg = $reviewuser['ProfilePic'];
                           } else {
                                $userimg = 'admin/assets/img/profile/'.$reviewuser['ProfilePic'];
                          }
                              $totalRating += $row['communication_rating'] + $row['service_delivered_rating'] + $row['price_budget_rating'] + $row['repeat_hire_rating'];
                  
                          $averageRating = $totalRating / (mysqli_num_rows($allreviews) * 4); // Divide by the total number of reviews times 4 (assuming each review has 4 rating categories)
                  $roundedRating = round($averageRating, 1); // Round the average rating to one decimal place
                  ?>
               <div class="review-content-pro">
                  <div class="star-rating-img pro-star-rt-img">
                     <img class="review-img" src="<?php echo $userimg;?>" alt="">
                     <div class="star-rating">
                        <h3><?php echo $reviewuser['ProfileName'];?></h3>
                        <?php
                           for ($i = 1; $i <= 5; $i++) {
                               if ($i <= $roundedRating) {
                                   echo '<i class="fa-solid fa-star"></i>'; // Full star
                               } else {
                                   echo '<i class="fa-solid fa-star star-gr"></i>'; // Empty star
                               }
                           }
                           ?>
                     </div>
                  </div>
                  <div class="d-m-y">
                     <p><?php 
                        $dateString = $row['created_at'];
                        $timestamp = strtotime($dateString);
                        echo $formattedDate = date('d F Y', $timestamp); ?></p>
                  </div>
               </div>
               <p><?php echo $row['public_review'];?></p>
               <?php } ?>
            </div>
         </div>
         <!--reviews-->
      </div>
   </div>
</div>
<?php if($appcls == 'not-approved') {  
   include('approve-popup.php');
   }else{} ?>
<?php include('inc/footer.php'); ?> 
<script>
   $(document).ready(function(){
       
       $('#two-tab').click(function(){
           $('.service-create').css('display', 'none')
           $('.post-create').css('display', 'block')
       });
       
        $('#one-tab').click(function(){
           $('.service-create').css('display', 'block')
           $('.post-create').css('display', 'none')
       });
       
   });
   
   
   
</script>