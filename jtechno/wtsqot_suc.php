<?php //include('config.php');
include('dbconnection/connection.php');
	$state=$_GET['state'];

	if($state=='AP'){
		$qottable ='add_qot';
		$qottable1 ='add_qot1';
		$request_amnt ='request_amnt';
	 
	}
	elseif($state=='TG'){
		$qottable ='add_tgqot';
		$qottable1 ='add_tgqot1';
		$request_amnt ='tgrequest_amnt';
	 
	}
	 elseif($state=='TN'){
	  $qottable ='add_tnqot';
	  $qottable1 ='add_tnqot1';
	  $request_amnt ='tnrequest_amnt';
	
	}
	elseif($state=='KL'){
		$qottable ='add_klqot';
		$qottable1 ='add_klqot1';
		$request_amnt ='klrequest_amnt';
	
	  
	}
	else if($state=='KN'){
	  $qottable ='add_knqot';
	  $qottable1 ='add_knqot1';
	  $request_amnt ='knrequest_amnt';
	
	
	}
	elseif($state=='OD'){
	  $qottable ='add_odqot';
	  $qottable1 ='add_odqot1';
	  $request_amnt ='odrequest_amnt';	
	}
	if(isset($_POST['submit'])){

    $qt_no=$_POST['qt_no']; 
    $inv_date=$_POST['inv_date'];
	$store_code=$_POST['store_code'];
	$ses=$_POST['ses'];
	$tot=$_POST['tot'];
	$tot_serv=$_POST['tot_serv'];
	$tot_gst=$_POST['tot_gst'];
	$net=round($_POST['net']);
	$date=date('Y-m-d');
	$falt_no=$_POST['falt_no'];
	$falt_date=$_POST['falt_date'];
    $falt_desc=$_POST['falt_desc'];

	$t=mysqli_query($link,"select * from employee where username='$ses'") or die(mysqli_error($link));
	$tr=mysqli_fetch_array($t);
	 $empemail=$tr['emp_email'];
	  $a="INSERT INTO ".$qottable." (`store_code`, `inv_date`, `quet_num`, `tot_base`, `tot_ser`, `tot_gst`, `net`,  `ses`,falt_no,falt_date,falt_desc,status)
	 VALUES ('$store_code','$inv_date','','$tot','$tot_serv','$tot_gst','$net','$ses','$falt_no','$falt_date','$falt_desc','Ro Required')";
	$sq=mysqli_query($link,$a);
	 $sno=mysqli_insert_id($link);
	 

$sqq=mysqli_query($link,"select max(id) as ids from ".$qottable);
	$rr=mysqli_fetch_array($sqq);
	$idd=$rr['ids'];
	
	 $qt_nox=19201259+1+$idd;
	 $qt_no="QJIS$state.$qt_nox";  
	
	$ac=mysqli_query($link,"update ".$qottable." set quet_num='$qt_no' where id='$sno'");
	 
	
	
	$cnt = count($_POST['pname']);
	if ($cnt > 0 && $cnt == $cnt) {

for ($i=0; $i<$cnt; $i++) {
if( $_POST['pname'][$i]!='' ){
$pname=$_POST['pname'][$i];
$hsn=$_POST['hsn'][$i];
$gst=$_POST['gst'][$i];
$uom=$_POST['uom'][$i];
$qty=$_POST['qty'][$i];
$price=$_POST['price'][$i];
$gst_amnt=$_POST['gst_amnt'][$i];
$amnt=$_POST['amnt'][$i];
$id=$_POST['id'][$i];
$serv_amnt=$_POST['serv_amnt'][$i];
$cap=$_POST['cap'][$i];
$serv_amt=$_POST['serv_amt'][$i];
$serv_amt=$_POST['serv_amt'][$i];
 $serv_code=$_POST['serv_num'][$i];
$serv_codex=$_POST['serv_code'][$i];

$brand=$_POST['brand'][$i];
$model=$_POST['model'][$i];

 $query = "INSERT INTO ".$qottable1." ( `desc1`, `hsn`, `gst`, `uom`, `qty`, `gst_amnt`, `rate`, `base_amt`,`date`,`id1`,item_id,serv_fee,cap,serv_amt,serv_code,serv_cap,brand,model) 
	VALUES 
 ('".addslashes($pname)."','$hsn','$gst','$uom','$qty','$gst_amnt','$price','$amnt','$date','$sno','$id','$serv_amt','$cap','$serv_amnt','$serv_code','$serv_codex','$brand','$model')";
 $res=mysqli_query($link,$query) or die(mysqli_error($link));
}
     
}
	}
	
	  
	if($res){
	   
	print "<script>";
	print "alert('Sucessfully Saved');";
	print "self.location='qot_list.php?state=$state';";
	print "</script>";
	}

}





