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
          echo "Sign in / Register";

         }
         ?></a></li>
        </ul>
        
        </nav>
        </div>
    </header>
    <div class="product-container">
      <?php
      if(isset($_GET['id'])){
            $sql="select * from product p1 inner join sorted_under p2 ON p1.P_ID = p2.P_ID AND p2.C_ID = ".$_GET['id']." LIMIT 0,24;";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){
                echo "<div class='product-det'>";
                echo "<a id='".$row['P_ID']."' href='item.php?id=".$row['P_ID']."''><img class='prod-img' src='".$row['img']."'></a>";
                echo "<span class='name'><a id='".$row['P_ID']."' href='item.php?id=".$row['P_ID']."''>".$row['P_name']."</a></span>";
                echo "<span class='price'><a id='".$row['P_ID']."' href='item.php?id=".$row['P_ID']."'>".$row['P_price']." SR</a></span>";
                echo "</div>";
              }
          }else {
            echo mysqli_error($conn);
            
            
          } 

      }

      ?>
    </div>
      
      <footer> Copyright 2018 by Fahad Alsonedi ~ Alsonedif@gmail.com . All Rights Reserved.</footer>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>