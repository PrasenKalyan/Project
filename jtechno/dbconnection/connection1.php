<?php
//include('config.php');
define("HOST_NAME","localhost");
define("USER","root");
define("PASSWORD","");
define("DB","a16673ai_jfm2324");
$link=mysqli_connect(HOST_NAME,USER,PASSWORD,DB);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
error_reporting(0);
?>