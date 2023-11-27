<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
    $page = 'Service Sponsorship';
    include('inc/header.php');  
    include('inc/sidebar.php');  
     
    $serviceid = $_GET['id'];
    $postid = $_GET['id'];
    $price = $_GET['am'];
        $allplans = $obj->GetSponsorPlans();

    $signle_service = $obj->GetServiceById($serviceid);
    $userid = $signle_service['user_id'];
    $postuser = $obj->GetUserById($userid);
    $sponsordata = $obj->GetSponsorData($postid);
    
    $startdate = $sponsordata['startdate'];
    if(!empty($startdate)){
   if($sponsordata['plan'] == '14.00') {$days = '7';}elseif($sponsordata['plan'] == '50.00') {$days = '30';} else{}
        $startDate = strtotime($startdate);
        $endDate = strtotime('+'.$days.' days', $startDate);
        $currentDate = time();
        $TodayDate = date('Y-m-d');
        $daysLeft = ceil(($endDate - $currentDate) / (60 * 60 * 24));
          
}
$price = $signle_service['price'];
        $formattedPrice = number_format($price, 0, '.', ','); 
 $reviews_avg = $obj->GetReviewAvgByUser($userid);
// Calculate the average rating and total number of reviews
$avg_rating = number_format($reviews_avg['avg_communication_rating'], 1);
$total_reviews = $reviews_avg['total_reviews'];

    
    ?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<!--first tab row start-->
<div class="col-sm-12 instant-main" style="background: #fff">
<div class="row">
<div class="col-lg-12 col-md-12 second-mid example">
<div class="select_srvc_choice total_budget_wrapper">
<div class="card_wrapper">
<div class="main prof-inf-new active" style="">
<a href="service-provider"> 
<img class="logo_instant_jobss" src="assets/img/new-instant-logo.png" alt="">
</a>

<?php 
// Set the start date and time
// echo $startDateTime = new DateTime('2023-06-02 03:42:59');
 if(!empty($startdate)){
 
// Set the start date and time
$startDateTime = new DateTime($sponsordata['startdate']);
 
// Define the duration in days for the ad to expire
$expirationDays = $days; // Replace with the actual duration

// Calculate the expiration date by adding the duration to the start date
$expirationDateTime = clone $startDateTime;
$expirationDateTime->add(new DateInterval('P' . $expirationDays . 'D'));

// Get the current date and time
$currentDateTime = new DateTime();

// Compare the current date and time with the expiration date and time
if ($currentDateTime > $expirationDateTime) { ?>
    <p class="text-center lets sevices_topic_">Sponsor will be shown on the top , page providing visibility and recognition as a thank you for your support </p>

<div class="radio form-check">
  <label class="form-check-label check_currency">
    <input class="form-check-input"  type="radio" name="action" value="green"/>
   RM<?=$allplans['Plan1']?> for 7 days
  </label>
</div>
<div class="radio form-check">
  <label class="form-check-label check_currency">
    <input class="form-check-input"  type="radio" name="action" value="red"/>
    RM<?=$allplans['Plan2']?> for 30 days
  </label>
</div>
<?php } elseif($sponsordata['status'] == 'Yes') {

echo "<p class='text-center lets sevices_topic_'>Your ad is running until " . date('d M Y', $endDate) . " ($daysLeft days left)</p>";

}else {   } } else {?>
<p class="text-center lets sevices_topic_">Sponsor will be shown on the top , page providing visibility and recognition as a thank you for your support </p>

<div class="radio form-check">
  <label class="form-check-label check_currency">
    <input class="form-check-input"  type="radio" name="action" value="green"/>
   RM<?=$allplans['Plan1']?> for 7 days
  </label>
</div>
<div class="radio form-check">
  <label class="form-check-label check_currency">
    <input class="form-check-input"  type="radio" name="action" value="red"/>
    RM<?=$allplans['Plan2']?> for 30 days
  </label>
</div>

<?php } ?>

