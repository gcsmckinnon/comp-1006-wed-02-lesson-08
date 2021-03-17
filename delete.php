<?php

    require('connect.php'); 
    $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);

    try {
        //connect to db 

        //create a query 
        $sql = "DELETE FROM contacts WHERE id = :id;"; 

        //prepare that query 
        $statement = $db->prepare($sql); 

        //bind 
        $statement->bindParam(':id', $id); 

        //execute
        $statement->execute(); 

        //close connection 
        $statement->closeCursor(); 

        header('Location: index.php');
        exit;
    } catch(Exception $e) {
        require_once('header.php');
        echo "<p class='text-alert'>{$e->getMessage()}</p>";
        require_once('footer.php');
    }

?>