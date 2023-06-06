<?php
require_once '../../Controller/DBController.php';

class LikeDislike
{
    public function addlike($id)
    {
        $db=DBController::getInstance();
        $mysqli = $db->getConnection(); 
        if ($db) {
            $sql = "UPDATE videos set No_Of_Likes = (No_Of_Likes+1) where V_ID = $id";
            return $mysqli->query($sql);
        } else  {
            echo "Error in Database Connection";
            return false;
        }
    }
    // public function getLikes($id)
    // {
    //     $db=DBController::getInstance();
    //     $mysqli = $db->getConnection(); 
    //     if ($db) {
    //         $sql = "select No_Of_Likes from videos where V_ID = $id";
    //         echo $mysqli->query($sql);
    //         return true;
    //     } else  {
    //         echo "Error in Database Connection";
    //         return false;
    //     }
    // }
    public function getLikes($id)
{
    $db = DBController::getInstance();
    if($db)
    {
        $query="select name from videos where V_ID=$id";
         
        $result=$db->select($query);
        return $result;
    }
    else
    {
        echo "Error in Database Connection";
        return false;
    }
}

    public function adddislike($id)
    {
        $db=DBController::getInstance();
        $mysqli = $db->getConnection(); 
        if ($db) {
            $sql = "UPDATE videos set No_Of_Dislikes = (No_Of_Dislikes+1) where V_ID = $id";
            return $mysqli->query($sql);
        } else {
            echo "Error in Database Connection";
            return false;
        }
    }
}