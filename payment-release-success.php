<?php 
    $page = 'Payment Release Success';
    include('inc/header.php'); 
    $plan_id = $_GET['id'];
    $signle_plan = $obj->GetPaymentPlanById($plan_id);
 
    $post_id = $signle_plan['post_id'];
    if($_GET['type'] == 'service'){
    $serviceid = $signle_plan['post_id'];
     $single_post = $obj->GetServiceById($serviceid);
    }elseif( $_GET['type'] == 'job'){ 
     $jobid = $signle_plan['post_id'];
     $single_post = $obj->GetJobById($jobid);
    }
     
    $userid = $_GET['dis_id'];
    $postuser = $obj->GetUserById($userid);
    
      $plan_price = $signle_plan['plan_price'];
      $formattedPrice = number_format($plan_price, 2, '.', ',');
      $milestone = $obj->GetPaymentPlanByPostId($post_id);
 ?>
<?php include('inc/sidebar.php'); ?>     
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
            <Section class="payment_bg">
                <div class="checkout_titles">
                    <div class="instant-sidebar-profile-image">
                        <img class="main-img img-main-pro" src="admin/assets/img/profile/<?=$postuser['ProfilePic'];?>" alt="">
                    </div>
                    <p class="cnfrm-amount">Payment to <?=$postuser['ProfileName']?></p>
                    <p class="checkout_prize font-weight-bold">RM<?php echo $formattedPrice;?></p>
  
                    <?php
$milestones = array();

while ($miles = mysqli_fetch_array($milestone)) {
      $milestones[] = $miles['plan'];
}

$currentMilestone = $signle_plan['plan']; // Define and set the current milestone here

$endMilestone = end($milestones);

if ($currentMilestone === $endMilestone) {
    echo '<p>This is to confirm that we are ready to proceed with the final milestone (<strong>'.$currentMilestone.'</strong> Milestone) payment as per your agreement. Your satisfaction is our priority, and we appreciate your collaboration 
     </p>';
    $final = 'FinalMilestone';
  } else {
echo '';
?>
 <?php } ?>
 <p>Always pay through Instantjob<br>to protect yourself.</p>
                </div>
                <div class="checkout_btn">
                      <form action="admin/inc/process.php?action=MakePayment" method="post">
                                <input type="hidden" class="form-control topup_input" placeholder="Amount" value="<?php echo $servicetax + $signle_plan['plan_price']+ $ssttax;?>" name="withdawal_amount">
                                <input type="hidden" name="userid" value="<?=$_SESSION['Userid'];?>">
                                <input type="hidden" name="payment_for" value="<?=$_GET['type'];?>">
                                <input type="hidden" name="postid" value="<?=$single_post['id'];?>">
                                <input type="hidden" name="reciever" value="<?=$userid;?>">
                                <input type="hidden" name="planid" value="<?=$plan_id;?>">
                                <input type="hidden" name="topic" value="<?=$single_post['topic'];?>">
                                <input type="hidden" name="milestone" value="<?=$signle_plan['plan'];?>">
                                <input type="hidden" name="paymentto" value="<?=$postuser['ProfileName'];?>">
                                <input type="hidden" name="finalpayment" value="<?=$final;?>">
                                
                    <a  href="payment-release?id=<?=$single_post['id'];?>&price=<?=$signle_plan['plan_price'];?>&lgn=<?=$_SESSION['Userid'];?>&type=<?=$_GET['type'];?>&dis_id=<?=$userid;?>" style="border-radius: 34px;    border: 1px solid #e4e4e4;    padding: 5px;    width: 106px;    float: left;    color: #000;font-weight: 600;   margin-right: 10;">NO</a>
                
                        <button type="submit" class="checkout_now pay_check">Pay Now</button> 
                        </form>
                </div>
            </Section>
   </div>
  
                <?php include('inc/footer.php'); ?>