<?php
require_once('functions.php');
require_once('../../../admin/inc/function.php');
 $obj = new Instantjobs();

// sleep(1);
if(isset($_GET['sendmoney'])){
    $response = array();
if(checkDuplicateMobile($_POST['user_mobile_no'])){
    $user = $_SESSION['userdata'];
    $user_id = $_SESSION['Userid'];
    $credit_balance = $obj->getCreditedBalance($user_id);
    $debit_balance = $obj->getDebitedBalance($user_id);
    $balance = $credit_balance['credit']-$debit_balance['debit'];
  
  
    // $balance = $user['balance']=getCreditedBalance($user_id)- getDebitedBalance($user_id);
    if($balance<$_POST['amount']){
        $response['txn_status']=false;
        $response['msg']="you have insufficient balance";
     }else{
         // runs if everything is ok
         if(sendMoney(getUserIdByMobileNo($_POST['user_mobile_no']),$user_id,$_POST['amount'])){
            $response['txn_status']=true;
            $response['msg']=$_POST['amount']." RM is sended to ".$_POST['user_mobile_no']." Successfully";

         }else{
            $response['txn_status']=false;
            $response['msg']="something went wrong, please try again after some time";
         }
     }

}else{
    $response['txn_status']=false;
    $response['msg']="mobile no not registered";
}

echo json_encode($response);
}