<div class="service_provider_contain post_spon_wrap mt-4" style="position:relative;">
                 
                        <div class="outer">
                            
                            <div class="img-p post_spon_field_data">
                                
                                 <a class="name_topic" href="professional-service?t=<?=$signle_service['id'];?>&service=<?=$topic;?>">
                                <div class="hh-1 p-0"><img class="hhh sponsor-posts" src="admin/assets/img/services/<?=$signle_service['photos'];?>"
                                        alt=""></div>
                                        </a>
                                <div class="all-cnt post_spon_post border-left-none">
                                    <div class="inner">
                                        <a href="user-view.php?viewuserid=<?=$postuser['id'];?>">
                                            <div class="d-flex two-lb align-items-center heart-img-head">
                                                <div class="img-heart-nm">
                                                    <img class="sm-img"
                                                        src="<?php if(!empty($data['picture'])) { echo $_SESSION['user_image']; } elseif(!empty($postuser['ProfilePic'])) { echo 'admin/assets/img/profile/'.$postuser['ProfilePic']; }  else { echo 'assets/img/dcc2ccd9.avif'; } ?>"
                                                        alt="">
                                                    <p class="pp mr-in">
                                                        <?=$postuser['ProfileName'];?>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    <a class="name_topic" href="professional-service?t=<?=$signle_service['id'];?>&service=<?=$topic;?>">
                                        <p class="pp2 text-left" alt="<?=$signle_service['topic'];?>">
                                            <?php echo substr($signle_service['topic'], 0, 80);?>
                                        </p>
                                        
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="star position-absolute">
                                                <i class="fa-solid fa-star"></i>
                                                 <small><?=$avg_rating;?> (<?=$total_reviews;?>)</small>
                                            </div>
    
                                            <p class="text-right"><small>From </small> <b>RM<?=$formattedPrice;?><?//=$signle_service['price_type'];?>
                                                </b> </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sponsor-top_img">
                        <img src="assets/images/sponsor-top.png" alt="sponsor-top">
                    </div>
<?php if($sponsordata['status'] == 'Yes') {}else{ ?>
        <div id="green" class="show-hide">  
    
            <a href="sponsor?postid=<?=$serviceid;?>&package=7&price=<?=$allplans['Plan1'];?>&type=service" class=" btn-check">
            <button type="button" class="rounded  btn-success btn-sucs btnm-frst w-100 post_spon_btn">Sponsor RM<?=$allplans['Plan1']?> for 7 days</button>
            </a>
        </div>
            <div id="red" class="show-hide">
             <a href="sponsor?postid=<?=$serviceid;?>&package=30&price=<?=$allplans['Plan2'];?>&type=service" class=" btn-check">
            <button type="button" class="rounded  btn-success btn-sucs btnm-frst w-100 post_spon_btn">Sponsor RM<?=$allplans['Plan2']?> for 30 days</button>
            </a>
        </div>
        <?php } ?>
          <div class="last_title">
        <div class="last_title" style="padding: 8px;">
            <?php if($sponsordata['status'] == 'Yes') { ?>
             <button type="button" class="rounded  btn-success btn-sucs btnm-frst w-100 post_spon_btn" onclick="wanttosubmit()">Submit </button>
            <?php }else{ ?>
              <p class="skip" onclick="wanttosubmit()" style="cursor: pointer; color: #0090FF">No, I don't want to sponsor</p>
            <?php } ?>
        </div>
    </div>
    
    
    <script>
        $(document).ready(function(){ 
    $("input[name=action]").change(function() {
        var test = $(this).val();
        $(".show-hide").hide();
        $("#"+test).show();
    }); 
});


    function wanttosubmit() {
        var TotalAmount = <?=$price;?>;
        var PostId = <?=$serviceid;?>;
        
      $.ajax({
           type: 'POST',
           url: 'admin/inc/process.php?action=ServiceApprovalRequest',
           data:
           {
           PostId: PostId,
           TotalAmount: TotalAmount
           },
           success: function () {
    //   window.open("manage-post?f1=all");
      window.location.href = "manage-post?f1=all";


           }
       });
       
       
       
        
    }
    </script>
                    
<?php include('inc/footer.php'); ?>