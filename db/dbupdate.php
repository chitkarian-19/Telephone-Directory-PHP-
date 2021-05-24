<?php
  
  function dbUpdateUser($name,$phone_number,$address,$uname,$uphone_number,$uaddress){
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=telephone",'root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //$pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, true );

    //check that user exists or not
    $statement = $pdo->prepare('select * from user_table natural join telephone_book where phone_number = :phone_number and name=:name and address = :address');
    $statement->bindParam(':name',$name);
    $statement->bindParam(':phone_number',$phone_number);
    $statement->bindParam(':address',$address);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
     
    if(count($users)==0)
     return 0;

    //
    $statement = $pdo->prepare('update user_table set name = :uname , phone_number = :uphone_number where name = :name and phone_number = :phone_number');
    $statement->bindParam(':uname',$uname);
    $statement->bindParam(':uphone_number',$uphone_number);
    $statement->bindParam(':name',$name);
    $statement->bindParam(':phone_number',$phone_number);
    
    
   $op1 = $statement->execute();
   
   $statement =  $pdo->prepare('update telephone_book set phone_number = :uphone_number , address = :uaddress where phone_number = :phone_number and address = :address');
   
   $statement->bindParam(':uphone_number',$uphone_number);
   $statement->bindParam(':uaddress',$uaddress);
   $statement->bindParam(':phone_number',$phone_number);
   $statement->bindParam(':address',$address);



     $op2= $statement->execute();
    
     if($op1!=0&&$op2!=0)
       return 1;
     else
        return 0;
     //echo $0;
  
    }


?>