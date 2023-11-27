<?php 
    $page = 'Post Preview';
    include('inc/header.php'); 
  
    $service = $_GET['topic'];
    $signle_service = $obj->GetServiceByName($service);
    $userid = $signle_service['user_id'];
    $postuser = $obj->GetUserById($userid);
     
    $addons= $obj->GetAddonsByTopic($service);
    $addonstotal= $obj->GetSumAddonsByTopic($service);
     $price = $signle_service['price'];
        $formattedPrice = number_format($price, 0, '.', ','); 
 $reviews_avg = $obj->GetReviewAvgByUser($userid);
// Calculate the average rating and total number of reviews
$avg_rating = number_format($reviews_avg['avg_communication_rating'], 1);
$total_reviews = $reviews_avg['total_reviews'];
     ?>
<?php include('inc/sidebar.php'); ?>     
<!--first tab row start-->
<style>
form#cart p {font-size: 12px;float: right;  margin: 5px 0 0 10px;}
form#cart div {margin: 10px 0 0 0;}
</style>
<div class="col-sm-12 instant-main" style="background:#e5e5e5;">
<div class="row">
<div class="middle_container" id="myTabContent">
     <div class="head-mid">
            <h2>Post Preview</h2>
        </div>
    
    <div class="service_provider_contain post_prev_top_wrap" style="position:relative;">
                       
                             <div class="img-p preview_post_job">
                                  <!--<a class="name_topic" href="professional-service?t=<?=$signle_service['id'];?>&service=<?=$topic;?>">-->
                                <div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?=$signle_service['photos'];?>"
                                        alt=""></div>
                                        <!--</a>-->
                                <div class="all-cnt">
                                    <div class="inner">
                                        <a href="user-view.php?viewuserid=<?=$postuser['id'];?>">
                                            <div class="d-flex two-lb align-items-center heart-img-head">
                                                <div class="img-heart-nm">
                                                    <img class="sm-img"
                                                        src="<?php if(!empty($data['picture'])) { echo $_SESSION['user_image']; } elseif(!empty($postuser['ProfilePic'])) { echo 'admin/assets/img/profile/'.$postuser['ProfilePic']; }  else { echo 'assets/img/dcc2ccd9.avif'; } ?>"
                                                        alt="">
                                                    <p class="pp mr-in">
                                                        <?=$postuser['ProfileName'];?>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                     <p class="pp2" alt=""> <?=$signle_service['topic'];?></p>
                                    
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="star">
                                            <i class="fa-solid fa-star"></i>
                                             <small><?=$avg_rating;?> (<?=$total_reviews;?>)</small>
                                        </div>

                                        <p><small>From </small> <b>
                                                RM<?=$formattedPrice;?>
                                                <?//=$signle_service['price_type'];?>
                                            </b> </p>
                                    </div>
                                     
                                </div> 
                            </div>
                        
                        
                        
                        
                    </div>
    
    <div class="mid-pro">
        <div class="profsnl-servc">
            <div class="big-img-pro">
                <b style="color: #ff0000;"> </b>
                <img class="pro-big-img" src="admin/assets/img/services/<?=$signle_service['photos'];?>" alt=""> 
            </div>
        </div>
    </div>
    <div class="bg-white p-3">
            <h3 class="p-2">Summary</h3>
    <div class="">
        <div class="">
            <div class="summary-table-left">
                <div class="d-flex" style="justify-content: space-between;">
                   
                        <div class="third-sec-profsnl">
                    <div class="hd-para">
                        <div>
                            <h6><?=$signle_service['topic'];?> </h6>
                        </div>
                        <div>
                            <p>  <?php echo substr($signle_service['description'], 0,150);?>...</p>
                        </div>
                    </div>
                </div>
                        <div style="">
                            <p class="">RM<?=$formattedPrice;?></p>
                        </div>
                   
                </div>
                <div class="d-flex" style="justify-content: space-between; margin-top: 10px;">
                    <div class="d-flex">
                        <form id='cart'></form>
                    </div>
                </div>
                <div class="d-flex" style="justify-content: space-between; margin-top: 10px;">
                    <div class="d-flex">
                        <form id='cart'></form>
                    </div>
                </div>
                <div class="d-flex" style="justify-content: space-between;margin-top: 10px;">
                    <div class="d-flex">
                        <form id='cart'></form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<hr style="margin:0;">-->
    <div class="summary-table-left align-center" style="display: flex;justify-content: space-between; align-items:center;">
        <div>
            <!--<p>5% Service Fee</p>-->
            <!--<p>6% SST</p>-->
            <!--<label class="total_cost">-->
            <!--<b>Total:</b> -->
            <!--</label>-->
        </div>
        <div class="summary-table-right">
            <!--<p>RM<?//=$servicetax = $signle_service['price']*5/100;?></p>-->
            <!--<p>RM<?//=$ssttax = $signle_service['price']*6/100;?></p>-->
            <output id='total' form='cart'><?//=$total = $servicetax + $signle_service['price']+ $ssttax + $addonstotal['addontotal'];?></output>
            <!--<output id='total' form='cart'>RM</output>-->
            <?php $total = $signle_service['price'];?>
            
        </div>
    </div>
     </div>
    <div class="last_title">
        <div class="last_title" style="padding: 15px;">
            <a href="post-sponsor.php?id=<?=$signle_service['id'];?>&am=<?=$total;?>" class=" btn-check">
            <button type="button" class=" rounded btn-success btn-sucs btnm-frst w-100 post_spon_btn">Submit Post for Approval</button>
            </a>
        </div>
    </div>
</div>
<?php include('inc/footer.php'); ?> 
<!----------------SUMMARY SCRIPT---------------------->
 
<!----------------SUMMARY SCRIPT---------------------->