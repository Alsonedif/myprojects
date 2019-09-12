<?php
error_reporting(E_ALL ^ E_NOTICE);
require('dbconnect.php');
if($_SERVER['REQUEST_METHOD'] == "GET"){
	 if($_GET['type']=='product-all'){
            $sql="select * from product LIMIT 0,24;";
            $result = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($result);
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
      if($_GET['type']=='product-cata'){
            $sql="select * from categorie";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){
                echo "<a href='catagare.php?id=".$row['C_ID']."' id='".$row['C_ID']."'>".$row['C_name']."</a>";
              }
          }else {
            echo mysqli_error($conn);
            
            
          } 

      }

}









?>