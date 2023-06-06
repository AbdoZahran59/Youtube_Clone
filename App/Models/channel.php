<?php


class channel {
    private $channel_name;
    private $date ;
    
    public function set_channel_name ($channel_name){
        $this->channel_name = $channel_name ;
    }
    public function set_date ($set_date){
        $this->set_date = $set_date ;
    }


    public function get_channel_name (){
        return $this->channel_name ;
    }
    public function get_date (){
        return $this->date ;
    }

    

}
?>