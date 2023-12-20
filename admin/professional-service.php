<?php 
$page = '';
include('inc/header.php'); 
$allservices = $obj->GetAllServicesInadmin();
?>
 
<div class="right_col" role="main" style="min-height: 4560px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Professional Services</h3>
              </div>
               <div class="title_right">
               
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              
 <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Professional Services</small></h2>
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
                          <th>Topic</th>
                          <th>Price</th>
                          <th>Price Type</th>
                          <th>Area</th>
                          <th>Completed Days</th>
                          <th>Prefer Days</th>
                          <th>Add On Tasks</th>
                          <th>Photo</th>
                          <th>Status</th>
                          <th>Ads</th>
                          <th>Created at</th>
                         </tr>
                      </thead>
                      <tbody>
                          <?php foreach($allservices as $services) {?>
                        <tr>
                          <td><?=$services['topic'];?></td>
                          <td><?=$services['price'];?></td>
                          <td><?=$services['price_type'];?></td>
                          <td><?=$services['area'];?></td>
                          <td><?=$services['fast_complete'];?></td>
                          <td><?=$services['prefer_day'];?></td>
                          <td><?=$services['add_on_task'];?></td>
                          <td><img src="assets/img/services/<?=$services['photos'];?>" style="width: 42px;height: 42px;border-radius: 30px;"></td>
						  <td>
						  
						  <?php  $status =  $services['status']; 
							 if($status == '') { ?>
								<a href="inc/process.php?Approved=<?php echo $services['id'];?>"><button class="btn btn-warning">Waiting Approval </button></a>
 							<?php    
							 } if($status == 1) { ?>
								<a href="inc/process.php?Approved=<?php echo $services['id'];?>"><button class="btn btn-secondary">Inactive </button></a>
 							 <?php } if($status == 2) { ?>
								<a href="inc/process.php?Rejected=<?php echo $services['id'];?>"><button class="btn btn-success" onclick="myFunction()">Active </button></a>
 							 <?php } ?>
						  </td>	
						  
						  <td>
						  
						  <?php  $status =  $services['ads']; 
							 if($status == '') { ?>
								<a href="inc/process.php?adsApproved=<?php echo $services['id'];?>"><button class="btn btn-warning">Waiting Ads Approval </button></a>
 							<?php    
							 } if($status == 'Yes') { ?>
								<a href="inc/process.php?adsApproved=<?php echo $services['id'];?>"><button class="btn btn-secondary">Inactive </button></a>
 							 <?php } if($status == 'No') { ?>
								<a href="inc/process.php?adsRejected=<?php echo $services['id'];?>"><button class="btn btn-success" onclick="myFunction()">Active </button></a>
 							 <?php } ?>
						  </td>	
						  
						  
						  <td><?=$services['created_at'];?></td>   
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
<script>
function myFunction() {
  alert("Are you sure you want to Approve it?");
}
</script>