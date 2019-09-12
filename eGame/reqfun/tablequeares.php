<?php   

        error_reporting(E_ALL ^ E_NOTICE);
        require('checklogin.php');
        if($_SERVER['REQUEST_METHOD'] == "POST"){
/////////////////////////////////////////////////////////////////////////////////////////users///////////////////////////////////////////////////////////////////////////////////////////

          if($_POST['type'] == 'users'){
            echo "<tr>";
          	echo "<th>U_ID</th>";
          	echo "<th>Username</th>";
          	echo "<th>Password</th>";
          	echo "<th>Permession</th>";
          	echo "<th>N_first</th>";
          	echo "<th>N_Middle</th>";
          	echo "<th>N_last</th>";
          	echo "<th>City_name</th>";
          	echo "<th>Zip_code</th>";
          	echo "<th>L_IP</th>";
          	echo "<th>L_RNG_COOKIE</th>";
            echo "<th>Action</th>";
          	echo "</tr>";
            $offset=$_POST['offset'];
            $dcount=$_POST['dcount'];
          	$sql = "select * from users LIMIT $offset,$dcount";
          	$result = mysqli_query($conn,$sql);
            $i=0;
            while($row = mysqli_fetch_assoc($result)){
              
            	echo "<tr>";
            	echo "<td><input id='cell".$i."1' value='".$row['U_ID']."'style='width:50px;height:30px;' disabled></td>";
              echo "<td><input id='cell".$i."2' value='".$row['Username']."' style='width:80px;height:30px;' disabled></td>";
              echo "<td><input id='cell".$i."3' value='".$row['Password']."' style='width:80px;height:30px;' disabled></td>";
              echo "<td><input id='cell".$i."4' value='".$row['Permission']."'  style='width:90px;height:30px;' disabled></td>";
              echo "<td><input id='cell".$i."5' value='".$row['N_first']."' style='width:80px;height:30px;' disabled></td>";
              echo "<td><input id='cell".$i."6' value='".$row['N_middle']."' style='width:80px;height:30px;' disabled></td>";
              echo "<td><input id='cell".$i."7' value='".$row['N_last']."' style='width:80px;height:30px;' disabled></td>";
              echo "<td><input id='cell".$i."8' value='".$row['City_name']."' style='width:80px;height:30px;' disabled></td>";
              echo "<td><input id='cell".$i."9' value='".$row['Zip_code']."' style='width:80px;height:30px;' disabled></td>";
              echo "<td><input id='cell".$i."10' value='".$row['L_IP']."' style='width:150px;height:30px;' disabled></td>";
              echo "<td><input id='cell".$i."11' value='".$row['L_RNG_Cookie']."' style='width:150px;height:30px;' disabled></td>";
              echo "<td><a href='#' class='actions_delete_u' id='".$i."'><img src='imgs/delete.png' width='20px' height='20px'>      <a href='#' class='actions_edit_u' id='".$i."'><img src='imgs/edit.png' width='20px' height='20px'><a href='#' class='actions_submit_u' id='".$i."'>      <img src='imgs/submit.png' width='20px' height='20px'></td>";
            	echo "</tr>";
              $i++;
            }
            echo "<tr>";
              echo "<td><input id='cell".$i."1' value='' style='width:50px;height:30px;' disabled></td>";
              echo "<td><input id='cell".$i."2' value='' style='width:80px;height:30px;' ></td>";
              echo "<td><input id='cell".$i."3' value='' style='width:80px;height:30px;' ></td>";
              echo "<td><input id='cell".$i."4' value='' style='width:90px;height:30px;' ></td>";
              echo "<td><input id='cell".$i."5' value='' style='width:80px;height:30px;' ></td>";
              echo "<td><input id='cell".$i."6' value='' style='width:80px;height:30px;' ></td>";
              echo "<td><input id='cell".$i."7' value='' style='width:80px;height:30px;' ></td>";
              echo "<td><input id='cell".$i."8' value='' style='width:80px;height:30px;' ></td>";
              echo "<td><input id='cell".$i."9' value='' style='width:80px;height:30px;' ></td>";
              echo "<td><a href='#' class='add_u' id='".$i."'><img src='imgs/add.png' width='20px' height='20px'></td>";
              echo "</tr>";
          }

          if($_POST['type']=='users' && $_POST['ACTION'] == "delete"){
            $sql="delete from users where U_ID={$_POST['rowuid']};";
            
            if(mysqli_query($conn,$sql)){
              
              

          }else {
            
            
            
          }

        }
        if($_POST['type']=='users' && $_POST['ACTION'] == "update"){
            $value=json_decode($_POST['valuesofrow']);
            $sql="update users set Username='".$value[2]."',password='".$value[3]."',Permission='".$value[4]."',N_first='".$value[5]."',N_middle='".$value[6]."',N_last='".$value[7]."',City_name='".$value[8]."',Zip_code='".$value[9]."',L_IP='".$value[10]."',L_RNG_Cookie='".$value[11]."'where U_ID='".$value[1]."';";
            if(mysqli_query($conn,$sql)){
              echo "correct";
              

          }else {
            echo mysqli_error();
            
            
          } 

      }
      if($_POST['type']=='users' && $_POST['ACTION'] == "insert"){
            $value=json_decode($_POST['valuesofrowinsert']);
            
            $sql="insert into users(username,password,permission,n_first,n_middle,n_last,city_name,zip_code) values('".$value[2]."','".$value[3]."',".$value[4].",'".$value[5]."','".$value[6]."','".$value[7]."','".$value[8]."','".$value[9]."');";
            

            if(mysqli_query($conn,$sql)){
              echo "correct";
              

          }else {
            echo mysqli_error();
            
            
          } 

      }
      /////////////////////////////////////////////////////////////////////////PRODUCT//////////////////////////////////////////////////////////////////////////////////////////////////
      if($_POST['type'] == 'product'){
            echo "<tr>";
            echo "<th>P_ID</th>";
            echo "<th>P_Name</th>";
            echo "<th>P_desc</th>";
            echo "<th>P_price</th>";
            echo "<th>Status</th>";
            echo "<th>Quantity</th>";
            echo "<th>Img</th>";
            echo "<th>Action</th>";
            echo "</tr>";
            $offset=$_POST['offset'];
            $dcount=$_POST['dcount'];
            $sql = "select * from product LIMIT $offset,$dcount";
            $result = mysqli_query($conn,$sql);
            $i=0;
            while($row = mysqli_fetch_assoc($result)){
              
              echo "<tr>";
              echo "<td><input id='cell".$i."1' value='".$row['P_ID']."'style='width:50px;height:30px;' disabled></td>";
              echo "<td><input id='cell".$i."2' value='".$row['P_name']."' style='width:200px;height:30px;' disabled></td>";
              echo "<td><input id='cell".$i."3' value='".$row['P_desc']."' style='width:200px;height:80;' disabled></td>";
              echo "<td><input id='cell".$i."4' value='".$row['P_price']."'  style='width:90px;height:30px;' disabled></td>";
              echo "<td><input id='cell".$i."5' value='".$row['status']."'  style='width:90px;height:30px;' disabled></td>";
              echo "<td><input id='cell".$i."6' value='".$row['quantity']."'  style='width:90px;height:30px;' disabled></td>";
              if(isset($row['img'])){
                echo "<td><input id='cell".$i."4' value='".$row['img']."'  style='width:410px;height:30px;' disabled></td>";
              }else {
                echo "<td><form action='upload.php' method='post' enctype='multipart/form-data'>";
                echo "<input type='file' name='fileToUpload' id='fileToUpload'>";
                echo "<input type='submit' value='Upload Image' name='submit'>";
                echo "<input type='hidden' value='".$row['P_ID']."' name='P_ID'>";
                echo "</form>";
                echo "</td>";
              }
              echo "<td><a href='#' class='actions_delete_p' id='".$i."'><img src='imgs/delete.png' width='20px' height='20px'>      <a href='#' class='actions_edit_p' id='".$i."'><img src='imgs/edit.png' width='20px' height='20px'><a href='#' class='actions_submit_p' id='".$i."'>      <img src='imgs/submit.png' width='20px' height='20px'><a href='#' class='actions_edit_img' id='".$i."'>      <img src='imgs/edit-img.png' width='20px' height='20px'></td>";
              echo "</tr>";
              $i++;
            }
            echo "<tr>";
              echo "<td><input id='cell".$i."1' value='' style='width:50px;height:30px;' disabled></td>";
              echo "<td><input id='cell".$i."2' value='' style='width:200px;height:30px;' ></td>";
              echo "<td><input id='cell".$i."3' value='' style='width:200px;height:30px;' ></td>";
              echo "<td><input id='cell".$i."4' value='' style='width:90px;height:30px;' ></td>";
              echo "<td><input id='cell".$i."5' value='' style='width:90px;height:30px;' ></td>";
              echo "<td><input id='cell".$i."6' value='' style='width:90px;height:30px;' ></td>";
              echo "<td><a href='#' class='add_p' id='".$i."'><img src='imgs/add.png' width='20px' height='20px'></td>";
              echo "</tr>";
          }

          if($_POST['type']=='product' && $_POST['ACTION'] == "delete"){
            $sql="delete from product where P_ID={$_POST['rowuid']};";
            
            if(mysqli_query($conn,$sql)){
              
              

          }else {
            
            
            
          }

        }
        if($_POST['type']=='product' && $_POST['ACTION'] == "delete-img"){
            $sql="update product set img=null where P_ID={$_POST['rowuid']};";
            
            if(mysqli_query($conn,$sql)){
              
              

          }else {
            
            
            
          }

        }
        if($_POST['type']=='product' && $_POST['ACTION'] == "update"){
            $value=json_decode($_POST['valuesofrow']);
            $sql="update product set P_name='".$value[2]."',P_desc='".$value[3]."',P_price='".$value[4]."',status='".$value[5]."',quantity=".$value[6]." where P_ID=".$value[1].";";
            if(mysqli_query($conn,$sql)){
              echo "correct";
              

          }else {
            echo mysqli_error();
            
            
          } 

      }
      if($_POST['type']=='product' && $_POST['ACTION'] == "insert"){
            $value=json_decode($_POST['valuesofrowinsert']);
            
            $sql="insert into product(P_name,P_desc,P_price,status,quantity) values('".$value[2]."','".$value[3]."',".$value[4].",'".$value[5]."',".$value[6].");";
            

            if(mysqli_query($conn,$sql)){
              echo "correct";
              

          }else {
            echo mysqli_error($conn);
            
            
          } 

      }
      ////////////////////////////////////////////////////////////////////////////////Catagroies//////////////////////////////////////////////////////////////////////////////////////////
      if($_POST['type'] == 'categorie'){
            echo "<tr>";
            echo "<th>C_ID</th>";
            echo "<th>C_name</th>";
            echo "<th>Action</th>";
            echo "</tr>";
            $offset=$_POST['offset'];
            $dcount=$_POST['dcount'];
            $sql = "select * from categorie LIMIT $offset,$dcount";
            $result = mysqli_query($conn,$sql);
            $i=0;
            while($row = mysqli_fetch_assoc($result)){
              
              echo "<tr>";
              echo "<td><input id='cell".$i."1' value='".$row['C_ID']."'style='width:50px;height:30px;' disabled></td>";
              echo "<td><input id='cell".$i."2' value='".$row['C_name']."' style='width:250px;height:30px;' disabled></td>";
              echo "<td><a href='#' class='actions_delete_c' id='".$i."'><img src='imgs/delete.png' width='20px' height='20px'>      <a href='#' class='actions_edit_c' id='".$i."'><img src='imgs/edit.png' width='20px' height='20px'><a href='#' class='actions_submit_c' id='".$i."'>      <img src='imgs/submit.png' width='20px' height='20px'></td>";
              echo "</tr>";
              $i++;
            }
            echo "<tr>";
              echo "<td><input id='cell".$i."1' value='' style='width:50px;height:30px;' disabled></td>";
              echo "<td><input id='cell".$i."2' value='' style='width:250px;height:30px;' ></td>";
              echo "<td><a href='#' class='add_c' id='".$i."'><img src='imgs/add.png' width='20px' height='20px'></td>";
              echo "</tr>";
          }

          if($_POST['type']=='categorie' && $_POST['ACTION'] == "delete"){
            $sql="delete from categorie where C_ID={$_POST['rowuid']};";
            
            if(mysqli_query($conn,$sql)){
              
              

          }else {
            
            
            
          }

        }
        if($_POST['type']=='categorie' && $_POST['ACTION'] == "update"){
            $value=json_decode($_POST['valuesofrow']);
            $sql="update categorie set C_name='".$value[2]."' where C_ID=".$value[1].";";
            if(mysqli_query($conn,$sql)){
              echo "correct";
              

          }else {
            echo mysqli_error();
            
            
          } 

      }
      if($_POST['type']=='categorie' && $_POST['ACTION'] == "insert"){
            $value=json_decode($_POST['valuesofrowinsert']);
            
            $sql="insert into categorie(C_name) values('".$value[2]."');";
            

            if(mysqli_query($conn,$sql)){
              echo "correct";
              

          }else {
            echo mysqli_error();
            
            
          } 

      }
      ////////////////////////////////////////////////////////////////////////////////////////////////Product_Under what Catagroie ////////////////////////////////////////////////////////
      if($_POST['type'] == 'categorie_under'){
            echo "<tr>";
            echo "<th>Product_ID</th>";
            echo "<th>Sorted Under Categorie_ID</th>";
            echo "<th>Action</th>";
            echo "</tr>";
            $offset=$_POST['offset'];
            $dcount=$_POST['dcount'];
            $sql = "select P_ID,C_ID from sorted_under LIMIT $offset,$dcount";
            $result = mysqli_query($conn,$sql);
            $i=0;
            while($row = mysqli_fetch_assoc($result)){
              
              echo "<tr>";
              echo "<td><input id='cell".$i."1' value='".$row['P_ID']."'style='width:250px;height:30px;' disabled></td>";
              echo "<td><input id='cell".$i."2' value='".$row['C_ID']."'style='width:250px;height:30px;' disabled></td>";
              echo "<td><a href='#' class='actions_delete_cu' id='".$i."'><img src='imgs/delete.png' width='20px' height='20px'>      <a href='#' class='actions_edit_cu' id='".$i."'><img src='imgs/edit.png' width='20px' height='20px'><a href='#' class='actions_submit_cu' id='".$i."'>      <img src='imgs/submit.png' width='20px' height='20px'></td>";
              echo "</tr>";
              $i++;
            }
            echo "<tr>";
              echo "<td><input id='cell".$i."1' value='' style='width:250px;height:30px;'></td>";
              echo "<td><input id='cell".$i."2' value='' style='width:250px;height:30px;' ></td>";
              echo "<td><a href='#' class='add_cu' id='".$i."'><img src='imgs/add.png' width='20px' height='20px'></td>";
              echo "</tr>";
          }

          if($_POST['type']=='categorie_under' && $_POST['ACTION'] == "delete"){
            $sql="delete from sorted_under where P_ID={$_POST['rowuid']};";
            
            if(mysqli_query($conn,$sql)){
              
              

          }else {
            
            
            
          }

        }
         if($_POST['type']=='categorie_under' && $_POST['ACTION'] == "update"){
            $value=json_decode($_POST['valuesofrow']);
            $sql="update sorted_under set P_ID=".$value[1].",C_ID=".$value[2]." where P_ID='".$_POST['rowid']."';";
            if(mysqli_query($conn,$sql)){
              echo "correct";
              

          }else {
            echo mysqli_error($conn);
            
            
          } 

      }
      if($_POST['type']=='categorie_under' && $_POST['ACTION'] == "insert"){
            $value=json_decode($_POST['valuesofrowinsert']);
            
            $sql="insert into sorted_under(P_ID,C_ID) values(".$value[1].",".$value[2].");";
            

            if(mysqli_query($conn,$sql)){
              echo "correct";
              

          }else {
            echo mysqli_error($conn);
            
            
          } 

      }
      ////////////////////////////////////////////////////////////////////////////////////////////////Manage Orders ///////////////////////////////////////////////////////////////////////////////////////////
      if($_POST['type'] == 'orders'){
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
            $offset=$_POST['offset'];
            $dcount=$_POST['dcount'];
            $sql = "select orders.O_ID,orders.O_Status,bill.B_date_time,bill.P_method,P_name,P_PRICE,has_2.Quantity from orders INNER join has_1 ON has_1.O_ID = orders.O_ID
                    INNER join bill ON bill.B_ID = has_1.B_ID
                    INNER join has_2 ON bill.B_ID = has_2.B_ID  
                    INNER join product ON product.P_ID = has_2.P_ID AND bill.B_ID = has_2.B_ID LIMIT $offset,$dcount;";
            $result = mysqli_query($conn,$sql);
            $i=0;
            while($row = mysqli_fetch_assoc($result)){
              
              echo "<tr>";
              echo "<td><input class='info' id='cell".$i."1'  style='width:100px;height:30px;' disabled value='".$row['O_ID']."' ></td>";
              echo "<td><input class='info' id='cell".$i."2'  style='width:250px;height:30px;' disabled value='".$row['O_Status']."'></td>";
              echo "<td><input class='info' id='cell".$i."3'  style='width:200px;height:30px;' disabled value='".$row['B_date_time']."'></td>";
              echo "<td><input class='info' id='cell".$i."4'  style='width:150px;height:30px;' disabled value='".$row['P_method']."'></td>";
              echo "<td><input class='info' id='cell".$i."5'  style='width:100px;height:30px;' disabled value='".$row['P_name']."'></td>";
              echo "<td><input class='info' id='cell".$i."6'  style='width:100px;height:30px;' disabled value='".$row['P_PRICE']." SR'></td>";
              echo "<td><input class='info' id='cell".$i."7'  style='width:100px;height:30px;' disabled value='".$row['Quantity']."'></td>";
              echo "<td><input class='info' id='cell".$i."8'  style='width:100px;height:30px;' disabled value='".$row['P_PRICE']*$row['Quantity']." SR'></td>";
              echo "<td><a href='#' class='actions_edit_o' id='".$i."'><img src='imgs/edit.png' width='20px' height='20px'><a href='#' class='actions_submit_o' id='".$i."'><img src='imgs/submit.png' width='20px' height='20px'></td>";
              echo "</tr>";
              $i++;
            }
          }

         if($_POST['type']=='orders' && $_POST['ACTION'] == "update"){
            $value=json_decode($_POST['valuesofrow']);
            $sql="update orders set O_Status='".$value[2]."' where O_ID=".$value[1].";";
            if(mysqli_query($conn,$sql)){
              echo "correct";
              

          }else {
            echo mysqli_error($conn);
            
            
          } 

      }
  }
?>