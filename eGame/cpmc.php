<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Krub" rel="stylesheet">
    <script src="scripts/jquery-3.3.1.min.js"></script>
    <script src="scripts/cp.js"></script>
    <title>CP ~ Main Menu</title>
      <script>
         $(document).ready(function(){
             var i=0;
            while(i==0){
        $.post('reqfun/tablequeares.php',{type:"categorie",offset:"0",dcount:"10"},function(data){
            $('table').html(data); 
        });
          i++;   
         }});
      
      
      
    </script>
  </head>
  <body style="background-color:#f3f3f3;">
    <?php
      require('reqfun/checklogin.php'); 
      ?>
       <div class="nav">
        <h3 style="color:white;">eGame Control Penal</h3>
    <ul>
        <li><a href="cpmm.php">Main menu</a></li>   
        <li><a  href="cpmu.php">Manege users</a></li>
        <li><div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:dimgray;">
    Manage Products
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="cpmp.php" style="color:black;">Manage Products(manipulate)</a>
    <a class="dropdown-item" href="cpmcu.php" style="color:black;">Manage Products sorted under catagroies</a>
  </div>
</div></li>
        <li><a  href="cpmc.php">Manege Categrios</a></li>
        <li><a  href="cpmo.php">Manege Orders</a></li>
        
    </ul>
           </div>
           
      
        
       
      <div id="profile">
               <a class="dropdown-toggle" href="#" data-toggle="dropdown"><img src="imgs/user.png" width="40px" height="40px"><?php echo $_COOKIE['username'];?></a>  
               <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a style="color:black;" class="dropdown-item" href="#">Logout</a>
          </div>
               </div>
       <div class="middle-t">
        <a class="img_buttn_u" id="c_ref" href="#"><img src="imgs/if_refresh27_216529.png" width="20px" height="20px" class="imginside"></a><a href="#" class="img_buttn_u" id="ref_left_c"><img src="imgs/left.png" width="30px" height="30px" class="imginside" ></a><a href="#" id="ref_right_c" class="img_buttn_u"><img src="imgs/right.png" width="30px" height="30px" class="imginside"></a>
       <table id="mytable">
       
        </table>  
      </div>
            
      
      
    

    
      
      
      
      
      
      
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="styles/cp.css" rel="stylesheet">
  </body>
</html>
      

    
      
      
      
      
      
      
    
    