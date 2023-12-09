<?php
include('auth.php'); 
    $page = 'Profile Info';
    include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>     
<style>
    footer{
        display:none !important;
    }
</style>
<!--first tab row start-->
<div class="col-sm-12 instant-main" style="background: #fff">
    <div class="row">
        <div class="col-lg-12 col-md-12 second-mid example">
            <div class="container">
                <div class="card">
                    <form action="admin/inc/process.php?action=ProfileInfo" method="post">
                        <div class="main prof-inf-new active"  >
                            <a href="#"> 
                            <img class="logo_new_instant" src="assets/img/new-instant-logo.png" alt="">
                            </a>
                            <div class=" text-center body">
                                <div class="mx-auto">
                                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M7,10L12,15L17,10H7Z" />
                                    </svg>
                                    <select class="ddll-select" id="lists" name="list" class="">
                                        <option value="0" class="lang_optn" hidden>Choose language</option>
                                        <option value="1" class="lang_optn">English</option>
                                    </select>
                                </div>
                            </div>
                            <button type="button" class="create-workspace btn-inactive"  id="nextBtn" disabled >Next</button>

                        </div>
                        <div class="main" >
                            <!--<a href="#"> -->
                            <img class="logo_instant_jobs" src="assets/img/new-instant-logo.png" alt="">
                            <!--</a>-->
                            <img src="assets/img/street-view-doll copy.png" class="icon1">
                            <p class="cont1 govt" style=" margin-top: 16px;">Instantjob allows people to buy or sell services for any one-time jobs locally or
                                worldwide. 
                            </p>
                            <button type="button" class="next-click btn-inactive" id="nextBtn6">Let's Begin!</button>
                        </div>
                        <div class="main" >
                            <!--<a href="#"> -->
                            <img class="logo_instant_jobs" src="assets/img/new-instant-logo.png" alt="">
                            <!--</a>-->
                            <p class="text-center lets set_profile">Give your public profile a name, you can always change this later.</p>
                            <p class="text-center lets profile_set">What is your name?</p>
                            <input type="text" class="uploadtxt10 url form-control" placeholder="Name" id="namee" name="name" >
                            <input type="hidden" class="form-control" placeholder="Name" value="<?=$_SESSION['Userid'];?>" name="id">
                            <input  type="button" name="name" id="nextBtn10" class="next-click name btn-inactive"  value="Next" disabled/>
                        </div>
                        <div class="main main_1"  >
                           
                            <img class="logo_instant_jobs" src="assets/img/new-instant-logo.png" alt="">
                            <!--</a>-->
                            <p class="text-center lets">Where are you from?</p>
                            <input type="text" class="uploadtxt8 url form-control confirmation-code" placeholder="Country" id="namee" name="country" >
                            <input  type="button" id="nextBtn8" class="next-click country btn-inactive"  value="Next" disabled/>
                        </div>
                        <div class="main" >
                          
                            <img class="logo_instant_jobs" src="assets/img/new-instant-logo.png" alt="">
                            
                            <p class="text-center lets">What skills are you good at? We'll send you emails when there's a job that matches your skills.</p>
                          
                             <input type="text" id="tag-input3" name="skills[]">
                            <input  type="button" id="nextBtn9" class="next-click btn-inactive bnt-fill-green mt-3"  value="Next" />
                        </div>


    

                        <div class="main last-form"  >
                             
                            <img class="logo_new_instant last_pg_logo" src="assets/img/new-instant-logo.png" alt="">
                            
                            <p class="text-center lets verify">Verify your account to start selling your skills as services in the professional marketplace.</p>
 
    <div class="d-flex  align-items-center gap-3" style="gap:10px;">
       <input style="width:unset;" type="radio" id="tab1" name="usertype" value="Individual" checked>
       <label class="label_tabs" for="tab1">Individual (I am a part-timer)</label>
   </div>                    
