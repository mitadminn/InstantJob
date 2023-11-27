<?php include('inc/header.php'); 

$alljobs = $obj->GetAllJobadmin();

?>
 
<div class="right_col" role="main" style="min-height: 4560px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add Coupon</h3>
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
              
 <div class="col-md-8 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Coupon</small></h2>
 
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive overflow-hidden">
                    <p class="text-muted font-13 m-b-30"> </p>
					
                 <form action="inc/process.php?action=AddCoupons" method="post" class="service-form example">
                             
       
     
    <div class="form-group">
        <div class="col-md-12 col-sm-12  mb-3">
      <label for="name" class="m-0">Coupon Name : </label>
      <input type="text" class="form-control" name="couponname" >
    
    </div>
     </div>
      
    <div class="form-group">
        <div class="col-md-12 col-sm-12 mb-3">
      <label for="email" class="m-0">Coupon Code : </label>
      <input type="text" class="form-control" name="couponcode" >
    </div>
    </div>
    
       <div class="form-group">
        <div class="col-md-12 col-sm-12 mb-3">
      <label for="email" class="m-0">Coupon Amount : </label>
      <input type="number" class="form-control" name="couponamount" >
    </div>
    </div>
     
     <div class="form-group">
        <div class="col-md-12 col-sm-12 mb-3">
      <label for="message" class="m-0">Coupon Quantity : </label>
      <input type="text" class="form-control" name="couponquantity">
     </div>
    </div>
     <div class="form-group">
        <div class="col-md-12 col-sm-12 mb-3">
      <label for="file" class="m-0">Start Date</label>
      <input style="padding:4px;" type="date" class="form-control" name="couponsdate">
     </div>
    </div>
    
     <div class="form-group">
        <div class="col-md-12 col-sm-12 mb-3">
      <label for="file" class="m-0">End Date</label>
      <input style="padding:4px;" type="date" class="form-control" name="couponedate">
     </div>
    </div>
    
    <!-- <div class="form-group">-->
    <!--    <div class="col-md-12 col-sm-12 mb-3">-->
    <!--  <label for="text" class="m-0">Number of Days</label>-->
    <!--  <input style="padding:4px;" type="text" class="form-control" name="coupondays">-->
    <!-- </div>-->
    <!--</div>-->

    <div class="col-md-12 col-sm-12" style="margin-top:15px;">
    <button type="submit" class="btn btn-primary" style="background:#00C853; border:none;">Submit</button>
    </div>
  </form>
					
					
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