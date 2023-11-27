<?php
define('DbHost', 'localhost');
define('DbUser', 'mit_instantjob');
define('DbPass', '[PFC[mUGwBp4'); 
define('DbName', 'mit_instantjobs');
 
class Instantjobs{

    function __construct() {
        $this->con = mysqli_connect(DbHost, DbUser, DbPass, DbName) or die('Could not connect: ' . mysqli_connect_error());
        date_default_timezone_set('Asia/Kolkata');
    }

    function num_rows($q) {
        $sqlquery = mysqli_num_rows($q);
        return $sqlquery;
    }

    function fetch_array($q) {
        $sqlquery = mysqli_fetch_array($q, MYSQLI_ASSOC);
        return $sqlquery;
    }

    function query($q) {
        $sqlquery = mysqli_query($this->con, $q);
        return $sqlquery;
    }

    function lastId($q) { 
        $sqlquery = mysqli_insert_id($this->con);
        return $sqlquery;
        // $last_id = $q->insert_id;
        //return $last_id;
    }
    
     public function UserLogin($emails, $password) {
        $password = md5($password);
          $t = "SELECT * FROM `users` WHERE `Email` = '$emails' AND `Password` = '$password' AND `Status`= 1";
        //checking if the username is available in the table
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
          $count_row = $sqlquery->num_rows;
        if ($count_row == 1) {
            // this login var will use for the session thing
            
             	$_SESSION['Userid'] = $user_data['id'];
             	$_SESSION['Name'] = $user_data['ProfileName'];
  			$_SESSION['Email'] = $user_data['Email'];
  			$_SESSION['Auth']=true;
             return true;
        } else {
            return false;
        }	
    }
    
       
    
       public function AdminLogin($username, $password) {
        $password = md5($password);
          $t = "SELECT * FROM `admin` WHERE `Username` = '$username' AND `Password` = '$password' AND `Status`=0";
        //checking if the username is available in the table
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
          $count_row = $sqlquery->num_rows;
        if ($count_row == 1) {
            // this login var will use for the session thing
             $_SESSION['AdminID'] = $user_data['id'];
             	$_SESSION['Name'] = $user_data['Name'];
  			$_SESSION['Email'] = $user_data['Email'];
             return true;
        } else {
            return false;
        }	
    }
    
