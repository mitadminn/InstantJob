<?php 
    $page = 'Summary';
    include('inc/header.php'); 
    $serviceid = $_GET['id'];
    $userid = $_GET['lgn'];
    $signle_service = $obj->AcceptProposal($serviceid);
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
            <!-- <div class=" hidn-objct sticky msg-header">-->
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
                    <p class="cnfrm-amount">Thanking you for accepting the proposal</p>
                    <!--<p class="checkout_prize"><strong>RM <?//=$amount;?></strong></p>-->
                </div>
                <div class="checkout_btn">
                    <a href="#"><button class="checkout_now pay_check">Ok</button></a> 
                </div>
            </Section>

    </div>

  
                <?php include('inc/footer.php'); ?>