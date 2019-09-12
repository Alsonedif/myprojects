$(document).ready(function(){
   var offset=0;
   var dcount=10;
   var rowid;
   $(document).on('click','.actions_delete_u',function(){
      var row=$('#cell'+$(this).attr('id')+'1').val();                      
     $.post('reqfun/tablequeares.php',{type:'users',ACTION:'delete',rowuid:row},function(data,fate){
         refresh("users",offset,dcount);
     });  
   });
    $(document).on('click','.actions_delete_cu',function(){
      var row=$('#cell'+$(this).attr('id')+'1').val();                      
     $.post('reqfun/tablequeares.php',{type:'categorie_under',ACTION:'delete',rowuid:row},function(data,fate){
         refresh("categorie_under",offset,dcount);
     });  
   });

    $(document).on('click','.actions_edit_img',function(){
      var row=$('#cell'+$(this).attr('id')+'1').val();                      
     $.post('reqfun/tablequeares.php',{type:'product',ACTION:'delete-img',rowuid:row},function(data,fate){
         refresh("product",offset,dcount);
     });  
   });

    $(document).on('click','.actions_delete_p',function(){
      var row=$('#cell'+$(this).attr('id')+'1').val();                      
     $.post('reqfun/tablequeares.php',{type:'product',ACTION:'delete',rowuid:row},function(data,fate){
         refresh("product",offset,dcount);
     });  
   });
    
    $(document).on('click','.actions_delete_c',function(){
      var row=$('#cell'+$(this).attr('id')+'1').val();                      
     $.post('reqfun/tablequeares.php',{type:'categorie',ACTION:'delete',rowuid:row},function(data,fate){
         refresh("categorie",offset,dcount);
     });  
   });
    $("#u_ref").click(function(){
        refresh("users",offset,dcount);
    });
    $("#o_ref").click(function(){
        refresh("orders",offset,dcount);
    });
    $("#cu_ref").click(function(){
        refresh("categorie_under",offset,dcount);
    });
    $("#c_ref").click(function(){
        refresh("categorie",offset,dcount);
    });
    $("#p_ref").click(function(){
        refresh("product",offset,dcount);
    });
    $(document).on('click','.actions_edit_u',function(){
        var rows=[];
        
        for(var i=0;i<12;i++){
        rows.push($('#cell'+$(this).attr('id').toString()+i));
        $(rows[i]).prop('disabled',false);
        }
        
        alert('After editing , please click (√) button');
        
    });
    $(document).on('click','.actions_edit_cu',function(){
        var rows=[];
        rowid=$('#cell'+$(this).attr('id')+'1').val();
        for(var i=0;i<3;i++){
        rows.push($('#cell'+$(this).attr('id').toString()+i));
        $(rows[i]).prop('disabled',false);
        }
        
        alert('After editing , please click (√) button');
        
    });
    $(document).on('click','.actions_edit_o',function(){
        var rows=[];
        rowid=$('#cell'+$(this).attr('id')+'1').val();
        for(var i=0;i<9;i++){
        rows.push($('#cell'+$(this).attr('id').toString()+i));
        $(rows[i]).prop('disabled',false);
        }
        
        alert('After editing , please click (√) button');
        
    });
    $(document).on('click','.actions_edit_p',function(){
        var rows=[];
        
        for(var i=0;i<7;i++){
        rows.push($('#cell'+$(this).attr('id').toString()+i));
        $(rows[i]).prop('disabled',false);
        }
        
        alert('After editing , please click (√) button');
        
    });
    $(document).on('click','.actions_edit_c',function(){
        var rows=[];
        
        for(var i=0;i<3;i++){
        rows.push($('#cell'+$(this).attr('id').toString()+i));
        $(rows[i]).prop('disabled',false);
        }
        
        alert('After editing , please click (√) button');
        
    });
    $(document).on('click','.actions_submit_u',function(){
        var valuesofrow=[];
        for(var i=0;i<12;i++){
        valuesofrow.push($('#cell'+$(this).attr('id')+i).val());
        }
        
        $.post('reqfun/tablequeares.php',{type:'users',ACTION:'update',valuesofrow:JSON.stringify(valuesofrow)},function(data){
         
         refresh("users",offset,dcount);
     });  
    });
    $(document).on('click','.actions_submit_o',function(){
        var valuesofrow=[];
        for(var i=0;i<3;i++){
        valuesofrow.push($('#cell'+$(this).attr('id')+i).val());
        }
        $.post('reqfun/tablequeares.php',{type:'orders',ACTION:'update',valuesofrow:JSON.stringify(valuesofrow)},function(data){
         
         refresh("orders",offset,dcount);
     }); 
     });  
     $(document).on('click','.actions_submit_cu',function(){
        var valuesofrow=[];
        
        for(var i=0;i<3;i++){
        valuesofrow.push($('#cell'+$(this).attr('id')+i).val());
           
        }
        
        $.post('reqfun/tablequeares.php',{type:'categorie_under',ACTION:'update',valuesofrow:JSON.stringify(valuesofrow),rowid:rowid},function(data){
         
         refresh("categorie_under",offset,dcount);
     });  
    });
    $(document).on('click','.actions_submit_c',function(){
        var valuesofrow=[];
        for(var i=0;i<3;i++){
        valuesofrow.push($('#cell'+$(this).attr('id')+i).val());
        }
        
        $.post('reqfun/tablequeares.php',{type:'categorie',ACTION:'update',valuesofrow:JSON.stringify(valuesofrow)},function(data){
         
         refresh("categorie",offset,dcount);
     });  
    });
    $(document).on('click','.actions_submit_p',function(){
        var valuesofrow=[];
        for(var i=0;i<7;i++){
        valuesofrow.push($('#cell'+$(this).attr('id')+i).val());
        }
        
        $.post('reqfun/tablequeares.php',{type:'product',ACTION:'update',valuesofrow:JSON.stringify(valuesofrow)},function(data){
         
         refresh("product",offset,dcount);
     });  
    });
    $(document).on('click','#ref_right_u',function(){
        var tablec=$('.middle-t #mytable tr').length-2;
        
    if(tablec==10){
        offset=offset+10;
    }else {
        
    }
    refresh('users',offset,dcount);
    });
    $(document).on('click','#ref_right_o',function(){
        var tablec=$('.middle-t #mytable tr').length-2;
        
    if(tablec==10){
        offset=offset+10;
    }else {
        
    }
    refresh('orders',offset,dcount);
    });
    $(document).on('click','#ref_right_cu',function(){
        var tablec=$('.middle-t #mytable tr').length-2;
        
    if(tablec==10){
        offset=offset+10;
    }else {
        
    }
    refresh('categorie_under',offset,dcount);
    });
    $(document).on('click','#ref_right_p',function(){
        var tablec=$('.middle-t #mytable tr').length-2;
        
    if(tablec==10){
        offset=offset+10;
    }else {
        
    }
    refresh('product',offset,dcount);
    });
    $(document).on('click','#ref_right_c',function(){
        var tablec=$('.middle-t #mytable tr').length-2;
        
    if(tablec==10){
        offset=offset+10;
    }else {
        
    }
    refresh('categorie',offset,dcount);
    });
    
    $(document).on('click','#ref_left_u',function(){
    if(offset<10){
        
    }else{
        offset=offset-10;
    }
    refresh('users',offset,dcount);
    });
    $(document).on('click','#ref_left_o',function(){
    if(offset<10){
        
    }else{
        offset=offset-10;
    }
    refresh('orders',offset,dcount);
    });
    $(document).on('click','#ref_left_cu',function(){
    if(offset<10){
        
    }else{
        offset=offset-10;
    }
    refresh('categorie_under',offset,dcount);
    });
    $(document).on('click','#ref_left_p',function(){
    if(offset<10){
        
    }else{
        offset=offset-10;
    }
    refresh('product',offset,dcount);
    });
    $(document).on('click','#ref_left_c',function(){
    if(offset<10){
        
    }else{
        offset=offset-10;
    }
    refresh('categorie',offset,dcount);
    });
    $(document).on('click','.add_u',function(){
        
        var valuesofrowinsert=[];
        for(var i=0;i<12;i++){
        valuesofrowinsert.push($('#cell'+$(this).attr('id')+i).val());
        }
        
        $.post('reqfun/tablequeares.php',{type:'users',ACTION:'insert',valuesofrowinsert:JSON.stringify(valuesofrowinsert)},function(data){
        
         refresh("users",offset,dcount);
     });  
    });
     $(document).on('click','.add_p',function(){
        
        var valuesofrowinsert=[];
        for(var i=0;i<7;i++){
        valuesofrowinsert.push($('#cell'+$(this).attr('id')+i).val());
        }
        
        $.post('reqfun/tablequeares.php',{type:'product',ACTION:'insert',valuesofrowinsert:JSON.stringify(valuesofrowinsert)},function(data){
        
         refresh("product",offset,dcount);
     });  
    });
    $(document).on('click','.add_c',function(){
        
        var valuesofrowinsert=[];
        for(var i=0;i<5;i++){
        valuesofrowinsert.push($('#cell'+$(this).attr('id')+i).val());
        }
        
        $.post('reqfun/tablequeares.php',{type:'categorie',ACTION:'insert',valuesofrowinsert:JSON.stringify(valuesofrowinsert)},function(data){
        
         refresh("categorie",offset,dcount);
     });  
    });
    $(document).on('click','.add_cu',function(){
        
        var valuesofrowinsert=[];
        for(var i=0;i<3;i++){
        valuesofrowinsert.push($('#cell'+$(this).attr('id')+i).val());
        }
        
        $.post('reqfun/tablequeares.php',{type:'categorie_under',ACTION:'insert',valuesofrowinsert:JSON.stringify(valuesofrowinsert)},function(data){
         
         refresh("categorie_under",offset,dcount);
     });  
    });
});
   
   
    


function refresh(type,offset,dcount){
    $('.middle-t table').html('');
    if(type=="users"){
        $.post('reqfun/tablequeares.php',{type:"users",offset:offset,dcount:dcount},function(data){
            $('table').html(data); 
        });
    }else if(type=="orders"){
        $.post('reqfun/tablequeares.php',{type:"orders",offset:offset,dcount:dcount},function(data){
            $('table').html(data); 
        });
    }else if(type=="product"){
        $.post('reqfun/tablequeares.php',{type:"product",offset:offset,dcount:dcount},function(data){
            $('table').html(data); 
        });
    }else if(type=="categorie"){
        $.post('reqfun/tablequeares.php',{type:"categorie",offset:offset,dcount:dcount},function(data){
            $('table').html(data); 
        });
    }else if(type=="categorie_under"){
        $.post('reqfun/tablequeares.php',{type:"categorie_under",offset:offset,dcount:dcount},function(data){
            $('table').html(data); 
        });
    }
}