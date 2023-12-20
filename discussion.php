<?php 
    include('auth.php'); 
    $page = 'Discussion';
    include('inc/header.php'); 
   $from_user = filter_input(INPUT_GET, 'dis_id', FILTER_SANITIZE_NUMBER_INT);
$stid = filter_input(INPUT_GET, 'stid', FILTER_SANITIZE_NUMBER_INT);
$post_id = filter_input(INPUT_GET, 'stid', FILTER_SANITIZE_NUMBER_INT);
$msgid = filter_input(INPUT_GET, 'msgid', FILTER_SANITIZE_NUMBER_INT);
$type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);
$to_user = filter_input(INPUT_GET, 'lgn', FILTER_SANITIZE_NUMBER_INT);

    $message_room = $obj->GetMessageByFromUser($from_user,$to_user);
    $st_change = $obj->UpdateMessageViewed($msgid);
    $proposaldata = $obj->GetProposalDataByPostId($post_id,$type);
   /* Wallet */ 
   if (isset($_SESSION['Userid'])) {
    $user_id=$_SESSION['Userid'];
   
   } else {
        // Handle case where payment plan is not found
        $user_id='';
    }
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
    flex-grow: 1; 
    overflow-y: auto;
    padding-bottom: 75px;
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
.allchat.bg-white {
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
 .progress {
    height: 20px;
    margin-top: 10px;
    overflow: hidden;
    background-color: #fff;
    border-radius: 5px;
}

.progress-bar {
    width: 0;
    height: 100%;
    background-color: #3498db;
    text-align: center;
    line-height: 20px;
    color: white;
}
#progressBar {
    /* Your other styles here */
    transition: width 10s ease;
}

label.dropdown.dropdown-up {
    position: absolute;
    top: 12px;
    right: 73px;
    z-index:9999;
}
@media (min-width:0) and (max-width:567px){
    .search_msg_wrapper {
    bottom: 80px !important;
    width: 100% !important;
    left:0 !important;
}
.drag-drop-label {
    font-size: 12px !important;
}
}

.attachment-area {
    display: none;
    background-color: #f3f3f3;
    border: 2px dashed #dddddd;
    padding: 20px;
    text-align: center;
    position: absolute;
    top: -5rem;
    right: 0rem;
    width: 100%;
    z-index: 1;
}

        .drag-drop-label {
            font-size: 18px;
        }

        .file-input {
            display: none !important;
        }

        .upload-icon {
            cursor: pointer;
        }

        #fileInfo {
            margin-top: 10px;
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
                         <p class="p-1" style="display:<?=$shodwhide_p;?>;"><a class="font-weight-bold text-dark" href="propose-quote-budget?stid=<?=$stid;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$type;?>&msgid=<?php echo $post_data['id']; ?>">Propose Quote</a></p>
                       <?php }else{ ?>
          
                      <?php } ?>
                        <p class="p-1" style="display:<?=$shodwhide;?>;"><a class="font-weight-bold text-dark" href="payment-release?id=<?=$stid;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$type;?>">Payment Summary</a></p>
                         <p class="p-1"><a class="font-weight-bold text-dark" href="#">Hide User</a></p>
                        <p class="p-1"><a class="font-weight-bold text-dark" href="#">Report User</a></p>
                     </div>
                     </div>
                  </div>
 
                                <p class="pp2" alt="<?=$post_data['topic'];?>"><?=$post_data['topic'];?> </p>
                                
                                <div class="d-flex justify-content-between align-items-center amount_wrap">
                                    <div class="wrapper_cash_total">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z"></path>
                                        </svg>
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
                   
                    <div class="img-p img-discuss  m-0"  >
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
                                                <p class="p-1" style="display:<?=$shodwhide_p;?>;"><a class="font-weight-bold text-dark" href="propose-quote-budget?stid=<?=$stid;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$type;?>&msgid=<?php echo $post_data['id']; ?>">Propose Quote</a></p>

                       <?php }else {?>

                       
                       <?php } ?>
                                               <p class="p-1" style="display:<?=$shodwhide;?>;"><a class="font-weight-bold text-dark" href="payment-release?id=<?=$stid;?>&lgn=<?=$to_user;?>&dis_id=<?=$from_user;?>&type=<?=$type;?>">Payment Summary</a></p>

                        <p class="p-1"><a class="font-weight-bold text-dark" href="#">Hide User</a></p>
                        <p class="p-1"><a class="font-weight-bold text-dark" href="#">Report User</a></p>
                     </div>
                     </div>
                  </div>
                                 <!--<a href="messagejob">-->
                                <p class="pp2" alt="<?=$post_data['topic'];?>"><?=$post_data['topic'];?> </p>
                                
                                <div class="d-flex justify-content-between align-items-center amount_wrap">
                                    <div class="wrapper_cash_total">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z"></path>
                                        </svg>
                                        <b style="color: green;">RM<?=$formattedPrice;?></b>
                                    </div>
                                </div>
                                <!--</a>-->
                                
                            </div>
                      </div>
                    <?php }else{} ?>
                    
 
           <div class="bg-white" class="parent" >
                    <div class="allchat bg-white receiver-sender-chat-wrap chat-container"  id="chatContainer"></div>

                   </div>
                    <form   method="post" id="sendmessage" enctype="multipart/form-data" class="position-relative">
                         <div class="search_inp">
                            <input type="hidden" id="sender_id" name="sender" class="form-control" value="<?=$user_id;?>">
                            <input type="hidden" id="receiver_id" name="receiver" class="form-control" value="<?=$from_user;?>">
                            <input type="hidden" id="posttype" name="posttype" class="form-control" value="<?=$type;?>">
                            <input type="hidden" id="postid" name="post_id" class="form-control" value="<?=$stid;?>">
                            <input type="hidden" id="postid" name="message_type" class="form-control" value="">
                             <div class="progress">
    <div class="progress-bar" id="progressBar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>


                         </div>
              <div class="upload-icon" onclick="showAttachmentArea()">
                    <div class="dd-button">
                <svg style="cursor:pointer;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M16.5,6V17.5A4,4 0 0,1 12.5,21.5A4,4 0 0,1 8.5,17.5V5A2.5,2.5 0 0,1 11,2.5A2.5,2.5 0 0,1 13.5,5V15.5A1,1 0 0,1 12.5,16.5A1,1 0 0,1 11.5,15.5V6H10V15.5A2.5,2.5 0 0,0 12.5,18A2.5,2.5 0 0,0 15,15.5V5A4,4 0 0,0 11,1A4,4 0 0,0 7,5V17.5A5.5,5.5 0 0,0 12.5,23A5.5,5.5 0 0,0 18,17.5V6H16.5Z" />
                </svg>
            </div>
                </div>
            
                <div id="attachmentArea" class="attachment-area" style="display: none">
                    <label class="drag-drop-label" for="fileInput">
                        Drag & Drop files here or click to upload (Max: 100MB)
                    </label>
                    <div id="fileInfo"></div>
                     <div id="loader"></div>
                    <input type="file" id="fileInput" name="attachment" class="file-input" onclick="hideFileInput()">
                </div>
        <div class="position-relative message-input">
            <input placeholder="Say something...." style="width: 100%;border-radius: 25px;" id="message" name="message" class="input-box search_msg_wrapper" required>
            <button onclick="sendMessage()" id="sendMessageButton">Send</button>
         </div>
    
