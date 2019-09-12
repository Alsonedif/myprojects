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
        if($_POST['type'] == 'af'){
        $sql = "select quantity from product where P_ID=".$_POST['item-id']."";
        $result =mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        if($_POST['desquantity']<=$row['quantity']){
        $sql1 = "SET FOREIGN_KEY_CHECKS=0;";
        $sql2 = "insert into bill(P_method)values('".$_POST['paymentm']."');";
        $sql3 = "SET @BID = LAST_INSERT_ID();";
        $sql4 = "insert into has_2(B_ID,P_ID,Quantity)values(@BID,".$_POST['item-id'].",".$_POST['desquantity'].");";
        $sql5 = "insert into orders(O_Status,U_ID)values('Awating conformation',".$GLOBALS['account_id'].");";
        $sql6 = "SET @OID = LAST_INSERT_ID();";        
        $sql7 = "insert into has_1(O_ID,B_ID)values(@OID,@BID);";
        $sql8 = "SET FOREIGN_KEY_CHECKS=1;";     
                if(mysqli_query($conn,$sql1)){
                    if(mysqli_query($conn,$sql2)){
                        if(mysqli_query($conn,$sql3)){
                            if(mysqli_query($conn,$sql4)){
                                if(mysqli_query($conn,$sql5)){
                                    if(mysqli_query($conn,$sql6)){
                                        if(mysqli_query($conn,$sql7)){
                                            if(mysqli_query($conn,$sql8)){
                                                header('Location: '.'myorders.php');
                                                exit();
                                            }else {
                                                $error = "Something wrong.Error code : 8";
                                            }
                                        }else {
                                            $error = "Something wrong.Error code : 7";
                                        }
                                    }else {
                                        $error = "Something wrong.Error code : 6";
                                    }
                                }else {
                                    $error = "Something wrong.Error code : 5";
                                }
                            }else {
                                $error = "Something wrong.Error code : 4";
                            }
                        }else {
                            $error = "Something wrong.Error code : 3";
                        }
                    }else {
                        $error = "Something wrong.Error code : 2";
                    }
                }else {
                $error = "Something wrong.Error code : 1";
                }
        }else {
            $error = "Desierd Quantity above Avaliblty.";
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
            <a href="#" style="padding:10px;">Catagories</a>
            <div class="dropdown-content">
            
            </div>
            </div></li>
        <li><a href="myorders.php">My orders</a></li>
        <li><a href="<?php if($GLOBALS['login'] == 'good'){ echo "account.php";}else {echo "login.php";} ?>"><?php
         if($GLOBALS['login'] == 'good'){
         echo $account_name;
         }else {
          header('Location: '.'login.php');
          exit();

         }
         ?></a></li>
        </ul>
        
        </nav>
        </div>
    </header>
    <?php
    $sql = "select * from product where P_ID=".$_POST['item-id']." LIMIT 1;";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $sql1 = "select * from users where u_id=".$GLOBALS['account_id']."";
    $row1 = mysqli_fetch_assoc(mysqli_query($conn,$sql1));
    ?>
    <div class="profile">
        <div class='form-holder'>
        <form action='<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>' method="post">
         <span class="title">Buy conformation!</span>
         <span style="color:green;font-size:2vh;"><?php echo $sucess; ?></span>
         <span style="color:red;font-size:2vh;"><?php echo $error; ?></span>
         <span>Name of product</span>
         <input type='hidden' name='item-id' value="<?php echo $row['P_ID']; ?>">
         <input type='text' name='P_name' required placeholder="Product name" disabled value="<?php if(isset($row['P_name'])){ echo $row['P_name'];} ?>">
         <span>Product price</span>
         <input type='text' name='P_price' required placeholder="Price" disabled value="<?php if(isset($row['P_price'])){ echo $row['P_price'];} ?> SR">
         <span>Avalible Quantity</span>
         <input type='text' name='avquantity' required placeholder="Avalible Quantity" disabled value="<?php if(isset($row['quantity'])){ echo $row['quantity'];} ?>">
         <span>Desierd quantity</span>
         <input type='number' name='desquantity' min='1' max='<?php if(isset($row['quantity'])){ echo $row['quantity'];} ?>' required placeholder="How many do you want?">
         <span>Payment Method</span>
         <div class="paymentdiv">
         <input  type="radio" name="paymentm" value="Bank Transfer" required> Bank Transfer<input type="radio" name="paymentm" value="Paypal" disabled> Paypal <input type="radio" name="paymentm" value="Visa" disabled> Visa
         </div>
         <span>Your Zip-code</span>
         <input type='text' name='zip' required placeholder="Zip-code " value="<?php if(isset($row1['Zip_code'])){ echo $row1['Zip_code'];} ?>">
          <span>Your phone number</span>
         <input type='text' name='phonenumber' required placeholder="phone number" value="">
         <span>Your city name</span>
         <input type='text' name='city' required placeholder="Last city name" value="<?php if(isset($row1['City_name'])){ echo $row1['City_name'];} ?>">
         <span>Your location(address,etc)</span>
         <textarea rows="4" cols="50" required name="location" placeholder="Please type your location Address so we cand send you your items."><?php if(isset($row1['location'])){ echo $row1['location'];} ?></textarea>
         <input type="hidden" name="type" value="af">
         <br>
         <a class="buttons" href="#" onclick="$(this).closest('form').submit();">Buy</a>
        </form>
        
        </div>
    </div>
      
      <footer><div> Copyright 2018 by Fahad Alsonedi ~ Alsonedif@gmail.com . All Rights Reserved.</div></footer>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>