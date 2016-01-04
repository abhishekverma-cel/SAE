<?php

$action = $_GET['action'];
$remark = $_GET['remark'];
$case_id = $_GET['case_id'];
$page = $_GET['page_id'];

switch($page)
{
    
    case "index.php": $remark_by = 1;
                    break;
    case "review.php": $remark_by = 1;
                    break;
    case "it.php":  $remark_by = 2;
                    break;
    case "field.php": $remark_by = 3;
                    break;
    DEFAULT: $remark_by='';
}


include("lib/dbconnect.php");




switch ($action)
{
    case "APPROVED":
            approved($case_id,$remark,$remark_by);
        break;
    case "DIS-APPROVED":
            disapproved($case_id,$remark,$remark_by);
        break;
    case "SEND TO FIELD":
            send_to_field($case_id,$remark,$remark_by);
        break;
    case "SEND TO IT":
            send_to_it($case_id,$remark,$remark_by);
        break;
    case "RE-REVIEW": 
            review($case_id,$remark,$remark_by);
        break;      
}


function update_status($key)
{
    $con  =  new database_connect();
      
    try{
        $sql =  "update sae.currentsae set REVIEW_STATUS = 2 WHERE recordid  =  '$key'";
        $stmt  =  $con->db->prepare($sql);
        $stmt->execute();
        
        /*** close the database connection ***/
       
         }
    catch(PDOException $e)
        {
        echo $e->getMessage();
        }
    
}


function approved($key,$rmk,$rmk_by)
  {
    update_status($key);
    //Update the pending status of the record
    
    $con  =  new database_connect();
    try{
         $sql = "INSERT INTO sae.remark (`recordid`, `Remark`,`Remark_by`) VALUES('$key','$rmk','$rmk_by')";
         $stmt  =  $con->db->prepare($sql);
         $stmt->execute();
        
       }
    catch(PDOException $e)
       {
        echo $e->getMessage();
       }
        
         
     try{
        
            $sql = "INSERT INTO sae.sae_status (`recordid`, `STATUS`, `PWID`, `Baby_ID`) 
            (select '$key' as recordid,1 as status,Woman_ID,Baby_ID from sae.currentsae where recordid  =  '$key')";
            $stmt  =  $con->db->prepare($sql);
            $stmt->execute();
        }
    catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    
}


function disapproved($key,$rmk,$rmk_by)
{
    update_status($key);
    //Update the pending status of the record
    
    $con  =  new database_connect();
    try{
         $sql = "INSERT INTO sae.remark (`recordid`, `Remark`,`Remark_by`) VALUES('$key','$rmk','$rmk_by')";
         $stmt  =  $con->db->prepare($sql);
         $stmt->execute();
        
       }
    catch(PDOException $e)
       {
        echo $e->getMessage();
       }
        
         
     try{
        
            $sql = "INSERT INTO sae.sae_status (`recordid`, `STATUS`, `PWID`, `Baby_ID`) 
            (select '$key' as recordid,2 as status,Woman_ID,Baby_ID from sae.currentsae where recordid  =  '$key')";
            $stmt  =  $con->db->prepare($sql);
            $stmt->execute();
        }
    catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    
}


function send_to_it($key,$rmk,$rmk_by)
{
    update_status($key);
    //Update the pending status of the record
    
    $con  =  new database_connect();
    try{
         $sql = "INSERT INTO sae.remark (`recordid`, `Remark`,`Remark_by`) VALUES('$key','$rmk','$rmk_by')";
         $stmt  =  $con->db->prepare($sql);
         $stmt->execute();
        
       }
    catch(PDOException $e)
       {
        echo $e->getMessage();
       }
        
         
     try{
        
            $sql = "INSERT INTO sae.sae_status (`recordid`, `STATUS`, `PWID`, `Baby_ID`) 
            (select '$key' as recordid,3 as status,Woman_ID,Baby_ID from sae.currentsae where recordid  =  '$key')";
            $stmt  =  $con->db->prepare($sql);
            $stmt->execute();
        }
    catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    
}



function send_to_field($key,$rmk,$rmk_by)
{
    update_status($key);
    //Update the pending status of the record
    
    $con  =  new database_connect();
    try{
         $sql = "INSERT INTO sae.remark (`recordid`, `Remark`,`Remark_by`) VALUES('$key','$rmk','$rmk_by')";
         $stmt  =  $con->db->prepare($sql);
         $stmt->execute();
        
       }
    catch(PDOException $e)
       {
        echo $e->getMessage();
       }
        
         
     try{
        
            $sql = "INSERT INTO sae.sae_status (`recordid`, `STATUS`, `PWID`, `Baby_ID`) 
            (select '$key' as recordid,4 as status,Woman_ID,Baby_ID from sae.currentsae where recordid  =  '$key')";
            $stmt  =  $con->db->prepare($sql);
            $stmt->execute();
        }
    catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    
}


function review($key,$rmk,$rmk_by)
{
       
    $con  =  new database_connect();
    try{
         $sql = "INSERT INTO sae.remark (`recordid`, `Remark`,`Remark_by`) VALUES('$key','$rmk','$rmk_by')";
         $stmt  =  $con->db->prepare($sql);
         $stmt->execute();
        
       }
    catch(PDOException $e)
       {
        echo $e->getMessage();
       }
        
         
     try{
        
            $sql = "INSERT INTO sae.sae_status (`recordid`, `STATUS`, `PWID`, `Baby_ID`) 
            (select '$key' as recordid,5 as status,Woman_ID,Baby_ID from sae.currentsae where recordid  =  '$key')";
            $stmt  =  $con->db->prepare($sql);
            $stmt->execute();
        }
    catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    
}


// $loc = location:javascript://history.go(-1);
// 
// echo $loc;



//header("location:javascript://history.go(-2)");
header("location:./index.php");
?>