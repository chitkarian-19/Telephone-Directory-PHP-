<?php
   include '../model/user_model.php';
   include '../db/dbupdate.php';
   if($_SERVER['REQUEST_METHOD']==='POST'){
       $name = $_POST['user_name'];
       $phone = $_POST['phone_number'];
       $address = $_POST['address'];

       $uname=$_POST['u_user_name'];
       $uphone=$_POST['u_phone_number'];
       $uaddress=$_POST['u_address'];
       
       try{
       $op =  dbUpdateUser($name,$phone,$address,$uname,$uphone,$uaddress);
       if($op!=0){
           $user = new User($uname,$uphone,$uaddress);
           echo json_encode($user);
       }
       else{
           echo json_encode($op);
       }
      }
      catch(Exception $e){
          echo $e->getMessage();
      }
   }


?>