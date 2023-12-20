<?php include('inc/header.php'); 

$alljobs = $obj->GetAllJobadmin();

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
                          <th>Location</th>
                           <th>Photo</th>
                          <th>Status</th>
                          <th>Ads</th>
                          <th>Created at</th>
                         </tr>
                      </thead>
                      <tbody>
                          <?php foreach($alljobs as $jobs) {?>
                        <tr>
                          <td><?=$jobs['topic'];?></td>
                          <td><?=$jobs['price'];?></td>
                          <td><?=$jobs['price_type'];?></td>
                          <td><?=$jobs['area'];?></td>
                          <td><?=$jobs['fast_complete'];?></td>
                          <td><?=$jobs['location'];?></td>
                           <td><img src="assets/img/services/<?=$jobs['photos'];?>" style="width: 42px;height: 42px;border-radius: 30px;"></td>
						  <td>
						  
						  <?php  $status =  $jobs['status']; 
							 if($status == '') { ?>
								<a href="inc/process.php?jobactive=<?php echo $jobs['id'];?>"><button class="btn btn-warning">Waiting Approval </button></a>
 							<?php    
							 } if($status == 1) { ?>
								<a href="inc/process.php?jobactive=<?php echo $jobs['id'];?>"><button class="btn btn-secondary">Inactive </button></a>
 							 <?php } if($status == 2) { ?>
								<a href="inc/process.php?jobreject=<?php echo $jobs['id'];?>"><button class="btn btn-success" onclick="myFunction()">Active </button></a>
 							 <?php } ?>
						  </td>	
						  
						   <td>
 						  <?php  $ads =  $jobs['ads']; 
							 if($ads == '') { ?>
								<a href="inc/process.php?JobadsApproved=<?php echo $jobs['id'];?>"><button class="btn btn-warning">Waiting Ads Approval </button></a>
 							<?php    
							 } if($ads == 'Yes') { ?>
								<a href="inc/process.php?JobadsApproved=<?php echo $jobs['id'];?>"><button class="btn btn-secondary">Inactive </button></a>
 							 <?php } if($ads == 'No') { ?>
								<a href="inc/process.php?JobadsRejected=<?php echo $jobs['id'];?>"><button class="btn btn-success" onclick="myFunction()">Active </button></a>
 							 <?php } ?>
						  </td>	
						  
						  
						  <td><?=$jobs['created_at'];?></td>   
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