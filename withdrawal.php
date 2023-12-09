<?php 
include('auth.php'); 
    $page = 'Withdrawal';
    include('inc/header.php'); 
    $user_id = $_GET['id'];
    $bankdetails = $obj->GetBankDetailsByUserId($user_id);
    $credit_balance = $obj->getCreditedBalance($user_id);
    $debit_balance = $obj->getDebitedBalance($user_id);
    $balance = $credit_balance['credit']-$debit_balance['debit'];
    
        $formattedPrice = number_format($balance, 2, '.', ',');


    ?>
<?php include('inc/sidebar.php'); ?>     
<!--first tab row start-->
<div class="col-sm-12 instant-main">
    <div class="row">
         <div class="middle_container">
        <div class="head-mid people-paid">
                <h2></h2>
            </div>
            <Section class="">
                <form action="withdrawal-confirm.php" method="post" class="p-4">
                    <div class="checkout_titles">
                        <p class="checkout_para">How much do you want to withdraw?</p>
                        <input type="text" class="form-control topup_input" placeholder="Amount" name="withdawal_amount" required="">
                        <input type="hidden" name="userid" value="<?=$_GET['id'];?>">
                    </div>
                    <div class="payment_methods">
                        <div class="payment_methods_title">
                            <h6>Bank Details</h6>
                            <input class="form-control bank_datail_input" type="text" placeholder="Name" name="user_name" value="<?php echo $user_information['ProfileName'];?>">
                            <input class="form-control bank_datail_input" type="text" placeholder="Bank Name" name="bank_name" value="<?=$bankdetails['BankName'];?>">
                            <input class="form-control bank_datails_input" type="text" placeholder="Bank Account No'" name="bank_account" value="<?=$bankdetails['AccountNumber'];?>">
                        </div>
                    </div>
                    <div class="confirm_title">
                        <button type="submit" name="submit" class="rounded btn-success btn-sucs btnm-frst w-100"> Confirm</button>
                        <p style="text-align:center;">Wallet Balance <strong>RM <?=$formattedPrice;?></strong></p>
                    </div>
                </form>
            </Section>
        </div>
<!--    </div>-->
<!--</div>-->
<?php include('inc/footer.php'); ?>