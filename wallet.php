<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
include('auth.php'); 
$page = 'Wallet';
include('inc/header.php'); 
 
include('inc/sidebar.php'); 
require_once('wallett/assets/php/functions.php');


$user_id=$_SESSION['Userid'];
$credit_balance = $obj->getCreditedBalance($user_id);
$debit_balance = $obj->getDebitedBalance($user_id);
$balance = $credit_balance['credit']-$debit_balance['debit'];
$history = $obj->getTransHistory($user_id);
$userin =$obj->GetUserById($user_id);
$couponscredit = $obj->CouponCreditByUser($user_id);
$formattedPrice = number_format($balance, 2, '.', ',');

?>     
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
<div class="refer_middle_container">
    <div class="head-mid">
        <h2>Wallet </h2>
    </div>
    <!-- ----------------------middle one---------------------- -->
    <div class="wallet-container">
        <div class="supprt-wallet">
            <div class=" wallet-blnc">
                <div class="wallet_blance">
                    <h3>Wallet Balance</h3>
                    <p>RM <?=$formattedPrice;?></p>
                </div>
                <a href="top-up-wallet?id=<?=$user_id;?>">
                <button type="button" class="btn-wallet custom-btn bnt-fill-green btn_widra_coupone">Top Up Wallet</button>
                </a>
            </div>
            <div class=" wallet-blnc">
                <div class="wallet_blance">
                    <h3>Coupon Credit</h3>
                    <p>RM<?=number_format($couponscredit['CouponsCredit'], 2, '.', ',');?></p>
                </div>
                <a href="add-coupon?id=<?=$user_id;?>">
                <button type="button" class="btn-wallet custom-btn invite-jop-post btn_widra_coupon">Add Coupon</button>
                </a>
               </div> 
            </div>
            <div class=" wallet-blnc">
                <div class="wallet_blance">
                    <h3>Account Holder</h3>
                    <p><?=$user_information['IC_name'];?></p>
                </div>
                <a href="withdrawal?id=<?=$user_id;?>">
                <button type="button" class="btn-wallet custom-btn invite-jop-post btn_widra_coupons">Withdrawal</button>
                </a>
            </div>
 
       
        <div class="transaction-contain frst-trans">
            <h2>Recent Transactions</h2>
            <!--table-->
            <table class="table table-bordered">
  <thead>
    <tr class="bg-dark text-white">
     
      <th scope="col" colspan="2">Description</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
    <tbody  class="transaction_data">
  <?php
  foreach ($history as $index => $trans) {
    $postid = $trans['postid'];
    $postdata = null;
    $ud = '';
    $suffix = '';
    $color = '';
    $ww = '';

    if ($trans['payment_for'] == 'service') {
      $postdata = $obj->GetServiceByPostId($postid);
       
      $text = $postdata['topic'];
      $topic = $obj->slugify($text);
      $ud = '<a href="professional-service?t='.$postid.'&service='.$topic.'" target="_blank">MYS' . $postdata['random_id'].'</a>';

      
    } elseif ($trans['payment_for'] == 'job') {
      $postdata = $obj->GetJobByPostId($postid);
      $text = $postdata['topic'];
      $topic = $obj->slugify($text);
      $ud = '<a href="job-details?j='.$postid.'&job='.$topic.'" target="_blank">MYJ' . $postdata['random_id'].'</a>';
    } elseif ($trans['payment_for'] == 'post_sponsor') {
      $ud = 'MYA' . $postdata['random_id'];
    }

   
   
    if ($trans['from_user_id'] == $user_id && $trans['status'] == 5 && $trans['payment_for'] !='') {
      $color = 'success';
      $suffix = 'Top Up Coupon';
      $couponcodes = $trans['payment_for'];
      $cp_data = $obj->GetCouponDataByCode($couponcodes);
      $amnt = $cp_data['CouponAmount'];
       $ud = 'Coupon Credit ('.$trans['payment_for'].')';
      $ww = '';
       $totalAmount = $trans['actual_amount'];
    }
    
    else if ($trans['from_user_id'] == $user_id && $trans['to_user_id'] != 0 && $trans['to_user_id'] != 'rsrv') { 
      $color = 'danger';
 
          $suffix = 'Milestone Released';
            $amnt = $trans['amount'];
            $ww = getUserById($trans['to_user_id'])['ProfileName'];
    $totalAmount = $trans['actual_amount'];
    }else if ($trans['from_user_id'] == $user_id && $trans['to_user_id'] == 'cc' && $trans['status'] == 5) {
      $color = 'danger';
    //   $suffix = 'Coupon Reedem';
      $couponcodes = $trans['payment_for']; 
      $cp_data = $obj->GetCouponDataByCode($couponcodes);
      $amnt = $trans['points'];
       $ud = 'Coupon Reedem (RM'.$amnt.')';
      $ww = '';
       $totalAmount = $trans['actual_amount'];
      
    } elseif ($trans['from_user_id'] == 0) {
      $color = 'success';
      $suffix = 'Top Up to personal account';
      $ud = 'MYW' . $trans['orderid'];
      $ww = 'Wallet';
      
       $amnt = $trans['amount'];
        $totalAmount = $trans['actual_amount'];
    } elseif ($trans['to_user_id'] == 'rsrv' && $trans['from_user_id'] == $user_id && $trans['status'] == 4) {
      $color = 'danger';
      $suffix = 'Milestone Funded';
      $ww = 'Funded';
      
       $m_id = $trans['m_id'];
       $milestonedata = $obj->GetPaymentPlanByMId($m_id);
      $atamount = $milestonedata['plan_price'];
       $points = $trans['points'];
       $amnt = $trans['actual_amount'] + $trans['points'];
        $totalAmount = $trans['actual_amount'] + $trans['points'];
    } elseif ($trans['to_user_id'] == 0 && $trans['from_user_id'] == $user_id) {
      $color = 'danger';
      $suffix = 'Withdrawal';
      $ww = 'Withdrawal';
       $amnt = $trans['amount'];
        $totalAmount = $trans['actual_amount'];
    } elseif ($trans['from_user_id'] != 0) {
      $color = 'success';
      $suffix = getUserById($trans['from_user_id'])['ProfileName'];
       $amnt = $trans['amount'];
        $totalAmount = $trans['actual_amount'];
    }

    $date = date_create($trans['created_at']);
    $post_id = $trans['postid'];
    $type = $trans['payment_for'];
    $proposaldata = $obj->GetProposalDataByPostId($post_id, $type);
    

$actualAmount = $totalAmount / 1.16;
$servicetaxxx = $actualAmount * 0.1;
$ssttaxxx = $actualAmount * 0.06;
     $servicetaxx = number_format($servicetaxxx, 2, '.', ',');
     $ssttaxx = number_format($ssttaxxx, 2, '.', ',');
  ?>
    <tr>
         <td colspan="2"><?php echo date_format($date, "d M Y"); ?> - <?=$ud;?> <?=$suffix?><?php if($suffix == 'Milestone Released'){ ?> To <?=$ww;?> (RM<?php echo number_format($amnt, 2, '.', ',');?>) <?php }elseif($suffix == 'Top Up Coupon'){ ?>(RM<?php echo number_format($amnt, 2, '.', ',');?> <?=$ww;?>) <?php } else{}?></td>
        <td class="btn btn-primary toggle<?=$trans['id'];?> <?=$color;?>"><?php if($suffix != 'Milestone Released'){ ?><?=$color == 'danger' ? '-' : '+'?> RM<?php echo number_format($amnt, 2, '.', ',');?> <?=$ww;?> <?php } else{}?>
		 
   <!--   <td colspan="2"><?php echo date_format($date, "d M Y"); ?> - <?=$ud;?> <?=$suffix?><?php if($suffix == 'Milestone Released'){ ?>(RM<?php echo number_format($amnt, 2, '.', ',');?> <?=$ww;?>) <?php } else{}?></td>-->
   <!--     <td class="btn btn-primary toggle<?=$trans['id'];?> <?=$color;?>"><?php if($suffix != 'Milestone Released'){ ?><?=$color == 'danger' ? '-' : '+'?> RM<?php echo number_format($amnt, 2, '.', ',');?> <?=$ww;?> <?php } else{}?>-->
		 <!---->
		  <?php if($suffix == 'Milestone Funded') { ?>
		  <div class="icon-menus"  onclick="ExtraMenu(<?=$trans['id'];?>)" data-id="<?=$trans['id'];?>">
			  <svg viewBox="0 0 24 24"   class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M7,10L12,15L17,10H7Z"/></svg>
 
								<div id="<?=$trans['id'];?>" class="text-left dropdown-contentt dropDown_links_post px-1 py-2">
									   <strong>Total:</strong> RM<?php echo number_format($amnt, 2, '.', ',');?>
									    <hr class="my-1">
									   <strong>Milestone Price:</strong> RM<?php echo number_format($atamount, 2, '.', ',');?>
          <hr class="my-1"> 
            <strong>Service charges:</strong> RM<?=$servicetaxx;?>
            <?php if(!empty($points)) { ?> 
            <hr class="my-1">
            <strong>Coupon:</strong> RM<?=$points;?>
            <?php } ?>
          <hr class="my-1">
            <strong>Tax 6%:</strong> RM<?=$ssttaxx;?>
                              <a href="single-statement.php?id=<?=$trans['id'];?>">Download</a>

								</div>
							</div>
		  <?php }else {}?>
		  </td>
    </tr>
    
  <?php } ?>
