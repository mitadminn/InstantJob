<?php 
    $page = 'Create Service';
    include('inc/header.php');   
    
    
// $trans_id = $_GET['id'];
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $editservice = $obj->GetServceById($id);
        
          $value = $editservice['topic'];
    $remove = "I will help";
  $newtopic = str_replace($remove, "", $value);
  $job = $value;
  $post_imgs = $obj->GetImgByTopic($job);
  $state = $editservice['State'];
  $city = $editservice['City'];
    include('inc/sidebar.php'); 
?>     
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
<div class="middle_container" id="myTabContent">
    <div class="tab-pane fade show active wrap_content_mid" id="one" role="tabpanel" aria-labelledby="one-tab">
        <div class="head-mid">
            <h2>Sell Your Service <b style="element.style {color: #ff0000;}"> </b></h2>
        </div>
        <div>
            <!-- for image and content -->
        </div>
        <form action="admin/inc/process.php?action=EditService" method="post" class="service-form example" enctype="multipart/form-data">
            <input type="hidden" class="form-control" placeholder="Name" value="<?=$_SESSION['Userid'];?>" name="userid" id="id" required>
            <div class="d-flex justify-content-between">
                <label>Give your service a topic</label>
                <!-- Topic Textarea -->
<div class="words_counter">
    <span style="color: #495057;" id="charcount">0</span>
    <span style="color: #495057;">/ 80</span>
</div>
            </div>
<textarea id="myTextarea" rows="2" placeholder="Write" name="topic" onkeyup="charcount('myTextarea', 'charcount', 80)" maxlength="80" required>I will help<?php echo $newtopic; ?></textarea>
                <div class="form-text">
      <input type="hidden" name="serviceid" value="<?=$editservice['id'];?>">
    </div> 
            
            <div class="d-flex justify-content-between">
                <label>Description</label>
               <div class="words_counter">
    <span style="color: #495057;" id="charcoun">0</span>
    <span style="color: #495057;">/ 2000 </span>
