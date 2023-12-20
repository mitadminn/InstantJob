 <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="dashboard" class="site_title">
                  <!--<i class="fa fa-paw"></i>-->
                  <img src="assets/img/logo-icon.png" alt="" style="width: auto;">
              <span><img src="assets/img/logos.png" alt="" style="width: 65%;"></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="assets/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?=$admininfo['Name'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="dashboard">Dashboard</a></li>
                      <!--<li><a href="index2.html">Dashboard2</a></li>-->
                      <!--<li><a href="index3.html">Dashboard3</a></li>-->
                    </ul>
                  </li>
                  <?php if($admininfo['role'] == 'SuperAdmin') {?>
                  <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="allusers">Frontend Users</a></li>
                      <li><a href="backend-user">Backend Users</a></li>
                      <li><a href="add-user">Add New Users</a></li>
                      <li><a href="inbox">Inbox</a></li>
                       
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Professional Services <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="professional-service">All Services</a></li>
                       
                    </ul>
                  </li>
				  
				  <li><a><i class="fa fa-laptop"></i> Job Listing <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="job-posting">All Jobs</a></li>
                       
                    </ul>
                  </li>
				  <li><a><i class="fa fa-laptop"></i>Transactions<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="job-posting">Accounts</a></li>
                      <li><a href="order-history">Order History</a></li>
                      <li><a href="bank-details">Add Bank Details</a></li>
                      <li><a href="bankin">Bank In Transaction</a></li>
                       
                    </ul>
                  </li>
				 
                  
                  
                  
				  
				  <?php } elseif($admininfo['role'] == 'support') { ?>
				  
				    <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="allusers">Frontend Users</a></li>
                      <li><a href="inbox">Inbox</a></li>
                      <!--<li><a href="backend-user">Backend Users</a></li>-->
                      <!--<li><a href="add-user">Add New Users</a></li>-->
                       
                    </ul>
                  </li>
                  
                  
				   <li><a><i class="fa fa-laptop"></i>Transactions<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="bankin">Bank In</a></li>
                      
                    </ul>
                  </li>
                  
                   
                  
                  
				  <?php } elseif($admininfo['role'] == 'account') { ?>
				    <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="allusers">Frontend Users</a></li>
                      <!--<li><a href="backend-user">Backend Users</a></li>-->
                      <!--<li><a href="add-user">Add New Users</a></li>-->
                       
                    </ul>
                  </li>
                  
                  
				  <li><a><i class="fa fa-laptop"></i>Transactions<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="bankin">Bank In</a></li>
                      
                    </ul>
                  </li>
				  <?php } elseif($admininfo['role'] == 'admin') { ?>
				    <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="allusers">Frontend Users</a></li>
                      <li><a href="inbox">Inbox</a></li>
                      <!--<li><a href="backend-user">Backend Users</a></li>-->
                      <!--<li><a href="add-user">Add New Users</a></li>-->
                       
                    </ul>
                  </li>
				  
				  <?php } ?>
                   <li><a><i class="fa fa-laptop"></i>Coupon Management<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add-coupon">Add Coupon</a></li>
                      <li><a href="view-coupon">View Coupon</a></li>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-laptop"></i>Tax<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="service-tax">Service Tax</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              
 
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="inc/process.php?action=AdminLogout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span> 
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>