<?php

$hostname = 'localhost';
$username = 'root';
$password = '';

/*** mysql hostname ***/
//$hostname = '192.168.0.120';

/*** mysql username ***/
//$username = 'averma';

/*** mysql password ***/
//$password = 'averxyz';

try {
    $db = new PDO("mysql:host=$hostname;dbname=mysql", $username, $password);
    /*** echo a message saying we have connected ***/
    echo 'Connected to database';
    }   
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?>
