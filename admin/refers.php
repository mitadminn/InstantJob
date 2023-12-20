<?php 
$page = '';
include('inc/header.php'); 
$allservices = $obj->GetAllServicesInadmin();
$Refers = $obj->Refers();
?>
 
<div class="right_col" role="main" style="min-height: 4560px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>List of Refers</h3>
              </div>
               <div class="title_right">

              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              
 <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Referals</small></h2>
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
                          <th>Sender</th>
                          <th>Reciever</th>
                          <th>Action</th>
                          <th>Created At</th>
                         </tr>
                      </thead>
                      <tbody>
                          <?php foreach($Refers as $refer) {
                          
                           $refcode = $refer['ReferToken']; 
                          
                           $userid = substr($refcode, 0, strpos($refcode, "-"));
                           $userinfor = $obj->GetUserById($userid);
                          ?>
                        <tr>
                          <td><?=$userinfor['ProfileName'];?></td>
                          <td><?=$refer['ProfileName'];?></td>

						  <td>
								<a href="#"><button class="btn btn-warning">Coupon</button></a>
						  </td>	
						  
						  
						  
						  <td><?=$refer['Created_at'];?></td>   
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