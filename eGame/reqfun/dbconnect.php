<?php
$serverip = "127.0.0.1";
$username = "root";
$password = "";
$db ="egaming";
$conn = mysqli_connect($serverip,$username,$password,$db);
if(!$conn){
	die("db connect error". mysql_error());
}
function test_input($data) {

  $data = trim($data);

  $data = stripslashes($data);

  $data = htmlspecialchars($data);

  return $data;

}
?>