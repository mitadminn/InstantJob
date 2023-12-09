<?php 
    $page = 'Payment Success';
    include('inc/header.php'); 
     
    $con = mysqli_connect(DbHost, DbUser, DbPass, DbName) or die('Could not connect:' . mysqli_connect_error());
   
    // Escape the values to prevent SQL injection
    $skey = mysqli_real_escape_string($con, $_REQUEST['skey']);
    $tranID = mysqli_real_escape_string($con, $_REQUEST['tranID']);
    $domain = mysqli_real_escape_string($con, $_REQUEST['domain']);
    $status = mysqli_real_escape_string($con, $_REQUEST['status']);
    $amount = mysqli_real_escape_string($con, $_REQUEST['amount']);
    $currency = mysqli_real_escape_string($con, $_REQUEST['currency']);
    $paydate = mysqli_real_escape_string($con, $_REQUEST['paydate']);
    $orderid = mysqli_real_escape_string($con, $_REQUEST['orderid']);
    $appcode = mysqli_real_escape_string($con, $_REQUEST['appcode']);
    $error_code = mysqli_real_escape_string($con, $_REQUEST['error_code']);
    $error_desc = mysqli_real_escape_string($con, $_REQUEST['error_desc']);
    $channel = mysqli_real_escape_string($con, $_REQUEST['channel']);
    $extraP = mysqli_real_escape_string($con, $_REQUEST['extraP']);
    if(empty($error_code)){
            $topup = $obj->TopupSuccess($skey, $tranID, $domain, $status, $amount, $currency, $paydate, $orderid, $appcode, $error_code,$error_desc,$channel,$extraP);
            $obj->UpdateTopUpWalletStatus($orderid);
            $user_from_wallet = $obj->GetUserByOrderId($orderid);
             $_SESSION['Userid'] = $user_from_wallet['to_user_id'];
            //   header('location:payment-success?amount='.$amount);
    } elseif(!empty($error_code)){
        
        header('location:payment-failed?errorcode='.$error_code.'&error_desc='.$error_desc);
    }
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
                    <img src="" alt=""> 
                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M12 20C7.59 20 4 16.41 4 12S7.59 4 12 4 20 7.59 20 12 16.41 20 12 20M16.59 7.58L10 14.17L7.41 11.59L6 13L10 17L18 9L16.59 7.58Z" />
                    </svg>
                    <p class="cnfrm-amount">Payment Success</p>
                    <p class="checkout_prize"><strong>RM <?=$amount;?></strong></p>
                </div>
                <div class="checkout_btn">
                    <a href="wallet"><button class="checkout_now pay_check">Ok</button></a> 
                </div>
            </Section>

    </div>

  
                <?php include('inc/footer.php'); ?>
                
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