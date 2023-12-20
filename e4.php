<?php
   $page = 'Service Select';
   include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>     
<!--first tab row start-->
<div class="col-sm-12 instant-main" style="background: #fff">
<div class="row">
<div class="col-lg-12 col-md-12 second-mid example">
<div class="container-wrapper">
<div class=" ">
<div class="main prof-inf-new active" style="">
<div class="d-flex justify-content-between align-items-baseline">
    <div>
         <div class="card  card-ef"style="padding:20px 0 20px 0;">
      <p style="text-align:left; color:#000;">Reciept No:MY123456789</p>
      <p style="text-align:left; color:#000;">12 Jul 2023</p>
   <div  style="text-align:left;">
       <p  style="text-align:left; color:#000; font-weight:bold;">Bill from:</p>
       <p style="text-align:left; color:#000;">InstantJob Sd.Bhd. No. B-07-3 Block B, plaza Glomac,No.6 jalan S7/19 kelana jaya,Petaling Jaya, selangoor 47301, malaysia.</p>
   </div>
   <div style="text-align:left;">
       <p style="text-align:left; color:#000; font-weight:bold;">Bill to:</p>
       <p style="text-align:left; color:#000;">{Payer profile name}{IC name}</p>
   </div>
   <div style="text-align:left;">
       <p style="text-align:left; color:#000; font-weight:bold;">Service For</p>
       <p style="text-align:left; color:#000;">{job name on listing}</p>
   </div> 
   </div>
    </div>
 
   <div class=" ">
      <a href="service-provider"> 
      <img style="width: 60%;" src="assets/img/new-instant-logo.png" alt="">
      </a>
   </div>
</div>
<div class="tables">
  <table class="table table-bordered">
  <thead>
    <tr class="top_title_refer">
      <th style="background-color:#000; color:#fff;" scope="col">Description</th>
      <th style="background-color:#000; color:#fff;" scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td style="text-align:left;">
          <p style="text-align:left;">MY123456789 Funded - {milestone-task-donation}</p>
          <p style="text-align:left;margin-top:20px;">Service Fee</p>
          <p style="text-align:left;margin-top:20px;">6% SST</p>
      </td>
      <td class="">
         <p style="text-align:right;">RM1000.00</p>
          <p style="text-align:right; margin-top:20px;">RM100.00</p>
          <p style="text-align:right;margin-top:20px;">RM60.00</p>    
      </td>
    </tr>
    <tr>
      
      <td style="text-align:left;">
          <p style="text-align:right;font-weight:bold;">Total</p>
      </td>
      <td class="">
          
          <p  style="text-align:right;font-weight:bold;">RM160.00</p>
      </td>
    </tr>
 
  
  </tbody>
</table>
</div>
<div >
    <p style="text-align:left;">If you have any questions, Kindly email to support@instajob.org</p>
</div>
     <a href="">
        <button class='' style="color: #e70f9e;margin-top:30px; background:none;border:none;font-weight:bold;">PDF - Funded</button>
    </a>
<?php include('inc/footer.php'); ?>