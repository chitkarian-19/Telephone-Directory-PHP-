<?php
   
   function dbDeleteUser($name,$phone_number){
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=telephone",'root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


    //check that the user exists with this name and same phone_number or not
    $statement = $pdo->prepare('select count(name) from user_table where name=:name and phone_number=:phone_number;');
    $statement->bindParam(':name',$name);
    $statement->bindParam(':phone_number',$phone_number);
    $exist = $statement->execute();
    
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        
     $arr =array();
    foreach($users as $user){
        $cnt = $user['count(name)'];
        if($cnt==0)
          return 0;
        else
          break;
    }
    //verfied that user with the same phone number exists


    $statement = $pdo->prepare('delete from user_table where name = :name ');
    $statement->bindParam(':name',$name);
    
    
    $op1 = $statement->execute();
  
    $statement =  $pdo->prepare('delete from telephone_book where phone_number = :phone_number');
    $statement->bindParam(':phone_number',$phone_number);
    
     $op2= $statement->execute();
    
     if($op1!=0&&$op2!=0)
       return 1;
     else
        return 0;
     //echo $0;
  
    }

?>