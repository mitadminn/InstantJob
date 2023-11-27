<?php 
    $page = 'Release Payment';
    include('inc/header.php'); 
    // $serviceid = $_GET['id'];
    // $postid = $_GET['id'];
        $user_id = $_SESSION['Userid'];
    
    
    $replacedString = $_GET['type'];
        if($replacedString == 'service') { 
            $serviceid =  $_GET['id'];
            $post_data = $obj->GetServiceById($serviceid);
            $type = $post_data['post_type'];
            $postid = $_GET['id'];
            
         }elseif($replacedString == 'job'){ 
              $jobid = $_GET['id'];
             $post_data = $obj->GetJobById($jobid);
             $type = $post_data['post_type'];
             $postid = $_GET['id'];
         }else{}
        // $post_data = $obj->GetServiceById($serviceid);
        $userid = $post_data['user_id'];
        $postuser = $obj->GetUserById($userid);
        $plans = $obj->GetPaymentPlan($postid,$type);
        $proposedprice = $obj->GetProposedBudgetprice($user_id,$postid,$type);
        $amounts = $proposedprice['price'];
        $amount = number_format($amounts, 2, '.', ',');

     ?>
<?php include('inc/sidebar.php'); ?>        
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
  <div class="middle_container">
        <div class="head-mid people-paid">
                <h2></h2>
            </div>
            <section class="payment_bg">
            <div class="d-flex hidn-objct sticky msg-header">
                <div class="backbtn">
                    <a href="payment-success?id=<?=$post_data['id'];?>"><i class="fa-solid fa-arrow-left"></i></a>
                    <div class="prof-heigh-wid">
                        <div class="manage-as-lo"><?=$post_data['topic'];?></div>
                    </div>
                </div>
                <div class="prof-heigh-wid">
                    <div class="manage-as-lo"><?=$post_data['topic'];?></div>
                </div>
                <div class="rightsidemenu">
                    <div><i class="fa-solid fa-ellipsis-vertical"></i></div>
                </div>
            </div>
            <div class="">
                <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                    <h3 class="text-left font-weight-bold">Summary</h3>
                </div>
            </div>
            <div class="">
                <div class="">
                    <div class="summary-table-left">
                        <div class="d-flex" style="justify-content: space-between;">
                            <div class="d-flex">
                                <p style="font-size: 13px;"><?=$post_data['topic'];?></p>
                                <div  style="padding-left:10px;">
                                </div>
                            </div>
                            <p>RM<?=$amount;?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="field_wrapper">
                <div class="d-flex justify-content-between payment_methd">
                    <h4 class="font-weight-bold">Release Payment</h4>
                </div>
                <div class="release-pay-container">
                    <?php while($row=mysqli_fetch_array($plans)){ 
                        if($row['userid'] != $_SESSION['Userid']) {
                             $btn = 'disabled';
                             $hide = 'display:none';
                         } else { 
                             $btn = '';
                          }
                          
                          if($row['status'] == 1) {
                              
                               $hide = 'display:none';
                               $review =  'display:none';
                          }else {
                              $review = 'display:block';
                              
                          }
                    ?>
                    <div class="d-flex justify-content-between align-items-center payment_percnt">
                            <p><?=$row['plan']?> - RM<?=$row['plan_price']?> <?php  if($row['status'] == 2) { echo '<span class="funded-amount">Funded</span>';} ?></p>
                        <?php if($row['status'] == 1) { ?>
                            <a disabled><button style="background:#00c900; color:#fff; width:55px;">PAID</button></a>
                        <?php } elseif($row['status'] == 2) { ?>
                            <a href="payment-release-success?id=<?=$row['id'];?>&price=<?=$row['plan_price']?>&type=<?=$_GET['type']?>&lgn=<?=$_SESSION['Userid']?>&dis_id=<?=$_GET['dis_id']?>"><button <?=$btn;?>>Release</button></a>
                        <?php } else { ?>
                            <a href="payment-funded?id=<?=$row['id'];?>&price=<?=$row['plan_price']?>&type=<?=$_GET['type']?>&lgn=<?=$_SESSION['Userid']?>&dis_id=<?=$_GET['dis_id']?>"><button class="fund-release" <?=$btn;?>>Fund</button></a>
                        <?php }?>
                    </div>
                    <?php } ?>
                 </div>
                 
                  <!--<a href="public-reviews?id=<?//=$postid;?>&price=<?//=$row['plan_price']?>&type=<?=$type;?>&lgn=<?//=$_SESSION['Userid']?>&dis_id=<?//=$_GET['dis_id']?>"  style="<?//=$review;?>"> Make Review </a>-->
 
                  
                  <!--Add button to open (Choose how you want to pay)-->
            <div class="text-right" id="showHidePayBtn" style="<?=$review;?>">
                <button class="btn add-pay-btn text-white mt-2">Add New Milestone</button>
            </div>      
                  
