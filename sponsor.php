<?php 
    $page = 'Withdrawal Confirm';
    include('inc/header.php'); 
    
    $jobid = $_GET['postid'];
    $type = $_GET['type'];
    $price = $_GET['price'];
    $allplans = $obj->GetSponsorPlans();
        if($type == 'job') {
            $signle_service = $obj->GetJobById($jobid);
        } else if($type == 'service') { 
            
            $serviceid = $jobid;
            $signle_service = $obj->GetServiceById($serviceid);
        } else{}
    
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
                            <form action="admin/inc/process.php?action=Withdrawal" method="post">
                                <input class="form-control bank_datail_input" type="hidden" placeholder="Name" name="user_name" value="<?php echo $user_name;?>">
                                <input class="form-control bank_datail_input" type="hidden" placeholder="Bank Name" name="bank_name" value="<?=$bank_name;?>">
                                <input class="form-control bank_datails_input" type="hidden" placeholder="Bank Account No'" name="bank_account" value="<?=$bank_account;?>">
                                <input type="hidden" class="form-control topup_input" placeholder="Amount" value="<?=$price;?>" name="withdawal_amount">
                                <input type="hidden" name="userid" value="<?=$userid;?>">
                                <input type="hidden" name="payment_for" value="<?=$type;?>">
                                <input type="hidden" name="postid" value="<?=$jobid;?>">
            
            <!--<div class=" hidn-objct sticky msg-header">-->
            <!--    <div class="backbtn"> -->
            <!--        <a href="checkout?id=<?=$signle_service['id'];?>"><i class="fa-solid fa-arrow-left"></i></a>-->
            <!--        <span class="checkout-top-title">Withdrawal</span>-->
            <!--    </div>-->
               
            <!--</div>-->
            <Section class="payment_bg">
                <div class="checkout_titles">
                    <img src="" alt=""> 
                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M12 20C7.59 20 4 16.41 4 12S7.59 4 12 4 20 7.59 20 12 16.41 20 12 20M16.59 7.58L10 14.17L7.41 11.59L6 13L10 17L18 9L16.59 7.58Z" />
                    </svg>
                    <p class="cnfrm-amount">Confirm Amount,  amount will be detect from your wallet.</p>
                    <p class="checkout_prize"><strong>RM<?=$price;?></strong></p>
                </div>
             
                <div class="checkout_btn">
                     <button type="submit" class="checkout_now pay_check">Confirm</button>  
                </div>
            </Section>
</form>
    </div>

  
                <?php include('inc/footer.php'); ?>