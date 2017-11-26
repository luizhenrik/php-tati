<?php 

abstract class Base {
    public $user;
    public $pass;
    protected $db_name;
    public $database;

    public function __construct($username, $password, $db){
        $this->user = $username;
        $this->pass = $password;
        $this->db_name = $db;
        $this->database = new mysqli("localhost", $username, $password, $db);
    }

    
    public function connect(){
        // Check connection
        if ($this->database->connect_error) {
            die("Connection failed: " . $this->database->connect_error);
        } 
    }


}
