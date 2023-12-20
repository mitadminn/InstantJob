<?php
   $page = 'Create Job';
   include('inc/header.php'); 
   
       ?>
<?php include('inc/sidebar.php'); ?>     
 
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
<div class="middle_container" id="myTabContent">
   <div class="tab-pane fade show active wrap_content_mid" id="one" role="tabpanel" aria-labelledby="one-tab">
      <div class="head-mid">
         <h2 >Create a Job Offer  <?=$_SESSION['Country'];?></h2>
      </div>
      <form action="admin/inc/process.php?action=CreateJob" method="post" class="service-form example" enctype="multipart/form-data">
         <input type="hidden" class="form-control" placeholder="Name" value="<?=$_SESSION['Userid'];?>" name="id" required>
         <div class="d-flex justify-content-between">
            <label> Topic</label>
            <div>
               <span style="color: #495057;" id=charcount>0</span>
               <span style="color: #495057;" id=charcount>/ 80</span> 
            </div>
         </div>
         <div class="test-form">
            <textarea id="myTextarea" rows="2" placeholder="Write" name="topic"   onkeyup="charcount(this.value)" maxlength="80" required>I need help </textarea>
         </div>
         <div class="d-flex justify-content-between">
            <label>Description</label>
            <div>
               <span style="color: #495057;" id=charcoun>0</span>
               <span style="color: #495057;" id=charcoun>/ 1000 </span>
            </div>
         </div>
         <textarea class="form-control" name="description" rows="4" placeholder="Write something here..." id="textboxes" onkeyup="charcountupdate(this.value)" maxlength="1000" required></textarea>
         <label>Budget</label>
         <div class="row select_budget">
            <div class="col-lg-4 col-6 prize_service_controller wrapper_price">
               <div class="input-group cur-box">
                  <input type="text" class="form-control cur-input-1" name="price" aria-label="Text input with dropdown button" required>
               </div>
               <div class="input-group cur-box">
                  <input type="hidden" class="form-control cur-item-2" name="currency" value="<?=$geoLocationData['currency_code'];?>" aria-label="Text input with dropdown button" required>
                  <input type="hidden" class="form-control cur-item-2" name="country" value="<?=$geoLocationData['country'];?>" aria-label="Text input with dropdown button" required>
               </div>
            </div>
            <div class="col-md-12 p-0">
               <label>Area</label>
               <select class="form-control" name="area" required>
                  <option hidden>With in my city</option>
                  <option value="Worldwide">With in my city</option>
                  <option value="Local">With in my state</option>
                  <option value="Overseas">Across Malaysia</option>
               </select>
            </div>
         </div>
         <?php include('state-city.php');?>
         <br>
         <label>Deadline -How soon you need this?</label> 
         <input type="number" name="how_fast" class="form-control" placeholder="Time to complete the job" required>
         <label>Upload Photos</label>
         <div class="bio-img-portfolio">
            <div class="upload__box">
               <div class="upload__btn-box">
                  <label class="upload__btn">
                     <p class="plus_btn_upload">+</p>
                     <input type="hidden" name="id" value="<?=$user_id;?>">
                     <input type="file" multiple="10" class="form-control upload__inputfile" name="image[]" data-max_length="20" required >
                  </label>
                  <div class="all-images"> </div>
               </div>
               <div class="upload__img-wrap"></div>
            </div>
         </div>
         <button type="submit" class=" custom-btn bnt-fill-green btn_submit_approval"> Create & Submit for Approval</button>
      </form>
   </div>
</div>
<!--get ip address-->
<script type="text/javascript">
   $(document).ready(function(){
       var maxField = 10; //Input fields increment limitation
       var addButton = $('.add_button'); //Add button selector
       var wrapper = $('.field_wrapper'); //Input field wrapper
       var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a></div>'; //New input field html 
       var x = 1; //Initial field counter is 1
       
       //Once add button is clicked
       $(addButton).click(function(){
           //Check maximum number of input fields
           if(x < maxField){ 
               x++; //Increment field counter
               $(wrapper).append(fieldHTML); //Add field html
           }
       });
       
       //Once remove button is clicked
       $(wrapper).on('click', '.remove_button', function(e){
           e.preventDefault();
           $(this).parent('div').remove(); //Remove field html
           x--; //Decrement field counter
       });
   });
