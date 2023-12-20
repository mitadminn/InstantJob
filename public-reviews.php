<?php
    $page = 'Transaction';
    include('inc/header.php');  
    include('inc/sidebar.php');
    require_once('wallett/assets/php/functions.php');

    $user_id = $_SESSION['Userid'];
    $history = $obj->getTransHistory($user_id);
    
    $user_id=$_SESSION['Userid'];
       $replacedString = $_GET['type'];
        if($replacedString == 'service') { 
            $serviceid =  $_GET['id'];
            $post_data = $obj->GetServiceById($serviceid);
            $type = $post_data['post_type'];
            $postid = $_GET['id'];
            $post_id = $post_data['id'];
            
         } elseif($replacedString == 'job'){  
              $jobid = $_GET['id'];
             $post_data = $obj->GetJobById($jobid);
             $type = $post_data['post_type'];
             $postid = $_GET['id'];
             $post_id = $post_data['id'];
          }else{}
         
          $proposaldata = $obj->GetProposalDataByPostId($post_id,$type);
          $proposaldata['price'];
          
            $servicetax = $proposaldata['price']*10/100;  
            $ssttax = $proposaldata['price']*6/100; 
            $totalprice = $servicetax + $proposaldata['price']+ $ssttax;                
                             
  
    
    $userid = $post_data['user_id'];
    $postuser = $obj->GetUserById($userid);
    
    // Reserve amount for project
 
     $isGoogleImage = strpos($postuser['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
            if ($isGoogleImage) {
                  $userimg = $postuser['ProfilePic'];
             } else {
                  $userimg = 'admin/assets/img/profile/'.$postuser['ProfilePic'];
             }
            
            $review = $obj->GetReviewsByPostIdType($postid,$type);
             $price = $post_data['price'];
        $formattedPrice = number_format($price, 2, '.', ',');
         
?>     
<div class="col-sm-12 instant-main">
<div class="row">
<div class="refer_middle_container">
    <div class="head-mid">
        <h2>Public Reviews</h2>
    </div>
    <!-- ----------------------middle one---------------------- -->
    <div class="bck-white ">
<div class="img-p   m-0">
            <a href="#">
               <div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?=$post_data['photos'];?>" alt="">
               </div>
            </a>
             <div class="all-cnt">
                                <div class="inner">
                                    <a href="user-view.php?viewuserid=1">
                                        <div class="d-flex two-lb align-items-center job-listing-fl  ">
                                            <div class="title_img">
                                                <img class="sm-img" src="<?=$userimg;?>" alt="">
                                                <p class="pp mr-in"><?=$postuser["ProfileName"];?></p>
                                            </div>
                                        </div>
                                    </a>
                                  
                                </div>
                         
 
                                <p class="pp2" alt="<?=$post_data['topic'];?>"><?=$post_data['topic'];?> </p>
                                
                                <div class="d-flex justify-content-between align-items-center amount_wrap">
 
                                    <div class="wrapper_cash_total">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z"></path>
                                        </svg>
                                      
                                        <b style="color: green;">RM<?=$formattedPrice;?></b>
                                    </div>
                                </div>
                                
                            </div>
         </div>
         <?php if(!empty($review) &&  $review['sendby'] == $user_id) { ?>
          <div  class="review-section hidn-aftr-fotr">
            <div class="review-sec-profile">
                <div class="bio-title fl-sm">
                    <h3>Reviews</h3>
                    <div class="show-all">
                        <a href="#">Show All</a>
                    </div>
                </div>
                
                <?php
                $totalRating = 0; // Variable to store the sum of all rating values

                // while($row = mysqli_fetch_array($allreviews)){ 
                        $userid = $review['sendto'];
                        $reviewuser = $obj->GetUserById($userid);
                      $isGoogleImage = strpos($reviewuser['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
                        if ($isGoogleImage) {
                              $userimg = $reviewuser['ProfilePic'];
                         } else {
                              $userimg = 'admin/assets/img/profile/'.$reviewuser['ProfilePic'];
                        }
                            $totalRating += $review['communication_rating'] + $review['service_delivered_rating'] + $review['price_budget_rating'] + $review['repeat_hire_rating'];

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
                        
                        $dateString = $review['created_at'];
                     $timestamp = strtotime($dateString);
                    echo $formattedDate = date('d F Y', $timestamp); ?></p>
                    </div>
                </div>
                <p><?php echo $review['public_review'];?></p>
                <?php //} ?>
 
            </div>
        </div>
         
         <?php } else {?>
         <form action="admin/inc/process.php?action=PublicReview" method="post">
            <input type="hidden" name="sendby" value="<?=$_GET['lgn'];?>">
            <input type="hidden" name="sendto" value="<?=$_GET['dis_id'];?>">
            <input type="hidden" name="postid" value="<?=$_GET['id'];?>">
            <input type="hidden" name="posttype" value="<?=$_GET['type'];?>">
   
    <div class="make-reviews">
        <h5 class="font-weight-bold">How satisfied are you with the experience?</h5>

        <div class="d-flex flex-review-wrap">
            <p class="review-menu">Communication</p>
            <div class="revw-star-svg">
                <div id="starrate-communication" class="starrate" data-val="0" data-max="5" data-input-name="communication_rating">
                    <span class="ctrl"></span>
                    <span class="cont m-1">
                        <i class="fas fa-fw fa-star"></i>
                        <i class="fas fa-fw fa-star"></i>
                        <i class="fas fa-fw fa-star"></i>
                        <i class="far fa-fw fa-star"></i>
                        <i class="far fa-fw fa-star"></i>
                    </span>
                </div>
            </div>
            <div>
                        <input type="hidden" name="communication_rating" id="communication-rating">
 
            </div>
        </div>

        <div class="d-flex flex-review-wrap">
            <p class="review-menu">Service Delivered</p>
            <div class="revw-star-svg">
                <div id="starrate-service-delivered" class="starrate" data-val="0" data-max="5" data-input-name="service_delivered_rating">
                    <span class="ctrl"></span>
                    <span class="cont m-1">
                        <i class="fas fa-fw fa-star"></i>
                        <i class="fas fa-fw fa-star"></i>
                        <i class="fas fa-fw fa-star"></i>
                        <i class="far fa-fw fa-star"></i>
                        <i class="far fa-fw fa-star"></i>
                    </span>
                </div>
            </div>
            <div>
                        <input type="hidden" name="service_delivered_rating" id="service-rating">
 
            </div>
        </div>

        <div class="d-flex flex-review-wrap">
            <p class="review-menu">Price Budget</p>
            <div class="revw-star-svg">
                <div id="starrate-price-budget" class="starrate" data-val="0" data-max="5" data-input-name="price_budget_rating">
                    <span class="ctrl"></span>
                    <span class="cont m-1">
                        <i class="fas fa-fw fa-star"></i>
                        <i class="fas fa-fw fa-star"></i>
                        <i class="fas fa-fw fa-star"></i>
                        <i class="far fa-fw fa-star"></i>
                        <i class="far fa-fw fa-star"></i>
                    </span>
                </div>
            </div>
            <div>
                <input type="hidden" name="price_budget_rating" id="price-rating">
 
            </div>
        </div>

        <div class="d-flex flex-review-wrap">
            <p class="review-menu">Repeat Hire Again</p>
            <div class="revw-star-svg">
                <div id="starrate-repeat-hire" class="starrate" data-val="0" data-max="5" data-input-name="repeat_hire_rating">
                    <span class="ctrl"></span>
                    <span class="cont m-1">
                        <i class="fas fa-fw fa-star"></i>
                        <i class="fas fa-fw fa-star"></i>
                        <i class="fas fa-fw fa-star"></i>
                        <i class="far fa-fw fa-star"></i>
                        <i class="far fa-fw fa-star"></i>
                    </span>
                </div>
            </div>
            <div>
                <input type="hidden" name="repeat_hire_rating" id="repeat-rating">
 
            </div>
        </div>

        <div class="my-3 review-inp-wrap">
            <h5 class="font-weight-bold">Write a public review</h5>
            <input class="review-feed-inp form-control" type="text" name="public_review" placeholder="Write something here..." />
        </div>

        <div class="my-3 review-inp-wrap">
            <h5 class="font-weight-bold">What do you think about John? This feedback will be anonymous</h5>
            <input class="review-feed-inp form-control" type="text" name="to_user_review" placeholder="Write something here..." />
        </div>

        <button class="custom-btn bnt-fill-green rounded-pill w-100">Submit</button>
    </div>
</form>
                <?php } ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function calcSliderPos(e, maxV) {
        return (e.offsetX / e.target.clientWidth) * parseInt(maxV, 10);
    }
$(".starrate").on("click", function() {
      var rating = $(this).data('val');
      var category = $(this).data('category');
      $("#test-" + category).text(rating);
      $("#" + category + "-rating").val(rating);
    });
    function updateStars(element) {
        var inputName = element.data('input-name');
        var val = parseFloat(element.data('val'));
        $("#test-" + inputName).html(val.toFixed(1));

        var full = Number.isInteger(val);
        val = parseInt(val);
        var stars = element.find("i");

        stars.slice(0, val).attr("class", "fas fa-fw fa-star");
 
        stars.slice(val, 5).attr("class", "far fa-fw fa-star");

        updateHiddenInput(inputName, val); // Update hidden input value
    }

    function updateHiddenInput(inputName, rating) {
        $('input[name="' + inputName + '"]').val(rating);
        $("#test-" + inputName).html(val.toFixed(1));
    }

    $(".starrate").on("click", function() {
        var element = $(this);
        element.data('val', valueHover);
        element.addClass('saved');
        updateStars(element);
    });

    $(".starrate").on("mouseout", function() {
        var element = $(this);
        updateStars(element);
    });

    $(".starrate span.ctrl").on("mousemove", function(e) {
        var element = $(this).closest('.starrate');
        var maxV = parseInt(element.data('max'), 10);
        valueHover = Math.ceil(calcSliderPos(e, maxV) * 2) / 2;
        updateStars(element);
    });

    $(document).ready(function() {
        $(".starrate span.ctrl").width($(".starrate span.cont").width());
        $(".starrate span.ctrl").height($(".starrate span.cont").height());
    });
</script>


                             
    </div>
</div>
<!---------------------- middle one end -------------------------->
<?php include('inc/footer.php'); ?>

 