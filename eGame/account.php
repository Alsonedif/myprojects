<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/mw.css">
    
    <title>eGame - Best Shop in the world</title>
    <script src="scripts/jquery-3.3.1.min.js"></script>
    <script src= "scripts/main.js"></script>
    <script>
    $.get('reqfun/product-get.php',{type:"product-cata"},function(data){
            $('.dropdown-content').html(data)});  
    </script>
  </head>
  <body>
    <?php 
    include('reqfun/checklogin-main.php');
    ?>
    <?php 
      if($_SERVER['REQUEST_METHOD'] == "POST"){
        $sql0 = "select Password from users where u_id=".$GLOBALS['account_id']." LIMIT 1;";
        $result = mysqli_fetch_assoc(mysqli_query($conn,$sql0));
        if($result['Password'] == $_POST['cupassword'] && !empty(test_input($_POST['email'])) && !empty(test_input($_POST['newpassword']))){
        $sql = "update users set email='".test_input($_POST['email'])."',Password='".$_POST['newpassword']."',N_first='".$_POST['fname']."',N_middle='".$_POST['mname']."',N_last='".$_POST['lname']."',Zip_code='".$_POST['zip']."',City_name='".$_POST['city']."',location='".$_POST['location']."' where U_ID=".$GLOBALS['account_id'].";";
              if($result = mysqli_query($conn,$sql)){
                     $sucess = "Saved!.";
                    }else {
                        #$error = mysqli_error($conn);
                    }
        }else {
            $error = "Something is wrong.";
        }
        
      }
      ?>
    <header>
    <div class="container‬">
        <a href="index.php"><img class="logo" src="imgs/logo.png"></a>
        
        <nav>
        
        <ul>
        <form action="search.php" method="get">
        <input type="search" style="width:300px;" name="w"><a onclick="$(this).closest('form').submit();" id="search" href="#" style=" padding: 8px;"><img src="imgs/search.png" style="width:40px; background-color:darkgrey;border-radius: 10px;"></a>
        </form>
        <li><a href="index.php">Home</a></li>    
        <li><div class="dropdown">
            <a href="myorders.php" style="padding:10px;">Catagories</a>
            <div class="dropdown-content">
            
            </div>
            </div></li>
        <li><a href="myorders.php">My orders</a></li>
        <li><a href="<?php if($GLOBALS['login'] == 'good'){ echo "account.php";}else {echo "login.php";} ?>"><?php
         if($GLOBALS['login'] == 'good'){
         echo $account_name;
         }else {
          header('Location: '.'index.php');
          exit();

         }
         ?></a></li>
        </ul>
        
        </nav>
        </div>
    </header>
    <?php
    $sql = "select * from users where u_id=".$GLOBALS['account_id']." LIMIT 1;";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <div class="profile">
        <div class='form-holder'>
        <form action='<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>' method="post">
         <span class="title">Your profile!</span>
         <span style="color:green;font-size:2vh;"><?php echo $sucess; ?></span>
         <span style="color:red;font-size:2vh;"><?php echo $error; ?></span>
         <span>Your email</span>
         <input type='email' name='email' required placeholder="email" value="<?php if(isset($row['email'])){ echo $row['email'];} ?>">
         <span>Your current password</span>
         <input type='password' name='cupassword' placeholder="password" required>
         <span>Your new password</span>
         <input type='password' name='newpassword' placeholder="password" required>
         <span>Your first name</span>
         <input type='text' name='fname' required placeholder="First name" value="<?php if(isset($row['N_first'])){ echo $row['N_first'];} ?>">
         <span>Your middle name</span>
         <input type='text' name='mname' required placeholder="Middle name" value="<?php if(isset($row['N_middle'])){ echo $row['N_middle'];} ?>">
         <span>Your last name</span>
         <input type='text' name='lname' required placeholder="Last name" value="<?php if(isset($row['N_last'])){ echo $row['N_last'];} ?>">
         <span>Your Zip-code</span>
         <input type='text' name='zip' required placeholder="Zip-code " value="<?php if(isset($row['Zip_code'])){ echo $row['Zip_code'];} ?>">
         <span>Your city name</span>
         <input type='text' name='city' required placeholder="Last city name" value="<?php if(isset($row['City_name'])){ echo $row['City_name'];} ?>">
         <span>Your location(address,etc)</span>
         <textarea rows="4" cols="50" required name="location" placeholder="Please type your location Address so we cand send you your items."><?php if(isset($row['location'])){ echo $row['location'];} ?></textarea>
         <br>
         <a class="buttons" href="#" onclick="$(this).closest('form').submit();">Save</a>
        </form>
        
        </div>
    </div>
      
      <footer><div> Copyright 2018 by Fahad Alsonedi ~ Alsonedif@gmail.com . All Rights Reserved.</div></footer>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>