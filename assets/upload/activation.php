<?php include('inc/header.php'); 
$activationcode = $_GET['code'];
$ActivationCode = $obj->UpdateStatusByactivationcode($activationcode);
	?>

                  
	<div class="container">
	  
         <?php if(empty($activationcode)) { ?>
       <div class="alert alert-danger" role="alert" style="float: right; width: 44%;text-align: center; margin: 0 0 00 155px;">Not Activate</div>	        
         <?php  } else { ?>
           <div class="alert alert-success" role="alert" style="float: right; width: 44%;text-align: center; margin: 0 0 00 155px;">Activated</div>
                 
          <?php  }  ?>
           </div>	            
	                  			                      			               
				

<?php include('inc/footer.php'); ?>