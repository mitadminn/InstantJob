<?php 
   $page = 'Add Coupon';
   include('inc/header.php'); 
   $userid = $user_id;
   $postuser = $obj->GetUserById($userid);
   
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
   <Section class="add_coupen_section bg-white p-4">
      <form action="admin/inc/process.php?action=GetCoupons" method="post">
         <div class="checkout_titles">
            <p class="checkout_para">Enter coupon code you want to redeem the credit  </p>
            <input type="text" class="form-control topup_input border" placeholder="Coupon code" id="namee" name="couponcodes" required="">
            <input type="hidden" class="form-control topup_input border" name="userid" value="<?=$postuser['id'];?>" required="">
         </div>
         <div class="confirm_title">
            <a href="?id=<?=$signle_service['id'];?>">
            <button type="submit" class="rounded btn-success btn-sucs btnm-frst w-100"> Confirm</button>
            </a>
            <p class="text-center">You can use it as payment but not withdrawal</p>
         </div>
      </form>
   </Section>
</div>
<!--</div>-->
<!--</div>-->
<?php include('inc/footer.php'); ?>