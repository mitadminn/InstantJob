<?php include('inc/header.php'); 
$userid = $_GET['id'];
$user_information = $obj->GetUserById($userid);
// print_r($user_details);
$user_id =$user_information['id'];
$portfolio = $obj->GetPortfolioByUserId($user_id);
$portfolios = $obj->GetPortfolioByUserId($user_id);
/* Skilss and Intrest */
$skills = $obj->GetSkillsByUserId($user_id);
$intrest = $obj->GetIntrestByUserId($user_id);

$dateString = $user_information['Created_at'];
$timestamp = strtotime($dateString);
$formattedDate = date("d M Y", $timestamp);

  $formattedDate;

$service = $obj->GetServicesByUserId($user_id);
$job = $obj->GetJobByUserId($user_id);

?>
 
 
 
 <style>
    
.user-img img {
    width: 100px;
    border-radius: 50%;
    border: 6px solid #fff;
}
.ri-map-pin-user-line:before {
    content: "\ef1a";
}
.ri-building-line:before {
    content: "\eb0f";
}
.icon-user-detail svg {
    width: 15px;
}
.card-tab-one{
    background: #fff;
    position: absolute;
    display: flex;
    width: 98%;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    padding: 20px;
    border-radius:10px;
}
.profile-wid-bg {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    height: 320px;
}
.tabs-content-wrap {
    margin-top: -77px;
     
}
.bg-top{
    height:228px;
}
.portfolio-skills-wrap a {
    background: #e5e5e5;
    color: #000000;
    margin-right: 10px;
    padding: 8px 10px;
    font-size: 12px;
    font-weight: 500;
}
 .avatar {
  display: inline-block;
  overflow: hidden;
  width: 100px;
}

.avatar:not(:first-child) {
  margin-left: -82px;
 
}
.avatar img {
    max-width: 33px !important;
}
.avatar img {
  width: 100%;
  display: block;
      border: 2px solid #fff;
        transition: transform .5s ease;
        transform: translateX(-2px);
    z-index: 1;
    position:relative;

}
.avatar:hover img {
  width: 100%;
  display: block;
      border: 2px solid #fff;
    transform: scale(1.1);

}
 
.text-warning {
    color: #ffc107!important;
    background: #fef4e4;
}
.inprogress-border{
    border-left: 3px solid #ffc107;
}
.progess-badge {
    background: #e2e5ed;
    color: #355bc1 !important;
}
.progess-border{
     border-left: 3px solid #355bc1;
}
.new-badge {
background: #e2e5ed;
    color: #5691ff !important;
}
.New-border{
     border-left: 3px solid #5691ff;
}
.completed-badge {
    background: #daf4f0;
    color: #0ab39c !important;
}
.completed-border{
     border-left: 3px solid #0ab39c;
}
button#showMoreButton {
    border: 0;
    background: #000000;
    color: #fff;
    padding: 2px 8px;
    border-radius: 3px;
}
 </style>
 
 
 
 
<div class="right_col p-0" role="main" style="min-height: 4560px;">
          <div class="">
            <div class="row mr-0">
            <div class="col-md-12 col-sm-12 ">
                <div class="p-4">
 
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30"> </p>
					
 					<!--user details-->
 					<div class="w-100 h-100">

                      </div>
                     </div>
                      				 
 					    
 					           <div class="w-100 bg-top" style="background-image:url(assets/images/banner-admin.jpg)" style="">
 					               <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
         					            <div class="row g-4">
         					                <div class="col-auto">
         					                    <div class="user-img">
         					                         <?php if(!empty($user_information['ProfilePic'])) { ?>
                                                        <img src="assets/img/profile/<?=$user_information['ProfilePic'];?>" alt="user image" >
                                                         <?php } else { ?>
                                                        <img  class="main-img" src="assets/img/male-1.png" alt="">
                                                        <?php }?>
         					                        
         					                    </div>
         					                </div>
         					                <div class="col">
         					                    <div class="user-details">
         					                        <h3 class="text-white"><?=$user_information['ProfileName'];?></h3>
 
         					                    </div>
         					                    <div class="hstack text-white-50 d-flex gap-3">
                                        <div class="mr-2 icon-user-detail">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M12,3L2,12H5V20H19V12H22L12,3M12,7.7C14.1,7.7 15.8,9.4 15.8,11.5C15.8,14.5 12,18 12,18C12,18 8.2,14.5 8.2,11.5C8.2,9.4 9.9,7.7 12,7.7M12,10A1.5,1.5 0 0,0 10.5,11.5A1.5,1.5 0 0,0 12,13A1.5,1.5 0 0,0 13.5,11.5A1.5,1.5 0 0,0 12,10Z" />
                                            </svg>
                                            <?=$user_information['Country'];?></div>
 
                                    </div>
         					                </div>
         					                <div class="col-12 col-lg-auto order-last order-lg-0">
                                <div class="row text text-white-50 text-center">
                                    <div class="col-lg-6 col-4">
                                        <div class="p-2">
                                            <h4 class="text-white mb-1 font-weight-bold">24.3K</h4>
                                            <p class="fs-14 mb-0">Followers</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-4">
                                        <div class="p-2">
                                            <h4 class="text-white mb-1 font-weight-bold">1.3K</h4>
                                            <p class="fs-14 mb-0">Following</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
         					            </div>
 					               </div>
 					           </div> 
 					        </div>
 					  
                    </div>
                    <div class="tabs-content-wrap">
 					           <!--wjf09wehfwhfw-->
