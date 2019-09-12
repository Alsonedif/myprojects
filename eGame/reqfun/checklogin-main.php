<?php
 error_reporting(E_ALL ^ E_NOTICE); 
 error_reporting(E_ERROR | E_PARSE);
 require(htmlspecialchars('dbconnect.php'));
 $account_name;
 $login;
 if(isset($_COOKIE['username']) && isset($_COOKIE['randomnum'])){
  $username = test_input($_COOKIE['username']);
 $clientip = test_input($_SERVER['REMOTE_ADDR']);
  $sql = "select U_ID,username,L_RNG_Cookie,L_IP from users where username='$username' LIMIT 1;";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
    if($row['L_RNG_Cookie'] == $_COOKIE['randomnum'] && $row['L_IP']== $clientip && $username == $row['username']){
    setcookie('randomnum',$_COOKIE['randomnum'],time()+3600,'/');
    setcookie('username',$_COOKIE['username'],time()+3600,'/');
    $account_name = $row['username'];
    $account_id = $row['U_ID'];
    $login = 'good';

  }else {
         $login=false;

    

  }
 
 }else {
 	     $login = false;

 }

  

?>