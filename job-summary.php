<?php $page = 'Job Status';
    include('inc/header.php'); 
    $jobid = $_GET['id'];
    $signle_job = $obj->GetJobById($jobid);
    $userid = $signle_job['user_id'];
    $postuser = $obj->GetUserById($userid);
    
    ?>
<?php include('inc/sidebar.php'); ?>     
<!--first tab row start-->
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
<div class="col-lg-9 col-md-9 second-mid example tab-panels" id="myTabContent">
    <div class="tab-content">
        <div id="message" class="tab-pane">
            <div class="img-p third-pge-contnt">
                <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                <div class="all-cntnt">
                    <div class="d-flex two-lb align-items-center    ">
                        <div class="items-title">
                            <p class="pp mr-in title-name ">Aleafay</p>
                            <i class="fa-solid fa-star"></i>
                            <small class="sml"> 5.0 (32)</small> 
                        </div>
                        <div class="just-now-ok">
                            <p class="jst-now">Just Now</p>
                        </div>
                    </div>
                    <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit  amet adipiscing elit amet </p>
                </div>
            </div>
            <div class="img-p third-pge-contnt">
                <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                <div class="all-cntnt">
                    <div class="d-flex two-lb align-items-center    ">
                        <div class="items-title">
                            <p class="pp mr-in title-name ">hammondbailee</p>
                            <i class="fa-solid fa-star"></i>
                            <small class="sml">2.2 (5))</small>
                        </div>
                        <div class="just-now">
                            <p class="jst-now">28 mins ago</p>
                        </div>
                    </div>
                    <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet adipiscing elit  amet</p>
                </div>
            </div>
            <div class="img-p third-pge-contnt">
                <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                <div class="all-cntnt">
                    <div class="d-flex two-lb align-items-center    ">
                        <div class="items-title">
                            <p class="pp mr-in title-name ">daisyfinnegan</p>
                            <i class="fa-solid fa-star"></i>
                            <small class="sml">3.2 (12)</small>
                        </div>
                        <div class="just-now">
                            <p class="jst-now">8 hours ago</p>
                        </div>
                    </div>
                    <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet adipiscing elit amet </p>
                </div>
            </div>
            <div class="img-p third-pge-contnt">
                <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                <div class="all-cntnt">
                    <div class="d-flex two-lb align-items-center    ">
                        <div class="items-title">
                            <p class="pp mr-in title-name ">chinspicy1</p>
                            <i class="fa-solid fa-star"></i>
                            <small class="sml">4.1 (22))</small>
                        </div>
                        <div class="just-now">
                            <p class="jst-now">4 days ago</p>
                        </div>
                    </div>
                    <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet adipiscing elit amet  </p>
                </div>
            </div>
            <div class="img-p third-pge-contnt">
                <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                <div class="all-cntnt">
                    <div class="d-flex two-lb align-items-center    ">
                        <div class="items-title">
                            <p class="pp mr-in title-name ">Todlila</p>
                            <i class="fa-solid fa-star"></i>
                            <small class="sml">4.4 (19)</small> 
                        </div>
                        <div class="just-now">
                            <p class="jst-now">5 mnth ago</p>
                        </div>
                    </div>
                    <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet adipiscing elit amet </p>
                </div>
            </div>
        </div>
        <div id="job" class="tab-pane active">
            <div class="img-p third-pge-contnt">
                <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                <div class="all-cntnt">
                    <div class="d-flex two-lb align-items-center">
                        <div class="items-title">
                            <p class="pp mr-in title-name ">Aleafayxxx</p>
                            <i class="fa-solid fa-star"></i>
                            <small class="sml"> 5.0 (32)</small> 
                        </div>
                        <div class="just-now-ok">
                            <p class="jst-now">Just Now</p>
                        </div>
                    </div>
                    <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit  amet adipiscing elit amet </p>
                </div>
            </div>
            <div class="img-p third-pge-contnt">
                <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                <div class="all-cntnt">
                    <div class="d-flex two-lb align-items-center    ">
                        <div class="items-title">
                            <p class="pp mr-in title-name ">hammondbaileeccc</p>
                            <i class="fa-solid fa-star"></i>
                            <small class="sml">2.2 (5))</small>
                        </div>
                        <div class="just-now">
                            <p class="jst-now">28 mins ago</p>
                        </div>
                    </div>
                    <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet adipiscing elit  amet</p>
                </div>
            </div>
            <div class="img-p third-pge-contnt">
                <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                <div class="all-cntnt">
                    <div class="d-flex two-lb align-items-center    ">
                        <div class="items-title">
                            <p class="pp mr-in title-name ">daisyfinnegan</p>
                            <i class="fa-solid fa-star"></i>
                            <small class="sml">3.2 (12)</small>
                        </div>
                        <div class="just-now">
                            <p class="jst-now">8 hours ago</p>
                        </div>
                    </div>
                    <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet adipiscing elit amet </p>
                </div>
            </div>
            <div class="img-p third-pge-contnt">
                <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                <div class="all-cntnt">
                    <div class="d-flex two-lb align-items-center    ">
                        <div class="items-title">
                            <p class="pp mr-in title-name ">chinspicy1</p>
                            <i class="fa-solid fa-star"></i>
                            <small class="sml">4.1 (22))</small>
                        </div>
                        <div class="just-now">
                            <p class="jst-now">4 days ago</p>
                        </div>
                    </div>
                    <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet adipiscing elit amet  </p>
                </div>
            </div>
            <div class="img-p third-pge-contnt">
                <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                <div class="all-cntnt">
                    <div class="d-flex two-lb align-items-center    ">
                        <div class="items-title">
                            <p class="pp mr-in title-name ">Todlila</p>
                            <i class="fa-solid fa-star"></i>
                            <small class="sml">4.4 (19)</small> 
                        </div>
                        <div class="just-now">
                            <p class="jst-now">5 mnth ago</p>
                        </div>
                    </div>
                    <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet adipiscing elit amet </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('inc/footer.php'); ?>