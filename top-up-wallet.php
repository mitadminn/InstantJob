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
        <!--<div class="col-lg-9 col-md-9" id="myTabContent">-->
            <!--<div class=" hidn-objct sticky msg-header">-->
            <!--    <div class="backbtn"> -->
            <!--        <a href="discussion-budget-summary?id=<?=$signle_service['id'];?>"><i class="fa-solid fa-arrow-left"></i></a>-->
            <!--        <span class="checkout-top-title">Top Up Wallet</span>-->
            <!--    </div>-->
            <!--    <div class="prof-heigh-wid">-->
            <!--        <div class="manage-as-lo"><?=$signle_service['topic'];?></div>-->
            <!--    </div>-->
            <!--</div>-->
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
                    <!--<div class="payment_methods_title">-->
                    <!--    <h2>Payment Methods</h2>-->
                    <!--</div>-->
                    <div class="payments_container"></div>
                    <!--<div class="online_payment_methods mb-2">-->
                    <!--    <div class="transfer_methods">-->
                    <!--        <img class="fpx_logo" src="assets/img/fpx-logo.png" alt="">-->
                    <!--        <p class="pay_online font-weight-bold">FPX Transfer</p>-->
                    <!--    </div>-->
                    <!--    <div class="transfer_methods credit_debit_methods border-0 position-relative pl-4"  data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">-->
                    <!--       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"> -->
                    <!--       <path d="M20,8H4V6H20M20,18H4V12H20M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" />-->
                    <!--       </svg>-->
                    <!--        <p class="pay_online font-weight-bold">Credit/Debit card</p>-->
                    <!--        <svg class="credit_card_svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>chevron-down</title><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>-->
                    <!--    </div>-->
                    <!--    <div  class="collapse" id="collapseExample">-->
                    <!--        <div class="card card-body p-0 rounded-0">-->
                    <!--          <ul class="list-group list-group-flush">-->
                    <!--              <div class="d-flex align-items-center dropdown_credit_wrap">-->
                    <!--              <img class="fpx_logo" src="assets/images/visa-logo.png" alt="">-->
                    <!--              <p class="pay_online font-weight-bold">8888<span class="pl-2 font-weight-bold">Expiry 05/25</span></p>-->
                    <!--              <input class="cvv_inp_wrap" type="number" placeholder="CVV" />-->
                    <!--              </div>-->
                    <!--              <div class="d-flex align-items-center dropdown_credit_wrap border-0">-->
                    <!--              <img class="fpx_logo" src="assets/images/mastercard-logo.png" alt="">-->
                    <!--              <p class="pay_online font-weight-bold">4444<span class="pl-2 font-weight-bold">Expiry 05/26</span></p>-->
                    <!--              <input class="cvv_inp_wrap" type="number" placeholder="CVV" />-->
                    <!--              </div>-->
                    <!--          </ul>-->
                    <!--    </div>-->
                    <!--        </div>     -->
                    <!--              <div class="d-flex align-items-center bank_wrap py-3 rounded pl-4">-->
                    <!--              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">-->
                    <!--                  <path d="M11.5,1L2,6V8H21V6M16,10V17H19V10M2,22H21V19H2M10,10V17H13V10M4,10V17H7V10H4Z" /></svg>-->
                    <!--              <p class="pay_online font-weight-bold">Direct Bank-in</p>-->
                    <!--              </div>-->
                    <!--</div>-->
                        <!--<p>*Top up amount RM10,000+ use Direct Bank-in</p>-->
                    
                     
                <!--<div class="field_wrapper">-->
                <!--    <div class="  cerdit_debit_cards">-->
                <!--        <i class="fa-regular fa-credit-card"></i>-->
                <!--        <p class="pay_online">Credit/Debit card</p>-->
                <!--    </div>-->
                <!--    <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fa-solid fa-plus"></i> </a>-->
                <!--</div>-->
                </div>
                <div class="text-center mt-4 btn_wallet_confirm">
                    <!--<a href="?id=<?=$signle_service['id'];?>" class="btn_confrm_topup">-->
                    <button type="submit" class="rounded btn-success btn-sucs btnm-frst   sell_servc_btn"> Confirm</button>
                    <!--</a>-->
                </div>
                </form>
            </Section>
        <!--</div>-->
         </div>

    
<?php include('inc/footer.php'); ?>