<?php include('inc/header.php');

$allplans = $obj->GetSponsorPlans();

?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        

        

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Wizards</h3>
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

              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Wizards <small>Sessions</small></h2>
                
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <!-- Smart Wizard -->
                    <p>This will show sponsorship page</p>
                    <div id="wizard" class="form_wizard wizard_horizontal">
                       <div id="step-1">
                                     <form action="inc/process.php?action=SponsorPlan" method="post" class="service-form example" enctype="multipart/form-data">


                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">For 7 Days  <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="number" name="plan1"  required="required" class="form-control" value="<?=$allplans['Plan1']?>">
                              <input type="hidden" name="id" class="form-control" value="<?=$allplans['id']?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">For 30 Days <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="number" name="plan2" required="required" class="form-control" value="<?=$allplans['Plan2']?>">
                            </div>
                          </div>
                          <div class="item form-group">
								 <div class="col-md-6 col-sm-6 offset-md-3">
 									<button type="submit" class="btn btn-success">Submit</button>
								 </div>
						 </div>
                         

                        </form>

                      </div>
                    
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
 