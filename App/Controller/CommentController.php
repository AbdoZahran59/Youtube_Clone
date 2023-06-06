<?php
require_once '../../Models/comment.php';
require_once '../../Controller/DBController.php';

    class CommentController
    {
    public function addComment(Comment $comment)
    {
    $db = DBController::getInstance();
    $current_message =  $comment->get_message();
    $Video_ID=$comment->get_V_ID();
  
    if ($db) {
    $query = "insert into comments (Content,User_ID,Video_ID) values ('$current_message',1,$Video_ID)";
    return $db->select($query);
    } else {
    echo "Error in Database Connection";
    return false;
    }
    }

    public function getAllComments($id)
    {
    $db = DBController::getInstance();
    if ($db) {
    $query = "select * from comments where Video_ID=$id";
    return $db->select($query);
    } else {
    echo "Error in Database Connection";
    return false;
    }
    }

    public function deleteComment($commentId)
    {
    $db = DBController::getInstance();
    if ($db) {
    $query = "delete from comments where comments.C_ID = '$commentId'";
    return $db->delete($query);
    } else {
    echo "Error in Database Connection";
    return false;
    }
    }
    }

?>