<?php 
include('auth.php'); 
    $page = 'Profile View';
    include('inc/header.php'); 
    
    $portfolio = $obj->GetPortfolioByUserId($user_id);
    
    ?>
<div class="container-fluid">
<!-------- ASIDE SEC START -------->
<?php include('inc/sidebar.php'); ?>     
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
<div class="col-lg-9 col-md-9 second-mid example">
    <div class="head-mid">
        <h2>Public Profile</h2>
    </div>
    <!-- ----------------------middle one---------------------- -->
    <div class="bck-white ">
        <?php include('user-view.php'); ?>   
        <div class="row">
            <div class="col-lg-12">
                <!--title & summary 1-->
                <div class="profile-mid-content">
                    <div class="title-and-para">
                        <div class="bio-title title_bio">
                            <div class="pro-bio-contain">
                                <h3>Profile Bio</h3>
                            </div>
                        </div>
                        <p><?=$user_information['ProfileBio'];?></p>
                    </div>
                </div>
                <!--title & summary 1-->
                <div class="profile-mid-content">
                    <div class="title-and-para">
                        <div class="bio-title title_bio">
                            <div class="pro-bio-contain">
                                <h3>Skills</h3>
                            </div>
                        </div>
                        <p><?=$user_information['ProfileBio'];?></p>
                    </div>
                </div>
                <!--title & summary 1-->
                <div class="profile-mid-content">
                    <div class="title-and-para">
                        <div class="bio-title title_bio">
                            <div class="pro-bio-contain">
                                <h3>Hobbies</h3>
                            </div>
                        </div>
                        <p><?=$user_information['ProfileBio'];?></p>
                    </div>
                </div>
                <!--title & summary 1-->
                <!--title & summary 2-->
                <div class="profile-mid-content">
                    <div class="title-and-para">
                        <div class="bio-title title_bio">
                            <div class="pro-bio-contain">
                                <h3>Qualification / Awards</h3>
                            </div>
                        </div>
                        <div class="bio-quali">
                            <p><?=$user_information['Qualifications'];?>  <?=$user_information['Year'];?></p>
                        </div>
                    </div>
                </div>
                <div class="profile-mid-content">
                    <div class="title-and-para">
                        <div class="bio-title title_bio">
                            <div class="pro-bio-contain">
                                <h3>Portfolio</h3>
                            </div>
                        </div>
                        <div class="bio-img">
                            <?php while($row=mysqli_fetch_array($portfolio)){ ?>
                            <div class="add-img-container">
                                <img class="add-img" src="admin/assets/img/portfolio/<?=$row['Photos'];?>" alt="">
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!--title & summary 3-->
                <!--title & summary 4-->
                <div class="profile-mid-cont hidn-aftr-fotr">
                    <div class="title-and-para forth-sm">
                        <div class="bio-title fl-sm">
                            <h3>Job Completed</h3>
                            <div class="show-all">
                                <a href="#">Show All</a>
                            </div>
                        </div>
                        <div class="">
                            <div class="img-p-content">
                                <div class="img-pro-fl">
                                    <img class="" src="admin/assets/img/services/photo-1472457897821-70d3819a0e24.avif" alt="">
                                </div>
                                <div class="para-profile">
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr...</p>
                                </div>
                            </div>
                            <div class="img-p-content">
                                <div class="img-pro-fl">
                                    <img class="" src="	admin/assets/img/services/R0010382.JPG" alt="">
                                </div>
                                <div class="para-profile">
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr...</p>
                                </div>
                            </div>
                            <div class="img-p-content">
                                <div class="img-pro-fl">
                                    <img class="" src="	admin/assets/img/services/Chrysanthemum.jpg" alt="">
                                </div>
                                <div class="para-profile">
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--title & summary 4-->
                <!--reviews-->
                <div class="review-section hidn-aftr-fotr">
                    <div class="review-sec-profile">
                        <div class="bio-title fl-sm">
                            <h3>Reviews</h3>
                            <div class="show-all">
                                <a href="#">Show All</a>
                            </div>
                        </div>
                        <div class="review-content">
                            <div class="star-rating-img">
                                <img class="review-img" src="admin/assets/img/services/photo-1472457897821-70d3819a0e24.avif" alt="">
                            </div>
                            <div class="star-rating">
                                <h3>Clinton</h3>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                        <p>Lorem ipsum Pellentesque efficitur leo a laoreet. Quis neque fringilla, in imperdiet sapien euismod.</p>
                        <div class="review-content">
                            <div class="star-rating-img">
                                <img class="review-img" src="admin/assets/img/services/R0010382.JPG" alt="">
                            </div>
                            <div class="star-rating">
                                <h3>Abdullah</h3>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                        <p>Lorem ipsum Pellentesque efficitur leo a laoreet. Quis neque fringilla, in imperdiet sapien euismod.</p>
                        <div class="review-content">
                            <div class="star-rating-img">
                                <img class="review-img" src="admin/assets/img/services/Chrysanthemum.jpg" alt="">
                            </div>
                            <div class="star-rating">
                                <h3>Man Kaya</h3>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                        <p>Lorem ipsum Pellentesque efficitur leo a laoreet. Quis neque fringilla, in imperdiet sapien euismod.</p>
                    </div>
                </div>
                <!--reviews-->
            </div>
        </div>
    </div>
</div>
<?php include('inc/footer.php'); ?>