if(isset($_POST['update'])){
	  $id=$_POST['ids'];
	    $qt_no=$_POST['qt_no']; 
   // $inv_date=$_POST['inv_date'];
	//$store_code=$_POST['store_code'];
	
	$ses=$_POST['ses'];
	//$tot=$_POST['tot'];
	//$tot_serv=$_POST['tot_serv'];
	//$tot_gst=$_POST['tot_gst'];
	//$net=round($_POST['net']);
	//$date=date('Y-m-d');
	// $ids=$_POST['ids'];
	   
	//$falt_no=$_POST['falt_no'];
	//$falt_date=$_POST['falt_date'];
//$falt_desc=$_POST['falt_desc'];
//$ro_no=$_POST['ro_no'];
//$ro_date=$_POST['ro_date'];
//$po_no=$_POST['po_no'];
//$po_date=$_POST['po_date'];
//$po_type=$_POST['po_type'];
//$type_of_work=$_POST['type_of_work'];
//$sub_type=$_POST['sub_type'];
//$ses=$_POST['ses'];

$adv_amnt=$_POST['adv_amnt'];
$adv_amnt1=$_POST['adv_amnt1'];
$adv_amnt2=$_POST['adv_amnt2'];
$adv_date=$_POST['adv_date'];
$adv_date1=$_POST['adv_date1'];
$adv_date2=$_POST['adv_date2'];
$ac_num=$_POST['ac_num'];
$ac_name=$_POST['ac_name'];
$wd=$_POST['wd'];
$ifsc=$_POST['ifsc'];
//$img1=$_POST['img1'];
//$img2=$_POST['img2'];
//$img3=$_POST['img3'];
$ac_det1=$_POST['ac_det1'];
$ac_det2=$_POST['ac_det2'];
$ac_det3=$_POST['ac_det3'];
$bal=$_POST['bal'];
$gst_type=$_POST['gst_type'];
$gst_type1=$_POST['gst_type1'];
$gst_type2=$_POST['gst_type2'];

$gst_amount=$_POST['gst_amount'];
$gst_amount1=$_POST['gst_amount1'];
$gst_amount2=$_POST['gst_amount2'];

$mark=$_POST['mark'];
$iname = $_FILES['img1']['name'];
			 if($iname!= ""){
	$code = md5(rand());
	 $iname =$code. $_FILES['img1']['name'];
	$tmp = $_FILES['img1']['tmp_name'];
	 $dir = "upload";
		       $destination =  $dir . '/' . $iname;
		         move_uploaded_file($tmp, $destination);
	 $iname1 =$code. $_FILES['img1']['name'];
	$iname1 = ($iname1);
	}else{
	 $iname1 = ($img1);
	}									
	

										

$ssq1=mysqli_query($link,"select * from ".$qottable." where id='$id'");
$r=mysqli_fetch_array($ssq1);
$ad=$r['adv_amnt'];
 $ad1=$r['adv_amnt1'];
$ad2=$r['adv_amnt2'];

if($mark=="yes"){
    
    $kp=mysqli_query($link,"update ".$qottable." set status='Not Required',markfile='$iname1',wd='$wd' where id='$id' ");
    
    
}else{

if($ad!=$adv_amnt and $adv_amnt>=1){
	
	$ssq2=mysqli_query($link,"insert into ".$request_amnt." (quet_num,req_amnt,req_date,user,state,ac_det,confirm,gstamt,gsttype)
	values('$qt_no','$adv_amnt','$adv_date','$ses','$state','$ac_det1','Pending','$gst_amount','$gst_type')");
}
if($ad1!=$adv_amnt1 and $adv_amnt1>=1){
	
	$ssq2=mysqli_query($link,"insert into ".$request_amnt." (quet_num,req_amnt,req_date,user,state,ac_det,confirm,gstamt,gsttype)
	values('$qt_no','$adv_amnt1','$adv_date1','$ses','$state','$ac_det2','Pending','$gst_amount1','$gst_type1')");
}
if($ad2!=$adv_amnt2 and $adv_amnt2>=1){
	
	$ssq2=mysqli_query($link,"insert into ".$request_amnt." (quet_num,req_amnt,req_date,user,state,ac_det,confirm,gstamt,gsttype)
	values('$qt_no','$adv_amnt2','$adv_date2','$ses','$state','$ac_det3','Pending','$gst_amount2','$gst_type2')");
}

		  $v= "update ".$qottable." set wd='$wd',adv_amnt='$adv_amnt',adv_amnt1='$adv_amnt1',adv_amnt2='$adv_amnt2',adv_date='$adv_date',
		 adv_date1='$adv_date1',adv_date2='$adv_date2',ac_det1='$ac_det1',ac_det2='$ac_det2',ac_det3='$ac_det3',bal='$bal',
		 gst_type='$gst_type',gst_type1='$gst_type1',gst_type2='$gst_type2',gst_amount='$gst_amount',gst_amount1='$gst_amount1',
gst_amount2='$gst_amount2',status='Request Amount' where id='$id' ";
	
	//ro_no='$ro_no',ro_date='$ro_date', po_no='$po_no',po_date='$po_date',po_type='$po_type',status='$status',
	$sq=mysqli_query($link,$v) or die(mysqli_error($link));
	
}
	

	/* $cnt = count($_POST['pname']);
	if ($cnt > 0 && $cnt == $cnt) {

for ($i=0; $i<$cnt; $i++) {
if( $_POST['pname'][$i]!='' ){
$pname=$_POST['pname'][$i];
$hsn=$_POST['hsn'][$i];
$gst=$_POST['gst'][$i];
$uom=$_POST['uom'][$i];
$qty=$_POST['qty'][$i];
$price=$_POST['price'][$i];
$gst_amnt=$_POST['gst_amnt'][$i];
$amnt=$_POST['amnt'][$i];
 $idk=$_POST['id1'][$i];
$serv_amnt=$_POST['serv_amnt'][$i];
$cap=$_POST['cap'][$i];
$serv_amt=$_POST['serv_amt'][$i];
$serv_amt=$_POST['serv_amt'][$i];
$serv_code=$_POST['serv_num'][$i];
 $id1=$_POST['id1'][$i];
 $id=$_POST['ids'];
$serv_codex=$_POST['serv_code'][$i];
   $id2=$_POST['id5'][$i];
   $brand=$_POST['brand'][$i];
$model=$_POST['model'][$i];
   
   if($id2!=''){
	   $query = "update ".$qottable1." set

`desc1`='".addslashes($pname)."', `hsn`='$hsn', `gst`='$gst', `uom`='$uom', `qty`='$qty', `gst_amnt`='$gst_amnt',
 `rate`='$price', `base_amt`='$amnt',item_id='$id1',serv_fee='$serv_amt',cap='$cap',serv_amt='$serv_amnt',
 serv_code='$serv_code',serv_cap='$serv_codex',brand='".addslashes($brand)."',model='".addslashes($model)."'
 where id='$id2' and id1='$id1'";





	  
 $res=mysqli_query($link,$query) or die(mysqli_error($link));
   }else{

  $query = "INSERT INTO ".$qottable1." ( `desc1`, `hsn`, `gst`, `uom`, `qty`, `gst_amnt`, `rate`, `base_amt`,`date`,`id1`,item_id,serv_fee,cap,serv_amt,serv_code,serv_cap) 
	VALUES 
 ('".addslashes($pname)."','$hsn','$gst','$uom','$qty','$gst_amnt','$price','$amnt','$date','$id','$id','$serv_amt','$cap','$serv_amnt','$serv_code','$serv_codex')";
 $res=mysqli_query($link,$query) or die(mysqli_error($link));
}
   
}
	}
	}*/
	//exit;
	
	//exit;
 	//$cnt = count($_POST['item_id1']);
	//if ($cnt > 0 && $cnt == $cnt) {

//for ($i=0; $i<$cnt; $i++) {
//if( $_POST['item_id1'][$i]!='' ){
//$pname=$_POST['pname'][$i];
//$hsn=$_POST['hsn'][$i];
//$gst=$_POST['gst'][$i];
//$uom=$_POST['uom'][$i];
//$qty=$_POST['qty'][$i];
//$price=$_POST['price'][$i];
//$gst_amnt=$_POST['gst_amnt'][$i];
//$amnt=$_POST['amnt'][$i];
//$id=$_POST['item_id1'][$i];
   

	//   $query = "update add_bill set   `qty`='$qty', `gst_amnt`='$gst_amnt',  `total_price`='$amnt' where id='$id'";
	  
	  
	  
 //$res=mysqli_query($link,$query) or die(mysqli_error($link));
  
//}
     
//}
	//}
	//exit;
		$state=$_GET['state'];

	if($sq){
	print "<script>";
	print "alert('Sucessfully Updated');";
	// print "self.location='wtsqot_list.php?state=$state';";
	print "self.location='wtsqot_list.php?state=$state';";


	print "</script>";

}
}



if(isset($_POST['update1'])){
$id=$_POST['id'];
$bar_code=$_POST['bar_code'];
	//$date=date('Y-m-d');
	$sub_date=$_POST['sub_date'];
	$payment_doc_date=$_POST['payment_doc_date'];
	$payment_doc_no=$_POST['payment_doc_no'];
$v="update `add_apbill1` set `qr_code`='$bar_code',bill_submit_date='$sub_date',`payment_doc_date`='$payment_doc_date',`payment_doc_no`='$payment_doc_no' where id='$id'";
$res=mysqli_query($link,$v) or die(mysqli_error($link));

if($res){
	print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='andhrabill_list.php';";
	print "</script>";
	
	
}


}


?>
