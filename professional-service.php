<?php 
    $page = 'Service Provider';
    include('inc/header.php'); 
    // $service = str_replace('-','+', $_GET['service']);
    $val = $_GET['service'];
    $service =  $obj->myUrlEncode($val);
    $job = $service;
    $postid = $_GET['t'];
    $type = 'service';
    $signle_service = $obj->GetServiceByName($service);
    $userid = $signle_service['user_id'];
    $postuser = $obj->GetUserById($userid);
    $post_img = $obj->GetImgByTopic($job);
    
    // $post_imgs = $obj->GetImgByTopic($job);
    
    $checkproposal = $obj->CheckProposalSent($postid, $type);
     
                $isGoogleImage = strpos($postuser['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
            if ($isGoogleImage) {
                  $userimg = $postuser['ProfilePic'];
             } else {
                  $userimg = 'admin/assets/img/profile/'.$postuser['ProfilePic'];
            }
            
            $price = $signle_service['price'];
            $formattedPrice = number_format($price, 0, '.', ',');
            $user_id = $signle_service['user_id'];
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
            <h2>Professional Services For Hire</h2>
        </div>
        <div>
            <!-- for image and content -->
        </div>
        <div class="mid-pro">
            <div class="profsnl-servc">
                
<!--craousal section-->

                
            <?php 
                $data_found = false; // Initialize flag variable
           ?>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                  </ol>
  <div class="carousel-inner">
      <?php 
         $i=1;
         while($row = mysqli_fetch_array($post_img)){ 
           $userid = $row['user_id'];
           $userinfo = $obj->GetUserById($userid);
           $data_found = true; // Initialize flag variable
           
           
           if(empty($row['photos'])){
              echo $photos = $signle_service['photos'];
           } else {
               
               $photos = $row['photos'];
           }
           
       ?>
    <div class="carousel-item <?php if($i == 1) { echo 'active';} else {} ?>">
      <img class="pro-big-img d-block w-100" src="admin/assets/img/services/<?=$photos;?>" alt="First slide">
    </div>
    <?php $i++; } ?>
  </div>
  <?php if (!$data_found) { } else{ ?>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <?php  } ?>
</div>
 
<!--craousal section END-->

                  
                  
                <div class="scnd-bg-clr">
                    <div class="img-cir-prof">
                        <img class="sm-img-profsonal" src="<?php echo $userimg;?>" alt="">
                        <div class="dream-p-img">
                            <p class="pp mr-in title-name "><?php echo $postuser['ProfileName'];?></p>
                            <p class="dream-p-impro" ><img class="cir-img star-yllo" src="assets/img/star-svg.png" alt=""><?=$rating;?> </p>
                        </div>
                    </div>
                    <div class="myr">
                        <p class="jst-now">RM<?=$formattedPrice;?> <?//=$signle_service['price_type'];?></p>
                    </div>
                </div>
                <div class="third-sec-profsnl">
                    <div class="hd-para">
                        <div>
                            <h6><?=$signle_service['topic'];?> </h6>
                        </div>
                        <div>
                            <p> <?=$signle_service['description'];?></p>
                        </div>
                    </div>
                </div>
                <div>
                    <ul class="pro-ul">
                        <li>Delivery:<?=$signle_service['fast_complete'];?></li>
                        <li>Preferred Day:<?=$signle_service['prefer_day'];?></li>
                    </ul>
                </div>
                <div class="row user-info_row">
                    <div class="col-lg-8">
                        <div class="dream">
                            <?php //print_r($guser);?>
                             
                            <img  class="main-img profile-in_mid" src="<?=$userimg;?>" alt="">
                           
                             
                            <div class="dream-star">
                                <h6> <?php echo $postuser['ProfileName'];?></h6>
                                <h6><?php ?></h6>
                                <p> <img class="small-img-star " src="assets/img/star-svg.png" alt=""> <?=$rating;?></p>
                                <?=$postuser['Country'];?></p>
                                <?php $datee = date_create($postuser['Created_at']); echo date_format($datee,"M Y"); ?></p>
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
                            <div>
                                <a href="discussion?stid=<?=$signle_service["id"];?>&lgn=<?=$_SESSION['Userid'];?>&dis_id=<?=$postuser['id']?>&type=service" ><button class="sell_servc_btn <?=$appcls;?>">Send a message</button></a>
                                    <input type="hidden" name="service-id" id="serviceid" value="<?=$signle_service['id'];?>">
                            </div>
                             
<!-- Button trigger modal -->
<!--Invite to your job post button start here and whole content ends in the footer-->
 <div><?php if($appcls == 'not-approved') { ?>
    <button type="button" class="invite-jop-post  <?=$appcls;?>">Invite to your job post</button>
                                     <?php } else {?>
    <button type="button" data-toggle="modal" data-target="#exampleModal" class="invite-jop-post  <?=$appcls;?>">Invite to your job post</button>
                                     <?php  }?>
</div>


                        </div>
                    </div>
                </div>
                <!---->
                <div class="row">
                    <div class="col-lg-12">
                        <!--title & summary 1-->
                        <div class="profile-mid-content">
                            <div class="title-and-para">
                                <div class="bio-title title_bio">
                                    <div class="pro-bio-contain">
                                        <h3>Profile Bio</h3>
                                    </div>
                                    <div class="edit-container">
                                    </div>
                                </div>
                                <p><?=$postuser['ProfileBio'];?></p>
                            </div>
                        </div>
                        <!--title & summary 1-->
                        <div class="profile-mid-content">
                            <div class="title-and-para">
                                <div class="bio-title title_bio">
                                    <div class="pro-bio-contain">
                                        <h3>Skills</h3>
                                    </div>
                                    <div  class="edit-container">
                                        <!--<p><a href="profile-edit">Edit</a></p>-->
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
                                    <div  class="edit-container">
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
                                <div class="bio-title title_bio">
                                    <div class="pro-bio-contain">
                                        <h3>Qualification / Awards</h3>
                                    </div>
                                    <div  class="edit-container">
                                    </div>
                                </div>
                                <div class="bio-quali">
                                    <p><?=$postuser['Qualifications'];?>  <?=$postuser['Year'];?></p>
                                </div>
                            </div>
                        </div>
                       
                        <!--title & summary 4-->
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
                            </div>                        <!--reviews-->
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
            <!--second job recruiter-->
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
<script>
    // topic script
    function charcount(str) {
    var lng = str.length ;
    document.getElementById("charcount").innerHTML = lng;
    }
</script>