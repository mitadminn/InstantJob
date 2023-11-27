<?php 
    $page = 'Propose Quote Final';
    include('inc/header.php'); 
    $serviceid = $_GET['id'];
    $signle_service = $obj->GetServiceById($serviceid);
    $userid = $signle_service['user_id'];
    $postuser = $obj->GetUserById($userid);
    
    ?>
<?php include('inc/sidebar.php'); ?>       
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
 <div class="middle_container  "  >
          <div class="head-mid">
        <h2>Propose Quote</h2>
    </div>
            <!----------------three dot menu mobila view START--------------------->
            <div class="dropdown">
                <div id="myDropdown" class="dropdown-content">
                    <a href="#">start job</a>
                    <a href="#">propose budget </a>
                    <a href="#">Attach files</a>
                    <a href="#">Send location</a>
                    <a href="#">Report job</a>
                    <a href="#">Block user</a>
                </div>
            </div>
            <!--------------------------three dot menu mobila view----------------------------------->
            <!------------------------------------Middle content--------------------------->
            <div class="bg-white p-3 main_wrapper-msg">
           <div class="img-p img-p msgjob_wrapper m-0">
                        <a href="messagejob">
                            <div class="hh-1"><img class="hhh" src="admin/assets/img/services/mobile-gaming.jpg" alt="">
                            </div></a>
                            <div class="all-cnt">
                                <div class="inner">
                                    <a href="user-view.php?viewuserid=1">
                                        <div class="d-flex two-lb align-items-center job-listing-fl  ">
                                            <div class="title_img">
                                                <img class="sm-img" src="admin/assets/img/profile/2396947-60f1a396868e4.webp" alt="">
                                                <p class="pp mr-in">Jaspreet Susshane</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                 <a href="messagejob">
                                <p class="pp2" alt="I need help i want social media account manager">I need help i want social media account manager </p>
                                
                                <div class="d-flex justify-content-between align-items-center amount_wrap">
                                    <!--<div class="star">-->
                                    <!--    <i class="fa-solid fa-star"></i>-->
                                    <!--    <small>New Member</small>-->
                                    <!--</div>-->
                                    <div class="wrapper_cash_total">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z"></path>
                                        </svg>
                                        <!--<img class="cash-img" src="assets/img/cash.svg" >   -->
                                        <b style="color: green;">2000 INR</b>
                                    </div>
                                </div>
                                </a>
                                
                            </div>
                        </div>
          <div class="Shortlisted_container bg-white">
            <div class="Shortlist_title p-2">
               <h4 class="font-weight-bold">Discussion</h4>
               <div class="d-flex">
                  <div class="col-prop-person">
                   <img class="rounded-circle" src="https://mitdevelop.com/instajobs/admin/assets/img/profile/2396947-60f1a396868e4.webp" alt="image discussion person"/>
                  </div>
                  <div class=" col-prop-persons">
                      <p class="pp mr-in font-weight-bold p-0">Michael</p>
                    <p class="font-weight-normal quote-pt post-time py-1">12 Apr 2023 3:05PM</p>
                    <p class="font-weight-normal quote-pt post-para"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text </p>
                  </div>
               </div>
               <hr>
               
               <div clas="prop-offer">
                   <p CLASS="offr-title">PROPOSED AN OFFER</p>
                   <div class="img-p msgjob_wrapper m-0">
            <a href="#">
               <div class="hh-1"><img class="hhh" src="admin/assets/img/services/mobile-gaming.jpg" alt="">
               </div>
            </a>
            <div class="all-cnt">
               <div class="inner">
                  <a href="user-view.php?viewuserid=1">
                     <div class="d-flex two-lb align-items-center job-listing-fl  ">
                        <div class="title_img">
                           <img class="sm-img" src="admin/assets/img/profile/2396947-60f1a396868e4.webp" alt="">
                           <p class="pp mr-in">Jaspreet Susshane</p>
                        </div>
                     </div>
                  </a>
               </div>
               <a href="#">
                  <p class="pp2" alt="I need help i want social media account manager">I need help i want social media account manager </p>
                  <div class="d-flex justify-content-between align-items-center amount_wrap">
                     <!--<div class="star">-->
                     <!--    <i class="fa-solid fa-star"></i>-->
                     <!--    <small>New Member</small>-->
                     <!--</div>-->
                     <div class="wrapper_cash_total">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                           <path fill="currentColor" d="M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z"></path>
                        </svg>
                        <!--<img class="cash-img" src="assets/img/cash.svg" >   -->
                        <b style="color: green;">2000 INR</b>
                     </div>
                  </div>
               </a>
            </div>
         </div>
                
                  <button type="button" class="custom-btn bnt-fill-green w-100">Start Work</button>
        
               </div>
            </div>
         </div>
            </div>
            <!-----------------------------------Middle content------------------------>  
        </div>
<?php include('inc/footer.php'); ?>