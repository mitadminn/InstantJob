<?php
 // Include header file
include('inc/header.php');

// Get all jobs using the GetAllJobadmin method from the $obj object
$years = $obj->GetYears();
?>

<div class="right_col" role="main" style="min-height: 4560px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Add Coupon</h3>
            </div>

            <div class="title_right">
                <!-- Additional title content can be added here if needed -->
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
             <!-- List of Years Section -->
            <div class="col-md-8 col-sm-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List of years</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive overflow-hidden">
                                    <p class="text-muted font-13 m-b-30"></p>

                                    <!-- Form for listing years (Same as the form above, consider reusing code) -->
                                                       <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                           <th>Years</th>
                          <th>Action</th>
                           
                           
                          
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($years as $year) {?>
                        <tr>
                           <td><?=$year['Year'];?></td>
                          <td><a href="inc/process.php?deleteyear=<?=$year['id'];?>">Delete</a></td>
                         
                           
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
            
            <!-- Add New Year Section -->
            <div class="col-md-4 col-sm-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add New Year</h2>
                        <!-- Small tag is closed properly in the h2 tag above -->
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive overflow-hidden">
                                    <p class="text-muted font-13 m-b-30"></p>

                                    <!-- Form for adding new year -->
                                    <form action="inc/process.php?action=AddYears" method="post" class="service-form example">
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 mb-3">
                                                <label for="name" class="m-0">Year : </label>
                                                <input type="text" class="form-control" name="years">
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

<?php
// Include footer file
include('inc/footer.php');
?>
 
