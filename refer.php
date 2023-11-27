<?php
    $page = 'Refer a friend';
    include('inc/header.php'); 
    $a = mt_rand(100000,999999); 
    
    $referlink = "https://mitdevelop.com/instantjob/referfriend?uid=".$_SESSION['Userid'].'-'.$a;
    
    $allusers = $obj->GetUsers();
    $user_id = $_SESSION['Userid'];
    $refferal = $obj->GetRefferalByUserId($user_id);
    
    
    
    ?>
<?php include('inc/sidebar.php'); ?>      
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row refer_row">
<div class="refer_middle_container">
    <div class="head-mid">
        <h2>Refer Friends</h2>
    </div>
    <!-- ----------------------Middle one---------------------- -->
    <div class="refer-main">
        <div class="refer-chld">
            <!--<div class="img-cash-green text-center">-->
            <!--    <img src="assets/img/cash-multiple copy.png"></img>-->
            <!--</div>-->
            <div style=" " class="title-content refer-cont-p">
                <p class="">Both you and your friends will receive RM10 when they sign up with your link below and verify their accounts.</p>
            </div>
            <label class="refer-link">
                <!--Referral link-->
                <div class="input-refer">
                    <input type="text" placeholder="copy-link" id="myInput" value="<?=$referlink;?>">
                </div>
                <div class="my-3 text-center">
                    <button class="click_fnctn_btn sell_servc_btn" onclick="myFnctncopy()">Copy Link</button>
                </div>
            </label>
            
            
            <table class="table table-bordered">
  <thead>
    <tr class="top_title_refer">
       
      <th class="bg-dark text-white" scope="col">Date Joined</th>
      <th class="bg-dark text-white" scope="col">Name</th>
      <th class="bg-dark text-white" scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
      <?php
 

foreach ($refferal as $refferal_user) {
     $user_id = $refferal_user['Userid'];
    // print_r($refferal_user);
    // $singleuser = $obj->GetUsersById($user_id);
    
$originalDate = $refferal_user['Created_at'];
$formattedDate = date("d F Y", strtotime($originalDate));

       
   
 
?>



    <tr>
      <td class="font-weight-bold"><?=$formattedDate;?></td>
      <td class="font-weight-bold"><?=$refferal_user['ProfileName']?></td>
      <td class="font-weight-bold"><?php if($refferal_user['Status'] == 1){echo 'Success';}else {echo 'Pending';} ?></td>
    </tr>
     <?php
 
}
?>
  
  </tbody>
</table>


 
<div class="refer_see_more my-4 text-center">
    <p class="font-weight-bold">See More</p>
</div>
        </div>
    </div>
    <!---------------------- middle one end -------------------------->
</div>
<!--copy url button script -->
<script>
    function myFnctncopy() {
      // Get the text field
      var copyText = document.getElementById("myInput");
    
      // Select the text field
      copyText.select();
      copyText.setSelectionRange(0, 99999); // For mobile devices
    
      // Copy the text inside the text field
      navigator.clipboard.writeText(copyText.value);
      
      // Alert the copied text
      alert("Copied the text: " + copyText.value);
    }
</script>
<!--copy url button script -->
<?php include('inc/footer.php'); ?>