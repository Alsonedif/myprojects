<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<script src="scripts/jquery-3.3.1.min.js"></script>
<link href="styles/login.css" rel="stylesheet">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Krub" rel="stylesheet"> 
<title>eGame Login</title>
</head>

<body style="background-color: white;">

<?php
$error="";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
require(htmlspecialchars('reqfun/dbconnect.php'));
$username= test_input($_REQUEST['username']);
$password = test_input($_REQUEST['password']);
$sql = "Select username,password from users where username = '$username' LIMIT 1;";
         $result = mysqli_query($conn,$sql);
	     $row = mysqli_fetch_array($result);
	     if($username == $row['username'] && $password == $row['password']){
	     $randomnum = rand();
         $sql_cookie = "update users set L_RNG_Cookie='$randomnum' where username='$username';";
         $clientip = test_input($_SERVER['REMOTE_ADDR']);
         $sql_ip = "update users set L_IP='$clientip' where username='$username';";
         if(mysqli_query($conn,$sql_cookie)){
         setcookie('randomnum',$randomnum,time()+3600,'/');
         setcookie('username',$username,time()+3600,'/');
         mysqli_query($conn,$sql_ip);
         header('Location: '.'index.php');
         exit();
         }else {
         	$error = '<div class="alert alert-danger" role="alert">
  Username or password is wrong<BR> or you dont have Permission.
</div>';
         }

         }else {
	            $error = '<div class="alert alert-danger" role="alert">
  Username or password is wrong<BR> or you dont have Permission.
</div>';
               }

}
?>

<form id="ldiv" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
<div id="logo">
<img src="imgs/logo.png" style="width:200">
</div>
 <?php
  echo $error;
 ?>
</div>
<div id="in">
<span>Username:</span> 
<input type="username" class="form-control" placeholder="Enter username" name="username">
<span>Password:</span>
<input type="password" class="form-control" placeholder="Enter password" name="password">
<BR>
<button id="loginbtn" type="submit" class="btn btn-primary">Login</button>
<BR>
<a href="register.php">Register</a><span><a href='index.php'>Main menu</a></span>
</div>
</form>  
    


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>