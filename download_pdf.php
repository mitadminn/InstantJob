<?php
 
require_once('tcpdf/tcpdf.php');
include('admin/inc/function.php');
require_once('wallett/assets/php/functions.php');

$obj = new Instantjobs();
// Connect to the database (replace with your credentials)

require_once('inc/db.php');


 
// Retrieve the selected year from the query string
$selectedYear = $_GET['year'];
$user_id = $_GET['user'];
if($selectedYear == 'Show All') {
    
    $query = "SELECT * FROM Transaction WHERE `from_user_id` = '$user_id' OR `to_user_id` = '$user_id' ORDER BY id DESC";

}
else{
// Retrieve data for the selected year
$query = "SELECT * FROM Transaction WHERE (YEAR(created_at) = '$selectedYear') AND (`from_user_id` = '$user_id' OR `to_user_id` = '$user_id') ORDER BY id DESC";

}
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($connect));
}

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    private $user_id; // Property to store the user ID

    public function __construct($user_id) {
        parent::__construct();
        $this->user_id = $user_id;
        

    }

    // Your other functions and properties here

    public function Header() {
        // Fetch user details based on $this->user_id and set them to variables
        // Example: Replace the following lines with actual database or data retrieval code
        $selectedYear = $_GET['year'];
        $user_ids = $_GET['user'];
        $connect = mysqli_connect("localhost","mit_instantjob","[PFC[mUGwBp4","mit_instantjobs");
        $query = "SELECT * FROM users WHERE `id` = '$user_ids'";
        $user_information = mysqli_query($connect, $query);
        //$user_information = $obj->GetUsersById($user_id);
        $user_information = mysqli_query($connect, $query);

    // Check if the query executed successfully
    if ($user_information) {
        // Fetch the user details as an associative array
        $row = mysqli_fetch_assoc($user_information);
        $ProfileName = $row['ProfileName'];
        $IcName = $row['IC_name'];
        $UserEMail = $row['Email'];
         
    }
           
        // Position at 15 mm from bottom
        $this->SetY(7);
        // Set font 
        $this->SetFont('helvetica', 'L', 12);
        // Title
        $this->Cell(44, 8, 'Statement: Year '.$selectedYear, 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(); // Add a line break
        $this->Cell(50, 8, 'Name: {'.$ProfileName.'}', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(); // Add a line break
        $this->Cell(78, 8, 'Email: {'.$UserEMail.'}', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        // Logo
        $image_file = 'assets/img/new-instant-logo.png';
        $this->Image($image_file, 138, 2, 50, '', 'png', '', 'T', false, 600, '', false, false, 0, false, false, false);
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
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

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();
// Loop through the data and add it to the PDF
$html = ' 
<br>
<br>
 
<table border="1" cellspacing="1" cellpadding="8">
    <tr>
      <th class="bg-dark text-white" style="width:150px" scope="col">Date</th>
      <th class="bg-dark text-white" scope="col" style="width:300px">Description</th>
      <th class="bg-dark text-white" scope="col" style="width:150px">Amount</th>
    </tr>';
while ($row = mysqli_fetch_assoc($result)) {

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
                                    if ($row['from_user_id'] == $user_id && $row['to_user_id'] != 0 && $row['to_user_id'] != 'rsrv') {
                                        $color = "danger";
                                        $suffix = "".getUserById($row['to_user_id'])['ProfileName']." (".getUserById($row['to_user_id'])['Phone'].") ";
                                    } elseif ($row['from_user_id'] == 0) {
                                        $color = "success";
                                        $suffix = "Top Up to personal account";
                                        $ud = 'MYW' . $row['orderid'];
                                        $ww = 'Wallet';
                                    } elseif ($row['to_user_id'] == 'rsrv' && $row['from_user_id'] == $user_id && $row['status'] == 4) {
                                        $color = "danger";
                                        $suffix = "Funded";
                                        $ww = "Funded";
                                        $ud = '';
                                    } elseif ($row['to_user_id'] == 0 && $row['from_user_id'] == $user_id) {
                                        $color = "danger";
                                        $suffix = "Withdrawal";
                                        $ww = "Withdrawal";
                                        $ud = '';
                                    } else {
                                        $color = "success";
                                        $suffix = " " . getUserById($row['from_user_id'])['ProfileName'] . " (" . getUserById($row['from_user_id'])['Phone'] . ") ";
                                    }

                                    $date = date_create($row['created_at']);
                                    $post_id = $row['postid'];
                                    $type = $row['payment_for'];
                                    $proposaldata = $obj->GetProposalDataByPostId($post_id, $type);

                                    $servicetax = $row['amount'] * 10 / 100;
                                    $ssttax = $row['amount'] * 6 / 100;
                                    $first =  $ud.' '.$suffix;
     $sf = date_format($date, "d M Y");
     $sf2 =  $ud.'-'.$suffix ;
     $amount= $row['amount'];
$html .= '  
    <tr>
        <td class="" style="width:150px">'.$sf.'</td>
       <td class=""style="width:300px" >'.$sf2.'</td>
       <td class=""style="width:150px" >'.$amount.'</td>
    </tr>';


// output the HTML content

 
// create some HTML content
     
}
$html .='</table>'; 
                                                  
$html .='<p style="width:70%; text-align:center;">Instantjob Sdn. Bhd. B-07-3, Block B, Plaza Glomac, No.6 Jalan SS7/19, Kelana Jaya, Petaling Jaya, 47301 Selangor, Malaysia
Eamil: support@instantjob.org</p>'; 
  $pdf->writeHTML($html, true, false, true, false, '');

// Output the PDF as a download
$pdf->Output('Statement of ' . $selectedYear . '.pdf', 'D');
?>
