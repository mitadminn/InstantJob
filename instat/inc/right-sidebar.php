<style>
button#showData {margin: 0;color: #707070;font-size: 13px;padding: 8px 12px;border-radius: 15px;border: 1px solid #D2D2D2; background: #fff;width: 51%;  margin-bottom: 10px;font-weight: 700;text-align: center;letter-spacing: var(--unnamed-character-spacing-0);color: var(--unnamed-color-707070);text-align: center;color: #707070;}
input#showJobData {margin: 0;color: #707070;font-size: 13px;padding: 8px 12px;border-radius: 15px;border: 1px solid #D2D2D2; background: #fff;width: 51%;  margin-bottom: 10px;font-weight: 700;text-align: center;letter-spacing: var(--unnamed-character-spacing-0);color: var(--unnamed-color-707070);text-align: center;color: #707070;}
button#filter2 {margin: 0;color: #707070;font-size: 13px;padding: 8px 12px;border-radius: 15px;border: 1px solid #D2D2D2; background: #fff;width: 51%;  margin-bottom: 10px;font-weight: 700;text-align: center;letter-spacing: var(--unnamed-character-spacing-0);color: var(--unnamed-color-707070);text-align: center;color: #707070;}
button#JObfilter2 {margin: 0;color: #707070;font-size: 13px;padding: 8px 12px;border-radius: 15px;border: 1px solid #D2D2D2; background: #fff;width: 51%;  margin-bottom: 10px;font-weight: 700;text-align: center;letter-spacing: var(--unnamed-character-spacing-0);color: var(--unnamed-color-707070);text-align: center;color: #707070;}
@media (min-width: 0) and (max-width: 567px){ 
    button#showData{font-size: 10px; padding:3px; margin: 0 0 0 5px;} 
}
input[name=area] {display: none}
input[name=sort] {display: none}
.donate-now {list-style-type: none; margin: 25px 0 0 0; padding: 0;}
li {float: left;margin: 0 5px 0 0;}
label.lbl {margin-top: 10px;color: #707070;font-size: 12px;padding: 6px 6px;border-radius: 20px;border: 1px solid #D2D2D2;
background: #fff;width: 48%;margin-bottom: 10px;font-weight: 700;text-align: center;letter-spacing: var(--unnamed-character-spacing-0);
color: var(--unnamed-color-707070);text-align: center;color: #707070;}
label.lbl:checked+label,
.Checked+label {background: yellow;}
div#log {display: grid;}
.lbl-1{width:30% !important;}
.lbl-2{width:42% !important;}
.lbl-3{width:38% !important;}
.lbl-a{width:30% !important;}
.lbl-b,.lbl-c{width:35%!important;}
 .lbl:focus{
cursor: pointer;
background-color: #000;
color: #fff;
}
.lbl:active {cursor: pointer;
background-color: #000;
color: #fff;}
label.lbl:hover{border:1px solid #000; color:#fff; background:#000;}
input{cursor: pointer;}
.h4_title h4{margin-top:24px;}
</style>

<div class="instant-rightbar">
    <?php if($page == 'Service Provider' || $page == 'Reviews' || $page == 'Summary' || $page == 'Job Details') { ?>

                            <!--<div class="top-rt-h head-mid h4_title">-->
                            <!--    <h2>Keywords</h2>-->
                            <!--</div>-->
                            <!--<form action="" class="form-2">-->
                            <!--    <input type="text" placeholder="Search" onkeyup="showResult(this.value)">-->
                            <!--</form>-->
                            <div class="li-rt h4_title">
                                <h4>Filter</h4>
                                

                                <div id="log">
                                    <label class="lbl lbl-1">
                                    <input type="radio" class="btn btn-default" name="area" value="Local" id="showData">
                                    LOCAL
                                </label>
                            
                                <label class="lbl lbl-2">
                                    <input type="radio" class="btn btn-default" name="area" value="Overseas" id="showData">
                                    OVERSEAS
                                </label>
                                
                                <label class="lbl lbl-3">
                                    <input type="radio" class="btn btn-default" name="area" value="Near me" id="showData">
                                    NEAR ME
                                </label>
        
                            
                                <h4>Sort by </h4>
                                <label class="lbl lbl-a">
                                    <input type="radio" class="btn btn-default" name="sort" value="new" id="filter2" style="cursor: pointer;">
                                    NEW
                                </label>
                            
                          
                                
                                <label class="lbl lbl-b">
                                    <input type="radio" class="btn btn-default" name="sort" value="high" id="filter2" style="cursor: pointer;">
                                    $ HIGH
                                </label>
                                
                                <label class="lbl lbl-c">
                                    <input type="radio" class="btn btn-default" name="sort" value="low" id="filter2" style="cursor: pointer;">
                                    $ LOW
                                </label>
                                </div>
                                
                                
                                
                                <!--<button class="btn btn-default" value="new" id="filter2" style="cursor: pointer;">NEW</button>-->
                                <!--<button class="btn btn-default" value="expiring" id="filter2" style="cursor: pointer;">EXPIRING</button>-->
                                <!--<button class="btn btn-default" value="high" id="filter2" style="cursor: pointer;">$ HIGH</button>-->
                                <!--<button class="btn btn-default" value="low" id="filter2" style="cursor: pointer;">$ HIGH</button>-->
                                <!--<button class="btn btn-default" value="deadline" id="filter2" style="cursor: pointer;">DEADLINE</button>-->
                                 
                            </div>
                            
                            <?php } if($page =='Job Marketplace') { ?>

                            <!--                  <div class="top-rt-h head-mid h4_title">-->
                            <!--    <h2>Keywords</h2>-->
                            <!--</div>-->
                            <!--<form action="" class="form-2">-->
                            <!--    <input type="text" placeholder="Search" onkeyup="showResult(this.value)">-->
                            <!--</form>-->
                            <div class="li-rt h4_title">
                                <h4>Filter</h4>
                                

                                <div id="log">
                                    <label class="lbl lbl-1">
                                    <input type="radio" class="btn btn-default" name="area" value="Local" id="showData">
                                    LOCAL
                                </label>
                            
                                <label class="lbl lbl-2">
                                    <input type="radio" class="btn btn-default" name="area" value="Overseas" id="showData">
                                    OVERSEAS
                                </label>
                                
                                <label class="lbl lbl-3">
                                    <input type="radio" class="btn btn-default" name="area" value="Near me" id="showData">
                                    NEAR ME
                                </label>
        
                            
                                <h4>Sort by </h4>
                                <label class="lbl lbl-a">
                                    <input type="radio" class="btn btn-default" name="sort" value="new" id="filter2" style="cursor: pointer;">
                                    NEW
                                </label>
                            
                             <label class="lbl">
                                    <input type="radio" class="btn btn-default" name="sort" value="expiring" id="JObfilter2" style="cursor: pointer;">
                                    EXPIRING
                                </label>
                                
                                <label class="lbl lbl-b">
                                    <input type="radio" class="btn btn-default" name="sort" value="high" id="filter2" style="cursor: pointer;">
                                    $ HIGH
                                </label>
                                
                                <label class="lbl lbl-c">
                                    <input type="radio" class="btn btn-default" name="sort" value="low" id="filter2" style="cursor: pointer;">
                                    $ LOW
                                </label>
                                </div>
                                
                                
                                
                                <!--<button class="btn btn-default" value="new" id="filter2" style="cursor: pointer;">NEW</button>-->
                                <!--<button class="btn btn-default" value="expiring" id="filter2" style="cursor: pointer;">EXPIRING</button>-->
                                <!--<button class="btn btn-default" value="high" id="filter2" style="cursor: pointer;">$ HIGH</button>-->
                                <!--<button class="btn btn-default" value="low" id="filter2" style="cursor: pointer;">$ HIGH</button>-->
                                <!--<button class="btn btn-default" value="deadline" id="filter2" style="cursor: pointer;">DEADLINE</button>-->
                                 
                            </div>
							<?php } if($page == 'Profile' || $page == 'Profile Edit' || $page == 'Portfolio' || $page == 'Bank Details') { ?>
							<!--<div class="top-rt-h head-mid">-->
       <!--                         <h2>Profile Settings</h2>-->
       <!--                     </div>-->
       <!--                     <div class="li-rt new-li-profl" id="panel">-->
							<!--	<a href="profile-edit.php?id=<?=$user_information['id'];?>"><p class=" active edit">Edit Profile</p></a>-->
       <!--                         <a href="portfolio.php?id=<?=$user_information['id'];?>"><p class="upload">Upload Portfolio</p></a>-->
       <!--                         <a href=""><p class="update">Update Account ID</p></a> -->
       <!--                         <a href="bank-deatils"><p class="update">Bank Account </p></a>-->
       <!--                         <br>-->
       <!--                     </div>-->
							<?php } if($page == 'Wallet') { ?>
							<div class="top-rt-h head-mid">
                                <h2>Wallet</h2>
                            </div>
                            <div class="li-rt new-li-profl" id="panel">
                               <div class="button-hist">
                                 <a href="https://mitdevelop.com/instajobs/transaction"><button type="button" class="btn btn-success btn-history">View Transaction History</button>   </a>
                                </div>
                               
                            </div>
							<?php } if($page == 'Manage Post') { ?>
							
							 <div class="top-rt-h head-mid">
                                <h2>Filter</h2>
								<div class="rt-side" >
 									<div class="li-rt ALL-RI new-li-profl">
										<a href=""><p class="edit">ALL</p></a>
										<a href=""><p class="edit">SERVICES</p></a>
										<a href=""><p class="edit">JOBS</p></a>
									</div>
								</div>
                            </div>
 							
							<?php } if($page == 'Transaction') {  ?>
							
							<div class="top-rt-h head-mid">
                                <h2></h2>
                            </div>
                            <div class="li-rt new-li-profl" id="panel">
                                <a href="#"><p class="edit">Download receipts</p></a>
                                <a href="#"><p class="upload">Contact support</p></a>
                                <br>
                            </div>
                            
							<?php } if($page == 'Message' || $page == 'Job Status') { ?>
							
							<div class="top-rt-h head-mid">
								<h2>Category</h2>
							</div>
						   <div class="li-rt side nav nav-tabs msg-job ">
							   <a data-toggle="tab" href="#message"><p class="active msg-tab">MESSAGE</p></a>
							   <a data-toggle="tab" href="#job"><p class="active msg-tab">JOB STATUS</p></a>
						   </div>
				   
							<?php  } if($page == 'Create Service' || $page == 'Create Job') { ?>

                            <div class="top-rt-h head-mid">
                                <h2>Keywords</h2>
                            </div>
                            <form action="" class="form-2">
                                <input type="text" placeholder="Search">
                            </form>
                            <div class="li-rt">
                                <h4>Filter</h4>
                                <a href=""><p>LOCA</p></a>
                                <a href=""><p>OVERSEAS</p></a>
                                <a href=""><p>NEAR ME</p></a>
                                <br>
                                <h4>Sort by </h4>
                                <a href=""><p>NEW</p></a>
                                <a href=""><p>EXPIRING</p></a>
                                <a href=""><p>$ HIGH</p></a>
                                <a href=""><p>$ LOW</p></a> 
                                <a href=""><P>DEADLINE</P></a>
                            </div>
							
							
							
							<?php } //if($page == 'Manage Posts') {  }?>
                         </div>
                         
                         
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>                
        <script type='text/javascript'>
    //  function showUser(isi){
    //      alert(isi);
    //     $.ajax({
    //         // this url to this page again is no problem
    //         url: "http://<?php echo $_SERVER['SERVER_NAME']; ?>/code/for/the/filter.php",
    //         //this methos is post, so you can use $_POST['name']
    //         type: 'POST',
    //         // your code is compatible with this, can catch nams as post
    //         data: "name=" + isi,
    //         // some alert appeared but it's blank its mean its no problem
    //         success: function(data){
    //             $("#here").html(data).show;
    //             //to check if data error
    //         }
    //     });
    //  }
    </script>                  
<script>
    // function showUser(str) {
    //   if (str == "") {
    //     document.getElementById("txtHint").innerHTML = "";
    //     return;
    //   } else {
    //     var xmlhttp = new XMLHttpRequest();
    //     xmlhttp.onreadystatechange = function() {
    //       if (this.readyState == 4 && this.status == 200) {
    //         document.getElementById("txtHint").innerHTML = this.responseText; 
    //       }
    //     };
    //     xmlhttp.open("GET","admin/inc/process.php?filter1="+str,true);
    //     xmlhttp.send();
    //   }
    // }
    
     /* Service Provider */
$(document).on('click','#showData',function(e){
        var filter1 = $(this).val();
        
        //alert(filter1);
      $.ajax({    
        type: "GET",
        url: "admin/inc/process.php?filter1="+filter1,             
        dataType: "html",                  
        success: function(data){                    
            $("#searchdata").html(data); 
            $("#servicedata").hide(); 
         }
    });
      
});

    /* Job Marketplace */
 $(document).on('click','#showJobData',function(e){
        var filter1 = $(this).val();
      $.ajax({    
        type: "GET",
        url: "admin/inc/process.php?jobfilter="+filter1,             
        dataType: "html",                  
        success: function(data){                    
            $("#searchjobdata").html(data); 
            $("#jobdata").hide(); 
         }
    });
});
 /* Service Provider */

   $(document).on('click','#filter2',function(e){
        var filter2val = $(this).val();
        var filter1 = $('#showData').val();
        if( $('#showData').is(':checked') ){
    // alert("Checkbox Is checked");
}
else{
    // alert("Checkbox Is not checked");
}
        // var filter1 = $('#showData').val();
        // alert(filter2val);
        // alert(filter1);
      $.ajax({    
        type: "GET",
        url: "admin/inc/process.php?filter2="+filter2val,             
        dataType: "html",                  
        success: function(data){                    
            $("#searchdata").html(data); 
            $("#servicedata").hide(); 
         }
    });
      
 });

 /* Job Marketplace */
  $(document).on('click','#JObfilter2',function(e){
        var filter2val = $(this).val();
    
    $.ajax({    
        type: "GET",
        url: "admin/inc/process.php?filter3="+filter2val,             
        dataType: "html",                  
        success: function(data){                    
            $("#searchjobdata").html(data); 
            $("#jobdata").hide(); 
         }
    });
    
    
});
 </script>

<script>

 /* Keyword Search for Service Provider */
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
     return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
       document.getElementById("livesearch").innerHTML=this.responseText; 
       document.getElementById("livesearch").style.border="1px solid red;";
     $("#servicedata").hide(); 
    }else {
          $("#servicedata").show();
    }
  }
  xmlhttp.open("GET","admin/inc/process.php?searchservice="+str,true);
  xmlhttp.send();
}


/*  Keyword Search for service provider */

function showJobResult(str) {
  if (str.length==0) {
     document.getElementById("livejobsearch").innerHTML=""; 
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livejobsearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid red";
      $("#jobdata").hide(); 
    } else {
        
         $("#jobdata").show();
    }
  }
  xmlhttp.open("GET","admin/inc/process.php?searchjob="+str,true);
  xmlhttp.send();
}

</script>
<!------------active------------>
   <script
  src="https://code.jquery.com/jquery-3.6.1.js"></script>
  <script type="text/javascript">
    $(document).on('click','li-rt a' , function(){
        $(this).addClass('active').siblings().removeClass('active')
    })
  </script>
  <!------------active------------>
