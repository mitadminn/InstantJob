<?php 
    $page = 'Bank Details';
    include('inc/header.php'); 
    ?>
<?php include('inc/sidebar.php'); ?>     
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
<div class="col-lg-9 col-md-9 second-mid example">
    <div class="head-mid">
        <h2>Public Profile</h2>
    </div>
    <!-- ----------------------middle one---------------------- -->
    <div class="bck-white bck-white-bnk ">
        <form method="post" action="admin/inc/process.php?action=BankDetails" enctype="multipart/form-data">
            <?php include('user-information.php'); ?>  
            <!--title & summary 2-->
            <div class="profile-mid-content">
                <div class="title-and-para">
                    <div class="bio-title">
                        <h3 class="mt-0">Bank Name</h3>
                    </div>
                    <input type="text" name="bankname" class="form-control m-0" value="<?=$user_information['BankName'];?>" placeholder="Please enter your bank name">
                </div>
            </div>
            <div class="profile-mid-content">
                <div class="title-and-para">
                    <div class="bio-title">
                        <h3 class="mt-0">Account Number</h3>
                    </div>
                    <input type="text" name="account_no" class="form-control m-0" value="<?=$user_information['AccountNumber'];?>"  placeholder="0000-0000-0000-0000">
                </div>
            </div>
            <div class="profile-mid-content">
                <div class="title-and-para">
                    <div class="bio-title">
                        <h3 class="mt-0">Country</h3>
                    </div>
                    <input type="text" name="country" class="form-control m-0" value="<?=$user_information['Country'];?>"  placeholder="Malaysia">
                </div>
            </div>
            <input type="hidden" name="id" class="form-control" value="<?=$user_information['id'];?>">
            <br>
            <button type="submit" class="btn btn-success btn-pro-edit"> Update Profile</button>
            <!--title & summary 3-->
        </form>
    </div>
    <!---------------------- middle one end -------------------------->
</div>
<?php include('inc/footer.php'); ?> 
<!--title & summary 4-->
<div class="profile-mid-cont desk-hidn">
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
                    <img class="" src="http://instantjobs.bluepearltech.com/assets/img/dcc2ccd9.avif" alt="">
                </div>
                <div class="para-profile">
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr...</p>
                </div>
            </div>
            <div class="img-p-content">
                <div class="img-pro-fl">
                    <img class="" src="http://instantjobs.bluepearltech.com/assets/img/dcc2ccd9.avif" alt="">
                </div>
                <div class="para-profile">
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr...</p>
                </div>
            </div>
            <div class="img-p-content">
                <div class="img-pro-fl">
                    <img class="" src="http://instantjobs.bluepearltech.com/assets/img/dcc2ccd9.avif" alt="">
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
<div class="review-section desk-hidn">
    <div class="review-sec-profile">
        <div class="bio-title fl-sm">
            <h3>Reviews</h3>
            <div class="show-all">
                <a href="#">Show All</a>
            </div>
        </div>
        <div class="review-content">
            <div class="star-rating-img">
                <img class="review-img" src="http://instantjobs.bluepearltech.com/assets/img/dcc2ccd9.avif" alt="">
            </div>
            <div class="star-rating">
                <h3>Clinton</h3>
                <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="review star">
                <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="review star">
                <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="review star">
                <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="review star">
            </div>
        </div>
        <p>Lorem ipsum Pellentesque efficitur leo a laoreet. Quis neque fringilla, in imperdiet sapien euismod.</p>
        <div class="review-content">
            <div class="star-rating-img">
                <img class="review-img" src="http://instantjobs.bluepearltech.com/assets/img/dcc2ccd9.avif" alt="">
            </div>
            <div class="star-rating">
                <h3>Abdullah</h3>
                <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="review star">
                <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="review star">
                <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="review star">
                <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="review star">
            </div>
        </div>
        <p>Lorem ipsum Pellentesque efficitur leo a laoreet. Quis neque fringilla, in imperdiet sapien euismod.</p>
        <div class="review-content">
            <div class="star-rating-img">
                <img class="review-img" src="http://instantjobs.bluepearltech.com/assets/img/dcc2ccd9.avif" alt="">
            </div>
            <div class="star-rating">
                <h3>Man Kaya</h3>
                <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="review star">
                <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="review star">
                <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="review star">
                <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="review star">
            </div>
        </div>
        <p>Lorem ipsum Pellentesque efficitur leo a laoreet. Quis neque fringilla, in imperdiet sapien euismod.</p>
    </div>
</div>
<!--reviews-->
<script>
    $(":date").dateinput({ trigger: true, format: 'dd mmmm yyyy', min: -1 })
    $(":date").bind("onShow onHide", function()  {
    $(this).parent().toggleClass("active");
    });
      $(":date:first").data("dateinput").change(function() {
     	// we use it's value for the seconds input min option
    	$(":date:last").data("dateinput").setMin(this.getValue(), true);
        });
</script>