<?php
require_once('tcpdf/tcpdf.php');
include('admin/inc/function.php');
require_once('wallett/assets/php/functions.php');

$obj = new Instantjobs();
$conn = mysqli_connect("localhost","mit_instantjob","[PFC[mUGwBp4","mit_instantjobs");


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

 
$selectedYear = isset($_GET['year']) ? $_GET['year'] : '';
// $trans_id = $_GET['id'];
$trans_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

 
    
    $query = "SELECT * FROM Transaction WHERE `id` = '$trans_id' AND `to_user_id` = 'rsrv'";
 
 
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

class MYPDF extends TCPDF {

    private $user_id; 

    public function __construct($user_id) {
        parent::__construct();
        $this->user_id = $user_id;
        
    }
 
    public function Header() {

        $this->SetY(7);
       
        $this->SetFont('helvetica', 'L', 12);

        $image_file = 'assets/img/new-instant-logo.png';
        $this->Image($image_file, 138, 2, 50, '', 'png', '', 'T', false, 600, '', false, false, 0, false, false, false);
    }

  
    public function Footer() {
   
        $this->SetY(-15);
        
        $this->SetFont('helvetica', 'I', 8);
         
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

 

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}


$pdf->SetFont('dejavusans', '', 10);

$pdf->AddPage();

while ($row = mysqli_fetch_assoc($result)) {
$m_id = $row['m_id'];
 $userid = $row['from_user_id'];
        $user_information = $obj->GetUserById($userid);
                 $milestonedata = $obj->GetPaymentPlanByMId($m_id);
                 $atamount = $milestonedata['plan_price'];
                                $postid = $row['postid'];
                                    if ($row['payment_for'] == 'service') {
                                        $postdata = $obj->GetServiceByPostId($postid);
                                        $ud = 'MYS' . $postdata['random_id'];
                                    } elseif ($row['payment_for'] == 'job') {
                                        $postdata = $obj->GetJobByPostId($postid);
                                        $ud = 'MYJ' . $postdata['random_id'];
                                    } elseif ($row['payment_for'] == 'post_sponsor') {
                                        $ud = 'MYA' . $postdata['random_id'];
                                    } else {
                                        $ud = '';
                                    }

                                    $suffix = "";
                                    if ($row['from_user_id'] == $user_id && $row['to_user_id'] != 0) {
                                        $color = "";
                                        $suffix = "".getUserById($row['to_user_id'])['ProfileName']." (".getUserById($row['to_user_id'])['Phone'].") ";
                                    } elseif ($row['from_user_id'] == 0) {
                                        // $color = "success";
                                        $suffix = "Top Up to personal account";
                                        $ud = 'MYW' . $row['orderid'];
                                        $ww = 'Wallet';
                                    } elseif ($row['to_user_id'] == 'rsrv' && $row['id'] == $trans_id && $row['status'] == 4) {
                                        // $color = "";
                                        $suffix = $ud.' - '.$milestonedata['plan'].'<br>'.'Milestone Funded';
                                        $ww = "Funded";
                                        $ud = '';
                                    } elseif ($row['to_user_id'] == 0 && $row['from_user_id'] == $user_id) {
                                        // $color = "";
                                        $suffix = "Withdrawal";
                                        $ww = "Withdrawal";
                                        $ud = '';
                                    } else {
                                        // $color = "success";
                                        $suffix = " " . getUserById($row['from_user_id'])['ProfileName'] . " (" . getUserById($row['from_user_id'])['Phone'] . ") ";
                                    }

                                    $date = date_create($row['created_at']);

                                    $post_id = $row['postid'];
                                    $type = $row['payment_for'];
                                    $proposaldata = $obj->GetProposalDataByPostId($post_id, $type);                                    
                 
                 $servicetax = $atamount * 10 / 100;
                 $ssttax = $atamount * 6 / 100;
                 $first =  $ud.' '.$suffix;
                 $sf = date_format($date, "d M Y");
                 $sf2 =  $suffix ;
                 $amount= $row['actual_amount'];
                 $currentDate = date("d F Y");
        }

    if ($user_information) {

        $ProfileName = $user_information['ProfileName'];
        $Address = $user_information['Address'];
        $IcName = $user_information['IC_name'];
        $UserEMail = $user_information['Email'];
         
    }
     
$html .= '  
    <div class="card px-0 card-ef">
      <p class="text-left ">Receipt No:'.$ud.',</p>
      <p class="text-left  ">'.$currentDate.'</p>
      <br>
       <p class="font-weight-bold text-left">Bill from:</p>
       <p class="text-left">InstantJob Sdn. Bhd. No. B-07-3 Block B, <br>plaza Glomac,No.6 jalan S7/19 kelana jaya,<br>Petaling Jaya, Selangoor 47301, <br>Malaysia.</p>
       <br>
       <p class="font-weight-bold text-left">Bill to:</p>
       <p class="text-left">'.$ProfileName.'</p>
       <p class="text-left">'.$Address.'</p>
       <br>
       <p class="font-weight-bold text-left">Service For:</p>
       <p class="text-left">'.$postdata["topic"].'</p>
 
<div class="tables">
  <table class="table table-bordered" style="border:1px solid #000; padding:8px;">
    <tr class="top_title_refer" style="border-bottom:1px solid #000; background-color:#000; color:#fff;">
      <th class="bg-dark text-white" style="border-bottom:1px solid #000; border-right:1px solid #fff;" scope="col">Description</th>
      <th class="bg-dark text-white" style="border-bottom:1px solid #000;" scope="col">Amount</th>
    </tr>
  <tbody>
    <tr style="border-bottom:1px solid #000">
      <td class="text-left" style="border-bottom:1px solid #000; border-right:1px solid #000;">
          <p class="">'.$sf2.'</p>
          <p class="text-left">Service Fee</p>
          <p class="text-left">6% SST</p>
      </td>
      <td class="" style="border-bottom:1px solid #000">
         <p class="">RM'.$atamount.'</p>
          <p class="text-right">RM'.$servicetax.'</p>
          <p class="text-right">RM'.$ssttax.'</p>    
      </td>
    </tr>
    <tr>
      <td style="text-align:left; border-right:1px solid #000;"><p style="text-align:left; font-weight:bold; padding:0;">Total</p></td>
      <td class=""><p class="text-right  font-weight-bold">RM'.$amount.'</p></td>
    </tr>
  </tbody>
</table>
</div>
    <p class="text-left">If you have any questions, Kindly email to support@instantjob.org</p>
</div>';


 

  $pdf->writeHTML($html, true, false, true, false, '');

// Output the PDF as a download
$pdf->Output('Statement of ' . $postdata["topic"] . '.pdf', 'D');
?>
<style>
    
    
    /*EMAIL CSS*/
p.text-center.email-details {
    padding: 12px 18px;
    color: #000 !important;
}
p.statement-detail{
     color: #000 !important;
}
button.email_btn.bg-none.border-0.btn.mt-5 {
    color: #e70f9e;
}
.main.prof-inf-new.active a {
    text-decoration: underline !important;
}
a.view-receipt {
    font-size: 14px;
    font-weight: 600;
}
.container-wrapper {
    /* min-width: 100px; */
    max-width: 700px;
    margin: 0 auto;
    position: relative;
}
img.logo-table {
    width: 75%;
}
.tables td {
    border:1px solid #c5c5c5;
}
.card-ef {
    gap: 14px;
}
</style>