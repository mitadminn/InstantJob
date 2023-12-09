<?php 
    $page = 'Propose Quote Budget';
    include('inc/header.php'); 
        $postid = $_GET['stid'];
          $replacedString = $_GET['type'];
        if($replacedString == 'service') { 
            $serviceid =  str_replace("service-", "", $postid);
            $post_data = $obj->GetServiceById($serviceid);
            $type = $post_data['post_type'];
            
         }elseif($replacedString == 'job'){ 
              $jobid = str_replace("job-", "", $postid);
             $post_data = $obj->GetJobById($jobid);
             $type = $post_data['post_type'];
         }else{}
    $userid = $post_data['user_id'];
    $postuser = $obj->GetUserById($userid);
    
    
    $price = $post_data['price'];
                $formattedPrice = number_format($price, 0, '.', ',');
                
                
    ?>
<?php include('inc/sidebar.php'); ?>       
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
 <div class="middle_container bg-prop-contain "  >
          <div class="head-mid">
        <h2>Propose Quote <?=$replacedString;?></h2> 
    </div>
            <!----------------three dot menu mobila view START--------------------->
            <div class="dropdown">
                <div id="myDropdown" class="dropdown-content">
                    <a href="#">start job</a>
                    <a href="#">propose budget </a>
                    <a href="#">Attach files</a>
                    <a href="#">Send location</a>
                    <a href="#">Report job</a>
                    <a href="#">Block user</a>
                </div>
            </div>
            <!--------------------------three dot menu mobila view----------------------------------->
            <!------------------------------------Middle content--------------------------->
            
           <div class="img-p">
                        <a href="messagejob">
                            <div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?=$post_data['photos'];?>" alt="">
                            </div></a>
                            <div class="all-cnt">
                                <div class="inner">
                                    <a href="user-view.php?viewuserid=1">
                                        <div class="d-flex two-lb align-items-center job-listing-fl  ">
                                            <div class="title_img">
                                                <img class="sm-img" src="<?php if(!empty($_SESSION['user_image'])) { echo $_SESSION['user_image']; } elseif(empty($_SESSION['user_image'])) { echo 'admin/assets/img/profile/'.$postuser['ProfilePic']; }  else { echo 'assets/img/dcc2ccd9.avif'; } ?>" alt="">
                                                <p class="pp mr-in"><?=$postuser["ProfileName"];?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                 <a href="messagejob">
                                <p class="pp2" alt="<?=$post_data['topic'];?>"><?=$post_data['topic'];?> </p>
                                
                                <div class="d-flex justify-content-between align-items-center amount_wrap">
           
                                    <div class="wrapper_cash_total">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z"></path>
                                        </svg>
                          
                                        <b style="color: green;">RM<?=$formattedPrice;?></b>
                                    </div>
                                </div>
                                </a>
                                
                            </div>
                        </div>
            <div class="inp_content">
                <div class="">
                    <h3 style="font-size: 18px;">Budget</h3>
                </div>
                <div class=" "  >
                    <form class="d-flex" method="post" action="admin/inc/process.php?action=ProposedBudget">
                        
                        <input type="number" class="form-control m-0 w-50" name="proposed_price" aria-label="Text input with dropdown button" style="padding: 19px;">
                        <input type="hidden" class="form-control" name="postid" value="<?=$postid;?>" aria-label="Text input with dropdown button" style="padding: 19px;">
                        <input type="hidden" class="form-control" name="userid" value="<?=$user_id;?>" aria-label="Text input with dropdown button" style="padding: 19px;">
                        <input type="hidden" class="form-control" name="dis_id" value="<?=$_GET['dis_id'];?>" aria-label="Text input with dropdown button" style="padding: 19px;">
                        <input type="hidden" class="form-control" name="stid" value="<?=$_GET['msgid'];?>" aria-label="Text input with dropdown button" style="padding: 19px;">
                        <input type="hidden" class="form-control" name="type" value="<?=$type;?>" aria-label="Text input with dropdown button" style="padding: 19px;">

                        <div class="input-group-append">
                            <button type="submit" class="btn-wallet btn_budget_confirm bnt-fill-green" style="margin-left: 40px;">Confirm</button> 
 
                        </div>
                    </form>
                </div>
            </div>
            <!-----------------------------------Middle content------------------------>  
        </div>
<?php include('inc/footer.php'); ?>