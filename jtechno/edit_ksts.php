<?php //include('config.php');
session_start();
//include('dbconnection/connection.php');
if($_SESSION['user'])
{
 $name=$_SESSION['user'];
//include('org1.php');
//include'dbfiles/org.php';
//include'dbfiles/iqry_acyear.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include'template/headerfile.php'; ?>
    <style>
        strong{
            color:red;
        }
    </style>
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
                
                 <script src="js/jquery.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>

<script>
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#register-form").validate({
    
        // Specify the validation rules
        rules: {
            req_ref: {
					   required: true,
					
					   remote: "emailcheck.php?data=req_ref"
					},
			
			
				  
				   
		
            
        },
        
       
        messages: {
            req_ref: { 	  required: "<strong style='color:#FF0000;font-size:14px;'>Please enter Request Number</strong>",
							<!--minlength:"<strong style='color:#FF0000;font-size:14px;'>Mobile Number must have minimum  10 letters</strong>",-->
					       remote: "<strong style='color:#FF0000;font-size:14px;'>Request Number Allready Entered </strong>"
				  },
			
			
			
			
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>
  <script type="text/javascript">
function report()
{
   		

	  window.open('list.php','mywindow1','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes')

	
}
</script>

       <script type="text/javascript" src="jquery-1.11.0.min.js"></script>
     
<script>
$(document).on('keyup ','.changesNo2',function(){
	
	id = $(this).attr('data-row');
	
	//alert(id);
	days1 = $('#uom1'+id).val();
	//alert(days1);
	amount1 = $('#amountk1'+id).val();
		//alert(amount10);
		ds=(parseFloat(days1)*parseFloat(amount1)).toFixed(2);
		
	mm= $('#total1'+id).val(ds);
	ser=(ds*8/100).toFixed(2);
	gst=(ds*18/100).toFixed(2);
	
	//alert(ser);
var tt=document.getElementById("total1"+id).value;
var stax=document.getElementById("service1"+id).value;
document.getElementById("service1"+id).value=ser;
document.getElementById("gst1"+id).value=gst;
	//alert(ser);
	tamount11 = $('#tdramount').val();
	//alert(tamount11);
	var dtot=document.getElementById("tdramount").value;
	var tx=document.getElementById("tot_tax").value;
	//var tot=document.getElementById("tot").value;
	
//alert(dtot);
var nn=eval(dtot)+eval(tt);
var nn1=eval(tx)+eval(stax);
//alert(nn);
//document.getElementById("tdramount").value=eval(nn);

	//calculateTotal();
	//calculateTotal22();
	
});

$(document).on('keyup ','.tet4',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );

	calculateTotal3();
	
	});
	
	function calculateTotal3(){
	subTotal = 0 ; total = 0; 
	$('.tet4').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tdramount').val(subTotal.toFixed(2) );
	t=$('#tdramount').val();

	//$('#tot').val(subTotal.toFixed(2));
	
	
}



$(document).on('keyup ','.tet5',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)*8/100).toFixed(2) );

	calculateTotal4();
	
	});
	
	function calculateTotal4(){
	subTotal = 0 ; total = 0; 
	$('.tet5').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot_tax').val(subTotal.toFixed(2) );
	t=$('#tot_tax').val();

	//$('#tot').val(subTotal.toFixed(2));
	
	
}

$(document).on('keyup ','.tet7',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)*18/100).toFixed(2) );

	calculateTotal5();
	
	});
	
	function calculateTotal5(){
	subTotal = 0 ; total = 0; 
	$('.tet7').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot_gst').val(subTotal.toFixed(2) );
	t=$('#tot_gst').val();

	$('#tot_gst1').val((subTotal/2).toFixed(2));
	$('#tot_gst2').val((subTotal/2).toFixed(2));
	
	
}


$(document).on('keyup ','.tet8',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );

	calculateTotal8();
	
	});
	
	function calculateTotal8(){
	subTotal = 0 ; total = 0; 
	$('.tet8').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot').val(subTotal.toFixed(2) );
	t=$('#tot').val();

	$('#txtTot1').val(subTotal.toFixed(2));
	
	
}

</script>  


 <!--tot_gst-->
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
                                <i class="ace-icon fa fa-cog home-icon"></i>
                                <a href="dashboard.php">Settings</a>
                            </li>
								<li>
                                <i class="ace-icon fa fa-upload home-icon"></i>
                                <a href="addkstn.php"> Upload TN and KL Employees</a>
                            </li>
                            <li>
                                 <i class="ace-icon fa fa-edit home-icon"></i>
                                <a href="edit_ksts.php"> Edit KS TN Employee</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">	
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Edit KS TN Employee

                            </h1>
                        </div>
                        
                          <script>
  function showUser(str)
{

if (str=="")

  {

  document.getElementById("state").innerHTML="";

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

	document.getElementById("city").innerHTML=show;
    }

  }

