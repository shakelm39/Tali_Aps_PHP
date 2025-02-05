<?php
    require_once 'config.php';

    Class Database{
    public $host   = DB_HOST;
    public $user   = DB_USER;
    public $pass   = DB_PASS;
    public $dbname = DB_NAME;
    
    
    public $link;
    public $error;
    
    public function __construct(){
        $this->connectDB();
    }
    
    private function connectDB(){
        $this->link = new mysqli($this->host, $this->user, $this->pass, 
        $this->dbname);
        if(!$this->link){
        $this->error ="Connection fail".$this->link->connect_error;
        return false;
        }
    }
    
    public function query($sql) {
        $result = $this->link->query($sql);
        if ($result === FALSE) {
            throw new Exception("Error executing query: " . $this->link->error);
        }
        return $result;
    }
    
    }
?>