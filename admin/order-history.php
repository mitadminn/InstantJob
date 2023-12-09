<?php include('inc/header.php'); 

$alljobs = $obj->getTransHistoryAll();

?>
 
<div class="right_col" role="main" style="min-height: 4560px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Transaction</h3>
              </div>

              <div class="title_right">

              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              
 <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Transaction</small></h2>
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
                          <th>Milestone</th>
                          <th>Price</th>
                          <th>Post Type</th>
                     
                          <th>Created at</th>
                         </tr>
                      </thead>
                      <tbody>
                          <?php foreach($alljobs as $jobs) {
                         $jobid = $jobs['postid'];
                         if($jobs['payment_for'] == 'job'){
                          $post = $obj->GetJobById($jobid);
                         } elseif($jobs['payment_for'] == 'service'){
                              $id = $jobs['postid'];
                              $post = $obj->GetServceById($id);
                             
                         }
                         
                         $m_id = $jobs['m_id'];
                         $milestonedata = $obj->GetPaymentPlanByMId($m_id);
                         $atamount = $milestonedata['plan_price'];
                 
                         if(empty($jobid))
                         { 
                             $topic = 'Top Up to personal account';
                            $type = 'PERSONAL';
                         } else {
                             $topic = $post['topic'];
                             
                              $type = $jobs['payment_for'];
                             
                         }
                          ?>
                        <tr>
                          <td><?=$topic;?></td>
                          <td><?=$milestonedata['plan'];?></td>
                          <td><?=$jobs['amount'];?></td>
                          <td><?=$type;?></td>
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