</form>
                     
                </div>
                
              <!-- Button to trigger the modal -->

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
 
<!--Model for confirmation-->
<div class="modal fade" id="myModalConfirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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

<!-- Bootstrap JavaScript files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


 <?php include('inc/footer.php'); ?>
 
<script>
   $(document).ready(function(){
 
    // updating the view with notifications using ajax
function load_userchat_notification(view = '')
{
    var reciever = <?=$from_user;?>;
    var sender = <?=$to_user;?>;
    var post_id = '<?=$postid;?>';
     var ptype = '<?=$type;?>';
   
    
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
 
 
  function scrollAndSendMessage() {
        send_message();
        scrollToBottom(); // Automatically scroll to the bottom after sending a message
    }

    load_userchat_notification();

    $("#chatContainer").on("scroll", function() {
        var chatContainer = document.getElementById("chatContainer");
        isManuallyScrolling = (chatContainer.scrollHeight - chatContainer.scrollTop !== chatContainer.clientHeight);
    });

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


 $('#sendmessage').on('submit', function(event) {
    event.preventDefault();

    if ($('#sender_id').val() != '' && $('#receiver_id').val() != '' && $('#message').val() != '') {
      send_message();
    } else {
      alert("Both fields are required");
    }
  });

  // Periodically check for new messages
  setInterval(function() {
    load_userchat_notification();
  }, 1000); // Adjust the interval time as needed
});
 
</script>
 
 

 
<script>
$(document).ready(function () {
    var isManuallyScrolling = false;

    function scrollToBottom() {
        var chatContainer = document.getElementById("chatContainer");
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }

    function load_userchat_notification() {
        var receiver = <?=$from_user;?>;
        var sender = <?=$to_user;?>;
        var post_id = '<?=$postid;?>';
        var ptype = '<?=$type;?>';

        $.ajax({
            url: "admin/inc/process.php?action=GetUserChat",
            method: "POST",
            data: { receiver: receiver, sender: sender, post_id: post_id, post_type: ptype },
            dataType: "json",
            success: function (data) {
                $('.allchat').html(data.notification);
                if (!isManuallyScrolling) {
                    scrollToBottom();
                }
            }
        });
    }

    function scrollAndSendMessage() {
        send_message();
        scrollToBottom(); // Automatically scroll to the bottom after sending a message
    }

    function send_message() {
        // Show the progress bar while sending the message
        var progressBar = document.getElementById('progressBar');
        progressBar.style.width = '0%'; // Set initial width to 0%
        progressBar.style.transition = 'width 0.3s'; // Add a transition for smoother progress bar updates

        var form_data = new FormData($('#sendmessage')[0]);

        $.ajax({
            url: "admin/inc/process.php?action=SendMessage",
            method: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            xhr: function () {
                // Custom XMLHttpRequest to track upload progress
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = (evt.loaded / evt.total) * 100;
                        // Update progress bar width only if the upload is not completed yet
                        if (percentComplete < 100) {
                            progressBar.style.width = percentComplete + "%"; // Update progress bar width
                        }
                    }
                }, false);
                return xhr;
            },
            success: function (data) {
                $('#sendmessage')[0].reset();
                // Reset progress bar after sending the message
                progressBar.style.width = '100%'; // Set progress bar to 100% after successful upload
                setTimeout(function () {
                    progressBar.style.width = '0%'; // Reset progress bar after a short delay (optional)
                }, 55000); // Delay in milliseconds before resetting the progress bar
                progressBar.style.display = 'none';
                attachmentArea.style.display = 'none';
                load_userchat_notification();
            }
        });
    }

    // Listen for "Enter" key press in the message input field
    $('#message').on('keydown', function (event) {
        if (event.keyCode === 13) { // 13 is the key code for "Enter"
            event.preventDefault();
            var message = $.trim($(this).val()); // Get the trimmed value of the input field
            if (message !== "") { // Check if the message is not empty
                scrollAndSendMessage();
            }
        }
    });

    // Periodically check for new messages
    setInterval(function () {
        load_userchat_notification();
    }, 5000);
});

