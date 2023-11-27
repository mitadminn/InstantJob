<?php include('inc/header.php'); 

$allcoupons = $obj->GetCoupons();

?>
 
 <style>
     
     button.delete-btn {
    background: #ff0000;
    border: 0;
    width: 100%;
    border-radius: 5px;
    padding: 6px 0;
}
button.delete-btn svg {
    width: 25px;
    color: #fff;
}
 </style>
<div class="right_col" role="main" style="min-height: 4560px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>View Coupon</h3>
              </div>

              <div class="title_right">
                <!--<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">-->
                <!--  <div class="input-group">-->
                <!--    <input type="text" class="form-control" placeholder="Search for...">-->
                <!--    <span class="input-group-btn">-->
                <!--      <button class="btn btn-secondary" type="button">Go!</button>-->
                <!--    </span>-->
                <!--  </div>-->
                <!--</div>-->
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              
 <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View Coupon</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <!--<li class="dropdown">-->
                      <!--  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>-->
                      <!--  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">-->
                      <!--      <a class="dropdown-item" href="#">Settings 1</a>-->
                      <!--      <a class="dropdown-item" href="#">Settings 2</a>-->
                      <!--    </div>-->
                      <!--</li>-->
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
                          <th>Coupon Name</th>
                          <th>Coupon Code</th>
                           <th>Coupon Amount</th>
                          <th>Coupon Quantity</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>No. of Days</th>
                          <th>Action</th>
                         </tr>
                      </thead>
                      <tbody>
                          <?php foreach($allcoupons as $copn) {?>
                        <tr>
                          <td><?=$copn['CouponName'];?></td>
                          <td><?=$copn['CouponCode'];?></td>
                          <td><?=$copn['CouponAmount'];?></td>
                          <td><?=$copn['Quantity'];?></td>
                          <td><?=$copn['SDate'];?></td>
                          <td><?=$copn['EDate'];?></td>
                          <td><?=$copn['Days'];?></td>
                          <td>
                              <a href="process.php?deletecoupon=<?=$copn['id'];?>"><button class="delete-btn">
                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                      <path fill="currentColor" d="M9,3V4H4V6H5V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V6H20V4H15V3H9M7,6H17V19H7V6M9,8V17H11V8H9M13,8V17H15V8H13Z" />
                                  </svg>
                              </a>
                              </button>
                          </td>
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