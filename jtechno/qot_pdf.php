<!DOCTYPE HTML>
<html>
  
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>JTECHNO</title>
 <script type="text/javascript">
            function printt()
            {
                document.getElementById("prt").style.display="none";
                document.getElementById("cls").style.display="none";
            window.print();
            }
            function closs()
            {
                window.close();
            }
        </script>
<link rel="stylesheet" href="http://mission2cr.org/admin/qot.css1">		
</head>
<?php
// Include the Composer autoloader
require_once 'vendor/autoload.php';

use Mpdf\Mpdf;

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start output buffering
ob_start();
?>
<body>
    <div class="page">
<?php 

include('dbconnection/connection.php');
$state=$_GET['state'];
if($state=='AP'){
	$qottable ='add_qot';
	$qottable1 ='add_qot1';
 
}
elseif($state=='TG'){
	$qottable ='add_tgqot';
	$qottable1 ='add_tgqot1';
 
}
 elseif($state=='TN'){
  $qottable ='add_tnqot';
  $qottable1 ='add_tnqot1';
}
elseif($state=='KL'){
	$qottable ='add_klqot';
	$qottable1 ='add_klqot1';
  
}
else if($state=='KN'){
  $qottable ='add_knqot';
  $qottable1 ='add_knqot1';

}
elseif($state=='OD'){
  $qottable ='add_odqot';
  $qottable1 ='add_odqot1';

}
$bid=$_GET['id'];
$loc=$_GET['loc'];
$q=mysqli_query($link,"select * from add_bill1 where id='$bid'") or die(mysqli_error($link));
$r=mysqli_fetch_array($q);
 $service_no=$r['service_no'];
$invdate1=$r['date'];

$invdate = date('d-M-y', strtotime( $invdate1 ));


 $store_name=$r['store_name']; 
    $state=$r['state'];
	$state_code=$r['state_code'];
	$addr=$r['addr'];
	$ses=$r['ses'];
	$gst_in=$r['gst_in'];
	$tot=$r['tot'];
	$tot_gst=$r['tot_gst'];
	$net=$r['net'];
	$date=$r['date'];
	$store_code=$r['store_code'];
	$inv_no=$r['inv_no'];
	$mnth=date('M', strtotime( $date ));
	$y=date('y', strtotime( $date ));


$dt=date('m-d-Y');
 



?>

<table border='1' style="width:100%" align="center"  cellpadding="0" cellspacing='0'>
        <thead>
            <tr class="noBorder" ><th colspan="14"style="width:100% border-right:none !important;font-size:18px;">
			<img src="images/excel_logo.jpg"/></th></tr>
        </thead>

        <tr><td colspan="14" style="text-align:center;font-size:18px;border:0px;"><b>QUOTATION</b><br /></td></tr>
        <tr><td colspan="14">
										
							<?php $id=$_GET['id'];
							$sq=mysqli_query($link,"select * from ".$qottable." where id='$id'");
							$r=mysqli_fetch_array($sq);
							$store_code=$r['store_code'];

							$ssq1=mysqli_query($link,"select * from dpr where store_code='$store_code'");
							$r1=mysqli_fetch_array($ssq1);
							$state_code=$r1['state_code'];
							$company_name1=$r1['company_name'];
							$addr1=$r1['ship_ddress'];
							$state1=$r1['state'];
							$gst_in1=$r1['gst_in'];
							$ship_name=$r1['ship_name'];
							$ship_state=$r1['ship_state'];
							$ship_gst=$r1['ship_gst'];
							$store_name=$r1['store_name'];
							$format_type=$r1['format_type'];
							?> 
						<?php 
$sqy=mysqli_query($link,"select * from organization where id='1'");
$state=$_GET['state'];
$r2y=mysqli_fetch_array($sqy);
if($state=='AP'){
    $address=$r2y['ap_address'];
    $gst=$r2y['ap_gst'];
}
elseif($state=='TG'){
    $address=$r2y['tg_address'];
    $gst=$r2y['tg_gst'];
}
elseif($state=='TN'){
    $address=$r2y['tn_address'];
    $gst=$r2y['tn_gst'];
}
elseif($state=='KL'){
    $address=$r2y['kl_address'];
    $gst=$r2y['kl_gst'];
}
elseif($state=='KN'){
    $address=$r2y['kn_address'];
    $gst=$r2y['kn_gst'];
}
elseif($state=='OD'){
    $address=$r2y['od_address'];
    $gst=$r2y['od_gst'];
}
$vendor_name=$r2y['vendor_name'];
?>

            <!-- <div style="border:0px solid #000;">  -->
								<tr>
									<td colspan="14">
										<table >
											<tr><td><b>Name of Vendor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></td><td><?php echo $vendor_name;?></td></tr><br/>
											<tr><td><b>Vendor Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b></td><td><?php echo $address;?></td></tr><br/>
											<tr><td><b>Vendor State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  :</b></td><td><?php echo $state;?> STATE</td></tr><br/>
											<tr><td><b>Vendor GSTIN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b></td><td><?php echo $gst;?></td></tr><br/>
											<tr><td><b>Vendor State Code :</b></td><td><?php echo $r1['state_code']; ?></td></tr><br/>
										
										</table>
									</td>	
								</tr>
                   <!-- </div> -->
                   <tr><td colspan="14">

				  


