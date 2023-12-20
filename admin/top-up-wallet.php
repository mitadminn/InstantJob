<?php include('inc/header.php'); 

$id = $_GET['recieptid'];
$reciept = $obj->GetUploadRecieptDataById($id);
$userid = $reciept['Userid'];

$UserData = $obj->GetUserById($userid);

$actual_amnt = $reciept['ActualAmount'];
$taxes = $obj->calculateTaxes($actual_amnt,$service, $sst);
 // Accessing the calculated taxes
$service_tax = $taxes['service_tax'];
$sst_tax = $taxes['sst_tax'];

?>
 
<div class="right_col" role="main" style="min-height: 4560px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Payment Send to <?=$UserData['ProfileName'];?></h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
             <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                 
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-3">
                            <div class="card-box table-responsive" ></div>
                         </div>
                          <div class="col-sm-6">
                             <form method="post" action="inc/process.php?action=TopWalletUp" onsubmit="return confirm('Are you sure you want to proceed with the payment?');">
                                <div class="card-box table-responsive" style="text-align:center; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;padding: 14px;border-radius: 10px;">
                                    <h1>Top Up Wallet</h1>
                                    <p style="font-size:15px;">Payment top up to <?=$UserData['ProfileName'];?>'s Wallet is <br>
                                        <h3>RM<?php echo number_format($reciept['Amount'], 2, '.', ','); ?></h3>
                                    </p>
     
 

                                    <p class="m-2" style="font-weight:bold; font-size:18px;">Payment Summary:</p>
                                    <p class="m-1" style="font-size:15px;">Milestone - RM<?php echo number_format($reciept['ActualAmount'], 2, '.', ','); ?></p>
                                    <p class="m-1" style="font-size:15px;">Service fee - RM<?=$service_tax;?></p>
                                    <p class="m-1" style="font-size:15px;">6% SST - RM<?=$sst_tax;?></p>
                                    <div class="col-md-12 col-sm-12" style="margin-top:15px;">
                                        <button type="submit" class="btn btn-primary" style="background:#00C853; border:none;">Pay Now</button>
                                    </div>
                                </div>
                                
                    <input type="hidden" value="<?=$reciept['ActualAmount'];?>" name="amount">
                    <input type="hidden" value="<?=$reciept['Amount'];?>" name="totalprice">
                    <input type="hidden" name="recieptid" value="<?=$reciept['id'];?>">
                    <input type="hidden" name="userid" value="<?=$userid;?>">
                        <input type="hidden" name="postid" value="<?=$reciept['PostID'];?>">
                       <input type="hidden" name="type" value="<?=$reciept['Type'];?>">
                       <input type="hidden" name="planid" value="<?=$reciept['PlanID'];?>">
                       <input type="hidden" name="reciever" value="<?=$reciept['SendTo'];?>">
                       <input type="hidden" name="email" value="<?=$UserData['Email'];?>">
                     
                            </form>

                            
                         </div>
                          <div class="col-sm-3">
                            <div class="card-box table-responsive"></div>
                         </div>
              </div>
            </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>

<?php include('inc/footer.php'); ?>