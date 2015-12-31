<?php

$action=$_GET['action'];
$remark=$_GET['remark'];
$case_id=$_GET['case_id'];

include("lib/dbconnect.php");




switch ($action)
{
    case "APPROVED":
            approved($case_id,$remark);
        break;
    case "DIS-APPROVED":
            disapproved($case_id,$remark);
        break;
    case "SEND TO FIELD":
            send_to_field($case_id,$remark);
        break;
    case "SEND TO IT":
            send_to_it($case_id,$remark);
        break;
}


function update_status($key)
{
    $con = new database_connect();
      
    try{
        $sql= "update sae.currentsae set REVIEW_STATUS=2 WHERE recordid = '$key'";
        $stmt = $con->db->prepare($sql);
        $stmt->execute();
        
        /*** close the database connection ***/
       
         }
    catch(PDOException $e)
        {
        echo $e->getMessage();
        }
    
}


function approved($key,$rmk)
  {
    update_status($key);
    //Update the pending status of the record
    
    $con = new database_connect();
    try{
         $sql="INSERT INTO sae.remark (`recordid`, `Remark`) VALUES('$key','$rmk')";
         $stmt = $con->db->prepare($sql);
         $stmt->execute();
        
       }
    catch(PDOException $e)
       {
        echo $e->getMessage();
       }
        
         
     try{
        
            $sql="INSERT INTO sae.sae_status (`recordid`, `STATUS`, `PWID`, `Baby_ID`) 
            (select '$key' as recordid,1 as status,Woman_ID,Baby_ID from sae.currentsae where recordid = '$key')";
            $stmt = $con->db->prepare($sql);
            $stmt->execute();
        }
    catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    
}


function disapproved($key,$rmk)
{
    update_status($key);
    //Update the pending status of the record
    
    $con = new database_connect();
    try{
         $sql="INSERT INTO sae.remark (`recordid`, `Remark`) VALUES('$key','$rmk')";
         $stmt = $con->db->prepare($sql);
         $stmt->execute();
        
       }
    catch(PDOException $e)
       {
        echo $e->getMessage();
       }
        
         
     try{
        
            $sql="INSERT INTO sae.sae_status (`recordid`, `STATUS`, `PWID`, `Baby_ID`) 
            (select '$key' as recordid,2 as status,Woman_ID,Baby_ID from sae.currentsae where recordid = '$key')";
            $stmt = $con->db->prepare($sql);
            $stmt->execute();
        }
    catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    
}


function send_to_it($key,$rmk)
{
    update_status($key);
    //Update the pending status of the record
    
    $con = new database_connect();
    try{
         $sql="INSERT INTO sae.remark (`recordid`, `Remark`) VALUES('$key','$rmk')";
         $stmt = $con->db->prepare($sql);
         $stmt->execute();
        
       }
    catch(PDOException $e)
       {
        echo $e->getMessage();
       }
        
         
     try{
        
            $sql="INSERT INTO sae.sae_status (`recordid`, `STATUS`, `PWID`, `Baby_ID`) 
            (select '$key' as recordid,3 as status,Woman_ID,Baby_ID from sae.currentsae where recordid = '$key')";
            $stmt = $con->db->prepare($sql);
            $stmt->execute();
        }
    catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    
}



function send_to_field($key,$rmk)
{
    update_status($key);
    //Update the pending status of the record
    
    $con = new database_connect();
    try{
         $sql="INSERT INTO sae.remark (`recordid`, `Remark`) VALUES('$key','$rmk')";
         $stmt = $con->db->prepare($sql);
         $stmt->execute();
        
       }
    catch(PDOException $e)
       {
        echo $e->getMessage();
       }
        
         
     try{
        
            $sql="INSERT INTO sae.sae_status (`recordid`, `STATUS`, `PWID`, `Baby_ID`) 
            (select '$key' as recordid,4 as status,Woman_ID,Baby_ID from sae.currentsae where recordid = '$key')";
            $stmt = $con->db->prepare($sql);
            $stmt->execute();
        }
    catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    
}


?>