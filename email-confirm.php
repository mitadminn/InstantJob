<?php
    $page = 'Email Confirmation';
    include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>   
 
<!--first tab row start-->
<div class="col-sm-12 instant-main">
    <div class="row mx-0"  >
        <div class="col-lg-12 col-md-12 second-mid example bg-white" >
            <div class="container">
                <div class="card">
                    <div class="parent">
                        <div class="main active">
                            <form method="post" id="" action="admin/inc/process.php?action=ConfirmEmail">
                                <a href="#"> 
                                <img class="logo_new_instant" src="assets/img/new-instant-logo.png" alt="">
                                </a>
                                <div class="content">
                                <p class="text-center">Check your Email for the confirmation code</p>
                                </div>
                                <label for="number" class="label-email P-0">Confirmation code</label>
                                <input type="text" class="confirmation-code" placeholder="Enter confirmation code" name="emailotp" required id="emailotp">
                                <?php if($_GET["msg"] == "error") { ?>
                                <p id="" style="color:red;" class="email-repeate">Wrong OTP</p>
                                <?php } ?>
                                <input type="hidden" class="form-control" placeholder="" name="email" value="<?=$_GET['email'];?>" id="email">
                                <button type="submit" id="nextBtn8" onclick="nextPrev(1)" class="margin_mobile">Submit</button>
                                <h3 class="title">Can't access?</h3>
                                <button type="button" id="nextBtn10" onclick="nextPrev(1)" class="mt-0">Resend Code</button>
                                <button type="button" id="nextBtn10" onclick="nextPrev(1)" class="mt-4">Contact Support</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<//?php include('inc/footer.php'); ?> -->
    <script src="inc/js/instantjob.js"></script>
</div>
</script>