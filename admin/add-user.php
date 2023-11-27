<?php include('inc/header.php');

$allplans = $obj->GetSponsorPlans();

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
                <h3>Users</h3>
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
                    <h2>Add <small>users</small></h2>
                
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <!-- Smart Wizard -->
                    <!--<p>This will show sponsorship page</p>-->
                    <div id="wizard" class="form_wizard wizard_horizontal">
                        
                         <form action="inc/process.php?action=AddUser" method="post" class="service-form example" enctype="multipart/form-data">
                             
                              <div class="form-group">
        <div class="col-md-12 col-sm-12">
      <label for="name">User Role:</label>
      <select name="userole" class="form-control" >
          <option hidden>Select Role</option>
          <option value="admin">Admin</option>
          <option value="support">Support Person</option>
          <option value="account">Account Person</option>
       </select>
     </div>
     </div>
     
     
    <div class="form-group">
        <div class="col-md-12 col-sm-12 ">
      <label for="name">Full Name:</label>
      <input type="text" class="form-control" name="name" placeholder="Enter your name">
    </div>
     </div>
      
    <div class="form-group">
        <div class="col-md-12 col-sm-12">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" placeholder="Enter your email">
    </div>
    </div>
     
     <div class="form-group">
        <div class="col-md-12 col-sm-12">
      <label for="message">Username :</label>
      <input type="text" class="form-control" name="username">
     </div>
    </div>
    
    
    <div class="form-group">
        <div class="col-md-12 col-sm-12">
      <label for="message">Password:</label>
      <input type="password" class="form-control" name="password">
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
 