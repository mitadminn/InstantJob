<?php 
   $page = 'Payment funded';
   include('inc/header.php'); 
   $plan_id = $_GET['id'];
   $signle_plan = $obj->GetPaymentPlanById($plan_id);

   $actual_amnt = $signle_plan['plan_price'];
   
    
   $u_id = $_GET['lgn'];
   $r_id = $_GET['dis_id'];
   
   $post_id = $signle_plan['post_id'];
    if( $_GET['type'] == 'service'){
    $serviceid = $signle_plan['post_id'];
    $single_post = $obj->GetServiceById($serviceid);
   }elseif( $_GET['type'] == 'job'){ 
    $jobid = $signle_plan['post_id'];
    $single_post = $obj->GetJobById($jobid);
   }
    
//   $userid = $_GET['dis_id'];
   $userid=$_SESSION['Userid'];
   $postuser = $obj->GetUserById($userid);
   $taxes = $obj->calculateTaxes($actual_amnt,$service, $sst);
 // Accessing the calculated taxes
    $service_tax = $taxes['service_tax'];
    $sst_tax = $taxes['sst_tax'];
 
   //  / Wallet / 
   
   $credit_balance = $obj->getCreditedBalance($user_id);
   $debit_balance = $obj->getDebitedBalance($user_id);
   $balance = $credit_balance['credit']-$debit_balance['debit'];
   $t_amount =  $service_tax + $actual_amnt+ $sst_tax;
   
   $bankdetails = $obj->GetBankDetailById();
   
   $couponscredit = $obj->CouponCreditByUser($user_id);
   
   
    ?>
