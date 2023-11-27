<?php
    $page = 'Create Job';
    include('inc/header.php'); 
    $jobid = $_GET['id'];
    $editjob = $obj->GetJobById($jobid);

$value = $editjob['topic'];
$remove = "I need help";
  $newtopic = str_replace($remove, "", $value);
  $job = $value;
  $post_imgs = $obj->GetImgByTopic($job);
  $state = $editjob['State'];
  $city = $editjob['City'];
        ?>
<?php include('inc/sidebar.php'); ?>     
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
<div class="middle_container" id="myTabContent">
    <div class="tab-pane fade show active wrap_content_mid" id="one" role="tabpanel" aria-labelledby="one-tab">
        <div class="head-mid">
            <h2>Create a Job Offer (Duplicate)  <?//=$_SESSION['Country'];?><b class="create-offr-heading"></b></h2>
        </div>
        <form action="admin/inc/process.php?action=CreateJob" method="post" id="duplicateform" class="service-form example" enctype="multipart/form-data">
            <input type="hidden" class="form-control" placeholder="Name" value="<?=$_SESSION['Userid'];?>" name="userid" required>
            <div class="d-flex justify-content-between">
                <label> Topic</label>
                <div>
                    <span style="color: #495057;" id=charcount>0</span>
                    <span style="color: #495057;" id=charcount>/ 80</span> 
                </div>
            </div>
                     <div class="form-text">
              <textarea id="myTextarea"  rows="2" placeholder="Write" name="topic"  onkeyup="charcount(this.value)" maxlength="80" required>I need help<?php //echo $newtopic; ?></textarea>


       <input type=hidden name="postid" value="<?=$editjob['id'];?>">
<?php if($_GET['msg'] == 'duplicate') {echo '<span style="color:red;">Topic name already exists! </span>';} ?>
     
    </div> 
            
            <div class="d-flex justify-content-between">
                <label>Description</label>
                <div>
                    <span style="color: #495057;" id=charcoun>0</span>
                    <span style="color: #495057;" id=charcoun>/ 1000 </span>
                </div>
            </div>
            <textarea class="form-control" name="description" rows="4" placeholder="Write something here..." id="textbox" onkeyup="charcountupdate(this.value)" maxlength="500" required><?=$editjob['description'];?></textarea>
                <label>Budget</label>
            <div class="row select_budget">
                <div class="col-lg-4 col-6 wrapper_price">
                    <div class="input-group cur-box">
                        <input type="text" class="form-control cur-input-1" name="price" value="<?=$editjob['price'];?>" required>
                       
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
                        <option value="<?=$editjob['area'];?>" selected><?=$editjob['area'];?></option>
                        <option value="Worldwide">With in my city</option>
                        <option value="Local">With in my state</option>
                        <option value="Overseas">Across Malaysia</option>
                    </select>
                </div>

            </div>
          <?php include('state-city.php');?>
          
            <label>Deadline -How soon you need this?</label> 
            <input type="text" name="how_fast" class="form-control" value="<?=$editjob['fast_complete'];?>" placeholder="Time to complete the job" required>
            <label>Upload Photos</label>
            <div class="bio-img-portfolio">
                <div class="upload__box">
                    <div class="upload__btn-box">
                        <label class="upload__btn">
                             <p class="plus_btn_upload">+</p>
                            <input type="hidden" name="id" value="<?=$user_id;?>">
                            <input type="file" multiple="" class="form-control upload__inputfile" name="image" data-max_length="20">
                            <input type="hidden" multiple="" class="form-control upload__inputfile" name="editimage" value="<?=$editjob['photos'];?>">
                        </label>
                        <div class="all-images profile_all_img-wrap">
                   <?php 
                         $i=0;
                         while($rows = mysqli_fetch_array($post_imgs)){  
                        //  print_r($rows);
                         ?>
                     <input type="hidden" multiple="" class="form-control upload__inputfile" name="image[]" value="<?=$rows['photos'];?>">

                      <div class='upload__img-box'>
                          <div style='background-image: url("admin/assets/img/services/<?=$rows['photos'];?>")' data-number='<?=$i;?>' data-file='<?=$rows['photos'];?>' class='add-img photo img-bg'>
                              <div class='upload__img-close close  img-wrap'>
                                  <span id='del' class='edit_img-close'>&times;</span>
                              </div></div></div>
                        <?php $i++; } ?>
                   </div>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDiKmRh2vEg2hiV1ZIVeyNlxPjVegpChvE&amp;libraries=places&amp;callback=initPlaces" async="" defer=""></script>
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
		// Function to set cookie
		function setCookie(name, value, days) {
			var expires = "";
			if (days) {
				var date = new Date();
				date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
				expires = "; expires=" + date.toUTCString();
			}
			document.cookie = name + "=" + (value || "") + expires + "; path=/";
		}

		// Function to get cookie
		function getCookie(name) {
			var nameEQ = name + "=";
			var ca = document.cookie.split(';');
			for(var i=0;i < ca.length;i++) {
				var c = ca[i];
				while (c.charAt(0)==' ') c = c.substring(1,c.length);
				if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
			}
			return null;
		}

		// Save form data on change of any input field
		document.addEventListener("DOMContentLoaded", function() {
			var inputs = document.querySelectorAll("input");
			var textarea = document.querySelectorAll("textarea");
			for (var i = 0; i < inputs.length; i++) {
				inputs[i].addEventListener("change", function(event) {
					setCookie(event.target.name, event.target.value, 1);
				});
			}
			// Restore form data on page load
			for (var i = 0; i < inputs.length; i++) {
				var value = getCookie(inputs[i].name);
				if (value) {
					inputs[i].value = value;
				}
			}
		});
		
 


	</script>
	 <script>
        $(document).ready(function () {
            // Set initial value of textarea
            $('#myTextarea').val('I need help ');

            updateCharCount();

            // Add focus event listener to textarea
            $('#myTextarea').on('focus', function () {
                // Check if value starts with "I will help"
                if (!$(this).val().startsWith('I need help ')) {
                    // Prepend "I will help " (with a space) to the value of the textarea
                    $(this).val('I need help ' + $(this).val());

                    // Move the cursor to the end of the textarea
                    this.setSelectionRange(this.value.length, this.value.length);
                }
            });

            // Add input event listener to textarea
            $('#myTextarea').on('input', function () {
                // Check if value starts with "I will help"
                if (!$(this).val().startsWith('I need help ')) {
                    // Reset the value of the textarea to "I will help "
                    $(this).val('I need help ');

                    // Move the cursor to the end of the textarea
                    this.setSelectionRange(this.value.length, this.value.length);
                }
                // Update character count
                updateCharCount();
            });

            function updateCharCount() {
                $('#charcount').text($('#myTextarea').val().length);
            }
        });
        
var textarea = document.getElementById("myTextarea");
textarea.addEventListener("input", function() {
  var prefix = "I need help ";
  if (textarea.value.substr(0, prefix.length) !== prefix) {
    textarea.value = prefix;
  }
});

    </script>

<!--character count discription-->
  