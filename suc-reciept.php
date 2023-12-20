<?php 
    $page = 'Payment Release Success';
    include('inc/header.php'); 
    $plan_id = $_GET['id'];
    $signle_plan = $obj->GetPaymentPlanById($plan_id);

    $post_id = $signle_plan['post_id'];
    if( $_GET['type'] == 'service'){
    $serviceid = $signle_plan['post_id'];
     $single_post = $obj->GetServiceById($serviceid);
    }elseif( $_GET['type'] == 'job'){ 
     $jobid = $signle_plan['post_id'];
     $single_post = $obj->GetJobById($jobid);
    }
     
    $userid = $_GET['dis_id'];
    $postuser = $obj->GetUserById($userid);
    
      $plan_price = $signle_plan['plan_price'];
      $formattedPrice = number_format($plan_price, 2, '.', ',');

?>
<?php include('inc/sidebar.php'); ?>     
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
  <div class="middle_container">
        <div class="head-mid people-paid">
                <h2></h2>
            </div>
            <div class=" hidn-objct sticky msg-header">
                <div class="backbtn"> 
                    <a href="payment-release?id=<?=$single_post['id'];?>"><i class="fa-solid fa-arrow-left"></i></a>
                    <span class="checkout-top-title">Checkout</span>
                </div>
                <div class="prof-heigh-wid">
                    <div class="manage-as-lo"><?=$single_post['topic'];?></div>
                </div>
            </div>
            <Section class="payment_bg">
                <div class="checkout_titles">
                    <div class="instant-sidebar-profile-image">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z" />
                      </svg>
                    </div>
                    <p class="w-50">Thank you for make the payment, the account department shall check and approve your payment. Once successful, you will see the status [Funded] in your milestone payment.</p>
                </div> 
                <a href="payment-release?id=<?=$_GET['stid'];?>&lgn=<?=$_GET['lgn'];?>&dis_id=<?=$_GET['dis_id'];?>&type=<?=$_GET['type'];?>"><button class="ok-btn">OK</button></a>
               
            </Section>
   </div>
  
                <?php include('inc/footer.php'); ?>