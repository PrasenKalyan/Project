<?php
include('dbconnection/connection.php');
?>

<?php
$q=urldecode($_POST["q"]);

echo $sql="SELECT *  FROM knitems WHERE mdescription = '$q' union SELECT *  FROM ritems WHERE mdescription = '$q' limit 1";

$result = mysqli_query($link,$sql);


while($row = mysqli_fetch_array($result))
  {
 // echo ":" . $row['SUPPL_NAME'];
  //echo ":" . $row['state'];
  
   //echo ":" . $row['city'];
   
   echo ":" . $row['service_code'];
   echo ":" . $row['hsncode'];
   echo ":" . $row['gst'];
	  
	    //echo ":" . $row['address'];
   echo ":" . $row['umo'];
   echo ":" . $row['urate'];
   echo ":" . $row['service_fee'];
   echo ":" . $row['product_code'];
  
    
  //$d1= date("Y-m-d", strtotime($d));
	  //echo ":" . $d1;
  //echo "</tr>";
  }

?>     