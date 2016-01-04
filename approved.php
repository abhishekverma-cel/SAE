<html>
    
 <head>
   <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script/script.js"></script>
   <title>SAE Management System</title>
</head>   

<body>
    
    <!-- =============================Menu Bar===========================-->
    <div id='cssmenu'>
<ul>
   <li ><a href='./index.php'><span>PENDING</span></a></li>
   <li class='active'><a href="./approved.php"><span>APPROVED</span></a></li>
   <li><a href='./it.php'><span>IT VERIFICATION</span></a></li>
   <li><a href='./field.php'><span>FIELD VERIFICATION</span></a></li>
   <li><a href='./disapproved.php'><span>DISAPPROVED</span></a></li>
   <li><a href='./review.php'><span>RE-REVIEW</span></a></li>
</ul>
</div>
    
 <?php
 
 include("lib/dbconnect.php");
 
 $con = new database_connect();
 
 
try {
   
    /*** The SQL SELECT statement ***/
    $sql = "SELECT t.* FROM SAE.CurrentSAE t join sae.v_current_sae_status v on t.recordid = v.recordid and v.STATUS = 1";
      $i = 0;
        echo "<div id = data_container>";
        echo "<table id = 'pending_data' border=".'"1"'."style=".'"width:100%"'.">";
        
        //Table heading
        echo'<thead>';
        echo '<tr class="header" style="background-color: #00cc65;">';
        echo" <th nowrap>SrNo</th>";
        echo" <th nowrap>SOURCE</th>";
        echo" <th nowrap>WOMAN ID</th>";
        echo" <th nowrap>BABY ID</th>";
        echo" <th nowrap>DOB</th>";
        echo" <th>Date_of_Event_Capture</th>";
        echo" <th>Date_of_Enrollment</th>";
        echo" <th>Date_Received</th>";
         echo" <th>ACTION</th>";
        echo"</tr>";
        
        echo" </thead> ";
        
        echo"<tbody>";
        
        $stmt = $con->db->prepare($sql);
        $stmt->execute();
        
        $result=$stmt->fetchall();
        
       foreach ($result as $row )
        {$i=$i+1;
       // print $row['Unit'] .' - '. $row['SubUnit'] . '<br />';
         echo"<tr>";
        echo" <td>$i</td>"; 
        echo" <td>".$row['Source_Form']."</td>";
        echo" <td>".$row['Woman_ID']."</td>";
        echo" <td>".$row['Baby_ID']."</td>";
        echo" <td nowrap>".$row['DOB']."</td>";
        echo" <td nowrap>".$row['Date_of_Event_Capture']."</td>";
        echo" <td nowrap>".$row['Date_of_Enrollment']."</td>";
        echo" <td nowrap>".$row['Date_Received']."</td>";
        echo ' <td nowrap><a href="./case_view.php?action=open&recordkey='.urlencode($row['recordid']).'"class="button">OPEN</a></td>';
        echo" </tr> ";
        }
        
        
       // while($row=$stmt->mysql_fetch_object)
       
        echo"</tbody>";
        echo" </table>"; 
        echo"</div>";
        
        

      

         /*** close the database connection ***/
        $con = null;
}
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
 
 
 
 ?>  
    
    
 





</body>
    
</html>
