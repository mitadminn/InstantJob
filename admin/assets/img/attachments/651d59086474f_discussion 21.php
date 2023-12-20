<?php 
    $page = 'Discussion';
    include('inc/header.php'); 
    $from_user = $_GET['dis_id'];
    $stid = $_GET['stid'];
    $post_id = $_GET['stid'];
    $msgid = $_GET['msgid'];
    $type = $_GET['type'];
    $to_user = $_GET['lgn'];
    $message_room = $obj->GetMessageByFromUser($from_user,$to_user);
    $st_change = $obj->UpdateMessageViewed($msgid);
    $proposaldata = $obj->GetProposalDataByPostId($post_id,$type);
   /* Wallet */ 
    $user_id=$_SESSION['Userid'];
    $credit_balance = $obj->getCreditedBalance($user_id);
    $debit_balance = $obj->getDebitedBalance($user_id);
    $balance = $credit_balance['credit']-$debit_balance['debit'];
    
    
    
     ?>
<?php include('inc/sidebar.php'); ?>     
 
<!--first tab row start-->
<!--window auto scroll down after refreshing the page or entre in page-->
<script>
    // Add this script at the end of your HTML body or in a <script> tag within the <head> section.
window.addEventListener('load', function() {
  // Scroll to the bottom of the page when the page finishes loading.
  window.scrollTo(0, document.body.scrollHeight);
});

</script>
 
<style>
/* Style for the chat container parent */
.parent {
    position: relative;
    display: flex;
    flex-direction: column;
    height: 100%; /* Set a height for the chat container parent */
    padding: 0 20px;
}

/* Style for the chat container */
#chatContainer {
    flex-grow: 1; /* Allow the chat container to grow and take available space */
    overflow-y: auto; /* Add vertical scrollbar when content overflows */
    padding-bottom: 75px; /* Add padding to accommodate the fixed input field */
}

/* Style for the fixed message input and send button */
.message-input {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-radius: 25px;
    padding: 0px;
}

.input-box {
    flex-grow: 1;
   
}
button#sendMessageButton {
    position: absolute;
    right: 0px;
    background: #2165f4;
    padding: 11px 24px;
    top: 0px;
    border-radius: 0 28px 28px 0px;
    color: #fff;
    border: none;
    padding: 11px 15px;
    cursor: pointer;
}
 

.chat-container {
    width: 100%;
    height: 350px;
    overflow-y: auto;
    max-height:100%;
}


  .chat-message {
    padding: 10px;
    border-bottom: 1px solid #ccc;
  }

  .input-box {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
  }

    .allchat.bg-white::-webkit-scrollbar{
  display:none;
}
.allchat.bg-white::-webkit-scrollbar-thumb {
  background: #e5e5e5; 
  border-radius: 10px;
  width:10px;
}
/*.allchat.bg-white {*/
/*    height: 300px;*/
/*    overflow-y: scroll;*/
/*}*/
.allchat.bg-white {
    /*height: 350px;*/
    /*overflow-y: scroll;*/
    bottom: 0;
    position: relative;
}
.search_msg_wrapper {
    background: #fff !important;
    padding: 10px;
    position: sticky;
    bottom: 0;
    overflow-y: auto;
}
.discuss-post_notification {
    padding: 0 20px;
}
 
/* .dd-button {*/
/*  display: inline-block;*/
/*  cursor: pointer;*/
/*  white-space: nowrap;*/
/*}*/

 

/*.dd-button:hover {*/
/*  background-color: #eeeeee;*/
/*}*/


/*.dd-input {*/
/*  display: none;*/
/*}*/

/*.dd-menu {*/
/*      position: absolute;*/
  /*top: 100%; */
/*  left: 0;*/
  /*z-index: 1; */
/*  border: 1px solid #ccc;*/
/*  border-radius: 4px;*/
/*  padding: 0;*/
/*  margin: 2px 0 0 0;*/
/*  box-shadow: 0 0 6px 0 rgba(0,0,0,0.1);*/
/*  background-color: #ffffff;*/
/*  list-style-type: none;*/
/*  transition: max-height 0.3s ease; */
/*}*/

/*.dd-input + .dd-menu {*/
/*  display: none;*/
/*} */
 

/*.dropdown-up .dd-menu {*/
  /*top: auto;**/
  /*bottom: 100%; **/
/*}*/
 
 
/*.dd-input:checked + .dd-menu {*/
/*  display: block;*/
/*} */

/*.dd-menu li {*/
/*  padding: 10px 20px;*/
/*  cursor: pointer;*/
/*  white-space: nowrap;*/
/*}*/
/*.dd-menu li a {*/
/*  display: block;*/
/*  margin: -10px -20px;*/
/*  padding: 10px 20px;*/
/*}*/

/* .dd-menu {*/
/*  position: absolute;*/
  /*top: 100%; */
/*  left: 0;*/
  /*z-index: 1; */
  
/*  overflow: hidden;*/
  /*transition: max-height 0.3s ease;*/
/*  animation-name: fadeIn;*/
  /*animation-duration: 0.5s; */
/*  animation-timing-function: ease-in-out;*/
  /*animation-fill-mode: forwards; */
  /*opacity: 0;*/
/*}*/

/*@keyframes fadeIn {*/
/*  from {*/
/*    opacity: 0;*/
/*  }*/
/*  to {*/
/*    opacity: 1;*/
/*  }*/
/*}*/

label.dropdown.dropdown-up {
    position: absolute;
    top: 12px;
    right: 73px;
    /* transform: rotate(223deg); */
}
@media (min-width:0) and (max-width:567px){
    .search_msg_wrapper {
    bottom: 80px !important;
    width: 100% !important;
    left:0 !important;
}
}
</style>
 

