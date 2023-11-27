<?php
include('auth.php'); 
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
    $page = 'Payment Summary';
    include('inc/header.php'); 
    
       $user_id=$_SESSION['Userid'];
       $s_w_y = $_GET['s'];
       $sendto = $_GET['dis_id'];
       $replacedString = $_GET['type'];
        if($replacedString == 'service') { 
            $serviceid =  $_GET['id'];
            $post_data = $obj->GetServiceById($serviceid);
            $type = $post_data['post_type'];
            $postid = $_GET['id'];
            $post_id = $post_data['id'];
            
         }elseif($replacedString == 'job'){ 
              $jobid = $_GET['id'];
             $post_data = $obj->GetJobById($jobid);
             $type = $post_data['post_type'];
             $postid = $_GET['id'];
             $post_id = $post_data['id'];
         }else{}
         $proposaldata = $obj->GetProposalDataByPostId($post_id,$type);
          $actual_amnt = $proposaldata['price'];
           $taxes = $obj->calculateTaxes($actual_amnt,$service, $sst);
 // Accessing the calculated taxes
    $service_tax = $taxes['service_tax'];
    $sst_tax = $taxes['sst_tax'];
    $totalprice = $service_tax + $actual_amnt + $sst_tax;  
            
            
                             
    // $post_data = $obj->GetServiceById($serviceid);
    
    $userid = $post_data['user_id'];
    $postuser = $obj->GetUserById($userid);
    
    // Reserve amount for project
   
     
    $getproposal = $obj->GetProposalDataByPostId($post_id,$type);
    $p_status = $getproposal['status'];
    if($p_status != 1) {
        $sendby = $user_id;
        $posttype = $type;
        $comment = '';
        $message_type = '';
        $attachment = '';
        $data = $obj->SendMessage($sendby,$sendto,$comment,$posttype,$postid,$message_type, $attachment);
        // $obj->ReserveAmount($user_id,$totalprice,$post_id,$type);
        $obj->AcceptPostProposal($postid,$sendby,$sendto,$posttype);
        $obj->UpdateProposalDataStatus($post_id,$type);
    } else {}
    
    
    
    
    ?>
<?php include('inc/sidebar.php'); ?>  
<style>
    
    button.rounded.btn-success.btn-sucs.btnm-frst.w-100 {
    margin: 60px 0 0 0;
}

.middle_container {
     /*flex: 0.5;*/
    
}

/* Center the modal vertically and horizontally */
.modal {
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Customize modal size */
.modal-dialog {
    max-width: 400px; /* Set maximum width */
    width: 100%;
}

/* Customize modal content */
.modal-content {
    border-radius: 10px; /* Optional: Round the corners of the modal */
}

/* Optional: Style modal header, body, and footer */
.modal-header, .modal-footer {
    background-color: #28a745;
    color: #fff;
    border-bottom: none; /* Remove border between header/body and footer */
}

/* Optional: Style close button */
.close {
    color: #fff;
}

</style>
<!--first tab row start-->
<div class="col-sm-12 instant-main" >
    <div class="row">
        
        <div class="middle_container" id="myTabContent">
     <div class="head-mid">
            <h2>Summary</h2>
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
                            <h6><?=$post_data['topic'];?> </h6>
                        </div>
                        <div>
                            <p>  <?php //echo substr($post_data['description'], 0,50);?></p>
                        </div>
                    </div>
                </div>
                        <div style="">
                            <p class="">RM<?php echo number_format($getproposal['price'], 2, '.', ',');?></p>
                        </div>
                   
                </div>

            </div>
        </div>
    </div>

        <form action="admin/inc/process.php?action=PaymentPlan" method="post" id="myForm" class="service-form example" enctype="multipart/form-data">
 
    <div class="field_wrapper">
        <div class="d-flex justify-content-between">
            <h4>Choose how you want to pay</h4>
          
            <input type="hidden" value="<?=$postid;?>" name="postid">
            <input type="hidden" value="<?=$user_information['id'];?>" name="userid">
            <input type="hidden" value="<?=$getproposal['price'];?>" name="postprice">
            <input type="hidden" value="<?=$_GET['type'];?>" name="type">
            <input type="hidden" value="<?=$_GET['dis_id'];?>" name="dis_id">
        </div>
        <div class="position-relative">
 
        <a href="javascript:void(0);" class="add_button create_icon_wrap-pay" title="Add field">
            <label class="lst-plus">
                <input type="text" id="field_name" class="bg-white font-weight-bold" value="" placeholder="Add new task (optional)" disabled>
            </label>
            <i class="fa-solid fa-plus"></i>
        </a>
         </div>
    </div>
    
   <div class="last_title" style="margin-top:10px;">
        <div class="last_title" style="padding: 15px;">
            <!-- Add a button to trigger the confirmation modal -->
            <button type="button" class="rounded btn-success btn-sucs btnm-frst w-100" id="myButton">Next</button>
            <br>
            <p style="text-align:center !important;width: 100%;  font-size: 13px;">Always pay through Instantjob to protect yourself. You can release the payment anytime.</p>
        </div>
    </div>
</form>
     </div>
    
</div>

<!-- Bootstrap Modal for Confirmation -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to submit this form? after submitted you are not able to change the milestones.
           </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModalButton" aria-label="Close"> Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmSubmit">Yes, Submit</button>
            </div>
        </div>
    </div>
</div>


  
<?php include('inc/footer.php'); ?> 
<!-- Bootstrap JS from CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
var $j = jQuery.noConflict();

$j(document).ready(function() {
    $j("#myButton").on("click", function() {
        $j("#confirmationModal").modal("show");
    });

    $j("#confirmSubmit").on("click", function() {
        $j("#myForm").submit();
    });
});


$(document).ready(function() {
    // Close the modal when the close button is clicked
    $("#closeModalButton").on("click", function() {
        $("#confirmationModal").modal("hide");
    });
});


</script>

<script type="text/javascript">
$(document).ready(function(){
    var maxField = 5; // Input fields increment limitation
    var addButton = $('.add_button'); // Add button selector
    var wrapper = $('.field_wrapper'); // Input field wrapper
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