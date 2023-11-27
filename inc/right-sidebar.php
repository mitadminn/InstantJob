<link rel="stylesheet" href="assets/css/right-sidebar.css">
<div class="instant-rightbar">
    <?php if($page == 'Service Provider') { ?>
    <div  class="li-rt h4_title"> 
        <h4>Filter</h4>
        <div id="log">
            
            <label class="btn-round lbl-4 active">
            <input type="radio" class="btn btn-default btnn1 active" name="area" value="Worldwide" id="showData" >
             WORLDWIDE
            </label>
            <label class="btn-round lbl-1">
            <input type="radio" class="btn btn-default btnn2" name="area" value="Local" id="showData" >
            LOCAL
            </label>
            <label class="btn-round lbl-2">
            <input type="radio" class="btn btn-default btnn3" name="area" value="Overseas" id="showData" >
            OVERSEAS
            </label>
            <label class="btn-round lbl-3">
            <input type="radio" class="btn btn-default btnn4" name="area" value="Near me" id="showData" >
            NEAR ME
            </label>
            <h4>Sort by </h4>
            <label class="btn-round sort1 active">
            <input type="radio" class="btn btn-default btnn5 active cursor-pointer" name="sort" value="new" id="filter2"  >
            NEW
            </label>
            <label class="btn-round sort2">
            <input type="radio" class="btn btn-default btnn6 cursor-pointer" name="sort" value="high" id="filter2" cursor-pointer>
            $ HIGH
            </label>
            <label class="btn-round sort3">
            <input type="radio" class="btn btn-default btnn7 cursor-pointer" name="sort" value="low" id="filter2" cursor-pointer>
            $ LOW
            </label>
            <input type="hidden" class="" value="service" id="pageid" >
        </div>
    </div>
    <?php } if($page =='Job Marketplace') { ?>
    <div class="li-rt h4_title">
        <h4>Filter</h4>
        <div id="log">
            <input type="hidden" class="" value="job" id="pageid" >
          <label class="btn-round lbl-4 active">
            <input type="radio" class="btn btn-default btnn1 active" name="area" value="Worldwide" id="showData">
            
            WORLDWIDE
            </label>
            <label class="btn-round lbl-1">
            <input type="radio" class="btn btn-default btnn2" name="area" value="Local" id="showData">
            LOCAL
            </label>
            <label class="btn-round lbl-2">
            <input type="radio" class="btn btn-default btnn3" name="area" value="Overseas" id="showData">
            OVERSEAS
            </label>
            <label class="btn-round lbl-3">
            <input type="radio" class="btn btn-default btnn4" name="area" value="Near me" id="showData" >
            NEAR ME
            </label>
            <h4>Sort by </h4>
            <label class="btn-round sort1 active">
            <input type="radio" class="btn btn-default btnn5 active cursor-pointer" name="sort" value="new" id="filter2"   >
            NEW
            </label>
            <label class="btn-round sort2">
            <input type="radio" class="btn btn-default btnn6 cursor-pointer" name="sort" value="high" id="filter2">
            $ HIGH
            </label>
            <label class="btn-round sort3">
            <input type="radio" class="btn btn-default btnn7 cursor-pointer" name="sort" value="low" id="filter2">
            $ LOW
            </label>
        </div>
    </div>
    <?php } if($page =='Message Service') { ?>
    <div class="top-rt-h head-mid">
        <h2>Category</h2>
    </div>
    <div class="side nav  msg-job " id="log">
       <a href="message?tab=msg"><button class="btn-round lbl-2 manage_post_wrap">MESSAGES</button></a>
        <a href="message?tab=msg-professional"><button class="active btn-round lbl-2 manage_post_wrap">SERVICES</button></a>
        <a href="message?tab=msg-job"><button class="btn-round lbl-2 manage_post_wrap">JOBS</button></a>
   </div>
    
    <?php } if($page =='Discussion') { ?>
    <div class="top-rt-h head-mid">
        <h2>Category</h2>
    </div>
    <div class="side nav  msg-job " id="log">
      <a href="message?tab=msg"><button class="active btn-round lbl-2 manage_post_wrap">MESSAGES</button></a>
        <a href="message?tab=msg-professional"><button class="btn-round lbl-2 manage_post_wrap">PROFESSIONAL SERVICES</button></a>
        <a href="message?tab=msg-job"><button class="btn-round lbl-2 manage_post_wrap">JOB MARKETPLACE</button></a>
   </div>
   <?php include('project-details.php'); ?>
    
    
    <?php } if($page =='Message Job') { ?>
    <div class="top-rt-h head-mid">
        <h2>Category</h2>
    </div>
    <div class="side nav  msg-job " id="log">
        <a href="message?tab=msg"><button class="btn-round lbl-2 manage_post_wrap">MESSAGES</button></a>
        <a href="message?tab=msg-professional"><button class="btn-round lbl-2 manage_post_wrap">PROFESSIONAL SERVICES</button></a>
        <a href="message?tab=msg-job"><button class="active btn-round lbl-2 manage_post_wrap">JOB MARKETPLACE</button></a>
   
    </div>
    <?php } if($page =='Propose Quote') { ?>
    <div class="top-rt-h head-mid">
        <h2>Category</h2>
    </div>
    <div class="side nav  msg-job " id="log">
       <a href="message?tab=msg"><button class="<?php if($_GET['tab'] == 'msg') { echo 'active';} else{}?> btn-round lbl-2 manage_post_wrap">MESSAGES</button></a>
        <a href="message?tab=msg-professional"><button class="<?php if($_GET['tab'] == 'msg-professional') { echo 'active';} else{}?> btn-round lbl-2 manage_post_wrap">PROFESSIONAL SERVICES</button></a>
        <a href="message?tab=msg-job"><button class="<?php if($_GET['tab'] == 'msg-job') { echo 'active';} else{}?> btn-round lbl-2 manage_post_wrap">JOB MARKETPLACE</button></a>
   
    </div>
    <?php } if($page =='Propose Quote Budget') { ?>
    <div class="top-rt-h head-mid">
        <h2>Category</h2>
    </div>
    <div class="side nav msg-job" id="log">
      <a href="message?tab=msg"><button class="<?php if($_GET['tab'] == 'msg') { echo 'active';} else{}?> btn-round lbl-2 manage_post_wrap">MESSAGES</button></a>
        <a href="message?tab=msg-professional"><button class="<?php if($_GET['tab'] == 'msg-professional') { echo 'active';} else{}?> btn-round lbl-2 manage_post_wrap">PROFESSIONAL SERVICES</button></a>
        <a href="message?tab=msg-job"><button class="<?php if($_GET['tab'] == 'msg-job') { echo 'active';} else{}?> btn-round lbl-2 manage_post_wrap">JOB MARKETPLACE</button></a>
   
    </div>
    <?php } if($page =='Propose Quote Final') { ?>
    <div class="top-rt-h head-mid">
        <h2>Category</h2>
    </div>
    <div class="side nav  msg-job " id="log">
        <a href="message?tab=msg"><button class="<?php if($_GET['tab'] == 'msg') { echo 'active';} else{}?> btn-round lbl-2 manage_post_wrap">MESSAGES</button></a>
        <a href="message?tab=msg-professional"><button class="<?php if($_GET['tab'] == 'msg-professional') { echo 'active';} else{}?> btn-round lbl-2 manage_post_wrap">PROFESSIONAL SERVICES</button></a>
        <a href="message?tab=msg-job"><button class="<?php if($_GET['tab'] == 'msg-job') { echo 'active';} else{}?> btn-round lbl-2 manage_post_wrap">JOB MARKETPLACE</button></a>
   
    </div>
 
    <?php } if($page == 'Profile' || $page == 'Profile Edit' || $page == 'Portfolio' || $page == 'Bank Details') { ?>
     <?php } if($page == 'Search result') { ?>
    <div  class="li-rt h4_title">
        <h4>Filter</h4>
        <div id="log">
             <label class="btn-round lbl-1">
            <input type="radio" class="lbl-1 btn btn-default btnn" name="skilarea" value="Local" id="showSkilData">
            Local
            </label>
            <label class="btn-round lbl-2">
            <input type="radio" class="btn btn-default btnn" name="skilarea" value="Overseas" id="showSkilData">
            Overseas
            </label>
            
            <label class="btn-round ">
            <input type="radio" class="btn btn-default btnn" name="skilarea" value="Worldwide" id="showSkilData">
            Worldwide
            </label>
           
            
            <label class="btn-round lbl-3">
            <input type="radio" class="btn btn-default btnn" name="skilarea" value="Near me" id="showSkilData">
            Near Me
            </label>
            
            
            <h4>Sort by </h4>
            <label class="btn-round lbl-a">
            <input type="radio" class="btn btn-default btnn" name="sortbyskill" value="new" id="sortfilter" style="cursor: pointer;">
            New Member
            </label>
            
            <label class="btn-round lbl-a">
            <input type="radio" class="btn btn-default btnn" name="sortbyskill" value="new" id="sortfilter" style="cursor: pointer;">
            Top Rated
            </label>
            
            
            <label class="btn-round lbl-b">
            <input type="radio" class="btn btn-default btnn" name="sortbyskill" value="level3" id="sortfilter" style="cursor: pointer;">
            Level 3
            </label>
             
            <label class="btn-round lbl-b">
            <input type="radio" class="btn btn-default btnn" name="sortbyskill" value="level2" id="sortfilter" style="cursor: pointer;">
            Level 2
            </label>
            
             
            <label class="btn-round lbl-b">
            <input type="radio" class="btn btn-default btnn" name="sortbyskill" value="level1" id="sortfilter" style="cursor: pointer;">
            Level 1
            </label>
            
        </div>
    </div>
    
    
    
    <?php } if($page == 'Wallet') { ?>
    <div class="top-rt-h head-mid">
        <!--<h2>Wallet</h2>-->
    </div>
    <div class="li-rt new-li-profl" id="panel">
        <!--<div class="button-hist">-->
        <!--    <a href="https://mitdevelop.com/instajobs/transaction"><button type="button" class="btn-round">View Transaction History</button>   </a>-->
        <!--</div>-->
    </div>
    <?php } if($page == 'Manage Post') { ?>
    <div class="top-rt-h head-mid">
        <h2>Filter</h2>
        <div class="rt-side" >
            <div class="ALL-RI new-li-profl" id="log">
                <a href="manage-post?f1=all" id="clearButtonn"><label class="btn-round postfilter-all <?php if($_GET['f1'] == 'all' || $_GET['f1'] == '') { echo 'active';}?>" data="ALL"><input type="radio" class="btn btn-default btnn2"  value="ALL" id="post-filter">ALL</label></a>
                <a href="manage-post?f1=services" id="clearButton"><label class="btn-round postfilter-ps <?php if($_GET['f1'] == 'services') { echo 'active';}    ?>" data="Professional Services"><input type="radio" class="btn btn-default btnn2 "  value="Professional Services" id="post-filter">Professional Services</label></a>
                <a href="manage-post?f1=jobs" id="clearButtonnn"><label class="btn-round postfilter-jm <?php if($_GET['f1'] == 'jobs') { echo 'active';}    ?>" data="Jobs Marketplace"><input type="radio" class="btn btn-default btnn2 "   value="Jobs Marketplace" id="post-filter">Jobs Marketplace</label></a>
            </div>
            <h2>Posts</h2>
 
        <div class="dropdown_wrap_contain">
            <div class="section_drop_show position-relative">
  <button class="dropdown-toggle_Wrap inner_layer" id="dropdownButtoonn"  onclick="myToggleDropdownMenu()"  >
      Show All 
    </button>
    <svg class="manage-posts-wrap" viewBox="0 0 24 24" onclick="event.stopPropagation(); myToggleDropdownMenu()"><title>menu-down</title>
      <path  fill="currentColor" d="M7,10L12,15L17,10H7Z" />
    </svg>
            </div>
  <ul class="dropdown-mennuu" id="dropdownMennuu" onclick="selectOption(event)">
    <li><a class="font-weight-bold" href="manage-post?f1=<?=$_GET['f1'];?>&f2=">Show All</a></li>
    <li><a class="font-weight-bold" href="manage-post?f1=<?=$_GET['f1'];?>&f2=waiting">Waiting Approval</a></li>
    <li><a class="font-weight-bold" href="manage-post?f1=<?=$_GET['f1'];?>&f2=active">Active</a></li>
    <li><a class="font-weight-bold" href="manage-post?f1=<?=$_GET['f1'];?>&f2=inactive">Inactive</a></li>
    <li><a class="font-weight-bold" href="manage-post?f1=<?=$_GET['f1'];?>&f2=completed">Completed</a></li>
    <li><a class="font-weight-bold" href="manage-post?f1=<?=$_GET['f1'];?>&f2=reject">Rejected</a></li>
  </ul>
</div>

        </div>
    </div>
    <?php } if($page == 'Transaction') {  ?>
    <div class="top-rt-h head-mid">
        <h2></h2>
    </div>
    <div class="new-li-profl" id="panel">
    </div>
    <?php } if($page == 'Message' || $page == 'Job Status' ) { ?>
    <div class="top-rt-h head-mid">
        <h2>Category</h2>
    </div>
     
      <div class="side nav  msg-job " id="log">
        <a href="message?tab=msg"><button class="<?php if($_GET['tab'] == 'msg') { echo 'active';} else{}?> btn-round lbl-2 manage_post_wrap">MESSAGES</button></a>
        <a href="message?tab=msg-professional"><button class="<?php if($_GET['tab'] == 'msg-professional') { echo 'active';} else{}?> btn-round lbl-2 manage_post_wrap">SERVICES</button></a>
        <a href="message?tab=msg-job"><button class="<?php if($_GET['tab'] == 'msg-job') { echo 'active';} else{}?> btn-round lbl-2 manage_post_wrap">JOBS</button></a>
    </div>
    
    <?php  }   ?>
</div>
<script src="assets/js/right-sidebar.js"></script>
<script>
    /* JOb Provider */
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
    
    
     function toggleDropdown() {
        var dropdownContent = document.querySelector(".dropdown-content");
        dropdownContent.classList.toggle("show-Dropdown");
      }
      
</script>

<style>
  /* Style the select element */
  .post-filter {
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #f2f2f2;
    font-size: 16px;
    color: #333;
    appearance: none;
  }

  /* Style the options */
  .post-filter option {
    background-color: #f2f2f2;
    color: #333;
  }

  /* Style the selected option */
  .post-filter option:checked {
    background-color: #007bff;
    color: #fff;
  }
</style>