<div class="col-sm-12 instant-main">
    <div class="row">
        <div class="middle_container" id="myTabContent">
 
            <!----------------three dot menu mobila view START--------------------->
            <div class="dropdown">
                <div id="myDropdown" class="dropdown-content">
                    <a href="discussion-budget?id=<?=$signle_service['id'];?>">Start job</a>
                    <a href="#">Propose budget </a>
                    <a href="#">Attach files</a>
                    <a href="#">Send location</a>
                    <a href="#">Report job</a>
                    <a href="#">Block user</a>
                </div>
            </div>
            <!--------------------------three dot menu mobila view----------------------------------->
            <div class="main_contain_discuss">
                <div class="active_content" >
                        <h3 class="discussion_title">Discussion<b style="color: #ff0000;"></b></h3>
 
                    <?php 
                    if($type == 'service') {
                    $postid = $stid;
                    $post_data = $obj->GetServiceByPostId($postid);
                    $userid = $post_data['user_id'];
                    $postuser = $obj->GetUserById($userid);
                    $serviceid = 'service-'.$postid;
                    
                    $isGoogleImage = strpos($postuser['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
                    if ($isGoogleImage) {
                          $userimg = $postuser['ProfilePic'];
                     } else {
                          $userimg = 'admin/assets/img/profile/'.$postuser['ProfilePic'];
                    }
                    if($proposaldata['status'] == 1) { 
                        $shodwhide = 'block'; 
                        $shodwhide_p = 'none'; 
                    } else {
                        $shodwhide = 'none';    
                        $shodwhide_p = 'block';    
                    }
                      $price = $post_data['price'];
                      $formattedPrice = number_format($price, 0, '.', ',');
            
                    ?>
         <div class="bg-back discussion-sticky">
                    <!--<h3 class="discussion_title">Discussion<b style="color: #ff0000;"></b></h3>-->
                    <div class="img-p  discuss-post_notification m-0">
            <a href="#">
               <div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?=$post_data['photos'];?>" alt="">
               </div>
            </a>
             <div class="all-cnt">
                                <div class="inner">
                                    <a href="user-view.php?viewuserid=1">
                                        <div class="d-flex two-lb align-items-center job-listing-fl  ">
                                            <div class="title_img">
                                                <img class="sm-img" src="<?=$userimg;?>" alt="">
                                                <p class="pp mr-in"><?=$postuser["ProfileName"];?></p>
                                            </div>
                                        </div>
                                    </a>
                                  
                                </div>
                                       <div class="toogle-menus">
                     <div class=" col-md-2 p-0 post-menu-contain" id="myButtonDrop" onclick="ExtraMenu(<?php echo $post_data['id']; ?>)" data-id="<?=$post_data['id'];?>">
                        <svg class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                           <path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z"></path>
                        </svg>
                     <div id="<?=$post_data['id'];?>"  class="drop_msg_list post-msg-list">
                        <p class="p-1"><a class="font-weight-bold text-dark" onclick="ShortList(<?php echo $post_data['id']; ?>)" data-type="<?=$post_data['post_type'];?>">Shortlist</a></p>
                       <?php if($user_id == $post_data['user_id']) { ?>
                         <p class="p-1" style="display:<?=$shodwhide_p;?>;"><a class="font-weight-bold text-dark" href="propose-quote-budget?stid=<?=$stid;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$_GET['type'];?>&msgid=<?php echo $post_data['id']; ?>">Propose Quote</a></p>
                       <?php }else{ ?>
          
                      <?php } ?>
                        <p class="p-1" style="display:<?=$shodwhide;?>;"><a class="font-weight-bold text-dark" href="payment-release?id=<?=$stid;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$_GET['type'];?>">Payment Summary</a></p>
                         <p class="p-1"><a class="font-weight-bold text-dark" href="#">Hide User</a></p>
                        <p class="p-1"><a class="font-weight-bold text-dark" href="#">Report User</a></p>
                     </div>
                     </div>
                  </div>
                        
                                 <!--<a href="messageservice">-->
                                <p class="pp2" alt="<?=$post_data['topic'];?>"><?=$post_data['topic'];?> </p>
                                
                                <div class="d-flex justify-content-between align-items-center amount_wrap">
                                    <!--<div class="star">-->
                                    <!--    <i class="fa-solid fa-star"></i>-->
                                    <!--    <small>New Member</small>-->
                                    <!--</div>-->
                                    <div class="wrapper_cash_total">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z"></path>
                                        </svg>
                                        <!--<img class="cash-img" src="assets/img/cash.svg" >   -->
                                        <b style="color: green;">RM<?=$formattedPrice;?></b>
                                    </div>
                                </div>
                                <!--</a>-->
                                
                            </div>
         </div>
            </div>         
                   <?php } elseif($type == 'job') {
                   
                    $postid = $stid;
                    $post_data = $obj->GetJobByPostId($postid);
                    $userid = $post_data['user_id'];
                    $postuser = $obj->GetUserById($userid);
                          $isGoogleImage = strpos($postuser['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
            if ($isGoogleImage) {
                  $userimg = $postuser['ProfilePic'];
             } else {
                  $userimg = 'admin/assets/img/profile/'.$postuser['ProfilePic'];
            }
            
            if($proposaldata['status'] == 1) { 
                        $shodwhide = 'block'; 
                        $shodwhide_p = 'none'; 
                    } else {
                        $shodwhide = 'none';    
                        $shodwhide_p = 'block';    
                    }
                      $price = $post_data['price'];
                      $formattedPrice = number_format($price, 0, '.', ',');
                   ?>
                   
                    <div class="img-p img-discuss  m-0" style="">
            <a href="#">
               <div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?=$post_data['photos'];?>" alt="">
               </div>
            </a>
             <div class="all-cnt">
                                <div class="inner">
                                    <a href="user-view.php?viewuserid=1">
                                        <div class="d-flex two-lb align-items-center job-listing-fl  ">
                                            <div class="title_img">
                                                    <img class="sm-img" src="<?=$userimg;?>" alt="">
                                                    <p class="pp mr-in"><?=$postuser["ProfileName"];?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                  <div class="toogle-menus">
                     <div class=" col-md-2 p-0 post-menu-contain" id="myButtonDrop" onclick="ExtraMenu(<?php echo $post_data['id']; ?>)" data-id="<?=$post_data['id'];?>">
                        <svg class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                           <path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z"></path>
                        </svg>
                     <div id="<?=$post_data['id'];?>"  class="drop_msg_list post-msg-list">
                        <p class="p-1"><a class="font-weight-bold text-dark" onclick="ShortList(<?php echo $post_data['id']; ?>)" data-type="<?=$post_data['post_type'];?>">Shortlist</a></p>
                       <?php if($user_id != $post_data['user_id']) { ?>
                                                <p class="p-1" style="display:<?=$shodwhide_p;?>;"><a class="font-weight-bold text-dark" href="propose-quote-budget?stid=<?=$stid;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$_GET['type'];?>&msgid=<?php echo $post_data['id']; ?>">Propose Quote</a></p>

                        <!--<p class="p-1"><a class="font-weight-bold text-dark" href="payment-release?id=<?=$stid;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$_GET['type'];?>">Payment Summary</a></p>-->
                         <!--<p class="p-1"><a class="font-weight-bold text-dark" href="propose-quote-budget?stid=<?=$stid;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$_GET['type'];?>&msgid=<?php echo $post_data['id']; ?>">Propose Quote</a></p>-->
                       <?php }else {?>
                                               <!--<p class="p-1"><a class="font-weight-bold text-dark" href="payment-release?id=<?=$stid;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$_GET['type'];?>">Payment Summary</a></p>-->

                       
                       <?php } ?>
                                               <p class="p-1" style="display:<?=$shodwhide;?>;"><a class="font-weight-bold text-dark" href="payment-release?id=<?=$stid;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$_GET['type'];?>">Payment Summary</a></p>

                        <p class="p-1"><a class="font-weight-bold text-dark" href="#">Hide User</a></p>
                        <p class="p-1"><a class="font-weight-bold text-dark" href="#">Report User</a></p>
                     </div>
                     </div>
                  </div>
                                 <!--<a href="messagejob">-->
                                <p class="pp2" alt="<?=$post_data['topic'];?>"><?=$post_data['topic'];?> </p>
                                
                                <div class="d-flex justify-content-between align-items-center amount_wrap">
                                    <!--<div class="star">-->
                                    <!--    <i class="fa-solid fa-star"></i>-->
                                    <!--    <small>New Member</small>-->
                                    <!--</div>-->
                                    <div class="wrapper_cash_total">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z"></path>
                                        </svg>
                                        <!--<img class="cash-img" src="assets/img/cash.svg" >   -->
                                        <b style="color: green;">RM<?=$formattedPrice;?></b>
                                    </div>
                                </div>
                                <!--</a>-->
                                
                            </div>
                      </div>
                    <?php }else{} ?>
                    
 
                    <div style="background: #fff; " class="parent" >
                    <div class="allchat bg-white receiver-sender-chat-wrap   chat-container"  id="chatContainer"></div>

                   </div>
                    <form style="  background: #fff;" method="post" id="sendmessage" enctype="multipart/form-data" class="position-relative">
                         <div class="search_inp">
                            <input type="hidden" id="sender_id" name="sender" class="form-control" value="<?=$_SESSION['Userid'];?>">
                            <input type="hidden" id="reciever_id" name="reciever" class="form-control" value="<?=$from_user;?>">
                            <input type="hidden" id="posttype" name="posttype" class="form-control" value="<?=$_GET['type'];?>">
                            <input type="hidden" id="postid" name="post_id" class="form-control" value="<?=$stid;?>">
                            <input type="hidden" id="postid" name="message_type" class="form-control" value="">

                            <!--<input type="hidden" id="postid" name="post_id" class="form-control" value="<?//=$_GET['dis_id'];?>">-->
                             <!-- File input field for image upload -->
 

                             <div class="position-relative message-input">
              <!--<input type="file" name="image_file" id="image_file">-->
                                   <input placeholder="Say something...." style="width: 100%;border-radius: 25px;" id="message" name="message" class="input-box search_msg_wrapper">
                               <button onclick="sendMessage()" id="sendMessageButton">Send</button>
                            </div>
                         </div>
<label class="dropdown dropdown-up">

  <div class="dd-button">
    <svg style="cursor:pointer;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path fill="currentColor" d="M16.5,6V17.5A4,4 0 0,1 12.5,21.5A4,4 0 0,1 8.5,17.5V5A2.5,2.5 0 0,1 11,2.5A2.5,2.5 0 0,1 13.5,5V15.5A1,1 0 0,1 12.5,16.5A1,1 0 0,1 11.5,15.5V6H10V15.5A2.5,2.5 0 0,0 12.5,18A2.5,2.5 0 0,0 15,15.5V5A4,4 0 0,0 11,1A4,4 0 0,0 7,5V17.5A5.5,5.5 0 0,0 12.5,23A5.5,5.5 0 0,0 18,17.5V6H16.5Z" />
    </svg>
  </div>

  <input type="file" class="dd-input" id="fileInput" style="display:none;">

  <!--<ul class="dd-menu">-->
  <!--  <li>Action</li>-->
  <!--  <li>Another action</li>-->
  <!--  <li>Something else here</li>-->
  <!--  <li class="divider"></li>-->
  <!--  <li>-->
  <!--    <a href="http://rane.io">Link to Rane.io</a>-->
  <!--  </li>-->
  <!--</ul>-->
  
</label>
                    </form>
                     
                </div>
                
              <!-- Button to trigger the modal -->
 

<!-- Modal -->
<!--<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--  <div class="modal-dialog">-->
<!--    <div class="modal-content">-->
       
<!--      <div class="modal-body">-->
<!--          <h3><\\?=$balance;?></h3>-->
<!--        <p>You have insufficient balance in your wallet.</p>-->
        
<!--        <p>Please add balance to your wallet before starting the work.</p>-->
<!--      </div>-->
<!--      <div class="modal-footer">-->
<!--        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
<!--        <a href="wallet"><button type="button" class="btn btn-primary">Go to Wallet</button></a>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
 

<!-- Modal for Insufficient Balance-->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      
            <div class="modal-body">
        <!--                     <?php //$servicetax = $proposaldata['price']*10/100;?> -->
        <!--                     <?php //$ssttax = $proposaldata['price']*6/100;?> -->
        <!--<h3>Amount : RM<?//=$total = $servicetax + $proposaldata['price'] + $ssttax;?><?//=$balance;?></h3>
        <!--<p>Service Fee : RM<?//=$servicetax;?></p>-->
        <!--<p>6% SST : RM<?//=$ssttax;?></p>-->
       <!-- <p class="exclamation">
         <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M12 20C7.59 20 4 16.41 4 12S7.59 4 12 4 20 7.59 20 12 16.41 20 12 20M16.59 7.58L10 14.17L7.41 11.59L6 13L10 17L18 9L16.59 7.58Z" />
                    </svg> 
        </p>-->
        
        <p class="mt-2"> Are you ready to start work and proceed?</p>
      </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="summary-payment?id=<?=$stid;?>&price=<?=$proposaldata['price'];?>&lgn=<?=$to_user;?>&type=<?=$type;?>&dis_id=<?=$from_user;?>&s=yes"><button type="button" class="btn btn-primary btn-go-wallet m-0 text-white">Proceed</button></a>
      </div>
      
       
      <!--<div class="modal-footer">-->
      <!--  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
      <!--  <a href="wallet"><button type="button" class="btn btn-primary btn-go-wallet m-0 text-white">Go to Wallet</button></a>-->
      <!--</div>-->
    </div>
  </div>
</div>
<!--Model for confirmation-->
<div class="modal fade" id="myModalConfirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--                     <?php //$servicetax = $proposaldata['price']*10/100;?> -->
        <!--                     <?php //$ssttax = $proposaldata['price']*6/100;?> -->
        <!--<h3>Amount : RM<?//=$total = $servicetax + $proposaldata['price'] + $ssttax;?><?//=$balance;?></h3>
        <!--<p>Service Fee : RM<?//=$servicetax;?></p>-->
        <!--<p>6% SST : RM<?//=$ssttax;?></p>-->
       <!-- <p class="exclamation">
         <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M12 20C7.59 20 4 16.41 4 12S7.59 4 12 4 20 7.59 20 12 16.41 20 12 20M16.59 7.58L10 14.17L7.41 11.59L6 13L10 17L18 9L16.59 7.58Z" />
                    </svg> 
        </p>-->
        
        <p class="mt-2"> Are you ready to start work and proceed?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="summary-payment?id=<?=$stid;?>&price=<?=$proposaldata['price'];?>&lgn=<?=$to_user;?>&type=<?=$type;?>&dis_id=<?=$from_user;?>&s=yes"><button type="button" class="btn btn-primary btn-go-wallet m-0 text-white">Proceed</button></a>
      </div>
    </div>
  </div>
</div>


<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->

            </div>
            <!-- -------------------hidden content of discussion------------------->
        </div>
<!-- Bootstrap CSS file -->
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">-->

<!-- Bootstrap JavaScript files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


 <?php include('inc/footer.php'); ?>
 
<script>
   $(document).ready(function(){
 
    // updating the view with notifications using ajax
function load_userchat_notification(view = '')
{
    var reciever = <?=$_GET['dis_id'];?>;
    var sender = <?=$_GET['lgn'];?>;
    var post_id = '<?=$postid;?>';
     var ptype = '<?=$_GET['type'];?>';
   
    
 $.ajax({
  url:"admin/inc/process.php?action=GetUserChat",
  method:"POST",
  data:{view:view,reciever:reciever,sender:sender,post_id:post_id,post_type:ptype},
  dataType:"json",
  success:function(data)
  {
  $('.allchat').html(data.notification);
 
  }
 });
}

load_userchat_notification();  

setTimeout(function() {load_userchat_notification();}, 1800);
//   setTimeout(function() {
//         location.reload();
//     }, 1800);
// submit form and get new records

function send_message() {
  var form_data = $('#sendmessage').serialize();

  $.ajax({
    url: "admin/inc/process.php?action=SendMessage",
    method: "POST",
    data: form_data,
    success: function(data) {
      $('#sendmessage')[0].reset();
      load_userchat_notification();

      // Scroll to the latest message
      var chatContainer = $(".chat-container");
      chatContainer.scrollTop(chatContainer.prop("scrollHeight"));
    }
  });
}



// function send_message() {
//     var form_data = $('#sendmessage').serialize();

//     $.ajax({
//       url: "admin/inc/process.php?action=SendMessage",
//       method: "POST",
//       data: form_data,
//       success: function(data) {
//         $('#sendmessage')[0].reset();
//         load_userchat_notification();
//       }
//     });
//   }
 $('#sendmessage').on('submit', function(event) {
    event.preventDefault();

    if ($('#sender_id').val() != '' && $('#reciever_id').val() != '' && $('#message').val() != '') {
      send_message();
    } else {
      alert("Both fields are required");
    }
  });

  // Periodically check for new messages
  setInterval(function() {
    load_userchat_notification();
  }, 30000000); // Adjust the interval time as needed
});
 
</script>
<script>
    //  drop down js of (message page)
function toggleDropdownMsgg() {
  var dropdownew = document.getElementById("myDropdownDrop");
  dropdownew.classList.toggle("shown");
}

window.onclick = function(event) {
  if (!event.target.matches('#myButtonDrop')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('shown')) {
        openDropdown.classList.remove('shown');
      }
    }
  }
}
</script>
<script>
    //  drop down js of (message page)
    
    
function toggleDropdownMsgs() {
  var dropdownews = document.getElementById("myDropdownDropp");
  dropdownews.classList.toggle("shown");
}

window.onclick = function(event) {
  if (!event.target.matches('#myButtonDrop')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('shown')) {
        openDropdown.classList.remove('shown');
      }
    }
  }
}






    function ExtraMenu(post_id) {
        // var post_id = $(this).data('id');
        
      document.getElementById(post_id).classList.toggle("show");
    }
 
    
    
    
    
    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
            //   var $this = $(this);
    // var $dropdown = $this.next('.dropdown-contentt');

    // Close all other dropdowns
    // $('.dropdown-contentt').not($dropdown).slideUp();
    // $dropdown.slideToggle();
      if (!event.target.matches('.dropbtn')) {
    
        var dropdowns = document.getElementsByClassName("drop_msg_list");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
//  }
   
    
function toggleDropdownnnn() {
        var dropdownContentt = document.querySelector(".drop_msg_list");
        dropdownContentt.classList.toggle("show-dropdown");
      }
      
      

      function ShortList(post_id) {
    
    var button = document.getElementById('delete');
    // get the value of the data-type attribute
    var postType = button.getAttribute('data-type');
  

    if (confirm("Are you sure you want to delete this? \nThere's no way of recovering it.")) {
        window.location.href = "admin/inc/process.php?deleteservice=" + post_id + "&type=" + postType;
    }
}

      
</script>

<?php 
    $page = 'Discussion';
    include('inc/header.php'); 
    $from_user = $_GET['dis_id'];
    $stid = $_GET['stid'];
    $post_id = $_GET['stid'];
    $msgid = $_GET['msgid'];
    $type = $_GET['type'];
    $to_user = $_GET['lgn'];
    $message_room = $obj->GetMessageByFromUser($from_user,$to_user);
    $st_change = $obj->UpdateMessageViewed($msgid);
    $proposaldata = $obj->GetProposalDataByPostId($post_id,$type);
   /* Wallet */ 
    $user_id=$_SESSION['Userid'];
    $credit_balance = $obj->getCreditedBalance($user_id);
    $debit_balance = $obj->getDebitedBalance($user_id);
    $balance = $credit_balance['credit']-$debit_balance['debit'];
    
    
    
     ?>
<?php include('inc/sidebar.php'); ?>     
<!--first tab row start-->

<style>


 /* CSS for the chat container */
        .chat-container {
            width: 100%;
            height: 600px;
            /*border: 1px solid #ccc;*/
            overflow-y: scroll;
        }

        /* CSS for individual chat messages */
        .chat-message {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        /* CSS for the input box */
        .input-box {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

    .allchat.bg-white::-webkit-scrollbar{
  width:10px;
}
.allchat.bg-white::-webkit-scrollbar-thumb {
  background: #e5e5e5; 
  border-radius: 10px;
  width:10px;
}
/*.allchat.bg-white {*/
/*    height: 300px;*/
/*    overflow-y: scroll;*/
/*}*/
.allchat.bg-white {
    /*height: 350px;*/
    /*overflow-y: scroll;*/
    bottom: 0;
    position: relative;
}
.search_msg_wrapper {
    background: #fff !important;
    padding: 10px;
    position: sticky;
    bottom: 0;
    overflow-y: auto;
}
.discuss-post_notification {
    padding: 0 20px;
}
 
 
  
@media (min-width:0) and (max-width:567px){
    .search_msg_wrapper {
    bottom: 80px !important;
    width: 100% !important;
    left:0 !important;
}
}
</style>
 
<div class="col-sm-12 instant-main">
    <div class="row">
        <div class="middle_container" id="myTabContent">
 
            <!----------------three dot menu mobila view START--------------------->
            <div class="dropdown">
                <div id="myDropdown" class="dropdown-content">
                    <a href="discussion-budget?id=<?=$signle_service['id'];?>">Start job</a>
                    <a href="#">Propose budget </a>
                    <a href="#">Attach files</a>
                    <a href="#">Send location</a>
                    <a href="#">Report job</a>
                    <a href="#">Block user</a>
                </div>
            </div>
            <!--------------------------three dot menu mobila view----------------------------------->
            <div class="main_contain_discuss">
                <div class="active_content">
                        <h3 class="discussion_title">Discussion<b style="color: #ff0000;"></b></h3>
 
                    <?php 
                    if($type == 'service') {
                    $postid = $stid;
                    $post_data = $obj->GetServiceByPostId($postid);
                    $userid = $post_data['user_id'];
                    $postuser = $obj->GetUserById($userid);
                    $serviceid = 'service-'.$postid;
                    
                    $isGoogleImage = strpos($postuser['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
                    if ($isGoogleImage) {
                          $userimg = $postuser['ProfilePic'];
                     } else {
                          $userimg = 'admin/assets/img/profile/'.$postuser['ProfilePic'];
                    }
                    if($proposaldata['status'] == 1) { 
                        $shodwhide = 'block'; 
                        $shodwhide_p = 'none'; 
                    } else {
                        $shodwhide = 'none';    
                        $shodwhide_p = 'block';    
                    }
                      $price = $post_data['price'];
                      $formattedPrice = number_format($price, 0, '.', ',');
            
                    ?>
         <div class="bg-back discussion-sticky">
                    <!--<h3 class="discussion_title">Discussion<b style="color: #ff0000;"></b></h3>-->
                    <div class="img-p  discuss-post_notification m-0">
            <a href="#">
               <div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?=$post_data['photos'];?>" alt="">
               </div>
            </a>
             <div class="all-cnt">
                                <div class="inner">
                                    <a href="user-view.php?viewuserid=1">
                                        <div class="d-flex two-lb align-items-center job-listing-fl  ">
                                            <div class="title_img">
                                                <img class="sm-img" src="<?=$userimg;?>" alt="">
                                                <p class="pp mr-in"><?=$postuser["ProfileName"];?></p>
                                            </div>
                                        </div>
                                    </a>
                                  
                                </div>
                                       <div class="toogle-menus">
                     <div class=" col-md-2 p-0 post-menu-contain" id="myButtonDrop" onclick="ExtraMenu(<?php echo $post_data['id']; ?>)" data-id="<?=$post_data['id'];?>">
                        <svg class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                           <path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z"></path>
                        </svg>
                     <div id="<?=$post_data['id'];?>"  class="drop_msg_list post-msg-list">
                        <p class="p-1"><a class="font-weight-bold text-dark" onclick="ShortList(<?php echo $post_data['id']; ?>)" data-type="<?=$post_data['post_type'];?>">Shortlist</a></p>
                       <?php if($user_id == $post_data['user_id']) { ?>
                         <p class="p-1" style="display:<?=$shodwhide_p;?>;"><a class="font-weight-bold text-dark" href="propose-quote-budget?stid=<?=$stid;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$_GET['type'];?>&msgid=<?php echo $post_data['id']; ?>">Propose Quote</a></p>
                       <?php }else{ ?>
          
                      <?php } ?>
                        <p class="p-1" style="display:<?=$shodwhide;?>;"><a class="font-weight-bold text-dark" href="payment-release?id=<?=$stid;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$_GET['type'];?>">Payment Summary</a></p>
                         <p class="p-1"><a class="font-weight-bold text-dark" href="#">Hide User</a></p>
                        <p class="p-1"><a class="font-weight-bold text-dark" href="#">Report User</a></p>
                     </div>
                     </div>
                  </div>
                        
                                 <!--<a href="messageservice">-->
                                <p class="pp2" alt="<?=$post_data['topic'];?>"><?=$post_data['topic'];?> </p>
                                
                                <div class="d-flex justify-content-between align-items-center amount_wrap">
                                    <!--<div class="star">-->
                                    <!--    <i class="fa-solid fa-star"></i>-->
                                    <!--    <small>New Member</small>-->
                                    <!--</div>-->
                                    <div class="wrapper_cash_total">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z"></path>
                                        </svg>
                                        <!--<img class="cash-img" src="assets/img/cash.svg" >   -->
                                        <b style="color: green;">RM<?=$formattedPrice;?></b>
                                    </div>
                                </div>
                                <!--</a>-->
                                
                            </div>
         </div>
            </div>         
                   <?php } elseif($type == 'job') {
                   
                    $postid = $stid;
                    $post_data = $obj->GetJobByPostId($postid);
                    $userid = $post_data['user_id'];
                    $postuser = $obj->GetUserById($userid);
                          $isGoogleImage = strpos($postuser['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
            if ($isGoogleImage) {
                  $userimg = $postuser['ProfilePic'];
             } else {
                  $userimg = 'admin/assets/img/profile/'.$postuser['ProfilePic'];
            }
            
            if($proposaldata['status'] == 1) { 
                        $shodwhide = 'block'; 
                        $shodwhide_p = 'none'; 
                    } else {
                        $shodwhide = 'none';    
                        $shodwhide_p = 'block';    
                    }
                      $price = $post_data['price'];
                      $formattedPrice = number_format($price, 0, '.', ',');
                   ?>
                   
                    <div class="img-p img-discuss  m-0" style="">
            <a href="#">
               <div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?=$post_data['photos'];?>" alt="">
               </div>
            </a>
             <div class="all-cnt">
                                <div class="inner">
                                    <a href="user-view.php?viewuserid=1">
                                        <div class="d-flex two-lb align-items-center job-listing-fl  ">
                                            <div class="title_img">
                                                    <img class="sm-img" src="<?=$userimg;?>" alt="">
                                                    <p class="pp mr-in"><?=$postuser["ProfileName"];?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                  <div class="toogle-menus">
                     <div class=" col-md-2 p-0 post-menu-contain" id="myButtonDrop" onclick="ExtraMenu(<?php echo $post_data['id']; ?>)" data-id="<?=$post_data['id'];?>">
                        <svg class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                           <path fill="currentColor" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z"></path>
                        </svg>
                     <div id="<?=$post_data['id'];?>"  class="drop_msg_list post-msg-list">
                        <p class="p-1"><a class="font-weight-bold text-dark" onclick="ShortList(<?php echo $post_data['id']; ?>)" data-type="<?=$post_data['post_type'];?>">Shortlist</a></p>
                       <?php if($user_id != $post_data['user_id']) { ?>
                                                <p class="p-1" style="display:<?=$shodwhide_p;?>;"><a class="font-weight-bold text-dark" href="propose-quote-budget?stid=<?=$stid;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$_GET['type'];?>&msgid=<?php echo $post_data['id']; ?>">Propose Quote</a></p>

                        <!--<p class="p-1"><a class="font-weight-bold text-dark" href="payment-release?id=<?=$stid;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$_GET['type'];?>">Payment Summary</a></p>-->
                         <!--<p class="p-1"><a class="font-weight-bold text-dark" href="propose-quote-budget?stid=<?=$stid;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$_GET['type'];?>&msgid=<?php echo $post_data['id']; ?>">Propose Quote</a></p>-->
                       <?php }else {?>
                                               <!--<p class="p-1"><a class="font-weight-bold text-dark" href="payment-release?id=<?=$stid;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$_GET['type'];?>">Payment Summary</a></p>-->

                       
                       <?php } ?>
                                               <p class="p-1" style="display:<?=$shodwhide;?>;"><a class="font-weight-bold text-dark" href="payment-release?id=<?=$stid;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$_GET['type'];?>">Payment Summary</a></p>

                        <p class="p-1"><a class="font-weight-bold text-dark" href="#">Hide User</a></p>
                        <p class="p-1"><a class="font-weight-bold text-dark" href="#">Report User</a></p>
                     </div>
                     </div>
                  </div>
                                 <!--<a href="messagejob">-->
                                <p class="pp2" alt="<?=$post_data['topic'];?>"><?=$post_data['topic'];?> </p>
                                
                                <div class="d-flex justify-content-between align-items-center amount_wrap">
                                    <!--<div class="star">-->
                                    <!--    <i class="fa-solid fa-star"></i>-->
                                    <!--    <small>New Member</small>-->
                                    <!--</div>-->
                                    <div class="wrapper_cash_total">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z"></path>
                                        </svg>
                                        <!--<img class="cash-img" src="assets/img/cash.svg" >   -->
                                        <b style="color: green;">RM<?=$formattedPrice;?></b>
                                    </div>
                                </div>
                                <!--</a>-->
                                
                            </div>
                      </div>
                    <?php }else{} ?>

                    <div style="background: #fff; chat-container">
                    <div class="allchat bg-white receiver-sender-chat-wrap " id="chatContainer" style="height: 300px; overflow-y: scroll;"></div>

                    </div>
                    <form style="  background: #fff;" method="post" id="sendmessage" enctype="multipart/form-data">
                         <div class="search_inp">
                            <input type="hidden" id="sender_id" name="sender" class="form-control" value="<?=$_SESSION['Userid'];?>">
                            <input type="hidden" id="reciever_id" name="reciever" class="form-control" value="<?=$from_user;?>">
                            <input type="hidden" id="posttype" name="posttype" class="form-control" value="<?=$_GET['type'];?>">
                            <input type="hidden" id="postid" name="post_id" class="form-control" value="<?=$stid;?>">
                            <input type="hidden" id="postid" name="message_type" class="form-control" value="">

                            <!--<input type="hidden" id="postid" name="post_id" class="form-control" value="<?//=$_GET['dis_id'];?>">-->
                             <!-- File input field for image upload -->
                             <div class="position-relative">
                                <!--<input type="file" name="image_file" id="image_file">-->

                                   <input placeholder="Say something...." style="width: 100%;border-radius: 25px;" id="message" name="message" class="input-box search_msg_wrapper">
                               <button onclick="sendMessage()" id="sendMessageButton">Send</button>
                            </div>
                         </div>
                    </form>

                </div>

              <!-- Button to trigger the modal -->
 

<!-- Modal -->
<!--<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--  <div class="modal-dialog">-->
<!--    <div class="modal-content">-->
       
<!--      <div class="modal-body">-->
<!--          <h3><\\?=$balance;?></h3>-->
<!--        <p>You have insufficient balance in your wallet.</p>-->
        
<!--        <p>Please add balance to your wallet before starting the work.</p>-->
<!--      </div>-->
<!--      <div class="modal-footer">-->
<!--        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
<!--        <a href="wallet"><button type="button" class="btn btn-primary">Go to Wallet</button></a>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
 

<!-- Modal for Insufficient Balance-->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      
            <div class="modal-body">
        <!--                     <?php //$servicetax = $proposaldata['price']*10/100;?> -->
        <!--                     <?php //$ssttax = $proposaldata['price']*6/100;?> -->
        <!--<h3>Amount : RM<?//=$total = $servicetax + $proposaldata['price'] + $ssttax;?><?//=$balance;?></h3>
        <!--<p>Service Fee : RM<?//=$servicetax;?></p>-->
        <!--<p>6% SST : RM<?//=$ssttax;?></p>-->
       <!-- <p class="exclamation">
         <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M12 20C7.59 20 4 16.41 4 12S7.59 4 12 4 20 7.59 20 12 16.41 20 12 20M16.59 7.58L10 14.17L7.41 11.59L6 13L10 17L18 9L16.59 7.58Z" />
                    </svg> 
        </p>-->
        
        <p class="mt-2"> Are you ready to start work and proceed?</p>
      </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="summary-payment?id=<?=$stid;?>&price=<?=$proposaldata['price'];?>&lgn=<?=$to_user;?>&type=<?=$type;?>&dis_id=<?=$from_user;?>&s=yes"><button type="button" class="btn btn-primary btn-go-wallet m-0 text-white">Proceed</button></a>
      </div>
      
       
      <!--<div class="modal-footer">-->
      <!--  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
      <!--  <a href="wallet"><button type="button" class="btn btn-primary btn-go-wallet m-0 text-white">Go to Wallet</button></a>-->
      <!--</div>-->
    </div>
  </div>
</div>
<!--Model for confirmation-->
<div class="modal fade" id="myModalConfirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--                     <?php //$servicetax = $proposaldata['price']*10/100;?> -->
        <!--                     <?php //$ssttax = $proposaldata['price']*6/100;?> -->
        <!--<h3>Amount : RM<?//=$total = $servicetax + $proposaldata['price'] + $ssttax;?><?//=$balance;?></h3>
        <!--<p>Service Fee : RM<?//=$servicetax;?></p>-->
        <!--<p>6% SST : RM<?//=$ssttax;?></p>-->
       <!-- <p class="exclamation">
         <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M12 20C7.59 20 4 16.41 4 12S7.59 4 12 4 20 7.59 20 12 16.41 20 12 20M16.59 7.58L10 14.17L7.41 11.59L6 13L10 17L18 9L16.59 7.58Z" />
                    </svg> 
        </p>-->
        
        <p class="mt-2"> Are you ready to start work and proceed?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="summary-payment?id=<?=$stid;?>&price=<?=$proposaldata['price'];?>&lgn=<?=$to_user;?>&type=<?=$type;?>&dis_id=<?=$from_user;?>&s=yes"><button type="button" class="btn btn-primary btn-go-wallet m-0 text-white">Proceed</button></a>
      </div>
    </div>
  </div>
</div>


<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->

            </div>
            <!-- -------------------hidden content of discussion------------------->
        </div>
<!-- Bootstrap CSS file -->
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">-->

<!-- Bootstrap JavaScript files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


 <?php include('inc/footer.php'); ?>
 
<script>
   $(document).ready(function(){
 
    // updating the view with notifications using ajax
function load_userchat_notification(view = '')
{
    var reciever = <?=$_GET['dis_id'];?>;
    var sender = <?=$_GET['lgn'];?>;
    var post_id = '<?=$postid;?>';
     var ptype = '<?=$_GET['type'];?>';
   
    
 $.ajax({
  url:"admin/inc/process.php?action=GetUserChat",
  method:"POST",
  data:{view:view,reciever:reciever,sender:sender,post_id:post_id,post_type:ptype},
  dataType:"json",
  success:function(data)
  {
  $('.allchat').html(data.notification);
 
  }
 });
}

load_userchat_notification();  

setTimeout(function() {load_userchat_notification();}, 1800);
//   setTimeout(function() {
//         location.reload();
//     }, 1800);
// submit form and get new records

function send_message() {
  var form_data = $('#sendmessage').serialize();

  $.ajax({
    url: "admin/inc/process.php?action=SendMessage",
    method: "POST",
    data: form_data,
    success: function(data) {
      $('#sendmessage')[0].reset();
      load_userchat_notification();

      // Scroll to the latest message
      var chatContainer = $(".chat-container");
      chatContainer.scrollTop(chatContainer.prop("scrollHeight"));
    }
  });
}



// function send_message() {
//     var form_data = $('#sendmessage').serialize();

//     $.ajax({
//       url: "admin/inc/process.php?action=SendMessage",
//       method: "POST",
//       data: form_data,
//       success: function(data) {
//         $('#sendmessage')[0].reset();
//         load_userchat_notification();
//       }
//     });
//   }
 $('#sendmessage').on('submit', function(event) {
    event.preventDefault();

    if ($('#sender_id').val() != '' && $('#reciever_id').val() != '' && $('#message').val() != '') {
      send_message();
    } else {
      alert("Both fields are required");
    }
  });

  // Periodically check for new messages
  setInterval(function() {
    load_userchat_notification();
  }, 3000); // Adjust the interval time as needed
});
 
</script>
<script>
    //  drop down js of (message page)
function toggleDropdownMsgg() {
  var dropdownew = document.getElementById("myDropdownDrop");
  dropdownew.classList.toggle("shown");
}

window.onclick = function(event) {
  if (!event.target.matches('#myButtonDrop')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('shown')) {
        openDropdown.classList.remove('shown');
      }
    }
  }
}
</script>
<script>
    //  drop down js of (message page)
    
    
function toggleDropdownMsgs() {
  var dropdownews = document.getElementById("myDropdownDropp");
  dropdownews.classList.toggle("shown");
}

window.onclick = function(event) {
  if (!event.target.matches('#myButtonDrop')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('shown')) {
        openDropdown.classList.remove('shown');
      }
    }
  }
}






    function ExtraMenu(post_id) {
        // var post_id = $(this).data('id');
        
      document.getElementById(post_id).classList.toggle("show");
    }
 
    
    
    
    
    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
            //   var $this = $(this);
    // var $dropdown = $this.next('.dropdown-contentt');

    // Close all other dropdowns
    // $('.dropdown-contentt').not($dropdown).slideUp();
    // $dropdown.slideToggle();
      if (!event.target.matches('.dropbtn')) {
    
        var dropdowns = document.getElementsByClassName("drop_msg_list");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
//  }
   
    
function toggleDropdownnnn() {
        var dropdownContentt = document.querySelector(".drop_msg_list");
        dropdownContentt.classList.toggle("show-dropdown");
      }
      
      

      function ShortList(post_id) {
    
    var button = document.getElementById('delete');
    // get the value of the data-type attribute
    var postType = button.getAttribute('data-type');
  

    if (confirm("Are you sure you want to delete this? \nThere's no way of recovering it.")) {
        window.location.href = "admin/inc/process.php?deleteservice=" + post_id + "&type=" + postType;
    }
}

      
</script>

<script>
  var chatContainer = document.querySelector('.chat-container');

  // Function to send a message
  function sendMessage() {
    var userMessage = document.getElementById('message').value;
 
    if (userMessage.trim() !== '') {
      var userDiv = document.createElement('div');
      userDiv.className = 'chat-message';
      userDiv.innerText = 'User: ' + userMessage;

      // Insert the new message at the beginning of the chat container
      chatContainer.insertBefore(userDiv, chatContainer.firstChild);

      // Clear the input field
      document.getElementById('message').value = '';
    }
  }

  // Call sendMessage() when the page loads or refreshes
  window.addEventListener('load', sendMessage);
</script>

<!--CHAT AUTO GOES UP WHEN LATEST MESSAGE COME-->
//   <script>
//         const ddInput = document.querySelector('.dd-input');
//         const ddButton = document.querySelector('.dd-button');
//         const ddMenu = document.querySelector('.dd-menu');

//         // Toggle the menu when clicking the button
//         ddButton.addEventListener('click', () => {
//             ddInput.checked = !ddInput.checked;
//         });

//         // Close the menu when clicking anywhere outside of it
//         document.addEventListener('click', (event) => {
//             if (event.target !== ddButton && event.target !== ddMenu) {
//                 ddInput.checked = false;
//             }
//         });

//         // Prevent clicks inside the menu from closing it
//         ddMenu.addEventListener('click', (event) => {
//             event.stopPropagation();
//         });
//     </script>
 
 


