<?php include('inc/header.php');

$allplans = $obj->GetSponsorPlans();
$bankdetails = $obj->GetBankDetailById();

?>
<style>
     label {margin-top: 15px;}
</style>
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add Bank Details</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group row pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-secondary" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-8 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bank Details</h2>
                
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <!-- Smart Wizard -->
                    <div id="wizard" class="form_wizard wizard_horizontal">
                        
                         <form action="inc/process.php?action=UpdateBankDetails" method="post" class="service-form example" enctype="multipart/form-data">
                             
       
     
    <div class="form-group">
        <div class="col-md-12 col-sm-12 ">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" value="<?=$bankdetails['Name'];?>">
      <input type="hidden" class="form-control" name="id" value="1">
    </div>
     </div>
      
    <div class="form-group">
        <div class="col-md-12 col-sm-12">
      <label for="email">Bank Name:</label>
      <input type="text" class="form-control" name="bankname" value="<?=$bankdetails['BankName'];?>">
    </div>
    </div>
     
     <div class="form-group">
        <div class="col-md-12 col-sm-12">
      <label for="message">Bank Account No.</label>
      <input type="text" class="form-control" name="account_no" value="<?=$bankdetails['AccountNumber'];?>">
     </div>
    </div>
     <div class="form-group">
        <div class="col-md-12 col-sm-12">
      <label for="file">Bank Logo</label>
      <input style="padding:4px;" type="file" class="form-control" name="banklogo">
      <input style="padding:4px;" type="hidden" class="form-control" name="banklogo1" value="<?=$bankdetails['Logo'];?>">
     </div>
    </div>

    <div class="col-md-12 col-sm-12" style="margin-top:15px;">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>

                    </div>
                    <!-- End SmartWizard Content -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

   
<?php include('inc/footer.php'); ?>
 