<ul class="nav nav-pills mb-3 px-2" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link text-white font-weight-bold" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Overview</a>
  </li>
  <li class="nav-item">
 
  </li>
  <li class="nav-item">
    <a class="nav-link text-white font-weight-bold" id="pills-contact-tab" data-toggle="pill" href="#pills-professional" role="tab" aria-controls="pills-professional" aria-selected="false">Professional Service</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white font-weight-bold" id="pills-contact-tab" data-toggle="pill" href="#pills-job" role="tab" aria-controls="pills-job" aria-selected="false">Job Marketplace</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
 <div class="row">
                    <div class="col-12">
                        <div class="card  mb-2" style="box-shadow: 0 1px 2px rgba(56,65,74,.15); border: none;">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Info</h5>
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <th class="ps-0" scope="row">Full Name :</th>
                                                <td class="text-muted"><?=$user_information['ProfileName'];?></td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0" scope="row">Mobile :</th>
                                                <td class="text-muted"><?=$user_information['Phone'];?></td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0" scope="row">E-mail :</th>
                                                <td class="text-muted"><?=$user_information['Email'];?></td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0" scope="row">Location :</th>
                                                <td class="text-muted"><?=$user_information['Country'];?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0" scope="row">Joining Date</th>
                                                <td class="text-muted"><?=$formattedDate;?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                        <div class="card mb-2" style="box-shadow: 0 1px 2px rgba(56,65,74,.15); border: none;">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Profile Bio</h5>
                                <div class=" ">
                                    <p><?=$user_information['ProfileBio']; ?></p>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                        <div class="card mb-2" style="box-shadow: 0 1px 2px rgba(56,65,74,.15); border: none;">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Skills</h5>
                                <div class="d-flex flex-wrap gap-2 fs-15 portfolio-skills-wrap">
                                     <?php
                                        
                                        foreach ($skills as $skill) {
                                             if (!empty($skill['Skills'])) {
                                                $skills = explode(',', $skill['Skills']);
                                                foreach ($skills as $s) {
                                                    echo '<a href="javascript:void(0);" class="badge bg-primary-subtle">'.$s.'</a>';
                                                }
                                            } else {
                                                echo 'Nothing added yet';
                                            }
                                        }
                                        ?>
                                    
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                        <div class="card mb-2" style="box-shadow: 0 1px 2px rgba(56,65,74,.15); border: none;">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Interest</h5>
                                <div class="d-flex flex-wrap gap-2 fs-15 portfolio-skills-wrap">
                                    <?php
                                        foreach ($intrest as $interest) {
                                            if (!empty($interest['Interest'])) {
                                                $interests = explode(',', $interest['Interest']);
                                                foreach ($interests as $i) {
                                                    echo '<a href="javascript:void(0);" class="badge bg-primary-subtle">' . $i . '</a>';
                                                }
                                            } else {
                                                echo 'Nothing added yet';
                                            }
                                        }
                                        ?>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->

                    <!--end col-->
                </div>
  </div>