</div>
            </div>

            <textarea class="form-control" name="description" rows="5" placeholder="Write something here..." id="textbox" onkeyup="charcount('textbox', 'charcoun', 2000)" maxlength="2000" required><?=$editservice['description'];?></textarea>

            <div class="row select_budget">
                <div class="col-lg-4 col-6 prize_service_controller wrapper_price">
                    <label>Price</label>
                    <div class="input-group cur-box">
                        <input type="text" class="form-control cur-input-1" name="postprice" value="<?=$editservice['price'];?>" aria-label="Text input with dropdown button" required>
                         
                    </div>
                    <div class="input-group cur-box total_prize_service">
                        <input type="hidden" class="form-control cur-input-2" name="price" aria-label="Text input with dropdown button" style="border: unset; background: transparent;">
                        <input type="hidden" class="form-control cur-item-2" name="currency" value="<?=$geoLocationData['currency_code'];?>" aria-label="Text input with dropdown button" required>
                        <input type="hidden" class="form-control cur-item-2" name="country" value="<?=$geoLocationData['country'];?>" aria-label="Text input with dropdown button" required>

                    </div>
                </div>

                <div class="col-md-12 p-0">
                    <label>My service will only be available </label>
                    <select class="form-control" name="area" required>
                        <option hidden value="<?=$editservice['area'];?>"><?=$editservice['area'];?></option>
                         <option value="Worldwide">With in my city</option>
                        <option value="Local">With in my state</option>
                        <option value="Overseas">Across Malaysia</option>
                    </select>
                </div>
            </div>
        <?php include('state-city.php');?>
            <div class="mt-3">
            <label>Deadline -How soon you need this?</label>
            <input type="text" name="how_fast" id="how_fast" value="<?=$editservice['fast_complete'];?>" class="form-control" placeholder="Time to complete the job" required>
            <label>Preferred day to work</label>
            <select class="form-control" name="preferedday" id="preferedday" required>
                <option hidden>Select</option>
                <option value="Anytime">Anytime</option>
                <option value="<?=$editservice['prefer_day'];?>" selected><?=$editservice['prefer_day'];?></option>
                <option value="Weekday">Weekday</option>
                <option value="Weekend">Weekend</option>
            </select>
            </div>
            <div class="mt-3">
            <label>Upload Photos</label>
            <div class="bio-img-portfolio">
                <div class="upload__box">
                    <div class="upload__btn-box">
                        <label class="upload__btn">
                           <p class="plus_btn_upload">+</p>
                            <input type="hidden" name="id" value="<?=$user_id;?>" required>
                            <input type="file" multiple="" class="form-control upload__inputfile" name="image[]" data-max_length="20">
                            
                         </label>
                        <div class="all-images profile_all_img-wrap">
                      <?php 
                         $i=1;
                         while($rows = mysqli_fetch_array($post_imgs)){  
                        //  print_r($rows);
                         ?>

                      <div class='upload__img-box'>
                          <input type="hidden" multiple="" class="form-control upload__inputfile" name="editimage[]" value="<?=$rows['photos'];?>">
                          <input type="hidden" name="imageid" value="<?=$rows['id'];?>">
                          <div style='background-image: url("admin/assets/img/services/<?=$rows['photos'];?>")' data-number='<?=$i;?>' data-file='<?=$rows['photos'];?>' class='add-img photo img-bg'>
                              <div class='upload__img-close close  img-wrap'>
                                  <span id='del' class='edit_img-close'>&times;</span>
                              </div>
                        </div>
                              </div>
                        <?php $i++; } ?>
                    
                    <div class="upload__img-wrap"></div>
                    </div>
                    </div>
                    
                </div>
            </div>
            </div>
            <div class="field_wrapper">
                <div class="d-flex justify-content-between">
                    <label>Add-on tasks</label>
                    <div class="words_counter">
                        <span style="color: #495057;" id=charcounter>0</span>
                        <span style="color: #495057;" id=charcounter>/ 80</span>
                    </div>
                </div>
                <label class="lst-plus">
                <input onkeyup="countupdate(this.value)" type="text" id="field_name" class="bg-white font-weight-bold" value="" placeholder="Click here to add more task" maxlength="80"/ disabled>
                </label>
                <a href="javascript:void(0);" class="add_button create_icon_wrap" title="Add field"><i class="fa-solid fa-plus"></i> </a>
            </div>
            <button type="submit" name="" value="submit" onclick="return clickButton();" class=" custom-btn bnt-fill-green btn_submit_approval"> Create & Submit for Approval</button>
        </form>
        <script type="text/javascript">
            $(document).ready(function(){
                var maxField = 10;
                var addButton = $('.add_button'); 
                var wrapper = $('.field_wrapper'); //Input field wrapper
                var fieldHTML = '<div class="addonss"><input type="text" name="field_name[]" value="" class="addon1"/><input type="text" name="field_price[]" value=""  placeholder="RM00" class="addon2"/><a href="javascript:void(0);" class="remove_button create_remove_wrap"><i class="fa-solid fa-minus"></i></a></div>'; //New input field html 
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
            // Add on task script
            function countupdate(Strings) {
            var lngth = Strings.length;
            document.getElementById("charcounter").innerHTML = lngth;
            }
                                     
        </script>
        <!--character count discription-->
    </div>
</div>
<?php include('inc/footer.php'); ?> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 
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
 
<script>
    function charcount(inputId, outputId, maxChars) {
        var inputStr = document.getElementById(inputId).value;
        var charCount = inputStr.length;
        var remainingChars = maxChars - charCount;

        // Update character count
        document.getElementById(outputId).innerHTML = charCount;
 
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
		
		
var textarea = document.getElementById("myTextarea");
textarea.addEventListener("input", function() {
  var prefix = "I will help ";
  if (textarea.value.substr(0, prefix.length) !== prefix) {
    textarea.value = prefix;
  }
});
 
	</script>
<!--character count discription-->