    /* Get Admin info  By ID */
     public function GetAdminDetails($adminid) {
        $t = "SELECT * FROM `admin` WHERE `id` = '$adminid'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
    
    
     /* Get USers By Email */
     public function CheckUserByEmail($emails) {
        $t = "SELECT * FROM `users` WHERE `Email` = '$emails'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
      
      
     /* Get USers By Google Email */
     public function GetUsersByGoogle($googlemail) {
        $t = "SELECT * FROM `users` WHERE `Email` = '$googlemail'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
     
     
     /* Get USers */
     public function GetUsers() {
        $t = "SELECT * FROM `users` ORDER BY `id` DESC";
        $sqlquery = $this->query($t);
         return $sqlquery;
      } 
      
      /* Get USers */
     public function GetAdminUsers() {
        $t = "SELECT * FROM `admin` WHERE `role` != ''";
        $sqlquery = $this->query($t);
         return $sqlquery;
      }
      
        /* Get Reffeals */
     public function Refers() {
        $t = "SELECT * FROM `users` WHERE `ReferToken` != ''";
        $sqlquery = $this->query($t);
        //$user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
     
     /* Get USers By ID */
     public function GetUserById($userid) {
          $t = "SELECT * FROM `users` WHERE `id` = '$userid'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
      
      
      /* Get USers By User ID */
     public function GetUSerByUserId($viewuserid) {
        $t = "SELECT * FROM `users` WHERE `id` = '$viewuserid'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
      
      
      
      /* Get USers By Session ID */
     public function GetUsersById($user_id) {
        $t = "SELECT * FROM `users` WHERE `id` = '$user_id'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
      
      
      /* Get USers By Token */
     public function GetUsersByToken($gtoken) {
         $t = "SELECT * FROM `users` WHERE `Token` = '$gtoken'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
      
      
      
      /* Get USerid ID */
    public function GetUserrById($user_id) {
        $t = "SELECT * FROM `sell_your_service` WHERE `user_id` = '$user_id'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery); 
        return $user_data;
      }
      
      
      
       public function GetServicesByUserId($user_id) {
        $t = "SELECT * FROM `sell_your_service` WHERE `user_id` = '$user_id'";
        $sqlquery = $this->query($t);
         return $sqlquery;
      }
      
      
    public function GetRejectedServicesByUserId($user_id) {
         $t = "SELECT * FROM `sell_your_service` WHERE `status` = '4' AND `delete_service` = '' AND `post_status` = 1 AND `user_id` = '$user_id'";
        $sqlquery = $this->query($t);
         return $sqlquery;
      }
      
      
    public function GetRejectedjobsByUserId($user_id) {
        $t = "SELECT * FROM `CreateJob` WHERE `status` = '4' AND `delete_post` = '' AND `job_status` = 1  AND `user_id` = '$user_id'";
        $sqlquery = $this->query($t);
         return $sqlquery;
      }
     
       public function GetJobByUserId($user_id) {
        $t = "SELECT * FROM `CreateJob` WHERE `user_id` = '$user_id'";
        $sqlquery = $this->query($t);
         return $sqlquery;
      }
      
      
     
        /*Add User */
    public function Signup($email, $password, $activationcode, $refertokken,$userid) {
        $password = md5($password);
          $t = "INSERT INTO `users` SET `Email` = '$email', `Password` = '$password', `OTP` = '$activationcode', `ReferToken` = '$refertokken', `ReferalID` = '$userid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
         /* Refferals */
    public function Referall($userid,$refertokken) {
        $password = md5($password);
          $t = "INSERT INTO `Referrall` SET `Userid` = '$userid', `ReferToken` = '$refertokken'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
    public function EditProfiles($id, $bio, $qualification,$firstname,$icname,$email,$year,$profilepic, $phone, $skillss, $hobbie, $address) {
          $t = "UPDATE `users` SET `ProfileBio` = '$bio',`Qualifications`='$qualification',`ProfileName`='$firstname',`IC_name`='$icname', `Phone` = '$phone', `Email`='$email',`Year`='$year',`ProfilePic`='$profilepic', `Skills`='$skillss', `Hobbies`='$hobbie', `Address`='$address'  WHERE `id`='$id'";
         $sqlquery = $this->query($t);
        return $sqlquery;
      }
      
         /*Add User */
    public function Portfolio($id, $uniqueName) {
         $t = "INSERT INTO `UserPortfolio` SET `UserId` = '$id', `Photos` = '$uniqueName'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
     /* Get USers Portfolio By Session ID */
     public function  GetPortfolioByUserId($user_id) {
        $t = "SELECT * FROM `UserPortfolio` WHERE `UserId` = '$user_id'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      /* Get USers Portfolio By Session ID */
     public function  GetRefferalByUserId($user_id) {
        $t = "SELECT * FROM `users` WHERE `ReferalID` = '$user_id'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
        
      
    
               /* Delete Skills */
	 public function DeletePortfolioByUser($id) {
         $t = "DELETE FROM `UserPortfolio` WHERE `UserId`='$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }  
      
    
    public function ConfirmEmail($emailotp, $emails) {
         $t = "UPDATE `users` SET `Status` = 1 WHERE `Email` = '$emails' AND `OTP`='$emailotp'";
         $sqlquery = $this->query($t);
        return $sqlquery;
      }
      
      
    //   public function GetReferByUser($user_idss) {
    //      $t = "SELECT * FROM `users` WHERE `ReferToken` = '$user_idss'";
    //      $sqlquery = $this->query($t);
    //      return $sqlquery;
    //   }
      
      
    
      
      
      
      
    public function ProfileInfo($id,$name,$country, $skillss, $langauge,$govtid, $fullname, $icnumber, $date, $countrry,$contactnumber, $address,$ssm, $companyname, $personincharge,$usertype ) {
          $t = "UPDATE `users` SET `ProfileName` = '$name',`Country` = '$country',`Skills` = '$skillss', `Langauge` = '$ProfileInfo', `Phone` = '$contactnumber', `Address` = '$address', `Dob`='$date', `CompanyRegistrationCertificate`='$ssm', `CompanyName`='$companyname', `Person_incharge`='$personincharge',`UserType`='$usertype'  WHERE `id` = '$id'";
         $sqlquery = $this->query($t);
        return $sqlquery;
      }
    
    
         /* Add - Create Service */
    public function CreateService($id, $topic, $description, $postprice, $currency, $area,$state,$city, $how_fast, $preferedday, $image, $ads,$country,$random_id,$post_type) {
         $t = "INSERT INTO `sell_your_service` SET `user_id` = '$id', `topic` = '$topic', `description` = '$description', `price`= '$postprice', `price_type`='$currency',`area`='$area', `State`='$state',`City`='$city', `fast_complete`='$how_fast', `prefer_day`='$preferedday', `photos`='$image',`ads`='$ads',`country`='$country',`random_id`='$random_id',`post_type`='$post_type'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
          /* Edit - Create Service */
    public function EditService($serviceid,$userid, $topic, $description, $postprice, $currency, $area,$state,$city, $how_fast, $preferedday, $uniqueName, $ads,$country) {
         $t = "UPDATE `sell_your_service` SET `user_id` = '$userid', `topic` = '$topic', `description` = '$description', `price`= '$postprice', `price_type`='$currency',`area`='$area', `State`='$state',`City`='$city', `fast_complete`='$how_fast', `prefer_day`='$preferedday', `photos`='$uniqueName',`ads`='$ads',`country`='$country', `status` = '', `post_status` = '' WHERE `id`='$serviceid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
     /* Get Services */
     public function GetAllServices() {
        $t = "SELECT * FROM `sell_your_service` WHERE `status` = 1 AND `delete_service` = '' AND `post_status` = 1 ";
        $sqlquery = $this->query($t);
        return $sqlquery;
      } 
      
        /* Get All Waititng Posts */
     public function GetAllWaitingPosts($user_id) {
        $t = "SELECT * FROM CreateJob WHERE user_id = '$user_id' AND `status` = '' AND `delete_post` = '' AND `job_status` = 1  UNION SELECT * FROM sell_your_service WHERE user_id = '$user_id' AND `status` = '' AND `delete_service` = '' AND `post_status` = 1  ORDER BY status";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }
      
      /* Get All Active Posts */
     public function GetAllActicePosts($user_id) {
        $t = "SELECT * FROM CreateJob WHERE user_id = '$user_id' AND `status` = 1 AND `delete_post` = '' AND `job_status` = 1  UNION SELECT * FROM sell_your_service WHERE user_id = '$user_id' AND `status` = 1 AND `delete_service` = '' AND `post_status` = 1  ORDER BY status";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }
      
         /* Get All Inactive Posts */
     public function GetAllIncticePosts($user_id) {
        $t = "SELECT * FROM CreateJob WHERE user_id = '$user_id' AND `status` = '2' AND `delete_post` = '' AND `job_status` = 1  UNION SELECT * FROM sell_your_service WHERE user_id = '$user_id' AND `status` = '2' AND `delete_service` = '' AND `post_status` = 1  ORDER BY status";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }
      
      
        /* Get All Inactive Posts */
     public function GetAllCompletedPosts($user_id) {
        $t = "SELECT * FROM CreateJob WHERE user_id = '$user_id' AND `status` = '3' AND `delete_post` = '' AND `job_status` = 1  UNION SELECT * FROM sell_your_service WHERE user_id = '$user_id' AND `status` = '3' AND `delete_service` = '' AND `post_status` = 1  ORDER BY status";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }
      
      
        /* Get All Inactive Posts */
     public function GetAllRejectedPosts($user_id) {
        $t = "SELECT * FROM CreateJob WHERE user_id = '$user_id' AND `status` = '4' AND `delete_post` = '' AND `job_status` = 1  UNION SELECT * FROM sell_your_service WHERE user_id = '$user_id' AND `status` = '4' AND `delete_service` = '' AND `post_status` = 1  ORDER BY status";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }
      
         /* Get Services */
     public function GetAllPostsByUserId($user_id) {
           $t = "SELECT * FROM CreateJob WHERE user_id = '$user_id' AND `delete_post` = '' AND `job_status` = 1  UNION SELECT * FROM sell_your_service WHERE user_id = '$user_id' AND `delete_service` = '' AND `post_status` = 1  ORDER BY status";
         //   $t = "SELECT `sell_your_service`.*, `CreateJob`.* FROM `sell_your_service`, `CreateJob` WHERE `CreateJob`.`user_id` = '$user_id' AND `CreateJob`.`delete_post` = '' AND `job_status` = 1  ORDER BY `CreateJob`.`status`";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }
      
          /* Get Services */
     public function GetServiceFilterData($user_id) {
         $t = "SELECT * FROM `sell_your_service`  WHERE `user_id` = '$user_id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }

          /* Get Services By Id*/
     public function GetServceById($id) {
         $t = "SELECT * FROM `sell_your_service`  WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
      
      
      /* Get Job By Topic */
     public function GetAllJobByUser($user_id) {
        $t = "SELECT * FROM `CreateJob` WHERE `user_id` = '$user_id' AND `delete_post` = '' AND `job_status` = 1  ORDER BY `status`";
        $sqlquery = $this->query($t);
         return $sqlquery;
      }
      
	      /* Get Active Jobs By User */
     public function GetActiveServiceByUserId($user_id) {
          $t = "SELECT * FROM `sell_your_service` WHERE `status` = 1  AND `delete_service` = '' AND `post_status` = 1  AND `user_id` = '$user_id'";
         $sqlquery = $this->query($t);
        return $sqlquery;
      } 
	  
	   /* Get Services By User */
     public function GetServiceByUserId($user_id) {
           $t = "SELECT * FROM `sell_your_service` WHERE `user_id` = '$user_id' AND `delete_service` = '' AND `post_status` = 1  ORDER BY `status`";
         $sqlquery = $this->query($t);
        return $sqlquery;
      } 
      
          /* Get Active Jobs By User */
     public function GetCompleteServicesByUserId($user_id) {
          $t = "SELECT * FROM `sell_your_service` WHERE `status` = 3 AND `delete_service` = '' AND `post_status` = 1  AND `user_id` = '$user_id'";
         $sqlquery = $this->query($t);
        return $sqlquery;
      }
       
        /* Get Active Jobs By User */
     public function GetActiveJobByUserId($user_id) {
          $t = "SELECT * FROM `CreateJob` WHERE `status` = 1 AND `delete_post` = '' AND `job_status` = 1  AND `user_id` = '$user_id'";
         $sqlquery = $this->query($t);
        return $sqlquery;
      } 
      
        /* Get Active Jobs By User */
     public function GetCompletedJobsByUserId($user_id) {
          $t = "SELECT * FROM `CreateJob` WHERE `status` = 3 AND `delete_post` = '' AND `job_status` = 1  AND `user_id` = '$user_id'";
         $sqlquery = $this->query($t);
        return $sqlquery;
      }
      
 	  /* Get Pending Services By User */
     public function GetPendingServiceByUserId($user_id) {
        $t = "SELECT * FROM `sell_your_service` WHERE `status` = '' AND `delete_service` = '' AND `post_status` = 1  AND `user_id` = '$user_id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
      } 
	  
	  /* Get Inactive Services By User */
     public function GetInactiveServiceByUserId($user_id) {
        $t = "SELECT * FROM `sell_your_service` WHERE `status` = 2 AND `delete_service` = '' AND `post_status` = 1  AND `user_id` = '$user_id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
      } 
	  
	   /* Get Services */
     public function GetAllServicesInadmin() {
        $t = "SELECT * FROM `sell_your_service`";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }
      

       /* Get USers By Session ID */
     public function GetServiceById($serviceid) {
          $t = "SELECT * FROM `sell_your_service` WHERE `id` = '$serviceid'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
      
        /* Get USers By Session ID */
     public function  GetServiceByPostId($postid) {
        $t = "SELECT * FROM `sell_your_service` WHERE `id` = '$postid'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
      
        /* Get Service By Name */
     public function  GetServiceByName($service) {
         $t = "SELECT * FROM `sell_your_service` WHERE `topic` = '$service'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
      

      /* Get Data by Area */
     public function  GetServiceDataByArea($area,$orderby) {
         $t = "SELECT * FROM `sell_your_service` WHERE `area` = '$area' AND `delete_service` = '' AND `post_status` = 1  AND `status` = 1 ORDER BY $orderby";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
       /* Get Data by Area */
     public function  GetServiceWorlwide($orderby) {
         $t = "SELECT * FROM `sell_your_service` WHERE `status` = 1 ORDER BY $orderby";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
       
       public function GetServiceDataByLocalArea($area,$yourcountry,$orderby) {
         $t = "SELECT * FROM `sell_your_service` WHERE `area` = '$area' AND `country`='$yourcountry' AND `status` = 1 ORDER BY $orderby";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      
       /* Get Latest Services */
     public function  GetLatestService() {
        $t = "SELECT * FROM `sell_your_service` WHERE `Status` = 1 ORDER BY `id` DESC";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      
       /* Get Search Services */
     public function  GetServiceSearch($searchservice) {
        $t = "SELECT * FROM `sell_your_service`  WHERE topic LIKE '%$searchservice%' OR description LIKE '%$searchservice%' AND `status` = 1";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
         /* Get Search Services */
     public function SearchDataValues($searchvalue) {
        $t = "SELECT * FROM `sell_your_service`  WHERE topic = '$searchvalue'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      
              /* Get Search Jobs */
     public function SearchJobs($searchjobs) {
        $t = "SELECT * FROM `CreateJob`  WHERE topic = '$searchjobs'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      
             /* Get Search Skills */
     public function SearchSkills($searchSkills) {
        $t = "SELECT * FROM `Skills` WHERE `Skills` = '$searchSkills'"; 
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      

             /* Get Search Skills */
     public function AdvanceSkillSearch($arrays) {
       echo $t = "SELECT DISTINCT(`Post_id`) FROM `Skills` WHERE `Skills` IN('".$arrays."') GROUP BY `Skills` DESC";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      
       public function AdvanceIntrestSearch($arrays) {
         $t = "SELECT DISTINCT(`user_id`) FROM `Interest` WHERE `Interest` IN('".$arrays."') GROUP BY `Interest` DESC";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      

             /* Get Search Hobbies */
     public function SearchIntrest($searchIntrest) {
        $t = "SELECT * FROM `Interest`  WHERE Interest LIKE '%$searchIntrest%'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
    //   DISTINCT(`Skills`)
       public function SearchMoreSkills($searchskils, $addskils) {
        $t = "SELECT  FROM `Skills`  WHERE Skills LIKE '%$searchskils%' OR Skills LIKE '%$addskils%' ";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
     
        /* Delete Skills */
	 public function DeleteSkills($userid) {
        $t = "DELETE FROM `Skills` WHERE `Post_id`='$userid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }  
      
       /* Delete Interest */
	 public function DeleteInterest($userid) {
        $t = "DELETE FROM `Interest` WHERE `user_id`='$userid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }  
      
      
      

         /* VerifyDetails */
    public function VerifyDetails($id,$govtid, $fullname, $icnumber, $date, $countrry,$contactnumber, $address,$ssm, $companyname, $personincharge,$usertype)
     {
          $t = "INSERT INTO `VerifyAccount` SET `UserId` = '$id', `Govt_IC` = '$govtid', `FullName` = '$fullname', `IC_number`= '$icnumber', `DOB`='$date', `Country`='$countrry', `Address` = '$address', `CompanyRegistrationCertificate`='$ssm', `CompanyName`='$companyname', `Person_incharge`='$personincharge',`UserType`='$usertype'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    } 
    
             /* Get Search Hobbies */
     public function GetVerifyAccount($user_id) {
        $t = "SELECT * FROM `VerifyAccount`  WHERE UserId = '$user_id'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }

    public function BankDetails($id, $bankname, $account_no, $country)
     {
          $t = "INSERT INTO `BankDetails` SET `UserId` = '$id', `BankName` = '$bankname', `AccountNumber` = '$account_no', `Country`= '$country'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
     public function UpdateBankDetails($id, $name, $bankname, $account_no,$banklogo)
     {
        $t = "UPDATE `BankDetails` SET `Name`= '$name', `BankName` = '$bankname', `AccountNumber` = '$account_no', `Logo`='$banklogo' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
     public function  GetBankDetails() {
        $t = "SELECT * FROM `BankDetails` ";
        $sqlquery = $this->query($t);
         return $sqlquery;
      }
      
      public function GetBankDetailById() {
        $t = "SELECT * FROM `BankDetails` WHERE `id`='1'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
         return $user_data;
      }
      
      
      public function GetBankDetailsByUserId($user_id) {
        $t = "SELECT * FROM `BankDetails` WHERE `UserId`='$user_id'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
         return $user_data;
      }
    
     /* Delete Bank */
	 public function DeleteBankDetail($id) {
        $t = "DELETE FROM `BankDetails` WHERE `id`='$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }  
    
	 /* Approved */
    
      public function Approve($id) {
        $t = "UPDATE `sell_your_service` SET `status` = '2' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    }
	
	/* Reject */
    
      public function Reject($id) {
        $t = "UPDATE `sell_your_service` SET `status` = '1' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }  
    
    public function ServiceApprovalRequest($PostId, $TotalAmount) {
         $t = "UPDATE `sell_your_service` SET `price` = '$TotalAmount' , `post_status` = 1 WHERE `id` = '$PostId'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
    
   
    
    
    
    
    /* Ads Approved */
    
      public function AdsApprove($id) {
        $t = "UPDATE `sell_your_service` SET `ads` = 'No' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    }
	
	/* Ads Reject */
    
      public function AdsReject($id) {
        $t = "UPDATE `sell_your_service` SET `ads` = 'Yes' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
	
	
	public function GetServiceByAds() {
        $t = "SELECT * FROM `sell_your_service` WHERE `ads`='Yes' AND `status` = 1";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    }
    
    
    
    
	    /*Add - Create Job */
    public function CreateJob($id, $topic, $description, $price, $currency, $area,$state,$city, $how_fast, $image, $country,$random_id,$post_type) {
          $t = "INSERT INTO `CreateJob` SET `user_id` = '$id', `topic` = '$topic', `description` = '$description', `price`= '$price', `price_type`='$currency',`area`='$area', `State`='$state',`City`='$city', `fast_complete`='$how_fast',`photos`='$image',  `country`='$country',`random_id`='$random_id',`post_type`='$post_type'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
        /*Edit - Create Job */
    public function EditJob($postid,$userid, $topic, $description, $price, $currency, $area,$state,$city, $how_fast, $uniqueName, $country) {
        $t = "UPDATE `CreateJob` SET `user_id` = '$userid', `topic` = '$topic', `description` = '$description', `price`= '$price', `price_type`='$currency',`area`='$area', `State`='$state',`City`='$city', `fast_complete`='$how_fast',`photos`='$uniqueName',`country`='$country', `status` = '', `job_status` = '' WHERE `id` = '$postid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
     public function JobApprovalRequest($JobId, $TotalAmount) {
         $t = "UPDATE `CreateJob` SET `price` = '$TotalAmount' , `job_status` = 1 WHERE `id` = '$JobId'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
        public function JobCompleted($post_id) {
         $t = "UPDATE `CreateJob` SET `completed` = 'Yes' , `job_status` = 6 WHERE `id` = '$post_id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
    /* Get Search Job */
     public function GetJobSearch($searchjob) { 
        $t = "SELECT * FROM `CreateJob` WHERE topic LIKE '%$searchjob%' OR description LIKE '%$searchjob%' AND `status` = 1";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      
      /* Get Search Job */
     public function GetSkillsSearch($searchskill) {
         $t = "SELECT * FROM `users` WHERE Skills LIKE '%$searchskill%' AND `Status` = 1";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      
      
    /* Get Services */
     public function GetAllJobs() {
        $t = "SELECT * FROM `CreateJob` WHERE `status` = 1";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }
    
     /* Get Inactive Services By User */
     public function GetInactiveJobByUserId($user_id) {
        $t = "SELECT * FROM `CreateJob` WHERE `status` = 2 AND `user_id` = '$user_id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
      } 
      
      
       /* Get Pending jobs By User */
     public function GetPendingJobByUserId($user_id) {
         $t = "SELECT * FROM `CreateJob` WHERE `status` = '' AND `user_id` = '$user_id' AND `job_status` = 1";
        $sqlquery = $this->query($t);
        return $sqlquery;
      } 
      
	  
	   /* Get Services */
     public function GetAllJobadmin() {
        $t = "SELECT * FROM `CreateJob` ORDER BY `id` DESC";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }
      
         /* Ads Job Approved */
    
      public function JobAdsApprove($id) {
        $t = "UPDATE `CreateJob` SET `ads` = 'No' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    }
	
	/* Ads Job Reject */
    
      public function JobadsRejected($id) {
        $t = "UPDATE `CreateJob` SET `ads` = 'Yes' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
      
       /* Get USers By Session ID */
     public function  GetJobById($jobid) {
        $t = "SELECT * FROM `CreateJob` WHERE `id` = '$jobid'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      } 
      
   
      
         /* Get USers By Session ID */
     public function  GetJobByPostId($postid) {
        $t = "SELECT * FROM `CreateJob` WHERE `id` = '$postid'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
      
        /* Get Job By Topic */
     public function GetJobByTopic($job) {
        $t = "SELECT * FROM `CreateJob` WHERE `topic` = '$job'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
	  
	 
	  
	  
	  public function GetJobsByAds() {
        $t = "SELECT * FROM `CreateJob` WHERE `ads`='Yes' AND `Status` = 1";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    }
    
    
    
	/* Approved */
    
      public function ApprovedJob($id) {
         $t = "UPDATE `CreateJob` SET `Status` = '2' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    }  
	
	/* Reject */ 
    
      public function RejectedJob($id) {
         $t = "UPDATE `CreateJob` SET `Status` = '1' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
	
	
	 /* Get Data by Area */
     public function  GetJobDataByArea($area,$orderby) {
         $t = "SELECT * FROM `CreateJob` WHERE `area` = '$area' AND `Status` = 1  ORDER BY $orderby";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      
       /* Get Data by Area Worldwide */
     public function GetJobWorlwide($orderby) {
        $t = "SELECT * FROM `CreateJob` WHERE `Status` = 1  ORDER BY $orderby";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      
      
      
       /* Get Data by Area */
     public function  GetJobDataByLocalArea($area, $yourcountry,$orderby) {
         $t = "SELECT * FROM `CreateJob` WHERE `area` = '$area' AND `country`='$yourcountry' AND `Status` = 1  ORDER BY $orderby";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      
      /* Get Latest JObs */
     public function  GetLatestJobs() {
        $t = "SELECT * FROM `CreateJob` WHERE `Status` = 1 ORDER BY `id` DESC";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      
      
	
	/* Addons */
    
      public function Addons($id, $val, $vals, $topic) {
        $t = "INSERT INTO `ServiceAddons` SET `UserId` = '$id', `AddonName` = '$val', `AddonPrice` = '$vals', `Topic` = '$topic'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
       
      public function GetAddonsByTopic($service) {
          $t = "SELECT * FROM `ServiceAddons` WHERE `Topic` = '$service'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
     public function GetSumAddonsByTopic($service) {
          $t = "SELECT SUM(`AddonPrice`) AS `addontotal` FROM `ServiceAddons` WHERE `Topic` = '$service'";
        $sqlquery = $this->query($t);
       $user_data = $this->fetch_array($sqlquery);
        return $user_data;
    }
	
   /* all User Block */
    
      public function UserBlock($id) {
        $t = "UPDATE `users` SET `Status` = '0' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    /* all User Un- Block */
    
      public function UserUnblock($id) {
        $t = "UPDATE `users` SET `Status` = '1' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
    /* UserApprove */
    
      public function UserUnApprove($id) {
        $t = "UPDATE `users` SET `Approval` = '0' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    /* all User Un- Block */
    
      public function UserApprove($id) {
        $t = "UPDATE `users` SET `Approval` = '1' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
    
    /* all User Block */
    
      public function AdminUserBlock($id) {
          $t = "UPDATE `admin` SET `Status` = '0' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    /* all User Un- Block */
    
      public function AdminUserUnblock($id) {
        $t = "UPDATE `admin` SET `Status` = '1' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
     
    /* Get Like / Dislike by user */
     public function GetLikeDislikeByUser($user_id, $postid) {
      $t = "SELECT * FROM `likedislike` WHERE `userid` = '$user_id' AND `postid` = '$postid'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
    
    /* Like Post */
     public function LikePost($status, $userid, $postid) {
         $t = "INSERT INTO `likedislike` SET `status` = '$status',`userid` = '$userid',`postid` = '$postid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    /* Like Post */
     public function DislikePost($status, $userid, $postid) { 
         $t = "UPDATE `likedislike` SET `status` = '$status' WHERE `postid` = '$postid' AND `userid` = '$userid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
     /* Update DisLike Post */
     public function UpdatelikePost($status, $userid, $postid) { 
         $t = "UPDATE `likedislike` SET `status` = '$status' WHERE `postid` = '$postid' AND `userid` = '$userid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
    function myUrlEncode($val) {
    $entities = array('%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D','-');
    $replacements = array('!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]"," ");
    return str_replace($entities, $replacements, urlencode($val));
    }
    /* Search result */
    public function Search($keyword, $location, $area, $level, $jobcompletion, $rating, $minprice, $maxprice) {
         $t = "SELECT * FROM `sell_your_service` WHERE 
        `topic` LIKE '%$keyword%' OR 
        `description` LIKE '%$keyword%' OR
         `area` LIKE '%$area%' OR
        `topic` LIKE '%$jobcompletion%' OR
        `price` LIKE '%$minprice%' OR
        `price` LIKE '%$maxprice%'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }

// get user current location 

public function getIpAddress()
    {
        $ipAddress = '';
        if (! empty($_SERVER['HTTP_CLIENT_IP']) && $this->isValidIpAddress($_SERVER['HTTP_CLIENT_IP'])) {
            // check for shared ISP IP
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        } else if (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // check for IPs passing through proxy servers
            // check if multiple IP addresses are set and take the first one
            $ipAddressList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($ipAddressList as $ip) {
                if ($this->isValidIpAddress($ip)) {
                    $ipAddress = $ip;
                    break;
                }
            }
        } else if (! empty($_SERVER['HTTP_X_FORWARDED']) && $this->isValidIpAddress($_SERVER['HTTP_X_FORWARDED'])) {
            $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
        } else if (! empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && $this->isValidIpAddress($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
            $ipAddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        } else if (! empty($_SERVER['HTTP_FORWARDED_FOR']) && $this->isValidIpAddress($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } else if (! empty($_SERVER['HTTP_FORWARDED']) && $this->isValidIpAddress($_SERVER['HTTP_FORWARDED'])) {
            $ipAddress = $_SERVER['HTTP_FORWARDED'];
        } else if (! empty($_SERVER['REMOTE_ADDR']) && $this->isValidIpAddress($_SERVER['REMOTE_ADDR'])) {
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        }
        return $ipAddress;
    }

    public function isValidIpAddress($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_IPV6 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
            return false;
        }
        return true;
    }

    public function getLocation($ip)
    {
        $ch = curl_init('http://ipwhois.app/json/' . $ip);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        // Decode JSON response
        $ipWhoIsResponse = json_decode($json, true);
        // Country code output, field "country_code"
        return $ipWhoIsResponse;
    }
    
     /* Google Sign up */
     public function GoogleUserSignup($googlemail, $gogoletoken, $ProfileName, $ProfilePic) {
        $t = "INSERT INTO `users` SET `Email` = '$googlemail',`Token` = '$gogoletoken',`ProfileName` = '$ProfileName',`ProfilePic` = '$ProfilePic'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    /* Add Skills */
     public function AddSkills($userid, $skillsval) {
        $t = "INSERT INTO `Skills` SET `Post_id`='$userid', `Skills` = '$skillsval'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
     /* Add Intrest */
     public function AddIntrest($userid, $intrests) {
        $t = "INSERT INTO `Interest` SET `user_id`='$userid', `Interest` = '$intrests'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
    
    /* Get Skills by User ID */
     public function GetSkillsByUserId($user_id) {
      $t = "SELECT DISTINCT(`Skills`) FROM `Skills` WHERE `Post_id` = '$user_id'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      /* Get Interest By User ID */
     public function GetIntrestByUserId($user_id) {
      $t = "SELECT DISTINCT(`Interest`) FROM `Interest` WHERE `user_id` = '$user_id'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
    
    
    
    
    public static function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}




function getCreditedBalance($user_id){
    $t="SELECT SUM(amount) as credit FROM Transaction WHERE to_user_id = '$user_id' AND status = 2";
    $sqlquery = $this->query($t);
    $user_data = $this->fetch_array($sqlquery);
    return $user_data;
}

function getCreditedBalanceByUser($user_id){
    $t="SELECT SUM(amount) as credit FROM Transaction WHERE to_user_id = '$user_id' AND status = 2";
    $sqlquery = $this->query($t);
    $user_data = $this->fetch_array($sqlquery);
    return $user_data;
}


//for knowing the debited balance of user
function getDebitedBalance($user_id){
  
    $t="SELECT SUM(amount) as debit FROM Transaction WHERE from_user_id=$user_id";
    $sqlquery = $this->query($t);
    $user_data = $this->fetch_array($sqlquery);
    return $user_data;
}
function getTransHistory($user_id){
    $t="SELECT * FROM Transaction WHERE `from_user_id` = '$user_id' || `to_user_id` = '$user_id' AND `status` = 2 ORDER BY ID DESC";
    $sqlquery = $this->query($t);
    // $user_data = $this->fetch_array($sqlquery);
    return $sqlquery;
}

function getTransHistoryAll(){
    $t="SELECT * FROM Transaction ORDER BY id DESC";
    $sqlquery = $this->query($t);
    // $user_data = $this->fetch_array($sqlquery);
    return $sqlquery;
}



public function getRows($conditions = array()){ 
        $sql = 'SELECT '; 
        $sql .= array_key_exists("select",$conditions)?$conditions['select']:'*'; 
        $sql .= ' FROM sell_your_service'; 
        if(array_key_exists("where",$conditions)){ 
            $sql .= ' WHERE '; 
            $i = 0; 
            foreach($conditions['where'] as $key => $value){ 
                $pre = ($i > 0)?' AND ':''; 
                $sql .= $pre.$key." = '".$value."'"; 
                $i++; 
            } 
        } 
         
        if(array_key_exists("search",$conditions)){ 
            $sql .= (strpos($sql, 'WHERE') !== false)?' AND ':' WHERE '; 
            $i = 0; 
            $sql_src = ''; 
            foreach($conditions['search'] as $key => $value){ 
                $pre = ($i > 0)?' OR ':''; 
                $sql_src .= $pre.$key." LIKE '%".$value."%'"; 
                $i++; 
            } 
             
            $sql .= !empty($sql_src)?' ('.$sql_src.') ':''; 
        } 
         
        if(array_key_exists("order_by",$conditions)){ 
            $sql .= ' ORDER BY '.$conditions['order_by'];  
        }else{ 
            $sql .= ' ORDER BY id DESC ';  
        } 
         
        if(array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){ 
            $sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit'];  
        }elseif(!array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){ 
            $sql .= ' LIMIT '.$conditions['limit'];  
        } 
         
        $result = $this->con->query($sql); 
         
        if(array_key_exists("return_type",$conditions) && $conditions['return_type'] != 'all'){ 
            switch($conditions['return_type']){ 
                case 'count': 
                    $data = $result->num_rows; 
                    break; 
                case 'single': 
                    $data = $result->fetch_assoc(); 
                    break; 
                default: 
                    $data = ''; 
            } 
        }else{ 
            if($result->num_rows > 0){ 
                while($row = $result->fetch_assoc()){ 
                    $data[] = $row; 
                } 
            } 
        } 
        return !empty($data)?$data:false; 
    } 
   
   
   
    /* Top Up Wallet */
     public function TopUpWallet($userid,$amount,$bill_email,$orderid) {
        $t = "INSERT INTO `Transaction` SET `to_user_id`='$userid', `amount` = '$amount', `email` = '$bill_email', `orderid` = '$orderid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
     /* Top Up Wallet */
     public function TopWalletUp($userid,$amount,$email) {
        $t = "INSERT INTO `Transaction` SET `to_user_id`='$userid', `amount` = '$amount', `email` = '$email', `status`='2',`payment_for`='bankin'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
    
    /* Update Top Up Wallet */
     public function UpdateTopUpWalletStatus($orderid) {
        $t = "UPDATE `Transaction` SET `status`= 2 WHERE `orderid` = '$orderid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
     
    
    /* Update Top Up Wallet */
     public function ReserveAmount($user_id,$totalprice,$post_id,$type) {
         $t = "INSERT INTO `Transaction` SET `from_user_id`='$user_id',`to_user_id`='rsrv', `amount` = '$totalprice',`status`= 4, `postid`='$post_id',`payment_for`='$type'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
      /* Fund Payment */
     public function FundPayment($userid,$amount,$payment_for,$postid,$reciever,$planid,$cp_checked) {
        $t = "INSERT INTO `Transaction` SET `from_user_id`='$userid', `amount` = '$amount', `payment_for` = '$payment_for', `to_user_id` = 'rsrv', `postid` = '$postid',`actual_amount` = '$amount',`m_id`='$planid',`points` = '$cp_checked',`status` = 4";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }  
      
    
    /* Update Up Wallet */
     public function UpdateReserveAmount($postid,$payment_for,$withdawal_amount,$planid) {
        $t = "UPDATE `Transaction` SET `amount` = (amount - '$withdawal_amount')  WHERE `postid` = '$postid' AND `payment_for` = '$payment_for' AND `status` = 4 AND `m_id`='$planid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
     
    
    // Get user by OrderID
      public function GetUserByOrderId($orderid) {
        $t = "SELECT * FROM `Transaction` WHERE `orderid` ='$orderid'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
         return $user_data;
    } 
    
    
    // Get user by OrderID
      public function GetPaymentPlanByMId($m_id) {
          $t = "SELECT * FROM `PaymentPlan` WHERE `id` ='$m_id'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
         return $user_data;
    } 
    
    
    /* Withdrawal */
     public function Withdrawal($userid,$withdawal_amount,$payment_for,$postid) {
        $t = "INSERT INTO `Transaction` SET `from_user_id`='$userid', `amount` = '$withdawal_amount', `payment_for` = '$payment_for', `postid` = '$postid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
     /* Withdrawal */
     public function MakePayment($userid,$withdawal_amount,$payment_for,$postid,$reciever) {
        $t = "INSERT INTO `Transaction` SET `from_user_id`='$userid', `amount` = '$withdawal_amount', `payment_for` = '$payment_for', `to_user_id` = '$reciever', `postid` = '$postid',`status` = 2";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }  
      
       
      
     
      
      /* Sponsor Job */
     public function SponsorJob($userid,$withdawal_amount,$payment_for,$postid) {
         
        $t = "INSERT INTO `SponsorPost` SET `postid` ='$postid', `plan`='$withdawal_amount', `userid`='$userid', `post_type`='$payment_for',`status`='Yes'";
        // $t = "UPDATE `SponsorPost` SET `ads`='Yes'  WHERE `id` = '$postid' AND `user_id` = '$userid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
     public function GetSponsorData($postid) {
        $t = "SELECT * FROM `SponsorPost` WHERE `postid`='$postid'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
    }
    
    
     public function GetAllSponsorData($postid) {
         
          $t = "SELECT * FROM `SponsorPost` WHERE `postid`='$postid'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
    }
    
    
    
    
     /* Sponsor Service */
     public function UpdateSponsorJob($userid,$postid) {
        $t = "UPDATE `CreateJob` SET `ads`='Yes'  WHERE `id` = '$postid' AND `user_id` = '$userid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
     /* Sponsor Service */
    public function UpdateSponsorService($userid,$postid) {
        $t = "UPDATE `sell_your_service` SET `ads`='Yes'  WHERE `id` = '$postid' AND `user_id` = '$userid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
    
    
    /* Send Interview Notification */
    public function SendMessage($sendby,$sendto,$comment,$posttype,$postid,$message_type, $attachment){
        $t = "INSERT INTO `Message` SET `from_user`='$sendby', `to_user` = '$sendto', `message` = '$comment', `status` = 1, `popped` = 1, `post_type` = '$posttype',`post_id`='$postid',`message_type`='$message_type',`image`='$attachment'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
     /* Send Interview Notification */
    public function SendMessageFromAdmin($sendby,$sendto,$comment,$posttype,$postid,$message_type){
        $t = "INSERT INTO `Message` SET `from_user`='$sendby', `to_user` = '$sendto', `message` = '$comment', `status` = 1, `popped` = 1, `post_type` = '$posttype',`post_id`='$postid',`message_type`='$message_type'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
    
     /* Send Interview Notification */
    public function SendPaymentReleaseMessage($sendby,$sendto,$comment,$posttype,$postid,$planid,$message_type){
        $t = "INSERT INTO `Message` SET `from_user`='$sendby', `to_user` = '$sendto', `message` = '$comment', `status` = 1, `popped` = 1, `post_type` = '$posttype',`post_id`='$postid',`type` = '$planid',`message_type` = '$message_type'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
    
    
    
     /* Send Interview Notification */
    public function SendInvitationMessage($sendby,$sendto,$comment,$posttype){
         $t = "INSERT INTO `InvitationMessage` SET `from_user`='$sendby', `to_user` = '$sendto', `message` = '$comment', `status` = 1, `popped` = 1, `post_type` = '$posttype'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
    
       /* Send Interview Notification */
    public function InviteForInterview($sendby,$sendto,$comment){
        $t = "INSERT INTO `Message` SET `from_user`='$sendby', `to_user` = '$sendto', `message` = '$comment', `status` = 1, `popped` = 1, `post_type` = 'direct'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
     /* Send Interview Notification */
    public function InviteForJob($sendby,$sendto,$comment,$job_id){
        $t = "INSERT INTO `Message` SET `from_user`='$sendby', `to_user` = '$sendto', `message` = '$comment', `status` = 1, `popped` = 1, `post_type` = 'job', `post_id` = '$job_id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
      
    //     /* Update Status */
    
    public function UpdateStatus($userid) {
        $t = "UPDATE `Message` SET `status` = '0' WHERE `to_user` = '$userid'";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    } 
    
    
    public function UpdateMessageViewed($msgid) {
        $t = "UPDATE `Message` SET `popped` = '2' WHERE `id` = '$msgid'";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    } 
    
    
    
    
      
      /* Get Message By Order*/
    public function GetMessageByOrder($userid) {
        $t = "SELECT * FROM `Message` WHERE `to_user` = '$userid' ORDER BY `id` DESC";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }  
      
      
      
         
      /* Get Message By Order*/
    public function GetMessageByUserIdAndPostId($uid,$post_id) {
        $t = "SELECT DISTINCT(`from_user`) as `fromuser` FROM `Message` WHERE `to_user` = '$uid' AND `post_type` = 'service' AND `post_id` = '$post_id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }  
      
      
      
      
      
         /* Get Message By Order*/
    public function GetInvitationMessageByOrder($userid) {
        $t = "SELECT * FROM `InvitationMessage` WHERE `to_user` = '$userid' ORDER BY `id` DESC";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }  
      
      /* Get Message By Order*/
    public function GetInvitationMessagePopped($userid) {
        $t = "SELECT * FROM `Invitation` WHERE `popped` = '1' AND `to_user` = '$userid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }  
      
      
      
      /* Get Message By Order*/ 
    public function GetMessagePopped($userid) {
        $t = "SELECT * FROM `Message` WHERE `popped` = '1' AND `to_user` = '$userid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }  
       
       
    public function GetUserChatJob($reciever,$sender,$post_id,$post_type) {
        $t = "SELECT * FROM `Message` WHERE `to_user`= '$reciever' AND `from_user` = '$sender' OR `to_user`= '$sender' AND `from_user` = '$reciever' AND `post_id` = '$post_id' AND `post_type` = '$post_type'";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }  
      
        public function GetUserNAdminChat($reciever,$sender,$post_id,$post_type) {
        $t = "SELECT * FROM `Message` WHERE (`to_user`= '$reciever' AND `from_user` = '$sender') OR (`to_user`= '$sender' AND `from_user` = '$reciever') AND `post_id` = '$post_id' AND `post_type` = '$post_type'";
        // $t = "SELECT * FROM `Message` WHERE `to_user`= '$reciever' AND `from_user` = '$sender' OR `to_user`= '$sender' AND `from_user` = '$reciever' AND `post_id` = '$post_id' AND `post_type` = '$post_type' AND `message_type` = 'adminchat'";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }  
      
         public function GetOneToOneChat($reciever,$sender,$post_id,$post_type) {
          $t = "SELECT * FROM `Message` WHERE ((`to_user` = '$reciever' AND `from_user` = '$sender') OR (`to_user` = '$sender' AND `from_user` = '$reciever')) AND `post_id` = '$post_id' AND `post_type` = '$post_type';";
        //   $t = "SELECT * FROM `Message` WHERE (`to_user`= '$reciever' AND `from_user` = '$sender') OR (`to_user`= '$sender' AND `from_user` = '$reciever') AND `post_id` = '$post_id' AND `post_type` = '$post_type'";
        // $t = "SELECT * FROM `Message` WHERE `to_user`= '$reciever' AND `from_user` = '$sender' OR `to_user`= '$sender' AND `from_user` = '$reciever' AND `post_id` = '$post_id' AND `post_type` = '$post_type' AND `message_type` = 'adminchat'";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }  
      
      
      
       public function GetUserChatOneByOne($reciever,$sender) {
        $t = "SELECT * FROM `Message` WHERE ((`to_user`= '$reciever' AND `from_user` = '$sender') OR (`to_user`= '$sender' AND `from_user` = '$reciever'))";
        $sqlquery = $this->query($t);
        return $sqlquery;
      } 
      
      
      public function GetUserChat($reciever,$sender,$post_id,$post_type) {
        $t = "SELECT * FROM `Message` WHERE ((`to_user`= '$reciever' AND `from_user` = '$sender') OR (`to_user`= '$sender' AND `from_user` = '$reciever')) AND `post_type` = '$post_type' AND `post_id` = '$post_id' ORDER BY `id` ASC";
        $sqlquery = $this->query($t);
        return $sqlquery;
      } 
      
      
      
      public function GetUserChatService($reciever,$sender,$post_id,$post_type) {
          $t = "SELECT * FROM `Message` WHERE (`to_user`= '$reciever' AND `from_user` = '$sender') OR (`to_user`= '$sender' AND `from_user` = '$reciever') AND `post_id` = '$post_id' AND `post_type` = '$post_type";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }  
      
       
      
      
       /* Get Message By Order*/
    public function GetMessageByUser($userid) {
        $t = "SELECT DISTINCT `from_user`,`post_type`,`to_user`  FROM `Message` WHERE `to_user` = '$userid' ORDER BY `from_user` DESC";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }  
      
         /* Get Message By Order*/
    public function GetMessageByOnetoOneUser($userid) {
          $t = "SELECT DISTINCT `from_user`,`post_type`,`to_user`  FROM `Message` WHERE (`to_user` = '$userid' AND `post_type` = 'direct') OR (`to_user` = '$userid' AND `message_type` = 'adminchat')  ORDER BY `from_user` DESC";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }  
      
      
      public function GetMessageByOnetoOneUserWithAdmin($userid) {
        $t = "SELECT DISTINCT `from_user`,`post_type`,`to_user`  FROM `Message` WHERE `to_user` = '$userid' AND `post_type` = 'adminchat' ORDER BY `from_user` DESC";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }  
      
      
      
        /* Get Message By Service Id and Userid*/
    public function GetMessageByUserService($userid,$post_id,$post_type) {
        $t = "SELECT DISTINCT(`from_user`) FROM `Message` WHERE `to_user` = '$userid' AND  `post_id` = '$post_id' AND  `post_type` = '$post_type' AND `shortlist` != 'Yes' ORDER BY `from_user` DESC";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }  
       
       
       public function ShortList($userId,$senderId,$postid,$posttype) {
           $t = "UPDATE `Message` SET `shortlist`='Yes' WHERE `from_user` = '$userId' AND `to_user` = '$senderId' AND `post_type` = '$posttype' AND `post_id` = '$postid' ";
           $sqlquery = $this->query($t);
           return $sqlquery;
      }
      
      
       public function CrossOut($userId,$senderId,$postid,$posttype) {
           $t = "UPDATE `Message` SET `shortlist`='' WHERE `from_user` = '$userId' AND `to_user` = '$senderId' AND `post_type` = '$posttype' AND `post_id` = '$postid'";
           $sqlquery = $this->query($t);
           return $sqlquery;
      }
      
        /* Get Message By Service Id and Userid*/
    public function GetMessageByUserServiceShortlist($userid,$post_id,$post_type) {
        $t = "SELECT DISTINCT(`from_user`) FROM `Message` WHERE `to_user` = '$userid' AND  `post_id` = '$post_id' AND  `post_type` = '$post_type' AND `shortlist` = 'Yes' ORDER BY `from_user` DESC";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }  
      
      
          /* Get Message By Service Id and Userid*/
    // public function GetMessageByUserJob($userid,$job_id) {
    //     $t = "SELECT DISTINCT(`from_user`) FROM `Message` WHERE `to_user` = '$userid' AND  `jobid` = '$job_id' ORDER BY `from_user` DESC";
    //     $sqlquery = $this->query($t);
    //     return $sqlquery;
    //   }  
      
          /* Get Message By Order*/
    public function GetServicesMessageByUser($userid) {
        $t = "SELECT DISTINCT `post_id`,`post_type`  FROM `Message` WHERE `to_user` = '$userid' OR `from_user` = '$userid' ORDER BY `post_id` DESC";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }  
      
      
             /* Get Message By Order*/
    public function GetJobsMessageByUser($userid) {
         $t = "SELECT DISTINCT `post_id`,`post_type` FROM `Message` WHERE `to_user` = '$userid' OR `from_user` = '$userid' ORDER BY `post_id` DESC";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }  
      
             /* Get Message By Order*/
    public function GetInvitationMessageByUser($userid) {
        $t = "SELECT DISTINCT(`from_user`) FROM `InvitationMessage` WHERE `to_user` = '$userid' ORDER BY `from_user` DESC";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }
      
      
       /* Get Message By Order*/
    public function GetMessageById($comment_id) {
          $t = "SELECT * FROM `Message` WHERE `id` = '$comment_id'";
          $sqlquery = $this->query($t);
           return $sqlquery;
      } 
      
      
      
         /* Get Message By From User*/
    public function GetMessageByFromUsers($from_user,$to_user) {
          $t = "SELECT * FROM `Message` WHERE (`from_user` = '$from_user' AND `to_user` = '$to_user') OR (`from_user` = '$to_user' AND `to_user` = '$from_user') ORDER BY `id` DESC";
          $sqlquery = $this->query($t);
          $user_data = $this->fetch_array($sqlquery);
           return $user_data;
      } 
      
      public function GetMessageByFromUsersByType($from_user,$to_user,$post_type,$post_id) {
          $t = "SELECT * FROM `Message` WHERE ((`to_user`= '$to_user' AND `from_user` = '$from_user') OR (`to_user`= '$from_user' AND `from_user` = '$to_user')) AND `post_type` = '$post_type' AND `post_id` = '$post_id' ORDER BY `id` DESC";
          $sqlquery = $this->query($t);
          $user_data = $this->fetch_array($sqlquery);
           return $user_data;
      } 
      
      
      
      
      
         /* Get Message By From User*/
    public function GetMessageByUsersForService($from_user,$to_user,$service_id) {
          $t = "SELECT * FROM `Message` WHERE `from_user` = '$from_user' AND `to_user` = '$to_user' AND `post_id` = '$service_id'";
          $sqlquery = $this->query($t);
          $user_data = $this->fetch_array($sqlquery);
           return $user_data;
      } 
         
         /* Get Message By From User*/
    public function GetMessageByFromUser($from_user,$to_user) {
          $t = "SELECT * FROM `Message` WHERE `from_user` = '$from_user' AND `to_user` = '$to_user' OR `to_user` = '$to_user' AND `from_user` = '$from_user'";
          $sqlquery = $this->query($t);
          return $sqlquery;
      } 
       
//   /* Get Status*/
     public function GetStatus($userid) {
        $t = "SELECT * FROM `Message` WHERE `status` = '0' AND `to_user` = '$userid'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      } 
         
      public function EditBio($id,$bio) {
            $t = "UPDATE `users` SET `ProfileBio` = '$bio' WHERE `id`='$id'";
         $sqlquery = $this->query($t);
        return $sqlquery;
      }
       
        /* Delete Skills */
	 public function DeletePost($id) {
         $t = "UPDATE `CreateJob` SET `delete_post` = 'Yes' WHERE `id`='$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }  
     
      /* Delete Skills */
	 public function DeleteService($id) {
        $t = "UPDATE `sell_your_service` SET `delete_service` = 'Yes' WHERE `id`='$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }  
      
       //   /* Get Status*/
     public function GetAllStates() {
        $t = "SELECT DISTINCT(`state_name`) as states FROM `cities` ORDER BY `state_name`";
        $sqlquery = $this->query($t);
         return $sqlquery;
      } 
      
       /* Send Interview Notification */
     public function PostImages($uniqueName,$topic){
        $t = "INSERT INTO `Posts_images` SET `photos`='$uniqueName', `topic` = '$topic'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
       /*   */
     public function featured_image($featured_image){
          $t = "UPDATE `Posts_images` SET `featured_image`= 1 WHERE `id` = '$featured_image'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
    public function GetImgByTopic($job) {
          $t = "SELECT * FROM `Posts_images` WHERE `topic` ='$job' ORDER BY `id` DESC";
        $sqlquery = $this->query($t);
         return $sqlquery;
      } 
      
              /* Delete Skills */
	 public function DeletePostImages($topic) {
        $t = "DELETE FROM `Posts_images` WHERE `topic`='$topic'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }  
      
       public function CheckName($topic) {
            $t = "SELECT * FROM `CreateJob` WHERE `topic` ='$topic'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      } 
      public function CheckServiceName($topic) {
            $t = "SELECT * FROM `sell_your_service` WHERE `topic` ='$topic'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      } 
      
       /* Update Status */
    
      public function UpdateQualification($userid,$qualification) {
          $t = "UPDATE `users` SET `Qualifications` = '$qualification' WHERE `id` = '$userid'";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    } 
      
      
        /* Sponsor Plans */
    
      public function SponsorPlan($id,$plan1,$plan2) {
        $t = "UPDATE `SponsorPlan` SET `Plan1` = '$plan1',`Plan2` = '$plan2'  WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    } 
      
      
       public function GetSponsorPlans() {
        $t = "SELECT * FROM `SponsorPlan` WHERE `id` = '1'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      } 
      
      
         //   Add topup
       public function TopupSuccess($skey, $tranID, $domain, $status, $amount, $currency, $paydate, $orderid, $appcode, $error_code,$error_desc,$channel,$extraP)  {
          $t = "INSERT INTO TopupSuccess (skey, tranID, domain, status, amount, currency, paydate, orderid, appcode, error_code, error_desc, channel, extraP) VALUES ('$skey', '$tranID', '$domain', '$status', '$amount', '$currency', '$paydate', '$orderid', '$appcode', '$error_code', '$error_desc', '$channel', '$extraP')";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    } 
         
         
         //   Add topup
       public function ProposedBudget($proposed_price,$post_id,$userid,$msgid,$dis_id,$type)  {
          $t = "INSERT INTO `ProposedBudget` SET  `user_id` = '$userid', `post_id`='$post_id', `price`='$proposed_price', `from_user`='$userid', `to_user`='$dis_id', `message_id`='$msgid', `post_type`='$type' ";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    } 
      
       public function SentProposal($postid,$userid,$dis_id) {
        $t = "UPDATE `Message` SET `proposal` = 'Yes'  WHERE `from_user` = '$dis_id' AND `to_user` = '$userid'  AND `post_id` = '$postid' OR `jobid` = '$postid' ORDER BY `id` DESC LIMIT 1";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    } 
    
    
      public function SentProposal2($postid,$userid,$dis_id,$type) {
        $t = "INSERT INTO  `Message` SET `proposal` = 'Yes', `from_user` = '$dis_id',`to_user` = '$userid', `post_id` = '$postid',  `jobid` = '$postid', `post_type`='$type', `message_type`='Proposal Sent'";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    } 
    
    
     public function AcceptPostProposal($postid,$sendby,$sendto,$posttype) {
        $t = "UPDATE `Message` SET `proposal_accept` = 'Yes'  WHERE `from_user` = '$sendby' AND `to_user` = '$sendto'  AND `post_id` = '$postid' AND `post_type` = '$posttype' ORDER BY `id` DESC LIMIT 1";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    } 
    
    
      
        public function GetProposalData($userid,$post_id,$to_user) {
        $t = "SELECT * FROM `ProposedBudget` WHERE `user_id` = '$userid' AND `to_user` = '$to_user' OR `user_id` = '$to_user' AND `to_user` = '$userid' AND  `post_id` = '$post_id' ORDER BY `id` DESC LIMIT 1";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      } 
        public function GetProposalDataByPostId($post_id,$type) {
        $t = "SELECT * FROM `ProposedBudget` WHERE `post_type` = '$type' AND  `post_id` = '$post_id' ORDER BY `id` DESC LIMIT 1 ";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      } 
      
      public function GetProposedBudgetprice($user_id,$postid,$type) {
          $t = "SELECT * FROM `ProposedBudget` WHERE `post_id` = '$postid' AND `post_type` = '$type'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      } 
      
      
       public function UpdateProposalDataStatus($post_id,$type) {
          $t = "UPDATE `ProposedBudget` SET `status` = 1  WHERE `post_id` = '$post_id' AND `post_type` = '$type'";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    } 
      
       public function UpdateImage($user_id,$p_pic) {
          $t = "UPDATE `users` SET `ProfilePic` = '$p_pic'  WHERE `id` = '$user_id'";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    } 
      
      
    /* Payment Plan */
    
      public function PaymentPlan($postid, $plan, $price, $userid, $type,$dis_id) {
         $t = "INSERT INTO `PaymentPlan` SET `userid`='$userid', `plan`='$plan', `plan_price`='$price', `post_id`='$postid',`post_type` ='$type',`reciver_id` ='$dis_id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
      public function UpdatePaymentStatus($planid,$status) {
        $t = "UPDATE `PaymentPlan` SET `status`= '$status' WHERE `id` ='$planid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
    
    public function GetPaymentPlan($postid,$type) {
            $t = "SELECT * FROM `PaymentPlan` WHERE `post_id` = '$postid' AND `post_type` = '$type'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      } 
      
       public function GetPaymentPlanForProcess($postid,$post_type,$from_user) {
        $t = "SELECT * FROM `PaymentPlan` WHERE `status` = 2 OR `status` = 1 AND `post_id` = '$postid' AND `post_type` = '$post_type' AND `userid` = '$from_user'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      } 
      
      
      
      
      
       public function GetPaymentPlanById($plan_id) {
          $t = "SELECT * FROM `PaymentPlan` WHERE `id` = '$plan_id'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }  
      
      
        public function GetPaymentPlanByPostId($post_id) {
          $t = "SELECT * FROM `PaymentPlan` WHERE `post_id` = '$post_id'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }  
       
      
        public function AcceptProposal($serviceid) {
        $t = "UPDATE `sell_your_service` SET `proposal_accept` = 'Accepted'  WHERE `id` = '$serviceid'";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    } 
    
     public function PublicReview($sendby, $sendto, $postid, $posttype, $communicationRating, $serviceDeliveredRating, $priceBudgetRating, $repeatHireRating, $publicReview,$toUserReview) {
        // Prepare and execute the SQL statement
        
        $stmt = $this->con->prepare("INSERT INTO reviews (sendby, sendto, postid, communication_rating, service_delivered_rating, price_budget_rating, repeat_hire_rating, public_review, to_user_review,posttype) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("dddddsssss", $sendby, $sendto, $postid, $communicationRating, $serviceDeliveredRating, $priceBudgetRating, $repeatHireRating, $publicReview, $toUserReview,$posttype);
        $stmt->execute();
        // $stmt = $this->con->prepare("INSERT INTO reviews (sendby, sendto, postid, posttype, communication_rating, service_delivered_rating, price_budget_rating, repeat_hire_rating, public_review, to_user_review) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        // $stmt->bind_param("ddddssssss", $sendby, $sendto, $postid, $posttype, $communicationRating, $serviceDeliveredRating, $priceBudgetRating, $repeatHireRating, $publicReview, $toUserReview);
        // $stmt->execute();
               
            // Check if the insertion was successful
            if ($stmt->affected_rows > 0) {
                 "Form data saved successfully!";
                header('location:../../reviews');
            } else {
                 "Error saving form data: " . $stmt->error;
            }
            
            // // Close the statement and database connection
            // $stmt->close();
            // $conn->close();
    } 
    
      public function GetReviewsById($user_id) {
         $t = "SELECT * FROM `reviews` WHERE `sendto` = '$user_id'";
        $sqlquery = $this->query($t);
         return $sqlquery;
      }  
       public function GetReviewsByIds($user_id,$postids) {
         $t = "SELECT * FROM `reviews` WHERE `sendto` = '$user_id' AND `postid` = '$postids'";
        $sqlquery = $this->query($t);
         return $sqlquery;
      }  
      

      
      public function GetReviewsByPostIdType($postid,$type) {
        $t = "SELECT * FROM `reviews` WHERE `postid` = '$postid' AND `posttype` = '$type'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
         return $user_data;
      }  
      
        public function GetReviewsByPostBySender($post_id ,$from_user,$to_user) {
        $t = "SELECT * FROM `reviews` WHERE `postid` = '$post_id' AND `sendby` = '$from_user' AND `sendto` = '$to_user'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
         return $user_data;
      } 
      
      
       public function GetReviewAvgByUser($userid) {
        $t = "SELECT
    COALESCE(AVG(communication_rating), 0) AS avg_communication_rating,
    COALESCE(AVG(service_delivered_rating), 0) AS avg_service_delivered_rating,
    COALESCE(AVG(price_budget_rating), 0) AS avg_price_budget_rating,
    COALESCE(AVG(repeat_hire_rating), 0) AS avg_repeat_hire_rating,
    COALESCE(COUNT(*), 0) AS total_reviews
FROM reviews
WHERE sendto = '$userid'
";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
         return $user_data;
      }  
      
/* Admin Section */

       public function AddUser($userid, $name, $email, $userole, $username, $password) {
           $password = md5($password);
         $t = "INSERT INTO `admin` SET `id` = '$userid', `Name`='$name', `Email`='$email', `Username`='$username', `role`='$userole', `Password`='$password'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
     
     
       public function UploadReciept($name,$currency,$topic,$email, $phone, $amount, $userid, $payment_for, $postid, $planid, $milestone,$reciept,$actual_amnt,$forwho) {
           $t = "INSERT INTO `UploadReciept` SET `Name` ='$name', `Userid` ='$userid', `Topic` ='$topic', `Type` ='$payment_for', `Email` ='$email', `Phone` ='$phone', `PlanID` ='$planid', `Milestone` ='$milestone', `Reciept` ='$reciept', `Currency` ='$currency', `Amount` ='$amount', `PostID` ='$postid', `For_paynebt` ='to_send_reciept',`ActualAmount`='$actual_amnt',`SendTo`='$forwho'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    } 
    
     public function GetUploadReciept() {
        $t = "SELECT * FROM `UploadReciept` ORDER BY `Created_at` DESC";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
         return $sqlquery;
      }  
      
       
     public function GetUploadRecieptDataById($id) {
        $t = "SELECT * FROM `UploadReciept` WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
         return $user_data;
      }  
      
      
       public function ChangeStatusOfReciept($recieptid) {
        $t = "UPDATE `UploadReciept` SET `Status` = 1  WHERE `id` = '$recieptid'";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    } 
    
      function calculateTaxes($actual_amnt,$service, $sst) {
        $servicetax = $actual_amnt * $service / 100;
        $ssttax = $actual_amnt * $sst / 100;
        
        $servicetaxx = number_format($servicetax, 2, '.', ',');
        $ssttaxx = number_format($ssttax, 2, '.', ',');
        
        return [
            'service_tax' => $servicetaxx,
            'sst_tax' => $ssttaxx,
        ];
        }

      public function ServiceTax($service,$sst) {
        $t = "UPDATE `ServiceCharges` SET `Service` = '$service', `Tax`='$sst'  WHERE `id` = 1";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    } 
    
     
    
    public function GetServiceTax() {
        $t = "SELECT * FROM `ServiceCharges` WHERE `id` = 1";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
         return $user_data;
      } 
      
      /* Coupons Management */
      
       public function AddCoupons($couponname,$couponcode,$couponquantity,$couponsdate,$couponedate,$couponamount) {
        $t = "INSERT INTO `Coupons` SET `CouponName` = '$couponname', `CouponCode`='$couponcode',`Quantity` = '$couponquantity',`SDate` = '$couponsdate',`EDate` = '$couponedate',`CouponAmount` = '$couponamount'";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    } 
    
    public function GetCoupons() {
        $t = "SELECT * FROM `Coupons` ORDER BY id DESC;";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }
      
    public function GetCouponDataByCode($couponcodes) {
        $t = "SELECT * FROM `Coupons` WHERE `CouponCode` = '$couponcodes'";
         $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
         return $user_data;
      }
      
       public function GetRefferalCoupon() {
        $t = "SELECT * FROM `Coupons` WHERE `CouponCode` = 'RFL'";
         $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
         return $user_data;
      }
      
       
               /* Delete Coupon */
	 public function DeleteCoupon($id) {
         $t = "DELETE FROM `Coupons` WHERE `id`='$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }  
      
      
      
      
        public function CheckProposalSent($postid, $type) {
          $t = "SELECT * FROM `Message` WHERE `post_id` = '$postid' AND `proposal_accept` = 'Yes' AND `post_type` = '$type'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
         return $user_data;
      }
       
       
       public function GetProjectCostByProject($postid, $post_type, $loginuser, $distuser) {
         $t = "SELECT * FROM `ProposedBudget` WHERE `from_user` = '$loginuser' AND `to_user` = '$distuser' AND `post_type` = '$post_type' AND `post_id` = '$postid'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
         return $user_data;
      }
      
      
      public function IfProjectStartOrNot($postid, $post_type, $loginuser, $distuser) {
        $t = "SELECT * FROM `ProposedBudget` WHERE `from_user` = '$loginuser' AND `to_user` = '$distuser' AND `status` = '1' AND `post_type` = '$post_type' AND `post_id` = '$postid'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
      
      
      
 
       public function GetEscrowByProject($postid, $post_type, $loginuser, $distuser) {
         $t = "SELECT SUM(`amount`) as TotalDeposit, `status`FROM `Transaction` WHERE `postid` = '$postid' AND `from_user_id` = '$distuser' AND `status` = 4";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
         return $user_data;
      }
      

      
       public function GetEarningByProject($postid, $post_type, $loginuser, $distuser) {
         $t = "SELECT SUM(`amount`) as TotalEarning FROM `Transaction` WHERE `from_user_id` = '$distuser' AND `to_user_id` = '$loginuser' AND `postid` = '$postid' AND `payment_for` = '$post_type' AND `status` = 2";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
         return $user_data;
      }
      
      
       public function InsertCouponAmount($userid,$cp_checked) {
        $t = "INSERT INTO `Transaction` SET `points` = '$cp_checked', `from_user_id`='$userid' , `to_user_id`='cc' , `status`= 5";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }
      
      
       public function UpdateCouponAmount($userid,$cp_checked) {
        $t = "UPDATE `Transaction` SET `points` = '' WHERE `from_user_id`='$userid' AND `to_user_id`='cp' AND `status`= 5";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }
      
      
       public function RefferalCoupon($reffrall_ID,$amount,$couponCode) {
        $t = "INSERT INTO `Transaction` SET `from_user_id`='$reffrall_ID',`to_user_id`='cp', `points` = '$amount',`status`= 5,`payment_for`='$couponCode'";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }
      
      public function RefferalCoupon2($userid,$amount,$couponCode) {
        $t = "INSERT INTO `Transaction` SET `from_user_id`='$userid',`to_user_id`='cp', `points` = '$amount',`status`= 5,`payment_for`='$couponCode'";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }
      
      
       public function GetCouponReedem($userid,$amount,$couponCode) {
           $t = "INSERT INTO `Transaction` SET `from_user_id`='$userid',`to_user_id`='cp', `points` = '$amount',`status`= 5,`payment_for`='$couponCode'";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }

 
   function isCouponValid($couponCode, $startDate, $endDate, $couponcodes) {
    // Get the current date
    $currentDate = date('Y-m-d');

    // Check if the coupon code and name match the provided values
    if ($couponCode === $couponcodes) {
        // Check if the current date is within the valid date range
        if ($currentDate >= $startDate && $currentDate <= $endDate) {
            return true; // Coupon is valid
        }
    }

    return false; // Coupon is not valid
}




    public function Inbox($adminid) {
         $t = "SELECT DISTINCT(`to_user`) FROM `Message` WHERE `from_user`= '$adminid' AND `message_type` = 'adminchat'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
         return $sqlquery;
      }
      
       public function InboxMessages($userid) {
        $t = "SELECT * FROM `Message` WHERE `id` = '$userid'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
         return $sqlquery;
      }
      
       public function CouponCreditByUser($user_id) {
        $t = "SELECT SUM(`points`) as CouponsCredit FROM `Transaction` WHERE `from_user_id` = '$user_id' AND `to_user_id` = 'cp' AND `status` = 5";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
         return $user_data;
      }
       

}

?>