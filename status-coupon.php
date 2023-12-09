<?php 

    $page = 'Status Coupon';
    include('inc/header.php'); 
    $userid = $user_id;
    $postuser = $obj->GetUserById($userid);
 
   $couponCode = $_GET['c'];
   $startDate = $_GET['s'];
   $endDate = $_GET['e'];
   $couponcodes = $_GET['cc'];
   $msg =  $_GET['msg'];
?>
<?php include('inc/sidebar.php'); ?>     
<style>
    @media (min-width: 0) and (max-width: 567px){
    body.background-container{
    background:#fff !important;
}
</style>
<!--first tab row start-->
<div class="col-sm-12 instant-main">
    <div class="row">    

        <div class="middle_container" id="myTabContent">
              <div class="head-mid people-paid">
                <h2></h2>
            </div>
            <?php if ($msg =='suc') { ?>
            <Section class="add_coupen_section bg-white p-4">
                
                 <div class="checkout_titles">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                         <path fill="currentColor" d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z" />
                     </svg>
                     <p class="font-weight-bold">Coupon successfully redeemed!</p>
                   <p></p>
                </div>
                <div class="confirm_title text-center">
                    <a href="add-coupon.php">
                    <button type="button" class="rounded btn-success btn-sucs btnm-frst">Ok</button>
                    </a>
                </div>
                
             </Section>
            <?php } elseif ($msg =='e') { ?>
            <Section class="add_coupen_section bg-white p-4">
                
                 <div class="checkout_titles">
                    <svg style="color: #ff0000;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M13 14H11V9H13M13 18H11V16H13M1 21H23L12 2L1 21Z" />
                    </svg>
                     <p class="font-weight-bold">Coupon has expired.</p>
                   <p></p>
                </div>
                <div class="confirm_title text-center">
                     <a href="add-coupon.php">
                    <button type="button" class="rounded btn-success btn-sucs btnm-frst">Ok</button>
                    </a>
                    <p class="text-center">You can  get back to add more!</p>
                </div>

            </Section>
            <?php } elseif ($msg =='w') { ?>
            <Section class="add_coupen_section bg-white p-4">
                
                 <div class="checkout_titles">
                    <svg style="color: #ff0000;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M13 14H11V9H13M13 18H11V16H13M1 21H23L12 2L1 21Z" />
                    </svg>
                     <p class="font-weight-bold">Invalid coupon code.</p>
                   <p></p>
                </div>
                <div class="confirm_title text-center">
                     <a href="add-coupon.php">
                    <button type="button" class="rounded btn-success btn-sucs btnm-frst">Ok</button>
                    </a>
                    <p class="text-center">You can  get back to add more!</p>
                </div>
                
             </Section>
            <?php } else{} ?>
        </div>

<?php include('inc/footer.php'); ?>