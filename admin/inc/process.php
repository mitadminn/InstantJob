<?php 
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
ob_start();
session_start();
include('function.php');
$users = new instantjobs(); 
$con = mysqli_connect(DbHost, DbUser, DbPass, DbName) or die('Could not connect:' . mysqli_connect_error());
define('BASE_URL', 'https://rpc.instantjob.org');
/* Login */ 
    require_once '../../vendor/autoload.php';
    require_once '../../SDK-RazerMS_PHP/src/lib/Payment.php';        
    use RazerMerchantServices\Payment;
    
    $yourcountry =  $_SESSION['Country']; 
    if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'Signin') { 
    extract($_REQUEST);
     
     $email = mysqli_real_escape_string($con, $email);
     $password = mysqli_real_escape_string($con, $password);
     
    $data = $users->UserLogin($email, $password);
 	$userinfo = $users->CheckUserByEmail($email);
   
 	if($data): 
         header('location:../../service-provider');
    elseif($userinfo['Status'] == 0):
        header('location:../../signin?msg=notactive');
     else:
        header('location:../../signin?msg=fail');
    endif;
    
} 
    // Admin Login
    if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'AdminSignin') {
    extract($_REQUEST);
     
    $data = $users->AdminLogin($username, $password);
   
 	if($data): 
         header('location:../dashboard?msg=suc');
     else:
        header('location:../index');
    endif;
    
} 
    /* User Addition */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'AddUser') {
   extract($_REQUEST);
   
   function generateRandomString($length = 7) {
    $characters = '0123456789';
    $charactersLength = strlen($characters); 
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
     
 $userid = generateRandomString();
 
 
    $data = $users->AddUser($userid, $name, $email, $userole, $username, $password);
   
 	if($data): 
         header('location:../backend-user?msg=suc');
     else:
        header('location:../backend-user?msg=fail');
    endif;
   
      
  }
    /* User Sign up */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'SignUpUser') {
    extract($_REQUEST);
      $EmailValidation = $users->CheckUserByEmail($email);
     if($EmailValidation['Email'] == $email) {
         
         header('location:../../signin?msg=already');
         
        // echo 'This Email already Used, Please try to login';
        } else {
     function generateRandomString($length = 6) {
    $characters = '0123456789';
    $charactersLength = strlen($characters); 
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    }
     
    $activationcode = generateRandomString();
    
        $numbers = explode("-", $refertokken);
        $userid = $numbers[0];
      
    $data = $users->Referall($userid,$refertokken);
    $data = $users->Signup($email, $password,$activationcode,$refertokken,$userid);
       
    if ($data):
            
    $subject = "Please verify your email address";
    $to = $email;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // More headers
    $headers .= 'From:info@instantjob.org'. "\r\n";
    
    $message .= ' 
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="">
    <tr>
       <td bgcolor="" align="center">
          <table border="0" cellpadding="0" cellspacing="0" width="480" >
             <tr>
                <td align="center" valign="top" style="">
                   <img width="200" src="'.BASE_URL.'/admin/assets/images/new-instant-logo.png" alt="instant_logo">
                </td>
             </tr>
          </table>
       </td>
    </tr>
    <tr>
       <td bgcolor="" align="center" style="padding: 0px 10px 0px 10px;">
          <table border="0" cellpadding="0" cellspacing="0" width="480" >
             <tr>
                <td bgcolor="#ffffff" align="left" valign="top" style="padding: 30px 30px 20px 30px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                   <h1 align="center" style="font-size: 32px; font-weight: 400; margin: 0; font-family: sans-serif;">Verify Your Email</h1>
                </td>
             </tr>
          </table>
       </td>
    </tr>
    <tr>
       <td bgcolor="" align="center" style="padding: 0px 10px 0px 10px;">
          <table border="0" cellpadding="0" cellspacing="0" width="480" >
             <tr>
                <td align="center" style="padding:0 35px; background-color: #fff;">
                   <span style="display:block; margin-left:auto; margin-right:auto; margin-top:19px; margin-bottom:30px; border-bottom:1px solid #cecece; width:100px;"></span>
                   <p style="color:#455056; font-size:17px;line-height:24px; margin:0;font-weight:500; font-family: sans-serif;">Hi User</p>
                   <br>
                   <p align="center" style="color:#455056; font-size:15px;line-height:24px; margin:0; font-family: sans-serif;">
                      Thank you for joining our community.
                      Your 6 digit OTP is '.$activationcode.'
                   </p>
                   <br>
                   <p style="color:#455056; font-size:15px;line-height:24px; margin:0; font-family: sans-serif;">Regards,</p>
                   <p style="color:#455056; font-size:15px;line-height:24px; margin:0; font-family: sans-serif;">Team instantjob</p>
                </td>
             </tr>
             <tr>
                <td bgcolor="#ffffff" align="center">
                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                         <td bgcolor="#ffffff" align="center" style="padding: 30px 30px 30px 30px;">
                            <table border="0" cellspacing="0" cellpadding="0">
                             
                            </table>
                         </td>
                      </tr>
                   </table>
                </td>
             </tr>
          </table>
       </td>
    </tr>
 </table>

 <div style="height: 50px;background: #f4f4f4;"></div>
 <table border="0" cellpadding="0" cellspacing="0" align="center"
    width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
    max-width: 560px;" class="wrapper">
    <tr>
       <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
          padding-top: 25px;" class="social-icons">
          <table
             width="256" border="0" cellpadding="0" cellspacing="0" align="center" style="border-collapse: collapse; border-spacing: 0; padding: 0;">
             <tr>
                
                <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
                   href="https://raw.githubusercontent.com/konsav/email-templates/"
                   style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                   color: #000000;"
                   alt="F" title="Facebook"
                   width="44" height="44"
                   src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/facebook.png"></a></td>
                
                <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
                   href="https://raw.githubusercontent.com/konsav/email-templates/"
                   style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                   color: #000000;"
                   alt="T" title="Twitter"
                   width="44" height="44"
                   src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/twitter.png"></a></td>
               
                <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
                   href="https://raw.githubusercontent.com/konsav/email-templates/"
                   style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                   color: #000000;"
                   alt="G" title="Google Plus"
                   width="44" height="44"
                   src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/googleplus.png"></a></td>
                
                <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
                   href="https://raw.githubusercontent.com/konsav/email-templates/"
                   style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                   color: #000000;"
                   alt="I" title="Instagram"
                   width="44" height="44"
                   src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/instagram.png"></a></td>
             </tr>
          </table>
       </td>
    </tr>


   
       <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
          padding-top: 20px;
          padding-bottom: 20px;
          color: #999999;
          font-family: sans-serif;" class="footer">
          This email template was sent to&nbsp;you becouse we&nbsp;want to&nbsp;make the&nbsp;world a&nbsp;better place. You&nbsp;could change your <a href="https://github.com/konsav/email-templates/" target="_blank" style="text-decoration: underline; color: #999999; font-family: sans-serif; font-size: 13px; font-weight: 400; line-height: 150%;">subscription settings</a> anytime.
        
          <img width="1" height="1" border="0" vspace="0" hspace="0" style="margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;"
             src="https://raw.githubusercontent.com/konsav/email-templates/master/images/tracker.png" />
       </td>
    </tr>

 </table>
 </body>';
 
$mailto = mail($to,$subject,$message,$headers);
$val = $email;
$emails = $users->myUrlEncode($val);
         header('location:../../email-confirm?email='.$emails);
     else:
         header('location:../../signin?msg=fail');
    endif; 
    
    
  }  
     
     
 }
    /* Bio Edit */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'EditBio') {
        extract($_REQUEST);
        $data = $users->EditBio($id,$bio);
      if($data): 
             header('location:../../profile');
         else:
            header('location:../../profile');
        endif;
        
    } 
    /* Profile Edit */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'EditProfile') {
        extract($_REQUEST);
           if (isset($_FILES['profilepic'])) {
            $file_name = $_FILES['profilepic']['name'];
            $file_size = $_FILES['profilepic']['size'];
            $file_tmp = $_FILES['profilepic']['tmp_name'];
            $file_type = $_FILES['profilepic']['type'];
               $desired_dir1 = "../assets/img/profile";
             move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
              $profilepic= $_FILES['profilepic']['name'];
    		     $profilepic = $_FILES['profilepic']['name'];
    		   if (!empty($profilepic)) {
                 $profilepic = $_FILES['profilepic']['name'];
            } else {
                  $profilepic = $profilepic2;
            }	
     }
     
       
       $data = $users->EditProfiles($id,$bio,$qualification,$firstname,$icname,$email,$year,$profilepic, $phone, $skills, $hobbies, $address);
       $data = $users->BankDetails($id, $bankname, $account_no, $country);
     
     if($data): 
             header('location:../../profile');
         else:
            header('location:../../service-provider');
        endif;
        
    } 
    /* Skills */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'Skills') {
         extract($_REQUEST);
      $skil = explode(",",$skills[0]);
      $intrst = explode(",",$intrest[0]);
      
        $users->DeleteSkills($userid);
        $users->DeleteInterest($userid);
      foreach($skil as $skillsval) {
          $sk= $users->AddSkills($userid, $skillsval);
      }
      
      foreach($intrst as $intrests) {
          $intrst = $users->AddIntrest($userid, $intrests);
      }
      
      
      
    //   $hb = $users->AddSkills($userid,$intrest);
    if($data): 
             header('location:../../profile');
         else:
            header('location:../../profile');
        endif;
     }
    /* More Skills */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'MoreSkills') {
        extract($_REQUEST);
        $data = $users->SearchMoreSkills($searchskils, $addskils);
        if($data): 
             header('location:../../search-result?Skills='.$searchskils.'&&addskil='.$addskils);
         else:
            header('location:../../search-result');
        endif;
     
    }
    /* Qualification */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'Qualification') {
         extract($_REQUEST);
      
     $userid = $_SESSION['Userid'];
      $data = $users->UpdateQualification($userid,$qualification);
    if($data): 
             header('location:../../profile');
         else:
            header('location:../../profile');
        endif;
     }
     /* Edit Portfolio */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'EditPortfolio') {
        extract($_REQUEST);
    
     
    
    $targetDirectory = "../assets/img/portfolio/"; 
          if (isset($_FILES['portfolio'])) { 
              $users->DeletePortfolioByUser($id);
              foreach ($_FILES['portfolio']['tmp_name'] as $key => $tmpName) {
              
            $file_name = $_FILES['portfolio']['name'][$key];
            $file_size = $_FILES['portfolio']['size'][$key];
            $file_tmp = $_FILES['portfolio']['tmp_name'][$key];
            $file_type = $_FILES['portfolio']['type'][$key];
            $desired_dir1 = "../assets/img/portfolio/";
             move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
              $images = $_FILES['portfolio']['name'];
              }
          if(!empty($editimage)) {
         // Combine the two lists into a single list of images to keep
        $images_to_keep = array_merge($images, $editimage);
          } else {
        $images_to_keep = array_merge($images);
          }
    // Remove values considered as empty
    $allimage = array_filter($images_to_keep, function($value) {
        return !empty($value);
    });
    
      for ($i = 0; $i < count($allimage); $i++) {
              $uniqueName = $allimage[$i];
            //   $targetPath = $targetDirectory . $uniqueName;
            
             $desired_dir1 = "../assets/img/portfolio/";
                move_uploaded_file($tmpName, $targetPath);
                // move_uploaded_file($file_tmp, "$desired_dir1" . $uniqueName);
            //   $users->PostImages($uniqueName,$topic);
              $data = $users->Portfolio($id, $uniqueName);
      }
      }
      
      
    
    
    //   if (isset($_FILES['portfolio'])) {
              
            
    //   $files = $_FILES['portfolio'];
       
      
    //   for ($i = 0; $i < count($files['name']); $i++) {
    //         $file_name = $_FILES['portfolio']['name'];
    //         $file_size = $_FILES['portfolio']['size'];
    //         $file_tmp = $_FILES['portfolio']['tmp_name'];
    //         $file_type = $_FILES['portfolio']['type'];
    //           $desired_dir1 = "../assets/img/portfolio";
    //          move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
    //           $portfolio = $_FILES['portfolio']['name'];
    // 		     if (!empty($portfolio)) {
    //              $pportfolio = $_FILES['portfolio']['name'];
    //         } else {
    //               $portfolio = $images;
    //         }	
    //             //   $portfolio = $_FILES['portfolio']['name'];
             
    //         // print_r($images);
    //      // Combine the two lists into a single list of images to keep
    //   $images_to_keep = array_merge($portfolio, $images);
    //     for ($i = 0; $i < count($images_to_keep); $i++) {
    //           $portfolio = $images_to_keep[$i];
    //         $desired_dir1 = "../assets/img/services";
    //       move_uploaded_file($file_tmp, "$desired_dir1/" . $portfolio);
    //         //   $users->PostImages($portfolio,$topic);
    //           $data = $users->Portfolio($id, $portfolio);
    
    //   }}
            
    //  }
    
      
     	if($data): 
             header('location:../../profile');
         else:
            header('location:../../profile');
        endif;
        
    } 
    /* Email Confirm */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'ConfirmEmail') {
        extract($_REQUEST);
        $val = $email;
        $emails = $users->myUrlEncode($val);
         $data = $users->ConfirmEmail($emailotp, $emails); 
      	$userinfo = $users->CheckUserByEmail($emails);
    
      	if($userinfo['Status'] == 1): 
      	    $_SESSION['Userid'] = $userinfo['id'];
      	      $_SESSION['Email'] = $userinfo['Email'];
      	      $password = $userinfo['Password'];
      	      $users->UserLogin($emails, $password);
            // echo 'OTP confirmed Successfully';
               $subject = "Please verify your email address";
    $to = $emails;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // More headers
    $headers .= 'From:info@instantjob.org'. "\r\n";
     $message .= ' 
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
           <td bgcolor="#" align="center">
              <table border="0" cellpadding="0" cellspacing="0" width="480" >
                 <tr>
                    <td align="center" valign="top" style="">
                         <img src="'.BASE_URL.'assets/images/new-instant-logo.png" alt="">
                    </td>
                 </tr>
              </table>
           </td>
        </tr>
        <tr>
           <td bgcolor="#" align="center" style="padding: 0px 10px 0px 10px;">
              <table border="0" cellpadding="0" cellspacing="0" width="480" >
                 <tr>
                    <td bgcolor="#ffffff" align="left" valign="top" style="padding: 30px 30px 20px 30px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                       <h1 style="font-size: 32px; text-align:center; font-weight: 400; margin: 0; font-family: sans-serif;">Account Activated</h1>
                    </td>
                 </tr>
              </table>
           </td>
        </tr>
        <tr>
           <td bgcolor="#" align="center" style="padding: 0px 10px 0px 10px;">
              <table border="0" cellpadding="0" cellspacing="0" width="480">
                 <tr>
                    <td style="padding:0 35px; background-color: #fff;">
                       <span style="display:block; margin-left:auto; margin-right:auto; margin-top:19px; margin-bottom:30px; border-bottom:1px solid #cecece; width:100px;"></span>
                       <p style="color:#455056; font-size:17px;line-height:24px; margin:0;font-weight:500; font-family: sans-serif;">Hi User</p>
                       <br>
                       <p style="color:#455056; font-size:15px;line-height:24px; margin:0; font-family: sans-serif;">
                         
                         Thank you your email has been verified. Your account is now active.
                         Please use the link below to login to your account.
                         
                       </p>
                       <br>
                       <p style="color:#455056; font-size:15px;line-height:24px; margin:0; font-family: sans-serif;">Regards,</p>
                       <p style="color:#455056; font-size:15px;line-height:24px; margin:0; font-family: sans-serif;">Team instantjob</p>
                    </td>
                 </tr>
                 <tr>
                    <td bgcolor="#ffffff" align="center">
                       <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                             <td bgcolor="#ffffff" align="center" style="padding: 30px 30px 30px 30px;">
                                <table border="0" cellspacing="0" cellpadding="0">
                                   <tr>
                                      <td align="left" >
                <a href="'.BASE_URL.'/signin.php" target="_blank" style="font-size: 14px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 11px 22px; border-radius: 25px; background: #00c853; display: inline-block;    font-family: sans-serif;">Login To Your Account</a>
                                      </td>
                                   </tr>
                                </table>
                             </td>
                          </tr>
                       </table>
                    </td>
                 </tr>
              </table>
           </td>
        </tr>
     </table>
    
     <div style="height: 50px;background: #f4f4f4;"></div>
     <table border="0" cellpadding="0" cellspacing="0" align="center"
        width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
        max-width: 560px;" class="wrapper">
        <tr>
           <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
              padding-top: 25px;" class="social-icons">
              <table
                 width="256" border="0" cellpadding="0" cellspacing="0" align="center" style="border-collapse: collapse; border-spacing: 0; padding: 0;">
                 <tr>
                    
                    <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
                       href="https://raw.githubusercontent.com/konsav/email-templates/"
                       style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                       color: #000000;"
                       alt="F" title="Facebook"
                       width="44" height="44"
                       src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/facebook.png"></a></td>
                    
                    <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
                       href="https://raw.githubusercontent.com/konsav/email-templates/"
                       style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                       color: #000000;"
                       alt="T" title="Twitter"
                       width="44" height="44"
                       src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/twitter.png"></a></td>
                   
                    <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
                       href="https://raw.githubusercontent.com/konsav/email-templates/"
                       style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                       color: #000000;"
                       alt="G" title="Google Plus"
                       width="44" height="44"
                       src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/googleplus.png"></a></td>
                    
                    <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
                       href="https://raw.githubusercontent.com/konsav/email-templates/"
                       style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                       color: #000000;"
                       alt="I" title="Instagram"
                       width="44" height="44"
                       src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/instagram.png"></a></td>
                 </tr>
              </table>
           </td>
        </tr>
    
    
       
           <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
              padding-top: 20px;
              padding-bottom: 20px;
              color: #999999;
              font-family: sans-serif;" class="footer">
              This email template was sent to&nbsp;you becouse we&nbsp;want to&nbsp;make the&nbsp;world a&nbsp;better place. You&nbsp;could change your <a href="https://github.com/konsav/email-templates/" target="_blank" style="text-decoration: underline; color: #999999; font-family: sans-serif; font-size: 13px; font-weight: 400; line-height: 150%;">subscription settings</a> anytime.
            
              <img width="1" height="1" border="0" vspace="0" hspace="0" style="margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;"
                 src="https://raw.githubusercontent.com/konsav/email-templates/master/images/tracker.png" />
           </td>
        </tr>
    
     </table>
     </body>';
     $mailto = mail($to,$subject,$message,$headers);
            
             header('location:../../profile-info');
         else:
            // echo 'Something wrong Please check OTP';
            header('location:../../email-confirm?email='.$emails.'&msg=error');
        endif;
        
    } 
    /* User Logout */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'Userlogout') {
         session_start(); 
        session_unset();
        session_destroy();
        setcookie("topic", "", time()-3600);
        header("location:../../service-provider.php");
    }
    /* Admin Logout */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'AdminLogout') {
        session_start(); 
        session_unset();
        session_destroy();
        header("location:../index.php");
    }
    /* Profile */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'ProfileInfo') {
        extract($_REQUEST);
         if (isset($_FILES['govtid'])) {
            $file_name = $_FILES['govtid']['name'];
            $file_size = $_FILES['govtid']['size'];
            $file_tmp = $_FILES['govtid']['tmp_name'];
            $file_type = $_FILES['govtid']['type'];
               $desired_dir1 = "../assets/img/govtid";
             move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
              $govtid = $_FILES['govtid']['name'];
    		    
     }
     
     if (isset($_FILES['ssm'])) {
            $file_name = $_FILES['ssm']['name'];
            $file_size = $_FILES['ssm']['size'];
            $file_tmp = $_FILES['ssm']['tmp_name'];
            $file_type = $_FILES['ssm']['type'];
               $desired_dir1 = "../assets/img/govtid";
             move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
              $ssm = $_FILES['ssm']['name'];
    		    
     }
     
        $skillss = implode(',',$skills);
        $userid = $id;
         $skil = explode(",",$skills[0]);
    //   $intrst = explode(",",$intrest[0]);
      
        $users->DeleteSkills($userid);
       foreach($skil as $skillsval) {
          $sk= $users->AddSkills($userid, $skillsval);
      }
        // $hobbie = implode(',',$hobbies);
      
        $data = $users->ProfileInfo($id,$name,$country, $skillss, $langauge,$govtid, $fullname, $icnumber, $date, $countrry,$contactnumber, $address,$ssm, $companyname, $personincharge,$usertype );
        $data = $users->VerifyDetails($id, $govtid, $fullname, $icnumber, $date, $countrry,$contactnumber, $address,$ssm, $companyname, $personincharge,$usertype);
      
     	if($data): 
             header('location:../../profile');
         else:
            header('location:../../signin');
        endif;
        
    } 
    /* Create Service */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'CreateService') {
        extract($_REQUEST);
        
      
    
     
    //  $tp = 'i will help '.$topic;
      $topic =  mysqli_real_escape_string($con, $topic);
      $description =  mysqli_real_escape_string($con, $_POST["description"]);
      function generateRandomString($length = 6) {
        $characters = '0123456789';
        $charactersLength = strlen($characters); 
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
     foreach($field_name as $index => $value) {
          $val = $field_name[$index];
           $vals = $field_price[$index];
            $adonss = $users->Addons($id, $val, $vals, $topic);
    }
         $random_id = generateRandomString();
         $post_type = 'service';
         
         $users->DeletePostImages($topic);
       if (isset($_FILES['image'])) {
              $users->DeletePostImages($topic);
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $desired_dir1 = "../assets/img/services";
             move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
              $image = $_FILES['image']['name'];
    		   if (!empty($image)) {
                  $image = $_FILES['image']['name'];
            } else {
                  $image = $editimage;
            }
            
         // Combine the two lists into a single list of images to keep
    $images_to_keep = array_merge($image, $editimage);
     
     
       for ($i = 0; $i < count($images_to_keep); $i++) {
            $image = $images_to_keep[$i];
            $desired_dir1 = "../assets/img/services";
          move_uploaded_file($file_tmp, "$desired_dir1/" . $image);
               $users->PostImages($image,$topic);
    
       }
            
     }
     
     
         $data = $users->CreateService($id, $topic, $description, $postprice, $currency, $area,$state,$city, $how_fast, $preferedday, $image, $ads,$country,$random_id,$post_type);
     
      	if($data): 
             header('location:../../post-preview?topic='.$topic);
         else:
            header('location:../../service-provider?msg=fail');
        endif;
        
    }
    /* Edit Service */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'EditService') {
        extract($_REQUEST);
          
     $tp = $_POST["topic"];
      $topic =  mysqli_real_escape_string($con, $tp);
      $description =  mysqli_real_escape_string($con, $_POST["description"]);
         
        
         $users->DeletePostImages($topic);
        //  $featured_image;
        //  $users->featured_image($featured_image);
         $targetDirectory = "../assets/img/services/"; 
          if (isset($_FILES['image'])) { 
              foreach ($_FILES['image']['tmp_name'] as $key => $tmpName) {
              
            $file_name = $_FILES['image']['name'][$key];
            $file_size = $_FILES['image']['size'][$key];
            $file_tmp = $_FILES['image']['tmp_name'][$key];
            $file_type = $_FILES['image']['type'][$key];
            $desired_dir1 = "../assets/img/services/";
             move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
              $images = $_FILES['image']['name'];
              }
          if(!empty($editimage)) {
         // Combine the two lists into a single list of images to keep
        $images_to_keep = array_merge($images, $editimage);
          } else {
        $images_to_keep = array_merge($images);
          }
    // Remove values considered as empty
    $allimage = array_filter($images_to_keep, function($value) {
        return !empty($value);
    });
    
      for ($i = 0; $i < count($allimage); $i++) {
              $uniqueName = $allimage[$i];
            //   $targetPath = $targetDirectory . $uniqueName;
            
             $desired_dir1 = "../assets/img/services/";
                move_uploaded_file($tmpName, $targetPath);
                // move_uploaded_file($file_tmp, "$desired_dir1" . $uniqueName);
              $users->PostImages($uniqueName,$topic);
      }
      }
              
          
     
    //  $users->DeletePostImages($topic);
         
         
    //      $targetDirectory = "../assets/img/services/";  // Specify the folder path where you want to save the uploaded images
    
    //     foreach ($_FILES['image']['tmp_name'] as $key => $tmpName) {
    //     $fileName = $_FILES['image']['name'][$key];
    //     $fileSize = $_FILES['image']['size'][$key];
    //     $fileType = $_FILES['image']['type'][$key];
    //     $fileError = $_FILES['image']['error'][$key];
      
    //     // Generate a unique name for the file to avoid naming conflicts
    //     $uniqueName = uniqid() . '_' . $fileName;
      
    //     // Move the uploaded file to the target directory
    //     $targetPath = $targetDirectory . $uniqueName;
    
    //           $images_to_keep = array_merge($uniqueName, $editimage);
    //     //   } else {
    //     echo '<br>';
    //     //   echo  $images_to_keep = array_merge($images);
    //         echo '<br>';
    //         print_r($images_to_keep);
    //     //   }
    
    
    // //  print_r($fileName);
    //     if (move_uploaded_file($tmpName, $targetPath)) {
    //         // Insert the image details into the database
    //         $users->PostImages($uniqueName,$topic);
    //     }
    // }
    
    // die;
     foreach($field_name as $index => $value) {
          $val = $field_name[$index];
           $vals = $field_price[$index];
            $adonss = $users->Addons($id, $val, $vals, $topic);
    }
     
     
         $data = $users->EditService($serviceid,$userid, $topic, $description, $postprice, $currency, $area,$state,$city, $how_fast, $preferedday, $uniqueName, $ads,$country);
     
      	if($data): 
            //  header('location:../../manage-post?f1=all');
                      header('location:../../post-preview?topic='.$topic);
    
         else:
            header('location:../../edit-service?id='.$id);
        endif;
        
    }
    /* Delete Service */ 
    elseif(isset($_REQUEST['deleteservice']) && $_REQUEST['type']) {
        extract($_REQUEST);
        
        $id = $deleteservice;
        $type;
      if($type == 'service') {
            $data = $users->DeleteService($id);
        
      } elseif($type == 'job'){
           $data = $users->DeletePost($id);
      }else{}
     	if($data): 
             header('location:../../manage-post?f1=all');
         else:
            header('location:../../manage-post?f1=all');
        endif;
        
    } 
     /* Service Approval */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'ServiceApprovalRequest') {
        extract($_REQUEST);
          
        $data = $users->ServiceApprovalRequest($PostId, $TotalAmount);
         
    } 
    /* Create Job */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'CreateJob') {
        extract($_REQUEST);
      
        
      
    
    
      $tp = $_POST["topic"];
      $topic =  mysqli_real_escape_string($con, $tp);
      $description =  mysqli_real_escape_string($con, $_POST["description"]);
          function generateRandomString($length = 6) {
        $characters = '0123456789';
        $charactersLength = strlen($characters); 
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
         $random_id = generateRandomString();
         $post_type = 'job';
         
         if (isset($_FILES['image'])) {
         $files = $_FILES['image'];
       for ($i = 0; $i < count($files['name']); $i++) {
          $image = $files['name'][$i];
          $tmp_name = $files['tmp_name'][$i];
          $desired_dir1 = "../assets/img/services";
          move_uploaded_file($tmp_name, "$desired_dir1/" . $image);
         $users->PostImages($image,$topic);
        // Handle the uploaded file here
      }
    }
         
           $duplicate = $users->CheckName($topic);
         $duplicate['topic'];
          $topic;
         if($duplicate['topic']) {
            header('location:../../duplicate-post?id='.$postid.'&msg=duplicate');
        } else {
        
        
        
        $data = $users->CreateJob($id, $topic, $description, $price, $currency, $area,$state,$city, $how_fast, $image,$country,$random_id,$post_type);
      
      
       
    
     	if($data): 
             header('location:../../job-preview?job='.$topic);
         else:
            header('location:../../create-post');
        endif;
        }
    } 
    /* Edit Job */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'EditJob') {
        extract($_REQUEST);
    
      $tp = $_POST["topic"];
      $topic =  mysqli_real_escape_string($con, $tp);
      $description =  mysqli_real_escape_string($con, $_POST["description"]);
    
    //      $users->DeletePostImages($topic);
         
         
    //      $targetDirectory = "../assets/img/services/";  // Specify the folder path where you want to save the uploaded images
    
    //     foreach ($_FILES['image']['tmp_name'] as $key => $tmpName) {
    //     $fileName = $_FILES['image']['name'][$key];
    //     $fileSize = $_FILES['image']['size'][$key];
    //     $fileType = $_FILES['image']['type'][$key];
    //     $fileError = $_FILES['image']['error'][$key];
      
    //     // Generate a unique name for the file to avoid naming conflicts
    //     $uniqueName = uniqid() . '_' . $fileName;
      
    //     // Move the uploaded file to the target directory
    //     $targetPath = $targetDirectory . $uniqueName;
    
    // //  print_r($fileName);
    //     if (move_uploaded_file($tmpName, $targetPath)) {
    //         // Insert the image details into the database
    //         $users->PostImages($uniqueName,$topic);
    //     }
    // }
        $users->DeletePostImages($topic);
        //  $featured_image;
        //  $users->featured_image($featured_image);
         $targetDirectory = "../assets/img/services/"; 
          if (isset($_FILES['image'])) { 
              foreach ($_FILES['image']['tmp_name'] as $key => $tmpName) {
              
            $file_name = $_FILES['image']['name'][$key];
            $file_size = $_FILES['image']['size'][$key];
            $file_tmp = $_FILES['image']['tmp_name'][$key];
            $file_type = $_FILES['image']['type'][$key];
            $desired_dir1 = "../assets/img/services/";
             move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
              $images = $_FILES['image']['name'];
              }
          if(!empty($editimage)) {
         // Combine the two lists into a single list of images to keep
        $images_to_keep = array_merge($images, $editimage);
          } else {
        $images_to_keep = array_merge($images);
          }
    // Remove values considered as empty
    $allimage = array_filter($images_to_keep, function($value) {
        return !empty($value);
    });
    
      for ($i = 0; $i < count($allimage); $i++) {
              $uniqueName = $allimage[$i];
            //   $targetPath = $targetDirectory . $uniqueName;
            
             $desired_dir1 = "../assets/img/services/";
                move_uploaded_file($tmpName, $targetPath);
                // move_uploaded_file($file_tmp, "$desired_dir1" . $uniqueName);
              $users->PostImages($uniqueName,$topic);
      }
      }
      
        $data = $users->EditJob($postid,$userid, $topic, $description, $price, $currency, $area,$state,$city, $how_fast, $uniqueName,$country);
       
     	if($data): 
            //  header('location:../../manage-post?f1=all');
             header('location:../../job-preview?job='.$topic);
    
         else:
            header('location:../../edit-post?id='.$postid);
        endif;
        
    } 
    /* Job Approval */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'JobApprovalRequest') {
        extract($_REQUEST);
          
        $data = $users->JobApprovalRequest($JobId, $TotalAmount);
         
    } 
    /* Bank Details */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'BankDetails') {
    extract($_REQUEST);
  
    $data = $users->BankDetails($id, $bankname, $account_no, $country);
     
 	if($data): 
         header('location:../../profile');
     else:
        header('location:../../profile');
    endif;
    
} 
    /* Update Bank Details */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'UpdateBankDetails') {
    extract($_REQUEST);
    
    if (isset($_FILES['banklogo'])) {
          $users->DeletePostImages($topic);
        $file_name = $_FILES['banklogo']['name'];
        $file_size = $_FILES['banklogo']['size'];
        $file_tmp = $_FILES['banklogo']['tmp_name'];
        $file_type = $_FILES['banklogo']['type'];
        $desired_dir1 = "../assets/img";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $banklogo = $_FILES['banklogo']['name'];
		   if (!empty($banklogo)) {
              $banklogo = $_FILES['banklogo']['name'];
        } else {
              $banklogo = $banklogo1;
        }
    }
        
     $data = $users->UpdateBankDetails($id, $name, $bankname, $account_no, $banklogo);
     
 	if($data): 
         header('location:../../bank-details');
     else:
        header('location:../../bank-details');
    endif;
    
} 
    /* Delete Account */ 
    elseif (isset($_REQUEST['deleteaccount'])) {
    extract($_REQUEST);
  $id = $deleteaccount;
    $data = $users->DeleteBankDetail($id);
     
 	if($data): 
         header('location:../../profile');
     else:
        header('location:../../profile');
    endif;
    
} 
	/* Un active  */
    elseif (isset($_REQUEST['Approved'])) { 
    extract($_REQUEST);
	 $id = $Approved;
	  $data = $users->Approve($id);

    if ($data):
        header('location:../professional-service.php?msg=reject');
    else:
        header('location:../professional-service.php?msg=fail');
    endif;
}
	/* Active  */
    elseif (isset($_REQUEST['Rejected'])) {
    extract($_REQUEST);
	 $id = $Rejected;
	  $data = $users->Reject($id);

    if ($data):
        header('location:../professional-service.php?msg=approve');
    else:
        header('location:../professional-service.php?msg=fail');
    endif;
}
     /* Un active Job */
    elseif (isset($_REQUEST['jobactive'])) { 
        extract($_REQUEST);
    	 $id = $jobactive;
    	  $data = $users->ApprovedJob($id);
    
        if ($data):
            header('location:../job-posting.php?msg=reject');
        else:
            header('location:../job-posting.php?msg=fail');
        endif;
    }
	/* Active JOb */
    elseif (isset($_REQUEST['jobreject'])) {
    extract($_REQUEST);
	 $id = $jobreject;
	  $data = $users->RejectedJob($id);

    if ($data):
        header('location:../job-posting.php?msg=approve');
    else:
        header('location:../job-posting.php?msg=fail');
    endif;
}
	/*  Block all Users  */
    elseif (isset($_REQUEST['UserBlock'])) {
    extract($_REQUEST);
	 $id = $UserBlock;
	  $data = $users->UserBlock($id);

    if ($data):
        header('location:../allusers.php?msg=suc');
    else:
        header('location:../index.php?msg=fail');
    endif;
	}
	/* UnBlock all Users  */
    elseif (isset($_REQUEST['UserUnblock'])) {
    extract($_REQUEST);
	 $id = $UserUnblock;
	  $data = $users->UserUnblock($id);

    if ($data):
        header('location:../allusers.php?msg=suc');
    else:
        header('location:../index.php?msg=fail');
    endif;
	}
	
	
	elseif (isset($_REQUEST['UserApprove'])) {
    extract($_REQUEST);
	 $id = $UserApprove;
	 $data = $users->UserApprove($id);
	 $userid = $id;
    $userinfo = $users->GetUserById($userid);
    $reffrall_ID = $userinfo['ReferalID'];
      $cp = $users->GetRefferalCoupon();
    if ($data):
        $amount = $cp['CouponAmount'];
        $couponCode = $cp['CouponCode'];
        $users->RefferalCoupon($reffrall_ID,$amount,$couponCode);
        $users->RefferalCoupon2($userid,$amount,$couponCode);
      
        header('location:../allusers.php?msg=suc');
    else:
        header('location:../index.php?msg=fail');
    endif;
	}
	/* UnBlock all Users  */
    elseif (isset($_REQUEST['UserUnApprove'])) {
    extract($_REQUEST);
	 $id = $UserUnApprove;
	  $data = $users->UserUnApprove($id);
 
    if ($data):
        header('location:../allusers.php?msg=suc');
    else:
        header('location:../index.php?msg=fail');
    endif;
	}
	
	
 	/*  Block Admin Users  */
    elseif (isset($_REQUEST['AdminUserBlock'])) {
    extract($_REQUEST);
	 $id = $UserBlock;
	  $data = $users->AdminUserBlock($id);

    if ($data):
        header('location:../allusers.php?msg=suc');
    else:
        header('location:../index.php?msg=fail');
    endif;
	}
	/* UnBlock admin Users  */
    elseif (isset($_REQUEST['AdminUserUnblock'])) {
    extract($_REQUEST);
	 $id = $UserUnblock;
	  $data = $users->AdminUserUnblock($id);

    if ($data):
        header('location:../backend-user?msg=suc');
    else:
        header('location:../backend-user?msg=fail');
    endif;
	}
    //elseif (isset($_REQUEST['filter1'])) {
    elseif (isset($_REQUEST['filter1']) && $_REQUEST['filter2']) {

    extract($_REQUEST);
      
    $conditions = array();
// 	  $area = $filter1;
    $sortVal = $filter2; 
    $sortArr = array( 
        'new' => array( 
            'order_by' => 'created_at DESC' 
        ), 
        'high'=>array( 
            'order_by'=>'price DESC' 
        ), 
        'low'=>array( 
            'order_by'=>'price ASC' 
        )
        // 'active'=>array( 
        //     'where'=>array('status' => 1) 
        // ), 
        // 'inactive'=>array( 
        //     'where'=>array('status' => 0) 
        // ) 
    ); 
    $sortKey = key($sortArr[$sortVal]);
    $conditions[$sortKey] = $sortArr[$sortVal][$sortKey];
    $orderby =  $conditions['order_by'];
   $area = $filter1;
   
   if($pageid == 'service') {
	   if($area == 'Local') {
	    $areadata = $users->GetServiceDataByLocalArea($area,$yourcountry,$orderby);
	  }elseif($area == 'Worldwide') {
	      $areadata = $users->GetServiceWorlwide($orderby);
	      }else {
 	   $areadata = $users->GetServiceDataByArea($filter1,$orderby);
 	  }
 	  
	  
      foreach($areadata as $dataarea){ 
       $userid = $dataarea['user_id'];
       $postid = $dataarea['id'];
       $userinfo = $users->GetUserById($userid);
       $likedislike = $users->GetLikeDislikeByUser($userid, $postid);
       $val = $dataarea['topic'];
    //   $topic = $users->myUrlEncode($val);
    $topic = $users->slugify($val);
    
    
    $price = $dataarea['price'];
$formattedPrice = number_format($price, 0, '.', ',');

// echo 'RM ' . $formattedPrice;

  $reviews_avg = $users->GetReviewAvgByUser($userid);
                                        // Calculate the average rating and total number of reviews
$avg_rating = number_format($reviews_avg['avg_communication_rating'], 1);
$total_reviews = $reviews_avg['total_reviews'];
  if(!empty($total_reviews)) {$rating = $avg_rating.' ('.$total_reviews.')';} else {$rating = 'New Member';}        

// Display the rating
  $avg_rating . " (" . $total_reviews . ")";
if (!empty($dataarea['photos'])) {
     $post_img ='admin/assets/img/services/' . $dataarea['photos'];
 } else {
     $post_img = 'assets/img/dummy-post.jpg';
    // Make sure to verify the resulting $post_img path
}

            $isGoogleImage = strpos($userinfo['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
            if ($isGoogleImage) {
                  $userimg = $userinfo['ProfilePic'];
             } else {
                  $userimg = 'admin/assets/img/profile/'.$userinfo['ProfilePic'];
            }
     
         $postid = $dataarea['id'];
    $type = 'service';
    $checkproposal = $users->CheckProposalSent($postid, $type);
        ?>
        <!--<div class="servicetatus">-->
                            <?php //if($checkproposal['proposal_accept'] == 'Yes'){ echo '<span>Hired</span>'; } else {} ?>
                        <!--</div>-->
       <div class="outer">
                                    <div class="img-p">
                                        <!--image (content inner it)-->
            <a href="professional-service?t=<?=$dataarea['id'];?>&service=<?=$topic;?>">
                                        <div class="hh-1">
                                            <img class="hhh post-msg-img" src="<?=$post_img;?>" alt="">
                                        </div>
                                        </a>
                                    <div class="all-cnt">
                                         <div class="inner">
                                         <a href="user-view.php?viewuserid=<?=$userinfo['id'];?>">
                                        <div class="d-flex two-lb align-items-center heart-img-head">
                                            <div class="img-heart-nm">
                                               <img class="sm-img" src="<?php echo $userimg; ?>" alt="">
                                               <p class="pp mr-in "> <?=$userinfo['ProfileName'];?></p>   
                                            </div>
                                             
                                        </div>
                                        </a>
                                        </div>
                                        
                                        <!--middle text-->
                                              <a href="professional-service?t=<?=$dataarea['id'];?>&service=<?=$topic;?>">
                                             <p class="pp2 title-msg-post" alt="<?=$dataarea['topic'];?>"><?php echo substr($dataarea['topic'], 0, 80);?> </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="star">
                                                <!--<img src="assets/img/star.svg" alt="">-->
                                               <i class="fa-solid fa-star"></i>
                                               <small><?=$rating;?></small>
                                            </div>
                                             <p><small>From </small> <b>RM<?=$formattedPrice;?> <?//=$dataarea['price_type'];?></b> </p>
                                        </div>
                                        </a>
                                    </div>
                                   
                                    
                                </div>
                                
                                </div>
            
            
        <?php 
        }
       
   } elseif($pageid == 'job') {  
            
            if($area == 'Local') {
	        $areadata = $users->GetJobDataByLocalArea($area,$yourcountry,$orderby);
            }elseif($area == 'Worldwide') {
	         $areadata = $users->GetJobWorlwide($orderby);
	         }else {
 	        $areadata = $users->GetJobDataByArea($area,$orderby);
 	  }
      foreach($areadata as $dataarea){ 
      $userid = $dataarea['user_id'];
      $userinfo = $users->GetUserById($userid);
      $val = $dataarea['topic'];
    //   $topic = $users->myUrlEncode($val);
    $topic = $users->slugify($val);
    $price = $dataarea['price'];
$formattedPrice = number_format($price, 0, '.', ',');

 $reviews_avg = $users->GetReviewAvgByUser($userid);
                                        // Calculate the average rating and total number of reviews
$avg_rating = number_format($reviews_avg['avg_communication_rating'], 1);
$total_reviews = $reviews_avg['total_reviews'];
  if(!empty($total_reviews)) {$rating = $avg_rating.' ('.$total_reviews.')';} else {$rating = 'New Member';}        

// Display the rating
  $avg_rating . " (" . $total_reviews . ")";

  $isGoogleImage = strpos($userinfo['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
            if ($isGoogleImage) {
                  $userimg = $userinfo['ProfilePic'];
             } else {
                  $userimg = 'admin/assets/img/profile/'.$userinfo['ProfilePic'];
            }
            
            if (!empty($dataarea['photos'])) {
     $post_img ='admin/assets/img/services/' . $dataarea['photos'];
 } else {
     $post_img = 'assets/img/dummy-post.jpg';
    // Make sure to verify the resulting $post_img path
}
    $postid = $dataarea['id'];
    $type = 'job';
    $checkproposal = $users->CheckProposalSent($postid, $type);
        ?>
        <div class="jobstatus">
                            <?php if($checkproposal['proposal_accept'] == 'Yes'){ echo '<span>Hired</span>'; } else {} ?>
                        </div>
        <div class="outer">
                                            <div class="img-p">
            <a href="job-details?j=<?=$row['id'];?>&job=<?=$topic;?>">
                                    <div class="hh-1"><img class="hhh post-msg-img" src=" <?=$post_img;?>" alt="">
                                             </div>
                                             </a>
                                     <div class="all-cnt">
                                          <div class="inner">
                                         <a href="user-view.php?viewuserid=<?=$userinfo['id'];?>">
                                        <div class="d-flex two-lb align-items-center  job-listing-fl  ">
                                            <div class="title_img">
                                                <img class="sm-img" src="<?php echo $userimg; ?>" alt="">
                                                    <p class="pp mr-in "><?=$userinfo['ProfileName'];?></p> 
                                            </div>
                                         
                                            </div>
                                            </a>
                                        </div>
                                        
                                        <a href="job-details?j=<?=$row['id'];?>&job=<?=$topic;?>">
                                        <p class="pp2 title-msg-post"><?=$dataarea['topic'];?> </p>
                                        <div class="d-flex justify-content-between align-items-center amount_wrap">
                                            <div class="star">
                                               <i class="fa-solid fa-star"></i>
                                                 <small><?=$rating;?></small>
                                            </div>
                                            <div class="post-msg-data">
                                             <img class="cash-img" src="assets/img/cash.svg" >   
                                             <b class="text-dark">RM<?=$formattedPrice;?> <?//=$dataarea['price_type'];?></b>
                                            </div>
                                         </div>
                                            </a>
                                    </div>
                                </div>
								        </div>
            
        <?php }
 	}
   }
	/* Job Filter  */
    elseif (isset($_REQUEST['jobfilter'])) {
    extract($_REQUEST);
	  $area = $jobfilter;
	  if($area == 'Local') {
	    $areadata = $users->GetJobDataByLocalArea($area,$yourcountry);
	  }else {
 	    $areadata = $users->GetJobDataByArea($area);
 	  }
      foreach($areadata as $dataarea){ 
      $userid = $dataarea['user_id'];
      $userinfo = $users->GetUserById($userid);
      $val = $dataarea['topic'];
    //   $topic = $users->myUrlEncode($val);
    $topic = $users->slugify($val);
    
 $price = $dataarea['price'];
$formattedPrice = number_format($price, 0, '.', ',');
 $reviews_avg = $users->GetReviewAvgByUser($userid);
                                        // Calculate the average rating and total number of reviews
$avg_rating = number_format($reviews_avg['avg_communication_rating'], 1);
$total_reviews = $reviews_avg['total_reviews'];
  if(!empty($total_reviews)) {$rating = $avg_rating.' ('.$total_reviews.')';} else {$rating = 'New Member';}        

// Display the rating
  $avg_rating . " (" . $total_reviews . ")";
  
  $isGoogleImage = strpos($userinfo['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
            if ($isGoogleImage) {
                  $userimg = $userinfo['ProfilePic'];
             } else {
                  $userimg = 'admin/assets/img/profile/'.$userinfo['ProfilePic'];
            }
            
            if (!empty($dataarea['photos'])) {
     $post_img ='admin/assets/img/services/' . $dataarea['photos'];
 } else {
     $post_img = 'assets/img/dummy-post.jpg';
    // Make sure to verify the resulting $post_img path
}

        ?>
        <div class="outer">
            <a href="job-details?job=<?=$topic;?>">
                                            <div class="img-p">
                                    <div class="hh-1"><img class="hhh post-msg-img" src="<?=$post_img;?>" alt="">
                                             </div>
                                     <div class="all-cnt">
                                          <div class="inner">
                                         <a href="user-view.php?viewuserid=<?=$userinfo['id'];?>">
                                        <div class="d-flex two-lb align-items-center  job-listing-fl  ">
                                            <div class="title_img">
                                                <img class="sm-img" src="<?php echo $userimg;?>" alt="">
                                                    <p class="pp mr-in "><?=$userinfo['ProfileName'];?></p> 
                                            </div>
                                         
                                            </div>
                                            </a>
                                        </div>
                                        
                                         <a href="job-details?job=<?=$topic;?>">
                                        <p class="pp2 title-msg-post"><?=$dataarea['topic'];?> </p>
                                        <div class="d-flex justify-content-between align-items-center amount_wrap">
                                            <div class="star">
                                               <i class="fa-solid fa-star"></i>
                                                 <small><?=$rating;?></small>
                                            </div>
                                            <div class="post-msg-data">
                                             <img class="cash-img" src="assets/img/cash.svg" >   
                                             <b class="text-dark">RM<?=$formattedPrice;?> <?//=$dataarea['price_type'];?></b>
                                            </div>
                                         </div>
                                         </a>
                                    </div>
                                </div>
								        </div>
            
        <?php }
 
	}
	/* Lastes Service Filter */
	elseif (isset($_REQUEST['filter2'])) {
    extract($_REQUEST); 
	  $filter2val = $filter2;
	  $areadata = $users->GetLatestService();
      foreach($areadata as $dataarea){ 
      $userid = $dataarea['user_id'];
       $postid = $dataarea['id'];
      $userinfo = $users->GetUserById($userid);
       
      $likedislike = $users->GetLikeDislikeByUser($userid, $postid);
      $val = $dataarea['topic'];
    //   $topic = $users->myUrlEncode($val);
    $topic = $users->slugify($val);
     $price = $dataarea['price'];
$formattedPrice = number_format($price, 0, '.', ',');


    $reviews_avg = $users->GetReviewAvgByUser($userid);
                                        // Calculate the average rating and total number of reviews
$avg_rating = number_format($reviews_avg['avg_communication_rating'], 1);
$total_reviews = $reviews_avg['total_reviews'];
  if(!empty($total_reviews)) {$rating = $avg_rating.' ('.$total_reviews.')';} else {$rating = 'New Member';}        

// Display the rating
  $avg_rating . " (" . $total_reviews . ")";
  
  $isGoogleImage = strpos($userinfo['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
            if ($isGoogleImage) {
                  $userimg = $userinfo['ProfilePic'];
             } else {
                  $userimg = 'admin/assets/img/profile/'.$userinfo['ProfilePic'];
            }
            
            if (!empty($dataarea['photos'])) {
     $post_img ='admin/assets/img/services/' . $dataarea['photos'];
 } else {
     $post_img = 'assets/img/dummy-post.jpg';
    // Make sure to verify the resulting $post_img path
}
          $postid = $dataarea['id'];
    $type = 'service';
    $checkproposal = $users->CheckProposalSent($postid, $type);
        ?>
        <!--<div class="servicetatus">-->
                            <?php //if($checkproposal['proposal_accept'] == 'Yes'){ echo '<span>Hired</span>'; } else {} ?>
                        <!--</div>-->
            <div class="outer">
                                    <div class="img-p">
            <a href="professional-service?service=<?=$topic;?>">
                                        <div class="hh-1">
                                            <img class="hhh post-msg-img" src=" <?=$post_img;?>" alt="">
                                        </div>
                                        </a>
                                    <div class="all-cnt">
                                         <div class="inner">
                                         <a href="user-view.php?viewuserid=<?=$userinfo['id'];?>">
                                        <div class="d-flex two-lb align-items-center heart-img-head">
                                            <div class="img-heart-nm">
                                               <img class="sm-img" src="<?php echo $userimg;?>" alt="">
                                               <p class="pp mr-in "> <?=$userinfo['ProfileName'];?></p>   
                                            </div>
                                           
                                        </div>
                                        </a>
                                        </div>
                                        
                                        <a href="professional-service?service=<?=$topic;?>">
                                            <p class="pp2 title-msg-post" alt="<?=$dataarea['topic'];?>"><?php echo substr($dataarea['topic'], 0, 80);?> </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="star">
                                                <!--<img src="assets/img/star.svg" alt="">-->
                                               <i class="fa-solid fa-star"></i>
                                                <small><?=$rating;?></small>
                                            </div>
                                             <p><small>From </small> <b>RM<?=$formattedPrice;?> <?//=$dataarea['price_type'];?></b> </p>
                                        </div>
                                        </a>
                                    </div>
                                   
                                    
                                </div>
                                
                                </div>
            
            
        <?php }
 
	}
    /* Lastes Job Filter */
	elseif (isset($_REQUEST['filter3'])) {
    extract($_REQUEST);
	  $filter2val = $filter3;
	  $areadata = $users->GetLatestJobs();
      foreach($areadata as $dataarea){ 
      $userid = $dataarea['user_id'];
      $userinfo = $users->GetUserById($userid);
      $val = $dataarea['topic'];
      $topic = $users->slugify($val);
    //   $topic = $users->myUrlEncode($val
      $price = $dataarea['price'];
$formattedPrice = number_format($price, 0, '.', ',');

 $reviews_avg = $users->GetReviewAvgByUser($userid);
                                        // Calculate the average rating and total number of reviews
$avg_rating = number_format($reviews_avg['avg_communication_rating'], 1);
$total_reviews = $reviews_avg['total_reviews'];
  if(!empty($total_reviews)) {$rating = $avg_rating.' ('.$total_reviews.')';} else {$rating = 'New Member';}        

// Display the rating
  $avg_rating . " (" . $total_reviews . ")";
  
 
  $isGoogleImage = strpos($userinfo['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
            if ($isGoogleImage) {
                  $userimg = $userinfo['ProfilePic'];
             } else {
                  $userimg = 'admin/assets/img/profile/'.$userinfo['ProfilePic'];
            }
            
            if (!empty($dataarea['photos'])) {
     $post_img ='admin/assets/img/services/' . $dataarea['photos'];
 } else {
     $post_img = 'assets/img/dummy-post.jpg';
    // Make sure to verify the resulting $post_img path
}
   $postid = $dataarea['id'];
    $type = 'service';
    $checkproposal = $users->CheckProposalSent($postid, $type);
        ?>
        <!--<div class="servicetatus">-->
        <!--                    <?php //if($checkproposal['proposal_accept'] == 'Yes'){ echo '<span>Hired</span>'; } else {} ?>-->
        <!--                </div>-->
        <div class="outer">
                                            <div class="img-p">
           <a href="job-details?job=<?=$topic;?>">
                                    <div class="hh-1"><img class="hhh post-msg-img" src=" <?=$post_img;?>" alt="">
                                             </div>
                                             </a>
                                     <div class="all-cnt">
                                          <div class="inner">
                                         <a href="user-view.php?viewuserid=<?=$userinfo['id'];?>">
                                        <div class="d-flex two-lb align-items-center  job-listing-fl  ">
                                            <div class="title_img">
                                                <img class="sm-img" src="<?php echo $userimg; ?>" alt="">
                                                    <p class="pp mr-in "><?=$userinfo['ProfileName'];?></p> 
                                            </div>
                                         
                                        </div>
                                        </a>
                                        </div>
                                        
                                        <a href="job-details?job=<?=$topic;?>">
                                        <p class="pp2 title-msg-post"><?=$dataarea['topic'];?> </p>
                                        <div class="d-flex justify-content-between align-items-center amount_wrap">
                                            <div class="star">
                                               <i class="fa-solid fa-star"></i>
                                                <small><?=$rating;?></small>
                                            </div>
                                            <div class="post-msg-data">
                                             <img class="cash-img" src="assets/img/cash.svg" >   
                                             <b class="text-dark">RM<?=$formattedPrice;?> <?//=$dataarea['price_type'];?></b>
                                            </div>
                                         </div>
                                         </a>
                                    </div>
                                </div>
								        </div>
            
            
        <?php }
 
	}
    /* Auto Search */ 	
	elseif (isset($_REQUEST['autosearch'])) {
            extract($_REQUEST);
    
    $SearchData = array();
    $areadata = $users->SearchData($searchservice);
    $SearchData = $areadata['Topic'];
     
    
    echo json_encode($SearchData);
    
// if($query->num_rows > 0){ 
//     while($row = $query->fetch_assoc()){ 
//         $data['id'] = $row['id']; 
//         $data['value'] = $row['name']; 
//         array_push($skillData, $data); 
//     } 
// } 
 
// Return results as json encoded array 
 


	}
 	/*   Service Search  */
	elseif (isset($_REQUEST['searchservice'])) {
    extract($_REQUEST);
	  $searchservice = $searchservice;
	  $areadata = $users->GetServiceSearch($searchservice);
      foreach($areadata as $dataarea){ 
      $userid = $dataarea['user_id'];
      $postid = $dataarea['id'];
      $userinfo = $users->GetUserById($userid);
      $likedislike = $users->GetLikeDislikeByUser($userid, $postid);
      $val = $dataarea['topic'];
    //   $topic = $users->myUrlEncode($val);
    $topic = $users->slugify($val);
    $price = $dataarea['price'];
$formattedPrice = number_format($price, 0, '.', ',');

 $reviews_avg = $users->GetReviewAvgByUser($userid);
                                        // Calculate the average rating and total number of reviews
$avg_rating = number_format($reviews_avg['avg_communication_rating'], 1);
$total_reviews = $reviews_avg['total_reviews'];
  if(!empty($total_reviews)) {$rating = $avg_rating.' ('.$total_reviews.')';} else {$rating = 'New Member';}        

// Display the rating
  $avg_rating . " (" . $total_reviews . ")";
  
 $isGoogleImage = strpos($userinfo['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
            if ($isGoogleImage) {
                  $userimg = $userinfo['ProfilePic'];
             } else {
                  $userimg = 'admin/assets/img/profile/'.$userinfo['ProfilePic'];
            }
            
            if (!empty($dataarea['photos'])) {
     $post_img ='admin/assets/img/services/' . $dataarea['photos'];
 } else {
     $post_img = 'assets/img/dummy-post.jpg';
    // Make sure to verify the resulting $post_img path
}
  
        ?>
        <div class="outer">
                                    <div class="img-p">
            <a href="professional-service?service=<?=$topic;?>">
                                        <div class="hh-1">
                                            <img class="hhh post-msg-img" src="<?=$post_img;?>" alt="">
                                        </div>
                                        </a>
                                    <div class="all-cnt">
                                        <div class="inner">
                                         <a href="user-view.php?viewuserid=<?=$userinfo['id'];?>">
                                        <div class="d-flex two-lb align-items-center heart-img-head">
                                            <div class="img-heart-nm">
                                               <img class="sm-img" src="<?php echo $userimg; ?>" alt="">
                                               <p class="pp mr-in "> <?=$userinfo['ProfileName'];?></p>   
                                            </div>
                                            
                                        </div>
                                         </a>
                                        </div>
                                        
                                        <a href="professional-service?service=<?=$topic;?>">
                                              <p class="pp2 title-msg-post" alt="<?=$dataarea['topic'];?>"><?php echo substr($dataarea['topic'], 0, 80);?> </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="star">
                                                <!--<img src="assets/img/star.svg" alt="">-->
                                               <i class="fa-solid fa-star"></i>
                                                <small><?=$rating;?></small>
                                            </div>
                                             <p><small>From </small> <b>RM<?=$formattedPrice;?> <?//=$dataarea['price_type'];?></b> </p>
                                        </div>
                                        </a>
                                    </div>
                                  </div>
                                  </div>
            
            
        <?php }
 
	}
  	/*   Job Search  */
	elseif (isset($_REQUEST['searchjob'])) {
    extract($_REQUEST);
	  $searchjob = $searchjob;
	  $areadata = $users->GetJobSearch($searchjob);
      foreach($areadata as $dataarea){ 
      $userid = $dataarea['user_id'];
      $userinfo = $users->GetUserById($userid);
      $val = $dataarea['topic'];
    //   $topic = $users->myUrlEncode($val);
    $topic = $users->slugify($val);
       $price = $dataarea['price'];
$formattedPrice = number_format($price, 0, '.', ',');
  
 $isGoogleImage = strpos($userinfo['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
            if ($isGoogleImage) {
                  $userimg = $userinfo['ProfilePic'];
             } else {
                  $userimg = 'admin/assets/img/profile/'.$userinfo['ProfilePic'];
            }
            
            if (!empty($dataarea['photos'])) {
     $post_img ='admin/assets/img/services/' . $dataarea['photos'];
 } else {
     $post_img = 'assets/img/dummy-post.jpg';
    // Make sure to verify the resulting $post_img path
}
        ?>
         <div class="outer">
                                            <div class="img-p">
            <a href="job-details?job=<?=$topic;?>">
                                    <div class="hh-1"><img class="hhh post-msg-img" src="<?=$post_img;?>" alt="">
                                             </div>
                                             </a>
                                     <div class="all-cnt">
                                         <div class="inner">
                                         <a href="user-view.php?viewuserid=<?=$userinfo['id'];?>">
                                        <div class="d-flex two-lb align-items-center  job-listing-fl  ">
                                            <div class="title_img">
                                                <img class="sm-img" src="<?php echo $userimg; ?>" alt="">
                                                    <p class="pp mr-in "><?=$userinfo['ProfileName'];?></p> 
                                            </div>
                                         <div>
                                         
                                            </div>
                                        </div>
                                        </a>
                                        </div>
                                        
                                        <a href="job-details?job=<?=$topic;?>">
                                        <p class="pp2 title-msg-post"><?=$dataarea['topic'];?> </p>
                                        <div class="d-flex justify-content-between align-items-center amount_wrap">
                                            <div class="star">
                                               <i class="fa-solid fa-star"></i>
                                                <small>New Member</small>
                                            </div>
                                            <div class="post-msg-data">
                                             <img class="cash-img" src="assets/img/cash.svg" >   
                                             <b class="text-dark">RM<?=$formattedPrice;?> <?//=$dataarea['price_type'];?></b>
                                            </div>
                                         </div>
                                         </a>
                                    </div>
                                </div>
				 </div>
            
        <?php }
 
	}
   	/*   Job Search  */
	elseif (isset($_REQUEST['searchskill'])) {
    extract($_REQUEST);
	  $searchskill = $searchskill;
	  $areadata = $users->GetSkillsSearch($searchskill);
	  
	  ?>
	  
	   <!-------------------------------------search bar new------------------------------------------->
                            <div class="result_check_search search_bar_new">
                                <div class="">
                                    <h2>Search results:</h2>
                                </div>
                                <div class="result_check_search">
                                    <p><?=$searchskill;?><svg class="cross_svg" style="width:18px;height:18px" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z" />
                                  </svg></p>
                                     
                                </div>
                                <a href="#" class="add_in_search">Add</a>
                            </div>
	  <?php
      foreach($areadata as $dataarea){
        //   print_r($dataarea);
      $userid = $dataarea['user_id'];
    //   $userinfo = $users->GetUserById($userid);
              $isGoogleImage = strpos($dataarea['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
            if ($isGoogleImage) {
                  $userimg = $dataarea['ProfilePic'];
             } else {
                  $userimg = 'admin/assets/img/profile/'.$dataarea['ProfilePic'];
            }
            
        ?>
        
            <a href="user-view.php?viewuserid=<?=$dataarea['id'];?>">
                
                   
                            
                            <div class="dream new_one_dream">
                        <!--<img  class="main-img" src="" alt="">-->
                              <img class="main-img profile-in_mid" src="admin/assets/img/profile/<?php echo $dataarea['ProfilePic'];?>" alt="">
                       <div class="dream-star">
                    <h6> <?=$dataarea['ProfileName'];?></h6>
                    <h6></h6>
 						<p> <img class="small-img-star " src="assets/img/star-svg.png" alt=""> New Member</p> 
                        <!--<p>From: IN</p>-->
                        <!--<p>Member Since: Oct 2022</p>-->
                        <p>Level 3 Member </p>
                        <!--<p>Total Earning: </p> -->
                </div>
                <div class="dream-star_skills">
                    <h5>Skills</h5>
                    <div class="list_of_search">
                   <?php if(!empty($dataarea['Skills'])) { ?>
                                    <p class="skills"> <?php echo str_replace(",","<p class='skills'>",$dataarea['Skills']); ?> </p>
                                    <?php } else {echo 'Nothing added yet';}?>
                    </div>
                </div>
        </div>
                
                
                
                
                
                
                                <!--            <div class="img-p"> -->
                                <!--    <div class="hh-1"><img class="hhh" src="admin/assets/img/profile/<?php// echo $dataarea['ProfilePic'];?>" alt="">-->
                                <!--             </div>-->
                                <!--     <div class="all-cnt">-->
                                <!--        <div class="d-flex two-lb align-items-center  job-listing-fl  ">-->
                                <!--            <div class="title_img">-->
                                <!--                     <p class="pp mr-in "><?//=$dataarea['ProfileName'];?></p> -->
                                <!--            </div>-->
                                <!--         <div>-->
                                            <!--<div class="clock-time">-->
                                            <!--    <i class="fa-regular fa-clock"></i>-->
                                            <!--    <p>72h 42s left</p>-->
                                            <!--</div>-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--         <div class="d-flex justify-content-between align-items-center">-->
                                           
                                <!--         </div>-->
                                <!--    </div>-->
                                <!--</div>-->
				</a>
            
        <?php }
 
	}
 	/* Un  Service Ads active  */
    elseif (isset($_REQUEST['adsApproved'])) { 
    extract($_REQUEST);
	 $id = $adsApproved;
	  $data = $users->AdsApprove($id);

    if ($data):
        header('location:../professional-service.php?msg=reject');
    else:
        header('location:../professional-service.php?msg=fail');
    endif;
}
 	/* Service Ads Active  */
    elseif (isset($_REQUEST['adsRejected'])) {
    extract($_REQUEST);
	 $id = $adsRejected;
	  $data = $users->AdsReject($id);

    if ($data):
        header('location:../professional-service.php?msg=approve');
    else:
        header('location:../professional-service.php?msg=fail');
    endif;
}
    /*   Job Ads UnActive  */
    elseif (isset($_REQUEST['JobadsApproved'])) { 
    extract($_REQUEST);
	 $id = $JobadsApproved;
	  $data = $users->JobAdsApprove($id);

    if ($data):
        header('location:../job-posting.php?msg=reject');
    else:
        header('location:../job-posting.php?msg=fail');
    endif;
}
 	/* JObs Ads Active  */
    elseif (isset($_REQUEST['JobadsRejected'])) {
    extract($_REQUEST);
	 $id = $JobadsRejected;
	  $data = $users->JobadsRejected($id);

    if ($data):
        header('location:../job-posting.php?msg=approve');
    else:
        header('location:../job-posting.php?msg=fail');
    endif;
}
    /* Like POst  */
    elseif (isset($_REQUEST['like'])) {
        extract($_REQUEST);
    	  $status = $like;
    	  $userid;
    	  $postid;
    	   //$data = $users->LikePost($status, $userid, $postid);
    	  $likedata = $users->GetLikeDislikeByUser($userid, $postid);
     	  print_r($likedata);
    	  if(!empty($likedata['postid']) == $postid && $status == 2) {
    	       $data = $users->DislikePost($status, $userid, $postid);
     	        // echo '<img class="heart-img" src="assets/img/white-heart-1" alt="" id="like" style="cursor:pointer;" data-id="1" post-id="'.$postid.'">';
    
          } elseif($status == 1) {
         $data = $users->LikePost($status, $userid, $postid);
            // '<img class="heart-img" src="assets/img/hearts.png" alt="" id="like" style="cursor:pointer;" data-id="2" post-id="'.$postid.'">';
          } else {}
         
    }
     /* DisLike POst  */
    elseif (isset($_REQUEST['dislike'])) {
        extract($_REQUEST);
    	  $status = $dislike;
    	  $userid; 
    	  $postid;
    // 	  $likedata = $users->GetLikeDislikeByUser($userid, $postid);
          $data = $users->DislikePost($status, $userid, $postid);
         
    }
    /* Like POst  */
    elseif (isset($_REQUEST['updatelike'])) {
    extract($_REQUEST);
	  $status = $updatelike;
	  $userid;
	  $postid;
	  $data = $users->UpdatelikePost($status, $userid, $postid);
     
}
    /* JObs Ads Active  */
    elseif (isset($_REQUEST['lat'])) {
    extract($_REQUEST);
	  $lat;
	  $userid;
	  $long;
	  
	  $latlng = $lat.','.$long;
        $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?latlng=".$latlng."&sensor=true";
        $xml = simplexml_load_file($request_url);

        if($xml->status == "OK") {
        $address = $xml->result->formatted_address;
          foreach ($xml->result->address_component as $address) {
            
              echo $country = $address->short_name;
             
          }
        }
        
        
	  $location = $users->GetLikeDislikeByUser($userid, $lat, $lat);
  	   
     
}
    /* Search */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'Search') {
     extract($_REQUEST);
    $data = $users->Search($keyword, $location, $area, $level, $jobcompletion, $rating, $minprice, $maxprice);
   
   if ($data):
        header('location:../../search-result.php?topic='.$keyword.'&location='.$location.'&area='.$area.'&level='.$level.'&jobcompletion='.$jobcompletion.'&rating='.$rating.'&minprice='.$minprice.'&maxprice='.$maxprice);
    else:
        header('location:../../search-result.php?msg=fail');
    endif;
}
    /* Advance Skill */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'AdvanceSkillSearch') {
     extract($_REQUEST); 
        
//         $string="1,2,3,4,5";
// $array=array_map('intval', explode(',', $string));
// $array = implode("','",$array);


        $searcharray = array($searchskils,$addskills, $addskills2, $addskills3, $addskills4);
        $array=array_map('intval', explode(',', $searcharray));
        $arrays = implode("','",$searcharray);
       
    $Skillsresult = $users->AdvanceSkillSearch($arrays);
            if ($Skillsresult):
                
          foreach($Skillsresult as $skills){ 
              $user_id = $skills['Post_id'];
              $skills = $users->GetSkillsByUserId($user_id);
              $userdata = $users->GetUsersById($user_id);
               $isGoogleImage = strpos($userdata['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
            if ($isGoogleImage) {
                  $userimg = $userdata['ProfilePic'];
             } else {
                  $userimg = 'admin/assets/img/profile/'.$userdata['ProfilePic'];
            }
          ?>
    <div class="bg-white container_search">
        <div class="d-flex search_detail_container">
            <div class="dream">
                <img class="img_search_container" src="<?php echo $userimg;?>" alt="">
                <div class="dream-star">
                    <h6> <?=$userdata['ProfileName'];?></h6>
                    <p>
                        <svg class="star_wrap_svg" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>star</title>
                            <path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                        </svg>
                        4.9
                    </p>
                    <p><img class="batch_small_green" src="../assets/img/rewardsmallimg.png" alt="">Level 1 Member </p>
                </div>
            </div>
            <div class="users_all_info">
                <div class="users_info_container">
                    <div class="">
                        <table class="table_container">
                            <tbody>
                                <tr class="table-row_top">
                                    <th><?=$userdata['Country'];?></th>
                                    <th>2k+</th>
                                </tr>
                                <tr class="table-row_users">
                                    <td>Country</td>
                                    <td>Earning USD</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="profile-mid_right_btns">
                <div>
                    <a href="invite-for-interview"><button class="invt-job-intrvw" value="<?=$user_id;?>" data-toggle="modal" type="button" data-target="#exampleModalCenter">Invite for job interview</button></a>
                </div>
                <div>
                    <a href="invite-for-job-post"><button class="invite-jop-post" value="<?=$user_id;?>" data-toggle="modal" data-target="#exampleModal">Invite to your job post</button></a>
                </div>
            </div>
        </div>
        <div class="topic_search_result">
            <p><?=$userdata['ProfileBio'];?></p>
        </div>
        <div class="row skill_hobbies_">
            <?php  foreach($skills as $skils){
                //print_r($skils['Skills']);?>
            <p class="skills"> <?php echo str_replace(",","<p class='skills'>",$skils['Skills']); ?> </p>
            <?php } ?>
        </div>
    </div>
    <?php  
          }  
             else:
           echo 'No Result Found!';
        endif;
}
    /* Advance Intrest Search */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'AdvanceIntrestSearch') {
     extract($_REQUEST); 
        
//         $string="1,2,3,4,5";
// $array=array_map('intval', explode(',', $string));
// $array = implode("','",$array);


        $searcharray = array($searchskils,$addskills, $addskills2, $addskills3, $addskills4);
        $array=array_map('intval', explode(',', $searcharray));
        $arrays = implode("','",$searcharray);
       
    $Skillsresult = $users->AdvanceIntrestSearch($arrays);
            if ($Skillsresult):
                
          foreach($Skillsresult as $intrest){ 
              $user_id = $intrest['user_id'];
              $intrest = $users->GetIntrestByUserId($user_id);
              $userdata = $users->GetUsersById($user_id);
              $isGoogleImage = strpos($userdata['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
            if ($isGoogleImage) {
                  $userimg = $userdata['ProfilePic'];
             } else {
                  $userimg = 'admin/assets/img/profile/'.$userdata['ProfilePic'];
            }
         ?>
    <div class="bg-white container_search">
        <div class="d-flex search_detail_container">
            <div class="dream">
                <img class="img_search_container" src="<?php echo $userimg;?>" alt="">
                <div class="dream-star">
                    <h6> <?=$userdata['ProfileName'];?></h6>
                    <p>
                        <svg class="star_wrap_svg" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>star</title>
                            <path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                        </svg>
                        4.9
                    </p>
                    <p><img class="batch_small_green" src="../assets/img/rewardsmallimg.png" alt="">Level 1 Member </p>
                </div>
            </div>
            <div class="users_all_info">
                <div class="users_info_container">
                    <div class="">
                        <table class="table_container">
                            <tbody>
                                <tr class="table-row_top">
                                    <th><?=$userdata['Country'];?></th>
                                    <th>2k+</th>
                                </tr>
                                <tr class="table-row_users">
                                    <td>Country</td>
                                    <td>Earning USD</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="profile-mid_right_btns">
                <div>
                    <a href="invite-for-interview"><button class="invt-job-intrvw">Invite for job interview</button></a>
                </div>
                <div>
                    <a href="invite-for-job-post"><button class="invite-jop-post">Invite to your job post</button></a>
                </div>
            </div>
        </div>
        <div class="topic_search_result">
            <p><?=$userdata['ProfileBio'];?></p>
        </div>
        <div class="row skill_hobbies_">
            <?php  foreach($intrest as $intrests){
                //print_r($intrests);?>
            <p class="skills"> <?php echo str_replace(",","<p class='skills'>",$intrests['Interest']); ?> </p>
            <?php } ?>
        </div>
    </div>
    <?php  
          }  
             else:
           echo 'No Result Found!';
        endif;
}
    /* Top Wallet */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'TopUpWallet') {
    extract($_REQUEST);
    function generateRandomString($length = 6) {
    $characters = '0123456789';
    $charactersLength = strlen($characters); 
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    }
    $orderid = 'ID'.generateRandomString();
    $userid = mysqli_real_escape_string($con, $_POST['userid']);
    $bill_name = mysqli_real_escape_string($con, $_POST['name']);
    $amount =  mysqli_real_escape_string($con, $_POST['amount']);
    $currency = mysqli_real_escape_string($con, $_POST['currency']);
    $reference = mysqli_real_escape_string($con, $_POST['reference']);
    $bill_email =  mysqli_real_escape_string($con, $_POST['email']);
    $bill_mobile =  mysqli_real_escape_string($con, $_POST['phone']);
    $bill_desc =   mysqli_real_escape_string($con, $_POST['desc']);
    // Create the payment request
        // $users->TopUpWallet($userid,$amount,$bill_email,$orderid);
    $payment = new Payment('SB_honestunicorn', '8c4dbcb34f8a43fea669ae0cd8eed6df', 'SB_honestunicorn', 'sandbox');
    $paymentUrl = $payment->getPaymentUrl($orderid,$userid, $amount, $bill_name, $bill_email, $bill_mobile,$bill_desc);
    
    try {
         // Redirect the user to the payment page
        header('Location: ' . $paymentUrl);
        $users->TopUpWallet($userid,$amount,$bill_email,$orderid);
        
    } catch (Exception $e) {
        // Handle any errors that occurred during payment request generation
        echo 'Error: ' . $e->getMessage();
    }
    
     
        
    }
    /* Withdrawal */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'Withdrawal') {
    extract($_REQUEST);
      
    $data = $users->Withdrawal($userid,$withdawal_amount,$payment_for,$postid);
            $users->SponsorJob($userid,$withdawal_amount,$payment_for,$postid);

    if($payment_for == 'job') {
        $users->UpdateSponsorJob($userid,$postid);
        $type = 'sponsor';
    } elseif($payment_for == 'service') {
        $users->UpdateSponsorService($userid,$postid);
         $type = 'sponsor';
    }else{ $type = '';}
  
 	if($data): 
         header('location:../../withdrawal-success?amount='.$withdawal_amount.'&typeof='.$type);
     else:
        header('location:../../transaction');
    endif;
    
} 
    /* Fund Payment */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'FundPayment') {
    extract($_REQUEST);
    
    // $users->UpdateReserveAmount($postid,$payment_for,$withdawal_amount);
    
    if(!empty($coupon)) {
        
        $cp_checked = $coupon;
         $users->UpdateCouponAmount($userid,$cp_checked);
     $users->InsertCouponAmount($userid,$cp_checked);
        
        
    }else {$cp_checked = '0';}
      $amount = $withdawal_amount - $cp_checked;
      
    $data = $users->FundPayment($userid,$amount,$payment_for,$postid,$reciever,$planid,$cp_checked);
    
  
          // $obj->ReserveAmount($user_id,$totalprice,$post_id,$type);
        $sendby = $userid;
        $sendto = $reciever;
        $posttype = $payment_for;
        $comment = 'Payment Funded';
        $message_type = '';

        $data = $users->SendPaymentReleaseMessage($sendby,$sendto,$comment,$posttype,$postid,$planid,$message_type);

  	if($data): 
         header('location:../../payment-suc?id='.$postid.'&price='.$amount.'&type='.$payment_for.'&dis_id='.$reciever.'&lgn='.$userid.'&coupon='.$cp_checked);
         $status = 2;
         $users->UpdatePaymentStatus($planid,$status);
$viewuserid = $sendby;
                $userinfo = $users->GetUSerByUserId($viewuserid);
                $currentDate = date("d F Y");
// echo "Date: " . $currentDate;
$subject = "Milestone Funded";
$to = $userinfo['Email'];
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From:support@instantjob.org'. "\r\n";

  $message .= ' 
 
     <!--first tab row start-->
<div class="col-sm-12 instant-main" style="background: #fff">
<div class="row">
<div class="col-lg-12 col-md-12 second-mid example">
<div class="container select_srvc_choice">
<div class="card">
<div class="main prof-inf-new active" style="">
<a href="service-provider"> 
<img class="logo_instant_jobs" src="'.BASE_URL.'/assets/img/new-instant-logo.png" alt="">
</a>
<p class="text-center email-details">As per our instruction You have successfully funded RM'.$withdawal_amount.' </p>
<p class="text-center email-details">Project: '.$topic.'<br>Milestone: '.$milestone.'<br>Date: '.$currentDate.'</p>
<a href="#" class="view-receipt">
    VIEW RECEIPT
</a>
<p class="text-center email-details">If you have any questions, please do not reply here. Kindly email support@instantjob.org</p>
<div class="card_for_services services_parent_container d-flex">
</div>';
 
$mailto = mail($to,$subject,$message,$headers);
         
     else:
        header('location:../../payment-release');
    endif;
    
}
    /* Make Payment */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'MakePayment') {
    extract($_REQUEST);
    $users->UpdateReserveAmount($postid,$payment_for,$withdawal_amount,$planid);
    $data = $users->MakePayment($userid,$withdawal_amount,$payment_for,$postid,$reciever);
        $sendby = $userid;
        $sendto = $reciever;
        $posttype = $payment_for;
        $comment = 'Payment Released';
        $message_type = $finalpayment;
        
        $data = $users->SendPaymentReleaseMessage($sendby,$sendto,$comment,$posttype,$postid,$planid,$message_type);
  	if($data): 
         header('location:../../payment-suc?id='.$postid.'&price='.$withdawal_amount.'&type='.$payment_for.'&dis_id='.$reciever.'&lgn='.$userid.'&plan_id='.$planid);
            $status = 1;
         $users->UpdatePaymentStatus($planid,$status); 
         
         $viewuserid = $sendby;
         $userinfo = $users->GetUSerByUserId($viewuserid);
         $currentDate = date("d F Y");
         // echo "Date: " . $currentDate;
         $subject = $milestone." Milestone Released";
         $to = $userinfo['Email'];
         $headers = "MIME-Version: 1.0" . "\r\n";
         $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From:support@instantjob.org'. "\r\n";

  $message .= ' 
  <div class="col-sm-12 instant-main" style="background: #fff">
<div class="row">
<div class="col-lg-12 col-md-12 second-mid example">
<div class="container select_srvc_choice">
<div class="card">
<div class="main prof-inf-new active" style="">
<a href="service-provider"> 
<img class="logo_instant_jobs" src="'.BASE_URL.'/assets/img/new-instant-logo.png" alt="">
</a>
<p class="text-center email-details">As per our instruction You have successfully released RM'.$withdawal_amount.' to '.$paymentto.' </p>
<p class="text-center email-details">Project: '.$topic.'<br>Milestone: '.$milestone.' <br>Date: '.$currentDate.'</p>
<p>
 <a href="#" class="view-receipt">
    VIEW RECEIPT
</a>
</p>
<p class="text-center email-details">If you have any questions, please do not reply here. Kindly email support@instantjob.org</p>
<div class="card_for_services services_parent_container d-flex">
 
   
</div>';
 
$mailto = mail($to,$subject,$message,$headers);


         else:
            header('location:../../payment-release');
         endif;
    
} 
    /* Send Interview Notification */
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'InviteForInterview') {
    extract($_REQUEST);
      
      $sendby = mysqli_real_escape_string($con, $_POST["sender"]);
      $sendto = mysqli_real_escape_string($con, $_POST["reciever"]);
      $comment = mysqli_real_escape_string($con, $_POST["message"]);
      $job_id = mysqli_real_escape_string($con, $_POST["job_selected"]);
      
      if(!empty($job_id)) {
          $comment = 'Hi,I want to invite you for this job';
          $data = $users->InviteForJob($sendby,$sendto,$comment,$job_id);
          
      }else{
    //   $service = mysqli_real_escape_string($con, $_POST["service"]);
    //   $job = mysqli_real_escape_string($con, $_POST["job"]);
     
    //   $data = $users->InviteForInterview($sendby,$sendto,$comment,$service,$job);
      $data = $users->InviteForInterview($sendby,$sendto,$comment);
    
      }
//  	if($data): 
//          header('location:../../transaction');
//      else:
//         header('location:../../transaction');
//     endif;
    
}
    /* Send Message to user */
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'SendMessage') {
    extract($_REQUEST);
   
      $sendby =  mysqli_real_escape_string($con, $_POST["sender"]);
      $sendto =  mysqli_real_escape_string($con, $_POST["reciever"]);
      $comment = mysqli_real_escape_string($con, $_POST["message"]);
      $posttype= mysqli_real_escape_string($con, $_POST["posttype"]);
      $postid =  mysqli_real_escape_string($con, $_POST["post_id"]);
      $message_type =  mysqli_real_escape_string($con, $_POST["message_type"]);
    
    // Handle the file upload
    $attachment = '';
if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == UPLOAD_ERR_OK) {
    $upload_dir = '../assets/img/attachments/'; // Specify the path to your upload directory
    $attachment_name = $_FILES['attachment']['name'];
    $attachment_tmp_name = $_FILES['attachment']['tmp_name'];
    $attachment_type = $_FILES['attachment']['type'];
    
    if (strpos($attachment_type, 'image/') === 0) {
        // It's an image file
    } elseif ($attachment_type == 'application/pdf') {
        // It's a PDF file
    } elseif (strpos($attachment_type, 'video/') === 0) {
        // It's a video file
    } elseif (strpos($attachment_type, 'application/msword') === 0 || $attachment_type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
        // It's a Word document (doc or docx)
    } elseif (strpos($attachment_type, 'text/') === 0) {
        // It's a text file
    } elseif ($attachment_type == 'application/zip') {
        // It's a ZIP archive
    } elseif ($attachment_type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
    // It's a Word document in OpenXML format (docx)
  
    } else {
        // It's another type of file
    }

    // Generate a unique filename to prevent overwriting
    $attachment_dest = uniqid() . '_' . $attachment_name;

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($attachment_tmp_name, $upload_dir.$attachment_dest)) {
        $attachment = $attachment_dest;
    }
} 

    $message_type = $attachment_type;
      $data = $users->SendMessage($sendby,$sendto,$comment,$posttype,$postid,$message_type, $attachment);
    
}
    /* Send Message From Admin */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'SendMessageFromAdmin') {
    extract($_REQUEST);
   
      $sendby =  mysqli_real_escape_string($con, $_POST["sender"]);
      $sendto =  mysqli_real_escape_string($con, $_POST["reciever"]);
      $comment = mysqli_real_escape_string($con, $_POST["message"]);
      $posttype= mysqli_real_escape_string($con, $_POST["posttype"]);
      $postid =  mysqli_real_escape_string($con, $_POST["post_id"]);
      $message_type =  mysqli_real_escape_string($con, $_POST["message_type"]);
 
      $data = $users->SendMessageFromAdmin($sendby,$sendto,$comment,$posttype,$postid,$message_type);
    
}
    /* Update status  */
 	elseif (isset($_REQUEST['view']) && $_REQUEST['view']) {
    extract($_REQUEST);
      $userid =  $_SESSION['Userid'];
   
    if($view != '')
{
     $data = $users->UpdateStatus($userid);
    //  $getstatus = $users->GetStatus($userid);
}

}
    /* Admin Fetch Notification */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'AdminFetchNotification') {
     extract($_REQUEST);

     $userid =  $_SESSION['AdminID'];
     $datax = $users->GetMessageByOrder($userid);
     
     $popped = $users->GetMessagePopped($userid);
     
     $dataxx = $users->GetInvitationMessageByOrder($userid);
     $poppedd = $users->GetInvitationMessagePopped($userid);
     
     
     $output = '';
 if(mysqli_num_rows($datax) > 0) {
            while($row = mysqli_fetch_array($datax))
            {
                $viewuserid = $row["from_user"];
                $userinfo = $users->GetUSerByUserId($viewuserid);
                 $to_user = $userid;
                 
                 $dateString = $row['date_created'];
                     $timestamp = strtotime($dateString);
                    $formattedDate = date('d F Y', $timestamp);
                    $post_type = $row["post_type"];
                    //  $replacedString = preg_replace('/-[\d]+/', '', $postid);
 
        $postid = $row['post_id'];
        // $serviceid =  str_replace("service-", "", $row['serviceid']);
        //     if(!empty($jobid)) { 
        //         $postid = $jobid;
        //      } elseif(!empty($serviceid)) { 
        //          $postid = $serviceid;
        //      }
        $p_picc = $userinfo['ProfilePic'];
        $isGoogleImage = strpos($p_picc, 'https://lh3.googleusercontent.com/') === 0;
        if($isGoogleImage) {
            $img = $p_picc;
        } elseif($post_type == 'adminchat') {
            $adminid = $viewuserid;
            $admininfo = $users->GetAdminDetails($adminid);
            $img = 'admin/assets/img/profile/avataaars.png';
            $uname = $admininfo['Name'];
        } else {
            $img = 'admin/assets/img/profile/'.$p_picc;
            $uname = $userinfo["ProfileName"];
       
        }
        
        if($row['popped'] = '1') {$NH = 'block';} else { $NH = 'none';}
 
         //  if(!empty($_SESSION['user_image'])) { $img =$_SESSION['user_image'];} elseif(empty($_SESSION['user_image'])) { $img ='admin/assets/img/profile/'.$userinfo['ProfilePic']; }

             //   $output .= '<li><a href="discussion.php?stid='.$row["id"].'&lgn='.$to_user.'&dis_id='.$row["from_user"].'"><strong>'.$userinfo["ProfileName"].'</strong>'.$row["date_dreated"].'<br />'.$row["message"].'</a></li>';
                
               $output .= '<a href="discussion.php?stid='.$postid.'&lgn='.$to_user.'&dis_id='.$row["from_user"].'&type='.$row["post_type"].'&msgid='.$row["id"].'"><div class="d-flex my-2">
                <div class="hh-1 img_notif_wrap">
                    <img class="notification_img rounded-circle" src="'.$img.'" alt="persons notification img">
                </div>
                <div class="col-md-8 col-8  p-0">
                   <p class="senders_name">'.$uname.' send you a message:</p>
                   <p class="senders_msg">"'.$row["message"].'"</p>
                   <p class="notification_time font-weight-bold">'.$formattedDate.'</p>
                </div>
                <div class=" col-md-2 p-0 d-flex align-items-center notification_indicator">
                <div data-cy="dot" class="nav-dot" style="display:'.$NH.'"></div>  
                </div>
                    </div>
                    </a>';

            }
 } 
 elseif(mysqli_num_rows($dataxx) > 0){
     
      while($row = mysqli_fetch_array($dataxx))
            {
                $viewuserid = $row["from_user"];
                $userinfo = $users->GetUSerByUserId($viewuserid);
                 $to_user = $userid;
                 
                 $dateString = $row['date_created'];
                     $timestamp = strtotime($dateString);
                    $formattedDate = date('d F Y', $timestamp);
                    
                     $replacedString = preg_replace('/-[\d]+/', '', $postid);
 
        $jobid = str_replace("job-", "", $row['jobid']);
        $serviceid =  str_replace("service-", "", $row['serviceid']);
            if(!empty($jobid)) { 
                $postid = $jobid;
             }elseif(!empty($serviceid)) { 
                 $postid = $serviceid;
               
             }
         $p_picc = $userinfo['ProfilePic'];
        $isGoogleImage = strpos($p_picc, 'https://lh3.googleusercontent.com/') === 0;
        if($isGoogleImage) {
            $img = $p_picc;
        } else {
            $img = 'admin/assets/img/profile/'.$p_picc;
        }
 
             if($row['popped'] = '1') {$NH = 'block';} else { $NH = 'none';}       
                    
               
            //   $output .= '<li><a href="discussion.php?stid='.$row["id"].'&lgn='.$to_user.'&dis_id='.$row["from_user"].'"><strong>'.$userinfo["ProfileName"].'</strong>'.$row["date_dreated"].'<br />'.$row["message"].'</a></li>';
               
               
               $output .= '<a href="discussion.php?stid='.$postid.'&lgn='.$to_user.'&dis_id='.$row["from_user"].'&type='.$row["post_type"].'&msgid='.$row["id"].'"><div class="d-flex my-2">
                <div class="hh-1 img_notif_wrap">
                    <img class="notification_img rounded-circle" src="'.$img.'" alt="persons notification img">
                </div>
                <div class="col-md-8 col-8  p-0">
                   <p class="senders_name">'.$userinfo["ProfileName"].' send you a message:</p>
                   <p class="senders_msg">"'.$row["message"].'"</p>
                   <p class="notification_time font-weight-bold">'.$formattedDate.'</p>
                </div>
                <div class=" col-md-2 p-0 d-flex align-items-center notification_indicator">
                <div data-cy="dot" class="nav-dot" style="display:'.$NH.'"></div>  
                </div>
                    </div>
                    </a>';
                    
                    
            }
            
 }
 else {
    $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
   }

         $count = mysqli_num_rows($popped);    
            $data = array(
               'notification' => $output,
               'unseen_notification'  => $count
            );
            
              echo json_encode($data);

    
}
    /* Fetch Notification */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'FetchNotification') {
     extract($_REQUEST);

     $userid =  $_SESSION['Userid'];
     $datax = $users->GetMessageByOrder($userid);
     
     $popped = $users->GetMessagePopped($userid);
     
     $dataxx = $users->GetInvitationMessageByOrder($userid);
     $poppedd = $users->GetInvitationMessagePopped($userid);
     
     
     $output = '';
 if(mysqli_num_rows($datax) > 0 && $userid) {
            while($row = mysqli_fetch_array($datax))
            {
                 $viewuserid = $row["from_user"];
                $userinfo = $users->GetUSerByUserId($viewuserid);
                 $to_user = $userid;
                 
                 $dateString = $row['date_created'];
                     $timestamp = strtotime($dateString);
                    $formattedDate = date('d F Y', $timestamp);
                    $post_type = $row["post_type"];
                    //  $replacedString = preg_replace('/-[\d]+/', '', $postid);
 
        $postid = $row['post_id'];
        // $serviceid =  str_replace("service-", "", $row['serviceid']);
        //     if(!empty($jobid)) { 
        //         $postid = $jobid;
        //      } elseif(!empty($serviceid)) { 
        //          $postid = $serviceid;
        //      }
        $p_picc = $userinfo['ProfilePic'];
        $isGoogleImage = strpos($p_picc, 'https://lh3.googleusercontent.com/') === 0;
        if($isGoogleImage) {
            $img = $p_picc;
              $uname = $userinfo["ProfileName"];
        } elseif($post_type == 'adminchat') {
            $adminid = $viewuserid;
            $admininfo = $users->GetAdminDetails($adminid);
            $img = 'admin/assets/img/profile/avataaars.png';
            $uname = $admininfo['Name'];
        } else {
            $img = 'admin/assets/img/profile/'.$p_picc;
            $uname = $userinfo["ProfileName"];
       
        }
        
        if($row['popped'] = '1') {$NH = 'block';} else { $NH = 'none';}
 
         //  if(!empty($_SESSION['user_image'])) { $img =$_SESSION['user_image'];} elseif(empty($_SESSION['user_image'])) { $img ='admin/assets/img/profile/'.$userinfo['ProfilePic']; }

             //   $output .= '<li><a href="discussion.php?stid='.$row["id"].'&lgn='.$to_user.'&dis_id='.$row["from_user"].'"><strong>'.$userinfo["ProfileName"].'</strong>'.$row["date_dreated"].'<br />'.$row["message"].'</a></li>';
                
               $output .= '<a href="discussion.php?stid='.$postid.'&lgn='.$to_user.'&dis_id='.$row["from_user"].'&type='.$row["post_type"].'&msgid='.$row["id"].'"><div class="d-flex my-2">
                <div class="hh-1 img_notif_wrap">
                    <img class="notification_img rounded-circle" src="'.$img.'" alt="persons notification img">
                </div>
                <div class="col-md-8 col-8  p-0">
                   <p class="senders_name">'.$uname.' send you a message:</p>
                   <p class="senders_msg">"'.$row["message"].'"</p>
                   <p class="notification_time font-weight-bold">'.$formattedDate.'</p>
                </div>
                <div class=" col-md-2 p-0 d-flex align-items-center notification_indicator">
                <div data-cy="dot" class="nav-dot" style="display:'.$NH.'"></div>  
                </div>
                    </div>
                    </a>';

            }
 } 
 elseif(mysqli_num_rows($dataxx) > 0){
     
      while($row = mysqli_fetch_array($dataxx))
            {
                $viewuserid = $row["from_user"];
                $userinfo = $users->GetUSerByUserId($viewuserid);
                 $to_user = $userid;
                 
                 $dateString = $row['date_created'];
                     $timestamp = strtotime($dateString);
                    $formattedDate = date('d F Y', $timestamp);
                    
                     $replacedString = preg_replace('/-[\d]+/', '', $postid);
 
        $jobid = str_replace("job-", "", $row['jobid']);
        $serviceid =  str_replace("service-", "", $row['serviceid']);
            if(!empty($jobid)) { 
                $postid = $jobid;
             }elseif(!empty($serviceid)) { 
                 $postid = $serviceid;
               
             }
         $p_picc = $userinfo['ProfilePic'];
        $isGoogleImage = strpos($p_picc, 'https://lh3.googleusercontent.com/') === 0;
        if($isGoogleImage) {
            $img = $p_picc;
        } else {
            $img = 'admin/assets/img/profile/'.$p_picc;
        }
 
             if($row['popped'] = '1') {$NH = 'block';} else { $NH = 'none';}       
                    
               
            //   $output .= '<li><a href="discussion.php?stid='.$row["id"].'&lgn='.$to_user.'&dis_id='.$row["from_user"].'"><strong>'.$userinfo["ProfileName"].'</strong>'.$row["date_dreated"].'<br />'.$row["message"].'</a></li>';
               
               
               $output .= '<a href="discussion.php?stid='.$postid.'&lgn='.$to_user.'&dis_id='.$row["from_user"].'&type='.$row["post_type"].'&msgid='.$row["id"].'"><div class="d-flex my-2">
                <div class="hh-1 img_notif_wrap">
                    <img class="notification_img rounded-circle" src="'.$img.'" alt="persons notification img">
                </div>
                <div class="col-md-8 col-8  p-0">
                   <p class="senders_name">'.$userinfo["ProfileName"].' send you a message:</p>
                   <p class="senders_msg">"'.$row["message"].'"</p>
                   <p class="notification_time font-weight-bold">'.$formattedDate.'</p>
                </div>
                <div class=" col-md-2 p-0 d-flex align-items-center notification_indicator">
                <div data-cy="dot" class="nav-dot" style="display:'.$NH.'"></div>  
                </div>
                    </div>
                    </a>';
                    
                    
            }
            
 }
 else {
    $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
   }

         $count = mysqli_num_rows($popped);   
         if(!empty($userid)) {
            $data = array(
               'notification' => $output,
               'unseen_notification'  => $count
            );
            
              echo json_encode($data);

         }
}
    /* Get User Chat */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'GetUserChat') {
    extract($_REQUEST);

       $loginsuser =  $_SESSION['Userid'];
    if($post_type == 'job') {
         $datax = $users->GetUserChatJob($reciever,$sender,$post_id,$post_type);
    }elseif($post_type == 'service') { 
         $datax = $users->GetUserChatService($reciever,$sender,$post_id,$post_type);
    }  
    
     $datax = $users->GetUserChat($reciever,$sender,$post_id,$post_type);

        $output = '';
        $sidd ='';
        // $flag = false;
        // $proposalShown = false;
            while($row = mysqli_fetch_array($datax))
            {
                $datee = date_create($row["date_created"]);
                $userid = $row["from_user"];
                $to_user = $row["to_user"];
                
                    $userinfo = $users->GetUserById($userid);
                 
                $user_id=$_SESSION['Userid'];
                $credit_balance = $users->getCreditedBalance($user_id);
                $debit_balance = $users->getDebitedBalance($user_id);
                $balance = $credit_balance['credit']-$debit_balance['debit'];
                $post_id =  $row["post_id"];
                
                $proposal_data = $users->GetProposalData($userid,$post_id,$to_user);
                $to_proposal = $proposal_data['to_user'];
                $post_type = $row["post_type"];
                $p_status =  $proposal_data['status'];
                $price = $proposal_data['price'];
                $Proposal_Price = number_format($price, 2, '.', ',');
                 
                 if($row["post_type"] == 'service') {
                     $uPic = $userinfo['ProfilePic'];
                     $uName = $userinfo['ProfileName'];
                     $serviceid =   $row["post_id"];
                     $postdata = $users->GetServiceById($serviceid);
                     $userid = $postdata['user_id'];
                     $postuser = $users->GetUserById($userid);
                     $whosent = $postuser['ProfileName'];
                     $from_user= $row["from_user"];
                     $postid = $postdata['id'];
                       //  $proposalShown = true;
                     if($whosent == $_SESSION['Name']) {
                         $whosentproposal = 'You';
                        $accept = 'Congratulations! your proposal has been accepted';
                      }else{
                        $whosentproposal =  $postuser['ProfileName'];
                        $accept = 'Congratulations! proposal has been accepted';
                     }
                      
            // Loop through the result set
        $planss = $users->GetPaymentPlanForProcess($postid,$post_type,$from_user);
                while ($plans = mysqli_fetch_assoc($planss)) {
                 if ($row['type'] == $plans['id'] && $row['message'] == 'Payment Released') {
         $m_created_at = date_create($plans["created_at"]);
         $payment_heading = $plans['plan'];
                      $price = $plans['plan_price'];
                      $formattedPrice = number_format($price, 2, '.', ',');
                          if(empty($postdata['photos'])) {$post_img = 'assets/img/dummy-post.jpg';} else{$post_img = "admin/assets/img/services/".$postdata['photos'];}
 
                          $output .= '<div style="margin-top: 23px; padding-top:10px; border-radius:10px; class="separator>
                        <h6 style="font-size: 11px; color: #007510;font-weight: 700; text-transform:uppercase;">PAYMENT RELEASED - '.$payment_heading.'</h6>
                    
                    <div class="img-p" style="  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                        <div class="hh-1"><img class="hhh post-msg-img" src="'.$post_img.'" alt="">
                    </div>
                    <div class="all-cnt">
                            <p class="pp2 title-msg-post mob-title-post">'.$postdata['topic'].'</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="post-msg-data">
                                    <img class="cash-img " src="assets/img/cash.svg">   
                                    <b style="color: #108110;">PAID ON '.date_format($m_created_at,"j M, Y").' <br>RM'.$formattedPrice.'</b>
                                </div>
                            </div>
                    </div>
                    </div>
                    </div>';
                    
                 } elseif ($row['type'] == $plans['id'] && $row['message'] == 'Payment Funded') {
         $m_created_at = date_create($plans["created_at"]);
         $payment_heading = $plans['plan'];
                      $price = $plans['plan_price'];
                      $formattedPrice = number_format($price, 2, '.', ',');
                  if(empty($postdata['photos'])) {$post_img = 'assets/img/dummy-post.jpg';} else{$post_img = "admin/asse    ts/img/services/".$postdata['photos'];}
                           $output .= '<div style="margin-top: 23px; padding-top:10px; border-radius:10px;" class="funded separator d-flex align-items-center text-center justify-content-center my-4 gap-4">
                        <h6 style="font-size: 14px;padding: 0px 6px;color: #007510;font-weight: 700;text-transform:uppercase;text-align: center;font-style: italic;" class="m-0"> -  -  -  RM'.$plans['plan_price'].' PAYMENT FUNDED FOR   - '.$payment_heading.' -  -  -</h6>
                      </div>
                    </div>';
                 }  else{}
            }
             $plan_id = $plans['id'];
             $plandata = $users->GetPaymentPlanById($plan_id);
            $post_id = $postid;
             
            $milestone = $users->GetPaymentPlanByPostId($post_id);
            $getreviews = $users->GetReviewsByPostBySender($post_id ,$from_user,$to_user);
            $posts_type = $row["post_type"];
            
            // if(empty($getreviews['sendby']) || empty($getreviews['public_review'])){
            if(empty($getreviews) && $loginsuser != $to_user){
                $ud = '<a href="public-reviews?id='.$post_id.'&lgn='.$from_user.'&type='.$posts_type.'&dis_id='.$to_user.'">Give a review</a>';
            } elseif(empty($getreviews) && $loginsuser == $to_user){ 
                  $ud = '<a href="public-reviews?id='.$post_id.'&lgn='.$to_user.'&type='.$posts_type.'&dis_id='.$from_user.'">Give a review dd</a>';
            } else {$ud ='';}
          
        if ($row['type'] == $plans['id'] && $row['message'] == 'Job Completed SuccessFully!' || $row['message_type'] == 'FinalMilestone') {
                          $m_created_at = date_create($plans["created_at"]);
                          $payment_heading = $plans['plan'];
                          $price = $plans['plan_price'];
                          $formattedPrice = number_format($price, 2, '.', ',');
                          
                          $output .= '<div><div style="margin-top: 23px; padding-top:10px; border-radius:10px;"  class="funded separator  d-flex align-items-center text-center justify-content-center  gap-4">
                                    <h6 class="m-0" style="font-size: 14px;color: #007510;font-weight: 700;text-transform:uppercase;text-align: center;font-style: italic;">-  -  -  Job Completed SuccessFully!   -  -  -</h6>
                      </div> 
                       <div class="giveareview"> '.$ud.'</div>
                      </div>
                      
                    </div>';
                     }else{}
                      
                   } elseif($row["post_type"] == 'job') {
                     $jobid =  $row["post_id"];
                     $uName = $userinfo['ProfileName'];
                     $uPic = $userinfo['ProfilePic'];
                     $postdata = $users->GetJobById($jobid);
                     $userid = $postdata['user_id'];
                     $postuser = $users->GetUserById($userid);
                     $whosent = $postuser['ProfileName'];
                     if($to_user != $userid) {
                         $userid = $to_user;
                         $p_user = $users->GetUserById($userid);
                         $whosentproposal = $p_user['ProfileName'];
                          $accept = 'Congratulations! proposal has been accepted';
                    }else{
                         $whosentproposal = $postuser['ProfileName'];
                          $accept = 'Congratulations! proposal has been accepted';
                     }
                     
                     $from_user= $row["from_user"];
                     $postid = $postdata['id'];
                     
                     $planss = $users->GetPaymentPlanForProcess($postid,$post_type,$from_user);
            while ($plans = mysqli_fetch_assoc($planss)) {
                 if ($row['type'] == $plans['id'] && $row['message'] == 'Payment Released') {
                     $m_created_at = date_create($plans["created_at"]);
                     $payment_heading = $plans['plan'];
                     $price = $plans['plan_price'];
                      $formattedPrice = number_format($price, 2, '.', ',');
                       if(empty($postdata['photos'])) {$post_img = 'assets/img/dummy-post.jpg';} else{$post_img = "admin/assets/img/services/".$postdata['photos'];}
                          $output .= '<div style="margin-top: 23px; padding-top:10px; border-radius:10px;" class="separator>
                        <h6 style="font-size: 11px;color: #007510;font-weight: 700; text-transform:uppercase;">PAYMENT RELEASED - '.$payment_heading.'</h6>
                    
                    <div class="img-p" style=" padding:0 20px;">
                        <div class="hh-1"><img class="hhh post-msg-img" src="'.$post_img.'" alt="">
                    </div>
                    <div class="all-cnt">
                            <p class="pp2 title-msg-post mob-title-post">'.$postdata['topic'].'</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="post-msg-data">
                                    <img class="cash-img" src="assets/img/cash.svg">   
                                    <b style="color: #108110;">PAID ON '.date_format($m_created_at,"j M, Y").' <br>RM'.$plans['plan_price'].'</b>
                                </div>
                            </div>
                    </div>
                    </div>
                    </div>';
                    
                     } elseif ($row['type'] == $plans['id'] && $row['message'] == 'Payment Funded') {
                          $m_created_at = date_create($plans["created_at"]);
                          $payment_heading = $plans['plan'];
                          $price = $plans['plan_price'];
                          $formattedPrice = number_format($price, 2, '.', ',');
                          if(empty($postdata['photos'])) {$post_img = 'assets/img/dummy-post.jpg';} else{$post_img = "admin/assets/img/services/".$postdata['photos'];}
                           $output .= '<div style="margin-top: 23px; padding-top:10px; border-radius:10px;"  class="funded separator  d-flex align-items-center text-center justify-content-center my-4 gap-4">
                        <h6 style="font-size: 14px;padding: 16px 25px;color: #007510;font-weight: 700;text-transform:uppercase;text-align: center;font-style: italic;">-  -  - RM'.$plans['plan_price'].'  PAYMENT FUNDED FOR - '.$payment_heading.' -  -  -</h6>
                    
                    </div>
                    </div>';
                    
                    
                    
                     }else{}
            }
                $plan_id = $plans['id'];
             $plandata = $users->GetPaymentPlanById($plan_id);
            $post_id = $postid;
             
            $milestone = $users->GetPaymentPlanByPostId($post_id);
            $getreviews = $users->GetReviewsByPostBySender($post_id ,$from_user,$to_user);
            $posts_type = $row["post_type"];
            
            if(empty($getreviews) && $loginsuser != $to_user){
                $ud = '<a href="public-reviews?id='.$post_id.'&lgn='.$from_user.'&type='.$posts_type.'&dis_id='.$to_user.'">Give a review</a>';
            } else {
                    $ud ='';
            }
          
        if ($row['type'] == $plans['id'] && $row['message'] == 'Job Completed SuccessFully!' || $row['message_type'] == 'FinalMilestone') {
             $users->JobCompleted($post_id);
            
                          $m_created_at = date_create($plans["created_at"]);
                          $payment_heading = $plans['plan'];
                          $price = $plans['plan_price'];
                          $formattedPrice = number_format($price, 2, '.', ',');
                          
                          $output .= '<div><div style="margin-top: 23px; padding-top:10px; border-radius:10px;"  class="funded separator  d-flex align-items-center text-center justify-content-center my-4 gap-4">
                                    <h6 style="font-size: 14px;padding: 16px 25px;color: #007510;font-weight: 700;text-transform:uppercase;text-align: center;font-style: italic;">- - - Job Completed SuccessFully!  - - -</h6>
                      </div> 
                       <div class="giveareview"> '.$ud.'</div>
                      </div> 
                      
                    </div>';
                     }else{}
                 
                 
                 }
                 
             elseif($row["message_type"] == 'adminchat') {
                     $adminid = $row["from_user"];
                     $admin_info = $users->GetAdminDetails($adminid);
                //  $uPic = 'avataaars.png';
                 if(!empty($admin_info['Name'])){
                     $uName = $admin_info['Name'];
                     $uPic = 'avataaars.png';
                 } else {
                     $uName = $userinfo['ProfileName'];
                     $uPic = $userinfo['ProfilePic'];
                 }
                 
                 } else { $uName = $userinfo['ProfileName'];
                     $uPic = $userinfo['ProfilePic'];}
            
                     if($balance >= $proposal_data['price'] && $to_proposal == $loginsuser) {
                    $btnc = '<button type="button" class="btn-wallet" data-bs-toggle="modal" data-bs-target="#myModalConfirm">Start Work</button>';
                  } else {
                    $btnc = '<button type="button" class="btn-wallet" data-bs-toggle="modal" data-bs-target="#myModal">Start Work</button>';
                 }
                if($to_proposal != $loginsuser) {
                    $btnc = '<button type="button" class="btn-wallet" data-bs-toggle="modal" data-bs-target="#myModal" disabled>Proposal Sent Successfully</button>';
                }  
                
                
               
                
                if($p_status == 1) {
                    $btnc = '<a  href="payment-release?id='.$postdata['id'].'&price='.$proposal_data['price'].'&lgn='.$loginsuser.'&type='.$post_type.'&dis_id='.$reciever.'"><button type="button" class="btn-wallet btn-post-msg w-25">Payment Summary </button> </a>';
                }
                                //  if($row["message"] == '') { $hide = 'display:none;';}else {}

                                          if(empty($postdata['photos'])) {$post_img = 'assets/img/dummy-post.jpg';} else{$post_img = "admin/assets/img/services/".$postdata['photos'];}



                // if($loginsuser == $to_proposal) {$btn ='';  }else{ $btn ='<a  href="summary?id='.$postdata['id'].'&price='.$proposal_data['price'].'&lgn='.$loginsuser.'&type='.$row["post_type"].'"><button type="button" class="btn-wallet">Start Work</button> </a>';}
                $isGoogleImage = strpos($uPic, 'https://lh3.googleusercontent.com/') === 0;
                    if ($isGoogleImage) {
                          $userimg = $uPic;
                     } else {
                          $userimg = 'admin/assets/img/profile/'.$uPic;
                    }
                    if($to_user == $loginsuser) { $clss = 'sender';} else {$clss = 'reciever';}
                    $attach_img = '';

if (!empty($row['image'])) {
    $attachmentType = $row['message_type'];
    switch ($attachmentType) {
        case 'image/jpeg':
        case 'image/png':
            $attach_img .= '<a class="position-relative" href="admin/assets/img/attachments/'.$row['image'].'" target="_blank" download="'.$row['image'].'">';
            $attach_img .= '<img src="admin/assets/img/attachments/'.$row['image'].'" class="attachment-image '.$clss.'" width="150" height="150">';
            $attach_img .= '<span class="filename '.$clss.'">'.$row['image'].'</span>';
            $attach_img .= '</a>';
            break;
        case 'application/pdf':
            $attach_img .= '<a class="position-relative" href="admin/assets/img/attachments/'.$row['image'].'" target="_blank" download="'.$row['image'].'">';
            $attach_img .= '<img src="admin/assets/img/icons.png" class="attachment-image '.$clss.'" width="100" height="100">';
            $attach_img .= '<span class="filename">'.$row['image'].'</span>';
            $attach_img .= '</a>';
            break;
        case 'video/mp4':
        case 'video/mov':
            $attach_img .= '<a class="position-relative" href="admin/assets/img/attachments/'.$row['image'].'" target="_blank" download="'.$row['image'].'">';
            $attach_img .= '<img src="admin/assets/img/video-icon.png" class="attachment-image '.$clss.'" width="100" height="100">';
            $attach_img .= '<span class="filename">'.$row['image'].'</span>';
            $attach_img .= '</a>';
            break;
        case 'application/msword':
        case 'application/vnd.open':
            $attach_img .= '<a class="position-relative" href="admin/assets/img/attachments/'.$row['image'].'" target="_blank" download="'.$row['image'].'">';
            $attach_img .= '<img src="admin/assets/img/icons.png" class="attachment-image '.$clss.'" width="100" height="100">';
            $attach_img .= '<span class="filename">'.$row['image'].'</span>';
            $attach_img .= '</a>';
            break;
        case 'text/plain':
        case 'application/octet-st':
            $attach_img .= '<a class="position-relative" href="admin/assets/img/attachments/'.$row['image'].'" target="_blank" download="'.$row['image'].'">';
            $attach_img .= '<img src="admin/assets/img/icons.png" class="attachment-image '.$clss.'" width="100" height="100">';
            $attach_img .= '<span class="filename">'.$row['image'].'</span>';
            $attach_img .= '</a>';
            break;
        default:
            $attach_img .= '<a class="position-relative" href="admin/assets/img/attachments/'.$row['image'].'" target="_blank" download="'.$row['image'].'">';
            $attach_img .= '<img src="admin/assets/img/icons.png" class="attachment-image '.$clss.'" width="100" height="100">';
            $attach_img .= '<span class="filename">'.$row['image'].'</span>';
            $attach_img .= '</a>';
            // Handle other file types if needed
            break;
    }
}

// If $attach_img is still empty, you can set a default message or icon
if (empty($attach_img)) {
    $attach_img = '';
}
                $output .= $attach_img.'
                
                <div class="third-pge-contnt chat-bubble chat-message '.$clss.'" >
                        <div class="hh-1">
                        <img class="cir-img" src="'.$userimg.'" alt=""></div>
                        <div class="all-cntnt">
                            <div class="align-items-center"  style="padding:0;">
                                <div class="items-title '.$clss.'">
                                    <div class="d-flex align-items-center title-time-sub '.$clss.'">
                                    <div class="time_discuss text-left mt-0 '.$clss.' p-0">
                                <span class="dateTime" style="font-size: 12px; color:#323232;"> '.date_format($datee,"M j, Y g:i A").'</span>
                            </div>
                                        <h5 class="pp mr-in title-name font-weight-bold"  style="margin:0; font-size: 14px;color: #2165f4;">'.$uName.'</h5>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-container">
                             
                 <p class="content-para content-message '.$clss.'">'.$row['message'].'</p>
                  
                </div>
                            
                            </div>
                    </div>';
                     
                       if($row['proposal'] == 'Yes') { 
                       
                     $output .= '<div style="margin-top: 23px;">
                        <h6 style="font-size: 11px;color: #007510;font-weight: 700; text-transform:uppercase;">'.$whosentproposal. ' PROPOSED AN OFFER</h6>
                    </div>
                    <div class="img-p" style="  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                        <div class="hh-1"><img class="hhh post-msg-img" src="'.$post_img.'" alt="">
                    </div>
                    <div class="all-cnt">
                            <p class="pp2 title-msg-post mob-title-post">'.$postdata['topic'].'</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="post-msg-data">
                                    <img class="cash-img" src="assets/img/cash.svg">   
                                    <b style="color: #108110;">'.$Proposal_Price.'</b>
                                </div>
                            </div>
                                    <div style="">
                     '.$btnc.'
                    </div>
                    </div>
                    </div>'
                    ;
                            //  $proposalShown = true; // Update the flag to indicate that the proposal section has been shown

                    } elseif($row['proposal_accept'] == 'Yes'){
                     
                     $output .= '<div style="margin-top: 23px;padding: 5px 10px;color: #007510;font-weight: 700;border: 1px solid #e4e4e4;width: fit-content;padding: 15px;border-radius: 30px;margin: 0px auto;">
                        <h6 class="m-0" style="font-size: 13px;color: #007510;font-weight: 700;border-radius: 30px; margin:0;">'.$accept.'</h6>
                    </div>
                   
                     
                    </div>';
                    // $proposalShown = true;
                 } else { }
                //  $flag = true;
            }
         // $sidd = $row['serviceid'];
                  
       $count = mysqli_num_rows($datax);    
            $data = array(
               'notification' => $output,
               'unseen_notification'  => $count
            );
            
              echo json_encode($data);

}
    /* Get User Chat */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'GetUserNAdminChat') {
    extract($_REQUEST);

       $loginsuser =  $_SESSION['Userid'];
       $datax = $users->GetUserNAdminChat($reciever,$sender,$post_id,$post_type);

      $output = '';

while ($row = mysqli_fetch_array($datax)) {
    $datee = date_create($row["date_created"]);
    $userid = $row["from_user"];
    $adminid = $row["from_user"];
    $to_user = $row["to_user"];
    $userinfso = $users->GetAdminDetails($adminid);
    if(!empty($userinfso)){
        $userinfo = $users->GetAdminDetails($adminid);
       $name ='';
       $userimg = '';
       $messageClass = "sender-message";
    }else {
         $userinfo = $users->GetUserById($userid);
         $name = $userinfo['ProfileName'];
         $userimg = 'assets/img/profile/'.$userinfo['ProfilePic'];
         $messageClass = "receiver-message";
    }
    // Determine the message sender and receiver
    $isSender = $userid === $_SESSION['Userid'];
    
    // Determine the appropriate message classes
    // $messageClass = $isSender ? "sender-message" : "receiver-message";
    $imageAlignment = $isSender ? "" : "justify-content: flex-end;";
    // $userimg = $isSender ? "path_to_sender_image.png" : "path_to_receiver_image.png";
    $userName = $isSender ? "You" : $name;

    $output .= '<div class="img-p third-pge-contnt chat-bubble ' . $messageClass . '" style="align-items: unset; margin: 0;">';
    $output .= '<div class="hh-1" style="' . $imageAlignment . '">';
    $output .= '<img class="cir-img" src="' . $userimg . '" alt=""></div>';
    $output .= '<div class="all-cntnt">';
    $output .= '<div class="align-items-center" style="padding: 0;">';
    $output .= '<div class="items-title">';
    $output .= '<div>';
    $output .= '<h5 class="pp mr-in title-name font-weight-bold" style="margin: 0; font-size: 16px; color:#2165f4;">' . $name . '</h5>';
    $output .= '</div>';
    $output .= '<div>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '<div class="time_discuss">';
    // $output .= '<span style="font-size: 12px;">' . date_format($datee, "M j, Y g:i A") . '</span>';
    $output .= '</div>';
    $output .= '<p class="content-para">' . $row['message'] . '</p>';
    $output .= '</div>';
    $output .= '</div>';
}

$data = array(
    'notification' => $output,
    'unseen_notification' => $count
);

echo json_encode($data);

}
    /* Get One to One Chat */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'GetOneToOneChat') {
    extract($_REQUEST);

        $datax = $users->GetOneToOneChat($reciever,$sender,$post_id,$post_type);

      $output = '';

while ($row = mysqli_fetch_array($datax)) {
    $datee = date_create($row["date_created"]);
    $userid = $row["from_user"];
    $adminid = $row["from_user"];
    $to_user = $row["to_user"];
    $userinfso = $users->GetAdminDetails($adminid);
    // if(!empty($userinfso)){
    //   $userinfo = $users->GetAdminDetails($adminid);
    //   $name = $userinfo['Name'];
    //   $userimg = 'assets/img/profile/avataaars.png';
    // }else {
         $userinfo = $users->GetUserById($userid);
         $name = $userinfo['ProfileName'];
         $userimg = 'assets/img/profile/'.$userinfo['ProfilePic'];
    // }
    // Determine the message sender and receiver
    $isSender = $userid === $_SESSION['Userid'];
    
    // Determine the appropriate message classes
    $messageClass = $isSender ? "sender-message" : "receiver-message";
    $imageAlignment = $isSender ? "" : "justify-content: flex-end;";
    // $userimg = $isSender ? "path_to_sender_image.png" : "path_to_receiver_image.png";
    $userName = $isSender ? "You" : $name;

    $output .= '<div class="img-p third-pge-contnt chat-bubble" style="align-items: unset; margin: 0;">';
    $output .= '<div class="hh-1" style="' . $imageAlignment . '">';
    $output .= '<img class="cir-img" src="' . $userimg . '" alt=""></div>';
    $output .= '<div class="all-cntnt ' . $messageClass . '">';
    $output .= '<div class="align-items-center" style="padding: 0;">';
    $output .= '<div class="items-title">';
    $output .= '<div>';
    $output .= '<h5 class="pp mr-in title-name" style="margin: 0; font-size: 16px;">' . $userName . '</h5>';
    $output .= '</div>';
    $output .= '<div>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '<div class="time_discuss">';
    $output .= '<span style="font-size: 12px;">' . date_format($datee, "M j, Y g:i A") . '</span>';
    $output .= '</div>';
    $output .= '<p class="content-para">' . $row['message'] . '</p>';
    $output .= '</div>';
    $output .= '</div>';
}

$data = array(
    'notification' => $output,
    'unseen_notification' => $count
);

echo json_encode($data);

}
    /* Post Status */ 
    elseif (isset($_REQUEST['postfilter']) && $_REQUEST['poststatus']) {

    extract($_REQUEST);
      
      
     
    $conditions = array();
// 	  $area = $filter1;
    $sortVal = $poststatus; 
 
        $user_id =  $_SESSION['Userid'];
    
   if($postfilter == 'ALL') {
         $areadata = $users->GetAllByUserId($user_id);
 	 }elseif($postfilter == 'Professional Services') {
	     $areadata = $users->GetProfessionalServiceByUser($user_id);
	 }elseif($postfilter == 'Jobs Marketplace') {
 	   $areadata = $users->GetJobsByUser($user_id);
 	 }
 	  else{}
 	  //print_r($areadata);
	  
      foreach($areadata as $dataarea){ 
       $userid = $dataarea['user_id']; 
       $postid = $dataarea['id'];
       $userinfo = $users->GetUserById($userid);
       $likedislike = $users->GetLikeDislikeByUser($userid, $postid);
       $val = $dataarea['topic'];
    //   $topic = $users->myUrlEncode($val);
    $topic = $users->slugify($val);
     $price = $dataarea['price'];
$formattedPrice = number_format($price, 0, '.', ',');
 $reviews_avg = $users->GetReviewAvgByUser($userid);
// Calculate the average rating and total number of reviews
$avg_rating = number_format($reviews_avg['avg_communication_rating'], 1);
$total_reviews = $reviews_avg['total_reviews'];
  if(!empty($total_reviews)) {$rating = $avg_rating.' ('.$total_reviews.')';} else {$rating = 'New Member';}        

// Display the rating
  $avg_rating . " (" . $total_reviews . ")";
  
 $isGoogleImage = strpos($userinfo['ProfilePic'], 'https://lh3.googleusercontent.com/') === 0;
            if ($isGoogleImage) {
                  $userimg = $userinfo['ProfilePic'];
             } else {
                  $userimg = 'admin/assets/img/profile/'.$userinfo['ProfilePic'];
            }
            
            if (!empty($dataarea['photos'])) {
     $post_img ='admin/assets/img/services/' . $dataarea['photos'];
 } else {
     $post_img = 'assets/img/dummy-post.jpg';
    // Make sure to verify the resulting $post_img path
}

        ?>
       <div class="outer">
                                    <div class="img-p">
                                        <!--image (content inner it)-->
            <a href="professional-service?t=<?=$dataarea['id'];?>&service=<?=$topic;?>">
                                        <div class="hh-1">
                                            <img class="hhh post-msg-img" src=" <?=$post_img;?>" alt="">
                                        </div>
                                        </a>
                                    <div class="all-cnt">
                                         <div class="inner">
                                         <a href="user-view.php?viewuserid=<?=$userinfo['id'];?>">
                                        <div class="d-flex two-lb align-items-center heart-img-head">
                                            <div class="img-heart-nm">
 <img class="sm-img" src="<?php echo $userimg; ?>" alt="">
                                               <p class="pp mr-in "> <?=$userinfo['ProfileName'];?></p>   
                                            </div>
                                             
                                        </div>
                                        </a>
                                        </div>
                                        
                                        <!--middle text-->
                                              <a href="professional-service?t=<?=$dataarea['id'];?>&service=<?=$topic;?>">
                                             <p class="pp2 title-msg-post" alt="<?=$dataarea['topic'];?>"><?php echo substr($dataarea['topic'], 0, 80);?> </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="star">
                                                <!--<img src="assets/img/star.svg" alt="">-->
                                               <i class="fa-solid fa-star"></i>
                                                <small><?=$rating;?></small>
                                            </div>
                                             <p><small>From </small> <b>RM<?=$formattedPrice;?> <?//=$dataarea['price_type'];?></b> </p>
                                        </div>
                                        </a>
                                    </div>
                                   
                                    
                                </div>
                                
                                </div>
            
            
        <?php 
         
       
   }  
   }
    /* Check Name */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'CheckName') {

    extract($_REQUEST);
    
    $data = $users->CheckName($name);
   
     if($data){
    echo 'found';
  } else {
    echo 'not_found';
  }
  }
    /* Sponsor Plan */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'SponsorPlan') {
     extract($_REQUEST);
 
    $data = $users->SponsorPlan($id,$plan1,$plan2);
  
  if ($data):
          header('location:../sponsor.php');
    else:
        header('location:../sponsor.php');
    endif; 

}
    /* Propose Budget */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'ProposedBudget') {
     extract($_REQUEST);

          $post_id = $postid;
         
    $data = $users->ProposedBudget($proposed_price,$post_id,$userid,$msgid,$dis_id,$type);
                $users->SentProposal2($postid,$userid,$dis_id,$type);
  
  
  if ($data):
          header('location:../../discussion.php?stid='.$post_id.'&lgn='.$userid.'&dis_id='.$dis_id.'&type='.$type);
    else:
        // header('location:');
    endif; 

}
    /* Payment Plan */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'PaymentPlan') {
    extract($_REQUEST);
  if(!empty($field_name)){
 foreach($field_name as $index => $value) {
       $plan = $field_name[$index];
         $price = $field_price[$index];
         $adonss = $users->PaymentPlan($postid, $plan, $price, $userid, $type,$dis_id);
 }
} else {
             $plan = 'Full Payment';
             $price = $postprice;
       $adonss = $users->PaymentPlan($postid, $plan, $price, $userid, $type,$dis_id);
       }
 
if ($adonss):
          header('location:../../payment-release?id='.$postid.'&userid='.$userid.'&type='.$type.'&dis_id='.$dis_id);
    else:
        // header('location:');
    endif; 

}
    /* Public Review */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'PublicReview') {
      extract($_REQUEST);  
    // Retrieve form data
    $communicationRating = isset($_POST['communication_rating']) ? $_POST['communication_rating'] : null;
    $serviceDeliveredRating = isset($_POST['service_delivered_rating']) ? $_POST['service_delivered_rating'] : null;
    $priceBudgetRating = isset($_POST['price_budget_rating']) ? $_POST['price_budget_rating'] : null;
    $repeatHireRating = isset($_POST['repeat_hire_rating']) ? $_POST['repeat_hire_rating'] : null;
    $publicReview = isset($_POST['public_review']) ? $_POST['public_review'] : null;
    $toUserReview = isset($_POST['to_user_review']) ? $_POST['to_user_review'] : null;
  
        $comment = 'Job Completed SuccessFully!';
        $planid = 7;
        $message_type = '';
        
        $data = $users->SendPaymentReleaseMessage($sendby,$sendto,$comment,$posttype,$postid,$planid,$message_type);
        
        
         $data = $users->PublicReview($sendby,$sendto,$postid,$posttype,$communicationRating, $serviceDeliveredRating, $priceBudgetRating, $repeatHireRating, $publicReview,$toUserReview);

}
    /* ShortList */
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'ShortList') {
  extract($_REQUEST);  
// Retrieve form data
  session_start();
      $user_id = mysqli_real_escape_string($con, $userId);
      $senderId = mysqli_real_escape_string($con, $senderId);
      $postid = mysqli_real_escape_string($con, $postid);
      $posttype = mysqli_real_escape_string($con, $posttype);
     
       $data = $users->ShortList($userId,$senderId,$postid,$posttype);

  if ($data):
          header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
    else:
      header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
    endif; 
    

}
    /* Cross Out */
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'CrossOut') {
  extract($_REQUEST);  
// Retrieve form data
  session_start();
     $user_id = mysqli_real_escape_string($con, $userId);
      $senderId = mysqli_real_escape_string($con, $senderId);
      $postid = mysqli_real_escape_string($con, $postid);
      $posttype = mysqli_real_escape_string($con, $posttype);
     
        $data = $users->CrossOut($userId,$senderId,$postid,$posttype);
     
 
  if ($data):
          header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
    else:
      header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
    endif; 
    

}
    /* Upload Payment Reciept */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'UploadReciept') {
     extract($_REQUEST);
    if (isset($_FILES['receipt'])) {
        $file_name = $_FILES['receipt']['name'];
        $file_size = $_FILES['receipt']['size'];
        $file_tmp = $_FILES['receipt']['tmp_name'];
        $file_type = $_FILES['receipt']['type'];
           $desired_dir1 = "../assets/img/";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $reciept = $_FILES['receipt']['name'];
		    
 }
    $data = $users->UploadReciept($name,$currency,$topic,$email, $phone, $amount, $userid, $payment_for, $postid, $planid, $milestone,$reciept,$actual_amnt,$forwho);
   
  
  if ($data):
          header('location:../../suc-reciept.php?stid='.$postid.'&lgn='.$userid.'&dis_id='.$forwho.'&type='.$payment_for);
    else:
        // header('location:');
    endif; 

}
    /* Top Wallet Up */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'TopWalletUp') {
     extract($_REQUEST);
 
        $data = $users->TopWalletUp($userid,$amount,$email);   
  
  if ($data):
      
      $withdawal_amount = $totalprice;
      $payment_for = $type;
      $cp_checked = 'bank';
    
         $users->FundPayment($userid,$amount,$payment_for,$postid,$reciever,$planid,$cp_checked);

            
      $users->ChangeStatusOfReciept($recieptid);
      
      $status = 2;
         $users->UpdatePaymentStatus($planid,$status);
      
 
          header('location:../bankin');
       
    else:
         header('location:../bankin');
    endif; 

}
    /* Service Tax */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'ServiceTax') {
     extract($_REQUEST);
    
    $data = $users->ServiceTax($service,$sst);
   
  
  if ($data):
          header('location:../service-tax.php');
    else:
       header('location:../service-tax.php');
    endif; 

}
    /* Coupons */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'AddCoupons') {
     extract($_REQUEST);
    
    $data = $users->AddCoupons($couponname,$couponcode,$couponquantity,$couponsdate,$couponedate,$couponamount);
   
  
  if ($data):
          header('location:../view-coupon.php');
    else:
       header('location:../add-coupon.php');
    endif; 

}


   /* Delete Coupon */ 
    elseif (isset($_REQUEST['deletecoupon'])) {
    extract($_REQUEST);
  $id = $deletecoupon;
    $data = $users->DeleteCoupon($id);
     
 	if($data): 
         header('location:../../view-coupon.php');
     else:
        header('location:../../view-coupon.php');
    endif;
    
} 


    /* Get Coupons */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'GetCoupons') {
     extract($_REQUEST);
      
    $getcoupon = $users->GetCouponDataByCode($couponcodes);
    $amount = $getcoupon['CouponAmount'];
    $couponCode = $getcoupon['CouponCode'];
    $startDate = $getcoupon['SDate'];
    $endDate = $getcoupon['EDate'];
    
    // Get the current date
    $currentDate = date('Y-m-d');
if ($couponCode === $couponcodes) {
    if ($currentDate >= $startDate && $currentDate <= $endDate) {
        // Coupon is valid and within the date range
          $data = $users->GetCouponReedem($userid, $amount,$couponCode);
            header('location:../../status-coupon?msg=suc&c='.$couponCode.'&s='.$startDate.'&e='.$endDate.'&cc='.$couponcodes);
        echo 'Coupon successfully redeemed!';
    } else {
        // Coupon has expired
        header('location:../../status-coupon?msg=e&c='.$couponCode.'&s='.$startDate.'&e='.$endDate.'&cc='.$couponcodes);
        echo 'Coupon has expired.';
        
    }
} else {
    // Coupon code is invalid
    echo 'Invalid coupon code.';
    header('location:../../status-coupon?msg=w&c='.$couponCode.'&s='.$startDate.'&e='.$endDate.'&cc='.$couponcodes);
}
         
      

}
  /* Add Years */ 
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'AddYears') {
     extract($_REQUEST);
    
    $data = $users->AddYears($years);
   
  
  if ($data):
          header('location:../years.php');
    else:
       header('location:../years.php');
    endif; 

}


 /* Delete Year */ 
    elseif(isset($_REQUEST['deleteyear'])) {
        extract($_REQUEST);
        $id = $deleteyear;
            $data = $users->DeleteYearByID($id);
     	if($data): 
            header('location:../years.php');
         else:
            header('location:../years.php');
        endif;
        
    } 








    


