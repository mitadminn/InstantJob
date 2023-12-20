<?php
include "auth.php";
$page = "Manage Post";
include "inc/header.php";

$filter1 = $_GET["f1"];
$filter2 = $_GET["f2"];
if ($filter1 == "services") {
    $filterdata = $obj->GetServiceFilterData($user_id);
} elseif ($filter2 == "jobs") {
    $filterdata = $obj->GetJobFilterData($user_id);
} else {
}
$userservices = $obj->GetServiceByUserId($user_id);
$allwaitingposts = $obj->GetAllWaitingPosts($user_id);
$allpoststogether = $obj->GetAllPostsByUserId($user_id);
$allactiveposts = $obj->GetAllActicePosts($user_id);
$allinactiveposts = $obj->GetAllIncticePosts($user_id);
$all_completed_posts = $obj->GetAllCompletedPosts($user_id);
$all_rejected_posts = $obj->GetAllRejectedPosts($user_id);

$pending_services = $obj->GetPendingServiceByUserId($user_id);
$inactive_services = $obj->GetInactiveServiceByUserId($user_id);
$activejobs = $obj->GetActiveJobByUserId($user_id);
$inactive_jobs = $obj->GetInactiveJobByUserId($user_id);
$alljobs = $obj->GetAllJobByUser($user_id);
$waiting_jobs = $obj->GetPendingJobByUserId($user_id);
$completed_services = $obj->GetCompleteServicesByUserId($user_id);
$rejected_services = $obj->GetRejectedServicesByUserId($user_id);

$rejected_jobs = $obj->GetRejectedJobsByUserId($user_id);
?>
<?php include "inc/sidebar.php"; ?>
<style>
	.show-Dropdown {
		display: block;
	}

	/* Dropdown container */
	.dropdown {
		position: relative;
		display: inline-block;
	}

	/* Dropdown button */
	.dropdown button {
		padding: 10px;
		border: none;
		cursor: pointer;
	}

	/* Dropdown content */
	.dropdown-contenttt {
		display: none;
		position: absolute;
		z-index: 1;
		left: 0;
		top: 26px;
		background: #fff;
		width: max-content;
	}

	.dropdown-content {
		display: none;
		position: absolute;
		z-index: 1;
		left: 0;
		top: 40px !important;
		width: 100%;
	}

	/* Show dropdown content on button click */
	.show-dropdown {
		display: block;
	}

	/* Dropdown links */
	.dropdown-contenttt a {
		color: black;
		padding: 6px 4px;
		text-decoration: none;
		display: block;
		font-size: 12px;
		font-family: 'Roboto';
		border-bottom: 1px solid #cfcccc;
	}

	.dropdown-content a {
		color: black;
		padding: 6px 10px;
		text-decoration: none;
		display: block;
		font-size: 14px;
	}

	/* Change color of dropdown links on hover */
	.dropdown-contenttt a:hover {
		background-color: #f1f1f1;
	}

	.dropdown-content a:hover {
		background-color: #f1f1f1 !important;
	}

	button.btn_dropDown {
		padding: 2px 6px;
		border: none;
		cursor: pointer;
		font-size: 15px;
		height: 25px;
	}

	.dropDown_links a:focus {
		background: #00c853;
		color: #fff;
	}

	.dropDown_links_post a {
		padding: 8px !important;
		font-size: 12px !important;
	}

	.dropDown_links_post {
		right: 16px !important;
		top: 5px !important;
		width: max-content;
	}

	@media only screen and (min-width: 768px) {
		.mobile_drop_down {
			display: none;
		}
	}

	/* Mobile view */
	@media only screen and (max-width: 767px) {
		.mobile_drop_down {
			display: flex;
		}
	}

	/* Hide the default checkbox */
	.switch input[type=checkbox] {
		display: none;
	}

	/* Style the slider */
	.switch .slider {
		position: relative;
		display: inline-block;
		width: 57px;
		height: 28px;
		border-radius: 34px;
		background-color: #ccc;
		transition: background-color 0.2s;
	}

	/* Style the slider when checked */
	.switch input[type=checkbox]:checked + .slider {
		background-color: #000;
	}

	/* Style the slider's "knob" */
	.switch .slider::before {
		position: absolute;
		content: "";
		width: 24px;
		height: 24px;
		border-radius: 50%;
		background-color: #fff;
		box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
		left: 4px;
		top: 2px;
		transition: transform 0.2s;
		z-index: 1;
	}

	/* Style the slider's "knob" when checked */
	.switch input[type=checkbox]:checked + .slider::before {
		transform: translateX(26px);
	}

	button.btn.btn-round.btn-default.active {
		background: #323232;
		color: #fff;
		border: 1px solid #000;
	}

	span.slider.round {
		position: absolute !important;
		right: 42px !important;
		top: 4px !important;
	}

	p.off_wrap_btn {
		position: absolute;
		top: 12px;
		z-index: 0;
		right: 48px;
	}

	p.on_wrap_btn.text-light {
		position: absolute;
		right: 74px;
		top: 11px;
	}

	p.pp2.no-posts {
		font-size: 16px;
		text-align: left;
		padding: 24px;
		height: 100px;
		font-family: 'Roboto';
		color: #707070;
		font-weight: 500;
	}
