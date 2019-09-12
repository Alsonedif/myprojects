<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Krub" rel="stylesheet">
    <link rel="stylesheet" href="styles/mw.css">
    <script src="scripts/jquery-3.3.1.min.js"></script>
    <script src= "scripts/main.js"></script>
    <script>
    $.get('reqfun/product-get.php',{type:"product-cata"},function(data){
            $('.dropdown-content').html(data)});  
    </script>
    <script type="text/javascript">
        $(document).on('click','.cancelbtn',function(){
            if(confirm("Are you sure you want to cancel this order ?")){
               $(this).closest('form').submit(); 
            }
        });
    </script>
    <title>eGame - My Orders</title>
      
  </head>
  <body style="background-color: white;">
   <?php
   require('reqfun/checklogin-main.php');
   if($GLOBALS['login'] == 'good'){
         
         }else {
          header('Location: '.'login.php');
          exit();
         }
   ?>
   <?php
   if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['id'])){
        $sql = "select U_ID from orders where O_ID=".$_POST['id'].";";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        if($row['U_ID'] == $account_id){
            $sql = "update orders set O_Status='Canceld' where O_ID=".$_POST['id'].";";
                    if(mysqli_query($conn,$sql)){
                        
                    }else {
                        echo "Something went wrong,code 1";
                    }
        }else {
            echo "Access Denied";
            exit();
        }

    }else {

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
        <li><a href="#">My orders</a></li>
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
   <div class="OrdersGroup">
    <table class="orderstable">
    <?php
            echo "<tr>";
            echo "<th>Order ID</th>";
            echo "<th>Order Status</th>";
            echo "<th>Order Date&Time</th>";
            echo "<th>Payment Method</th>";
            echo "<th>Product Name</th>";
            echo "<th>Price per unit</th>";
            echo "<th>Quantity</th>";
            echo "<th>Total Price</th>";
            echo "<th>Action</th>";
            echo "</tr>";
            $sql = "select orders.O_ID,orders.O_Status,bill.B_date_time,bill.P_method,P_name,P_PRICE,has_2.Quantity from orders INNER join has_1 ON has_1.O_ID = orders.O_ID
                    INNER join bill ON bill.B_ID = has_1.B_ID
                    INNER join has_2 ON bill.B_ID = has_2.B_ID  
                    INNER join product ON product.P_ID = has_2.P_ID AND bill.B_ID = has_2.B_ID
                    where orders.u_id = ".$GLOBALS['account_id'].";";
            
            $result = mysqli_query($conn,$sql);
            
            $i=0;
            while($row = mysqli_fetch_assoc($result)){
              if($row['O_Status'] != 'Canceld'){
              echo "<tr>";
              echo "<td><span class='info' id='cell".$i."1'  style='width:250px;height:30px;' >".$row['O_ID']."</td>";
              echo "<td><span class='info' id='cell".$i."2'  style='width:250px;height:30px;'>".$row['O_Status']."</td>";
              echo "<td><span class='info' id='cell".$i."3'  style='width:250px;height:30px;'>".$row['B_date_time']."</td>";
              echo "<td><span class='info' id='cell".$i."4'  style='width:250px;height:30px;'>".$row['P_method']."</td>";
              echo "<td><span class='info' id='cell".$i."5'  style='width:250px;height:30px;'>".$row['P_name']."</td>";
              echo "<td><span class='info' id='cell".$i."6'  style='width:250px;height:30px;'>".$row['P_PRICE']." SR</td>";
              echo "<td><span class='info' id='cell".$i."7'  style='width:250px;height:30px;'>".$row['Quantity']."</td>";
              echo "<td><span class='info' id='cell".$i."8'  style='width:250px;height:30px;'>".$row['P_PRICE']*$row['Quantity']." SR</td>";
              if($row['O_Status'] == 'Awating conformation'){
                echo "<td><form action='myorders.php' method='POST'><input type='hidden' name='id' value='".$row['O_ID']."'><a  href='#' class='cancelbtn'>
                Cencel</a></form></td>";
            }else {
                echo "<td>None</td>";
            }
              echo "</tr>";
              $i++;
            }
            }
          

    ?>
    </table>
    <span style="font-size:1vh;">If your payment method is bank transfer then you should transfer the money to <font color=red>Alinma Bank: SA4705000068201670781000</font>
    And after you transfer the money, you should send the Order number And Transfer Number to this <font color=red >email : Alsonedif@gmail.com </font>
    And after 3 days your order will be shipped to your address</span>
    </div>  
    <footer><div> Copyright 2018 by Fahad Alsonedi ~ Alsonedif@gmail.com . All Rights Reserved.</div></footer> 
      
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="styles/register.css" rel="stylesheet">
  </body>
</html>