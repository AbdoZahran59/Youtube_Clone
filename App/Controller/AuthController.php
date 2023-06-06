<?php

require_once '../../Controller/DBController.php';
require_once '../../Models/User.php';
class AuthController
{
 


  public function login(User $user)
  {
    
    $db = DBController::getInstance();
    $mysqli = $db->getConnection();
    if($db)
    {
      $email=$user->get_email();
      $pass=$user->get_Password();
      $query = "select * from users where Email='$email' and Password='$pass'"; 
      $result=$db->select($query);
      if($result===false)
      {
         echo "Error in Query";
         return false; 
      }
      else
      {
          if($result == null)
          {
            session_start();
            $_SESSION["err_Msg"]="You have entered wrong email or password";
            return false;
          }
          else
          {
             session_start();
             $_SESSION["userEmail"]=$user->get_email();;
             return true;
          }
      }
    }
    else
    {
        echo "Error in Database Connection";
        return false;
    }

  }


  public function register(User $user)
  {
    $db = DBController::getInstance();
    $mysqli = $db->getConnection();
    if($db)
    {
      $email=$user->get_email();
      $pass=$user->get_Password();
      $name=$user->get_user_name();
       $query="insert into users (Name,Email,Password) values ('$name','$email','$pass')";
       $result = $db->insert($query);
       if($result!=false)
       {
        session_start();
        $_SESSION["userEmail"]=$email;
        $_SESSION["userName"]=$name;   
        return true;
       }
       else
       {
         $_SESSION["err_Msg"]="Somthing went wrong... try again later";
         return false;
       }
    }
    else
    {
        echo "Error in Database Connection";
        return false;
    }

  }
  












}
?>