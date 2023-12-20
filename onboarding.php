<?php //Include Google Configuration File
   include('gconfig.php');
   
   if(!isset($_SESSION['access_token'])) {
    //Create a URL to obtain user authorization
    $google_login_btn = '<a href="'.$google_client->createAuthUrl().'"><img src="//www.tutsmake.com/wp-content/uploads/2019/12/google-login-image.png" /></a>';
   } else {
   
     header("Location:profile.php");
   }
   ?>
<!DOCTYPE html>
<head>
   <title>Instantjob | Home</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="assets/css/stylesheet-onboarding.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
   <style>
      .tab {padding: 40px !important; padding-bottom: 38px !important;
      background: #fff;}
   </style>
</head>
<body>
   <div class="">
      <div class="row" style="background:#fff;">
         <div class="col-lg-4 col-12 coll p-0">
            <div class="tab">
               <form action="admin/inc/process.php?action=Signin" method="post">
                  <img src="assets/img/new-instant-logo.png" class="third">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  <h2 class="sign">Sign in to your account</h2>
                  <?php if($_GET['msg'] == 'fail') { echo '<p id="result" style="color:red;text-align: center;">Wrong Username or Password</p>';}?>
                  <label for="Email adress">Email adress</label>
                  <p><input placeholder="Email" oninput="this.className = ''" name="email" required></p>
                  <label for="Email adress">Password</label>
                  <p><input placeholder="Password" oninput="this.className = ''" name="password" type="password" required></p>
                  <button type="submit" id="nextBtn3" onclick="nextPre(1)">Sign in</button>
                  <h3 class="title">OR</h3>
                  <a href="<?php echo $google_client->createAuthUrl(); ?>"> <button type="button" id="nextBtn4" onclick="nextPrev(1)"><img src="assets/img/2991148.png"
                     class="google"><span>Sign in with Google</span></button></a>
                  <button type="button" id="nextBtn5" onclick="nextPrev(1)">Don't have an account yet?<span class="sign">Sign up now</span></button>
                  </h4>
               </form>
            </div>
            <div class="tab" id='dis-none'>
               <form method="post" id="signup">
                  <img src="assets/img/instant logo.png" class="fourth">
                  <p class="text-center lets ">Create your account</p>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <label for="Email adress">Email adress</label>
                     <input placeholder="Email" oninput="this.className = ''" name="email" id="email" type="email" required>
                     <p id="result" style="color:red;"></p>
                     <label for="Email adress">Password</label>
                     <p><input placeholder="Password" oninput="this.className = ''" name="password" id="password" type="password" required></p>
                  <button type="submit" id="nextBtn8" >Next</button>
                  <input type="checkbox" class="form-check-input value" id="" required>
                  <label for="" class="insta">Yes, I understand and agree to instantjob's</label>
                  <button type="button" id="prevBtn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
                  <button type="button" id="prevBtn" onclick="nextPrev(-1)"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                  <span class="service">Terms of
                  Service</span>and<span class="service">Privacy Policy.</span>
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <h3 class="termss">Terms of Service</h3>
                              <p class="content">Lorem ipsum dolor sit amet, consectetur adipiscing
                                 elit. Sed non scelerisque orci, vitae ullamcorper eros. Maecenas feugiat mattis lorem, id tristique ex
                                 dapibus vel. Quisque eu nulla nee velit congue auctor. Etiam nulla est,va rius quis congue eu, condimentum
                                 at est. Duis ut dui posuere, tempus justo condimentum, vehicula libero. Maecena s non nisi a erat
                                 consequat pretium. Fusee ulla mcorper vitae lacus nee faucibus. Morbi eu sem enim. Etiam metus lectus,
                                 egestas sed lectus mattis, auctor
                                 cursus velit. Fusee nee dui eget ligula molestie
                                 tempus a sit amet dui. Nam ac tincidunt nibh, et lobortis lectus.
                              </p>
                              <p class="content">Integer erat felis, imperdiet sit amet gravida ac,
                                 aliquam vel tellus. Maecenas urna odio, egestas
                                 nec tristique non, vestibulum vitae dolor. Vivamus
                                 et pellentesque tortor, quis dictum turpis. Duis
                                 congue dictum leo, sed mattis nibh tincidunt in.
                                 Praesent placerat gravida quam, id elementum
                                 sapien posuere vel. Pellentesque ligula justo,
                                 convallis sit amet odio ultrices, finibus accumsan
                                 ex. Pellentesque habitant morbi tristique senectus
                                 et netus et malesuada fames ac turpis egestas.
                              </p>
                              <p class="content">
                                 Mauris turpis est, vestibulum quis egestas eu,
                                 tincidunt ut arcu. Mauris auctor quam eget suscipit
                                 lacinia. Maecenas vel mattis metus. Phasellus
                                 purus ante, gravida eget erat ac, luctus ultrices
                                 ante. In hac habitasse platea dictumst. Mauris
                                 scelerisque nisi metus, a hendrerit turpis
                                 ullamcorper sollicitudin. In nunc dui, ultrices ut
                                 vulputate vitae, facilisis bibendum diam. Donec eu
                                 elit scelerisque, pretium enim ut, posuere odio.
                                 Sed pretium mauris a arcu pulvinar, et feugiat
                                 metus hendrerit. Vivamus aliquet enim vel
                                 pellentesque facilisis. Nam commodo mattis
                                 mauris eget pretium. Quisque in dictum tellus. In id
                                 tortor at dui sagittis tincidunt id sit amet eros.
                                 Phasellus tellus risus, feugiat a lorem et, maximus
                                 pharetra tortor.
                              </p>
                              <h3 class="termss">Privacy Policy</h3>
                              <p class="content">Lorem ipsum dolor sit amet, consectetur adipiscing
                                 elit. Sed non scelerisque orci, vitae ullamcorper eros. Maecenas feugiat mattis lorem, id tristique ex
                                 dapibus vel. Quisque eu nulla nee velit congue auctor. Etiam nulla est,va rius quis congue eu, condimentum
                                 at est. Duis ut dui posuere, tempus justo condimentum, vehicula libero. Maecena s non nisi a erat
                                 consequat pretium. Fusee ulla mcorper vitae lacus nee faucibus. Morbi eu sem enim. Etiam metus lectus,
                                 egestas sed lectus mattis, auctor
                                 cursus velit. Fusee nee dui eget ligula molestie
                                 tempus a sit amet dui. Nam ac tincidunt nibh, et lobortis lectus.
                              </p>
                              <p class="content">Integer erat felis, imperdiet sit amet gravida ac,
                                 aliquam vel tellus. Maecenas urna odio, egestas
                                 nec tristique non, vestibulum vitae dolor. Vivamus
                                 et pellentesque tortor, quis dictum turpis. Duis
                                 congue dictum leo, sed mattis nibh tincidunt in.
                                 Praesent placerat gravida quam, id elementum
                                 sapien posuere vel. Pellentesque ligula justo,
                                 convallis sit amet odio ultrices, finibus accumsan
                                 ex. Pellentesque habitant morbi tristique senectus
                                 et netus et malesuada fames ac turpis egestas.
                              </p>
                              <p class="content">
                                 Mauris turpis est, vestibulum quis egestas eu,
                                 tincidunt ut arcu. Mauris auctor quam eget suscipit
                                 lacinia. Maecenas vel mattis metus. Phasellus
                                 purus ante, gravida eget erat ac, luctus ultrices
                                 ante. In hac habitasse platea dictumst. Mauris
                                 scelerisque nisi metus, a hendrerit turpis
                                 ullamcorper sollicitudin. In nunc dui, ultrices ut
                                 vulputate vitae, facilisis bibendum diam. Donec eu
                                 elit scelerisque, pretium enim ut, posuere odio.
                                 Sed pretium mauris a arcu pulvinar, et feugiat
                                 metus hendrerit. Vivamus aliquet enim vel
                                 pellentesque facilisis. Nam commodo mattis
                                 mauris eget pretium. Quisque in dictum tellus. In id
                                 tortor at dui sagittis tincidunt id sit amet eros.
                                 Phasellus tellus risus, feugiat a lorem et, maximus
                                 pharetra tortor.
                              </p>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <!-- Circles which indicates the steps of the form: -->
         <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
         </div>
         <!--</form>-->
      </div>
   </div>
   <script>
      var currentTab = 0; // Current tab is set to be the first tab (0)
      showTab(currentTab); // Display the current tab
      
      function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        var x = document.getElementsById("");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
          document.getElementById("prevBtn").style.display = "none";
        } else {
          document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
          document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
          document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
      }
      
      function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 3 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
          // ... the form gets submitted:
          document.getElementById("regForm").submit();
          return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
      }
      
      function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
          // If a field is empty...
          if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
          }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
          document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
      }
      
      function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
          x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
      }
   </script>
   </div>
   </div>
   </div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script>
      /* attach a submit handler to the form */
      $("#signup").submit(function(event) {
      
      /* stop form from submitting normally */
      event.preventDefault();
      
      /* get the action attribute from the <form action=""> element */
      var $form = $(this),
      url =  'admin/inc/process.php?action=Signup';
      
      /* Send the data using post with element id name and name2*/
      var posting = $.post(url, {
      email: $('#email').val(),
      password: $('#password').val()
      });
      
      /* Alerts the results */
      posting.done(function(data) {
      $('#result').text(data);
      
       var mssg = $("#result").text();
         
            
      var email = $('#email').val();
      if (/^\s*Account Created Successfully\s*$/.test(mssg)) {
                var urls = 'email-confirm.php?email='+email;
       window.location.replace(urls);
            } 
      
      
      });
      posting.fail(function() {
      $('#result').text('failed');
      });
      });
      
      
   </script>
</body>
</html>