</div>
  
  <div class="tab-pane fade" id="pills-professional" role="tabpanel" aria-labelledby="pills-professional-tab">
      <div class="row">
        <div class="col-12">
            <div class="bg-white p-4 rounded">
               <div class="card border-0">
            <div class="card-body">
                <div class="row">
                    
                    <?php while($services = mysqli_fetch_array($service)) {
                    $uid = $services['user_id'];
                    $post_id = $services['id'];
                    $msg = $obj->GetMessageByUserIdAndPostId($uid,$post_id);
                    ?>
                    <div class="col-xxl-3 col-sm-6 mb-2">
                        <div class="card profile-project-card shadow-none profile-project-warning inprogress-border">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                        <h5 class="fs-14 text-truncate"><a href="#" class="text-body"><?=$services['topic'];?></a></h5>
 
                                    </div>
                                    <div class="flex-shrink-0 ms-2">
                                        <div class="badge bg-warning-subtle text-warning fs-10">Inprogress</div>
                                    </div>
                                </div>
                                <br>
                                <div class="">
                                     <span class="text-dark"><?php echo substr($services['description'], 0, 180);?></span> 
                                </div>
                              <div class="d-flex mt-4">
                                    <div class="flex-grow-1">
                                        <div class="d-flex align-items-center gap-2" style="gap:2px">
                                            <div class="d-flex">
                                                <h5 class="fs-12 text-muted mb-0">Chat :</h5>
                                              <div class="d-flex gap-2 fs-15 portfolio-skills-wrap flex-wrap ml-2" id="menuContainer" style="gap:4px;">
                                                   <?php foreach($msg as $chatuser) {
                                                    $userid = $chatuser['fromuser'];
                                               $user_information = $obj->GetUserById($userid);
                                               
                                               ?>
                                                    <a href="service-chat?stid=<?=$post_id;?>&lgn=<?=$uid;?>&dis_id=<?=$userid;?>&type=service" class="badge bg-primary-subtle"><?=$user_information['ProfileName'];?></a>
                                                    <?php } ?>
                                                    <!-- Add more menu items here -->
                                                <button id="showMoreButton" style="display: none;">+</button>
                                                </div>

                                            </div>
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!--end col-->
                    <?php } ?>
 
                </div>
                <!--end row-->
            </div>
            <!--end card-body-->
        </div>
            </div>
        </div>
      </div>
      </div>
  <div class="tab-pane fade" id="pills-job" role="tabpanel" aria-labelledby="pills-job-tab"> 
        <div class="row">
        <div class="col-12">
            <div class="bg-white p-4 rounded">
               <div class="card border-0">
            <div class="card-body">
                <div class="row">
                     <?php while($jobs = mysqli_fetch_array($job)) {
                    $uid = $jobs['user_id'];
                    $post_id = $jobs['id'];
                    $msg = $obj->GetMessageByUserIdAndPostId($uid,$post_id);
                    ?>
                   <div class="col-xxl-3 col-sm-6 mb-2">
                        <div class="card profile-project-card shadow-none profile-project-warning inprogress-border">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                        <h5 class="fs-14 text-truncate"><a href="#" class="text-body"><?=$jobs['topic'];?></a></h5>
                                        <!--<h4 class="text-muted text-truncate mb-0">Name:<span class="fw-semibold text-body">John</span></h4>-->
                                    </div>
                                    <div class="flex-shrink-0 ms-2">
                                        <div class="badge bg-warning-subtle text-warning fs-10">Inprogress</div>
                                    </div>
                                </div>
                                <br>
                                <div class="">
                                     <span class="text-dark"><?php echo substr($jobs['description'], 0, 180);?></span> 
                                </div>
                              <div class="d-flex mt-4">
                                    <div class="flex-grow-1">
                                        <div class="d-flex align-items-center gap-2" style="gap:2px">
                                            <div class="d-flex">
                                                <h5 class="fs-12 text-muted mb-0">Chat :</h5>
                                              <div class="d-flex gap-2 fs-15 portfolio-skills-wrap flex-wrap ml-2" id="menuContainer" style="gap:4px;">
                                                   <?php foreach($msg as $chatuser) {
                                                    $userid = $chatuser['fromuser'];
                                               $user_information = $obj->GetUserById($userid);
                                               
                                               ?>
                                                    <a href="job-chat?stid=<?=$post_id;?>&lgn=<?=$uid;?>&dis_id=<?=$userid;?>&type=job" class="badge bg-primary-subtle"><?=$user_information['ProfileName'];?></a>
                                                    <?php } ?>
                                                    <!-- Add more menu items here -->
                                                <button id="showMoreButton" style="display: none;">+</button>
                                                </div>

                                            </div>
 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!--end col-->
      <?php } ?>
                    <!--end col-->
  
                </div>
                <!--end row-->
            </div>
            <!--end card-body-->
        </div>
            </div>
        </div>
      </div>
      </div>
      </div>
<!--wjf09wehfwhfw-->
                       </div>
                        
                    </div>
                </div>
            </div>
              
            </div>
          </div>
        </div>

<?php include('inc/footer.php'); ?>


<!--when the names overflows, this script shows the plus(+) sign automatically , to see more -->
<script>
    const menuContainer = document.getElementById('menuContainer');
    const showMoreButton = document.getElementById('showMoreButton');

    const menuItems = menuContainer.children;
    const maxVisibleItems = 6;

    if (menuItems.length > maxVisibleItems) {
        for (let i = maxVisibleItems; i < menuItems.length; i++) {
            menuItems[i].style.display = 'none';
        }
        showMoreButton.style.display = 'block';

        showMoreButton.addEventListener('click', () => {
            for (let i = maxVisibleItems; i < menuItems.length; i++) {
                menuItems[i].style.display = 'inline-block';
            }
            showMoreButton.style.display = 'none';
        });
    }
</script>