// Call load_userchat_notification once when the document is ready
$(document).ready(function () {
    load_userchat_notification();
});

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


    /* Attachment Code */
var fileInput = document.getElementById('fileInput');
var attachmentArea = document.getElementById('attachmentArea');
var selectedFile = null;

function hideFileInput() {
    // Hide the file input when it's clicked
    fileInput.style.display = 'none';

    // Attach an onchange event listener to the file input
    fileInput.addEventListener('change', function () {
        // Show the file input when a file is selected (change to 'block')
        fileInput.style.display = 'block';
    }, { once: true }); // This ensures the event listener runs only once
}

function showAttachmentArea() {
    if (attachmentArea.style.display === 'none' || attachmentArea.style.display === '') {
        attachmentArea.style.display = 'block';
    } else {
        attachmentArea.style.display = 'none';
    }
}



 $(document).ready(function () {
            var attachmentArea = document.getElementById('attachmentArea');
            var fileInfo = document.getElementById('fileInfo');
            var fileInput = document.getElementById('fileInput');
           var selectedFile = null;
            attachmentArea.ondragover = function (e) {
                e.preventDefault();
                attachmentArea.style.backgroundColor = '#e1e7f0';
            };

            attachmentArea.ondragleave = function () {
                attachmentArea.style.backgroundColor = '#f2f2f2';
            };

            attachmentArea.ondrop = function (e) {
                e.preventDefault();
                attachmentArea.style.backgroundColor = '#f2f2f2';

                var file = e.dataTransfer.files[0];
                displayFileInfo(file);
                handleFileUpload(file);
            };

            fileInput.onchange = function (e) {
                var file = e.target.files[0];
                // displayFileInfo(file);
                handleFileUpload(file);
            };



function displayFileInfo(file) {
    // Display file name
    selectedFile = file;
    fileInfo.innerHTML = 'File Name: ' + file.name;
}

function handleFileUpload(file) {
    if (file.size > 100 * 1024 * 1024) {
        alert('File size exceeds the limit (100MB).');
        return;
    }
    if (file.name.toLowerCase().endsWith('.exe')) {
        alert('Sorry, .exe files are not allowed.');
        return;
    }

    var loader = document.getElementById('loader');
    loader.innerHTML = 'Uploading...';

    var formData = new FormData();
    formData.append('file', file);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'upload.php', true);
    xhr.upload.onprogress = function (e) {
        if (e.lengthComputable) {
            var percentage = (e.loaded / e.total) * 100;
            loader.innerHTML = 'Uploading: ' + percentage.toFixed(2) + '%';
        }
    };

    xhr.onload = function () {
        if (xhr.status === 200) {
            loader.innerHTML = 'Upload complete!';
        } else {
            loader.innerHTML = 'Upload failed.';
        }
    };

    xhr.send(formData);
}

// Detect Enter key press in the message input field
$('#message').on('keyup', function (e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
        // If Enter key is pressed, hide the attachment area
        attachmentArea.style.display = 'none';
        selectedFile = null;
    }
});

// Click event handler for the "Send" button
document.getElementById('sendMessageButton').addEventListener('click', function () {
    const messageInput = document.getElementById('message');
    const message = messageInput.value.trim();

    if (message || selectedFile) {
        // Check if a file is attached and handle the file upload
        if (selectedFile) {
            attachmentArea.style.display = 'none';
        selectedFile = null;
        }

        // Send the message
        sendMessage(message);

        // Clear the message input field
        messageInput.value = '';
    }
});

});
    </script>
    
    
 
 


 