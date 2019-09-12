<?php
 require(htmlspecialchars('dbconnect.php'));
 if(isset($_COOKIE['username']) && isset($_COOKIE['randomnum'])){
 $username = test_input($_COOKIE['username']);
 }else {
 	     header('Location: '.'cpl.php');
         exit();
 }

  $clientip = test_input($_SERVER['REMOTE_ADDR']);
  $sql = "select L_RNG_Cookie,L_IP,Permission from users where username='$username' LIMIT 1;";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  if($row['L_RNG_Cookie'] == $_COOKIE['randomnum'] && $row['L_IP']== $clientip && $row['Permission'] == 1){
   setcookie('username',$_COOKIE['username'],time()+3600,'/');
   setcookie('randomnum',$_COOKIE['randomnum'],time()+3600,'/');
  }else {
  	     header('Location: '.'cpl.php');
         exit();

  	

  }

?>