</tbody>

</table>
<div class="refer_see_more my-4 text-center">
    <a href="transaction"><p class="font-weight-bold">See All</p></a>
</div>
            <!--transition functionality-->
            
  
</div>
 </div>
            
        </div>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Send Money</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <div>
     <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Mobile</span>
  <input type="text" class="form-control" id="user_mobile_no" placeholder="enter user mobile no..." aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Amount</span>
  <input type="text" class="form-control" id="amount" placeholder="enter amount to send.." aria-label="Username" aria-describedby="basic-addon1">
</div>
</div>
<div class="d-flex justify-content-center">
<div class="spinner-border" role="status"  id="loading" style="display:none">
  <span class="visually-hidden">Loading...</span>
</div>
</div>

<div class="alert alert-success" role="alert" id="s_msg" style="display:none">

</div>
<div class="alert alert-danger" role="alert" id="e_msg" style="display:none">

</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hide</button>
        <button type="button" id="send_money" class="btn btn-primary">Send Money</button>
      </div>
    </div>
  </div>
</div>

 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


    <!---------------------- middle one end -------------------------->
</div>
<?php include('inc/footer.php'); ?>


<script>




const txn_data = {
    user_mobile_no:null,
    amount:null,
}

const obj = {
 url:'<?=site_url('wallett/assets/php/ajax.php?sendmoney')?>',
 method:'post',
 dataType:"json",
 data:txn_data,
 success:(response)=>{
if(response.txn_status){
    $("#e_msg").hide();
    $("#s_msg").text(response.msg);
    $("#s_msg").show();
    $("#loading").hide();
$("#send_money").attr("disabled",false);
$("#user_mobile_no").val("");
$("#amount").val("");
location.reload();
}else{
    $("#s_msg").hide();
    $("#e_msg").text(response.msg);
    $("#e_msg").show();
    $("#loading").hide();
$("#send_money").attr("disabled",false);
}
 }
}

$("#send_money").click(()=>{
txn_data.user_mobile_no = $("#user_mobile_no").val();
txn_data.amount = $("#amount").val();

if(!txn_data.user_mobile_no || !txn_data.amount){
alert("enter user mobile and amount to send money");
return 0;
}

$("#loading").show();
$("#send_money").attr("disabled",true);
$.ajax(obj);
});



var openMenu = null; // Track the currently open menu

function ExtraMenu(post_id) {
  var menu = document.getElementById(post_id);
  
  if (menu === openMenu) {
    // Clicked on the same menu, so close it
    menu.classList.remove("show");
    openMenu = null;
  } else {
    // Close the previously open menu (if any)
    if (openMenu) {
      openMenu.classList.remove("show");
    }

    // Open the new menu
    menu.classList.add("show");
    openMenu = menu;
  }
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    if (openMenu) {
      openMenu.classList.remove('show');
      openMenu = null;
    }
  }
}
 
	  </script>
 