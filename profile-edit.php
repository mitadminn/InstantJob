<?php
$page = 'Profile Edit';
include('inc/header.php');

// $bankdetails = $obj->GetBankDetails();
$bankdetails = $obj->GetBankDetailsByUserId($user_id);

?>
<link rel="stylesheet" href="assets/css/profile-edit">


<?php include('inc/sidebar.php'); ?>
 
<div class="col-sm-12 instant-main">
    <div class="row">
        <div class="middle_container">
            <div class="head-mid">
                <h2>Public Profile</h2>
            </div>
            <!-- ----------------------middle one---------------------- -->
            <div class="bck-white ">

                <form method="post" action="admin/inc/process.php?action=EditProfile" enctype="multipart/form-data">
                    <?php include('user-information.php'); ?>

                    <div class="row">
                        <div class="col-lg-12">

                            <div class="profile-mid-content upload_wrap_profile">
                                <div class="title-and-para">
                                    <div class="bio-title">
                                        <h3>Profile Pic</h3>
                                        <div class="bio-img-portfolio">

                                            <div class="upload__box">
                                                <div class="upload__btn-box">
                                                    <label class="upload__btn">
                                                        <?php if (!empty($user_information['ProfilePic'])) { ?>
                                                            <p>+</p>
                                                        <?php } else { ?>
                                                            <p>+</p>
                                                        <?php } ?>

                                                        <input type="file" id="file" name="profilepic" class="form-control upload__inputfile" />
                                                        <input type="hidden" id="files" name="profilepic2" value="<?= $user_information['ProfilePic']; ?>" class="form-control " data-max_length="1" />

                                                    </label>
                                                </div>
                                                <div class="upload__img-wrap"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--title & summary 1-->
                            <div class="profile-mid-content">
                                <div class="title-and-para">
                                    <div class="bio-title">
                                        <h3>Profile Bio</h3>
                                        <textarea id="w3review" name="bio" class="form-control" rows="4" cols="50"><?= $user_information['ProfileBio']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--title & summary 1-->
                            <!--title & summary 2-->
                            <div class="profile-mid-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="title-and-para">
                                            <div class="bio-title">
                                                <h3>Profile Name</h3>
                                            </div>
                                            <input type="hidden" name="id" class="form-control" value="<?= $user_information['id']; ?>">
                                            <input type="text" name="firstname" class="form-control" value="<?= $user_information['ProfileName']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="title-and-para">
                                            <div class="bio-title">
                                                <h3>Name as IC</h3>
                                            </div>
                                            <input type="text" name="icname" class="form-control" value="<?= $user_information['IC_name']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="profile-mid-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="title-and-para">
                                            <div class="bio-title">
                                                <h3 class="mt-0">Phone</h3>
                                            </div>
                                            <input type="text" name="phone" class="form-control" value="<?= $user_information['Phone']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="title-and-para">
                                            <div class="bio-title">
                                                <h3 class="mt-0">Email</h3>
                                            </div>
                                            <input type="text" name="email" class="form-control" value="<?= $user_information['Email']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="profile-mid-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="title-and-para">
                                            <div class="bio-title">
                                                <h3 class="mt-0">Address</h3>
                                            </div>
                                            <input type="text" name="address" class="form-control" value="<?= $user_information['Address']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            

                            <div class="profile-mid-content">
                                <div class="title-and-para">
                                    <div class="bio-title">
                                        <h3>Bank Details</h3>
                                    </div>
                                     <div class="profile-mid-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="title-and-para">
                                            <div class="bio-title">
                                                <h3>Bank Name</h3>
                                            </div>
                                            <input type="text" name="bankname" class="form-control" value="<?= $bankdetails['BankName']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="title-and-para">
                                            <div class="bio-title">
                                                <h3>Account Number</h3>
                                            </div>
                                            <input type="text" name="account_no" class="form-control" value="<?=$bankdetails['AccountNumber']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                                </div>
                            </div>
                            <button type="submit" class="btn custom-btn bnt-fill-green">Update Profile</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <script>
            $(":date").dateinput({
                trigger: true,
                format: 'dd mmmm yyyy',
                min: -1
            })
            $(":date").bind("onShow onHide", function() {
                $(this).parent().toggleClass("active");
            });
            $(":date:first").data("dateinput").change(function() {
                // we use it's value for the seconds input min option
                $(":date:last").data("dateinput").setMin(this.getValue(), true);
            });
        </script>
        <?php include('inc/footer.php'); ?>