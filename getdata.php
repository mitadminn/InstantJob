<?php


include('admin/inc/function.php');
require_once('wallett/assets/php/functions.php');

$obj = new Instantjobs();
// Connect to the database (replace with your credentials)
$conn = mysqli_connect('localhost', 'mit_instantjob', '[PFC[mUGwBp4', 'mit_instantjobs'); 

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the selected year from the AJAX request
$selectedYear = $_POST['year'];
$user_id = $_POST['user'];
if($selectedYear == 'Show All') {
 echo   $query = "SELECT * FROM Transaction WHERE `from_user_id` = '$user_id' OR `to_user_id` = '$user_id' ORDER BY id DESC";

}elseif(!empty($selectedYear)) {
// Retrieve data for the selected year
  $query = "SELECT * FROM Transaction WHERE (YEAR(created_at) = '$selectedYear') AND (`from_user_id` = '$user_id' OR `to_user_id` = '$user_id') ORDER BY id DESC";

}else{}
// Retrieve data for the selected year
// $query = "SELECT * FROM Transaction WHERE YEAR(created_at) = '$selectedYear' AND `from_user_id` = '$user_id' OR `to_user_id` = '$user_id' ORDER BY id DESC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Build the table with the retrieved data

while ($trans = mysqli_fetch_assoc($result)) {
//   foreach ($history as $index => $trans) {
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

    if ($trans['from_user_id'] == $user_id && $trans['to_user_id'] != 0 && $trans['to_user_id'] != 'rsrv') {
      $color = 'danger';
    //   $suffix = getUserById($trans['to_user_id'])['ProfileName'] . ' (' . getUserById($trans['to_user_id'])['Phone'] . ')';
          $suffix = 'Milestone Released';
            $amnt = $trans['amount'];
    } elseif ($trans['from_user_id'] == 0) {
      $color = 'success';
      $suffix = 'Top Up to personal account';
      $ud = 'MYW' . $trans['orderid'];
      $ww = 'Wallet';
      
       $amnt = $trans['amount'];
    } elseif ($trans['to_user_id'] == 'rsrv' && $trans['from_user_id'] == $user_id && $trans['status'] == 4) {
      $color = 'danger';
      $suffix = 'Milestone Funded';
      $ww = 'Funded';
       $amnt = $trans['actual_amount'];
    } elseif ($trans['to_user_id'] == 0 && $trans['from_user_id'] == $user_id) {
      $color = 'danger';
      $suffix = 'Withdrawal';
      $ww = 'Withdrawal';
       $amnt = $trans['amount'];
    } elseif ($trans['from_user_id'] != 0) {
      $color = 'success';
      $suffix = getUserById($trans['from_user_id'])['ProfileName'];
       $amnt = $trans['amount'];
    }

    $date = date_create($trans['created_at']);
    $post_id = $trans['postid'];
    $type = $trans['payment_for'];
    $proposaldata = $obj->GetProposalDataByPostId($post_id, $type);
     $totalAmount = $trans['actual_amount'];

$actualAmount = $totalAmount / 1.16;
$servicetaxxx = $actualAmount * 0.1;
$ssttaxxx = $actualAmount * 0.06;
     $servicetaxx = number_format($servicetaxxx, 2, '.', ',');
     $ssttaxx = number_format($ssttaxxx, 2, '.', ',');
  ?>
    <tr>
      <td colspan="2"><?php echo date_format($date, "d M Y"); ?> - <?=$ud;?> <?=$suffix?><?php if($suffix == 'Milestone Released'){ ?>(RM<?php echo number_format($amnt, 2, '.', ',');?> <?=$ww;?>) <?php } else{}?></td>
        <td class="btn btn-primary toggle<?=$trans['id'];?> <?=$color;?>"><?php if($suffix != 'Milestone Released'){ ?><?=$color == 'danger' ? '-' : '+'?> RM<?php echo number_format($amnt, 2, '.', ',');?> <?=$ww;?> <?php } else{}?>
		 <!---->
		  <?php if($suffix == 'Milestone Funded') { ?>
		  <div class="icon-menus"  onclick="ExtraMenu(<?=$trans['id'];?>)" data-id="<?=$trans['id'];?>">
			  <svg viewBox="0 0 24 24"   class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M7,10L12,15L17,10H7Z"/></svg>
								  <!--<svg style="position: absolute; right: 0; top: -15px;" class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"> -->
								  <!--<path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" />-->
								<!--</svg>-->
								<div id="<?=$trans['id'];?>" class="text-left dropdown-contentt dropDown_links_post px-1 py-2">
									   <strong>Milestone Price:</strong> RM<?php echo number_format($amnt, 2, '.', ',');?>
          <hr class="my-1"> 
            <strong>Service charges:</strong> RM<?=$servicetaxx;?>
          <hr class="my-1">
            <strong>Tax 6%:</strong> RM<?=$ssttaxx;?>
          
								</div>
							</div>
		  <?php }else {}?>
		  </td>
    </tr>
    
  <?php } ?>                          <!--toggle to show amount -->
	   <script>
		
		 function ExtraMenu(post_id) {
			// var post_id = $(this).data('id');
			
		  document.getElementById(post_id).classList.toggle("show");
		}
	  
		// Close the dropdown if the user clicks outside of it
		window.onclick = function(event) {
				//   var $this = $(this);
		// var $dropdown = $this.next('.dropdown-contentt');

		// Close all other dropdowns
		// $('.dropdown-contentt').not($dropdown).slideUp();
		// $dropdown.slideToggle();
		  if (!event.target.matches('.dropbtn')) {
		
			var dropdowns = document.getElementsByClassName("dropdown-contentt");
			var i;
			for (i = 0; i < dropdowns.length; i++) {
			  var openDropdown = dropdowns[i];
			  if (openDropdown.classList.contains('show')) {
				openDropdown.classList.remove('show');
			  }
			}
		  }
		}
		



	  </script>
