<?php 
    $page = 'Payment Failed';
    include('inc/header.php'); 
      $user_id = $_SESSION['Userid'];
    ?>
<?php include('inc/sidebar.php'); ?>      
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
  <div class="middle_container">
        <div class="head-mid people-paid">
                <h2></h2>
            </div>
            <section class="payment_bg">
                <div class="checkout_titles">
                    <img src="" alt=""> 
                    <p class="cnfrm-amount">Payment Failed</p>
                 </div>
                <div class="checkout_btn">
                    <a href="wallet"><button class="checkout_now pay_check">Ok</button></a> 
                </div>
            </section>

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