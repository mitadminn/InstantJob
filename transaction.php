<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1); 
// error_reporting(E_ALL);
include('auth.php'); 
    $page = 'Transaction';
    include('inc/header.php');  
    include('inc/sidebar.php');
    require_once('wallett/assets/php/functions.php');

    $user_id = $_SESSION['Userid'];
    $history = $obj->getTransHistory($user_id);


?>     
<style>
    @media (min-width:0) and (max-width:567px) {
        body{
            background:#fff !important;
        }
    }
</style>
<div class="col-sm-12 instant-main">
<div class="row">
<div class="transaction_middle_container"> 
    <div class="head-mid">
        <h2>Transaction History  </h2>
    </div>
    <!-- ----------------------middle one---------------------- -->
    <div class="bck-white ">
        <div class="d-flex justify-content-between">
    <select class=" year_options" id="myDropdaown">
    <option value="all">Show All</option>
    <option value="2023">2023</option>
    <option value="2024">2024</option>
    <option value="2025">2025</option>
    <option value="2026">2026</option>

  </select>
  <div>
      <button class="btn btn_download_wrap sell_servc_btn" id="downloadPDF"><i class="fa fa-download"></i> Download</button>
  </div>
        </div>
        
        <div class="transaction-contain frst-trans position-relative">
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
    //   $suffix = getUserById($trans['to_user_id'])['ProfileName'] . ' (' . getUserById($trans['to_user_id'])['Phone'] . ')';
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
								  <!--<svg style="position: absolute; right: 0; top: -15px;" class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"> -->
								  <!--<path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" />-->
								<!--</svg>-->
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
        <!--transition functionality-->
  
 
</div>
 
    </div>
</div>
<!---------------------- middle one end -------------------------->
<?php include('inc/footer.php'); ?>

  <!--<script>-->
  <!--  function displaySelected() {-->
  <!--    var droppdown = document.getElementById("myDropdaown");-->
  <!--    var selectedOption = droppdown.options[dropdown.selectedIndex].text;-->
  <!--    var button = document.getElementById("myButtton");-->
  <!--    button.innerHTML = selectedOption;-->
  <!--  }-->
  <!--</script>-->
  
  <!--toggle to show amount -->
  <!--toggle to show amount -->
	   <script>
		
// 		 function ExtraMenu(post_id) {
// 			// var post_id = $(this).data('id');
			
// 		  document.getElementById(post_id).classList.toggle("show");
// 		}
	  
// 		// Close the dropdown if the user clicks outside of it
// 	 window.onclick = function(event) {
//   // Check if the clicked element is not a dropdown button or its child
//   if (!event.target.matches('.dropbtn') && !event.target.closest('.dropdown-contentt')) {
//     var dropdowns = document.getElementsByClassName("dropdown-contentt");
//     var i;
//     for (i = 0; i < dropdowns.length; i++) {
//       var openDropdown = dropdowns[i];
//       if (openDropdown.classList.contains('show')) {
//         openDropdown.classList.remove('show');
//       }
//     }
//   }
// }

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
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#myDropdaown").change(function() {
            var selectedYear = $(this).find("option:selected").text();
            $.ajax({
                url: "getdata.php",
                method: "POST",
                data: { year: selectedYear, user: <?=$user_id;?> },
                success: function(response) {
                    $(".transaction_data").html(response);
                }
            });
        });

        $("#downloadPDF").click(function() {
            var selectedYear = $("#myDropdaown").find("option:selected").text();
            window.location.href = "download_pdf.php?user=<?=$user_id;?>&year=" + selectedYear;
        });
    });
</script>

