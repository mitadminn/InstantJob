<?php
  $page = 'Portfolio';
   include('inc/header.php'); 
  
  $portfolio = $obj->GetPortfolioByUserId($user_id);
  
  
  
  ?>
<link rel="stylesheet" src="assets/css/portfolio.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<?php include('inc/sidebar.php'); ?>     
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
<div class="col-lg-9 col-md-9 second-mid example">
  <div class="head-mid">
    <h2>Public Profile</h2>
  </div>
  <!-- ----------------------middle one---------------------- -->
  <div class="bck-white">
    <form method="post" action="admin/inc/process.php?action=EditPortfolio" enctype="multipart/form-data">
      <?php include('user-information.php'); ?>
      <div class="row">
        <div class="col-lg-12">
          <!--title & summary 3-->
          <div class="profile-mid-content">
            <div class="title-and-para">
              <div class="bio-title">
                <h3>Portfolio</h3>
              </div>
              <div class="bio-img-portfolio">
                <div class="upload__box">
                  <div class="upload__btn-box">
                    <label class="upload__btn">
                      <p>Upload images</p>
                      <input type="hidden" name="id" value="<?=$user_id;?>">
                      <input type="file" multiple="" class="form-control upload__inputfile" name="portfolio[]" data-max_length="20" >
                    </label>
                    <div class="all-images">
                      <?php while($row=mysqli_fetch_array($portfolio)){ ?>
                      <div class="add-img-container slide">
                        <img class="add-img photo" src="admin/assets/img/portfolio/<?=$row['Photos'];?>" alt="">
                        <button id="del">x</button>
                      </div>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="upload__img-wrap"></div>
                </div>
              </div>
            </div>
          </div>
          <br> 
          <button type="submit" class="btn btn-success btn-pro-edit"> Update Profile</button>		
        </div>
      </div>
    </form>
  </div>
</div>
<?php include('inc/footer.php'); ?> 
<!--reviews-->
<script>
  $(":date").dateinput({ trigger: true, format: 'dd mmmm yyyy', min: -1 })
  $(":date").bind("onShow onHide", function()  {
  $(this).parent().toggleClass("active");
  });
    $(":date:first").data("dateinput").change(function() {
   	// we use it's value for the seconds input min option
  	$(":date:last").data("dateinput").setMin(this.getValue(), true);
      });
</script>
<script>
  $('.slide button').on('click',function(){
    $(this).parent('.slide').remove();
  });
           
</script>