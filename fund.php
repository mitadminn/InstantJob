<?php 
   $page = 'fund';
   include('inc/header.php'); 
   $plan_id = $_GET['id'];
   $signle_plan = $obj->GetPaymentPlanById($plan_id);
   // $userid = $signle_plan['userid'];
   // $postuser = $obj->GetUserById($userid);
   $actual_amnt = $signle_plan['plan_price'];
   
   $post_id = $signle_plan['post_id'];
   if( $_GET['type'] == 'service'){
   $serviceid = $signle_plan['post_id'];
    $single_post = $obj->GetServiceById($serviceid);
   }elseif( $_GET['type'] == 'job'){ 
    $jobid = $signle_plan['post_id'];
    $single_post = $obj->GetJobById($jobid);
   }
    
   $userid = $_GET['dis_id'];
   $postuser = $obj->GetUserById($userid);
   
    $servicetax = $actual_amnt*10/100;
    $ssttax = $actual_amnt*6/100;
    
                     $servicetaxx = number_format($servicetax, 2, '.', ',');
                     $ssttaxx = number_format($ssttax, 2, '.', ',');
   
   //  / Wallet / 
   $user_id=$_SESSION['Userid'];
   $credit_balance = $obj->getCreditedBalance($user_id);
   $debit_balance = $obj->getDebitedBalance($user_id);
   $balance = $credit_balance['credit']-$debit_balance['debit'];
   $t_amount =  $servicetax + $actual_amnt+ $ssttax;
   
   
    ?>
