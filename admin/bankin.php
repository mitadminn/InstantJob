<?php include('inc/header.php'); 
 
$allData = $obj->GetUploadReciept();


?>
 
<div class="right_col" role="main" style="min-height: 4560px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Payment in Bank</h3>
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
                  <div class="x_title">
                    <h2>All list</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30"> </p>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Timelog</th>
                          <th>Name</th>
          
                          <th>Phone</th>
                          <th>Milestone</th>
                          
                          <th>Payment Status</th>
                          <th>Reciept</th>
                     
                          <th>Amount</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($allData as $Allusers) { 
                          $dateString = $Allusers['Created_at'];
$dateTime = new DateTime($dateString);
$formattedDate = $dateTime->format('d-m-Y h:i:s A');

 
?>
                        <tr>
                          <td><?=$formattedDate;?></td>
                          <td><?=$Allusers['Name'];?></td>
                          <!--<td><?//=$Allusers['Email'];?></td>-->
                          <td><?=$Allusers['Phone'];?></td>
                          <td><?=$Allusers['Milestone'];?></td>
                          
                            <td>
                               <?php if($Allusers['Status'] == '1') { echo 'Paid';?>
                                     
                               <?php }else {echo 'Pending';} ?>
                            </td>
                           <td><a href="assets/img/<?=$Allusers['Reciept'];?>" target="_blank">View Reciept</a></td>   
                           
                           <td>RM<?=$formattedPrice = number_format($Allusers['Amount'], 2, '.', ',');?></td>
                            <td>
                                <?php if($admininfo['role'] == 'account' && $Allusers['Status'] != '1') { ?>
                                    <a href="reject?userid=<?=$Allusers['Userid'];?>&recieptid=<?=$Allusers['id'];?>">Reject</a>
                               <?php } ?>
                               /
                               <?php if($admininfo['role'] == 'account' && $Allusers['Status'] != '1') { ?>
                                    <a href="top-up-wallet?userid=<?=$Allusers['Userid'];?>&recieptid=<?=$Allusers['id'];?>">Approve</a>
                               <?php } ?>   
                               
                            </td>  
                           
                             </tr>
                       <?php } ?>
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>

<?php include('inc/footer.php'); ?>