<table width="100%" >
<tr><td ><b>Store Code :</b><?php echo  $store_code ?></td>
<td ><b>Store Name :</b><?php echo $store_name ?>
<td ><b>Format Type :</b><?php echo $format_type ?></td>

</tr>
</table>



<table width="100%"  style="border:1px solid #000;" align="left">
<tr><td ><b>Quotation Date:</b><?php $d=$r['inv_date']; echo date('d-m-Y', strtotime($d));?></td>

<td ><b>Quotation Number:</b><?php $qt=$r['quet_num']; echo $r['quet_num'];?></tr>


<tr><td ><b>FM Fault No:</b><?php echo $r['falt_no'];?></td>
<td ><b>FM Fault date :</b><?php $d1=$r['falt_date']; echo date('d-m-Y', strtotime($d1));?></tr>

<br></table>
</td></tr>
<tr><td colspan="14">
<table width="100%"  style="border:1px solid #000;" align="left">

<tr><td colspan="2"><b>Fault Description:</b><?php echo $r['falt_desc'];?></td></tr>
</table>
</td></tr>

<tr><td colspan="14">

<table  >
<tr>
<td >




<table  width="500" ><tr>
<td><b>Bill to Party</b><hr /></td></tr>



</table>
							<div style="height:10px;" ></div>
							<div style="border:1px solid #000;">
 <table >
		  
		  <tr>
															<td>
														<b>	Name :<br/>
														Address :<br/>
															State :<br/>
															GSTN :</b>
															</td>
															<td>
			
			
			<b>
		<?php echo $r1['company_name'];?><br/>
		<?php echo $r1['address'];?><br/>
				<?php   $st=$r1['state']; if($st=='AP'){ echo "ANDHRA PRADESH "; } else if($st=='TG'){ echo "TELANGANA STATE"; }else if($st=='KN'){ echo "Karnataka"; }?><br/>
			<?php echo $r1['gst_in'];?>
			</b>			
			</td>
		</tr>
		  
		
          </table>
			
</div>
</td>
<!-- <td width="20"></td> -->

			
<td width="20"></td>

			
		<td >

<table  width="500" ><tr>
<td><b>Ship to Party</b><hr /></td></tr>



</table>
<div style="height:20px;" ></div>
<div style="border:1px solid #000;">
 <table >
		  
		  
		  <tr>
            <td>
		<b>	Name :<br/>
		Address :<br/>
			
		
		
			State :<br/>
			GSTN :</b>
			</td>
			<td>
			<b>
		<?php echo $ship_name;?><br/>
		<?php echo $store_name?>,<?php echo $addr1;?><br/>
			<?php echo $ship_state;?><br/>
			<?php echo $ship_gst;?>
			</b>
			</td>
			</tr>
		  

          </table>
			
</div>
</td>	
			
			
			
			</tr>
			
		<!--	<tr><td><b>Service Period: <?php echo $mnth;?>'<?php echo $y;?></b></td></tr>-->
          </table>
		  </div>

</td>
</tr>

<table border='1' style="width:100%" align="center"  cellpadding="0" cellspacing='0'>   
        <tr>
<th style="width:5px;">SNo</th>
<th style="width:120px;">HSN/ SAC Codes</th>
<th style="width:75px;">Article/ Service Codes</th>
<th  style="width:200px;"  colspan="2">Description of Material/Service</th>
<th style="width:60px;" colspan="1">Brand/Make</th>
<th style="width:60px;" colspan="1">Model</th>
<th style="width:60px;" colspan="1">QTY</th>
<th style="width:60px;" colspan="1">UOM</th>
<th style="width:60px;">RATE</th>


<th style="width:100px;" colspan="1">Base Amount</th>
<th style="width:100px;" colspan="1">Service
Fee -6% (In Rs)</th>

<th style="width:100px;" colspan="1">Total Base Amount</th>

<th style="width:100px; border-right-color: #000 !important;">GST Rate (18 %)</th>
<th style="width:120px; border-right-color: #000 !important;">Remarks</th>


</tr>



<?php
include_once('dbconnection/connection.php');
$bid=$r['id'];

	 $aa="select * from ".$qottable1." where  id1='$bid' ";
 