<div class="d-flex align-items-center gap-3" style="gap:10px;">
<input style="width:unset;" type="radio" id="tab2" name="usertype" value="Company">
<label class="label_tabs" for="tab2">Company (Sole Proprietor, Sdn Bhd…)</label>
</div>
        <article id="article1">
             <div class="boxs">
                    <label for="Name" class="label-email">Government Issued ID</label>
                    <input type="file" name="file[]"   id="file"  >
                    <div class="upload-area"  id="uploadfile" contentEditable=true data-text="Upload">
                        <div id='clock'></div>
                        <img src="assets/img/onboarding/cameraa.png"  class="file-upload camera" placeholder="Upload" >
                    </div>
                </div>
                <label for="Name" class="label-email">Name</label>
                <p class="inp-pro-info"><input  placeholder="Name as per ID" class="confirmation-code" name="label-emailname" ></p>
                <label for="Name" class="label-email">ID Number</label>
                <p class="inp-pro-info"><input placeholder="NRIC / ID Number" class="confirmation-code" name="icnumber" ></p>
                
                <label for="Contact No" class="label-email">Contact No.</label>
                <p class="inp-pro-info"><input placeholder="Your Mobile no." class="confirmation-code" name="contactnumber" ></p>
                
                <label for="Contact No" class="label-email">Address</label>
                <p class="inp-pro-info"><input placeholder="Home Address" class="confirmation-code" name="address" ></p>
                
                <label for="dob" class="date_contry">Date of Birth</label>
                <p class="inp-pro-info"><input class="confirmation-code" type="date" placeholder="DD/MM/YYYY" class="confirmation-code" name="date"></p>
                <label class="date_contry" for="country">Country</label>
                <select id="country" class='form-control confirmation-code' name="countrry">
                    <option value="Malaysia">Malaysia</option>
                    <option value="China"> China </option>
                    <option value="India"> India </option>
                </select>
 </article>
        <article id="article2" style="display:none;">
             <div class="boxs">
                    <label for="Name" class="label-email">Company Registration Certificate (SSM)</label>
                    <input type="file" name="ssm"   id="file"  >
                    <div class="upload-area"  id="uploadfile" contentEditable=true data-text="Upload">
                        <div id='clock'></div>
                        <img src="assets/img/onboarding/cameraa.png"  class="file-upload camera" placeholder="Upload" >
                    </div>
                </div>
                <label for="Name" class="label-email">Company Name</label>
                <p class="inp-pro-info"><input  placeholder="Company Name as per SSM" class="confirmation-code" name="companyname" ></p>
         
                
                <label for="Contact No" class="label-email">Person in charge</label>
                <p class="inp-pro-info"><input placeholder="Your Name as per IC" class="confirmation-code" name="personincharge" ></p>
                
                <label for="Contact No" class="label-email">Contact No.</label>
                <p class="inp-pro-info"><input placeholder="Your Mobile no." class="confirmation-code" name="contactnumber" ></p>
                
                <label for="Contact No" class="label-email">Address</label>
                <p class="inp-pro-info"><input placeholder="Company Address" class="confirmation-code" name="address" ></p>
                
         
                <label class="date_contry" for="country">Country</label>
                <select id="country" class='form-control confirmation-code' name="countrry">
                    <option value="Malaysia">Malaysia</option>
                    <option value="China"> China </option>
                    <option value="India"> India </option>
                </select>
        </article>
 
                            <button class="button btn-inactive bnt-fill-green" type="submit" id="nextBtn7">Submit</button>
                            <div>
                                <p class="skip">
                                    <!--Skip,remind me about this later-->
                                    <button class="" type="submit" id="" style="border: unset; background: unset; color: #5db5ff; font-weight: bolder; width: 100%; text-align: center; margin: 0 auto; font-weight: 600; font-size: 20px;">Skip,remind me about this later</button>
                                </p>
                                <p style="font-size: 12px;">"We respect your privacy. Your identification photo will only be retained for 14 days as required for age verification and compliance with Know Your Customer (KYC) regulations, and after that period, it will be securely deleted from our records."
</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include('inc/footer.php'); ?> 
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script>
    $(document).ready(function () {
    $('#lists').val("0");
    
    $('#lists').change(function () {
    selectVal = $('#lists').val();
     
    if (selectVal == 0) {
       $('#nextBtn').prop("disabled", true);
    }
    else {
      $('#nextBtn').prop("disabled", false);
      $('.create-workspace').addClass("bnt-fill-green");
    }
    })
    });
    $(document).ready(function(){
    $("input[class^='uploadtxt']").keyup(function(e){
         var empty=true;
        $("input[class^='uploadtxt']").each(function(i){
            if($(this).val()=='')
            {
                empty=true;
                $('#nextBtnn').prop('disabled', true);
                return false;
            }
            else
            {
                empty=false;
            }
        });
        if(!empty) $('#nextBtnn').prop('disabled', false);                    
        $('.name').addClass("bnt-fill-green");
     });
    
    
    
    $("input[class^='uploadtxt8']").keyup(function(e){
         var empty=true;
        $("input[class^='uploadtxt8']").each(function(i){
            if($(this).val()=='')
            {
                empty=true;
                $('#nextBtn8').prop('disabled', true);
                return false;
            }
            else
            {
                empty=false;
            }
        });
        if(!empty)  $('#nextBtn8').prop('disabled', false);                    
        $('.btn-inactive').addClass("bnt-fill-green");
     });
    
    
    
    $("input[class^='uploadtxt9']").keyup(function(e){
         var empty=true;
        $("input[class^='uploadtxt9']").each(function(i){
            if($(this).val()=='')
            {
                empty=true;
                $('#nextBtn9').prop('disabled', true);
                return false;
            }
            else
            {
                empty=false;
            }
        });
        if(!empty)  $('#nextBtn9').prop('disabled', false);                    
        $('.country').addClass("bnt-fill-green");
     });
     
     
      $("input[class^='uploadtxt10']").keyup(function(e){
         var empty=true;
        $("input[class^='uploadtxt10']").each(function(i){
            if($(this).val()=='')
            {
                empty=true;
                $('#nextBtn10').prop('disabled', true);
                return false;
            }
            else
            {
                empty=false;
            }
        });
        if(!empty)  $('#nextBtn10').prop('disabled', false);                    
        $('.name').addClass("bnt-fill-green");
     });
     
    
    });
</script>

<!--file upload with camera js-->
<script>
        $('.file-upload').on('click', function(e) {
  e.preventDefault();
  $('#file').trigger('click');
});



 var inputElement = document.getElementById('file');

inputElement.onchange = function(event) {
  var getImagePath = URL.createObjectURL(event.target.files[0]);
  document.querySelector('#clock').style.backgroundImage = 'url(' + getImagePath + ')'
};
</script>

<script>
    // You can add this script if you want to add smooth transitions between tabs.
// It's optional and requires no changes to your HTML or CSS.

document.querySelectorAll('input[type="radio"]').forEach((radio) => {
  radio.addEventListener('change', (event) => {
    // Hide all articles
    document.querySelectorAll('article').forEach((article) => {
      article.style.display = 'none';
    });

    // Show the selected article
    const targetId = event.target.getAttribute('id').replace('tab', 'article');
    document.getElementById(targetId).style.display = 'block';
  });
});

</script>


 