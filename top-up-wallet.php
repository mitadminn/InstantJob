<?php 
include('auth.php'); 
    $page = 'Wallet Top up';
    include('inc/header.php'); 
    $userid = $_GET['id'];
    
    $postuser = $obj->GetUserById($userid);
    
    ?>
<?php include('inc/sidebar.php'); ?>       
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
 <div class="refer_middle_container">
    <div class="head-mid">
        <h2>Wallet</h2>
    </div>

            <Section class="">
                <form action="admin/inc/process.php?action=TopUpWallet" method="post">
                <div class="checkout_titles">
                    <p class="checkout_para pb-2">How much do you want to top up to your instajob's wallet? </p>
                    <input type="text" class="form-control topup_input border-white text-center" placeholder="Amount" id="topup_amount" name="amount" required="">
                    <input type="hidden" name="userid" value="<?=$userid;?>">
                    <input type="hidden" name="name" value="<?=$postuser['ProfileName'];?>">
                    <input type="hidden" name="currency" value="MYR">
                    <input type="hidden" name="desc" value="<?=$signle_service['topic'];?>">
                    <input type="hidden" name="email" value="<?=$postuser['Email'];?>">
                    <input type="hidden" name="phone" value="<?=$postuser['Phone'];?>">
                </div>
                <div class="payment_methods">

                    <div class="payments_container"></div>
                    
                </div>
                <div class="text-center mt-4 btn_wallet_confirm">
 
                    <button type="submit" class="rounded btn-success btn-sucs btnm-frst   sell_servc_btn"> Confirm</button>
         
                </div>
                </form>
            </Section>
     
         </div>

    
<?php include('inc/footer.php'); ?>