</style>
<!--first tab row start-->
<div class="col-sm-12 instant-main">
	<div class="row">
		<div class="middle_container">
			<div class="head-mid">
				<h2>Manage Post</h2>
			</div>
			<!-- ----------------------middle one---------------------- -->
			<div class="manage-section">
				<div class=" justify-content-between mb-2 mt-3 mobile_drop_down">
					<div class="dropdown ">
						<button class="text-dark bg-white font-weight-bold rounded btn_dropDown drop_btn_showall" onclick="toggleDropdownnnn()">
							Show All
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
								<path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
							</svg>
						</button>
						<div class="text-left dropdown-contenttt dropDown_links">
							<a class="font-weight-bold" href="manage-post?f1=<?= $_GET[
           "f1"
       ] ?>&f2=">Show All</a>
							<a class="font-weight-bold" href="manage-post?f1=<?= $_GET[
           "f1"
       ] ?>&f2=waiting">Waiting Approval</a>
							<a class="font-weight-bold" href="manage-post?f1=<?= $_GET[
           "f1"
       ] ?>&f2=active">Active</a>
							<a class="font-weight-bold" href="manage-post?f1=<?= $_GET[
           "f1"
       ] ?>&f2=inactive">Inactive</a>
							<a class="font-weight-bold" href="manage-post?f1=<?= $_GET[
           "f1"
       ] ?>&f2=completed">Completed</a>
						</div>
					</div>
					<!--Create a New Service or POst-->
					<a href="select-services"><button type="button" class=" rounded btn_new_post">+ New Post</button></a>
				</div>
				<!--All posts by user-->
				<div class="all-posts">
					<?php if ($_GET["f1"] == "all" && $_GET["f2"] == "") { ?>
					<?php
     $data_found = false;
     // Initialize flag variable
     while ($rows = mysqli_fetch_array($allpoststogether)) {

         $userid = $rows["user_id"];
         $userinfo = $obj->GetUserById($userid);
         $posttype = $rows["post_type"];
         $data_found = true;
         // Initialize flag variable
         if ($posttype == "service") {
             $myjs = "MYS";
             $page_edit = "edit-service";
             $page_dplct = "duplicate-service";
             $page_spnsr = "post-sponsor";
         } elseif ($posttype == "job") {
             $myjs = "MYJ";
             $page_edit = "edit-post";
             $page_dplct = "duplicate-post";
             $page_spnsr = "job-sponsor";
         } else {
         }
         $price = $rows["price"];
         $formattedPrice = number_format($price, 0, ".", ",");
         ?>
					<div class="">
						<p class="status-id"><?php if ($rows["status"] == "") {
          echo "Waiting Approval";
      } elseif ($rows["status"] == 1) {
          echo "Active";
      } elseif ($rows["status"] == 2) {
          echo "Inactive";
      } elseif ($rows["status"] == 3) {
          echo "Completed";
      } elseif ($rows["status"] == 4) {
          echo "Rejected";
      } ?> : Post ID - <?=$myjs;?><?=$rows['random_id'];?></p>
						<div class="img-p">
							<div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?= $rows[
           "photos"
       ] ?>" alt=""> </div>
							<div class="all-cnt">
								<div class="d-flex two-lb align-items-center">
									<div class="img-plus-nm">
										<img class="sm-img" src="<?php if (!empty($_SESSION["user_image"])) {
              echo $_SESSION["user_image"];
          } elseif (empty($_SESSION["user_image"])) {
              echo "admin/assets/img/profile/" . $userinfo["ProfilePic"];
          } else {
              echo "assets/img/dcc2ccd9.avif";
          } ?>" alt="">
										<p class="pp mr-in "> <?= $userinfo["ProfileName"] ?></p>
									</div>
									<div class="jst-nw d-flex justify-content-end">
										<?php if ($rows["status"] == 1 || $rows["status"] == 2) {
              echo '<label class="switch">';
              echo '<input id="statuschange" type="checkbox" data-type="' .
                  $posttype .
                  '" data-id="' .
                  $rows["id"] .
                  '"';
              if ($rows["status"] == 1) {
                  echo " checked";
              }
              echo ">";
              echo '<span class="slider round on-off-toggle"></span>';
              echo '<p class="off_wrap_btn">OFF</p>';
              echo '<p class="on_wrap_btn text-light">ON</p>';
              echo "</label>";
          } ?>
										<div class="icon-menu" onclick="ExtraMenu(<?php echo $rows[
              "random_id"
          ]; ?>)" data-id="<?= $rows["random_id"] ?>">
											<svg style="position: absolute; right: 0; top: -15px;" class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
												<path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" />
											</svg>
											<div id="<?= $rows[
               "random_id"
           ] ?>" class="text-left dropdown-contentt dropDown_links_post">
												<a class="dropdown_menu" href="<?= $page_edit ?>?id=<?= $rows["id"] ?>">Edit</a>
												<a class="dropdown_menu" href="<?= $page_dplct ?>?id=<?= $rows[
    "id"
] ?>">Duplicate</a>
												<a class="dropdown_menu" href="<?= $page_spnsr ?>?id=<?= $rows[
    "id"
] ?>&am=<?= $rows["price"] ?>">Sponsor AD</a>
												<a class="dropdown_menu" id="delete" onclick="deletePost(<?php echo $rows[
                "id"
            ]; ?>)" data-type="<?= $rows["post_type"] ?>">Delete</a>
											</div>
										</div>
									</div>
								</div>
								<p class="pp2"><b class="highlighter-rouge"></b> <?= $rows["topic"] ?> </p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="star">
										<i class="fa-solid fa-star"></i>
										<small>4.0 (1)</small>
									</div>
									<p><small>From </small> <b>
											RM<?= $formattedPrice ?>
										</b>
									</p>
								</div>
							</div>
						</div>
					</div>
					<!--Manage post  three horizontal drop down-->
					<?php
     }
     ?>
					<?php if (!$data_found) {
         echo '<div class="nodatafound">
            <div class="img-p">
                    <div class="all-cnt">
                        <p class="pp2 no-posts"> No posts were found. To create post, go to Professional Services or Jobs Marketplace Click + or Create Post.</p>
                        
                   </div>
               </div>
                
            </div>';
     } ?>
					<!--Waiting Posts -->
					<?php } elseif ($_GET["f1"] == "all" && $_GET["f2"] == "waiting") {

         $data_found = false;
         // Initialize flag variable
         while ($rows = mysqli_fetch_array($allwaitingposts)) {

             $userid = $rows["user_id"];
             $userinfo = $obj->GetUserById($userid);
             $posttype = $rows["post_type"];
             $data_found = true;
             // Initialize flag variable
             if ($posttype == "service") {
                 $myjs = "MYS";
                 $page_edit = "edit-service";
                 $page_dplct = "duplicate-service";
                 $page_spnsr = "post-sponsor";
             } elseif ($posttype == "job") {
                 $myjs = "MYJ";
                 $page_edit = "edit-post";
                 $page_dplct = "duplicate-post";
                 $page_spnsr = "job-sponsor";
             } else {
             }
             $price = $rows["price"];
             $formattedPrice = number_format($price, 0, ".", ",");
             ?>
					<div class="">
						<p class="status-id"><?php if ($rows["status"] == "") {
          echo "Waiting Approval";
      } elseif ($rows["status"] == 1) {
          echo "Active";
      } elseif ($rows["status"] == 2) {
          echo "Inactive";
      } elseif ($rows["status"] == 3) {
          echo "Completed";
      } elseif ($rows["status"] == 4) {
          echo "Rejected";
      } ?> : Post ID - <?=$myjs;?><?=$rows['random_id'];?></p>
						<div class="img-p">
							<div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?= $rows[
           "photos"
       ] ?>" alt=""> </div>
							<div class="all-cnt">
								<div class="d-flex two-lb align-items-center">
									<div class="img-plus-nm">
										<img class="sm-img" src="<?php if (!empty($_SESSION["user_image"])) {
              echo $_SESSION["user_image"];
          } elseif (empty($_SESSION["user_image"])) {
              echo "admin/assets/img/profile/" . $userinfo["ProfilePic"];
          } else {
              echo "assets/img/dcc2ccd9.avif";
          } ?>" alt="">
										<p class="pp mr-in "> <?= $userinfo["ProfileName"] ?></p>
									</div>
									<div class="jst-nw d-flex justify-content-end">
										<?php if ($rows["status"] == 1 || $rows["status"] == 2) {
              echo '<label class="switch">';
              echo '<input id="statuschange" type="checkbox" data-type="' .
                  $posttype .
                  '" data-id="' .
                  $rows["id"] .
                  '"';
              if ($rows["status"] == 1) {
                  echo " checked";
              }
              echo ">";
              echo '<span class="slider round on-off-toggle"></span>';
              echo '<p class="off_wrap_btn">OFF</p>';
              echo '<p class="on_wrap_btn text-light">ON</p>';
              echo "</label>";
          } ?>
										<div class="icon-menu" onclick="ExtraMenu(<?php echo $rows[
              "random_id"
          ]; ?>)" data-id="<?= $rows["random_id"] ?>">
											<svg style="position: absolute; right: 0; top: -15px;" class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
												<path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" />
											</svg>
											<div id="<?= $rows[
               "random_id"
           ] ?>" class="text-left dropdown-contentt dropDown_links_post">
												<a class="dropdown_menu" href="<?= $page_edit ?>?id=<?= $rows["id"] ?>">Edit</a>
												<a class="dropdown_menu" href="<?= $page_dplct ?>?id=<?= $rows[
    "id"
] ?>">Duplicate</a>
												<a class="dropdown_menu" href="<?= $page_spnsr ?>?id=<?= $rows[
    "id"
] ?>&am=<?= $rows["price"] ?>">Sponsor AD</a>
												<a class="dropdown_menu" id="delete" onclick="deletePost(<?php echo $rows[
                "id"
            ]; ?>)" data-type="<?= $rows["post_type"] ?>">Delete</a>
											</div>
										</div>
									</div>
								</div>
								<p class="pp2"><b class="highlighter-rouge"></b> <?= $rows["topic"] ?> </p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="star">
										<i class="fa-solid fa-star"></i>
										<small>4.0 (1)</small>
									</div>
									<p><small>From </small> <b>
											RM<?= $formattedPrice ?></b>
									</p>
								</div>
							</div>
						</div>
					</div>
					<?php
         }
         ?>
					<?php if (!$data_found) {
         echo '<div class="nodatafound">
            <div class="img-p">
                    <div class="all-cnt">
                        <p class="pp2 no-posts"> No posts were found. To create post, go to Professional Services or Jobs Marketplace Click + or Create Post.</p>
                        
                   </div>
               </div>
                
            </div>';
     } ?>
					<!--Active Posts -->
					<?php
     } elseif ($_GET["f1"] == "all" && $_GET["f2"] == "active") {

         $data_found = false;
         // Initialize flag variable
         while ($rows = mysqli_fetch_array($allactiveposts)) {

             $userid = $rows["user_id"];
             $userinfo = $obj->GetUserById($userid);
             $posttype = $rows["post_type"];
             $data_found = true;
             // Initialize flag variable
             if ($posttype == "service") {
                 $myjs = "MYS";
                 $page_edit = "edit-service";
                 $page_dplct = "duplicate-service";
                 $page_spnsr = "post-sponsor";
             } elseif ($posttype == "job") {
                 $myjs = "MYJ";
                 $page_edit = "edit-post";
                 $page_dplct = "duplicate-post";
                 $page_spnsr = "job-sponsor";
             } else {
             }
             $price = $rows["price"];
             $formattedPrice = number_format($price, 0, ".", ",");
             ?>
					<div class="">
						<p class="status-id"><?php if ($rows["status"] == "") {
          echo "Waiting Approval";
      } elseif ($rows["status"] == 1) {
          echo "Active";
      } elseif ($rows["status"] == 2) {
          echo "Inactive";
      } elseif ($rows["status"] == 3) {
          echo "Completed";
      } elseif ($rows["status"] == 4) {
          echo "Rejected";
      } ?> : Post ID - <?=$myjs;?><?=$rows['random_id'];?></p>
						<div class="img-p">
							<div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?= $rows[
           "photos"
       ] ?>" alt=""> </div>
							<div class="all-cnt">
								<div class="d-flex two-lb align-items-center">
									<div class="img-plus-nm">
										<img class="sm-img" src="<?php if (!empty($_SESSION["user_image"])) {
              echo $_SESSION["user_image"];
          } elseif (empty($_SESSION["user_image"])) {
              echo "admin/assets/img/profile/" . $userinfo["ProfilePic"];
          } else {
              echo "assets/img/dcc2ccd9.avif";
          } ?>" alt="">
										<p class="pp mr-in "> <?= $userinfo["ProfileName"] ?></p>
									</div>
									<div class="jst-nw d-flex justify-content-end">
										<?php if ($rows["status"] == 1 || $rows["status"] == 2) {
              echo '<label class="switch">';
              echo '<input id="statuschange" type="checkbox" data-type="' .
                  $posttype .
                  '" data-id="' .
                  $rows["id"] .
                  '"';
              if ($rows["status"] == 1) {
                  echo " checked";
              }
              echo ">";
              echo '<span class="slider round on-off-toggle"></span>';
              echo '<p class="off_wrap_btn">OFF</p>';
              echo '<p class="on_wrap_btn text-light">ON</p>';
              echo "</label>";
          } ?>
										<div class="icon-menu" onclick="ExtraMenu(<?php echo $rows[
              "random_id"
          ]; ?>)" data-id="<?= $rows["random_id"] ?>">
											<svg style="position: absolute; right: 0; top: -15px;" class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
												<path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" />
											</svg>
											<div id="<?= $rows[
               "random_id"
           ] ?>" class="text-left dropdown-contentt dropDown_links_post">
												<a class="dropdown_menu" href="<?= $page_edit ?>?id=<?= $rows["id"] ?>">Edit</a>
												<a class="dropdown_menu" href="<?= $page_dplct ?>?id=<?= $rows[
    "id"
] ?>">Duplicate</a>
												<a class="dropdown_menu" href="<?= $page_spnsr ?>?id=<?= $rows[
    "id"
] ?>&am=<?= $rows["price"] ?>">Sponsor AD</a>
												<a class="dropdown_menu" id="delete" onclick="deletePost(<?php echo $rows[
                "id"
            ]; ?>)" data-type="<?= $rows["post_type"] ?>">Delete</a>
											</div>
										</div>
									</div>
								</div>
								<p class="pp2"><b class="highlighter-rouge"></b> <?= $rows["topic"] ?> </p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="star">
										<i class="fa-solid fa-star"></i>
										<small>4.0 (1)</small>
									</div>
									<p><small>From </small> <b>
											RM<?= $formattedPrice ?></b>
									</p>
								</div>
							</div>
						</div>
					</div>
					<?php
         }
         ?>
					<?php if (!$data_found) {
         echo '<div class="nodatafound">
            <div class="img-p">
                    <div class="all-cnt">
                        <p class="pp2 no-posts"> No posts were found. To create post, go to Professional Services or Jobs Marketplace Click + or Create Post.</p>
                        
                   </div>
               </div>
                
            </div>';
     } ?>
					<?php
     } elseif ($_GET["f1"] == "all" && $_GET["f2"] == "inactive") { ?>
					<?php
     $data_found = false;
     // Initialize flag variable
     while ($rows = mysqli_fetch_array($allinactiveposts)) {

         $userid = $rows["user_id"];
         $userinfo = $obj->GetUserById($userid);
         $posttype = $rows["post_type"];
         $data_found = true;
         // Initialize flag variable
         if ($posttype == "service") {
             $myjs = "MYS";
             $page_edit = "edit-service";
             $page_dplct = "duplicate-service";
             $page_spnsr = "post-sponsor";
         } elseif ($posttype == "job") {
             $myjs = "MYJ";
             $page_edit = "edit-post";
             $page_dplct = "duplicate-post";
             $page_spnsr = "job-sponsor";
         } else {
         }
         $price = $rows["price"];
         $formattedPrice = number_format($price, 0, ".", ",");
         $totalRating +=
             $row["communication_rating"] +
             $row["service_delivered_rating"] +
             $row["price_budget_rating"] +
             $row["repeat_hire_rating"];
         $averageRating = $totalRating / (mysqli_num_rows($allreviews) * 4); // Divide by the total number of reviews times 4 (assuming each review has 4 rating categories)
         $roundedRating = round($averageRating, 1);

         // Round the average rating to one decimal place
         ?>
					<div class="">
						<p class="status-id"><?php if ($rows["status"] == "") {
          echo "Waiting Approval";
      } elseif ($rows["status"] == 1) {
          echo "Active";
      } elseif ($rows["status"] == 2) {
          echo "Inactive";
      } elseif ($rows["status"] == 3) {
          echo "Completed";
      } elseif ($rows["status"] == 4) {
          echo "Rejected";
      } ?> : Post ID - <?=$myjs;?><?=$rows['random_id'];?></p>
						<div class="img-p">
							<div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?= $rows[
           "photos"
       ] ?>" alt=""> </div>
							<div class="all-cnt">
								<div class="d-flex two-lb align-items-center">
									<div class="img-plus-nm">
										<img class="sm-img" src="<?php if (!empty($_SESSION["user_image"])) {
              echo $_SESSION["user_image"];
          } elseif (empty($_SESSION["user_image"])) {
              echo "admin/assets/img/profile/" . $userinfo["ProfilePic"];
          } else {
              echo "assets/img/dcc2ccd9.avif";
          } ?>" alt="">
										<p class="pp mr-in "> <?= $userinfo["ProfileName"] ?></p>
									</div>
									<div class="jst-nw d-flex justify-content-end">
										<?php if ($rows["status"] == 1 || $rows["status"] == 2) {
              echo '<label class="switch">';
              echo '<input id="statuschange" type="checkbox" data-type="' .
                  $posttype .
                  '" data-id="' .
                  $rows["id"] .
                  '"';
              if ($rows["status"] == 1) {
                  echo " checked";
              }
              echo ">";
              echo '<span class="slider round on-off-toggle"></span>';
              echo '<p class="off_wrap_btn">OFF</p>';
              echo '<p class="on_wrap_btn text-light">ON</p>';
              echo "</label>";
          } ?>
										<div class="icon-menu" onclick="ExtraMenu(<?php echo $rows[
              "random_id"
          ]; ?>)" data-id="<?= $rows["random_id"] ?>">
											<svg style="position: absolute; right: 0; top: -15px;" class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
												<path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" />
											</svg>
											<div id="<?= $rows[
               "random_id"
           ] ?>" class="text-left dropdown-contentt dropDown_links_post">
												<a class="dropdown_menu" href="<?= $page_edit ?>?id=<?= $rows["id"] ?>">Edit</a>
												<a class="dropdown_menu" href="<?= $page_dplct ?>?id=<?= $rows[
    "id"
] ?>">Duplicate</a>
												<a class="dropdown_menu" href="<?= $page_spnsr ?>?id=<?= $rows[
    "id"
] ?>&am=<?= $rows["price"] ?>">Sponsor AD</a>
												<a class="dropdown_menu" id="delete" onclick="deletePost(<?php echo $rows[
                "id"
            ]; ?>)" data-type="<?= $rows["post_type"] ?>">Delete</a>
											</div>
										</div>
									</div>
								</div>
								<p class="pp2"><b class="highlighter-rouge"></b> <?= $rows["topic"] ?> </p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="star">
										<i class="fa-solid fa-star"></i>
										<small>4.0 (1)</small>
									</div>
									<p><small>From </small> <b>
											RM<?= $formattedPrice ?></b>
									</p>
								</div>
							</div>
						</div>
					</div>
					<?php
     }
     ?>
					<?php if (!$data_found) {
         echo '<div class="nodatafound">
            <div class="img-p">
                    <div class="all-cnt">
                        <p class="pp2 no-posts"> No posts were found. To create post, go to Professional Services or Jobs Marketplace Click + or Create Post.</p>
                        
                   </div>
               </div>
                
            </div>';
     } ?>
					<!--Start completed-->
					<?php } elseif ($_GET["f1"] == "all" && $_GET["f2"] == "completed") {

         $data_found = false;
         // Initialize flag variable
         while ($rows = mysqli_fetch_array($all_completed_posts)) {

             $userid = $rows["user_id"];
             $userinfo = $obj->GetUserById($userid);
             $posttype = $rows["post_type"];
             $data_found = true;
             // Initialize flag variable
             if ($posttype == "service") {
                 $myjs = "MYS";
                 $page_edit = "edit-service";
                 $page_dplct = "duplicate-service";
                 $page_spnsr = "post-sponsor";
             } elseif ($posttype == "job") {
                 $myjs = "MYJ";
                 $page_edit = "edit-post";
                 $page_dplct = "duplicate-post";
                 $page_spnsr = "job-sponsor";
             } else {
             }
             $price = $rows["price"];
             $formattedPrice = number_format($price, 0, ".", ",");
             ?>
					<div class="">
						<p class="status-id"><?php if ($rows["status"] == "") {
          echo "Waiting Approval";
      } elseif ($rows["status"] == 1) {
          echo "Active";
      } elseif ($rows["status"] == 2) {
          echo "Inactive";
      } elseif ($rows["status"] == 3) {
          echo "Completed";
      } elseif ($rows["status"] == 4) {
          echo "Rejected";
      } ?> : Post ID - <?=$myjs;?><?=$rows['random_id'];?></p>
						<div class="img-p">
							<div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?= $rows[
           "photos"
       ] ?>" alt=""> </div>
							<div class="all-cnt">
								<div class="d-flex two-lb align-items-center">
									<div class="img-plus-nm">
										<img class="sm-img" src="<?php if (!empty($_SESSION["user_image"])) {
              echo $_SESSION["user_image"];
          } elseif (empty($_SESSION["user_image"])) {
              echo "admin/assets/img/profile/" . $userinfo["ProfilePic"];
          } else {
              echo "assets/img/dcc2ccd9.avif";
          } ?>" alt="">
										<p class="pp mr-in "> <?= $userinfo["ProfileName"] ?></p>
									</div>
									<div class="jst-nw d-flex justify-content-end">
										<?php if ($rows["status"] == 1 || $rows["status"] == 2) {
              echo '<label class="switch">';
              echo '<input id="statuschange" type="checkbox" data-type="' .
                  $posttype .
                  '" data-id="' .
                  $rows["id"] .
                  '"';
              if ($rows["status"] == 1) {
                  echo " checked";
              }
              echo ">";
              echo '<span class="slider round on-off-toggle"></span>';
              echo '<p class="off_wrap_btn">OFF</p>';
              echo '<p class="on_wrap_btn text-light">ON</p>';
              echo "</label>";
          } ?>
										<div class="icon-menu" onclick="ExtraMenu(<?php echo $rows[
              "random_id"
          ]; ?>)" data-id="<?= $rows["random_id"] ?>">
											<svg style="position: absolute; right: 0; top: -15px;" class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
												<path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" />
											</svg>
											<div id="<?= $rows[
               "random_id"
           ] ?>" class="text-left dropdown-contentt dropDown_links_post">
												<a class="dropdown_menu" href="<?= $page_edit ?>?id=<?= $rows["id"] ?>">Edit</a>
												<a class="dropdown_menu" href="<?= $page_dplct ?>?id=<?= $rows[
    "id"
] ?>">Duplicate</a>
												<a class="dropdown_menu" href="<?= $page_spnsr ?>?id=<?= $rows[
    "id"
] ?>&am=<?= $rows["price"] ?>">Sponsor AD</a>
												<a class="dropdown_menu" id="delete" onclick="deletePost(<?php echo $rows[
                "id"
            ]; ?>)" data-type="<?= $rows["post_type"] ?>">Delete</a>
											</div>
										</div>
									</div>
								</div>
								<p class="pp2"><b class="highlighter-rouge"></b> <?= $rows["topic"] ?> </p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="star">
										<i class="fa-solid fa-star"></i>
										<small>4.0 (1)</small>
									</div>
									<p><small>From </small> <b>
											RM<?= $formattedPrice ?></b>
									</p>
								</div>
							</div>
						</div>
					</div>
					<?php
         }
         ?>
					<!--End completed-->
					<?php if (!$data_found) {
         echo '<div class="nodatafound">
            <div class="img-p">
                    <div class="all-cnt">
                        <p class="pp2 no-posts"> No posts were found. To create post, go to Professional Services or Jobs Marketplace Click + or Create Post.</p>
                        
                   </div>
               </div>
                
            </div>';
     } ?>
					<!-- Start Reject -->
					<?php
     } elseif ($_GET["f1"] == "all" && $_GET["f2"] == "reject") {

         $data_found = false;
         // Initialize flag variable
         while ($rows = mysqli_fetch_array($all_rejected_posts)) {

             $userid = $rows["user_id"];
             $userinfo = $obj->GetUserById($userid);
             $posttype = $rows["post_type"];
             $data_found = true;
             // Initialize flag variable
             if ($posttype == "service") {
                 $myjs = "MYS";
                 $page_edit = "edit-service";
                 $page_dplct = "duplicate-service";
                 $page_spnsr = "post-sponsor";
             } elseif ($posttype == "job") {
                 $myjs = "MYJ";
                 $page_edit = "edit-post";
                 $page_dplct = "duplicate-post";
                 $page_spnsr = "job-sponsor";
             } else {
             }
             $price = $rows["price"];
             $formattedPrice = number_format($price, 0, ".", ",");
             ?>
					<div class="">
						<p class="status-id"><?php if ($rows["status"] == "") {
          echo "Waiting Approval";
      } elseif ($rows["status"] == 1) {
          echo "Active";
      } elseif ($rows["status"] == 2) {
          echo "Inactive";
      } elseif ($rows["status"] == 3) {
          echo "Completed";
      } elseif ($rows["status"] == 4) {
          echo "Rejected";
      } ?> : Post ID - <?=$myjs;?><?=$rows['random_id'];?></p>
						<div class="img-p">
							<div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?= $rows[
           "photos"
       ] ?>" alt=""> </div>
							<div class="all-cnt">
								<div class="d-flex two-lb align-items-center">
									<div class="img-plus-nm">
										<img class="sm-img" src="<?php if (!empty($_SESSION["user_image"])) {
              echo $_SESSION["user_image"];
          } elseif (empty($_SESSION["user_image"])) {
              echo "admin/assets/img/profile/" . $userinfo["ProfilePic"];
          } else {
              echo "assets/img/dcc2ccd9.avif";
          } ?>" alt="">
										<p class="pp mr-in "> <?= $userinfo["ProfileName"] ?></p>
									</div>
									<div class="jst-nw d-flex justify-content-end">
										<?php if ($rows["status"] == 1 || $rows["status"] == 2) {
              echo '<label class="switch">';
              echo '<input id="statuschange" type="checkbox" data-type="' .
                  $posttype .
                  '" data-id="' .
                  $rows["id"] .
                  '"';
              if ($rows["status"] == 1) {
                  echo " checked";
              }
              echo ">";
              echo '<span class="slider round on-off-toggle"></span>';
              echo '<p class="off_wrap_btn">OFF</p>';
              echo '<p class="on_wrap_btn text-light">ON</p>';
              echo "</label>";
          } ?>
										<div class="icon-menu" onclick="ExtraMenu(<?php echo $rows[
              "random_id"
          ]; ?>)" data-id="<?= $rows["random_id"] ?>">
											<svg style="position: absolute; right: 0; top: -15px;" class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
												<path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" />
											</svg>
											<div id="<?= $rows[
               "random_id"
           ] ?>" class="text-left dropdown-contentt dropDown_links_post">
												<a class="dropdown_menu" href="<?= $page_edit ?>?id=<?= $rows["id"] ?>">Edit</a>
												<a class="dropdown_menu" href="<?= $page_dplct ?>?id=<?= $rows[
    "id"
] ?>">Duplicate</a>
												<a class="dropdown_menu" href="<?= $page_spnsr ?>?id=<?= $rows[
    "id"
] ?>&am=<?= $rows["price"] ?>">Sponsor AD</a>
												<a class="dropdown_menu" id="delete" onclick="deletePost(<?php echo $rows[
                "id"
            ]; ?>)" data-type="<?= $rows["post_type"] ?>">Delete</a>
											</div>
										</div>
									</div>
								</div>
								<p class="pp2"><b class="highlighter-rouge"></b> <?= $rows["topic"] ?> </p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="star">
										<i class="fa-solid fa-star"></i>
										<small>4.0 (1)</small>
									</div>
									<p><small>From </small> <b>
											RM<?= $formattedPrice ?></b>
									</p>
								</div>
							</div>
						</div>
					</div>
					<?php
         }
         ?>
					<!-- End Reject -->
					<?php if (!$data_found) {
         echo '<div class="nodatafound">
            <div class="img-p">
                    <div class="all-cnt">
                        <p class="pp2 no-posts"> No posts were found. To create post, go to Professional Services or Jobs Marketplace Click + or Create Post.</p>
                        
                   </div>
               </div>
                
            </div>';
     } ?>
					<?php
     } else {
     } ?>
				</div>
				<!--End All posts by user-->
				<?php if ($filter1 == "services" && $filter2 == "") { ?>

				<!--Start all service only -->
				<div class="all-services">
					<?php
     $data_found = false;
     // Initialize flag variable
     while ($row_active = mysqli_fetch_array($userservices)) {

         $userid = $row_active["user_id"];
         $userinfo = $obj->GetUserById($userid);
         $data_found = true;
         // Initialize flag variable
         $price = $row_active["price"];
         $formattedPrice = number_format($price, 0, ".", ",");
         ?>
					<div class="">
						<p class="status-id"><?php if ($row_active["status"] == "") {
          echo "Waiting Approval";
      } elseif ($row_active["status"] == 1) {
          echo "Active";
      } elseif ($row_active["status"] == 2) {
          echo "Inactive";
      } elseif ($row_active["status"] == 3) {
          echo "Completed";
      } elseif ($row_active["status"] == 4) {
          echo "Rejected";
      } ?> : Post ID - MYS<?= $row_active["random_id"] ?></p>
						<div class="img-p">
							<div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?= $row_active[
           "photos"
       ] ?>" alt=""> </div>
							<div class="all-cnt">
								<div class="d-flex two-lb align-items-center">
									<div class="img-plus-nm">
										<img class="sm-img" src="<?php if (!empty($_SESSION["user_image"])) {
              echo $_SESSION["user_image"];
          } elseif (empty($_SESSION["user_image"])) {
              echo "admin/assets/img/profile/" . $userinfo["ProfilePic"];
          } else {
              echo "assets/img/dcc2ccd9.avif";
          } ?>" alt="">
										<p class="pp mr-in "> <?= $userinfo["ProfileName"] ?></p>
									</div>
									<div class="jst-nw d-flex justify-content-end">
										<?php if ($row_active["status"] == 1 || $row_active["status"] == 2) {
              echo '<label class="switch">';
              echo '<input  id="statuschange" data-type="' .
                  $posttype .
                  '" type="checkbox" data-id="' .
                  $row_active["id"] .
                  '"';
              if ($row_active["status"] == 1) {
                  echo " checked";
              }
              echo ">";
              echo '<span class="slider round"></span>';
              echo '<p class="off_wrap_btn">OFF</p>';
              echo '<p class="on_wrap_btn text-light">ON</p>';
              echo "</label>";
          } ?>
										<div class="icon-menu" onclick="ExtraMenu(<?php echo $row_active[
              "random_id"
          ]; ?>)" data-id="<?= $row_active["random_id"] ?>">
											<svg style="    position: absolute; right: 0; top: -11px;" class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
												<path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" />
											</svg>
											<div id="<?= $row_active[
               "random_id"
           ] ?>" class="text-left dropdown-contentt dropDown_links_post">
												<a class="dropdown_menu" href="edit-service?id=<?= $row_active[
                "id"
            ] ?>">Edit</a>
												<a class="dropdown_menu" href="duplicate-service?id=<?= $row_active[
                "id"
            ] ?>">Duplicate</a>
												<a class="dropdown_menu" href="post-sponsor.php?id=<?= $row_active[
                "id"
            ] ?>&am=<?= $row_active["price"] ?>">Sponsor AD</a>
												<a class="dropdown_menu" id="delete" onclick="deletePost(<?php echo $row_active[
                "id"
            ]; ?>)" data-type="<?= $row_active["post_type"] ?>">Delete</a>
											</div>
										</div>
									</div>
								</div>
								<p class="pp2"><?= $row_active["topic"] ?> </p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="star">
										<i class="fa-solid fa-star"></i>
										<small>4.0 (1)</small>
									</div>
									<p><small>From </small> <b>
											RM<?= $formattedPrice ?></b>
									</p>
								</div>
							</div>
						</div>
					</div>
					<?php
     }
     ?>
					<?php if (!$data_found) {
         echo '<div class="nodatafound">
            <div class="img-p">
                    <div class="all-cnt">
                        <p class="pp2 no-posts"> No posts were found. To create post, go to Professional Services or Jobs Marketplace Click + or Create Post.</p>
                        
                   </div>
               </div>
                
            </div>';
     } ?>
				</div>
				<?php } elseif ($filter1 == "services" && $filter2 == "waiting") { ?>
				<?php
    $data_found = false;
    // Initialize flag variable
    while ($pending_service = mysqli_fetch_array($pending_services)) {

        $userid = $pending_service["user_id"];
        $userinfo = $obj->GetUserById($userid);
        $data_found = true;
        // Initialize flag variable
        $price = $pending_service["price"];
        $formattedPrice = number_format($price, 0, ".", ",");
        ?>
				<div class="">
					<p class="status-id">Waiting Approval : Post ID - MYS<?= $pending_service[
         "random_id"
     ] ?></p>
					<div class="img-p">
						<div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?= $pending_service[
          "photos"
      ] ?>" alt=""> </div>
						<div class="all-cnt">
							<div class="d-flex two-lb align-items-center">
								<div class="img-plus-nm">
									<img class="sm-img" src="<?php if (!empty($_SESSION["user_image"])) {
             echo $_SESSION["user_image"];
         } elseif (empty($_SESSION["user_image"])) {
             echo "admin/assets/img/profile/" . $userinfo["ProfilePic"];
         } else {
             echo "assets/img/dcc2ccd9.avif";
         } ?>" alt="">
									<p class="pp mr-in "> <?= $userinfo["ProfileName"] ?></p>
								</div>
								<div class="jst-nw d-flex justify-content-end">
									<div class="icon-menu" onclick="ExtraMenu(<?php echo $pending_service[
             "random_id"
         ]; ?>)" data-id="<?= $pending_service["random_id"] ?>">
										<svg style="position: absolute; right: 0; top: -11px;" class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
											<path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" />
										</svg>
										<div id="<?= $pending_service[
              "random_id"
          ] ?>" class="text-left dropdown-contentt dropDown_links_post">
											<a class="dropdown_menu" href="edit-service?id=<?= $pending_service[
               "id"
           ] ?>">Edit</a>
											<a class="dropdown_menu" href="duplicate-service?id=<?= $pending_service[
               "id"
           ] ?>">Duplicate</a>
											<a class="dropdown_menu" href="post-sponsor.php?id=<?= $pending_service[
               "id"
           ] ?>&am=<?= $pending_service["price"] ?>">Sponsor AD</a>
											<a class="dropdown_menu" id="delete" onclick="deletePost(<?php echo $pending_service[
               "id"
           ]; ?>)" data-type="<?= $pending_service["post_type"] ?>">Delete</a>
										</div>
									</div>
								</div>
							</div>
							<p class="pp2"><?= $pending_service["topic"] ?> </p>
							<div class="d-flex justify-content-between align-items-center">
								<div class="star">
									<i class="fa-solid fa-star"></i>
									<small>4.0 (1)</small>
								</div>
								<p><small>From </small> <b>
										RM<?= $formattedPrice ?></b>
								</p>
							</div>
						</div>
					</div>
				</div>
				<?php
    }
    ?>
				<?php if (!$data_found) {
        echo '<div class="nodatafound">
         <div class="img-p">
                 <div class="all-cnt">
                     <p class="pp2 no-posts"> No posts were found. To create post, go to Professional Services or Jobs Marketplace Click + or Create Post.</p>
                     
                </div>
            </div>
             
         </div>';
    } ?>
				<?php } elseif ($filter1 == "services" && $filter2 == "active") {

        $active_services = $obj->GetActiveServiceByUserId($user_id);
        $data_found = false;
        // Initialize flag variable
        while ($active_service = mysqli_fetch_array($active_services)) {

            $userid = $active_service["user_id"];
            $userinfo = $obj->GetUserById($userid);
            $posttype = $active_service["post_type"];
            $data_found = true;
            // Initialize flag variable
            $price = $active_service["price"];
            $formattedPrice = number_format($price, 0, ".", ",");
            ?>
				<div class="">
					<p class="status-id">Active : Post ID - MYS<?= $active_service[
         "random_id"
     ] ?></p>
					<div class="img-p">
						<div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?= $active_service[
          "photos"
      ] ?>" alt=""> </div>
						<div class="all-cnt">
							<div class="d-flex two-lb align-items-center">
								<div class="img-plus-nm">
									<img class="sm-img" src="<?php if (!empty($_SESSION["user_image"])) {
             echo $_SESSION["user_image"];
         } elseif (empty($_SESSION["user_image"])) {
             echo "admin/assets/img/profile/" . $userinfo["ProfilePic"];
         } else {
             echo "assets/img/dcc2ccd9.avif";
         } ?>" alt="">
									<p class="pp mr-in "> <?= $userinfo["ProfileName"] ?></p>
								</div>
								<div class="jst-nw d-flex justify-content-end">
									<?php if ($active_service["status"] == 1 || $active_service["status"] == 2) {
             echo '<label class="switch">';
             echo '<input  id="statuschange" data-type="' .
                 $posttype .
                 '" type="checkbox" data-id="' .
                 $active_service["id"] .
                 '"';
             if ($active_service["status"] == 1) {
                 echo " checked";
             }
             echo ">";
             echo '<span class="slider round"></span>';
             echo '<p class="off_wrap_btn">OFF</p>';
             echo '<p class="on_wrap_btn text-light">ON</p>';
             echo "</label>";
         } ?>
									<div class="icon-menu" onclick="ExtraMenu(<?php echo $active_service[
             "random_id"
         ]; ?>)" data-id="<?= $active_service["random_id"] ?>">
										<svg style="position: absolute; right: 0; top: -11px;" class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
											<path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" />
										</svg>
										<div id="<?= $active_service[
              "random_id"
          ] ?>" class="text-left dropdown-contentt dropDown_links_post">
											<a class="dropdown_menu" href="edit-service?id=<?= $active_service[
               "id"
           ] ?>">Edit</a>
											<a class="dropdown_menu" href="duplicate-service?id=<?= $active_service[
               "id"
           ] ?>">Duplicate</a>
											<a class="dropdown_menu" href="post-sponsor.php?id=<?= $active_service[
               "id"
           ] ?>&am=<?= $active_service["price"] ?>">Sponsor AD</a>
											<a class="dropdown_menu" id="delete" onclick="deletePost(<?php echo $active_service[
               "id"
           ]; ?>)" data-type="<?= $active_service["post_type"] ?>">Delete</a>
										</div>
									</div>
								</div>
							</div>
							<p class="pp2"><?= $active_service["topic"] ?> </p>
							<div class="d-flex justify-content-between align-items-center">
								<div class="star">
									<i class="fa-solid fa-star"></i>
									<small>4.0 (1)</small>
								</div>
								<p><small>From </small> <b>
										RM<?= $formattedPrice ?></b>
								</p>
							</div>
						</div>
					</div>
				</div>
				<?php
        }
        ?>
				<?php if (!$data_found) {
        echo '<div class="nodatafound">
         <div class="img-p">
                 <div class="all-cnt">
                     <p class="pp2 no-posts"> No posts were found. To create post, go to Professional Services or Jobs Marketplace Click + or Create Post.</p>
                     
                </div>
            </div>
             
         </div>';
    } ?>
				<?php
    } elseif ($filter1 == "services" && $filter2 == "inactive") { ?>
				<?php
    $inactive_services = $obj->GetInactiveServiceByUserId($user_id);
    $data_found = false;
    // Initialize flag variable
    while ($inactive_service = mysqli_fetch_array($inactive_services)) {

        $userid = $inactive_service["user_id"];
        $userinfo = $obj->GetUserById($userid);
        $posttype = $inactive_service["post_type"];
        $data_found = true;
        // Initialize flag variable
        $price = $inactive_service["price"];
        $formattedPrice = number_format($price, 0, ".", ",");
        ?>
				<div class="">
					<p class="status-id">Inactive : Post ID - MYS<?= $inactive_service[
         "random_id"
     ] ?></p>
					<div class="img-p">
						<div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?= $inactive_service[
          "photos"
      ] ?>" alt=""> </div>
						<div class="all-cnt">
							<div class="d-flex two-lb align-items-center">
								<div class="img-plus-nm">
									<img class="sm-img" src="<?php if (!empty($_SESSION["user_image"])) {
             echo $_SESSION["user_image"];
         } elseif (empty($_SESSION["user_image"])) {
             echo "admin/assets/img/profile/" . $userinfo["ProfilePic"];
         } else {
             echo "assets/img/dcc2ccd9.avif";
         } ?>" alt="">
									<p class="pp mr-in "> <?= $userinfo["ProfileName"] ?></p>
								</div>
								<div class="jst-nw d-flex justify-content-end">
									<?php if (
             $inactive_service["status"] == 1 ||
             $inactive_service["status"] == 2
         ) {
             echo '<label class="switch">';
             echo '<input  id="statuschange" data-type="' .
                 $posttype .
                 '" type="checkbox" data-id="' .
                 $inactive_service["id"] .
                 '"';
             if ($inactive_service["status"] == 1) {
                 echo " checked";
             }
             echo ">";
             echo '<span class="slider round"></span>';
             echo '<p class="off_wrap_btn">OFF</p>';
             echo '<p class="on_wrap_btn text-light">ON</p>';
             echo "</label>";
         } ?>
									<div class="icon-menu" onclick="ExtraMenu(<?php echo $inactive_service[
             "random_id"
         ]; ?>)" data-id="<?= $inactive_service["random_id"] ?>">
										<svg style="position: absolute; right: 0; top: -11px;" class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
											<path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" />
										</svg>
										<div id="<?= $inactive_service[
              "random_id"
          ] ?>" class="text-left dropdown-contentt dropDown_links_post">
											<a class="dropdown_menu" href="edit-service?id=<?= $inactive_service[
               "id"
           ] ?>">Edit</a>
											<a class="dropdown_menu" href="duplicate-service?id=<?= $inactive_service[
               "id"
           ] ?>">Duplicate</a>
											<a class="dropdown_menu" href="post-sponsor.php?id=<?= $inactive_service[
               "id"
           ] ?>&am=<?= $inactive_service["price"] ?>">Sponsor AD</a>
											<a class="dropdown_menu" id="delete" onclick="deletePost(<?php echo $inactive_service[
               "id"
           ]; ?>)" data-type="<?= $inactive_service["post_type"] ?>">Delete</a>
										</div>
									</div>
								</div>
							</div>
							<p class="pp2"><?= $inactive_service["topic"] ?> </p>
							<div class="d-flex justify-content-between align-items-center manage_post_wrap">
								<div class="d-flex justify-content-between align-items-center">
									<div class="star">
										<i class="fa-solid fa-star"></i>
										<small>4.0 (1)</small>
									</div>
									<p><small>From </small> <b>
											RM<?= $formattedPrice ?></b>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
    }
    ?>
				<?php if (!$data_found) {
        echo '<div class="nodatafound">
         <div class="img-p">
                 <div class="all-cnt">
                     <p class="pp2 no-posts"> No posts were found. To create post, go to Professional Services or Jobs Marketplace Click + or Create Post.</p>
                     
                </div>
            </div>
             
         </div>';
    } ?>
				<?php } elseif ($filter1 == "services" && $filter2 == "completed") {

        $data_found = false;
        // Initialize flag variable
        while ($completed_service = mysqli_fetch_array($completed_services)) {

            $userid = $completed_service["user_id"];
            $userinfo = $obj->GetUserById($userid);
            $posttype = $completed_service["post_type"];
            $data_found = true;
            // Initialize flag variable
            $price = $completed_service["price"];
            $formattedPrice = number_format($price, 0, ".", ",");
            ?>
				<div class="">
					<p class="status-id">Completed : Post ID - MYS<?= $completed_service[
         "random_id"
     ] ?></p>
					<div class="img-p">
						<div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?= $completed_service[
          "photos"
      ] ?>" alt=""> </div>
						<div class="all-cnt">
							<div class="d-flex two-lb align-items-center">
								<div class="img-plus-nm">
									<img class="sm-img" src="<?php if (!empty($_SESSION["user_image"])) {
             echo $_SESSION["user_image"];
         } elseif (empty($_SESSION["user_image"])) {
             echo "admin/assets/img/profile/" . $userinfo["ProfilePic"];
         } else {
             echo "assets/img/dcc2ccd9.avif";
         } ?>" alt="">
									<p class="pp mr-in "> <?= $userinfo["ProfileName"] ?></p>
								</div>
								<div class="jst-nw d-flex justify-content-end">
									<input type="checkbox" id="switch" class="checkbox" />
									<label for="switch" class="toggle">
										<p class="off_wrap_btn">OFF</p>
										<p class="on_wrap_btn text-light">ON</p>
									</label>
									<div class="icon-menu" onclick="ExtraMenu(<?php echo $completed_service[
             "random_id"
         ]; ?>)" data-id="<?= $completed_service["random_id"] ?>">
										<svg style="position: absolute; right: 0; top: -11px;" class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
											<path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" />
										</svg>
										<div id="<?= $completed_service[
              "random_id"
          ] ?>" class="text-left dropdown-contentt dropDown_links_post">
											<a class="dropdown_menu" href="edit-service?id=<?= $completed_service[
               "id"
           ] ?>">Edit</a>
											<a class="dropdown_menu" href="duplicate-service?id=<?= $completed_service[
               "id"
           ] ?>">Duplicate</a>
											<a class="dropdown_menu" href="post-sponsor.php?id=<?= $completed_service[
               "id"
           ] ?>&am=<?= $completed_service["price"] ?>">Sponsor AD</a>
											<a class="dropdown_menu" id="delete" onclick="deletePost(<?php echo $completed_service[
               "id"
           ]; ?>)" data-type="<?= $completed_service["post_type"] ?>">Delete</a>
										</div>
									</div>
								</div>
							</div>
							<p class="pp2"><?= $completed_service["topic"] ?> </p>
							<div class="d-flex justify-content-between align-items-center">
								<div class="star">
									<i class="fa-solid fa-star"></i>
									<small>4.0 (1)</small>
								</div>
								<p><small>From </small> <b>
										RM<?= $formattedPrice ?></b>
								</p>
							</div>
						</div>
					</div>
				</div>
				<?php
        }
        ?>
				<?php if (!$data_found) {
        echo '<div class="nodatafound">
         <div class="img-p">
                 <div class="all-cnt">
                     <p class="pp2 no-posts"> No posts were found. To create post, go to Professional Services or Jobs Marketplace Click + or Create Post.</p>
                     
                </div>
            </div>
             
         </div>';
    } ?>
				<?php
    } elseif ($filter1 == "services" && $filter2 == "reject") {

        $data_found = false;
        // Initialize flag variable
        while ($rejected_service = mysqli_fetch_array($rejected_services)) {

            $userid = $rejected_service["user_id"];
            $userinfo = $obj->GetUserById($userid);
            $posttype = $rejected_service["post_type"];
            $data_found = true;
            // Initialize flag variable
            $price = $rejected_service["price"];
            $formattedPrice = number_format($price, 0, ".", ",");
            ?>
				<div class="">
					<p class="status-id">Rejected : Post ID - MYS<?= $rejected_service[
         "random_id"
     ] ?></p>
					<div class="img-p">
						<div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?= $rejected_service[
          "photos"
      ] ?>" alt=""> </div>
						<div class="all-cnt">
							<div class="d-flex two-lb align-items-center">
								<div class="img-plus-nm">
									<img class="sm-img" src="<?php if (!empty($_SESSION["user_image"])) {
             echo $_SESSION["user_image"];
         } elseif (empty($_SESSION["user_image"])) {
             echo "admin/assets/img/profile/" . $userinfo["ProfilePic"];
         } else {
             echo "assets/img/dcc2ccd9.avif";
         } ?>" alt="">
									<p class="pp mr-in "> <?= $userinfo["ProfileName"] ?></p>
								</div>
								<div class="jst-nw d-flex justify-content-end">
									<div class="icon-menu" onclick="ExtraMenu(<?php echo $rejected_service[
             "random_id"
         ]; ?>)" data-id="<?= $rejected_service["random_id"] ?>">
										<svg style="    position: absolute; right: 0; top: -11px;" class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
											<path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" />
										</svg>
										<div id="<?= $rejected_service[
              "random_id"
          ] ?>" class="text-left dropdown-contentt dropDown_links_post">
											<a class="dropdown_menu" href="edit-service?id=<?= $rejected_service[
               "id"
           ] ?>">Edit</a>
											<a class="dropdown_menu" href="duplicate-service?id=<?= $rejected_service[
               "id"
           ] ?>">Duplicate</a>
											<a class="dropdown_menu" href="post-sponsor.php?id=<?= $rejected_service[
               "id"
           ] ?>&am=<?= $rejected_service["price"] ?>">Sponsor AD</a>
											<a class="dropdown_menu" id="delete" onclick="deletePost(<?php echo $rejected_service[
               "id"
           ]; ?>)" data-type="<?= $rejected_service["post_type"] ?>">Delete</a>
										</div>
									</div>
								</div>
							</div>
							<p class="pp2"><?= $rejected_service["topic"] ?> </p>
							<div class="d-flex justify-content-between align-items-center">
								<div class="star">
									<i class="fa-solid fa-star"></i>
									<small>4.0 (1)</small>
								</div>
								<p><small>From </small> <b>
										RM<?= $formattedPrice ?></b>
								</p>
							</div>
						</div>
					</div>
				</div>
				<?php
        }
        ?>
				<?php if (!$data_found) {
        echo '<div class="nodatafound">
         <div class="img-p">
                 <div class="all-cnt">
                     <p class="pp2 no-posts"> No posts were found. To create post, go to Professional Services or Jobs Marketplace Click + or Create Post.</p>
                     
                </div>
            </div>
             
         </div>';
    } ?>
				<!--End all service only -->
				<?php
    } elseif ($filter1 == "jobs" && $filter2 == "") { ?>
				<!--Start all jobs only -->
				<div class="all-jobs">
					<?php
     $data_found = false;
     // Initialize flag variable
     while ($aljobs = mysqli_fetch_array($alljobs)) {

         $userid = $aljobs["user_id"];
         $userinfo = $obj->GetUserById($userid);
         $posttype = $aljobs["post_type"];
         $data_found = true;
         // Initialize flag variable
         $price = $aljobs["price"];
         $formattedPrice = number_format($price, 0, ".", ",");
         ?>
					<div class="">
						<p class="status-id"><?php if ($aljobs["status"] == "") {
          echo "Waiting Approval";
      } elseif ($aljobs["status"] == 1) {
          echo "Active";
      } elseif ($aljobs["status"] == 2) {
          echo "Inactive";
      } elseif ($aljobs["status"] == 3) {
          echo "Completed";
      } elseif ($aljobs["status"] == 4) {
          echo "Rejected";
      } ?> : Post ID - MYJ<?= $aljobs["random_id"] ?></p>
						<div class="img-p">
							<div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?= $aljobs[
           "photos"
       ] ?>" alt=""> </div>
							<div class="all-cnt">
								<div class="d-flex two-lb align-items-center">
									<div class="img-plus-nm">
										<img class="sm-img" src="<?php if (!empty($_SESSION["user_image"])) {
              echo $_SESSION["user_image"];
          } elseif (empty($_SESSION["user_image"])) {
              echo "admin/assets/img/profile/" . $userinfo["ProfilePic"];
          } else {
              echo "assets/img/dcc2ccd9.avif";
          } ?>" alt="">
										<p class="pp mr-in "> <?= $userinfo["ProfileName"] ?></p>
									</div>
									<div class="jst-nw d-flex justify-content-end">
										<?php if ($aljobs["status"] == 1 || $aljobs["status"] == 2) {
              echo '<label class="switch">';
              echo '<input  id="statuschange" data-type="' .
                  $posttype .
                  '" type="checkbox" data-id="' .
                  $aljobs["id"] .
                  '"';
              if ($aljobs["status"] == 1) {
                  echo " checked";
              }
              echo ">";
              echo '<span class="slider round"></span>';
              echo '<p class="off_wrap_btn">OFF</p>';
              echo '<p class="on_wrap_btn text-light">ON</p>';
              echo "</label>";
          } ?>
										<div class="icon-menu" onclick="ExtraMenu(<?php echo $aljobs[
              "random_id"
          ]; ?>)" data-id="<?= $aljobs["random_id"] ?>">
											<svg style="position: absolute; right: 0; top: -11px;" class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
												<path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" />
											</svg>
											<div id="<?= $aljobs[
               "random_id"
           ] ?>" class="text-left dropdown-contentt dropDown_links_post">
												<a class="dropdown_menu" href="edit-post?id=<?= $aljobs["id"] ?>">Edit</a>
												<a class="dropdown_menu" href="duplicate-post?id=<?= $aljobs[
                "id"
            ] ?>">Duplicate</a>
												<a class="dropdown_menu" href="job-sponsor.php?id=<?= $aljobs[
                "id"
            ] ?>&am=<?= $aljobs["price"] ?>">Sponsor AD</a>
												<a class="dropdown_menu" id="delete" onclick="deletePost(<?php echo $aljobs[
                "id"
            ]; ?>)" data-type="<?= $aljobs["post_type"] ?>">Delete</a>
											</div>
										</div>
									</div>
								</div>
								<p class="pp2"> <?= $aljobs["topic"] ?> </p>
								<div class="d-flex justify-content-between align-items-center manage_post_wrap">
									<div class="csh-img-div wrapper_cash_total">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
											<path fill="currentColor" d="M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z" />
										</svg>
										<b>RM<?= $formattedPrice ?></b>
									</div>
									<div class="wrapper_clock">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
											<title>clock-outline</title>
											<path d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z" />
										</svg>
										<?php
          $remaining_hours = $aljobs["fast_complete"];
          // number of hours left
          $now = new DateTime();
          $end = clone $now;
          $end->add(new DateInterval("PT" . $remaining_hours . "H"));
          $interval = $now->diff($end);
          $remaining_time = $interval->format("%Hhr %Ss left");
          echo '<b class="text-dark">' . $remaining_time . "</b>";

         // output: 24hr 0m 0s left
         ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
     }
     ?>
					<?php if (!$data_found) {
         echo '<div class="nodatafound">
            <div class="img-p">
                    <div class="all-cnt">
                        <p class="pp2 no-posts"> No posts were found. To create post, go to Professional Services or Jobs Marketplace Click + or Create Post.</p>
                        
                   </div>
               </div>
                
            </div>';
     } ?>
				</div>
				<!--End all jobs only -->
				<?php } elseif ($filter1 == "jobs" && $filter2 == "waiting") { ?>
				<?php
    $data_found = false;
    // Initialize flag variable
    while ($waiting_job = mysqli_fetch_array($waiting_jobs)) {

        $userid = $waiting_job["user_id"];
        $userinfo = $obj->GetUserById($userid);
        $data_found = true;
        // Initialize flag variable
        $price = $waiting_job["price"];
        $formattedPrice = number_format($price, 0, ".", ",");
        ?>
				<div class="">
					<p class="status-id">Waiting Approval : Post ID - MYJ<?= $waiting_job[
         "random_id"
     ] ?></p>
					<div class="img-p">
						<div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?= $waiting_job[
          "photos"
      ] ?>" alt=""> </div>
						<div class="all-cnt">
							<div class="d-flex two-lb align-items-center">
								<div class="img-plus-nm">
									<img class="sm-img" src="<?php if (!empty($_SESSION["user_image"])) {
             echo $_SESSION["user_image"];
         } elseif (empty($_SESSION["user_image"])) {
             echo "admin/assets/img/profile/" . $userinfo["ProfilePic"];
         } else {
             echo "assets/img/dcc2ccd9.avif";
         } ?>" alt="">
									<p class="pp mr-in "> <?= $userinfo["ProfileName"] ?></p>
								</div>
								<div class="jst-nw d-flex justify-content-end">
									<div class="icon-menu" onclick="ExtraMenu(<?php echo $waiting_job[
             "random_id"
         ]; ?>)" data-id="<?= $waiting_job["random_id"] ?>">
										<svg style="position: absolute; right: 0; top: -11px;" class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
											<path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" />
										</svg>
										<div id="<?= $waiting_job[
              "random_id"
          ] ?>" class="text-left dropdown-contentt dropDown_links_post">
											<a class="dropdown_menu" href="edit-post?id=<?= $waiting_job["id"] ?>">Edit</a>
											<a class="dropdown_menu" href="duplicate-post?id=<?= $waiting_job[
               "id"
           ] ?>">Duplicate</a>
											<a class="dropdown_menu" href="job-sponsor.php?id=<?= $waiting_job[
               "id"
           ] ?>&am=<?= $waiting_job["price"] ?>">Sponsor AD</a>
											<a class="dropdown_menu" id="delete" onclick="deletePost(<?php echo $waiting_job[
               "id"
           ]; ?>)" data-type="<?= $waiting_job["post_type"] ?>">Delete</a>
										</div>
									</div>
								</div>
							</div>
							<p class="pp2"> <?= $waiting_job["topic"] ?> </p>
							<div class="d-flex justify-content-between align-items-center manage_post_wrap">
								<div class="csh-img-div wrapper_cash_total">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
										<path fill="currentColor" d="M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z" />
									</svg>
									<b>RM<?= $formattedPrice ?></b>
								</div>
								<div class="wrapper_clock">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
										<title>clock-outline</title>
										<path d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z" />
									</svg>
									<?php
         $remaining_hours = $waiting_job["fast_complete"];
         // number of hours left
         $now = new DateTime();
         $end = clone $now;
         $end->add(new DateInterval("PT" . $remaining_hours . "H"));
         $interval = $now->diff($end);
         $remaining_time = $interval->format("%Hhr %Ss left");
         echo '<b class="text-dark">' . $remaining_time . "</b>";

        // output: 24hr 0m 0s left
        ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
    }
    ?>
				<?php if (!$data_found) {
        echo '<div class="nodatafound">
         <div class="img-p">
                 <div class="all-cnt">
                     <p class="pp2 no-posts"> No posts were found. To create post, go to Professional Services or Jobs Marketplace Click + or Create Post.</p>
                     
                </div>
            </div>
             
         </div>';
    } ?>
				<?php } elseif ($filter1 == "jobs" && $filter2 == "active") { ?>
				<?php
    $active_jobs = $obj->GetActiveJobByUserId($user_id);
    $data_found = false;
    // Initialize flag variable
    while ($active_job = mysqli_fetch_array($active_jobs)) {

        $userid = $active_job["user_id"];
        $userinfo = $obj->GetUserById($userid);
        $posttype = $active_job["post_type"];
        $data_found = true;
        // Initialize flag variable
        $price = $active_job["price"];
        $formattedPrice = number_format($price, 0, ".", ",");
        ?>
				<div class="">
					<p class="status-id">Active : Post ID - MYJ<?= $active_job["random_id"] ?></p>
					<div class="img-p">
						<div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?= $active_job[
          "photos"
      ] ?>" alt=""> </div>
						<div class="all-cnt">
							<div class="d-flex two-lb align-items-center">
								<div class="img-plus-nm">
									<img class="sm-img" src="<?php if (!empty($_SESSION["user_image"])) {
             echo $_SESSION["user_image"];
         } elseif (empty($_SESSION["user_image"])) {
             echo "admin/assets/img/profile/" . $userinfo["ProfilePic"];
         } else {
             echo "assets/img/dcc2ccd9.avif";
         } ?>" alt="">
									<p class="pp mr-in "> <?= $userinfo["ProfileName"] ?></p>
								</div>
								<div class="jst-nw d-flex justify-content-end">
									<?php if ($active_job["status"] == 1 || $active_job["status"] == 2) {
             echo '<label class="switch">';
             echo '<input  id="statuschange" data-type="' .
                 $posttype .
                 '" type="checkbox" data-id="' .
                 $active_job["id"] .
                 '"';
             if ($active_job["status"] == 1) {
                 echo " checked";
             }
             echo ">";
             echo '<span class="slider round"></span>';
             echo '<p class="off_wrap_btn">OFF</p>';
             echo '<p class="on_wrap_btn text-light">ON</p>';
             echo "</label>";
         } ?>
									<div class="icon-menu" onclick="ExtraMenu(<?php echo $active_job[
             "random_id"
         ]; ?>)" data-id="<?= $active_job["random_id"] ?>">
										<svg style="position: absolute; right: 0; top: -11px;" class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
											<path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" />
										</svg>
										<div id="<?= $active_job[
              "random_id"
          ] ?>" class="text-left dropdown-contentt dropDown_links_post">
											<a class="dropdown_menu" href="edit-post?id=<?= $active_job["id"] ?>">Edit</a>
											<a class="dropdown_menu" href="duplicate-post?id=<?= $active_job[
               "id"
           ] ?>">Duplicate</a>
											<a class="dropdown_menu" href="job-sponsor.php?id=<?= $active_job[
               "id"
           ] ?>&am=<?= $active_job["price"] ?>">Sponsor AD</a>
											<a class="dropdown_menu" id="delete" onclick="deletePost(<?php echo $active_job[
               "id"
           ]; ?>)" data-type="<?= $active_job["post_type"] ?>">Delete</a>
										</div>
									</div>
								</div>
							</div>
							<p class="pp2"> <?= $active_job["topic"] ?> </p>
							<div class="d-flex justify-content-between align-items-center manage_post_wrap">
								<div class="csh-img-div wrapper_cash_total">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
										<path fill="currentColor" d="M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z" />
									</svg>
									<b>RM<?= $formattedPrice ?></b>
								</div>
								<div class="wrapper_clock">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
										<title>clock-outline</title>
										<path d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z" />
									</svg>
									<?php
         $remaining_hours = $active_job["fast_complete"];
         // number of hours left
         $now = new DateTime();
         $end = clone $now;
         $end->add(new DateInterval("PT" . $remaining_hours . "H"));
         $interval = $now->diff($end);
         $remaining_time = $interval->format("%Hhr %Ss left");
         echo '<b class="text-dark">' . $remaining_time . "</b>";

        // output: 24hr 0m 0s left
        ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
    }
    ?>

				<!--Inactive jobs or post by user (in ifelse condition)-->
				<?php if (!$data_found) {
        echo '<div class="nodatafound">
         <div class="img-p">
                 <div class="all-cnt">
                     <p class="pp2 no-posts"> No posts were found. To create post, go to Professional Services or Jobs Marketplace Click + or Create Post.</p>
                     
                </div>
            </div>
             
         </div>';
    } ?>
				<?php } elseif ($filter1 == "jobs" && $filter2 == "inactive") { ?>
				<?php
    $inactive_jobs = $obj->GetInactiveJobByUserId($user_id);
    $data_found = false;
    // Initialize flag variable
    while ($inactive_job = mysqli_fetch_array($inactive_jobs)) {

        $userid = $inactive_job["user_id"];
        $userinfo = $obj->GetUserById($userid);
        $posttype = $inactive_job["post_type"];
        $data_found = true;
        // Initialize flag variable
        $price = $inactive_job["price"];
        $formattedPrice = number_format($price, 0, ".", ",");
        ?>
				<div class="">
					<p class="status-id">Inactive : Post ID - MYJ<?= $inactive_job[
         "random_id"
     ] ?></p>
					<div class="img-p">
						<div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?= $inactive_job[
          "photos"
      ] ?>" alt=""> </div>
						<div class="all-cnt">
							<div class="d-flex two-lb align-items-center">
								<div class="img-plus-nm">
									<img class="sm-img" src="<?php if (!empty($_SESSION["user_image"])) {
             echo $_SESSION["user_image"];
         } elseif (empty($_SESSION["user_image"])) {
             echo "admin/assets/img/profile/" . $userinfo["ProfilePic"];
         } else {
             echo "assets/img/dcc2ccd9.avif";
         } ?>" alt="">
									<p class="pp mr-in "> <?= $userinfo["ProfileName"] ?></p>
								</div>
								<div class="jst-nw d-flex justify-content-end">
									<?php if ($inactive_job["status"] == 1 || $inactive_job["status"] == 2) {
             echo '<label class="switch">';
             echo '<input  id="statuschange" data-type="' .
                 $posttype .
                 '" type="checkbox" data-id="' .
                 $inactive_job["id"] .
                 '"';
             if ($inactive_job["status"] == 1) {
                 echo " checked";
             }
             echo ">";
             echo '<span class="slider round"></span>';
             echo '<p class="off_wrap_btn">OFF</p>';
             echo '<p class="on_wrap_btn text-light">ON</p>';
             echo "</label>";
         } ?>
									<div class="icon-menu" onclick="ExtraMenu(<?php echo $inactive_job[
             "random_id"
         ]; ?>)" data-id="<?= $inactive_job["random_id"] ?>">
										<svg style="position: absolute; right: 0; top: -11px;" class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
											<path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" />
										</svg>
										<div id="<?= $inactive_job[
              "random_id"
          ] ?>" class="text-left dropdown-contentt dropDown_links_post">
											<a class="dropdown_menu" href="edit-post?id=<?= $inactive_job["id"] ?>">Edit</a>
											<a class="dropdown_menu" href="duplicate-post?id=<?= $inactive_job[
               "id"
           ] ?>">Duplicate</a>
											<a class="dropdown_menu" href="job-sponsor.php?id=<?= $inactive_job[
               "id"
           ] ?>&am=<?= $inactive_job["price"] ?>">Sponsor AD</a>
											<a class="dropdown_menu" id="delete" onclick="deletePost(<?php echo $inactive_job[
               "id"
           ]; ?>)" data-type="<?= $inactive_job["post_type"] ?>">Delete</a>
										</div>
									</div>
								</div>
							</div>
							<p class="pp2"> <?= $inactive_job["topic"] ?> </p>
							<div class="d-flex justify-content-between align-items-center manage_post_wrap">
								<div class="csh-img-div wrapper_cash_total">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
										<path fill="currentColor" d="M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z" />
									</svg>
									<b>RM<?= $formattedPrice ?></b>
								</div>
								<div class="wrapper_clock">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
										<title>clock-outline</title>
										<path d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z" />
									</svg>
									<?php
         $remaining_hours = $inactive_job["fast_complete"];
         // number of hours left
         $now = new DateTime();
         $end = clone $now;
         $end->add(new DateInterval("PT" . $remaining_hours . "H"));
         $interval = $now->diff($end);
         $remaining_time = $interval->format("%Hhr %Ss left");
         echo '<b class="text-dark">' . $remaining_time . "</b>";

        // output: 24hr 0m 0s left
        ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
    }
    ?>
				<?php if (!$data_found) {
        echo '<div class="nodatafound">
         <div class="img-p">
                 <div class="all-cnt">
                     <p class="pp2 no-posts"> No posts were found. To create post, go to Professional Services or Jobs Marketplace Click + or Create Post.</p>
                     
                </div>
            </div>
             
         </div>';
    } ?>

				<!--Completed  jobs or post by user (in ifelse condition)-->
				<?php } elseif ($filter1 == "jobs" && $filter2 == "completed") { ?>
				<?php
    $completed_jobs = $obj->GetCompletedJobsByUserId($user_id);
    $data_found = false;
    // Initialize flag variable
    while ($completed_job = mysqli_fetch_array($completed_jobs)) {

        $userid = $completed_job["user_id"];
        $userinfo = $obj->GetUserById($userid);
        $data_found = true;
        // Initialize flag variable
        $price = $completed_job["price"];
        $formattedPrice = number_format($price, 0, ".", ",");
        ?>
				<div class="">
					<p class="status-id">Completed : Post ID - MYJ<?= $completed_job[
         "random_id"
     ] ?></p>
					<div class="img-p">
						<div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?= $completed_job[
          "photos"
      ] ?>" alt=""> </div>
						<div class="all-cnt">
							<div class="d-flex two-lb align-items-center">
								<div class="img-plus-nm">
									<img class="sm-img" src="<?php if (!empty($_SESSION["user_image"])) {
             echo $_SESSION["user_image"];
         } elseif (empty($_SESSION["user_image"])) {
             echo "admin/assets/img/profile/" . $userinfo["ProfilePic"];
         } else {
             echo "assets/img/dcc2ccd9.avif";
         } ?>" alt="">
									<p class="pp mr-in "> <?= $userinfo["ProfileName"] ?></p>
								</div>
								<div class="jst-nw d-flex justify-content-end">
									<div class="icon-menu" onclick="ExtraMenu(<?php echo $completed_job[
             "random_id"
         ]; ?>)" data-id="<?= $completed_job["random_id"] ?>">
										<svg style="position: absolute; right: 0; top: -11px;" class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
											<path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" />
										</svg>
										<div id="<?= $completed_job[
              "random_id"
          ] ?>" class="text-left dropdown-contentt dropDown_links_post">
											<a class="dropdown_menu" href="edit-post?id=<?= $completed_job[
               "id"
           ] ?>">Edit</a>
											<a class="dropdown_menu" href="duplicate-post?id=<?= $completed_job[
               "id"
           ] ?>">Duplicate</a>
											<a class="dropdown_menu" href="job-sponsor.php?id=<?= $completed_job[
               "id"
           ] ?>&am=<?= $completed_job["price"] ?>">Sponsor AD</a>
											<a class="dropdown_menu" id="delete" onclick="deletePost(<?php echo $completed_job[
               "id"
           ]; ?>)" data-type="<?= $completed_job["post_type"] ?>">Delete</a>
										</div>
									</div>
								</div>
							</div>
							<p class="pp2"> <?= $completed_job["topic"] ?> </p>
							<div class="d-flex justify-content-between align-items-center manage_post_wrap">
								<div class="csh-img-div wrapper_cash_total">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
										<path fill="currentColor" d="M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z" />
									</svg>
									<b>RM<?= $formattedPrice ?></b>
								</div>
								<div class="wrapper_clock">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
										<title>clock-outline</title>
										<path d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z" />
									</svg>
									<?php
         $remaining_hours = $completed_job["fast_complete"];
         // number of hours left
         $now = new DateTime();
         $end = clone $now;
         $end->add(new DateInterval("PT" . $remaining_hours . "H"));
         $interval = $now->diff($end);
         $remaining_time = $interval->format("%Hhr %Ss left");
         echo '<b class="text-dark">' . $remaining_time . "</b>";

        // output: 24hr 0m 0s left
        ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
    }
    ?>
				<?php if (!$data_found) {
        echo '<div class="nodatafound">
         <div class="img-p">
                 <div class="all-cnt">
                     <p class="pp2 no-posts"> No posts were found. To create post, go to Professional Services or Jobs Marketplace Click + or Create Post.</p>
                     
                </div>
            </div>
             
         </div>';
    } ?>
				<!--Rejected jobs or post by user (in ifelse condition)-->
				<?php } elseif ($filter1 == "jobs" && $filter2 == "reject") {

        $data_found = false;
        // Initialize flag variable
        while ($rejected_job = mysqli_fetch_array($rejected_jobs)) {

            $userid = $rejected_job["user_id"];
            $userinfo = $obj->GetUserById($userid);
            $data_found = true;
            // Initialize flag variable
            $price = $rejected_job["price"];
            $formattedPrice = number_format($price, 0, ".", ",");
            ?>
				<div class="">
					<p class="status-id">Rejected : Post ID - MYJ<?= $rejected_job[
         "random_id"
     ] ?></p>
					<div class="img-p">
						<div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?= $rejected_job[
          "photos"
      ] ?>" alt=""> </div>
						<div class="all-cnt">
							<div class="d-flex two-lb align-items-center">
								<div class="img-plus-nm">
									<img class="sm-img" src="<?php if (!empty($_SESSION["user_image"])) {
             echo $_SESSION["user_image"];
         } elseif (empty($_SESSION["user_image"])) {
             echo "admin/assets/img/profile/" . $userinfo["ProfilePic"];
         } else {
             echo "assets/img/dcc2ccd9.avif";
         } ?>" alt="">
									<p class="pp mr-in "> <?= $userinfo["ProfileName"] ?></p>
								</div>
								<div class="jst-nw d-flex justify-content-end">
									<div class="icon-menu" onclick="ExtraMenu(<?php echo $rejected_job[
             "random_id"
         ]; ?>)" data-id="<?= $rejected_job["random_id"] ?>">
										<svg style="    position: absolute; right: 0; top: -11px;" class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
											<path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" />
										</svg>
										<div id="<?= $rejected_job[
              "random_id"
          ] ?>" class="text-left dropdown-contentt dropDown_links_post">
											<a class="dropdown_menu" href="edit-service?id=<?= $rejected_job[
               "id"
           ] ?>">Edit</a>
											<a class="dropdown_menu" href="duplicate-service?id=<?= $rejected_job[
               "id"
           ] ?>">Duplicate</a>
											<a class="dropdown_menu" href="post-sponsor.php?id=<?= $rejected_job[
               "id"
           ] ?>&am=<?= $rejected_job["price"] ?>">Sponsor AD</a>
											<a class="dropdown_menu" id="delete" onclick="deletePost(<?php echo $rejected_job[
               "id"
           ]; ?>)" data-type="<?= $rejected_job["post_type"] ?>">Delete</a>
										</div>
									</div>
								</div>
							</div>
							<p class="pp2"><?= $rejected_job["topic"] ?> </p>
							<div class="d-flex justify-content-between align-items-center">
								<div class="star">
									<i class="fa-solid fa-star"></i>
									<small>4.0 (1)</small>
								</div>
								<p><small>From </small> <b>
										RM<?= $formattedPrice ?></b>
								</p>
							</div>
						</div>
					</div>
				</div>
				<?php
        }
        ?>
				<?php if (!$data_found) {
        echo '<div class="nodatafound">
         <div class="img-p">
                 <div class="all-cnt">
                     <p class="pp2 no-posts"> No posts were found. To create post, go to Professional Services or Jobs Marketplace Click + or Create Post.</p>
                     
                </div>
            </div>
             
         </div>';
    } ?>
				<?php
    } else {
    } ?>
			</div>
			<!---------------------- middle one end -------------------------->
		</div>
		<?php include "inc/footer.php"; ?>
		<script>
			$(document).on('click', '#post-filter', function(e) {
				var postfilter = $(this).val();
				// var filter2val = $('#filter2.active').val();
				// var pageid = $('#pageid').val();
				if (postfilter == 'ALL') {
					$('.postfilter-all').addClass('active');
					$('.postfilter-ps').removeClass('active');
					$('.postfilter-jm').removeClass('active');
					$(this).addClass('active');
					window.location.href = 'manage-post?f1=all';
				}

				if (postfilter == 'Professional Services') {
					$('.postfilter-all').removeClass('active');
					$('.postfilter-ps').addClass('active');
					$('.postfilter-jm').removeClass('active');
					$(this).addClass('active');
					window.location.href = 'manage-post?f1=services';
				}

				if (postfilter == 'Jobs Marketplace') {
					$('.postfilter-all').removeClass('active');
					$('.postfilter-ps').removeClass('active');
					$('.postfilter-jm').addClass('active');
					$(this).addClass('active');
					window.location.href = 'manage-post?f1=jobs';
				}
				$.ajax({
					type: "GET",
					url: 'admin/inc/process.php?postfilter=' + postfilter,
					dataType: "html",
					success: function(data) {
						$("#searchdata").html(data);
						$("#servicedata").hide();
						$("#jobdata").hide();
					}
				});




			});
		</script>
		<script>
			$(document).ready(function() {
				// handle sliding button click event
				$('input[type="checkbox"]').click(function() {
					var postId = $(this).data('id');
					var postType = $(this).val();
					// get the button element
					var button = document.getElementById('statuschange');

					// get the value of the data-type attribute
					var postType = button.getAttribute('data-type');
					var isActive = $(this).is(':checked') ? 1 : 2;
					// send an AJAX request to update the post's active/inactive status
					$.ajax({
						url: 'update_post.php',
						type: 'POST',
						data: {
							id: postId,
							type: postType,
							is_active: isActive
						},
						success: function(response) {
							console.log(response);
						}
					});
				});
			});


			function deletePost(post_id) {

				var button = document.getElementById('delete');
				// get the value of the data-type attribute
				var postType = button.getAttribute('data-type');


				if (confirm("Are you sure you want to delete this? \nThere's no way of recovering it.")) {
					window.location.href = "admin/inc/process.php?deleteservice=" + post_id + "&type=" + postType;
				}
			}


			function ExtraMenu(post_id) {
				// var post_id = $(this).data('id');

				document.getElementById(post_id).classList.toggle("show");
			}

			// Close the dropdown if the user clicks outside of it
			window.onclick = function(event) {

				if (!event.target.matches('.dropbtn')) {

					var dropdowns = document.getElementsByClassName("dropdown-contentt");
					var i;
					for (i = 0; i < dropdowns.length; i++) {
						var openDropdown = dropdowns[i];
						if (openDropdown.classList.contains('show')) {
							openDropdown.classList.remove('show');
						}
					}
				}
			}
			//  }

			//mobile drop down #Show All 
			function toggleDropdownnnn() {
				var dropdownContentt = document.querySelector(".dropdown-contenttt");
				dropdownContentt.classList.toggle("show-dropdown");
			}
		</script>
