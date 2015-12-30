<html>
    
 <head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script/script.js"></script>
   <title>SAE Management System</title>
</head>   

<body>
    
 <?php
 
 include("lib/dbconnect.php");
 
try {
   
    /*** The SQL SELECT statement ***/
    $sql = "SELECT * FROM Emollient_Flat.CurrentSAE";
      $i = 0;
        echo "<div id = data_container>";
        echo"<table id = 'pending_data' border=".'"1"'."style=".'"width:100%"'.">";
        
        //Table heading
        echo"<thead>";
            echo"<tr class=".'"header"'.">";
            echo" <th nowrap>SrNo</th>";
            echo" <th nowrap>Source_Form</th>";
            echo" <th nowrap>Woman_ID</th>";
            echo" <th nowrap>Unit</th>";
            echo" <th>SubUnit</th>";
            echo" <th nowrap>Village</th>";
            echo" <th nowrap>Hamlet</th>";
            echo" <th nowrap>address</th>";
            echo" <th nowrap>Husband_RDW</th>";
            echo" <th>Number of Babies</th>";
            echo" <th nowrap>DOB</th>";
            echo" <th>Date_of_Event_Capture</th>";
            echo" <th>Date_of_Enrollment</th>";
            echo" <th>Date_Received</th>";
            echo"</tr>";
        echo" </thead> ";
        
        echo"<tbody>";
            echo"<tr>";
            
                echo"<td colspan=".'"14"'.">";
                echo"<div class=".'"table-wrap"'." >";
                
                echo"<table class =".'"table-dalm"'.">";
                    
           echo"<tbody>";
                foreach ($db->query($sql) as $row)
                {$i=$i+1;
        
       
                 echo"<tr>";
                    echo" <td>$i</td>"; 
                    echo" <td>".$row['Source_Form']."</td>";
                    echo" <td>".$row['Woman_ID']."</td>";
                    echo" <td>".$row['Unit']."</td>";
                    echo" <td>".$row['SubUnit']."</td>";
                    echo" <td>".$row['Village']."</td>";
                    echo" <td>".$row['Hamlet']."</td>";
                    echo" <td nowrap>".$row['address']."</td>";
                    echo" <td nowrap>".$row['Husband_RDW']."</td>";
                    echo" <td>".$row['Number_of_babies_born']."</td>";
                    echo" <td nowrap>".$row['DOB']."</td>";
                    echo" <td nowrap>".$row['Date_of_Event_Capture']."</td>";
                    echo" <td nowrap>".$row['Date_of_Enrollment']."</td>";
                    echo" <td nowrap>".$row['Date_Received']."</td>";
                echo" </tr> ";
                  }
             echo"<tbody>";      
           echo" </table>";
           echo"</div>";
         echo"</td>";
        echo"</tr>";
        
        echo"</tbody>";
      echo" </table>"; 
      echo"</div>";
        
        

      

    /*** close the database connection ***/
    $db = null;
}
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
 
 
 
 ?>  
    
    
 

<div id='cssmenu'>
<ul>
   <li class='active'><a href='#'><span>PENDING</span></a></li>
   <li ><a href='#'><span>APPROVED</span></a></li>
   <li><a href='#'><span>IT VERIFICATION</span></a></li>
   <li><a href='#'><span>FIELD VERIFICATION</span></a></li>
   <li><a href='#'><span>DISAPPROVED</span></a></li>
</ul>
</div>



</body>
    
</html>
