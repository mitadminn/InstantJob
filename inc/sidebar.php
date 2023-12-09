<?php 
    ?>  
    <link rel="stylesheet" src="assets/css/sidebar.css">
<style>
    .msg-png{width:25px;}
    .instant-sidebar-profile-meta .btn-primary:hover {;
    background-color: #05BA50 !important;
    border-color: #05BA50 !important;}
    .instant-sidebar-profile-meta p{margin-top: -9px;font-size: 13px;}
    .cover{display:none;}
    #myDIV{display:none;}
    #srch_filter_contain{display:none;}
    button.search-button {background: #fff; padding: 0px;}
    .two_btn_head {display: inline-flex;align-items: center;}
    button.btn-content-hide { background: no-repeat;padding:0;}
    .btn_signup_button{   
    border-radius: 10px !important;
    padding: 10px 18px !important;
    font-size: 12px !important;
    display: block !important;
    margin: 0px auto !important;
    background: #33ad33 !important;}
    /* The container 
    <div>
    - needed to position the dropdown content */
    .dropdown {
    position: relative;
    display: inline-block;
    }
    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 110px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    left: 198px;
    top: -30px;
    text-align: center;
    }
    /* Links inside the dropdown */
    .dropdown-content a {
    color:#000;
    display: block;
    border-bottom: 1px solid #cfcccc;
    padding: 8px;
    background: #fff;
    }
    /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
    .show {display:block;}
    /*.dropdown a:hover {background-color: #ddd;}*/
    .first_list_pro{ border-top: 1px solid #00000017;}
    svg{width:24px; height:24px;}
    @media (min-width: 0) and (max-width: 567px){
    .row {
    flex-direction: column;
    }
    a#btn_anc_signup {
    background: #fff !important;
    }
    button.btn.btn-success.btn_signup_button {
    color: #fff !important;
    background: green !important;
    margin: 0;
    padding: 10px 30px 10px 30px !important;
    }
    .search-servc{width: 100% !important;border: none;}
    .kmtrs {display: flex !important;justify-content: space-between !important;align-items: center !important;background: #dbdbdb;padding-left: 1.25rem;padding-right: 1.2rem;}
    .contain-carousl {background: #fff;}
    .search_services_cont {background: #fff;}
    input.chck-box {margin: 13px;}
    .label-contain label {padding: 10px;}
    .form-check {padding-left: 10px !important;}
    .btn-filter{background: #fff; padding: 18px; }
    .search_services_cont {display: flex;align-items: center; padding:0 10px;}
    .History_title{padding: 15px;}
    /*.dropdown a:hover {background-color: #ddd;}*/
    } 
    
    
 
</style>
<div class="wrapper_container_mobile_header">
    <?php if($page == 'Manage Post'){ ?>
    <div class="d-flex hidn-objct sticky msg-header" id="msg-header">
        <div class="backbtn">
            <a href="account">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <div class="manage-as-lo">Manage Posts</div>
        </div>
        <div class="rightsidemenu">
            <svg class="dropbtn" viewBox="0 0 24 24">
                <path fill="currentColor" d="M10 21H14C14 22.1 13.1 23 12 23S10 22.1 10 21M21 19V20H3V19L5 17V11C5 7.9 7 5.2 10 4.3V4C10 2.9 10.9 2 12 2S14 2.9 14 4V4.3C17 5.2 19 7.9 19 11V17L21 19M17 11C17 8.2 14.8 6 12 6S7 8.2 7 11V18H17V11Z"></path>
            </svg>
        </div>
    </div>
         <div class="d-flex scnd-hdn">
         <a href="manage-post?f1=all"><button class="btn btn-round btn-default <?php if($_GET['f1'] == 'all') { echo 'active';}?>" value="Local" id="showData" style="">All</button></a>
         <a href="manage-post?f1=services"><button class="btn btn-round btn-default <?php if($_GET['f1'] == 'services') { echo 'active';}?>" value="Overseas" id="showData" style="">Professionals Services</button></a>
         <a href="manage-post?f1=jobs"><button class="btn btn-round btn-default <?php if($_GET['f1'] == 'jobs') { echo 'active';}?>" value="Near Me" id="showData" style="">Jobs Marketplace</button></a>
    
    </div>
    <?php  } elseif($page == 'Account'){ ?>
    <div class="d-flex hidn-objct">
        <div class="backbtn">
            <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <title>home</title>
                <path d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" />
            </svg>
        </div>
        <div class="prof-heigh-wid">
            <a href="service-provider"> 
            <img class="blck-logo" src="assets/img/new-instant-logo.png" alt="">
            </a>
        </div>
        <div class="rightsidemenu">
            <p style="width:max-;"><a style="font-size:9px;" href="profile-edit?id=<?=$user_id;?>">Edit Profile</a></p>
        </div>
    </div>
    <?php  } elseif($page == 'Profile'){ ?>
    <div class="d-flex hidn-objct sticky pprofile_details">
        <div class="backbtn">
            <a href="account">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <a href="service-provider"> 
            <img class="blck-logo" src="assets/img/new-instant-logo.png" alt="">
            </a>
        </div>
        <div class="rightsidemenu">
            <a style="font-size:11px;" href="profile-edit?id=<?=$user_id;?>">Edit Profile</a>
        </div>
    </div>
    <?php  } elseif($page == 'Reviews'){ ?>
    <div class="d-flex hidn-objct">
        <div class="backbtn">
            <a href="account">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <div class="manage-as-lo">Reviews</div>
        </div>
        <div class="rightsidemenu">
            <div class="two_btn_head">
                <button class="search-button" onclick="mySearch()" id="fncn_btn_search">
                    <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                    </svg>
                </button>
                <svg class="dropbtn" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M10 21H14C14 22.1 13.1 23 12 23S10 22.1 10 21M21 19V20H3V19L5 17V11C5 7.9 7 5.2 10 4.3V4C10 2.9 10.9 2 12 2S14 2.9 14 4V4.3C17 5.2 19 7.9 19 11V17L21 19M17 11C17 8.2 14.8 6 12 6S7 8.2 7 11V18H17V11Z"></path>
                </svg>
            </div>
        </div>
    </div>
    <?php  } elseif($page == 'Notifications'){ ?>
    <div class="d-flex hidn-objct">
        <div class="backbtn">
            <a href="account">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <div class="manage-as-lo">Notifications</div>
        </div>
     
    </div>
    <!--------------------------------------search content hidden start ------------------------------------------------------------------------>
    <?php include('search-toggle.php'); ?>
    <!--------------------------------------search content hidden end ------------------------------------------------------------------------>
    <?php  } elseif($page == 'Wallet'){ ?>
    <style>
        .wallet-cls {width: 100%;justify-content: center; float: left;}
    </style>
    <div class="d-flex hidn-objct">
        <div class="backbtn">
            <a href="account">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <div class="wallet-cls manage-as-lo">Wallet</div>
        </div>
        <div class="rightsidemenu">
            <div>
            </div>
        </div>
    </div>
    <?php  } elseif($page == 'Wallet Top up'){ ?>
    <div class="d-flex hidn-objct">
        <div class="backbtn">
            <a href="account">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <div class="wallet-cls manage-as-lo"> Top Up Wallet</div>
        </div>
        <div class="rightsidemenu">
            <div>
            </div>
        </div>
    </div>
    <?php  } elseif($page == 'Withdrawal'){ ?>
    <div class="d-flex hidn-objct">
        <div class="backbtn">
            <a href="account">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <div class="wallet-cls manage-as-lo">Withdrawal</div>
        </div>
        <div class="rightsidemenu">
            <div>
            </div>
        </div>
    </div>
    <?php  } elseif($page == 'Withdrawal Confirm'){ ?>
    <div class="d-flex hidn-objct">
        <div class="backbtn">
            <a href="account">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <div class="wallet-cls manage-as-lo">Withdrawal Confirm</div>
        </div>
        <div class="rightsidemenu">
            <div>
            </div>
        </div>
    </div>
    <?php  } elseif($page == 'Transaction'){ ?>
    <div class="d-flex hidn-objct">
        <div class="backbtn">
            <a href="account">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <div class="wallet-cls manage-as-lo">Transaction History</div>
        </div>
        <div class="rightsidemenu">
 
        </div>
        <!----------------three dot menu mobila view START--------------------->
        <div class="dropdown">
            <div id="myDropdown" class="dropdown-content">
                <a href="#">Download receipts</a>
                <a href="#">Contact support</a>
            </div>
        </div>
        <!--------------------------three dot menu view End ----------------------------------->
    </div>
    <?php  } elseif($page == 'Refer a friend'){ ?>
    <div class="d-flex hidn-objct">
        <div class="backbtn">
            <a href="account">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <div class="manage-as-lo">Refer Friends</div>
        </div>
        <div class="rightsidemenu">
        </div>
    </div>
    <?php  } elseif($page == 'Contact Us'){ ?>
    <?php  } elseif($page == 'Profile Edit'){ ?>
    <div class="d-flex hidn-objct sticky">
        <div class="backbtn">
            <a href="account">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <a href="service-provider"> 
            <img class="blck-logo" src="assets/img/new-instant-logo.png" alt="">
            </a>
        </div>
         <div class="backbtn" style="visibility:hidden;">
            <a href="account">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
    </div>
    <?php  } elseif($page == 'Message'){ ?>
    <div class="d-flex hidn-objct sticky">
 
        <div class="prof-heigh-wid">
            <div>Messages</div>
        </div>
        <div class="rightsidemenu">
        </div>
    </div>
        <div class="d-flex scnd-hdn nav  ">
        <a href="message?tab=msg"><button class=" btn-round lbl-2 manage_post_wrap">MESSAGES</button></a>
        <a href="message?tab=msg-professional"><button class=" btn-round lbl-2 manage_post_wrap">SERVICES</button></a>
        <a href="message?tab=msg-job"><button class=" btn-round lbl-2 manage_post_wrap">JOBS</button></a>
    </div>
    <?php  } elseif($page == 'Discussion'){ ?>
    <div class="d-flex hidn-objct sticky">
 
        <div class="prof-heigh-wid">
            <div>Messages</div>
        </div>
        <div class="rightsidemenu">
        </div>
    </div>
    <div class="d-flex scnd-hdn nav  ">
        <a href="message?tab=msg"><button class=" btn-round lbl-2 manage_post_wrap">MESSAGES</button></a>
        <a href="message?tab=msg-professional"><button class=" btn-round lbl-2 manage_post_wrap">SERVICES</button></a>
        <a href="message?tab=msg-job"><button class=" btn-round lbl-2 manage_post_wrap">JOBS</button></a>
    </div>
    <?php  } elseif($page == 'Message Job'){ ?>
    <div class="d-flex hidn-objct sticky">
        <div class="backbtn">
            <a href="account">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <div>Messages</div>
        </div>
        <div class="rightsidemenu">
        </div>
    </div>
    <div class="d-flex scnd-hdn nav  ">
         <a href="message?tab=msg"><button class=" btn-round lbl-2 manage_post_wrap">MESSAGES</button></a>
        <a href="message?tab=msg-professional"><button class=" btn-round lbl-2 manage_post_wrap">PROFESSIONAL SERVICES</button></a>
        <a href="message?tab=msg-job"><button class=" btn-round lbl-2 manage_post_wrap">JOB MARKETPLACE</button></a>
    </div>
    <?php  } elseif($page == 'Message Service'){ ?>
    <div class="d-flex hidn-objct sticky">
        <div class="backbtn">
            <a href="account">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <div>Messages</div>
        </div>
        <div class="rightsidemenu">
        </div>
    </div>
    <div class="d-flex scnd-hdn nav  ">
         <a href="message?tab=msg"><button class=" btn-round lbl-2 manage_post_wrap">MESSAGES</button></a>
        <a href="message?tab=msg-professional"><button class=" btn-round lbl-2 manage_post_wrap">PROFESSIONAL SERVICES</button></a>
        <a href="message?tab=msg-job"><button class=" btn-round lbl-2 manage_post_wrap">JOB MARKETPLACE</button></a>
    </div>
    <?php  } elseif($page == 'Propose Quote Budget'){ ?>
    <div class="d-flex hidn-objct sticky">
        <div class="backbtn">
            <a href="account">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <div>Messages</div>
        </div>
             <div class="rightsidemenu" onclick="toggleDropdownMsges()">
            <svg class="dropbtn" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12,16A2,2 0 0,1 14,18A2,2 0 0,1 12,20A2,2 0 0,1 10,18A2,2 0 0,1 12,16M12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12A2,2 0 0,1 12,10M12,4A2,2 0 0,1 14,6A2,2 0 0,1 12,8A2,2 0 0,1 10,6A2,2 0 0,1 12,4Z"></path>
                </svg>
                   <div id="myDropdownDrop"  class="drop_msg_list rt-side-top-drop">
                  <p class="p-1"><a class="font-weight-bold text-dark" href="propose-quote-budget">Propose Quote</a></p>
                  <p class="p-1"><a class="font-weight-bold text-dark" href="#">Attach Files</a></p>
                  <p class="p-1"><a class="font-weight-bold text-dark" href="#">Report Job</a></p>
                  <p class="p-1"><a class="font-weight-bold text-dark" href="#">Block Users</a></p>
                </div>
                            
        </div>
    </div>
    <div class="d-flex scnd-hdn nav  ">
        <a href="message?tab=msg"><button class=" btn-round lbl-2 manage_post_wrap">MESSAGES</button></a>
        <a href="message?tab=msg-professional"><button class=" btn-round lbl-2 manage_post_wrap">PROFESSIONAL SERVICES</button></a>
        <a href="message?tab=msg-job"><button class=" btn-round lbl-2 manage_post_wrap">JOB MARKETPLACE</button></a>
 
    </div>
    <?php  } elseif($page == 'Propose Quote'){ ?>
    <div class="d-flex hidn-objct sticky">
        <div class="backbtn">
            <a href="account">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <div>Messages</div>
        </div>
        <div class="rightsidemenu" onclick="toggleDropdownMsges()">
            <svg class="dropbtn" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12,16A2,2 0 0,1 14,18A2,2 0 0,1 12,20A2,2 0 0,1 10,18A2,2 0 0,1 12,16M12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12A2,2 0 0,1 12,10M12,4A2,2 0 0,1 14,6A2,2 0 0,1 12,8A2,2 0 0,1 10,6A2,2 0 0,1 12,4Z"></path>
                </svg>
                   <div id="myDropdownDrop"  class="drop_msg_list rt-side-top-drop">
                  <p class="p-1"><a class="font-weight-bold text-dark" href="propose-quote-budget">Propose Quote</a></p>
                  <p class="p-1"><a class="font-weight-bold text-dark" href="#">Attach Files</a></p>
                  <p class="p-1"><a class="font-weight-bold text-dark" href="#">Report Job</a></p>
                  <p class="p-1"><a class="font-weight-bold text-dark" href="#">Block Users</a></p>
                </div>
                            
        </div>
    </div>
    <div class="d-flex scnd-hdn nav  ">
        <a  data-toggle="tab" href="#message"><button class=" btn-round lbl-2 manage_post_wrap">MESSAGES</button></a>
        <a  data-toggle="tab" href="#professional"><button class=" btn-round lbl-2 manage_post_wrap">PROFESSIONAL SERVICES</button></a>
        <a  data-toggle="tab" href="#job"><button class=" btn-round lbl-2 manage_post_wrap">JOB MARKETPLACE</button></a>
    </div>
    <?php  } elseif($page == 'Propose Quote Final'){ ?>
    <div class="d-flex hidn-objct sticky">
        <div class="backbtn">
            <a href="account">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <div>Messages</div>
        </div>
              <div class="rightsidemenu" onclick="toggleDropdownMsges()">
            <svg class="dropbtn" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12,16A2,2 0 0,1 14,18A2,2 0 0,1 12,20A2,2 0 0,1 10,18A2,2 0 0,1 12,16M12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12A2,2 0 0,1 12,10M12,4A2,2 0 0,1 14,6A2,2 0 0,1 12,8A2,2 0 0,1 10,6A2,2 0 0,1 12,4Z"></path>
                </svg>
                   <div id="myDropdownDrop"  class="drop_msg_list rt-side-top-drop">
                  <p class="p-1"><a class="font-weight-bold text-dark" href="propose-quote-budget">Propose Quote</a></p>
                  <p class="p-1"><a class="font-weight-bold text-dark" href="#">Attach Files</a></p>
                  <p class="p-1"><a class="font-weight-bold text-dark" href="#">Report Job</a></p>
                  <p class="p-1"><a class="font-weight-bold text-dark" href="#">Block Users</a></p>
                </div>
                            
        </div>
    </div>
    <div class="d-flex scnd-hdn nav  ">
        <a  data-toggle="tab" href="#message"><button class=" btn-round lbl-2 manage_post_wrap">MESSAGES</button></a>
        <a  data-toggle="tab" href="#professional"><button class=" btn-round lbl-2 manage_post_wrap">PROFESSIONAL SERVICES</button></a>
        <a  data-toggle="tab" href="#job"><button class=" btn-round lbl-2 manage_post_wrap">JOB MARKETPLACE</button></a>
    </div>
    <!----------------three dot menu mobila view START--------------------->
    <div class="dropdown">
        <div id="myDropdown" class="dropdown-content">
            <a href="#">Menu 1</a>
            <a href="#">Menu 2</a>
            <a href="#">Menu 3</a>
            <a href="#">Menu 4</a>
        </div>
    </div>
    <!--------------------------three dot menu mobila view----------------------------------->
    <!--------------------------------------search content hidden ------------------------------------------------------------------------>
    <?php include('search-toggle.php'); ?>
    <!--------------------------------------search content hidden ------------------------------------------------------------------------>
    <?php  } elseif($page == 'Job Status'){ ?>
    <div class="d-flex hidn-objct sticky">
        <div class="backbtn">
            <a href="job-details?id=<?=$signle_job['id'];?>">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <div>Messages</div>
        </div>
        <div class="rightsidemenu">
            <div class="trio-icon two_btn_head">
                <button class="search-button" onclick="mySearch()" id="fncn_btn_search">
                    <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                    </svg>
                    </i>
                </button>
                <svg class="dropbtn" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M10 21H14C14 22.1 13.1 23 12 23S10 22.1 10 21M21 19V20H3V19L5 17V11C5 7.9 7 5.2 10 4.3V4C10 2.9 10.9 2 12 2S14 2.9 14 4V4.3C17 5.2 19 7.9 19 11V17L21 19M17 11C17 8.2 14.8 6 12 6S7 8.2 7 11V18H17V11Z"></path>
                </svg>
                <button class="btn-content-hide" ><i onclick="myFun()"class="fa-solid fa-ellipsis-vertical dropbtn"></i></button>
            </div>
        </div>
    </div>
    <!----------------three dot menu mobila view START--------------------->
    <div class="dropdown">
        <div id="myDropdown" class="dropdown-content">
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
            <a href="#">Link 3</a>
        </div>
    </div>
    <!--------------------------three dot menu mobila view----------------------------------->
    <!--------------------------------------search content hidden ------------------------------------------------------------------------>
    <?php include('search-toggle.php'); ?>
    <!--------------------------------------search content hidden ------------------------------------------------------------------------>
    <div class="d-flex scnd-hdn nav nav-tabs">
        <a  data-toggle="tab" href="#message">
            <p>MESSAGES</p>
        </a>
        <a  data-toggle="tab" href="#service">
            <p>PROFESSIONAL SERVICE</p>
        </a>
        <a  data-toggle="tab" href="#job">
            <p>JOB STATUS</p>
        </a>
    </div>
    <?php  } elseif($page == 'Job Marketplace'){ ?>
    <div class="d-flex hidn-objct sticky msg-header" id="msg-header">
        <div class="backbtn">
 
              <button class="search-button" onclick="mySearch()" id="fncn_btn_search">
                    <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                    </svg>
                </button>
        </div>
        <div class="prof-heigh-wid">
            <a href="job-marketplace">  
            <img class="blck-logo" src="assets/img/new-instant-logo.png" alt="">
            </a>
        </div>
        <div class="rightsidemenu ">
            <div class="two_btn_head">
 
                <ul class="nav navbar-nav navbar-right">
                         <li class="dropdown">
                          <a href="message.php" class="dropdown-toggle" data-toggle="dropdown"><div data-cy="dot" class="nav-dot" style="display:none"></div> <span class="fa fa-bell dropbtn" style="font-size:18px;"></span>
                            </a>  <ul class="dropdown-menu notification_header_list"></ul>
                         </li>
                        </ul>
            </div>
        </div>
    </div>
    <div class="d-flex scnd-hdn">
        <button class="btn btn-round btn-default" value="Local" id="showData" style="">LOCAL</button>
        <button class="btn btn-round btn-default" value="Overseas" id="showData" style="">OVERSEAS</button>
        <p class="sort">Sort by: NEW<i class="fa-solid fa-angle-down"></i></p>
    </div>
    <!--------------------------------------search content hidden ------------------------------------------------------------------------>
    <?php include('search-toggle.php'); ?>
    <!--------------------------------------search content hidden ------------------------------------------------------------------------>
    <!---------------search filter button content start ------------------->
    <div class="search_filter_contain" id="srch_filter_contain">
        <div class="search_services_cont">
            <a href="service-provider" style="padding: 10px; color: #000;">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
            <input type="text" id="search" name="search" class="search-servc" placeholder="Search">
        </div>
        <div class="History_title">
            <h2>History</h2>
        </div>
    </div>
    <!---------------search filter button content end ------------------->
    <!--------------------------------------search content hidden ------------------------------------------------------------------------>
    <?php  } elseif($page == 'Service Provider' || $page == 'Job Marketplace' || $page == 'Job Details'){ ?>
    <div class="d-flex hidn-objct sticky msg-header" id="msg-header">
        <div class="backbtn" >
 
             <button class="search-button" onclick="mySearch()" id="fncn_btn_search">
                    <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                    </svg>
                </button>
                <!--search mobile view-->
                
                   <div class="search-section animate-from-left" style="display:none;" id="searchDiv">
 
                        <div class="" style="position: absolute;background: #fff;height:100vh;z-index: 1; width:100%; left:0; top:0;">
                           <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header accordion-heading p-0 bg-white" id="headingOne">
          <div class="search-bar position-relative mb-3">
              <a href="#" id="backButton" class="back-button">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
             </svg>
             </a>
              <input type="text" id="searchBar" name="searchBar" placeholder="search">
          </div>
      <h2 class="mb-0 d-flex align-items-center bg-dark">
        <button class="btn btn-link btn-block text-left text-white collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Location
        </button>
        <i class="fa-solid fa-angle-down" data-rotate="0" style="color:#fff;"></i>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body p-0">
                <div class="d-flex align-items-center justify-content-between" style="background: #f1f3f4; padding:8px 12px;">
            <p>Near me within (km)</p>
            <input type="number" id="fnumber" name="fnumber" style="width: 75px;height: 30px;">
        </div>
    <div class="form-check d-flex align-items-center justify-content-between py-1">
          <label class="form-check-label">
              Worldwide
          </label>
          <div>
              
            <input type="checkbox" class=" " value="">
          </div>
        </div>
        <div class="form-check d-flex align-items-center justify-content-between py-1">
          <label class="form-check-label">
              Loacal
          </label>
          <div>
              
            <input type="checkbox" class=" " value="">
          </div>
        </div>
        <div class="form-check d-flex align-items-center justify-content-between py-1">
          <label class="form-check-label">
              Overseas
          </label>
          <div>
              
            <input type="checkbox" class="" value="">
          </div>
    </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header accordion-heading p-0" id="headingTwo">
      <h2 class="mb-0 d-flex align-items-center bg-dark">
        <button class="btn btn-link btn-block text-white text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Service providers filter
        </button>
     <i class="fa-solid fa-angle-down" data-rotate="0" style="color:#fff;"></i>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body p-0">
              <div class="form-check d-flex align-items-center justify-content-between py-1">
          <label class="form-radio-label">
              Master
          </label>
          <div>
              
            <input type="radio" class="form-radio-input" value="">
          </div>
        </div>
        <div class="form-check d-flex align-items-center justify-content-between py-1">
          <label class="form-check-label">
              Level 3 Seller
          </label>
          <div>
            <input type="radio" class="form-radio-input" value="">
              
          </div>
        </div>
        <div class="form-check d-flex align-items-center justify-content-between py-1">
          <label class="form-check-label">
              Level 2 Seller
          </label>
          <div>
            <input type="radio" class="form-radio-input" value="">
              
          </div>
    </div>
        <div class="form-check d-flex align-items-center justify-content-between py-1">
          <label class="form-check-label">
              Level 1 Seller
          </label>
          <div>
            <input type="radio" class="form-radio-input" value="">
              
          </div>
    </div>
        <div class="d-flex align-items-center justify-content-between" style="background: #f1f3f4; padding:8px 12px;">
            <p>Job Completion</p>
            <input type="number" id="fnumber" name="fnumber" style="width: 75px;height: 30px;">
        </div>
            <div class="d-flex align-items-center justify-content-between" style="background: #f1f3f4; padding:8px 12px;">
            <p>Rating Received +</p>
            <input type="number" id="fnumber" name="fnumber" style="width: 75px;height: 30px;">
        </div>
      
      </div>
    </div>
  </div>
  <div class="card border-bottom-0">
    <div class="card-header accordion-heading p-0" id="headingThree">
      <h2 class="mb-0 d-flex align-items-center bg-dark">
        <button class="btn btn-link btn-block text-white text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Budget
        </button>
        <i class="fa-solid fa-angle-down" data-rotate="0" style="color:#fff;"></i>
      </h2>
    </div>
    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body p-0">
          <div class="d-flex align-items-center py-3 px-3" style="gap:10px; background: #f1f3f4;">
       <div class="d-flex align-items-center" style="gap:10px">
            <p>From</p>
            <input type="number" id="fnumber" name="fnumber">
        </div>
       <div class="d-flex align-items-center" style="gap:10px">
            <p>To</p>
            <input type="number" id="fnumber" name="fnumber">
        </div>
        </div>
      </div>
    </div>
  <div class="my-2 d-flex justify-content-center align-items-center w-75 m-auto ">
    <button class="custom-btn bnt-fill-green btn_submit_approval">Filter Search</button>
    </div>
  </div>
</div>
                        </div>
                    </div>
                   
                <!--search mobile view-->
                
                
        </div>
        <div class="prof-heigh-wid">
            <a href="service-provider">  
            <img class="blck-logo" src="assets/img/new-instant-logo.png" alt="">
            </a>
        </div>
        <div class="rightsidemenu ">
            <div class="two_btn_head">
 
                <ul class="nav navbar-nav navbar-right">
                         <li class="dropdown">
                          <a href="message.php" class="dropdown-toggle" data-toggle="dropdown"><div data-cy="dot" class="nav-dot" style="display:none"></div> <span class="fa fa-bell dropbtn" style="font-size:18px;"></span>
                            </a>  <ul class="dropdown-menu notification_header_list"></ul>
                         </li>
                        </ul>
            </div>
        </div>
    </div>
    <div class="d-flex scnd-hdn">
        <button class="btn btn-round btn-default" value="Local" id="showData" style="">LOCAL</button>
        <button class="btn btn-round btn-default" value="Overseas" id="showData" style="">OVERSEAS</button>
        <button class="btn btn-round btn-default" value="Near Me" id="showData" style="">NEAR ME</button>
    </div>
        <p class="sort">Sort by: NEW<i class="fa-solid fa-angle-down"></i></p>
    <!--------------------------------------search content hidden ------------------------------------------------------------------------>
    <?php include('search-toggle.php'); ?>
    <!--------------------------------------search content hidden ------------------------------------------------------------------------>
    <!---------------search filter button content start ------------------->
    <div class="search_filter_contain" id="srch_filter_contain">
        <div class="search_services_cont">
            <a href="service-provider">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
            <input type="text" id="search" name="search" class="search-servc" placeholder="Search">
        </div>
        <div class="History_title">
            <h2>History</h2>
        </div>
    </div>
    <!---------------search filter button content end ------------------->
    <!--------------------------------------search content hidden ------------------------------------------------------------------------>
    <?php  } elseif($page == 'Create Service'){ ?>
    <div class="d-flex hidn-objct sticky msg-header" id="msg-header">
        <div class="backbtn">
            <a href="select-services">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <div>Sell Your Service</div>
        </div>
    </div>
    <?php  } elseif($page == 'Create Job'){ ?>
    <div class="d-flex hidn-objct sticky msg-header" id="msg-header">
        <div class="backbtn">
            <a href="select-services">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <div>Create a Job offer</div>
        </div>
    </div>
    <?php  } elseif($page == 'Add Coupon'){ ?>
    <div class="d-flex hidn-objct sticky msg-header" id="msg-header">
        <div class="backbtn">
            <a href="account">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <div>Add Coupon</div>
        </div>
    </div>
    <?php  } elseif($page == 'Payment Success'){ ?>
    <div class="d-flex hidn-objct sticky msg-header" id="msg-header">
        <div class="backbtn">
            <a href="account">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <div>Payment</div>
        </div>
    </div>
    <?php  } elseif($page == 'Post Preview'){ ?>
    <div class="d-flex hidn-objct sticky msg-header" id="msg-header">
             <div class="backbtn">
            <a href="create-">
                 <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <div>Post Preview</div>
        </div>
 
    </div>
    <?php  } elseif($page == 'job Preview'){ ?>
    <div class="d-flex hidn-objct sticky msg-header" id="msg-header">
        <div class="backbtn">
            <a href="create-post">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <div>Job Preview</div>
        </div>
   
    </div>
    <!----------------three dot menu mobila view START--------------------->
    <div class="dropdown">
        <div id="myDropdown" class="dropdown-content">
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
            <a href="#">Link 3</a>
        </div>
    </div>
    <!--------------------------three dot menu mobila view----------------------------------->
    <?php } else {} ?>
    <!-- hidden -->
    <div class="w3-sidebar w3-light-grey w3-bar-block">
        <div class="logo">
            <a href="account">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                </svg>
            </a>
            <a class="ser-pro-acc" href="service-provider"><img src="assets/img/new-instant-logo.png" alt=""></a>
            <div class="edit-pro-mob">
                <p><a href="">Edit profile</a></p>
            </div>
        </div>
        <?php   ?>
        <div class="instant-sidebar-profile">
            <div class="instant-sidebar-profile-image">
                <?php if(!empty($_SESSION['user_image'])) { ?>
                <img class="main-img" src="<?php echo $_SESSION['user_image'];?>" alt="">
                <?php } elseif(empty($_SESSION['user_image'])) { ?> 
                <img class="main-img img-main" src="<?php if(!empty($user_information['ProfilePic'])){ echo 'admin/assets/img/profile/'.$user_information['ProfilePic'];}else { echo 'assets/img/male-1.png';}?>" alt="">
                <?php } ?>
            </div>
            <?php //print_r($user_information['id']);?>
            <?php if(!empty($user_information['id']) ){ //&& empty($user_information['ProfileName'])){ ?> 
            <div class="dreamz">
                <div class="h-p">
                    <h6> <?php if(!empty($guser['ProfileName'])) { echo $guser['ProfileName']; } elseif(!empty($_SESSION['Userid'])) { echo $user_information['ProfileName']; } else {}?></h6>
                    <p>
                        <svg class="star_wrap_svg" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>star</title>
                            <path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" />
                        </svg>
                        New Member
                    </p>
                </div>
                <div class="">
                    <p>From: <?=$user_information['Country'];?></p>
                    <p>Member Since: <?php $datee = date_create($user_information['Created_at']); echo date_format($datee,"M Y"); ?></p>
                    <p>Avg.Response time:0 </p>
                    <p>Total Earning: 0</p>
                </div>
            </div>
            <div class="onln-cnt">
                <button class="btn-on"><?php if(!empty($guser['ProfileName'])) { echo 'Online'; }  elseif(!empty($_SESSION['Userid'])) { echo 'Online'; } else { echo 'Offline';}?></button>
                <div class="batch mobile-hide"><img src="assets/img/reward.png" alt=""></div>
                <div class="batch desk-hide"><img src="assets/img/reward-white.png" alt=""></div>
                <p>Level 1 Seller</p>
            </div>
            <?php } else { ?>
            <div class="instant-sidebar-profile-meta sign_up_contain">
                <p>A skill marketplace for anyone to turn their spare time into-income</p>
                <a href="signin" class="btn btn-primary" id="btn_signup_main">
                Sign up, it's free
                </a>
            </div>
            <?php } ?>
        </div>
        <ul class="d-flex flex-column lists instant-sidebar-menu">
            <li class="first_list_pro">
                <a href="service-provider">
                    <svg  viewBox="0 0 24 24">
                        <path fill="currentColor" d="M20,6C20.58,6 21.05,6.2 21.42,6.59C21.8,7 22,7.45 22,8V19C22,19.55 21.8,20 21.42,20.41C21.05,20.8 20.58,21 20,21H4C3.42,21 2.95,20.8 2.58,20.41C2.2,20 2,19.55 2,19V8C2,7.45 2.2,7 2.58,6.59C2.95,6.2 3.42,6 4,6H8V4C8,3.42 8.2,2.95 8.58,2.58C8.95,2.2 9.42,2 10,2H14C14.58,2 15.05,2.2 15.42,2.58C15.8,2.95 16,3.42 16,4V6H20M4,8V19H20V8H4M14,6V4H10V6H14Z" />
                    </svg>
                    <span>Professional Service</span>
                </a>
            </li>
            <li class="first_list_pro">
                <a href="job-marketplace">
                    <svg viewBox="0 0 24 24">
                        <path fill="currentColor" d="M16 3.23C16.71 2.41 17.61 2 18.7 2C19.61 2 20.37 2.33 21 3C21.63 3.67 21.96 4.43 22 5.3C22 6 21.67 6.81 21 7.76S19.68 9.5 19.03 10.15C18.38 10.79 17.37 11.74 16 13C14.61 11.74 13.59 10.79 12.94 10.15S11.63 8.71 10.97 7.76C10.31 6.81 10 6 10 5.3C10 4.39 10.32 3.63 10.97 3C11.62 2.37 12.4 2.04 13.31 2C14.38 2 15.27 2.41 16 3.23M22 19V20L14 22.5L7 20.56V22H1V11H8.97L15.13 13.3C16.25 13.72 17 14.8 17 16H19C20.66 16 22 17.34 22 19M5 20V13H3V20H5M19.9 18.57C19.74 18.24 19.39 18 19 18H13.65C13.11 18 12.58 17.92 12.07 17.75L9.69 16.96L10.32 15.06L12.7 15.85C13 15.95 15 16 15 16C15 15.63 14.77 15.3 14.43 15.17L8.61 13H7V18.5L13.97 20.41L19.9 18.57Z" />
                    </svg>
                    <span>Job Marketplace</span>
                </a>
            </li>
            <li class="first_list_pro">
                <a href="<?php if(!empty($guser['ProfileName'])) { echo 'message?tab=msg'; } elseif(empty($user_information['ProfileName']) && !empty($_SESSION['Userid'])){ echo 'profile-info'; } elseif(!empty($_SESSION['Userid'])) { echo 'message?tab=msg'; }  else { echo 'signin';}?>" onclick="showPosition();">
                    <svg  viewBox="0 0 24 24">
                        <path fill="currentColor" d="M20 2H4C2.9 2 2 2.9 2 4V22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2M20 16H5.2L4 17.2V4H20V16M17 11H15V9H17M13 11H11V9H13M9 11H7V9H9" />
                    </svg>
                    <span>Message</span>
                </a>
            </li>
            <li class="first_list_pro">
                <a href="<?php if(!empty($guser['ProfileName'])) { echo 'profile'; } elseif(empty($user_information['ProfileName']) && !empty($_SESSION['Userid'])){ echo 'profile-info'; } elseif(!empty($_SESSION['Userid'])) { echo 'profile'; }  else { echo 'signin';}?>" onclick="showPosition();">
                    <svg  viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M19,19H5V5H19M19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M16.5,16.25C16.5,14.75 13.5,14 12,14C10.5,14 7.5,14.75 7.5,16.25V17H16.5M12,12.25A2.25,2.25 0 0,0 14.25,10A2.25,2.25 0 0,0 12,7.75A2.25,2.25 0 0,0 9.75,10A2.25,2.25 0 0,0 12,12.25Z" />
                    </svg>
                    <span>Public Profile</span>
                </a>
            </li>
            <li>
                <a href="<?php if(!empty($guser['ProfileName'])) { echo 'reviews'; } elseif(empty($user_information['ProfileName']) && !empty($_SESSION['Userid'])){ echo 'profile-info'; } elseif(!empty($_SESSION['Userid'])) { echo 'reviews'; } else { echo 'signin';}?>">
                    <svg  viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M23 7.5L16.53 6.96L14 1L11.47 6.96L5 7.5L9.9 11.77L8.44 18.1L14 14.74L19.56 18.1L18.09 11.77L23 7.5M16.14 12.23L16.54 13.94L15.03 13.03L14 12.41L12.97 13.03L11.46 13.94L11.85 12.23L12.13 11.05L11.22 10.26L9.88 9.1L11.64 8.95L12.84 8.85L13.31 7.74L14 6.12L14.69 7.74L15.16 8.85L16.36 8.95L18.11 9.1L16.78 10.26L15.86 11.05L16.14 12.23M1.16 12C.861 11.5 .989 10.89 1.45 10.59L4.18 8.79L5.75 10.15L2.55 12.26C2.38 12.37 2.19 12.43 2 12.43C1.68 12.43 1.36 12.27 1.16 12M1.45 20.16L7.31 16.31L7 17.76L6.66 19.13L2.55 21.84C2.38 21.95 2.19 22 2 22C1.68 22 1.36 21.84 1.16 21.55C.861 21.09 .989 20.47 1.45 20.16M7.32 11.5L8.24 12.31L7.97 13.5L2.55 17.05C2.38 17.16 2.19 17.21 2 17.21C1.68 17.21 1.36 17.06 1.16 16.76C.861 16.3 .989 15.68 1.45 15.38L7.32 11.5Z" />
                    </svg>
                    <span>Reviews</span>
                </a>
            </li>
            <li>
                <a href="<?php if(!empty($guser['ProfileName'])) { echo 'manage-post?f1=all'; } elseif(empty($user_information['ProfileName']) && !empty($_SESSION['Userid'])){ echo 'profile-info'; } elseif(!empty($_SESSION['Userid'])) { echo 'manage-post?f1=all'; } else { echo 'signin';}?>" onclick="showPosition();">
                    <svg  viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M3 3V21H21V3H3M18 18H6V17H18V18M18 16H6V15H18V16M18 12H6V6H18V12Z" />
                    </svg>
                    <span>Manage Posts</span>
                </a>
            </li>
            <li>
                <a href="<?php if(!empty($guser['ProfileName'])) { echo 'wallet'; } elseif(empty($user_information['ProfileName']) && !empty($_SESSION['Userid'])){ echo 'profile-info'; } elseif(!empty($_SESSION['Userid'])) { echo 'wallet'; } else { echo 'signin';}?>">
                    <svg  viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M5,3C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V16.72C21.59,16.37 22,15.74 22,15V9C22,8.26 21.59,7.63 21,7.28V5A2,2 0 0,0 19,3H5M5,5H19V7H13A2,2 0 0,0 11,9V15A2,2 0 0,0 13,17H19V19H5V5M13,9H20V15H13V9M16,10.5A1.5,1.5 0 0,0 14.5,12A1.5,1.5 0 0,0 16,13.5A1.5,1.5 0 0,0 17.5,12A1.5,1.5 0 0,0 16,10.5Z" />
                    </svg>
                    <span>Wallet</span>
                </a>
            </li>
            <li>
                <a href="<?php if(!empty($guser['ProfileName'])) { echo 'transaction'; } elseif(empty($user_information['ProfileName']) && !empty($_SESSION['Userid'])){ echo 'profile-info'; } elseif(!empty($_SESSION['Userid'])) { echo 'transaction'; } else { echo 'signin';}?>">
                    <svg  viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M21 11.11V5C21 3.9 20.11 3 19 3H14.82C14.4 1.84 13.3 1 12 1S9.6 1.84 9.18 3H5C3.9 3 3 3.9 3 5V19C3 20.11 3.9 21 5 21H11.11C12.37 22.24 14.09 23 16 23C19.87 23 23 19.87 23 16C23 14.09 22.24 12.37 21 11.11M12 3C12.55 3 13 3.45 13 4S12.55 5 12 5 11 4.55 11 4 11.45 3 12 3M5 19V5H7V7H17V5H19V9.68C18.09 9.25 17.08 9 16 9H7V11H11.1C10.5 11.57 10.04 12.25 9.68 13H7V15H9.08C9.03 15.33 9 15.66 9 16C9 17.08 9.25 18.09 9.68 19H5M16 21C13.24 21 11 18.76 11 16S13.24 11 16 11 21 13.24 21 16 18.76 21 16 21M16.5 16.25L19.36 17.94L18.61 19.16L15 17V12H16.5V16.25Z" />
                    </svg>
                    <span>Transaction History</span>
                </a>
            </li>
            <li>
                <a href="<?php if(!empty($guser['ProfileName'])) { echo 'refer'; } elseif(empty($user_information['ProfileName']) && !empty($_SESSION['Userid'])){ echo 'profile-info'; } elseif(!empty($_SESSION['Userid'])) { echo 'refer'; } else { echo 'signin';}?>">
                    <svg  viewBox="0 0 24 24">
                        <path fill="currentColor" d="M10.59,13.41C11,13.8 11,14.44 10.59,14.83C10.2,15.22 9.56,15.22 9.17,14.83C7.22,12.88 7.22,9.71
                            9.17,7.76V7.76L12.71,4.22C14.66,2.27 17.83,2.27 19.78,4.22C21.73,6.17 21.73,9.34 19.78,11.29L18.29,12.78C18.3,11.96 18.17,11.14
                            17.89,10.36L18.36,9.88C19.54,8.71 19.54,6.81 18.36,5.64C17.19,4.46 15.29,4.46 14.12,5.64L10.59,9.17C9.41,10.34 9.41,12.24
                            10.59,13.41M13.41,9.17C13.8,8.78 14.44,8.78 14.83,9.17C16.78,11.12 16.78,14.29 14.83,16.24V16.24L11.29,19.78C9.34,21.73 6.17,21.73
                            4.22,19.78C2.27,17.83 2.27,14.66 4.22,12.71L5.71,11.22C5.7,12.04 5.83,12.86 6.11,13.65L5.64,14.12C4.46,15.29 4.46,17.19
                            5.64,18.36C6.81,19.54 8.71,19.54 9.88,18.36L13.41,14.83C14.59,13.66 14.59,11.76 13.41,10.59C13,10.2 13,9.56 13.41,9.17Z" />
                    </svg>
                   
                    <span>Refer Friends</span>
                </a>
            </li>
            <li>
                <a href="<?php if(!empty($guser['ProfileName'])) { echo 'contact'; } elseif(empty($user_information['ProfileName']) && !empty($_SESSION['Userid'])){ echo 'profile-info'; } elseif(!empty($_SESSION['Userid'])) { echo 'contact'; } else { echo 'signin';}?>">
                    <svg  viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M19.79,15.41C20.74,13.24 20.74,10.75 19.79,8.59L17.05,9.83C17.65,11.21 17.65,12.78 17.06,14.17L19.79,15.41M15.42,4.21C13.25,3.26 10.76,3.26 8.59,4.21L9.83,6.94C11.22,6.35 12.79,6.35 14.18,6.95L15.42,4.21M4.21,8.58C3.26,10.76 3.26,13.24 4.21,15.42L6.95,14.17C6.35,12.79 6.35,11.21 6.95,9.82L4.21,8.58M8.59,19.79C10.76,20.74 13.25,20.74 15.42,19.78L14.18,17.05C12.8,17.65 11.22,17.65 9.84,17.06L8.59,19.79M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,8A4,4 0 0,0 8,12A4,4 0 0,0 12,16A4,4 0 0,0 16,12A4,4 0 0,0 12,8Z" />
                    </svg>
                    <span>Contact Support</span>
                </a>
            </li>
            <?php if(!empty($guser['ProfileName'] || !empty($_SESSION['Userid']))) { ?>
            <?php  ?>
            <li>
                <a href="logout" class="logout-hidden-desk">
                    <svg  viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M14.08,15.59L16.67,13H7V11H16.67L14.08,8.41L15.5,7L20.5,12L15.5,17L14.08,15.59M19,3A2,2 0 0,1
                            21,5V9.67L19,7.67V5H5V19H19V16.33L21,14.33V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3
                            5,3H19Z" />
                    </svg>
                    <span>Logout</span>
                </a>
            </li>
            <?php } else {}?>
        </ul>
    </div>
</div>
<!-------------------------------------------search bar content script------------------------------------------------------------------>
<script>
    const accordionBtns = document.querySelectorAll(".accordion");
    accordionBtns.forEach((accordion) => {
      accordion.onclick = function () {
        this.classList.toggle("is-open");
    
        let content = this.nextElementSibling;
        console.log(content);
    
        if (content.style.maxHeight) {
          //this is if the accordion is open
          content.style.maxHeight = null;
        } else {
          //if the accordion is currently closed
          content.style.maxHeight = content.scrollHeight + "px";
          console.log(content.style.maxHeight);
        }
      };
    });
                     

    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    function myFun() {
      document.getElementById("myDropdown").classList.toggle("show");
    }
    
    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
</script>
<script>
  // Function to show the search div
  function showSearchDiv() {
    var searchDiv = document.getElementById("searchDiv");
    searchDiv.style.display = "block";
  }

  // Function to hide the search div
  function hideSearchDiv() {
    var searchDiv = document.getElementById("searchDiv");
    searchDiv.style.animation = "slideOut 0.9s forwards"; // Apply the animation
    setTimeout(() => {
      searchDiv.style.display = "none"; // Hide the div after the animation
      searchDiv.style.animation = ""; // Reset the animation property
    }, 500);
  }

  // Function to toggle the dropdown for messages
  function toggleDropdownMsges() {
    var dropdownew = document.getElementById("myDropdownDrop");
    dropdownew.classList.toggle("shown");
  }

  window.onclick = function (event) {
    if (!event.target.matches('#myButtonDrop')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      for (var i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('shown')) {
          openDropdown.classList.remove('shown');
        }
      }
    }
  }

  // Event listener for the back button
  var backButton = document.getElementById("backButton");
  if (backButton) {
    backButton.addEventListener("click", hideSearchDiv);
  }
</script>


<!--mobile search popup script-->  