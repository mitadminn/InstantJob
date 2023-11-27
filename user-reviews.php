<?php
 
$allreviews = $obj->GetReviewsById($user_id);

// $totalRating = 0; // Variable to store the sum of all rating values
// $overallRating = '';
    global $totalRating, $averageRating, $roundedRating, $overallRating,$overallRating;
    $totalRating = 0;
    while ($row = mysqli_fetch_array($allreviews)) {
        $userid = $row['sendby'];
        $posttype = $row['posttype'];
        
        $postids = $row['postid'];
        if($posttype == 'job') {
        $jobid = $row['postid'];
        $jobdata = $obj->GetJobById($jobid);
        $reviewuser = $obj->GetUserById($userid);
          $text = $jobdata['topic'];
          $page = 'job-details?j='.$jobid.'&job=';
        } elseif($posttype == 'service') {
        $postid = $row['postid'];
        $reviewuser = $obj->GetUserById($userid);
        $jobdata = $obj->GetServiceByPostId($postid);
         $text = $jobdata['topic'];
         $page = 'professional-service?t='.$postid.'&service=';
        }
         $topic = $obj->slugify($text);
        
        $isGoogleImage = strpos($reviewuser['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
    
        if ($isGoogleImage) {
            $userimg = $reviewuser['ProfilePic'];
        } else {
            $userimg = 'admin/assets/img/profile/'.$reviewuser['ProfilePic'];
        }
    
        $totalRating += $row['communication_rating'] + $row['service_delivered_rating'] + $row['price_budget_rating'] + $row['repeat_hire_rating'];
    
        $averageRating = $totalRating / (mysqli_num_rows($allreviews) * 4); // Divide by the total number of reviews times 4 (assuming each review has 4 rating categories)
          $roundedRating = round($averageRating, 1); // Round the average rating to one decimal place
          $overallRating = round($averageRating, 1);
        $userid = $row['sendto'];
        $total = $obj->GetReviewAvgByUser($userid);
        
                $userid = $row['sendto'];

        $allreviewss = $obj->GetReviewsByIds($user_id,$postids);
    }  
    
    if(!empty($allreviewss)) {
        ?>
     <div class="review-section hidn-aftr-fotr">
                      
                <div class="fl-sm review-sm">
                     <h3>Reviews <?=$overallRating;?>(<?=$total['total_reviews'];?>) </h3>
                    <div class="show-all">
                        <a href="reviews">Show All</a>
                    </div>
                    <div class="review-sec-profile">
                    <div class="d-flex align-items-center" style="gap:10px;">
                    <img class="review-img" src="<?php echo $userimg; ?>" alt="">
                    <h3><?php echo $reviewuser['ProfileName']; ?></h3>
                    </div>
                </div>
                          
                        <?php while ($rows = mysqli_fetch_array($allreviewss)) {
                            
                            // print_r($rows);
                            $post_id = $rows['postid'];
                            $type = $rows['posttype'];
                            $proposal = $obj->GetProposalDataByPostId($post_id,$type);
                          
                        
                        ?>
    <div class="review-content-pro">
        <div class="star-rating-img pro-star-rt-img">
            <div class="star-rating p-0">
                <p class="p-0">
        
        
        <b>Job completion : </b><a href="<?=$page;?><?=$topic;?>"><?php echo substr($jobdata['topic'], 0, 30) . '...'; ?></a>
         <!--<div class="star-rating">-->
         <br>
         <?php
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $roundedRating) {
                        echo '<i class="fa-solid fa-star"></i>'; // Full star
                    } else {
                        echo '<i class="fa-solid fa-star star-gr"></i>'; // Empty star
                    }
                }
                ?><br>
                <?php echo $row['public_review']; ?>
                 
                <!--</div>-->
    </p>
            </div>
        </div>
        <div class="d-m-y">
            
            <p class="p-0"><span>Amount : <strong>RM<?=$proposal['price']?></strong></span><br><?php 
                $dateString = $row['created_at'];
                $timestamp = strtotime($dateString);
                echo $formattedDate = date('d F Y', $timestamp);
            ?></p>
        </div>
    </div>
    
    <?php } ?>
      </div>
                            </div>
    <?php
    }
