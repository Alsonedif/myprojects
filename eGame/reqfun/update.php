<?php
error_reporting(E_ALL ^ E_NOTICE);
 require('dbconnect.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
	 if($_POST['type']=='product' && $_POST['ACTION'] == "insert"){
            $value=json_decode($_POST['valuesofrowinsert']);
            
            $sql="insert into product(P_name,P_desc,P_price,status,quantity) values('".$value[2]."','".$value[3]."',".$value[4].",'".$value[5]."',".$value[6].");";
            

            if(mysqli_query($conn,$sql)){
              echo "correct";
              

          }else {
            echo mysqli_error($conn);
            
            
          } 

      }
}









?>