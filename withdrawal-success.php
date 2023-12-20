<?php 
    $page = 'Payment Success';
    include('inc/header.php'); 
    $amounts = $_GET['amount'];
    $type = $_GET['typeof'];
    
    $amount = number_format($amounts, 2, '.', ',');

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
                    <?php if($type == 'sponsor') {?>
                    
                    <p class="cnfrm-amount">Payment Success</p>
                    <p class="checkout_prize"><strong>RM<?=$amount;?></strong></p>
                    
                    <?php }else{?>
                    <p class="cnfrm-amount">Withdrawal Success</p>
                    <p class="checkout_prize"><strong>RM<?=$amount;?></strong></p>
                    <p>It'll take to 1 to 3 days for the amount to appear in your bank account.</p>
                    <?php } ?>
                </div>
                <div class="checkout_btn">
                    <a href="wallet"><button class="checkout_now pay_check">Ok</button></a> 
                </div>
            </Section>

    </div>

  
                <?php include('inc/footer.php'); ?>