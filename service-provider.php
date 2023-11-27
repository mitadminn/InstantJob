<?php 
$page = 'Service Provider';
include('inc/header.php'); 

$ads = $obj->GetServiceByAds();
$jobads = $obj->GetJobsByAds();

?>

<link rel="stylesheet" href="assets/css/service-provider.css">
<!-------- ASIDE SEC START -------->
<?php include('inc/sidebar.php'); ?>
<!--first tab row start-->
<div class="col-sm-12 instant-main">
    <div class="row" id="row_main">
        <div class="middle_container">
            <div class="head-mid people-paid">
                <h2>Professional Services</h2>
            </div>
            <!------------------------------------------search bar new--------------------------------------------------->
            <div class="content_sec_service">
                <!--Carousel Start -->
                <div class="mid-i-p">
                   <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                     <div class="carousel-inner">
                       <?php 
                         $i=1;
                         while($row = mysqli_fetch_array($ads)){ 
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
                                            // echo "Your ad is running until " . date('Y-m-d', $endDate) . " ($daysLeft days left)";
                                     if(empty($row['photos'])) {$post_img = 'assets/img/dummy-post.jpg';} else{$post_img = "admin/assets/img/services/".$row['photos'];}


                                        
                       ?>
                       <div class="carousel-item <?php if($i == 1) { echo 'active';} else {} ?> p-20" style="background-image:url( <?=$post_img;?>);">
                         <div class="d-flex first-profl">
                           <div class="small-imgg">
                             <img class="sm-img" src="<?php if(!empty($data['picture'])) { echo $_SESSION['user_image']; } elseif(!empty($userinfo['ProfilePic'])) { echo 'admin/assets/img/profile/'.$userinfo['ProfilePic']; }  else { echo 'assets/img/dcc2ccd9.avif'; } ?>" alt="">
                             <p class="pp cl-w2 mr-in"><a href="profile?id=<?=$userid;?>"><?=$userinfo['ProfileName'];?></a></p>
                           </div>
                           <div class="Sponsor">
                             <?php  $user_id = $_SESSION['Userid']; 
                             if($user_idd == $_SESSION['Userid']){	
                             ?>
                               <a class="spnsr-serv-pro" href="manage-post.php">Sponsored</a>
                             <?php } else {	?>
                               <a href="create-service.php">Sponsored</a>
                             <?php } ?>
                           </div>
                         </div>
                         <p class=" tooltip pp2 cl-w2 w-75">
                           <?= substr($row['topic'], 0, 80);?>
                         </p>
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
                <!--Carousel End -->

                <div id="livesearch"></div>
<!--<div class="loading-overlay" style="display: none;"><div class="overlay-content">Loading.....</div>-->
<!--<div id="userData"></div>-->
                <div id="searchdata"> </div>
                <div id="servicedata">
                    <?php 
                                while($row=mysqli_fetch_array($services)){ 
                                    $userid = $row['user_id'];
                                    $postid = $row['id'];
                                    $post_type = 'service';
                                    $userinfo = $obj->GetUserById($userid);
                                    $likedislike = $obj->GetLikeDislikeByUser($user_id, $postid);
                                     $text = $row['topic'];
                                         $topic = $obj->slugify($text);
                     $isGoogleImage = strpos($userinfo['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
                    if ($isGoogleImage) {
                          $userimg = $userinfo['ProfilePic'];
                     } else {
                          $userimg = 'admin/assets/img/profile/'.$userinfo['ProfilePic'];
                    }
                    $price = $row['price'];
                    $formattedPrice = number_format($price, 0, '.', ',');
                    
                    
                    $reviews_avg = $obj->GetReviewAvgByUser($userid);
                    // Calculate the average rating and total number of reviews
                    $avg_rating = number_format($reviews_avg['avg_communication_rating'], 1);
                    $total_reviews = $reviews_avg['total_reviews'];
                    if (!empty($row['photos'])) {
                         $post_img ='admin/assets/img/services/' . $row['photos'];
                     } else {
                         $post_img = 'assets/img/dummy-post.jpg';
                        // Make sure to verify the resulting $post_img path
                    }
                    $type = 'service';
                    $checkproposal = $obj->CheckProposalSent($postid, $type);
                    if(!empty($total_reviews)) {$rating = $avg_rating.' ('.$total_reviews.')';} else {$rating = 'New Member';}        


                                 ?>
                    <div class="service_provider_contain position-relative">
                        <!--<div class="servicetatus">-->
                            <?php //if($checkproposal['proposal_accept'] == 'Yes'){ echo '<span>Hired</span>'; } else {} ?>
                        <!--</div>-->
                        <div class="likedislike">
                            <?php if($likedislike['status'] == 1) { ?>
                            <img class="heart-img " src="assets/img/hearts.png" id="dislike" alt="" data-id="2"
                                post-id="<?=$row['id'];?>" style="cursor:pointer;">

                            <?php } elseif($likedislike['status'] == 2) {   ?>
                            <img class="heart-img white_img_heart_wrap" src="assets/img/white-heart-1.png" alt="" id="updatelike"
                              data-id="1" post-id="<?=$row['id'];?>">
                            <?php } else { ?>
                            <img class="heart-img white_img_heart_wrap likehide" src="assets/img/white-heart-1.png" alt="" id="like"
                              data-id="1" post-id="<?=$row['id'];?>">
                            <?php }   ?>
                        </div>
                        <div class="outer">
                            
                            <div class="img-p">
                                
                                 <a class="name_topic" href="professional-service?t=<?=$row['id'];?>&service=<?=$topic;?>">
                                <div class="hh-1"><img class="hhh" src="<?=$post_img;?>" alt=""></div>
                                        </a>
                                <div class="all-cnt">
                                    <div class="inner">
                                        <a href="user-view.php?viewuserid=<?=$userinfo['id'];?>">
                                            <div class="d-flex two-lb align-items-center heart-img-head">
                                                <div class="img-heart-nm">
                                                    <img class="sm-img"
                                                        src="<?php echo $userimg; ?>"
                                                        alt="">
                                                    <p class="pp mr-in">
                                                        <?=$userinfo['ProfileName'];?>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    <a class="name_topic" href="professional-service?t=<?=$row['id'];?>&service=<?=$topic;?>">
                                    <p class="pp2" alt="<?=$row['topic'];?>">
                                        <?php echo substr($row['topic'], 0, 80);?>
                                    </p>
                                    
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="star">
                                            <i class="fa-solid fa-star"></i>
                                            <small><?=$rating;?></small>
                                        </div>

                                        <p><small>From </small> <b>
                                                RM<?=$formattedPrice;?>
                                                <?//=$row['price_type'];?>
                                            </b> </p>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                    </div>

                    <?php } ?>
                </div>
                <div id="skillsearch"></div>
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
  $(document).ready(function() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showLocation);
    } else {
      $("#location").html("Geolocation is not supported by this browser.");
    }

    /* LIKE */
    $(document).on("click", "#like", function(e) {
      var like = $(this).attr("data-id");
      var postId = $(this).attr("post-id");
      var userId = <?= $user_id; ?>;

      handleLikeDislike("like", like, postId, userId);
    });

    /* DISLIKE */
    $(document).on("click", "#dislike", function(e) {
      var dislike = $(this).attr("data-id");
      var postId = $(this).attr("post-id");
      var userId = <?= $user_id; ?>;

      handleLikeDislike("dislike", dislike, postId, userId);
    });

    /* UPDATE DISLIKE */
    $(document).on("click", "#updatelike", function(e) {
      var updateLike = $(this).attr("data-id");
      var postId = $(this).attr("post-id");
      var userId = <?= $user_id; ?>;

      handleLikeDislike("updatelike", updateLike, postId, userId);
    });
  });

  function handleLikeDislike(type, dataId, postId, userId) {
    $.ajax({
      type: "GET",
      url: `admin/inc/process.php?${type}=${dataId}&postid=${postId}&userid=${userId}`,
      dataType: "html",
      success: function(data) {
        location.reload();
      }
    });
  }

  function showLocation(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

    $.ajax({
      type: "POST",
      url: "getLocation.php",
      data: "latitude=" + latitude + "&longitude=" + longitude,
      success: function(msg) {
        if (msg) {
          $("#location").html(msg);
        } else {
          $("#location").html("Not Available");
        }
      }
    });
  }
</script>