<?php include('inc/sidebar.php'); ?>     
<style>
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
   .guide-detailes li {
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
   <?php
    
   if ($balance < $t_amount) { ?>
   <section class="payment_bg p-0">
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
             <p class="font-weight-bold">Milestone : <?=$signle_plan['plan'];?></p>
            <p class="">Total Amount:RM <?php echo number_format($t_amount, 2, '.', ',');?></p>
            <br>
            <p>Payment Summary:</p>
               <p>Milestone - RM<?=$actual_amnt;?></p>
            <p>Service fee - RM<?=$service_tax;?></p>
            <p><?=$sst;?>% SST - RM<?=$sst_tax;?></p>
           
             <div class="mt-3">
                        <form action="admin/inc/process.php?action=TopUpWallet" method="post">
                <div class="checkout_titles">
                     <input type="hidden" class="form-control topup_input border-white text-center" placeholder="Amount" id="topup_amount" value="<?=$t_amount;?>" name="amount" required="">
                    <input type="hidden" name="userid" value="<?=$userid;?>">
                    <input type="hidden" name="name" value="<?=$postuser['ProfileName'];?>">
                    <input type="hidden" name="currency" value="MYR">
                    <input type="hidden" name="desc" value="<?=$single_post['topic'];?>">
                    <input type="hidden" name="email" value="<?=$postuser['Email'];?>">
                    <input type="hidden" name="phone" value="<?=$postuser['Phone'];?>">
                </div>
                
                
                 
                <div class="payment_methods">
                     <div class="payments_container"></div>
                 </div>
                <div class="text-center mt-4 btn_wallet_confirm">
                                                 <a  href="payment-release?id=<?=$single_post['id'];?>&price=<?=$signle_plan['plan_price'];?>&lgn=<?=$_SESSION['Userid'];?>&type=<?=$_GET['type'];?>&dis_id=<?=$userid;?>"><button type="button" class="no-btn">Back</button></a> 

                    <button type="submit" class="proceed-btn">Proceed</button>
                   
                 </div>
                </form>  
 
       </div>
         </div>
         <div id="content2" class="hidden">
             <p class="font-weight-bold">Milestone : <?=$signle_plan['plan'];?></p>
            <p class="">Total Amount:RM<?php echo number_format($t_amount, 2, '.', ',');?></p>
            <br>
            <p>Payment Summary:</p>
               <p>Milestone - RM<?=$actual_amnt;?></p>
            <p>Service fee - RM<?=$service_tax;?></p>
            <p><?=$sst;?>% SST - RM<?=$sst_tax;?></p>

         </div>
         <!--Bank-in transfer details-->
         <div id="content3" class="hidden">
            <p style="width:50%; margin:0 auto;text-align:center;" class="py-2">Please bank-in the amount you wish topup your wallet to fund this milestone, then upload your receipt here.</p>
            <p class="font-weight-bold"><?=$signle_plan['plan'];?></p>
            <p class="">Total Amount:RM<?php echo number_format($t_amount, 2, '.', ',');?></p>
             <br>
            <p>Payment Summary:</p>
               <p>Milestone - RM<?=$actual_amnt;?></p>
            <p>Service fee - RM<?=$service_tax;?></p>
            <p><?=$sst;?>% SST - RM<?=$sst_tax;?></p>
            <div class="py-3" style="margin-bottom: -30px;">
               <p class="font-weight-bold">Step - 1</p>
               <p class="cnfrm-amounts">Bank-in the exact total amount <strong>RM<?php echo number_format($t_amount, 2, '.', ',');?></strong> to our bank account below, put your mobile no. as a refrence.</p>
            </div>
            <div><img src="admin/assets/img/<?=$bankdetails['Logo'];?>" class="mt-4" style="width:100px;"></div>
            
            <p class="font-weight-bold">Bank Name : <?=$bankdetails['BankName'];?></span></p>
            <p class="font-weight-bold">Name : <?=$bankdetails['Name'];?></span></p>
            <p class="font-weight-bold">Bank ACC : <?=$bankdetails['AccountNumber'];?></span></p>
            <div class=" py-4">
               <p class="font-weight-bold">Step - 2</p>
               <!-- Button trigger modal -->
               <button type="button" class="btn btn-primary P-0" data-toggle="modal" data-target="#exampleModalCenter">
                  <p class="">Upload your<a class="text-decoration-underline" href="#"> Bank-in receipt click here</a></p>
               </button>
               <!-- Upload receipt Modal -->
               <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <form action="admin/inc/process.php?action=UploadReciept" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                           <div class="title-and-para">
                              <div class="bio-title edit_profile_bio_wrap">
                                 <h3>Upload Bank-in receipt</h3>
                              </div>
                              <div class="bio-img-portfolio">
                                 <div class="upload__box">
                                    <div class="upload__btn-box">
                                       <label class="upload__btn">
                                          <p class="plus_btn_upload">+</p>
                                           
                                        <div class="checkout_titles">
                                             <input type="hidden" name="name" value="<?=$postuser['ProfileName'];?>">
                                            <input type="hidden" name="currency" value="MYR">
                                            <input type="hidden" name="topic" value="<?=$single_post['topic'];?>">
                                            <input type="hidden" name="email" value="<?=$postuser['Email'];?>">
                                            <input type="hidden" name="phone" value="<?=$postuser['Phone'];?>">
                                            <input type="hidden" name="actual_amnt" value="<?=$actual_amnt;?>">
                                            
                                            
                                            <input type="hidden" class="form-control topup_input" placeholder="Amount" value="<?php echo $t_amount;?>" name="amount">
                                <input type="hidden" name="userid" value="<?=$_SESSION['Userid'];?>">
                                <input type="hidden" name="payment_for" value="<?=$_GET['type'];?>"> 
                                <input type="hidden" name="forwho" value="<?=$_GET['dis_id'];?>"> 
                                <input type="hidden" name="postid" value="<?=$single_post['id'];?>">
                                 <input type="hidden" name="planid" value="<?=$plan_id;?>">
                                 <input type="hidden" name="milestone" value="<?=$signle_plan['plan'];?>">
                                        </div>
                                            <input type="file" multiple="" class="form-control upload__inputfile" name="receipt">
                                       </label>
                                      
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="proceed-btn">Upload</button>
                        </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
             <div class="mt-3">
                 <a  href="payment-release?id=<?=$single_post['id'];?>&price=<?=$signle_plan['plan_price'];?>&lgn=<?=$_SESSION['Userid'];?>&type=<?=$_GET['type'];?>&dis_id=<?=$userid;?>"><button type="button" class="no-btn">Back</button></a> 
                <button  class="proceed-btn" type="button"  data-toggle="modal" data-target="#exampleModalCenter">Bank-in receipt click here</button> 

       </div>
         </div>
      </div>
      
     
     
      <div class="mt-5">
         <p class="font-weight-bold guides-title">Please Read: Credit card instructions</p>
      </div>
      <div class="guide-wrap ">
         <ul class="guide-detailes text-left py-2">
            <li> You can fund the milestone with a credit card,
               but please be aware of the following:
            </li>
            <li> To ensure the security of our Hirers and Service
               Providers against potential credit card fraud or
               chargebacks, the funded milestone will be
               locked for a minimum of "4 working days".
            </li>
            <li> The quickest way for you to "Release funds" to
               your service provider, we recommend using
               Bank-in transfer to InstantJob instead.
            </li>
            <p class="visibilty:hidden;"> The quickest way for you to "Release funds" to
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
            <p> If you want the service provider to begin
               work, you are required to fund the milestone
               for that specific task or stage.
            </p>
            <p> Your funds will be securely held in our escrow
               system until you choose to release them,
               giving you peace of mind and service providers to start their work with confidence.
            </p>
            <p> You should only release the funds when you
               are satisfied with the work.
            </p>
            <p> In certain cases, you have the option to
               release funds in advance if your service
               providers need money to purchase raw
               materials on your behalf.
            </p>
            <p> Releasing funds in advance carries a possible
               risk, similar to real-life situations, and is an
               arrangement solely between you and the
               service providers.
            </p>
            <p> For each project, InstantJob applies a service
               fee of 10% or up to RM1,000 (max). This fee
               plays a crucial role in supporting our platform
               services, empowering our dedicated staff,
               and reinforcing the security of our escrow
               system, all aimed at prioritizing your
               protection.
            </p>
            <p> If you have any questions or concerns, please
               reach out to our support team.
            </p>
         </ul>
      </div>
   </section>
   <?php } else { 

                ?>
                <section class="payment_bg p-0">
      <div class="checkout_titles">
         <a href="service-provider"> 
         <img class="logo_instant_jobs" src="assets/img/new-instant-logo.png" alt="">
         </a>
          <p class="cnfrm-amounts">Based on your wallet balance, you can fund the milestone. </p>
         
         <div>
         </div>

      </div>
       <form action="admin/inc/process.php?action=FundPayment" method="post">
         <div id="content1" class="hidden">
            <p class="font-weight-bold">Milestone : <?=$signle_plan['plan'];?></p>
            <p class="">Total Amount:RM<?php echo number_format($t_amount, 2, '.', ',');?></p>
            <br>
            <p>Payment Summary:</p>
            <p>Milestone - RM<?=$actual_amnt;?></p>
            <p>Service fee - RM<?=$service_tax;?></p>
            <p><?=$sst;?>% SST - RM<?=$sst_tax;?></p>
           
                <div class="py-4 align-items-center">
               <input type="checkbox" name="coupon"  style="width: 16px;height: 16px;" class="checkinp-inp custom-checkbox" value="<?=number_format($couponscredit['CouponsCredit'], 2, '.', ',');?>"> <label class="checkbox-coupon font-weight-bold" for="coupon">Use Coupon Credit: RM<?=number_format($couponscredit['CouponsCredit'], 2, '.', ',');?></label>
            </div>
         </div>
      <div class="mt-3">
          
            
                                <input type="hidden" class="form-control topup_input" placeholder="Amount" value="<?php echo $t_amount;?>" name="withdawal_amount">
                                <input type="hidden" name="userid" value="<?=$u_id;?>">
                                <input type="hidden" name="payment_for" value="<?=$_GET['type'];?>">
                                <input type="hidden" name="postid" value="<?=$single_post['id'];?>">
                                <input type="hidden" name="reciever" value="<?=$r_id;?>">
                                <input type="hidden" name="planid" value="<?=$plan_id;?>">
                                <input type="hidden" name="topic" value="<?=$single_post['topic'];?>">
                                <input type="hidden" name="milestone" value="<?=$signle_plan['plan'];?>">
                                <a href="payment-release?id=<?=$single_post['id'];?>&price=<?=$signle_plan['plan_price'];?>&lgn=<?=$_SESSION['Userid'];?>&type=<?=$_GET['type'];?>&dis_id=<?=$userid;?>">
                                <button type="button" class="no-btn">Back</button></a> 
                                <button type="submit" class="proceed-btn">Proceed</button>
    
       </div>
        </form>
       
      <div class="mt-5">
         <p class="font-weight-bold guides-title">Please Read: Credit card instructions</p>
      </div>
      <div class="guide-wrap ">
          <ul class="guide-detailes text-left py-2">
            <li> You can fund the milestone with a credit card,
               but please be aware of the following:
            </li>
            <li> To ensure the security of our Hirers and Service
               Providers against potential credit card fraud or
               chargebacks, the funded milestone will be
               locked for a minimum of "4 working days".
            </li>
            <li> The quickest way for you to "Release funds" to
               your service provider, we recommend using
               Bank-in transfer to InstantJob instead.
            </li>
            <p style="visibility:hidden;"> The quickest way for you to "Release funds" to
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
            <li> If you want the service provider to begin
               work, you are required to fund the milestone
               for that specific task or stage.
            </li>
            <li> Your funds will be securely held in our escrow
               system until you choose to release them,
               giving you peace of mind and service providers to start their work with confidence.
            </li>
            <li> You should only release the funds when you
               are satisfied with the work.
            </li>
            <li> In certain cases, you have the option to
               release funds in advance if your service
               providers need money to purchase raw
               materials on your behalf.
            </li>
            <li> Releasing funds in advance carries a possible
               risk, similar to real-life situations, and is an
               arrangement solely between you and the
               service providers.
            </li>
            <li> For each project, InstantJob applies a service
               fee of 10% or up to RM1,000 (max). This fee
               plays a crucial role in supporting our platform
               services, empowering our dedicated staff,
               and reinforcing the security of our escrow
               system, all aimed at prioritizing your
               protection.
            </li>
            <li> If you have any questions or concerns, please
               reach out to our support team.
            </li>
            <p style="visibility: hidden;"> If you have any questions or concerns, please
               reach out to our support team.
            </p>
         </ul>
      </div>
   </section>
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