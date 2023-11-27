<?php 
    $page = 'job Preview';
    include('inc/header.php'); 
  
     $job = $_GET['job'];
//   $job =  $obj->myUrlEncode($val);
    
    //$job = $_GET['job'];
    $signle_job = $obj->GetJobByTopic($job);
    $userid = $signle_job['user_id'];
    $postuser = $obj->GetUserById($userid);
    
     $user_image = '';
       if (!empty($_SESSION['user_image'])) { $user_image = $_SESSION['user_image']; } elseif (!empty($postuser['ProfilePic'])) { $user_image = 'admin/assets/img/profile/' . $postuser['ProfilePic'];
                                } else { $user_image = 'assets/img/male-1.png'; }
                                
                $price = $signle_job['price'];
                     $formattedPrice = number_format($price, 0, '.', ',');                
     ?>
<?php include('inc/sidebar.php'); ?>     
<!--first tab row start-->
<style>
form#cart p {font-size: 12px;float: right;  margin: 5px 0 0 10px;}
form#cart div {margin: 10px 0 0 0;}
button.rounded.btn-sucs.btnm-frst.w-100 {background: #0090FF !important;}
</style>
<div class="col-sm-12 instant-main" style="background:#e5e5e5;">
<div class="row">
<div class="middle_container" id="myTabContent">
     <div class="head-mid">
            <h2>Job Preview</h2>
        </div>
    
    <div class="service_provider_contain post_prev_top_wrap" style="position:relative;">
                       
                             <div class="img-p">
                                  <!--<a class="name_topic" href="professional-service?t=<?=$signle_job['id'];?>&service=<?=$topic;?>">-->
                                <div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?=$signle_job['photos'];?>"
                                        alt=""></div>
                                        <!--</a>-->
                                <div class="all-cnt">
                                    <div class="inner">
                                        <a href="user-view.php?viewuserid=<?=$postuser['id'];?>">
                                            <div class="d-flex two-lb align-items-center heart-img-head">
                                                <div class="img-heart-nm">
                                                    <img class="sm-img" src="<?=$user_image;?>" alt="user image">
                                                    <p class="pp mr-in"><?=$postuser['ProfileName'];?></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                     <p class="pp2" alt=""> <?=$signle_job['topic'];?></p>
                                    
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="csh-img-div wrapper_cash_total">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z" />
                                            </svg> 
                                            <b><?=$formattedPrice;?>MYR</b>
                                        </div>

                                        <div class="wrapper_clock">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>clock-outline</title><path d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z" /></svg>
                        <?php
                            $remaining_hours =$signle_job['fast_complete']; // number of hours left
                            $now = new DateTime();
                            $end = clone $now;
                            $end->add(new DateInterval('PT'.$remaining_hours.'H'));
                            $interval = $now->diff($end);
                            $remaining_time = $interval->format('%Hhr %Ss left');
                            echo '<b class="text-dark">'.$remaining_time.'</b>'; // output: 24hr 0m 0s left
                        ?>
                       
                        </div>
                                    </div>
                                     
                                </div> 
                            </div>
                        
                        
                        
                        
                    </div>
    
    <div class="mid-pro">
        <div class="profsnl-servc">
            <div class="big-img-pro">
                <b style="color: #ff0000;"> </b>
                <img class="pro-big-img" src="admin/assets/img/services/<?=$signle_job['photos'];?>" alt=""> 
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
                            <h6><?=$signle_job['topic'];?> </h6>
                        </div>
                        <div>
                            <p>  <?php echo $signle_job['description']; //substr($signle_job['description'], 0,500);?></p>
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
            <label class="total_cost">
            <!--<b>Total:</b> -->
            </label>
        </div>
        <div class="summary-table-right">
            <!--<p>RM<?//=$servicetax = $signle_job['price']*5/100;?></p>-->
            <!--<p>RM<?//=$ssttax = $signle_job['price']*6/100;?></p>-->
            <!--<output id='total' form='cart'>RM<?=$total = $servicetax + $signle_job['price']+ $ssttax;?></output>-->
            
        </div>
    </div>
     </div>
    <div class="last_title">
        <div class="last_title" style="padding: 15px;">
            <a href="job-sponsor.php?id=<?=$signle_job['id'];?>&am=<?=$total;?>" class=" btn-check">
            <button type="button" class="rounded btn-sucs btnm-frst w-100">Submit Post for Approval</button>
            </a>
        </div>
    </div>
</div>
<?php include('inc/footer.php'); ?> 
 