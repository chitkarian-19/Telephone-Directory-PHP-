<?php
    require_once('../db/dbcreate.php');
    require_once('../model/user_model.php');
   if($_SERVER['REQUEST_METHOD']==='POST')
   {
   $name = $_POST['user_name'];
   $phone_number = $_POST['phone_number'];
   $address = $_POST['address'];  
    //tells that how many rows are affected
   try{
   $op =  dbCreateUser($name,$phone_number,$address);
      if($op=="1")
      {
       $user = new User($name,$phone_number,$address);
       echo json_encode($user);
      }
   }
   catch(Exception $e){
       echo json_encode($e->getMessage());
   }
  }

?>