<?php 
    $page = 'Withdrawal Confirm';
    include('inc/header.php'); 
    
    if(isset($_POST['submit'])) {
    
    $withdawal_amount = $_POST['withdawal_amount'];
    $user_name = $_POST['user_name'];
    $bank_name = $_POST['bank_name'];
    $bank_account = $_POST['bank_account'];
    $userid = $_POST['userid'];
     
    $formattedPrice = number_format($withdawal_amount, 2, '.', ',');
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
                            <form action="admin/inc/process.php?action=Withdrawal" method="post">
                                <input class="form-control bank_datail_input" type="hidden" placeholder="Name" name="user_name" value="<?php echo $user_name;?>">
                                <input class="form-control bank_datail_input" type="hidden" placeholder="Bank Name" name="bank_name" value="<?=$bank_name;?>">
                                <input class="form-control bank_datails_input" type="hidden" placeholder="Bank Account No'" name="bank_account" value="<?=$bank_account;?>">
                                <input type="hidden" class="form-control topup_input" placeholder="Amount" value="<?=$withdawal_amount;?>" name="withdawal_amount">
                                <input type="hidden" name="userid" value="<?=$userid;?>">
            
            
            <Section class="payment_bg">
                <div class="checkout_titles">
                    <img src="" alt=""> 
                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M12 20C7.59 20 4 16.41 4 12S7.59 4 12 4 20 7.59 20 12 16.41 20 12 20M16.59 7.58L10 14.17L7.41 11.59L6 13L10 17L18 9L16.59 7.58Z" />
                    </svg>
                    <p class="cnfrm-amount">Confirm Amount</p>
                    <p class="checkout_prize"><strong>RM<?=$formattedPrice;?></strong></p>
                </div>
             
                <div class="checkout_btn">
                     <button type="submit" class="checkout_now pay_check">Withdrawal</button>  
                </div>
            </Section>
</form>
    </div>

  
                <?php include('inc/footer.php'); ?>