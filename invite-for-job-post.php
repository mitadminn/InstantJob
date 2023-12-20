<?php 
    $page = 'Invite For Job Post';
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
                    <?php include('user-information.php'); ?>   
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include('inc/footer.php'); ?>