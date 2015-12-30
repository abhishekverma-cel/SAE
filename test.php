<?php
 
 include("lib/dbconnect.php");
 
try {
   
    /*** The SQL SELECT statement ***/
    $sql = "SELECT * FROM Emollient_Flat.CurrentSAE";
     
        echo"<table>";
        foreach ($db->query($sql) as $row)
        {
       // print $row['Unit'] .' - '. $row['SubUnit'] . '<br />';
         echo"<tr>";
        echo" <td>".$row['Unit']."</td>";
        echo" <td>".$row['SubUnit']."</td>";
        echo" </tr> ";
        
        
        }
      echo" </table>";
        
             
        
        
        
        

      

    /*** close the database connection ***/
    $db = null;
}
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
 
 
 
 ?>  