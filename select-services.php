<?php
    $page = 'Service Select';
    include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); 

 
 
?>     
<!--first tab row start-->
<div class="col-sm-12 instant-main" style="background: #fff">
<div class="row">
<div class="col-lg-12 col-md-12 second-mid example">
<div class="container select_srvc_choice">
<div class="card">
<div class="main prof-inf-new active" >
<a href="service-provider"> 
<img class="logo_instant_jobs" src="assets/img/new-instant-logo.png" alt="">
</a>
<p class="text-center lets sevices_topic_">Whether you're an employer looking to offer someone a job or someone looking to sell your professional
    services on part-time or full-time basis , you've come to the right place!
</p>
<div class="card_for_services services_parent_container d-flex">
    <a href="create-service">
        <button class='services_child_container <?=$appcls;?>'>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <title>briefcase-outline</title>
                <path d="M20,6C20.58,6 21.05,6.2 21.42,6.59C21.8,7 22,7.45 22,8V19C22,19.55 21.8,20 21.42,20.41C21.05,20.8 20.58,21 20,21H4C3.42,21 2.95,20.8 2.58,20.41C2.2,20 2,19.55 2,19V8C2,7.45 2.2,7 2.58,6.59C2.95,6.2 3.42,6 4,6H8V4C8,3.42 8.2,2.95 8.58,2.58C8.95,2.2 9.42,2 10,2H14C14.58,2 15.05,2.2 15.42,2.58C15.8,2.95 16,3.42 16,4V6H20M4,8V19H20V8H4M14,6V4H10V6H14Z" />
            </svg>
            <div class="container ">
                <p>Sell your services</p>
            </div>
        </button>
    </a>
    <a href="create-post">
        <button class='services_child_container <?=$appcls;?>'>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <title>hand-heart-outline</title>
                <path d="M16 3.23C16.71 2.41 17.61 2 18.7 2C19.61 2 20.37 2.33 21 3C21.63 3.67 21.96 4.43 22 5.3C22 6 21.67 6.81 21 7.76S19.68 9.5 19.03 10.15C18.38 10.79 17.37 11.74 16 13C14.61 11.74 13.59 10.79 12.94 10.15S11.63 8.71 10.97 7.76C10.31 6.81 10 6 10 5.3C10 4.39 10.32 3.63 10.97 3C11.62 2.37 12.4 2.04 13.31 2C14.38 2 15.27 2.41 16 3.23M22 19V20L14 22.5L7 20.56V22H1V11H8.97L15.13 13.3C16.25 13.72 17 14.8 17 16H19C20.66 16 22 17.34 22 19M5 20V13H3V20H5M19.9 18.57C19.74 18.24 19.39 18 19 18H13.65C13.11 18 12.58 17.92 12.07 17.75L9.69 16.96L10.32 15.06L12.7 15.85C13 15.95 15 16 15 16C15 15.63 14.77 15.3 14.43 15.17L8.61 13H7V18.5L13.97 20.41L19.9 18.57Z" />
            </svg>
            <div class="container">
                <p>Offer a job</p>
            </div>
        </button>
    </a>
</div>
<?php include('approve-popup.php');?>
<?php include('inc/footer.php'); ?>

