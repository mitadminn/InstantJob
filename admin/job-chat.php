<?php include('inc/header.php'); 

$alljobs = $obj->GetAllJobadmin();
// stid=2&lgn=6&dis_id=1&type=service
// $reciever = $_GET['lgn'];
// $sender = $_GET['dis_id'];
$post_id = $_GET['stid'];
// $post_type = $_GET['type'];
// $chat = $obj->GetUserChat($reciever,$sender,$post_id,$post_type);

?>
 <style>
    
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
    overflow-y: scroll;
    bottom: 0;
    position: relative;
}
.search_msg_wrapper {
    background: #fff !important;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 47%;
    /* height: 300px; */
    background-color: #f0f0f0;
    overflow-y: auto;
}
@media (min-width:0) and (max-width:567px){
    .search_msg_wrapper {
    bottom: 80px !important;
    width: 100% !important;
    left:0 !important;
}
}


/* Sender Message Styles */
.sender-message {
  background-color: #dff2c0; /* Light green background for sender's messages */
  color: #000; /* Black text color for sender's messages */
  border-radius: 10px; /* Rounded corners for sender's messages */
  padding: 10px; /* Padding around the sender's message content */
  margin-bottom: 10px; /* Space between sender's messages */
}

/* Receiver Message Styles */
.receiver-message {
  background-color: #f0f0f0; /* Light gray background for receiver's messages */
  color: #000; /* Black text color for receiver's messages */
  border-radius: 10px; /* Rounded corners for receiver's messages */
  padding: 10px; /* Padding around the receiver's message content */
  margin-bottom: 10px; /* Space between receiver's messages */
}

/* Styles for the sender's and receiver's image container */
.cir-img {
  width: 30px;
  height: 30px;
  border-radius: 50%;
  margin-right: 10px;
}

/* Styles for the message sender/receiver name */
.title-name {
  margin: 0;
  font-size: 18px;
  font-weight: bold;
}

/* Styles for the timestamp */
.time_discuss {
  font-size: 12px;
}

/* Styles for the message content */
.content-para {
  margin: 0;
}

/* Styles for the main container (optional) */
.img-p {
  display: flex;
}


.card {border:unset !important;}
.card-footer {border:unset !important;}

</style>
<div class="right_col" role="main" style="min-height: 4560px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Chat</h3>
              </div>

              <div class="title_right">
                <!--<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">-->
                <!--  <div class="input-group">-->
                <!--    <input type="text" class="form-control" placeholder="Search for...">-->
                <!--    <span class="input-group-btn">-->
                <!--      <button class="btn btn-secondary" type="button">Go!</button>-->
                <!--    </span>-->
                <!--  </div>-->
                <!--</div>-->
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              
 <div class="col-md-8 col-sm-12 ">
                <div class="x_panel">
                 
                   
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive overflow-hidden">
 
		 
					<div class="container  ">
  <div class="row m-0">
    <div class="col-md-12  ">
      <div class="card">
        <!--<div class="card-header text-center">Chat Box</div>-->
        <div class="card-body" id="message-list">
          
                    <div style="background: #fff; height: 100%;">
                    <div class="allchat bg-white" id="chatContainer"></div>
  <!--<form style="  background: #fff;" method="post" id="sendmessage" enctype="multipart/form-data">-->
  <!--                       <div class="search_inp">-->
  <!--                          <input type="hidden" id="sender_id" name="sender" class="form-control" value="<?=$_GET['lgn'];?>">-->
  <!--                          <input type="hidden" id="reciever_id" name="reciever" class="form-control" value="<?=$_GET['dis_id'];?>">-->
  <!--                          <input type="hidden" id="posttype" name="posttype" class="form-control" value="<?=$_GET['type'];?>">-->
  <!--                           <input type="hidden" id="postid" name="message_type" class="form-control" value="adminchat">-->
                            <!--<input type="hidden" id="postid" name="post_id" class="form-control" value="<?//=$_GET['dis_id'];?>">-->
                             <!-- File input field for image upload -->
  <!--                           <div class="search_msg_wrapper">-->
                                <!--<input type="file" name="image_file" id="image_file">-->

  <!--                             <input placeholder="Say something...." style="width: 100%;border-radius: 25px;" id="message" name="message">-->
  <!--                          </div>-->
  <!--                       </div>-->
  <!--                  </form>-->
                    </div>
                    
                  
        </div>
        <div class="card-footer">
            
                    
          <!--<form onsubmit="sendMessage(); return false;">-->
          <!--  <div class="input-group">-->
          <!--    <input type="text" class="form-control" placeholder="Type your message" id="message-input">-->
          <!--    <button type="submit" class="btn btn-primary" style="background: #00C853;border: 1px solid #00C853;margin-left: 10px;">Send</button>-->
          <!--  </div>-->
          <!--</form>-->
        </div>
      </div>
    </div>
  </div>
</div>

 
					
                  </div>
                </div>
              </div>
            </div>
                 
              </div>
              
            </div>
          </div>
        </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

 <script>
   $(document).ready(function(){
 
    // updating the view with notifications using ajax
function load_userchat_notification(view = '')
{
    var reciever = <?=$_GET['dis_id'];?>;
    var sender = <?=$_GET['lgn'];?>;
    var post_id = '<?=$post_id;?>';
     var ptype = '<?=$_GET['type'];?>';
   
    
 $.ajax({
  url:"inc/process.php?action=GetOneToOneChat",
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
    url: "inc/process.php?action=SendMessage",
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
        window.location.href = "inc/process.php?deleteservice=" + post_id + "&type=" + postType;
    }
}

      
</script>

<script>
  $(document).ready(function(){
    // Scroll to the bottom of the chat container
  function scrollToBottom() {
    var chatContainer = document.getElementById("chatContainer");
    chatContainer.scrollTop = chatContainer.scrollHeight;
  }

  // Call the scrollToBottom function after the page has loaded
  window.addEventListener("load", function() {
    scrollToBottom();
  });
});
</script>