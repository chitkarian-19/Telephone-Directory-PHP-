$("document").ready(function(){
    $("#name_user").keyup(function(){
             if($("#name_user").val().length==0)
              {
               $("#name-error").remove();
               $("#name_user").addClass("border border-danger border-lg");
               $("#name_user").parent().append("<p id='name-error' class='font-weight-bold text-danger'>Name Field is Empty *</p>");
              }
            else{
                $("#name_user").removeClass("border");
                $("#name_user").removeClass("border-danger");
                $("#name-error").remove();
                
            }
        
    });
    $("#phone_user").keyup(function(){
        if($("#phone_user").val().length!=10||isNaN($("#phone_user").val()))
          {
           $("#phone-error").remove();
           $("#phone_user").addClass("border border-danger border-lg");
           $("#phone_user").parent().append("<p id='phone-error' class='font-weight-bold text-danger'>Phone Number of 10 digits only*</p>");
          }
      else{
          $("#phone_user").removeClass("border");
          $("#phone_user").removeClass("border-danger");
          $("#phone-error").remove();
          
      }
    });
    $("#address_user").keyup(function(){
        if($("#address_user").val().length==0)
          {
           $("#address-error").remove();
           $("#address_user").addClass("border border-danger border-lg");
           $("#address_user").parent().append("<p id='address-error' class='font-weight-bold text-danger'>Address Field cannot be empty*</p>");
          }
      else{
          $("#address_user").removeClass("border");
          $("#address_user").removeClass("border-danger");
          $("#address-error").remove();
          
      }
    });
    $("#u_user_name").keyup(()=>{
       
        
        if($("#u_user_name").val().length==0)
          {
           $("#u_user_name_error").remove();
           $("#u_user_name").addClass("border border-danger border-lg");
           $("#u_user_name").parent().append("<p id='u_user_name_error' class='font-weight-bold text-danger'>UserName cannot be empty*</p>");
          }
      else{
          $("#u_user_name").removeClass("border");
          $("#u_user_name").removeClass("border-danger");
          $("#u_user_name_error").remove();
          
      }
     
    });
    
    $("#u_phone_number").keyup(()=>{
       
        
        if($("#u_phone_number").val().length!=10||isNaN($("#u_phone_number").val()))
          {
           $("#u_user_phone_error").remove();
           $("#u_phone_number").addClass("border border-danger border-lg");
           $("#u_phone_number").parent().append("<p id='u_user_phone_error' class='font-weight-bold text-danger'>Phone Number 10 digits only*</p>");
          }
      else{
          $("#u_phone_number").removeClass("border");
          $("#u_phone_number").removeClass("border-danger");
          $("#u_user_phone_error").remove();
          
      }
     
    });
    
    $("#u_address").keyup(()=>{
       
        
        if($("#u_address").val().length==0)
          {
           $("#u_user_ad_error").remove();
           $("#u_address").addClass("border border-danger border-lg");
           $("#u_address").parent().append("<p id='u_user_ad_error' class='font-weight-bold text-danger'>Address Required*</p>");
          }
      else{
          $("#u_address").removeClass("border");
          $("#u_address").removeClass("border-danger");
          $("#u_user_ad_error").remove();
          
      }
     
    });




    

    function validate(){
        if(($("#name_user").val().length==0)||($("#phone_user").val().length!=10||isNaN($("#phone_user").val()))||($("#address_user").val().length==0))
        { 
          alert("Error in Data");
            return false;
        }
       return true; 
    }
    $("#submit").click(function(){
      
      var valid = validate();
        if(valid==false) return false;
      $.ajax({
          url:'routes/create.php',
          type:'POST',
          data:$("#createUser").serialize(),
          dataType:'json',
          success:function(data){
              
              let mydata = (JSON.parse(JSON.stringify(data)));
             //console.log("Mydata "+mydata);

              if(mydata.name!=undefined){
              $("#creation-tab").prepend('<div class="alert alert-success alert-dismissible" role="alert"> User '+ mydata.name +' successfully added   <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
              }
              else {
              //console.log(data.error);
              $("#creation-tab").prepend('<div class="alert alert-danger alert-dismissible" role="alert"> Duplicate Phone Number or UserName'+' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
              
              }
          },
          error:function(err){
              console.log("Error"+(JSON.stringify(err)));
              
              
          }
          
      })
   });
   $("#read").click(function(){
       $.ajax({
           url:'routes/read.php',
           type:'GET',
           dataType:'json',
           success:function(data){
               
               console.log("Incoming Data = "+JSON.parse(JSON.stringify(data))); 
               var user_data=JSON.parse(JSON.stringify(data));
               //console.log(user_data);
               var list = []; 
               list=user_data;
               
               var super_parent = $("#menu1");
               $("#myTable").remove();//remove the table
               super_parent.empty();  //empty the parent
                     
               var child=super_parent.append("<table id='myTable'></table>");
               $("#myTable").addClass("table   table-fluid table-striped");
               $("#myTable").append("<thead><tr><th>Phone</th><th>FullName</th> <th>Address</th></thead>");
               $("#myTable").append("<tbody id='table-body'></tbody>");
               var parent = $("#table-body");
               
              
               
               //$('table').DataTable().clear().draw();
              // parent.empty();
              var table = $('table#myTable').DataTable();
               list.forEach(function(e){ 	
                   table.row.add([e.phone,e.name,e.address]).draw(false);
               });
              
              //ADD FOR PAGINATION
       
               
           },
           error:function(err){
               alert("error"+JSON.stringify(err));
               $("p").text("error "+err);
           }
           
       });
   });
     $("#delete").click(function(){
          
         $.ajax({
            url:'routes/delete.php',
            method:'POST',
            dataType:'json',
            data:$("#delete_user").serialize(),
            success:function(data){
                let op= (JSON.parse(JSON.stringify(data)));

                console.log(op.name);
                console.log(op.phone);
                if(op.name!=undefined){
                       $("#deletion-tab").prepend('<div class="alert alert-success" role="alert"> User '+op.name+' successfully Deleted <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                    
                   }
                   else{
                       alert("Not success");
                       $("#deletion-tab").prepend('<div class="alert alert-danger" role="alert"> No User Found <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                    
                   }
                /*Make a new ajax call to refresh the list*/
                 $("#duname_col").empty();
                   $("#dp_col").empty();
         
         
         $.ajax({
                 url:'routes/read.php',
              type:'GET',
              dataType:'json',
              success:function(data){
                  var list = JSON.parse(JSON.stringify(data));
                  
                  list.forEach(function(e){ 	
                      $("#duname_col").append("<option>"+e.name+"</option>");
                    
                      
                  });
                  $("#dp_col").val("");
                  
              },
              error:function(data){
                  
              }
         });
                
                /*Ajax call to refresh the list*/
                
                
            },
            error:function(err){
                console.log(err);
                $("#deletion-tab").prepend('<div class="alert alert-danger" role="alert">' +JSON.parse(JSON.stringify(err))+'<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                 
            }
             
         });
     });
     $("#update").click(function(){
         console.log($("#updationForm").serialize());

         if($("#u_address").val().length==0||$("#u_user_name").val().length==0||$("#pno_col").val().length==0|| $("#a_col").val().length==0||$("#u_phone_number").val().length!=10||isNaN($("#u_phone_number").val()))
            return false;

        $.ajax({
           url:'routes/update.php',
           method:'POST',
           dataType:'json',
           data:$("#updationForm").serialize(),
           success:function(data){
               let op= (JSON.parse(JSON.stringify(data)));
               console.log(op);
                 if(op.name!=undefined){
                     $("#updation-tab").prepend('<div class="alert alert-success" role="alert"> User successfully Updated <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                     /*Refresh the updation list*/
                        /*Make  a new AJAX call for the updation of the list item*/
                         $("#uname_col").empty();
          $("#pno_col").empty();
          $("#a_col").empty();
          
          $.ajax({
              url:'routes/read.php',
               type:'GET',
               dataType:'json',
               success:function(data){
                   var list = JSON.parse(JSON.stringify(data));
                   
                   list.forEach(function(e){ 	
                       $("#uname_col").append("<option>"+e.name+"</option>");
                      
                       
                   });
                   $("#pno_col").val("");
                   $("#a_col").val("");
                   
               },
               error:function(data){
                $("#updation-tab").prepend('<div class="alert alert-danger" role="alert"> No User Found... <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                  
               }
          });
               }
                 else{
                     console.log("error"+op);
                     $("#updation-tab").prepend('<div class="alert alert-danger" role="alert"> No User Found... <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                  
                 }
                 
           },
           error:function(error){
               console.log(JSON.parse(JSON.stringify(error)));
               $("#updation-tab").prepend('<div class="alert alert-danger" role="alert"> Duplicate Number or Name Found... <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                  
           }
        });
     });
     $("#updation_tab").click(function(){
          $("#uname_col").empty();
          $("#pno_col").empty();
          $("#a_col").empty();
          
          $.ajax({
              url:'routes/read.php',
               type:'GET',
               dataType:'json',
               success:function(data){
                   var list = JSON.parse(JSON.stringify(data));
                   console.log(list);
                   list.forEach(function(e){ 	
                       $("#uname_col").append("<option>"+e.name+"</option>");
                      
                       
                   });
                   
                   
               },
               error:function(data){
                   
               }
          });
          
          
     });
     $("#delete_tab").click(function(){
         $("#duname_col").empty();
            $("#dp_col").empty();
         
         
         $.ajax({
             url:'routes/read.php',
              type:'GET',
              dataType:'json',
              success:function(data){
                  var list = JSON.parse(JSON.stringify(data));
                  
                  list.forEach(function(e){ 	
                      $("#duname_col").append("<option>"+e.name+"</option>");
                      
                      //$("#dp_col").append("<option>"+e.phone_no+"</option>");
                      
                  });
                  
                  
              },
              error:function(data){
                  
              }
         });
     });
     $("#duname_col").change(function(){
         
         $.ajax({
                url:'routes/read.php',
                 type:'GET',
                 dataType:'json',
                 success:function(data){
                     var list = JSON.parse(JSON.stringify(data));
                     
                     list.forEach(function(e){ 
                         if($("#duname_col").val()==e.name)
                         {
                           $("#dp_col").val(e.phone);
                         }
                         
                     });
                     
                     
                 },
                 error:function(data){
                 alert("Error"+data);        			
                 }
            });
         
         
         
     });
$("#uname_col").change(function(){
         $.ajax({
                url:'routes/read.php',
                type:'GET',
                dataType:'json',
                 success:function(data){
                     var list = JSON.parse(JSON.stringify(data));
                     
                     list.forEach(function(e){ 
                         if($("#uname_col").val()==e.name)
                         {
                             $("#pno_col").val(e.phone);
                             $("#a_col").val(e.address);
                         }
                         
                     });
                  },
                 error:function(data){
                 alert("Error"+data);        			
                 }
            }); 
     });  
});