$t=mysqli_query($link,$aa) or die(mysqli_error($link));
$i=1;
$gst_amnt1=0;
$tx=0;
while($t1=mysqli_fetch_array($t)){
	
	?>
	<tr>
	<th style="width:5px;"><?php echo $i; ?></th>
	<th style="width:120px;">
	<?php 

	echo $t1['hsn'];
	?>
	</th>
	<th style="width:120px;">
	<?php 

	echo $t1['serv_code'];
	?>
	</th>
	<th colspan="2" style="width:200px;"><?php echo '<b>'.$t1['desc1'].'</b>'; ?></th>
	<th style="width:60px;" colspan="1"><?php echo $t1['brand']; ?></th>
	<th style="width:60px;" colspan="1"><?php echo $t1['model']; ?></th>
		<th style="width:60px;" colspan="1"><?php echo $t1['qty']; ?></th>
		<th style="width:60px;" colspan="1"> <?php echo $t1['uom']; ?></th>
		<th style="width:60px;"><?php echo $t1['rate']; ?></th>
		
		<th style="width:100px;" colspan="1"><?php echo $bas=$t1['base_amt']; ?></th>
		<th style="width:100px;" colspan="1"><?php echo $ser=$t1['serv_amt']; ?></th>	
	<th style="width:100px;" colspan="1"><?php echo $ser+$bas; ?></th>

	<th style="width:100px; border-right-color: #000 !important;">
	<?php echo $tax=number_format((float)$t1['gst_amnt'],1, '.', ''); ?></th>
	<th style="width:60px;" colspan="1"><?php echo $t1['remarks']; ?></th>
	
	<th> </th>
	</tr>
	
	
<?php 

$gst_amnt=$t1['gst_amnt'];
$gst_amnt1=$gst_amnt+$gst_amnt1;


$tt_amt=$t1['total_price'];
$tt_amt1=$tt_amt+$tt_amt1;


$tx=$t1['tax_amnt'];
 $tx1=$tax+$tx1;
$total_price=$t1['total_price'];

 $gst_amnt2=$gst_amnt+$gst_amnt2;
$bas1=$bas+$bas1;
$ser1=$ser+$ser1;


$i++; }

 ?>
 
 <tr>
	<th  colspan="10"> Total Amount</th>
	<th style="width:100px;"><?php echo $bas1;?></th>
	<th style="width:100px;"><?php echo $ser1;?></th>
	<th style="width:100px;"><?php echo $ser1+$bas1;?></th>
	<th style="width:100px;"><?php echo $tx1;?></th>
	</tr>
	<th> </th>
 <tr>
	<th  colspan="13"> SGST/UGST Amt (In Rs)</th>
	<th style="width:100px;"><?php echo $tx1/2;?></th>
	<th> </th>
	</tr>
<tr>
	<th  colspan="13"> CGST Amt (In Rs)</th>
	<th style="width:100px;"><?php echo $tx1/2;?></th>
	<th> </th>
	</tr>
 <tr>
	<th  colspan="13"> IGST Amt (In Rs)</th>
	<th style="width:100px;">0</th>
	<th> </th>
	</tr>
	<tr>
	<th  colspan="13"> Total GST  (In Rs)</th>
	
	<th style="width:100px;"><?php echo $tx1;?></th>
	<th> </th>
	</tr>
		<tr>
	<th  colspan="13"> Total Amount (In Rs)</th>
	<th style="width:100px;"><?php echo $tamt=$tx1+$ser1+$bas1;?></th>
	<th> </th>
	</tr>

 <tr>
	<th  colspan="14"> Total Invoice Amount in Words
		<?php
     $tmt=round($tamt);
      
     
     $number = round($tmt);
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  echo  "- ".strtoupper($result) .  $points . " RUPEES ONLY";
 ?> 
 
		
		<?php //echo $taxx1+$tx1;?></th>
		<th> </th>
	
	</tr>
	<!--<img src="sin.jpeg" height="70"/>-->
<tr>
	<th  colspan="14" style="text-align:right;padding-right:10px;font-size:20px;"> For JTECHNO ASSOCIATES FMS PVT.LTD  <br/><br/><br/><br/><br/>Authorised Signatory
</th>
<th> </th>
</tr>
      </tbody>
    </table></td></tr></table>
<?php

// End output buffering and get the content
$body = ob_get_clean();

// Convert the content to UTF-8
$body = iconv("UTF-8", "UTF-8//IGNORE", $body);

// Create an instance of mPDF
$mpdf = new Mpdf(['mode' => 'c']);

// Write HTML content to the PDF
$mpdf->WriteHTML($body);

// Output the PDF to a file
$qtno = $qt . ".pdf";
$mpdf->Output($qtno, 'F');

// Reset error reporting (optional)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// JavaScript redirect
echo "<script type=\"text/javascript\">
    location.href = 'download.php?qt=$qtno';
    setTimeout(\"DoTheRedirect('roqot_list.php?state=$state')\", parseInt(2 * 1000));
    function DoTheRedirect(url) { window.location = url; }
</script>";
?>


