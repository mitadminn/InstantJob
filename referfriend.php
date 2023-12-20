<?php
    $page = 'Refer a friends';
    include('inc/header.php'); 
      $link = $_GET['uid'];
     
    ?>
<?php include('inc/sidebar.php'); ?>      
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
<div class="col-lg-9 col-md-9 refer-rw">
    <div class="head-mid refer-head">
        <h2>Refer Friend</h2>
    </div>
    <!-- ----------------------middle one---------------------- -->
    <div class="refer-main">
        <div class="refer-chld">
            <div class="img-cash-green text-center">
                <img src="assets/img/cash-multiple copy.png"></img>
            </div>
            <br>
            <div  class="title-content refer-cont-p refer_title_summary">
                <p>Get RMX10 for you and your friends when they make the first deposite and sign through your link</p>
            </div>
            <label class="refer-link">
                <!--Referral link-->
                <div class="input-refer">
                    <a href="signin?uid=<?=$link;?>">
                        <div class="btn btn-primary">
                            Sign up, it's free
                        </div>
                    </a>
                </div>
            </label>
        </div>
    </div>
    <!---------------------- middle one end -------------------------->
</div>
<!--copy url button script -->
<script>
    function myFunction() {
      // Get the text field
      var copyText = document.getElementById("myInput");
    
      // Select the text field
      copyText.select();
      copyText.setSelectionRange(0, 99999); // For mobile devices
    
      // Copy the text inside the text field
      navigator.clipboard.writeText(copyText.value);
      
      // Alert the copied text
      alert("Copied the text: " + copyText.value);
    }
</script>
<!--copy url button script -->
<?php include('inc/footer.php'); ?>