<?php include('inc/sidebar.php'); ?>     
<style>
.check-box-green{
    width:16px;
    height:16px;
}
   button.no-btn {
   background: #7c7c7c;
   padding: 8px 30px;
   border-radius: 8px;
   }
   button.proceed-btn {
   background: #00C853;
   color: #fff;
   border-radius: 8px;
   padding: 8px 30px;
   }
   .form-btn {
   gap:40px;
   }
   .guide-wrap{
   width: 500px;
   margin: 0 auto;
   }
   .guide-detailes p {
   font-size: 15px;
   }
   img.logo_instant_jobs {
   width: 85%;
   }
   .hidden {
   display: none;
   }
   label.checkbox-coupon {
   font-size: 17px;
   margin-left: 10px;
   }
   .checkinp-inp:checked + label {
   color: #00ab47;  
   }
   .checkinp-inp {
   accent-color:#00ab47;
   }
   .checkinp-inp {
   color: #00ab47;
   }
   .guides-title {
   background: #0090FF ;
   color: #fff;
   text-align: left;
   padding: 10px 10px 10px 55px;
   width: 88%;
   }
   p.cnfrm-amounts {
   width: 50%;
   margin:0 auto;
   }
   .fund-back-btn{
   border-radius: 34px; border: 1px solid #e4e4e4; padding: 5px;width: 106px;float: left;color: #000;font-weight: 600;margin-right: 10;}
   @media (min-width:0) and (max-width:567px) {
   .guide-wrap{
   width: 320px;
   }
    .guides-title {
   padding: 10px 10px 10px 24px;
   }
   }
</style>
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
<div class="middle_container">
   <div class="head-mid people-paid">
      <h2></h2>
   </div>
   <div class=" hidn-objct sticky msg-header">
      <div class="backbtn"> 
         <a href="payment-release?id=<?=$single_post['id'];?>"><i class="fa-solid fa-arrow-left"></i></a>
         <span class="checkout-top-title">Checkout</span>
      </div>
      <div class="prof-heigh-wid">
         <div class="manage-as-lo"><?=$single_post['topic'];?></div>
      </div>
   </div>
   <?php if ($balance < $t_amount) { ?>
   <Section class="payment_bg p-0 h-100">
      <div class="checkout_titles">
         <a href="service-provider"> 
         <img class="logo_instant_jobs" src="assets/img/new-instant-logo.png" alt="">
         </a>
         <p class="cnfrm-amount">How do you want to fund this milestone?</p>
         <p class="cnfrm-amounts">You have insufficient funds in your
            wallet, please in choose your payment
            method to fund this milestone.
         </p>
         <form class="text-left" >
            <div>
               <input type="radio" name="content" value="content2" onclick="changeContent()" style="width:unset;" checked> <label for="css"> Credit Card</label><br>
               <input type="radio" name="content" value="content3" onclick="changeContent()" style="width:unset;"> <label for="javascript"> Bank-in transfer</label>
            </div>
         </form>
         <div>
         </div>
         <!--Credit card details-->
         <div id="content1" class="hidden">
            <p class="font-weight-bold">{Milestone_name}</p>
            <p class="">Total Amount:RM1,740.00</p>
            <br>
            <p>Payment Summary:</p>
            <p>Project fee - RM1,500.00</p>
            <p>Service fee - RM150.00</p>
            <p>6% SST - RM90.00</p>
            <div class="py-4 d-flex align-items-center">
               <input type="checkbox" name="coupon"   class="checkinp-inp custom-checkbox"> <label class="checkbox-coupon font-weight-bold" for="coupon">Use Coupon Credit: RM40.00</label>
            </div>
         </div>
         <div id="content2" class="hidden">
            <p class="font-weight-bold">{Milestone_name}</p>
            <p class="">Total Amount:RM1,740.00</p>
            <br>
            <p>Payment Summary:</p>
            <p>Project fee - RM1,500.00</p>
            <p>Service fee - RM150.00</p>
            <p>6% SST - RM90.00</p>
            <div class="py-4 d-flex align-items-center">
               <input type="checkbox" name="coupon"    class="checkinp-inp custom-checkbox"> <label class="checkbox-coupon font-weight-bold" for="coupon">Use Coupon Credit: RM40.00</label>
            </div>
         </div>
         <!--Bank-in transfer details-->
         <div id="content3" class="hidden">
            <p style="width:50%; margin:0 auto;text-align:center;" class="py-2">Please bank-in the amount you wish topup your wallet to fund this milestone, then upload your receipt here.</p>
            <p class="font-weight-bold">{Milestone_name}</p>
            <p class="">Total Amount:RM1,740.00</p>
            <div class=" py-3">
               <p class="font-weight-bold">Step-1</p>
               <p class="cnfrm-amounts">Bank-in the exact total amount RM1,740.00 to our bank account below, put your mobile no. as a refrence.</p>
            </div>
            <div><img src="assets/images/UOBLogo.png" class="mt-4" style="width:100px;"></div>
            <br>
            <p class="font-weight-bold">Bank Name:<span>UOB BANK</span></p>
            <p class="font-weight-bold">Name:<span>INSTANTJOB SDN BHD</span></p>
            <p class="font-weight-bold">Bank ACC<span>:2353015178</span></p>
            <div class=" py-4">
               <p class="font-weight-bold">Step-2</p>
               <!-- Button trigger modal -->
               <button type="button" class="btn btn-primary P-0" data-toggle="modal" data-target="#exampleModalCenter">
                  <p class="">Upload your<a class="text-decoration-underline" href="#"> Bank-in receipt click here</a></p>
               </button>
               <!-- Modal -->
               <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="title-and-para">
                              <div class="bio-title edit_profile_bio_wrap">
                                 <h3>Portfolio</h3>
                              </div>
                              <div class="bio-img-portfolio">
                                 <div class="upload__box">
                                    <div class="upload__btn-box">
                                       <label class="upload__btn">
                                          <p class="plus_btn_upload">+</p>
                                          <input type="hidden" name="id" value="1">
                                          <input type="file" multiple="" class="form-control upload__inputfile" name="portfolio[]" data-max_length="20">
                                       </label>
                                       <div class="all-images profile_all_img-wrap">
                                          <div class="upload__img-box">
                                             <input type="hidden" multiple="" class="form-control upload__inputfile" name="editimage[]" value="page-intro-01.png">
                                             <div style="background-image: url(&quot;admin/assets/img/portfolio/page-intro-01.png&quot;);  " data-number="0" data-file="page-intro-01.png" class="add-img photo img-bg">
                                                <div class="upload__img-close close  img-wrap">
                                                   <span id="del" class="edit_img-close">×</span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="upload__img-box">
                                             <input type="hidden" multiple="" class="form-control upload__inputfile" name="editimage[]" value="page-intro-02.jpg">
                                             <div style="background-image: url(&quot;admin/assets/img/portfolio/page-intro-02.jpg&quot;);  " data-number="1" data-file="page-intro-02.jpg" class="add-img photo img-bg">
                                                <div class="upload__img-close close  img-wrap">
                                                   <span id="del" class="edit_img-close">×</span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="upload__img-wrap d-flex flex-wrap"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="mt-3">
         <form action="" method="" class="form-btn d-flex justify-content-center   flex-wrap">
            <button type="submit" class="no-btn">Back</button> 
            <button type="submit" class="proceed-btn">Proceed</button> 
         </form>
      </div>
      <div class="mt-5">
         <p class="font-weight-bold guides-title">Please Read: Credit card instructions</p>
      </div>
      <div class="guide-wrap ">
         <ul class="guide-detailes text-left py-2">
            <li>You can fund the milestone with a credit card,
               but please be aware of the following:
            </li>
            <li>To ensure the security of our Hirers and Service
               Providers against potential credit card fraud or
               chargebacks, the funded milestone will be
               locked for a minimum of "4 working days".
            </li>
            <li>The quickest way for you to "Release funds" to
               your service provider, we recommend using
               Bank-in transfer to InstantJob instead.
            </li>
         </ul>
      </div>
      <div class="mt-3">
         <p class="font-weight-bold guides-title">More guides you might find useful:</p>
      </div>
      <div class="guide-wrap ">
         <ul class="guide-detailes text-left py-2">
            <li>If you want the service provider to begin
               work, you are required to fund the milestone
               for that specific task or stage.
            </li>
            <li>Your funds will be securely held in our escrow
               system until you choose to release them,
               giving you peace of mind and service providers to start their work with confidence.
            </li>
            <li>You should only release the funds when you
               are satisfied with the work.
            </li>
            <li>In certain cases, you have the option to
               release funds in advance if your service
               providers need money to purchase raw
               materials on your behalf.
            </p>
            <li>Releasing funds in advance carries a possible
               risk, similar to real-life situations, and is an
               arrangement solely between you and the
               service providers.
            </li>
            <li>For each project, InstantJob applies a service
               fee of 10% or up to RM1,000 (max). This fee
               plays a crucial role in supporting our platform
               services, empowering our dedicated staff,
               and reinforcing the security of our escrow
               system, all aimed at prioritizing your
               protection.
            </li>
            <li>If you have any questions or concerns, please
               reach out to our support team.
            </li>
         </ul>
      </div>
   </Section>
   <?php } else { 
                ?>
                <Section class="payment_bg p-0 h-100">
      <div class="checkout_titles">
         <a href="service-provider"> 
         <img class="logo_instant_jobs" src="assets/img/new-instant-logo.png" alt="">
         </a>
          <p class="cnfrm-amounts">Based on your wallet balance, you can fund the milestone. </p>
         
         <div>
         </div>
         <!--Credit card details-->
         <div id="content1" class="hidden">
            <p class="font-weight-bold">Milestone : <?=$signle_plan['plan'];?></p>
            <p class="">Total Amount:RM<?php echo number_format($t_amount, 2, '.', ',');?></p>
            <br>
            <p>Payment Summary:</p>
            <p>Milestone - RM<?=$actual_amnt;?></p>
            <p>Service fee - RM<?=$servicetaxx;?></p>
            <p>6% SST - RM<?=$ssttaxx;?></p>
            <div class="py-4 d-flex align-items-center">
               <input type="checkbox" name="coupon"  style="width: 16px;height: 16px;" class=" check-box-green checkinp-inp custom-checkbox"> <label class="checkbox-coupon font-weight-bold" for="coupon">Use Coupon Credit: RM40.00</label>
            </div>
         </div>
         <div id="content2" class="hidden">
            <p class="font-weight-bold">{Milestone_name}</p>
            <p class="">Total Amount:RM1,740.00</p>
            <br>
            <p>Payment Summary:</p>
            <p>Project fee - RM1,500.00</p>
            <p>Service fee - RM150.00</p>
            <p>6% SST - RM90.00</p>
            <div class="py-4 d-flex align-items-center">
               <input type="checkbox" name="coupon"  style="width: 16px;height: 16px;" class=" check-box-green checkinp-inp custom-checkbox"> <label class="checkbox-coupon font-weight-bold" for="coupon">Use Coupon Credit: RM40.00</label>
            </div>
         </div>
         
      </div>
      <div class="mt-3">
          
            <form action="admin/inc/process.php?action=FundPayment" method="post">
                                <input type="hidden" class="form-control topup_input" placeholder="Amount" value="<?php echo $servicetax + $signle_plan['plan_price']+ $ssttax;?>" name="withdawal_amount">
                                <input type="hidden" name="userid" value="<?=$_SESSION['Userid'];?>">
                                <input type="hidden" name="payment_for" value="<?=$_GET['type'];?>">
                                <input type="hidden" name="postid" value="<?=$single_post['id'];?>">
                                <input type="hidden" name="reciever" value="<?=$userid;?>">
                                <input type="hidden" name="planid" value="<?=$plan_id;?>">
                                <input type="hidden" name="topic" value="<?=$single_post['topic'];?>">
                                <input type="hidden" name="milestone" value="<?=$signle_plan['plan'];?>">
                            <a class="fund-back-btn"  href="payment-release?id=<?=$single_post['id'];?>&price=<?=$signle_plan['plan_price'];?>&lgn=<?=$_SESSION['Userid'];?>&type=<?=$_GET['type'];?>&dis_id=<?=$userid;?>"><button type="submit" class="no-btn">Back</button></a> 
            <button type="submit" class="proceed-btn">Proceed</button>
 
                        </form>
       </div>
      <div class="mt-5">
         <p class="font-weight-bold guides-title">Please Read: Credit card instructions</p>
      </div>
      <div class="guide-wrap ">
          <ul class="guide-detailes text-left py-2">
            <li>You can fund the milestone with a credit card,
               but please be aware of the following:
            </li>
            <li>To ensure the security of our Hirers and Service
               Providers against potential credit card fraud or
               chargebacks, the funded milestone will be
               locked for a minimum of "4 working days".
            </li>
            <li>The quickest way for you to "Release funds" to
               your service provider, we recommend using
               Bank-in transfer to InstantJob instead.
            </li>
            <p style="visibility:hidden;">The quickest way for you to "Release funds" to
               your service provider, we recommend using
               Bank-in transfer to InstantJob instead.
            </p>
         </ul>
      </div>
      <div class="mt-3">
         <p class="font-weight-bold guides-title">More guides you might find useful:</p>
      </div>
      <div class="guide-wrap ">
         <ul class="guide-detailes text-left py-2">
            <li>If you want the service provider to begin
               work, you are required to fund the milestone
               for that specific task or stage.
            </li>
            <li>Your funds will be securely held in our escrow
               system until you choose to release them,
               giving you peace of mind and service providers to start their work with confidence.
            </li>
            <li>You should only release the funds when you
               are satisfied with the work.
            </li>
            <li>In certain cases, you have the option to
               release funds in advance if your service
               providers need money to purchase raw
               materials on your behalf.
            </li>
            <li>Releasing funds in advance carries a possible
               risk, similar to real-life situations, and is an
               arrangement solely between you and the
               service providers.
            </li>
            <li>For each project, InstantJob applies a service
               fee of 10% or up to RM1,000 (max). This fee
               plays a crucial role in supporting our platform
               services, empowering our dedicated staff,
               and reinforcing the security of our escrow
               system, all aimed at prioritizing your
               protection.
            </li>
            <li>If you have any questions or concerns, please
               reach out to our support team.
            </li>
         </ul>
      </div>
   </Section>
                <?php } ?>
   
</div>
<script>
   //   changing content on click of radio button
         // Initially display the first content by default
   document.getElementById("content1").style.display = "block";
   
   function changeContent() {
     var dynamicContent = document.getElementById("dynamicContent");
     var radioButtons = document.getElementsByName("content");
     var selectedValue;
   
     // Find the selected radio button value
     for (var i = 0; i < radioButtons.length; i++) {
       if (radioButtons[i].checked) {
         selectedValue = radioButtons[i].value;
         break;
       }
     }
   
     // Show the selected content and hide others
     document.getElementById("content1").style.display = "none";
     document.getElementById("content2").style.display = "none";
     document.getElementById("content3").style.display = "none";
   
     if (selectedValue === "content1") {
       document.getElementById("content1").style.display = "block";
     } else if (selectedValue === "content2") {
       document.getElementById("content2").style.display = "block";
     } else if (selectedValue === "content3") {
       document.getElementById("content3").style.display = "block";
     }
   }
   
</script>
<?php include('inc/footer.php'); ?>