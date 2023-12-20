<?php
include('auth.php'); 
    $page = 'Reviews';
     include('inc/header.php'); 
 ?>
<?php include('inc/sidebar.php'); ?>  
<style>
    @media (min-width:0) and (max-width:567px) {
        body{
            background:#fff !important;
        }
    }
</style>
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
<div class="middle_container">
    <div class="head-mid">
        <h2>All Reviews</h2>
    </div>
    <!------------------------ Middle one ------------------------>
    <div class="bck-white example">
        <!--reviews-->
        <div  class="review-section hidn-aftr-fotr">
            <div class="review-sec-profile">
             
                <?php include('user-reviews.php'); ?>
             </div>
        </div>
        <!--reviews-->
    </div>
    <!---------------------- Middle one end -------------------------->
</div>
<?php include('inc/footer.php'); ?>