<?php 
include('dbconnection/connection.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

 $id=$_GET['id'];
				/*  $str_arr = explode (",", $id);  
				  $array=explode(",",$id);


foreach($array as $value)
{

    $data=explode(":",$value);

       $id=$data[0];
*/
			 if($id!=''){
						$sq=mysqli_query($link,"select * from knrequest_amnt where id='$id'");
						$r=mysqli_fetch_array($sq);
						 $ac=$r['ac_det'];
											
											$transfer=$r['req_amnt'];
											$state=$r['state'];
											$qt_no=$r['quet_num'];
											$transfer_date=date('Y-m-d');
										
										
											
												$sq=mysqli_query($link,"select * from  add_knqot where quet_num='$qt_no' ");
												$r2=mysqli_fetch_array($sq);
												$req_amnt_settled1=$r2['req_amnt_settled'];
												$req_amnt_settled=$req_amnt_settled1+$transfer;
											
											$uy="update add_knqot set req_amnt_settled='$req_amnt_settled',status='Document Required' where quet_num='$qt_no'";
											$sq=mysqli_query($link,$uy) or die(mysqli_error($link));
																		
				
    									 $kk="update knrequest_amnt set transfer='$transfer',transfer_date='$transfer_date',status='Amount Transferred' where id='$id'";
									//	exit;
											$ssq=mysqli_query($link,$kk) or die(mysqli_error($link));
											
				 }
//}							
											
											
											
									
											
												print "<script>";
			print "alert('Amount Transferred Successfully');";
			print "self.location='knreq_list1.php';";
			print "</script>";
										?>
									