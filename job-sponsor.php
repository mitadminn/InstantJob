<?php
    $page = 'Job Sponsorship';
    include('inc/header.php');  
    include('inc/sidebar.php');  
     
    $jobid = $_GET['id'];
    $postid = $_GET['id'];
    $price = $_GET['am'];
    $allplans = $obj->GetSponsorPlans();

    $signle_service = $obj->GetJobById($jobid);
    
    $userid = $signle_service['user_id'];
    $postuser = $obj->GetUserById($userid);
    $sponsordata = $obj->GetSponsorData($postid);
      $startdate = $sponsordata['startdate'];
   $startdate = $sponsordata['startdate'];
   if(!empty($startdate)){
   if($sponsordata['plan'] == '14.00') {$days = '7';}elseif($sponsordata['plan'] == '50.00') {$days = '30';} else{}
        $startDate = strtotime($startdate);
        $endDate = strtotime('+'.$days.' days', $startDate);
        $currentDate = time();
        $TodayDate = date('Y-m-d');
        $daysLeft = ceil(($endDate - $currentDate) / (60 * 60 * 24));

}
    $user_image = '';
       if (!empty($_SESSION['user_image'])) { $user_image = $_SESSION['user_image']; } elseif (!empty($postuser['ProfilePic'])) { $user_image = 'admin/assets/img/profile/' . $postuser['ProfilePic'];
                                } else { $user_image = 'assets/img/male-1.png'; }
                                
            $price = $signle_service['price'];
           $formattedPrice = number_format($price, 0, '.', ',');                    
                                
    ?>
 <style>
     button.rounded.btn-sucs.btnm-frst.w-100 {background: #0090FF !important;}
     
 </style>
<!--first tab row start-->
<div class="col-sm-12 instant-main" style="background: #fff">
<div class="row">
<div class="col-lg-12 col-md-12 second-mid example">
<div class="select_srvc_choice total_budget_wrapper">
<div class="card_wrapper">
<div class="main prof-inf-new active" >
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
                            
                            <div class="img-p img_wrap_sponsor">
                                
                                 <a class="name_topic" href="professional-service?t=<?=$signle_service['id'];?>&service=<?=$topic;?>">
                                <div class="hh-1 p-0"><img class="hhh sponsor-posts" src="admin/assets/img/services/<?=$signle_service['photos'];?>"
                                        alt=""></div>
                                        </a>
                                <div class="all-cnt post_spon_post border-left-none">
                                    <div class="inner">
                                        <a href="user-view.php?viewuserid=<?=$postuser['id'];?>">
                                            <div class="d-flex two-lb align-items-center heart-img-head">
                                                <div class="img-heart-nm">
                                                <img class="sm-img" src="<?=$user_image;?>" alt="user image">
                                                <p class="pp mr-in"><?=$postuser['ProfileName'];?></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    <a class="name_topic" href="professional-service?t=<?=$signle_service['id'];?>&service=<?=$topic;?>">
                                    <p class="pp2 text-left" alt="<?=$signle_service['topic'];?>">
                                        <?php echo substr($signle_service['topic'], 0, 80);?>
                                    </p>
                                    
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="csh-img-div wrapper_cash_total">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z" />
                                            </svg> 
                                            <b><?=$formattedPrice;?>MYR</b>
                                        </div>

                                        <div class="wrapper_clock">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>clock-outline</title><path d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z" /></svg>
                        <?php
                            $remaining_hours =$signle_service['fast_complete']; // number of hours left
                            $now = new DateTime();
                            $end = clone $now;
                            $end->add(new DateInterval('PT'.$remaining_hours.'H'));
                            $interval = $now->diff($end);
                            $remaining_time = $interval->format('%Hhr %Ss left');
                            echo '<b class="text-dark">'.$remaining_time.'</b>'; // output: 24hr 0m 0s left
                        ?>
                       
                        </div>
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
    
            <a href="sponsor?postid=<?=$jobid;?>&package=7&price=<?=$allplans['Plan1'];?>&type=job" class=" btn-check">
            <button type="button" class="rounded btn-sucs btnm-frst w-100">Sponsor RM<?=$allplans['Plan1']?> for 7 days</button>
            </a>
        </div>
            <div id="red" class="show-hide">
             <a href="sponsor?postid=<?=$jobid;?>&package=30&price=<?=$allplans['Plan2'];?>&type=job" class=" btn-check">
            <button type="button" class="rounded btn-sucs btnm-frst w-100">Sponsor RM<?=$allplans['Plan2']?> for 30 days</button>
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
        var JobId = <?=$jobid;?>;
        
      $.ajax({
           type: 'POST',
           url: 'admin/inc/process.php?action=JobApprovalRequest',
           data:
           {
           JobId: JobId,
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