<div class="bg-white p-3 new-task-wrap" style="display: none;">
        <form action="admin/inc/process.php?action=PaymentPlan" method="post" id="myForm" class="service-form example" enctype="multipart/form-data">
    <div class="field_wrappers">
        <div class="d-flex justify-content-between">
            <h4>Choose how you want to pay</h4>
          
            <input type="hidden" value="<?=$postid;?>" name="postid">
            <input type="hidden" value="<?=$user_information['id'];?>" name="userid">
            <input type="hidden" value="<?=$_GET['price'];?>" name="postprice">
            <input type="hidden" value="<?=$_GET['type'];?>" name="type">
            <input type="hidden" value="<?=$_GET['dis_id'];?>" name="dis_id">
        </div>
        <div class="position-relative">
 
        <a href="javascript:void(0);" class="add_buttons create_icon_wrap-pay add-pay-opt" title="Add field">
            <label class="lst-plus mb-2">
                <input type="text" id="field_name" class="bg-white font-weight-bold" value="" placeholder="Add new task (optional)" disabled>
            </label>
            <i class="fa-solid fa-plus top-0"></i>
        </a>
         </div>
    </div>
    
    <div class="last_title mt-2" >
        <div class="last_title" >
            <button type="submit" class="rounded btn-success btn-sucs btnm-frst w-100 mt-2" id="myButton">Submit</button>
            <br>
            <!--<p style="text-align:center !important;width: 100%;  font-size: 13px;">Always pay through Instantjob to protect yourself. You can release the payment anytime.</p>-->
        </div>
    </div>
</form>
     </div>
                
            </div>
            <div class="text-left progress-wrap">
                    <h4 class=" font-weight-bold">Progress you'll go through</h4>
            </div>
            <div class=" ">
                <div class="d-flex flex-collection">
                     <div class="my-2  border-0 text-left meny position-relative">
                         <div class="position-relative three-btn-fund">
                             <button class="fst-two-btn">FUND</button>
                            <div class="vertical-line up"></div>
                         </div>
                         <div class="position-relative payment_percnt border-0 p-0">
                            <button class="fst-two-btn" style="margin:40px 0;">RELEASE</button>
                            <div class="vertical-line down"></div>
                         </div>
                         <div class="position-relative">
                            <button class="paid-btn">PAID</button>
                         </div>
                </div>
                    
                    <div class="text-left right-collection">
                    <p class="mb-2">If you want service provider to start work please fund this milestone. Your money will be secured in instajobs</p>
                    <p class="mb-2">After you've funded the milestone, you can choose to release the money to service provider when you are satisfied</p>
                    <p class="mb-2">The task has completed, money has paid to service provider</p>
                </div>
                </div>
               
            </div>
             
            
            <div class="cancel-btn">
                <i class="fa-solid fa-circle-exclamation"></i>
                <button style="font-size: 11px;">Cancel job</button>
            </div>
             </section>
                
			 </div>
  
                <?php include('inc/footer.php'); ?>
                
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 5; // Input fields increment limitation
    var addButton = $('.add_buttons'); // Add button selector
    var wrapper = $('.field_wrappers'); // Input field wrapper
    var fieldHTML = '<div class="addonss"><input type="text" name="field_name[]" value="" class="addon1" required/><input type="text" name="field_price[]" value="" placeholder="RM00" class="addon2" id="myInput" required/><a href="javascript:void(0);" class="remove_button create_remove_wrap"><i class="fa-solid fa-minus"></i></a></div>'; // New input field HTML
    var x = 1; // Initial field counter is 1
    
    // Once add button is clicked
    $(addButton).click(function(){
        // Check maximum number of input fields
        if(x < maxField){ 
            x++; // Increment field counter
            $(wrapper).append(fieldHTML); // Add field HTML
        }
    });
    
    // Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); // Remove field HTML
        x--; // Decrement field counter
    });
    
    // Disable/enable submit button based on field content
    $('#myForm').on('input', 'input.required', function() {
        var isEmpty = false;
        $('input.required').each(function() {
            if ($(this).val().trim() === '') {
                isEmpty = true;
                return false;
            }
        });
        $('#myButton').prop('disabled', isEmpty);
    });
});
</script>


<!--Click on the add button to show the  (Choose how you want to pay)-->
<script>
    // Get a reference to the button and the new-task-wrap element
    const addButton = document.getElementById("showHidePayBtn");
    const newTaskWrap = document.querySelector(".new-task-wrap");

    // Add a click event listener to the button
    addButton.addEventListener("click", function () {
        // Toggle the visibility of the new-task-wrap element
        if (newTaskWrap.style.display === "none" || newTaskWrap.style.display === "") {
            newTaskWrap.style.display = "block";
        } else {
            newTaskWrap.style.display = "none";
        }
    });
</script>