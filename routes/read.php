<?php

 require_once('../db/dbread.php');
if($_SERVER['REQUEST_METHOD']==='GET')
{
  
  try{
    
    echo json_encode(readUserDB());
   
  }
  catch(Exception $e){
    echo 'error'.$e->getMessage();
  }
}


?>