</script>
<?php include('inc/footer.php'); ?> 
<script src="inc/js/instantjob.js"></script>
<script>
   $(document).ready(function(){
       
       $('#two-tab').click(function(){
           $('.service-create').css('display', 'none')
           $('.post-create').css('display', 'block')
       });
       
        $('#one-tab').click(function(){
           $('.service-create').css('display', 'block')
           $('.post-create').css('display', 'none')
       });
       
   });
   
   
   
</script>
<!--places search script start-->
<script src="https://maps.googleapis.com/maps/api/js?key=<?=$googlekey['value'];?>&amp;libraries=places&amp;callback=initPlaces" async="" defer=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>  
<script>
   let autocomplete;
   let placeSearch;
   let componentForm = {
     street_number: 'short_name',
     route: 'long_name',
     locality: 'long_name',
     administrative_area_level_1: 'short_name',
     country: 'long_name',
     postal_code: 'short_name'
   };
   
   window.initPlaces = function() {
     if ( jQuery( '#autocomplete-address' ).length ) {
       autocomplete = new google.maps.places.Autocomplete(
         document.getElementById( 'autocomplete-address' ),
         { types: [ 'geocode' ] }
       );
       autocomplete.addListener( 'place_changed', fillInAddress );
     }
   };
   
   function fillInAddress() {
   
     // Get the place details from the autocomplete object.
     let place = autocomplete.getPlace();
   
     // Get each component of the address from the place details
     // and fill the corresponding field on the form.
     for ( let i = 0; i < place.address_components.length; i++ ) {
       let addressType = place.address_components[i].types[0];
       if ( componentForm[addressType]) {
         let val = place.address_components[i][componentForm[addressType]];
         document.getElementById( addressType ).value = val;
       }
     }
     let streetNum = jQuery( '#street_number' ).val();
     let streetName = jQuery( '#route' ).val();
     let city = jQuery( '#locality' ).val();
     let state = jQuery( '#administrative_area_level_1' ).val();
     let zip = jQuery( '#postal_code' ).val();
     jQuery( 'input[name="rep_address_1"]' ).val( streetNum + ' ' + streetName );
     jQuery( 'input[name="rep_city"]' ).val( city );
     jQuery( 'input[name="rep_state"]' ).val( state );
     jQuery( 'input[name="rep_zip"]' ).val( zip );
     jQuery( '#autocomplete-address' ).val( '' );
   }
   
   function geolocate() {
     if ( navigator.geolocation ) {
       navigator.geolocation.getCurrentPosition( function( position ) {
         var geolocation = {
           lat: position.coords.latitude,
           lng: position.coords.longitude
         };
         var circle = new google.maps.Circle({
           center: geolocation,
           radius: position.coords.accuracy
         });
         autocomplete.setBounds( circle.getBounds() );
       });
     }
   }
   
   jQuery( '#autocomplete-address' ).on( 'focus', function() {
     geolocate();
   });
   
   jQuery( '#manual_address' ).on( 'change', function( e ) {
     var checked = e.target.checked;
     if ( true === checked ) {
       jQuery( 'input[name="rep_address_1"]' ).removeAttr( 'disabled' );
       jQuery( 'input[name="rep_address_2"]' ).removeAttr( 'disabled' );
       jQuery( 'input[name="rep_city"]' ).removeAttr( 'disabled' );
       jQuery( 'input[name="rep_state"]' ).removeAttr( 'disabled' );
       jQuery( 'input[name="rep_zip"]' ).removeAttr( 'disabled' );
     } else {
       jQuery( 'input[name="rep_address_1"]' ).attr( 'disabled', 'true' );
       jQuery( 'input[name="rep_address_2"]' ).attr( 'disabled', 'true' );
       jQuery( 'input[name="rep_city"]' ).attr( 'disabled', 'true' );
       jQuery( 'input[name="rep_state"]' ).attr( 'disabled', 'true' );
       jQuery( 'input[name="rep_zip"]' ).attr( 'disabled', 'true' );
     }
   });        
                    
                     