xmlhttp.open("GET","get-data.php?q="+str,true);

xmlhttp.send();

}

</script>
                        
                        <?php
include('dbconnection/connection2.php');
						$id=$_GET['id'];
						 $y="select * from register where id='$id' ";
											$t=mysqli_query($link1,$y) or die(mysqli_error($link1));
											$r=mysqli_fetch_array($t);?>
                        <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                       
 <form name="frm" method="post" id="register-form" action="sksts_suc.php">
                                            <table class="table table-striped table-bordered table-hover">
                                                
                                                <tr> <td align="right">Name </td><td>
										 <input type="text" name="name" id="name" value="<?php echo $r['name'];?>" required class="form-control"></td>
                                           <td align="right">Mobile No</td><td>
                                          <input type="text" name="mobile" id="mobile" value="<?php echo $r['phoneno'];?>" required class="form-control">
                                        
                                       </td></tr>
                                       <tr> <td align="right">Email </td><td>
										 <input type="text" name="email" id="email" value="<?php echo $r['email'];?>" required class="form-control"></td>
                                           <td align="right">Category</td><td>
                                          <input type="text" name="category" id="category" value="<?php echo $r['category'];?>" required class="form-control">
                                        
                                       </td></tr>
                                       <tr> <td align="right">State </td><td>
										 <select name="state" id="state" required class="form-control">
										  <option value="">State</option>
										  <option value="KS" <?php if($r['state']=="KS"){ echo 'selected';} ?>>KL</option>
										  <option value="TN" <?php if($r['state']=="TN"){ echo 'selected';} ?>>TN</option>
										  
										  </select>
										     
										 </td>
                                           <td align="right">Password</td><td>
                                          <input type="text" name="password" id="password" value="<?php echo $r['password'];?>" required class="form-control">
                                        
                                       </td></tr>
                                                
                                                
                                                
                                                
                                                
                                                
                                            <tr> <td align="right">Date </td><td>
										 <input type="date" name="date" id="date" value="<?php echo date('Y-m-d',strtotime($r['date']));?>" required class="form-control"></td>
                                           <td align="right">Time</td><td>
                                          <input type="text" name="time" id="time" value="<?php echo $r['time'];?>" required class="form-control">
                                        
                                       </td></tr>
                                        
                                        <tr>
                                         <td align="right">Logged IN</td><td>
                                        <select name="loggedin" id="loggedin" required class="form-control">
                                        <option value="">Select</option>
                                        <option value="nactive" <?php if($r['loggedin']=="nactive"){ echo 'selected';} ?>>nactive</option>
                                         <option value="blocked" <?php if($r['loggedin']=="blocked"){ echo 'selected';} ?>>blocked</option>
                                        
                                        </select>
                                       </td>
                                        <td align="right">Designation</td><td>
                                        <input type="text" name="designation" id="designation" value="<?php echo $r['designation'];?>" required class="form-control">
                                        
                                       </td>
                                      
                                        </tr>
                                         <tr>
                                         <td align="right">Location</td><td>
                                        <input type="text" name="location" id="location" value="<?php echo $r['location'];?>" required class="form-control">
                                       </td>
                                        
                                      
                                        </tr>
										  <tr>
                                         <td align="right">Bank Name</td><td>
                                        <input type="text" name="bank" id="bank" value="<?php echo $r['bank_name'];?>" required class="form-control">
                                        
                                       </td>
                                        <td align="right">PF No Name</td><td>
                                        <input type="text" name="pfno" id="pfno" value="<?php echo $r['pfnumber'];?>" required class="form-control">
                                         <input type="hidden" name="id" id="id" value="<?php echo $r['id'];?>" required class="form-control">
                                       </td>
                                      
                                        </tr>
                                      
                                    <tr>
                                         <td align="right">PF UAN</td><td>
                                        <input type="text" name="pfuan" id="pfuan" value="<?php echo $r['pfuan'];?>" class="form-control">
                                        
                                       </td>
                                        <td align="right">Esi Number</td><td>
                                        <input type="text" name="esinumber" id="esinumber" value="<?php echo $r['esinumber'];?>"  class="form-control">
                                        
                                       </td>
                                      
                                        </tr>
										
										<tr>
                                         <td align="right">Ac NO</td><td>
                                        <input type="text" name="acno" id="acno"  value="<?php echo $r['acno'];?>" class="form-control">
                                        
                                       </td>
                                        <td align="right">Absents</td><td>
                                        <input type="text" name="absents" id="absents" value="<?php echo $r['absents'];?>" required class="form-control">
                                        
                                       </td>
                                      
                                        </tr>
                                     <tr>
                                         <td align="right">Basic</td><td>
                                    <input type="text" name="basic" id="basic" value="<?php echo $r['basic'];?>" required class="form-control">
                                        
                                       </td>
                                        <td align="right">
										
										
										Others</td>
										<td>
                                 <input type="text" name="others" value="<?php echo $r['others'];?>" class="form-control">
                                        
                                     
                                       
                                       </td>
                                      
                                        </tr>
                                         <tr>
                                         <td align="right">Take Home</td><td>
                                        <input type="text" name="takehome" id="takehome" required class="form-control" value="<?php echo $r['takehome'];?>">
                                        
                                       </td>
                                        <td align="right">Daf</td><td>
                                        <input type="text" name="daf" id="daf" required class="form-control" value="<?php echo $r['daf'];?>">
                                        
                                       </td>
                                      
                                        </tr>
                                         
                                         
                                         <tr>
                                         <td align="right">Level1</td><td>
                                        <input type="text" name="level1" id="level1" required class="form-control" value="<?php echo $r['level1'];?>">
                                        
                                       </td>
                                        <td align="right">Level2</td><td>
                                         <input type="text" name="level2" id="level2" required class="form-control" value="<?php echo $r['level2'];?>">
                                        
                                       </td>
                                      
                                        </tr>
                                         
                                         
                                         
                                         
                                         <tr>
                                         <td align="right">Level3</td><td>
                                        <input type="text" name="level3" id="level3" required class="form-control" value="<?php echo $r['level3'];?>">
                                        
                                       </td>
                                        <td align="right">Level4</td><td>
                                         <input type="text" name="level4" id="level4" required class="form-control" value="<?php echo $r['level4'];?>">
                                        
                                       </td>
                                      
                                        </tr>
                                         
                                         <tr>
                                         <td align="right">Level5</td><td>
                                        <input type="text" name="level5" id="level5" required class="form-control" value="<?php echo $r['level5'];?>">
                                        
                                       </td>
                                        <td align="right">Level6</td><td>
                                         <input type="text" name="level6" id="level6" required class="form-control" value="<?php echo $r['level6'];?>">
                                        
                                       </td>
                                      
                                        </tr>
                                         
                                         
                                         <tr>
                                         <td align="right">Level7</td><td>
                                        <input type="text" name="level7" id="level7" required class="form-control" value="<?php echo $r['level7'];?>">
                                        
                                       </td>
                                        <td align="right">Level8</td><td>
                                         <input type="text" name="level8" id="level8" required class="form-control" value="<?php echo $r['level8'];?>">
                                        
                                       </td>
                                      
                                        </tr>
                                         
                                         
                                        </table>
                                        
                                         
                                         
										
                                          
                                            
                                            
                                            
                                        
                                        <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button class="btn btn-info" type="submit" name="update" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Update
                                            </button>

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="addkstn.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
                                        </form>
                                        </div></div></div></div></div></div></div>
                                        
                                        
                                        <!--<script src="assets/js/jquery-2.1.4.min.js"></script>-->

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
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script> 
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>

        <!-- ace scripts -->
       <!-- <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>-->
                                        
                                    <!--<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>   
                                    <script src="assets/js/jquery-2.1.4.min.js"></script>-->  
                                      <script type="text/javascript">

function val(str,id)
{
cal=0;

var price=document.getElementById("price"+id).value;
var qty=document.getElementById("qty"+id).value;
var sgst=document.getElementById("sgst"+id).value;
var cgst=document.getElementById("cgst"+id).value;
var gst=Math.abs(sgst)+Math.abs(cgst);
cal=eval(price)*eval(qty);
document.getElementById("amnt"+id).value=Math.abs(cal);	

cal1=eval(price)*eval(qty)*eval(gst)/100;
document.getElementById("gst_amnt"+id).value=Math.abs(cal1);



}</script>
<script>
$(document).ready(function(){
$(".txt1").each(function(){
$(this).keyup(function(){
calculateSum();
});
});
});
function calculateSum(){
var sum=0;
$(".txt").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#tot").val(sum.toFixed(2));

}
</script> 

<script>
$(document).ready(function(){
$(".txt2").each(function(){
$(this).keyup(function(){
calculateSum1();
});
});
});
function calculateSum1(){
var sum=0;
$(".txt3").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#tot1").val(sum.toFixed(2));

}
</script> 

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
