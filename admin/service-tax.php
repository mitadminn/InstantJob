<?php include('inc/header.php'); 


?>
 
<div class="right_col" role="main" style="min-height: 4560px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add Coupon</h3>
              </div>

              <div class="title_right">
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
					
                 <form action="inc/process.php?action=ServiceTax" method="post" class="service-form example">
                             
       
     
    <div class="form-group">
        <div class="col-md-12 col-sm-12  mb-3">
      <label for="name" class="m-0">Service Charges</label>
      <input type="text" class="form-control" name="service" value="<?=$chrgs['Service'];?>">
    
    </div>
     </div>
      
    <div class="form-group">
        <div class="col-md-12 col-sm-12 mb-3">
      <label for="email" class="m-0">SST %</label>
      <input type="text" class="form-control" name="sst"  value="<?=$chrgs['Tax'];?>">
    </div>
    </div>
 
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