</script>
<!--places search script end-->
<!--currency convertor start-->
<script>
   const curItem1 = document.querySelector(".cur-item-1");
   const curItem2 = document.querySelector(".cur-item-2");
   const curInput1 = document.querySelector(".cur-input-1");
   const curInput2 = document.querySelector(".cur-input-2");
   
   const rateBox = document.querySelector(".rate-box");
   const changeBtn = document.querySelector(".fa-retweet");
   
   function calc() {
   const curItem1Value = curItem1.value;
   const curItem2Value = curItem2.value;
   
   fetch(`https://api.exchangerate-api.com/v4/latest/${curItem1Value}`)
   .then((res) => res.json())
   .then((data) => {
   const rate = data.rates[curItem2Value];
   
   rateBox.textContent = `1 ${curItem1Value} = ${rate.toFixed(
   4
   )} ${curItem2Value}`;
   
   curInput2.value = (curInput1.value * rate).toFixed(2);
   });
   }
   
   function listeners() {
   curItem1.addEventListener("change", calc);
   curItem2.addEventListener("change", calc);
   curInput1.addEventListener("input", calc);
   curInput2.addEventListener("input", calc);
   curInput2.addEventListener("span", calc);
   
   changeBtn.addEventListener("click", () => {
   [curItem1.value, curItem2.value] = [curItem2.value, curItem1.value];
   calc();
   changeBtn.classList.toggle("rotate-btn");
   });
   }
   
   window.onload = () => {
   listeners();
   calc();
   };
   
   
</script>
<!--currency convertor end-->
<!--character count discription-->
<script>
   // topic script
   function charcount(str) {
   var lng = str.length ;
   document.getElementById("charcount").innerHTML = lng;
   }
   // discription script
   function charcountupdate(String) {
   var lngr = String.length;
   document.getElementById("charcoun").innerHTML = lngr;
   }
</script>
<script>
   var textarea = document.getElementById("myTextarea");
   textarea.addEventListener("input", function() {
     var prefix = "I need help ";
     if (textarea.value.substr(0, prefix.length) !== prefix) {
       textarea.value = prefix;
     }
   });
   
   
   
   
   // script of textarea to save the data if accidently or intentionally go back 
    // Get the text area element
       const textArea = document.getElementById('myTextarea');
   
       // Check if there is any saved data in localStorage
       if (localStorage.getItem('textAreaDatas')) {
         textArea.value = localStorage.getItem('textAreaDatas');
       }
   
       // Listen for changes in the text area
       textArea.addEventListener('input', function() {
         // Save the data in localStorage
         localStorage.setItem('textAreaDatas', textArea.value);
       });
   
       // Clear the saved data when the page is unloaded
       window.addEventListener('beforeunload', function() {
         localStorage.setItem('textAreaDatas');
       }); 
       
       
   // script of textarea to save the data if accidently or intentionally go back 
    // Get the text area element
       const textBoxes = document.getElementById('textboxes');
   
       // Check if there is any saved data in localStorage
       if (localStorage.getItem('textAreaDataa')) {
         textBoxes.value = localStorage.getItem('textAreaDataa');
       }
   
       // Listen for changes in the text area
       textBoxes.addEventListener('input', function() {
         // Save the data in localStorage
         localStorage.setItem('textAreaDataa', textBoxes.value);
       });
   
       // Clear the saved data when the page is unloaded
       window.addEventListener('beforeunload', function() {
         localStorage.setItem('textAreaDataa');
       });
       
       
</script>
<!--character count discription-->