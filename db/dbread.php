<?php

  require_once('../model/user_model.php');
  function readUserDB(){
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=telephone",'root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $statement = $pdo->prepare('Select * from user_table NATURAL JOIN telephone_book');
    $statement->execute();
    try{
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        
     $arr =array();
    foreach($users as $user){
        $myuser = new User($user['name'],$user['phone_number'],$user['address']);
        array_push($arr,$myuser);
        
    }
    return ($arr);
   }
    
    catch(Exception $e){
        echo $e;
    }
    
   }
    

?>