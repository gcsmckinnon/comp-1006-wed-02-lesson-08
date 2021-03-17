<?php

  try {
    //try to connect to database 
    //data source name 
    $dsn = 'mysql:host=localhost;dbname=database';
    $username = 'root'; 
    $password = '';
    //create instance of PDO object
    $db = new PDO($dsn,$username, $password); 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'Connected successfully! Whoo hoo!!!!'; 
  }
  catch(PDOException $e ) {
    //display error message if things go wrong! 
    $error_message = $e->getMessage();
    echo 'Something went wrong!!!' . $error_message . '!'; 
  }

?>