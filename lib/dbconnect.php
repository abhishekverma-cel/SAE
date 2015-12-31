<?php


/*** mysql hostname ***/
//$hostname = '192.168.0.120';

/*** mysql username ***/
//$username = 'averma';

/*** mysql password ***/
//$password = 'averxyz';


    
 class database_connect {
     
public $hostname = 'localhost';
public $username = 'root';
public $password = '';
public $db;
     
     function __construct()
     {
        try {
            $this->db = new PDO("mysql:host={$this->hostname};dbname=sae;charset=utf8", $this->username, $this->password);
            //PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8";
            /*** echo a message saying we have connected ***/
            //echo 'Connected to database';
            }   
        catch(PDOException $e)
            {
            echo $e->getMessage();
            }
            
                 }
 }   
    
    
    
?>
