<?php //include('config.php');
session_start();
$stn="TN";
include('dbconnection/connection.php');
if($_SESSION['user'])
{
 $name=$_SESSION['user'];
//include('org1.php');
include'dbfiles/org.php';
//include'dbfiles/iqry_acyear.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include'template/headerfile.php'; ?>
	 <script src="js/jquery.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
    <style>
        strong{
            color:red;
        }
    </style>
	
<script>
function showHint22(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	//document.getElementById("supname").value=strar[2];
	
	//document.getElementById("state").value=strar[1];
	
	//document.getElementById("city").value=strar[2];	
	document.getElementById("store_name").value=strar[1];	
	document.getElementById("state").value=strar[2];
    document.getElementById("state_code").value=strar[3];
	//document.getElementById("addr").value=strar[4];	
	document.getElementById("gst_in").value=strar[4];
	document.getElementById("store_type").value=strar[5];
	
	document.getElementById("supervisor").value=strar[6];
	document.getElementById("cordinator").value=strar[7];
	document.getElementById("afm").value=strar[8];
	document.getElementById("company").value=strar[9];
    }
  }
xmlhttp.open("GET","get-apdata3.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function myFunction() {
	var adv=document.getElementById('adv_amnt').value;
	var adv1=document.getElementById('adv_amnt1').value;
	var adv2=document.getElementById('adv_amnt2').value;
	var p=parseFloat(adv)+parseFloat(adv1)+parseFloat(adv2);
	var tot=document.getElementById('tot').value;
	if(tot < p){
alert('your advance amount is greater than total amount');
$("#submit").prop('disabled',true);
	}else{
		$("#submit").prop('disabled',false);
		
	}
}
</script>
	<script>
   
        function ConfirmDialog() {
  var x=confirm("Are you sure to delete record?")
  if (x) {
    return true;
  } else {
    return false;
  }
    }
    </script>
	<script>
 $(document).on('keyup', '.txt1', function(){
 var id=$(this).attr('data-row');
 
 var qty=document.getElementById('qty'+id).value;
 var price=document.getElementById('price'+id).value;
 
 //alert(price);
 bal=parseFloat(qty)*parseFloat(price);
 document.getElementById('amnt'+id).value=bal;
 calculateTotal1();
 calculateTotal1k();
 calculateTotal1kk();
 calculateTotal1kv();
 
 });
 
 
 $(document).on('keyup', '.txt20', function(){
 var id=$(this).attr('data-row');
 
 var amt=document.getElementById('amnt'+id).value;
 var sgst=document.getElementById('sgst'+id).value;
  var serv_amt=document.getElementById('serv_amt'+id).value;
 
 
 bal=(parseFloat(amt)*parseFloat(sgst))/100;
 //alert(sgst);
  ser=(parseFloat(amt)*parseFloat(serv_amt))/100;
 document.getElementById('sgstamt'+id).value=bal;
  document.getElementById('serv_amnt'+id).value=ser;
 calculateTotal2();
 
 });
 
 $(document).on('keyup', '.txt21', function(){
 var id=$(this).attr('data-row');
 
 var amt=document.getElementById('amnt'+id).value;
 var cgst=document.getElementById('sgst'+id).value;
 
 
 bal=(parseFloat(amt)*parseFloat(cgst))/100;
 document.getElementById('cgstamt'+id).value=bal;
 calculateTotal3();
 
 });
 
 
 function calculateTotal1(){
	subTotal = 0 ; total = 0; 
	$('.txt').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 
 
 function calculateTotal1kv(){
	subTotal = 0 ; total = 0; 
	$('.txt7').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot_serv').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 
  function calculateTotal1k(){
	subTotal = 0 ; total = 0; 
	$('.txt4').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot_gst').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 function calculateTotal1kk(){
	subTotal = 0 ; total = 0; 
	$('.txt5').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#net').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 
 function calculateTotal2(){
	subTotal = 0 ; total = 0; 
	$('.txt50').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#sgsttotal').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 function calculateTotal3(){
	subTotal = 0 ; total = 0; 
	$('.txt51').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#cgsttotal').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 
 </script>
    <body class="no-skin">
        <?php include'template/logo.php'; ?>

        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {
                }
            </script>

            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <script type="text/javascript">
                    try {
                        ace.settings.loadState('sidebar')} catch (e) {
                    }
                </script>

                <!-- /.sidebar-shortcuts -->
                <?php include'template/sidemenu.php' ?>
                <!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>
         

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="#">Home</a>
                            </li>
								<li>
                                <i class="ace-icon fa fa-cog home-icon"></i>
                                <a href="#">TN Quotations</a>
                            </li>
                            <li>
                                <a href="qot_list.php"> Quotations List</a>
                            </li>
                            <li>
                                <a href="">Edit Quotations</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Edit Quotations

                            </h1>
                        </div>
                        
                      
                        
                 <?php  $id=$_GET['id'];
						$sq=mysqli_query($link,"select * from add_tnqot where id='$id'");
						$r=mysqli_fetch_array($sq);
						
						?>             <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                       
 <form name="frm" method="post" action="tnroqot_suc.php" enctype="multipart/form-data">
 <input type="hidden" name="ids" value="<?php echo $id?>">
  <input type="hidden" name="ses" value="<?php echo $name;?>">
                                            <table class="table table-striped table-bordered table-hover">
											
											  <tr><td align="right">QuoteNumber</td><td align="left">
											  <input  type="text" readonly  class="form-control" value="<?php echo $r['quet_num'];?>"  name="qt_no" id="qt_no"></td>
                                        <td align="right">Quote Date</td><td><input type="text" value="<?php echo $r['inv_date'];?>" readonly   name="inv_date" id="inv_date" class="form-control"></td>
                                        </tr>
										
										
										  
										
										   <tr>
                                       <td align="right">PO Type</td><td align="left">
										<select name="po_type" class="form-control">
										<option value="<?php echo $r['po_type'];?>"><?php echo $r['po_type'];?></option>
										<option value="416">416</option>
										<option value="417">417</option>

</select>	</td>								
                                        </tr>
										 <tr><td align="right">RO Num</td><td align="left">
										<input type="text"  name="ro_no" id="ro_no" value="<?php echo $r['ro_no'];?>" class="form-control"></td>
                                        <td align="right">RO date</td><td><input type="date" name="ro_date" 
										id="ro_date"  class="form-control" value="<?php echo date('Y-m-d');?>"></td>
                                        </tr>
										
                                        <tr><td align="right">PO Num</td><td align="left">
										<input type="text"  name="po_no" id="po_no" value="<?php echo $r['po_no'];?>" class="form-control"></td>
                                        <td align="right">PO date</td><td><input type="date" name="po_date" 
										id="po_date"  class="form-control" value="<?php echo date('Y-m-d');?>"></td>
                                        </tr>
										
										
										
										
										
                                        </table>
                                        <?php  $tt=$r['total_amnt'];
										$tt1=$r['total_sgst'];
										$inv_no=$r['invoice_no'];
										
										?>
                                        
                                        <div class="table-header">
                                         Items  List
                                        </div>
                                        
                                        <?php 
										//$aa="select * from add_bill where id1='$id'";
										/*$aa="select a.item_desc,a.hsn,a.sac,b.qty,b.price,b.tax_amnt,b.gst_amnt,b.sgst,b.cgst,
										sum(b.tax_amnt) as tax,sum(b.gst_amnt) as gs
 from add_bill b,products a where b.service_no='$service_no' and b.item_code=a.item_code and a.category=b.temp_type";*/
//$/t=mysqli_query($link,$aa) or die(mysqli_error($link));?>

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div>
                                       
                                      
                                          
                                           <!-- <div align="right">
	
<button type="button" class='btn btn-success addmore'>+</button>
<button type="button" class='btn btn-danger delete'>-</button>
	</div>-->
                                            <div class="table-responsive">
                                            <table id="dynamic-table1" class="table table-striped table-bordered table-hover">
 
                                            
                                             <tr>
														<th>C</th>
														<th>ID</th>
													
														<th> Description</th>
														<th> Service Id</th>
														<th> Brand/Make</th>
														<th> Model</th>
                                                        <th>HSN<br/> /SAN Code</th>
                                                         <th>GST</th>
                                                        <th>UOM</th>
                                                        <th>QTY</th>
                                                        <th>RATE</th>
														<th>BASE AMOUNT</th>
                                                        <th>SERVICE FEE(6%)</th>
													    <th>GST AMOUNT(18%)</th>
                                                     <th>Service Amount</th>
                                                     
														</tr>
														<tbody>
                                                        <!--<th>HSN</th>
                                                        <th>SAC</th>
                                                        <th>Item Category</th>-->
                                              
											<?php   $id=count($_POST['id']);
											 $id1=$_GET['id'];
											 $aa="select * from add_tnqot1 where id1='$id1'";
												$sq=mysqli_query($link,$aa);
												$i=1;
												while($rs1=mysqli_fetch_array($sq)){
												
													?>
                                                    <tr>
													
													<td><?php echo $i;?> <input type="hidden" name="cnt" id="cnt" value="<?php echo $cnt; ?>"></td>
                                                    <td width="20px;">
													
												<?php if($rono!=''){ }else{ ?>	
									<a onclick="return confirm('Are you sure you want to delete this item?');" href='delete_tnline.php?id=<?php echo $rs1['id']; ?>&id1=<?php echo $rs1['id1'];?>'><input type="button" class="btn btn-danger" value="Delete"></button>
							</a>
							<?php }?>
							<input type="hidden" name="sno[]" style="width:30px;" value="<?php echo $rs1['sno']; ?>">
							<input type="hidden" name="id1[]" style="width:30px;" value="<?php echo $rs1['id1']; ?>">
							<input type="hidden" name="id5[]" style="width:30px;" value="<?php echo $rs1['id']; ?>">
													
													</td>
													    <td class="hidden-480">
														
                            <input type="text" name="pname[]" style="width:100px;" <?php if($rono!=''){ echo 'readonly';}else{echo ''; } ?>  value="<?php echo $rs1['desc1']; ?>">
                                                        </td>
                                                        <td class="hidden-480">
														<input type="text" name="serv_num[]" <?php if($rono!=''){ echo 'readonly';}else{echo ''; } ?>  style="width:100px;" value="<?php echo $rs1['serv_code']; ?>"></td>
                                                    <td class="hidden-480">
														<input type="text" name="brand[]" <?php if($rono!=''){ echo 'readonly';}else{echo ''; } ?>  style="width:100px;" value="<?php echo $rs1['brand']; ?>"></td>
														<td class="hidden-480">
														<input type="text" name="model[]" <?php if($rono!=''){ echo 'readonly';}else{echo ''; } ?>  style="width:100px;" value="<?php echo $rs1['model']; ?>"></td>
														
													
                                                        <td class="hidden-480">
							<input type="text" name="hsn[]" value="<?php echo $rs1['hsn']; ?>" <?php if($rono!=''){ echo 'readonly';}else{echo ''; } ?>  style="width:70px;">
														</td>
														
														  <td class="hidden-480">
							<input type="text" name="gst[]" value="<?php echo $rs1['gst']; ?>" <?php if($rono!=''){ echo 'readonly';}else{echo ''; } ?>  id="gst<?php echo $i?>" style="width:70px;">
														</td>
                                                         <td>
							<input type="text" name="uom[]" value="<?php echo $rs1['uom']; ?>" style="width:60px;" data-row="<?php echo $i?>" class=""  /> 
														</td>
                                                        <td>
							<input type="text" name="qty[]" value="<?php echo $rs1['qty']; ?>" style="width:60px;" data-row="<?php echo $i?>" class="" id="qty<?php echo $i?>" onkeyup='val(this.value,<?php echo $i?>)' /> 
														</td>
														
                                                        <td class="hidden-480">
                            <input type="text" name="price[]" id="price<?php echo $i?>" style="width:70px;" data-row="<?php echo $i?>" value="<?php echo $rs1['rate']; ?>" class="txt1" onkeyup='val(this.value,<?php echo $i?>)' />
                                                        </td>
														  <td>
						<input type="text" name="amnt[]" value="<?php echo $rs1['base_amt']; ?>"  style="width:60px;" readonly class='txt tx6' data-row="<?php echo $i?>" id="amnt<?php echo $i?>" />
														</td>
														
														 <td>
						<input type="text" name="serv_amnt[]" value="<?php echo $rs1['serv_amt']; ?>" style="width:60px;" readonly class='txt7 ' data-row="<?php echo $i?>" id="serv_amnt<?php echo $i?>" />
														</td>
														
														 <td>
						<input type="text" name="gst_amnt[]" value="<?php echo $rs1['gst_amnt']; ?>" style="width:60px;" readonly class='txt4 ' data-row="<?php echo $i?>" id="gst_amnt<?php echo $i?>" />
														</td>
														<td>
						<input type="text" name="serv_amt[]" value="<?php echo $rs1['serv_fee']; ?>" <?php if($rono!=''){ echo 'readonly';}else{echo ''; } ?>  style="width:60px;" class="txt21" data-row="<?php echo $i?>"    id="serv_amt<?php echo $i?>" />
														</td>
                                                       <td>
						<input type="hidden" name="cap[]" value="<?php echo $rs1['cap']; ?>" style="width:60px;" class="txt20"  data-row="<?php echo $i?>"  id="cap<?php echo $i?>" />
														</td>
														
                                                        
                                                      
                                                       <td>
						<input type="hidden" name="serv_code[]" value="<?php echo $rs1['serv_cap']; ?>" style="width:50px;" class="" id="serv_code<?php echo $i?>" />	   
													   </td>
                                                        
                                                       <?php /*?>  <input type="hidden" name="gst[]" readonly  value="<?php echo $rs1['cgst']; ?>" id="gst<?php echo $i?>" /><?php */?>
                                                      
                                                      

                                                      
                                                      
                                                     
                                                        </tr>
                                                        
                                                    
                                                    <?php 
													
											$i++;
											}
											 //$id=$_POST['id'];
											
									?>
                                        <tr><td colspan="11" align="right"><strong>NET AMOUNT</strong></td>
										<td>
										<input style="width:60px;" type="text"  placeholder="Total Amount" readonly name="tot" class="txt5" value="<?php echo $r['tot_base'];?>" id="tot" />+
                                       
									</td>
									<td><input style="width:60px;" type="text" readonly placeholder="Total Serv" name="tot_serv" class="txt5" value="<?php echo $r['tot_ser'];?>" id="tot_serv" />+
									</td>
                                        <td colspan="1">
										
										<input style="width:60px;" type="text" readonly placeholder="Total Gst" name="tot_gst" class="txt5" value="<?php echo $r['tot_gst'];?>" id="tot_gst" />=
									
										 <input type="hidden" name="tot1" id="tot1" value="<?php echo $tt1?>" />
                                        </td>
											
										<td colspan=""><input style="width:60px;" type="text" placeholder="Total Net Amount" readonly name="net" value="<?php echo $r['net'];?>" id="net" /></td>
										</tr>
										</tbody>
                                        </table>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                          
                                        <?php if($inv_no==''){?>
									
										<button class="btn btn-info" type="submit" name="update" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Update
                                            </button>
										
										<?php }?>
									

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="tnroqot_list.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
                                        </form>
                                        </div></div></div></div></div></div></div>
                                    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>   
                                    <script src="assets/js/jquery-2.1.4.min.js"></script>  
                                      <script type="text/javascript">
var i=100;

$(".addmore").on('click',function(){
    i++; 
	var data ="<tr>";
    data +="<td><input type='checkbox' class='case'/></td>";
	
    data +="<td><input type='hidden' name='id1[]' id='id1"+i+"' style='width:30px;' data-row='"+i+"' value='<?php echo $id ?>'><input type='hidden' name='id5[]' id='id5"+i+"' style='width:30px;' data-row='"+i+"' value=''><input data-row='"+i+"' type='text' name='sno[]' id='sno"+i+"' style='width:30px;' value=''></td>";          
   data +="<td><input type='text' name='pname[]' id='pname"+i+"' style='width:100px;' data-row='"+i+"' value=''  onclick=window.open('Drug_itemcode_pop1.php?rowid="+i+"','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no')></td>";
data +="<td><input type='text' name='serv_num[]' data-row='"+i+"' value='' style='width:60px;'  class='' id='serv_num"+i+"' /> </td>";          
  data +="<td><input type='text' name='brand[]' data-row='"+i+"' value='' style='width:60px;'  class='' id='brand"+i+"' /> </td>";          
data +="<td><input type='text' name='model[]' data-row='"+i+"' value='' style='width:60px;'  class='' id='model"+i+"' /> </td>";                   
 
	  data +="<td><input type='text' name='hsn[]' readonly value='' style='width:50px;'  id='hsn"+i+"' />	   </td>";
	   data +="<td> <input type='text' name='gst[]' readonly data-row='"+i+"'  value='' style='width:60px;' class='txt20'   id='gst"+i+"' /></td>";          
     
    data +="<td><input type='text' name='uom[]' readonly id='uom"+i+"' value='' style='width:70px;' data-row='"+i+"'></td>";
	 data +="<td><input type='text' name='qty[]'  data-row='"+i+"' value='' style='width:60px;' class=' ' id='qty"+i+"' onkeyup='val(this.value)' /> </td>"; 
	 
	data +="<td><input type='text' name='price[]' readonly data-row='"+i+"' id='price"+i+"' style='width:70px;' value='' class='txt1 ' onkeyup='val(this.value,"+i+")' /></td>";
data +="<td><input type='text' name='amnt[]' data-row='"+i+"' value='' style='width:60px;' readonly class='txt tx6' id='amnt"+i+"' /> </td>";          
      data +="<td><input type='text' name='serv_amnt[]' data-row='"+i+"' value='' style='width:60px;' class='txt7 ' readonly  id='serv_amnt"+i+"' /> </td>";          
   
   data +="<td><input type='text' name='gst_amnt[]' data-row='"+i+"' value='' style='width:60px;' class='txt4 ' readonly  id='gst_amnt"+i+"' /> </td>";          
   
   	data +="<td><input type='hidden' name='id[]' data-row='"+i+"' value='' style='width:60px;' readonly class='' id='id"+i+"' /> </td>";          
   	data +="<td><input type='hidden' name='cap[]' data-row='"+i+"' value='' style='width:60px;' readonly class='' id='cap"+i+"' /> </td>";          
   	data +="<td><input type='hidden' name='serv_amt[]' data-row='"+i+"' value='' style='width:60px;' readonly class='' id='serv_amt"+i+"' /> </td>";          
   	data +="<td><input type='hidden' name='serv_code[]' data-row='"+i+"' value='' style='width:60px;' readonly class='' id='serv_code"+i+"' /> </td>";          
   	
	data +="</tr>";
	$('#dynamic-table1 ').append(data).find('#dynamic-table1>tbody>tr:nth-child(2)');
	

	});
function select_all() {
	$('input[class=case]:checkbox').each(function(){ 
		if($('input[class=check_all]:checkbox:checked').length == 0){ 
			$(this).prop("checked", false); 
		} else {
			$(this).prop("checked", true); 
		} 
	});
}




</script> 

<script type="text/javascript">

function val(str,id)
{
cal=0;
cal1=0;
cal12=0;
var price=document.getElementById("price"+id).value;

var qty=document.getElementById("qty"+id).value;
var gst=document.getElementById("gst"+id).value;
//alert(gst);
var serv_amt=document.getElementById("serv_code"+id).value;
//alert(serv_amt);

//var cgst=document.getElementById("cgst"+id).value;
//var gst=Math.abs(sgst)+Math.abs(cgst);
cal=eval(price)*eval(qty);
//alert(cal);
document.getElementById("amnt"+id).value=Math.abs(cal);	
cal12=eval(price)*eval(qty)*eval(serv_amt)/100;
cal1=eval(price)*eval(qty)*eval(gst)/100;
calk=(cal)+(cal12);
//alert(calk);
cal1=eval(calk)*eval(gst)/100;


document.getElementById("gst_amnt"+id).value=Math.abs(cal1);	


//document.getElementById("gst_amnt"+id).value=cal1;
//alert(cal12);
document.getElementById("serv_amnt"+id).value=Math.abs(cal12);	
//document.getElementById("serv_amnt"+id).value=cal12;



}


$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('#check_all').prop("checked", false); 
	calculateTotal1();
	calculateTotal2();
	calculateTotal3();
});

</script>
<script src="assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
                            if ('ontouchstart' in document.documentElement)
                                document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- page specific plugin scripts -->
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
        <script src="assets/js/dataTables.buttons.min.js"></script>
        <script src="assets/js/buttons.flash.min.js"></script>
        <script src="assets/js/buttons.html5.min.js"></script>
        <script src="assets/js/buttons.print.min.js"></script>
        <script src="assets/js/buttons.colVis.min.js"></script>
        <script src="assets/js/dataTables.select.min.js"></script>

        <!-- ace scripts -->
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>
		
</body>
</html>
<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>
