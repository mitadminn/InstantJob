<?php $page = 'Search result';
    include('inc/header.php'); 
    $ads = $obj->GetServiceByAds();
    $jobads = $obj->GetJobsByAds();
    $searchvalue = $_GET['Service'];
    $searchjobs = $_GET['Jobs'];
    // $searchIntrest = $_GET['Intrest'];
    $searchSkills = $_GET['Skills'];
    $searchInterest = $_GET['Interest'];
    if(!empty($searchvalue)) {
    $searchresult = $obj->SearchDataValues($searchvalue);
    } elseif(!empty($searchjobs)) {
        $searchresult = $obj->SearchJobs($searchjobs);
    }
    $jobresult = $obj->SearchJobs($searchjobs);
    
    $Intrestresult = $obj->SearchIntrest($searchInterest);
    $Skillsresult = $obj->SearchSkills($searchSkills);
    
    ?>
    <style>
        .search_results_topic p {background: #fff;  border-radius: 5px; padding: 0 5px; font-size: 12px; float: left; margin: 3px;}
    </style>
<!-------- ASIDE SEC START -------->
<?php include('inc/sidebar.php'); ?>
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row" id="row_main">
<div class="middle_container">
    <div id="servicedata">
        <?php 
            while($row=mysqli_fetch_array($searchresult)){ 
                $userid = $row['user_id'];
                $postid = $row['id'];
                $userinfo = $obj->GetUserById($userid);
                $likedislike = $obj->GetLikeDislikeByUser($user_id, $postid);
                 $text = $row['topic'];
                     $topic = $obj->slugify($text);
             ?>
        <div class="head-mid people-paid d-flex align-items-center search_result_row">
            <h2>Search results:</h2>
            <div class="row skill_hobbies_ search_results_topic">
                <p class="">
                    <?=$searchvalue;?>
                    <svg class="" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <title>close-circle</title>
                        <path fill="currentColor" d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z" />
                    </svg>
                </p>
            </div>
        </div>
        <div class="service_provider_contain" style="position:relative;">
            <div class="likedislike">
                <?php if($likedislike['status'] == 1) { ?>
                <img class="heart-img " src="assets/img/hearts.png" id="dislike" alt="" data-id="2"
                    post-id="<?=$row['id'];?>" style="cursor:pointer;">
                <?php } elseif($likedislike['status'] == 2) {   ?>
                <img class="heart-img white_img_heart_wrap" src="assets/img/white-heart-1.png" alt="" id="updatelike"
                    data-id="1" post-id="<?=$row['id'];?>">
                <?php } else { ?>
                <img class="heart-img white_img_heart_wrap likehide" src="assets/img/white-heart-1.png" alt="" id="like"
                    data-id="1" post-id="<?=$row['id'];?>">
                <?php }   ?>
            </div>
            <div class="outer">
                <a class="name_topic" href="professional-service?service=<?=$topic;?>"></a>
                <div class="img-p">
                    <div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?=$row['photos'];?>"
                        alt=""></div>
                    <div class="all-cnt">
                        <div class="inner">
                            <a href="user-view.php?viewuserid=<?=$userinfo['id'];?>">
                                <div class="d-flex two-lb align-items-center heart-img-head">
                                    <div class="img-heart-nm">
                                        <img class="sm-img"
                                            src="<?php if(!empty($data['picture'])) { echo $_SESSION['user_image']; } elseif(!empty($userinfo['ProfilePic'])) { echo 'admin/assets/img/profile/'.$userinfo['ProfilePic']; }  else { echo 'assets/img/dcc2ccd9.avif'; } ?>"
                                            alt="">
                                        <p class="pp mr-in">
                                            <?=$userinfo['ProfileName'];?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <p class="pp2" alt="<?=$row['topic'];?>">
                            <?php echo substr($row['topic'], 0, 80);?>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <small>4.9 (108)</small>
                            </div>
                            <p><small>From </small> <b>
                                <?=$row['price'];?>
                                <?=$row['price_type'];?>
                                </b> 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php if(!empty($searchSkills)){ ?>
    <div class="head-mid people-paid d-flex align-items-center search_result_row">
        <h2>Search results:</h2>
        <div class="row skill_hobbies_ search_results_topic">
            <?php if(!empty($_GET['Skills'])) { ?>
            <p class="">
                <span><?=$searchSkills;?></span>
                <svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>close-circle</title>
                    <path fill="currentColor" d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z" />
                </svg>
            </p>
            <?php } ?>
            
            <form id="advance_search" class="form-submit">
            <input type="hidden" class="searchskils" name="searchskils"  value="<?=$searchSkills;?>">
 
                <p class="sk1" style="display:none;">
                <span class="skills1"></span>
                <svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>close-circle</title>
                    <path fill="currentColor" d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z" />
                </svg>
            </p>
            
             <p class="sk2" style="display:none;">
                <span class="skills2"></span>
                <svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>close-circle</title>
                    <path fill="currentColor" d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z" />
                </svg>
            </p>
                
                </div>
                
          
         <button  onclick="AddBtnsk1()"  id="addskillbtn1" type="button" class="btn profile-edit btn_profile_edit" data-toggle="modal" data-target="#exampleModalCenter" >Add</button>
         <button  onclick="AddBtnsk2()"  id="addskillbtn2" type="button" class="btn profile-edit btn_profile_edit" data-toggle="modal" data-target="#exampleModalCenter" style="display: none;" >Add</button>
         <input id="search-input" class="addsk1" name="addsk1" />
         <input id="search-input2" class="addsk2" name="addsk2" style="display: none;width: fit-content;margin-left: 10px;border: none;height: 25px;"/>
         <button type="submit" id="submitbtn" class="btn btn-primary profile-edit btn_profile_edit addItemBtn" style="display:none;"><span>Add</span></button>
 
        </form>
        
        
    </div>
    <div id="advance-skills"></div> 
    <?php
        
        foreach($Skillsresult as $skills){ 
              $user_id = $skills['Post_id'];
              $skills = $obj->GetSkillsByUserId($user_id);
              $userdata = $obj->GetUsersById($user_id);
         ?>
    <div class="bg-white container_search simpleskillsearch">
        <div class="d-flex search_detail_container">
            <div class="dream">
                <img class="img_search_container" src="admin/assets/img/profile/<?php echo $userdata['ProfilePic'];?>" alt="">
                <div class="dream-star">
                    <h6> <?=$userdata['ProfileName'];?></h6>
                    <p>
                        <svg class="star_wrap_svg" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>star</title>
                            <path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                        </svg>
                        4.9
                    </p>
                    <p><img class="batch_small_green" src="assets/img/rewardsmallimg.png" alt="">Level 1 Member </p>
                </div>
            </div>
            <div class="users_all_info">
                <div class="users_info_container">
                    <div class="">
                        <table class="table_container">
                            <tbody>
                                <tr class="table-row_top">
                                    <th><?=$userdata['Country'];?></th>
                                    <th>2k+</th>
                                </tr>
                                <tr class="table-row_users">
                                    <td>Country</td>
                                    <td>Earning USD</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="profile-mid_right_btns">
                <div>
                    <a href="invite-for-interview"><button class="invt-job-intrvw">Invite for job interview</button></a>
                </div>
                <div>
                    <a href="invite-for-job-post"><button class="invite-jop-post">Invite to your job post</button></a>
                </div>
            </div>
        </div>
        <div class="topic_search_result">
            <p><?=$userdata['ProfileBio'];?></p>
        </div>
        <div class="row skill_hobbies_">
            <?php  foreach($skills as $skils){ ?>
           
            <p class="skills"> <?php echo str_replace(",","<p class='skills'>",$skils['Skills']); ?> </p>
            <?php } ?>
        </div>
    </div>
    <?php  } } else {}
        ?>
    <?php if(!empty($searchInterest)){ ?>
    <?php foreach($Intrestresult as $intrst){ 
        $user_id = $intrst['user_id'];
        $intrest = $obj->GetIntrestByUserId($user_id);
        $userdata = $obj->GetUsersById($user_id);
        ?>
    <div class="bg-white container_search">
        <div class="d-flex search_detail_container">
            <div class="dream">
                <img class="img_search_container" src="admin/assets/img/profile/<?php echo $userdata['ProfilePic'];?>" alt="">
                <div class="dream-star">
                    <h6> <?=$userdata['ProfileName'];?></h6>
                    <p>
                        <svg class="star_wrap_svg" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>star</title>
                            <path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                        </svg>
                        4.9
                    </p>
                    <p><img class="batch_small_green" src="assets/img/rewardsmallimg.png" alt="">Level 1 Member </p>
                </div>
            </div>
            <div class="users_all_info">
                <div class="users_info_container">
                    <div class="">
                        <table class="table_container">
                            <tbody>
                                <tr class="table-row_top">
                                    <th><?=$userdata['Country'];?></th>
                                    <th>2k+</th>
                                </tr>
                                <tr class="table-row_users">
                                    <td>Country</td>
                                    <td>Earning USD</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="profile-mid_right_btns">
                <div>
                    <a href="invite-for-interview"><button class="invt-job-intrvw">Invite for job interview</button></a>
                </div>
                <div>
                    <a href="invite-for-job-post"><button class="invite-jop-post">Invite to your job post</button></a>
                </div>
            </div>
        </div>
        <div class="topic_search_result">
            <p><?=$userdata['ProfileBio'];?></p>
        </div>
        <div class="row skill_hobbies_">
            <?php foreach( $intrest as $intrests){ ?>
            <p class="skills"> <?php echo str_replace(",","<p class='skills'>",$intrests['Interest']); ?> </p>
            <?php } ?>
        </div>
    </div>
    <?php  } } else {}
        ?>
</div>
<?php include('inc/footer.php'); ?>
<script>
   
      
              $(document).on('click', '#like', function (e) {
                  var like = $(this).attr('data-id');
                  var postid = $(this).attr('post-id');
                  var userid = <?= $user_id;?>;
                  $.ajax({
                      type: "GET",
                      url: "admin/inc/process.php?like=" + like + "&postid=" + postid + "&userid=" + userid,
                      dataType: "html",
                      success: function (data) {
                          location.reload();
                      }
                  });
 
    
              });
    
               
              $(document).on('click', '#dislike', function (e) {
                  var dislike = $(this).attr('data-id');
                  var postid = $(this).attr('post-id');
                  var userid = <?= $user_id;?>;
                  $.ajax({
                      type: "GET",
                      url: "admin/inc/process.php?dislike=" + dislike + "&postid=" + postid + "&userid=" + userid,
                      dataType: "html",
                      success: function (data) {
                          location.reload();
                      }
                  });
              });
    
               
              $(document).on('click', '#updatelike', function (e) {
                  var updatelike = $(this).attr('data-id');
                  var postid = $(this).attr('post-id');
                  var userid = <?= $user_id;?>;
                  $.ajax({
                      type: "GET",
                      url: "admin/inc/process.php?updatelike=" + updatelike + "&postid=" + postid + "&userid=" + userid,
                      dataType: "html",
                      success: function (data) {
                          location.reload();
                      }
                  });
              });
    
    
    
    
              $(document).ready(function () {
                  if (navigator.geolocation) {
                      navigator.geolocation.getCurrentPosition(showLocation);
                  } else {
                      $('#location').html('Geolocation is not supported by this browser.');
                  }
              }); 
    
              function showLocation(position) {
                  var latitude = position.coords.latitude;
                  var longitude = position.coords.longitude;
                  $.ajax({
                      type: 'POST',
                      url: 'getLocation.php',
                      data: 'latitude=' + latitude + '&longitude=' + longitude,
                      success: function (msg) {
                          if (msg) {
                              $("#location").html(msg);
                          } else {
                              $("#location").html('Not Available');
                          }
                      }
                  });
              }
          
    
    
    function AddBtnsk1() {
    let slideSearch = document.getElementById("search-input");
    slideSearch.style.display = "block";
    document.getElementById("addskillbtn1").style.display = "none";
    document.getElementById("submitbtn").style.display = "block";
    document.getElementByClass("sk2").style.display = "none";
    
    
       }
       
       function AddBtnsk2() {
    let slideSearch = document.getElementById("search-input2");
    slideSearch.style.display = "block";
    document.getElementById("addskillbtn2").style.display = "none";
    document.getElementById("submitbtn").style.display = "block";
    
        document.getElementByClass("sk2").style.display = "block";

       }
     
          
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>

   <script type="text/javascript">
  $(document).ready(function() {
     
    // Send product details in the server
    $(".addItemBtn").click(function(e) {
        
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var searchskils = $(".searchskils").val();
      var addskills = $(".addsk1").val();
      var addskills2 = $(".addsk2").val();
  
        $.ajax({
        url: 'admin/inc/process.php?action=AdvanceSkillSearch',
        method: 'post',
        data: {
          searchskils: searchskils,
          addskills: addskills,
          addskills2: addskills2
        },
        success: function(response) {
          $("#advance-skills").html(response);
          $(".skills1").html(addskills);
          $(".skills2").html(addskills2);
          $('.sk1').css('display','block');
          $('.sk2').css('display','block');
          $('.simpleskillsearch').css('display','none');
 
          document.getElementById("addskillbtn2").style.display = "block";
          document.getElementById("search-input").style.display = "none";
          document.getElementById("search-input2").style.display = "none";
          document.getElementById("submitbtn").style.display = "none";

           window.scrollTo(0, 0);
           
   
        }
      });
    });
    

  });
 </script>   