<?php 
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
    $page = 'Payment Success';
    include('inc/header.php'); 
    $amounts = $_GET['price'];
    $post_id = $_GET['id'];
    $plan_id = $_GET['plan_id'];
    $amount = number_format($amounts, 2, '.', ',');
 $milestone = $obj->GetPaymentPlanByPostId($post_id);
 $plan = $obj->GetPaymentPlanById($plan_id);
    ?>
<?php include('inc/sidebar.php'); ?>      
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
  <div class="middle_container">
        <div class="head-mid people-paid">
                <h2></h2>
            </div>
            <!--                            <div class=" hidn-objct sticky msg-header">-->
            <!--    <div class="backbtn"> -->
            <!--        <a href="checkout?id=<?=$signle_service['id'];?>"><i class="fa-solid fa-arrow-left"></i></a>-->
            <!--        <span class="checkout-top-title">Payment</span>-->
            <!--    </div>-->
            <!--    <div class="prof-heigh-wid">-->
            <!--        <div class="manage-as-lo"><?=$signle_service['topic'];?></div>-->
            <!--    </div>-->
            <!--</div>-->
            <Section class="payment_bg">
                <div class="checkout_titles">
                    
     

                    <img src="" alt=""> 
                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M12 20C7.59 20 4 16.41 4 12S7.59 4 12 4 20 7.59 20 12 16.41 20 12 20M16.59 7.58L10 14.17L7.41 11.59L6 13L10 17L18 9L16.59 7.58Z" />
                    </svg>
                    <p class="cnfrm-amount">Payment Success</p>
                    <?php if(!empty($_GET['coupon'])) { ?>
             <!--<p class="">Total Amount:RM<?php echo $amount + $_GET['coupon']; ?></p>-->
            <br>
            <p><strong>Payment Summary:</strong></p>
            <p>Milestone - RM<?=$amount + $_GET['coupon'];?></p>
            <p>Coupon Amount - RM<?=$_GET['coupon'];?></p>
             
            <?php } else {} ?>
            
                    <p class="checkout_prize"><strong>RM<?=$amount;?></strong></p>
                </div>
                <div class="checkout_btn">
                    
                                   <?php
$milestones = array();

while ($miles = mysqli_fetch_array($milestone)) {
      $milestones[] = $miles['plan'];
}

$currentMilestone = $plan['plan']; // Define and set the current milestone here

$endMilestone = end($milestones);

if ($currentMilestone === $endMilestone) {
  
    // echo '<a href="">Reviews</a>';
     ?>
   
     <a href="public-reviews?id=<?=$post_id;?>&lgn=<?=$_GET['lgn'];?>&type=<?=$_GET['type'];?>&dis_id=<?=$_GET['dis_id'];?>"><button class="checkout_now pay_check">OK</button></a> 


<?php } else {

// echo '<a href="">Ok</a>';

?>
    <a href="payment-release?id=<?=$_GET['id'];?>&lgn=<?=$_GET['lgn'];?>&type=<?=$_GET['type'];?>&dis_id=<?=$_GET['dis_id'];?>"><button class="checkout_now pay_check">Ok</button></a> 
<?php } ?>

                </div>
            </Section>

    </div>

  
                <?php   include('inc/footer.php'); ?>
                
                <script type='text/javascript'>
 var sa = 'SB_honestunicorn';
 window.onload = function() {
  m = document.createElement('IFRAME');
  m.setAttribute('src', "https://sandbox.merchant.razer.com/RMS/API/chkstat/returnipn.php?treq=0&sa=" + sa);
  m.setAttribute('seamless', 'seamless');
  m.setAttribute('width', 0);
  m.setAttribute('height', 0);
  m.setAttribute('frameborder', 0);
  m.setAttribute('scrolling', 'no');
  m.setAttribute('style', 'border:none !important;');
  document.body.appendChild(m);
 };
</script>