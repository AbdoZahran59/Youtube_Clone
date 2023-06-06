<?php

require_once 'DBController.php';
require_once '../Models/Video.php';
    $db=DBController::getInstance();
    $mysqli = $db->getConnection(); 
    $query = "UPDATE videos SET No_Of_Views = (No_Of_Views+1) WHERE V_ID =2";
                
    $result = $mysqli->query($query);
        if(!$result)
        {
            echo "Error : ".mysqli_error($mysqli->connection);
            return false;
        }
        else
        {
            return true;
        }
            
?>