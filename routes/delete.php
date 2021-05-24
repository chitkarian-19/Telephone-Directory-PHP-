<?php
   include '../model/user_model.php';
   include '../db/dbdelete.php';
   if($_SERVER['REQUEST_METHOD']==='POST'){
       $name = $_POST['user_name'];
       $phone = $_POST['phone_number'];

       $user = new User($name,$phone,"");
       $op =  dbDeleteUser($name,$phone);
       if($op!=0){
           echo json_encode($user);
       }
       else{
           echo json_encode("error");
       }

   }

?>