<?php

require_once '../../Controller/DBController.php';
require_once '../../Models/Video.php';
class videoController
{
  

public function addVideo(Video $video,$email)
{

    $db = DBController::getInstance();
  
    if($db)
    {
        $query = "insert into videos (User_email,title,name,thumbnail)values ('$email','$video->title','$video->name','$video->thumbnail')";
        return $db->insert($query);
    }
    else
    {
        echo "Error in Database Connection";
        return false;
    }
}

public function getAllVideos($email)
{
    $db = DBController::getInstance();
    if($db)
    {
        $query="select * from videos where User_email ='$email'";
        return $db->select($query);
    }
    else
    {
        echo "Error in Database Connection";
        return false;
    }
}
public function getAllVideosIndex()
{
    $db = DBController::getInstance();
    if($db)
    {
        $query="select * from videos ";
        return $db->select($query);
    }
    else
    {
        echo "Error in Database Connection";
        return false;
    }
}


public function deleteVideo($id)
{

    $db=DBController::getInstance();
    if($db)
    {
        $query = "delete from videos where V_ID=$id";
        return $db->delete($query);
    }
    else
    {
        echo "Error in Database Connection";
        return false;
    }
}

public function increaseView($id)
{
    $db=DBController::getInstance();
    $mysqli = $db->getConnection(); 

    $query = "UPDATE videos SET No_Of_Views = (No_Of_Views+1) WHERE V_ID =2";
            
    $result = $mysqli->query($query);
            
    
}




// public function search($filtervalues)
// {
//     $this->db=DBController::getInstance();
//     if($this->db)
//     {
//         $query = "select * from videos where title LIKE '%$filtervalues%'";
//         return $this->db->search($query);
//     }
//     else
//     {
//         echo "Error in Database Connection";
//         return false;
//     }
    
// }

// public function getAllVideosAfterSearching($filtervalues)
// {
//     $this->db=DBController::getInstance();
//     if($this->db)
//     {
//         $query = "select * from videos where title LIKE '%$filtervalues%'";
//         return $this->db->search($query);
//     }
//     else
//     {
//         echo "Error in Database Connection";
//         return false;
//     }
// }

public function getVideo($id)
{
    $db=DBController::getInstance();
    if($db)
    {
        $query="select * from videos";
        return $db->select($query);
    }
    else
    {
        echo "Error in Database Connection";
        return false;
    }
}
}


?>