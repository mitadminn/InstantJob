<?php

  $postid = $_GET['stid'];
  $loginuser = $_GET['lgn'];
  $distuser = $_GET['dis_id'];
  $post_type = $_GET['type'];


$getprojectData = $obj->GetProjectCostByProject($postid, $post_type, $loginuser, $distuser);
$getEscrowtData = $obj->GetEscrowByProject($postid, $post_type, $loginuser, $distuser);
$getEarningData = $obj->GetEarningByProject($postid, $post_type, $loginuser, $distuser);
$ifapprove = $obj->IfProjectStartOrNot($postid, $post_type, $loginuser, $distuser);
if($getEscrowtData['status'] != 4) { $fund = '';} else {$fund = $getEscrowtData['TotalDeposit'];}


?>
 <?php if($ifapprove['status'] == 1) { ?>

<!--Belongs to right side bar-->
<section class="Earnings-section mt-4">
  <div class="collection-earnings border">
      <div class="p-3">
      <h4 class="font-weight-bold">Earnings</h4>
    <div class="contain-earnings py-2 d-flex justify-content-between">
        <p class="alternative">Received</p>
        <p>RM<?=$getEarningData['TotalEarning'];?></p>
    </div>
    <div class="contain-earnings py-2 d-flex justify-content-between">
        <p class="alternative">Funded (Escrow Protection)</p>
        <p>RM<?=$fund;?></p>
    </div>
    <div class="contain-earnings py-2 d-flex justify-content-between">
        <p class="alternative">Project Price</p>
        <p>RM<?=$getprojectData['price'];?></p>
    </div>
    </div>
    <hr class="earning-mid-hr mt-0">
    <div class="text-center px-2 pb-3">
    <a  href="payment-release?id=<?=$postid;?>&price=<?=$getEarningData['TotalEarning'];?>&lgn=<?=$loginuser;?>&type=<?=$post_type;?>&dis_id=<?=$distuser;?>"><button type="button" class="btn-wallet">Payment Summary </button> </a> 

     </div>
 </div>
</section> 
<?php } else {} ?>