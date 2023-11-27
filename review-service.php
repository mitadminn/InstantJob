<?php 
    $page = 'Service Review';
    include('inc/header.php'); ?>
<style></style>
<div class="">
<!-------- ASIDE SEC START -------->
<div class="row row-1">
<?php include('inc/sidebar.php'); ?>     
<!--first tab row start-->
<div class="row row-2">
    <div class="second-mid col-lg-8" id="myTabContent">
        <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
            <div class="head-mid">
                <h2>Sell Your Service </h2>
            </div>
            <div>
                <!-- for image and content -->
            </div>
            <!--next page aftr clicking on button-->
            <form action="" class="service-form example" id="on-clk-btn">
                <label>Give your service a topic</label>
                <div id="the-count">
                    <span id="current">0</span>
                    <span id="maximum">/ 300</span>
                </div>
                <textarea class="form-control" name="the-textarea" rows="2" placeholder="Write something here..." id="the-textarea" maxlength="300"></textarea>
                <label>Description</label>
                <div id="the-count">
                    <span id="current">0</span>
                    <span id="maximum">/ 300</span>
                </div>
                <textarea class="form-control" name="the-textarea" rows="4" placeholder="Write something here..." id="the-textarea" maxlength="300"></textarea>
                <div class="row">
                    <div class="col-md-6">
                        <label>Price</label>
                        <div class="input-group">
                            <input type="text" class="form-control" aria-label="Text input with dropdown button">
                            <select class="form-control" name="currency">
                                <option>MYR</option>
                                <option>USD</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Area</label>
                        <select class="form-control" name="area">
                            <option>Select</option>
                            <option>Area 1</option>
                            <option>Area 2</option>
                            <option>Area 3</option>
                        </select>
                    </div>
                </div>
                <label>How fast you can complete this</label>
                <input type="text" name="how_fast" class="form-control">
                <label>Preferred day to work</label>
                <select class="form-control">
                    <option>Select</option>
                    <option value="">Monday</option>
                    <option value="">Tuesday</option>
                    <option value="">Wednesday</option>
                    <option value="">Thursday</option>
                    <option value="">Friday</option>
                    <option value="">Saturday</option>
                </select>
                <div class="add-task">
                    <label>Add On Tasks</label>
                    <div class="input-task">
                        <input type="text" class="frst-task" >
                        <input type="text" class="frst-task" >
                    </div>
                </div>
                <div class="field_wrapper hide-wrapper">
                    <div>
                        <label class="lst-plus plus-resp">
                        <input class="inp-plus" type="text" name="field_name[]" value=""/>
                        </label>
                        <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fa-solid fa-plus"></i> </a>
                    </div>
                </div>
                <div>
                    <h3 class="title">Preview</h3>
                </div>
                <div class="img-p ">
                    <div class="hh-1"><img class="hhh" src="assets/img/photo-1472457897821-70d3819a0e24.avif"
                        alt=""></div>
                    <div class="all-cnt">
                        <div class="d-flex two-lb align-items-center    ">
                            <img class="sm-img" src="assets/img/dcc2ccd9.avif"
                                alt="">
                            <p class="pp mr-in ">billijeans88</p>
                            <div>
                                <div></div>
                            </div>
                        </div>
                        <p class="pp2">Cosplay special effect artist / makeup artist, suitable for
                            party...
                        </p>
                        <div class="d-flex justify-content-between">
                            <div class="star">
                                <img src="assets/img/star.svg" alt="">
                                <small>4.9 (108)</small>
                            </div>
                            <p><small>From </small> <b>399 MYR</b> </p>
                        </div>
                    </div>
                </div>
            </form>
            <!--END-->
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
        </div>
    </div>
    <div class="rt-side" >
        <div class="top-rt-h head-mid">
            <h2>Keywords</h2>
        </div>
        <form action="" class="form-2">
            <input type="text" placeholder="search">
        </form>
        <div class="li-rt">
            <h4>Filter</h4>
            <a href="">
                <p>LOCAL</p>
            </a>
            <a href="">
                <p>OVERSEAS</p>
            </a>
            <a href="">
                <p>NEAR ME</p>
            </a>
            <br>
            <h4>Sort by </h4>
            <a href="">
                <p>NEW</p>
            </a>
            <a href="">
                <p>EXPIRING</p>
            </a>
            <a href="">
                <p>$ HIGH</p>
            </a>
            <a href="">
                <p>$ LOW</p>
            </a>
            <a href="">
                <P>DEADLINE</P>
            </a>
        </div>
    </div>
</div>
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