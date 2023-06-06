<?php 

require_once '../../Models/channel.php';
require_once '../../Controller/DBController.php';

class ChannelController {


    public function createChannel(channel $channel,$email){
        $channelName = $channel->get_channel_name();
        $db = DBController::getInstance();
        if ($db){
            $sql = " INSERT INTO channels (User_email,Ch_Name) Values ('$email','$channelName')" ;
            return $db->insert($sql);
        }
        else{
            echo "Error in Database Connection";
            return false;
        }

    }

    public function getAllchannels($email){
        $db = DBController::getInstance();
        if ($db){
            $sql = "SELECT * FROM channels where User_email='$email'" ;
            return $db->select($sql) ;
        }
        else {
            echo "Error in Database Connection";
            return false;
        }
    } 
    public function deleteChannel($id)
    {
        $db=DBController::getInstance();
        if($db)
        {
            $query = "delete from channels where CH_ID=$id";
            return $db->delete($query);
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }
}