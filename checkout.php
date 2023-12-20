<?php 
    $page = 'Wallet Top up';
    include('inc/header.php'); 
    $serviceid = $_GET['id'];
    $signle_service = $obj->GetServiceById($serviceid);
    $userid = $signle_service['user_id'];
    $postuser = $obj->GetUserById($userid);
    
    ?>
<?php include('inc/sidebar.php'); ?>       
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
  <div class="middle_container">
        <div class="head-mid people-paid">
                <h2></h2>
            </div>
                  <Section class="payment_bg">
                      <div class="checkout_titles">
                          <p class="cnfrm-amount">Confirm Amount</p>
                          <p class="checkout_prize font-weight-bold">RM<?=$_GET['price'];?></p>
                          <p class="checkout_para">Always pay thgrough instant job to protect yourself, you can release the payment anytime</p>
                      </div>
                      <div class="checkout_btn">
                          <a href="summary-payment?id=<?=$signle_service['id'];?>&price=<?=$_GET['price'];?>"><button class="checkout_no pay_check">No</button></a>
                          <a href="payment-success?id=<?=$signle_service['id'];?>&price=<?=$_GET['price'];?>"><button class="checkout_now pay_check">Pay Now</button></a>
                      </div>
                  </Section>
            
			 </div>
  
                <?php include('inc/footer.php'); ?>