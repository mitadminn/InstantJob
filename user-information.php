<?php 
            $allreviews = $obj->GetReviewsById($user_id);
            $totalEarning = $obj->getCreditedBalanceByUser($user_id);
            $isGoogleImage = strpos($user_information['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
            if ($isGoogleImage) {
            $userimg = $user_information['ProfilePic'];
            } else {
            $userimg = 'admin/assets/img/profile/'.$user_information['ProfilePic'];
            }
             
            $userid = $user_id;
            $reviews_avg = $obj->GetReviewAvgByUser($userid);
            // Calculate the average rating and total number of reviews
            $avg_rating = number_format($reviews_avg['avg_communication_rating'], 1);
            $total_reviews = $reviews_avg['total_reviews'];
            if (!empty($row['photos'])) {
                 $post_img ='admin/assets/img/services/' . $row['photos'];
             } else {
                 $post_img = 'assets/img/dummy-post.jpg';
                // Make sure to verify the resulting $post_img path
            }
       $type = 'service';
       $checkproposal = $obj->CheckProposalSent($postid, $type);
        if(!empty($total_reviews)) {$rating = $avg_rating.' ('.$total_reviews.')';} else {$rating = 'New Member';}        
    ?>
<link rel="stylesheet" href="assets/css/user-information.css">
<link rel="stylesheet" href="assets/css/stylesheet.css">
<?php ?>   
<div class="row user-info_row">
    <div class="col-lg-8">
        <div class="dream">
            <?php //print_r($guser);?>
            <?php if(!empty($_SESSION['user_image'])) { ?>
            <img class="main-img" src="<?php echo $_SESSION['user_image'];?>" alt="">
            <?php } elseif(!empty($user_information['ProfilePic'])) { ?>
            <img  class="main-img profile-in_mid" src="<?php echo $userimg; ?>" alt="">
            <?php } else { ?>
            <img  class="main-img" src="assets/img/male-1.png" alt="">
            <?php }?>
            <div class="dream-star">
                <h6> <?php if(!empty($guser['ProfileName'])) { echo $guser['ProfileName']; } elseif(!empty($_SESSION['Userid'])) { echo $user_information['ProfileName']; } else {}?></h6>
                <p> <img class="small-img-star " src="assets/img/star-svg.png" alt=""> <?=$rating;?></p>

                <p>Level 3 Member </p>
            </div>
        </div>
        <div class="users_all_info">
            <div class="users_info_container">
                <div class="">
                    <table class="table_container">
                        <tr class="table-row_top">
                            <th><?=$user_information['Country'];?></th>
                            <th><?php $datee = date_create($user_information['Created_at']); echo date_format($datee,"M Y"); ?></th>
                            <th>15min</th>
                            <th>RM<?=$totalEarning['credit'];?></th>
                        </tr>
                        <tr class="table-row_users">
                            <td>Country</td>
                            <td>Member since</td>
                            <td>Response time</td>
                            <td>Earning MYR</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 view_wrapper">
        <div  class="profile-mid_right_btns">
            <div>
                <a href="profile-edit" class=""> <button class="edit_accnt_btn">Edit Account Setting</button></a> 
            </div>
            <div>
                <a href="select-services"><button class="sell_servc_btn">Create a post</button></a>
            </div>
            <div>
                <a href="#"><button class="hire_job_btn">Invite to your job post</button></a>
            </div>
        </div>
    </div>
</div>