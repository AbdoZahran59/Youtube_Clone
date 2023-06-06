<?php

class User
{

    private $id;
    private $name;
    private $email;
    private $password;

    //Setter
    public function set_U_ID ($id){
        $this->id = $id ;
    }
    public function set_user_name($user_name){
        $this->name = $user_name;
    }
    public function set_email($email){
        $this->email = $email ;
    }
    public function setPassword($pass){
        $this->password = $pass ;
    }

    //Getter
    public function get_U_ID(){
        return $this->id ;
    }
    public function get_user_name(){
         return $this->name ;
    }
    public function get_email(){
         return $this->email;
    }
    public function get_Password(){
         return $this->password;
    }

}


?>