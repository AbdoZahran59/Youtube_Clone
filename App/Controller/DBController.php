<?php
/*
* Mysql database class - only one connection alowed
*/
class DBController {
    private $_connection;
    private static $_instance; //The single instance
  
    // Get Instance
    public static function getInstance() {
      if(!self::$_instance) { // If no instance then make one
        self::$_instance = new self();
      }
      return self::$_instance;
    }
  
    // Constructor
    private function __construct() {
      $this->_connection = new mysqli("localhost", "root", 
        "", "videowebsite");

        
    
    }
  
    // Magic method clone is empty to prevent duplication of connection
    private function __clone() { }
  
    // Get mysqli connection
    public function getConnection() {
      return $this->_connection;
    }

    ///Select Function
    public function select($qry)
    {
        
      $db = DBController::getInstance();
        $mysqli = $db->getConnection(); 
        $result = $mysqli->query($qry);
        
        if(!$result)
        {
            echo "Error : Somthing went wrong... try again later ";
            return false;
            
        }
        else
        {

           return $result;
        }
    }

    // Insert 
    public function insert($qry)
    {
        $db = DBController::getInstance();
        $mysqli = $db->getConnection(); 
        $result = $mysqli->query($qry);
        if(!$result)
        {
          echo "Error : Somthing went wrong... try again later ";
            return false;
        }
       return true;
    }
     // Delete 
    public function delete($qry)
    {
        $db = DBController::getInstance();
        $mysqli = $db->getConnection(); 
        $result = $db->select($qry);
        if(!$result)
        {
            echo "Error : ";
            return false;
        }
        else
        {
           return $result;
        }
    }
  
  }
  

?>