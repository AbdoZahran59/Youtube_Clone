<?php


class Comment {
    private $comment_id;
    private $user_name ;
    private $message ;
    private $U_Email;
    private $V_ID;
    
    public function set_comment_id ($comment_id){
        $this->comment_id = $comment_id ;
    }
    public function set_user_name ($user_name){
        $this->user_name = $user_name;
    }
    public function set_message ($message){
        $this->message = $message ;
    }
    public function setEmail ($email){
        $this->U_Email = $email ;
    }
    public function set_V_ID ($id){
        $this->V_ID = $id;
    }


    
    public function get_V_ID (){
        return $this->V_ID;
    }
    public function getEmail (){
       return  $this->U_Email;
    }

   
    public function get_message(){
        return $this->message;
    }


    

}
?>