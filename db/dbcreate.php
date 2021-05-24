<?php

  
  function dbCreateUser($name,$phone_number,$address){
  $pdo = new PDO("mysql:host=localhost;port=3306;dbname=telephone",'root','');
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $statement = $pdo->prepare('Insert into user_table (name,phone_number) VALUES (:name,:phone_number)');
  $statement->bindParam(':name',$name);
  $statement->bindParam(':phone_number',$phone_number);
  
  $op1 = $statement->execute();

  $statement =  $pdo->prepare('Insert into telephone_book (phone_number,address) VALUES (:phone_number,:address)');
  $statement->bindParam(':phone_number',$phone_number);
  $statement->bindParam(':address',$address);
   $op2= $statement->execute();

   if($op1!=0&&$op2!=0)
     return 1;
   else
      return 0;
   //echo $0;

  }
  //export dbCreateUser;
?>