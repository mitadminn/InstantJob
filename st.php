<?php


// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
         // Position at 15 mm from bottom
        $this->SetY(7);
       // Set font
         $this->SetFont('helvetica', 'L', 12);
        // Title
        $this->Cell(44, 8, 'Statement: Year 2023', 0, false, 'C', 0, '', 0, false, 'M', 'M');
     $this->Ln(); // Add a line break
        $this->Cell(62, 8, 'Name: {profile name}{ ic name}', 0, false, 'C', 0, '', 0, false, 'M', 'M');
     $this->Ln(); // Add a line break
        $this->Cell(37, 8, 'Email: {user mail}', 0, false, 'C', 0, '', 0, false, 'M', 'M');
         // Logo
        $image_file = 'https://mitdevelop.com/instajobs/assets/img/new-instant-logo.png';
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
                                    if ($row['from_user_id'] == $user_id && $row['to_user_id'] != 0) {
                                        $color = "danger";
                                        $suffix = "".getUserById($row['to_user_id'])['ProfileName']." (".getUserById($row['to_user_id'])['Phone'].") ";
                                    } elseif ($row['from_user_id'] == 0) {
                                        $color = "success";
                                        $suffix = "Top Up to personal account";
                                        $ud = 'MYW' . $row['orderid'];
                                        $ww = 'Wallet';
                                    } elseif ($row['to_user_id'] == 'rsrv' && $row['from_user_id'] == $user_id && $row['status'] == 4) {
                                        $color = "danger";
                                        $suffix = "Reserve";
                                        $ww = "Reserve";
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
      
     
}
// create some HTML content

$subtable = '<table border="1" cellspacing="6" cellpadding="4"><tr><td>a</td><td>b</td></tr><tr><td>c</td><td>d</td></tr></table>';
 
$html = ' 
<br>
<br>
 
<table border="1" cellspacing="1" cellpadding="8">
    <tr>
          <th class="bg-dark text-white" style="width:150px" scope="col">Date</th>
      <th class="bg-dark text-white" scope="col" style="width:300px">Description</th>
      <th class="bg-dark text-white" scope="col" style="width:150px">Amount</th>
    </tr>
    <tr>
        <td class="" style="width:150px">15 May 2023</td>
      <td class="" style="width:300px;  ">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
      <td class=""style="width:150px" >RMXXX</td>
    </tr>
    <tr>
         <td class="">14 May 2023</td>
      <td class="" style="width:300px">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
      <td class="" style="width:150px">RMXXX</td>
    </tr>
    <tr>
        <td class="">12 May 2023</td>
      <td class="" style="width:300px">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
      <td class="" style="width:150px">RMXXX</td>
    </tr>
    <tr>
        <td class="">9 Apr 2023</td>
      <td class="" style="width:300px">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
      <td class="" style="width:150px">RMXXX</td>
    </tr>
</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// set some text to print
 
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+