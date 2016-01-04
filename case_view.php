<html>
    
 <head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/case_style.css">
   
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script/script.js"></script>
   <title>SAE Management System</title>
</head>  

<?php
$page_id = basename($_SERVER['HTTP_REFERER']);


$action = $_GET['action'];
$id = $_GET['recordkey'];
if(isset($_GET['tab']))
{
$tab = $_GET['tab'];
}
else $tab =0;


 include("lib/dbconnect.php");
 $con = new database_connect();
 $con2 = new database_connect();
 
 
 try {
    $sql = "Select * From SAE.CurrentSAE WHERE recordid = '$id'";
 
    $stmt = $con->db->prepare($sql);
    $stmt->execute();
        
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
    
    
    // new query for Remarks
 try {
 $sql2 = "Select * From SAE.remark WHERE recordid = '$id' order by Remark_time";
 
  $stmt2 = $con2->db->prepare($sql2);
  $stmt2->execute();
        
  $remark = $stmt2->fetchall();
  
 
 }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
      
        
        
  /*** close the database connection ***/
    $con = null;

?>
<!-- End of php Data connection -->


<body>
 
 <!-- =================Header====================== -->
 <div id = "header">
     <!--<div class = "logo" >
         <img src="./resources/logo.png" alt="CEL LOGO" style="width:304px;height:228px;"> </div>-->
     <h2><a href=".\index.php">SAE CASE</a></h2>
 </div>  
 
 <!-- ================Sub Header=================== -->
 <div id = "subheader">
   <table>
       <tr>
           <td class="key">SOURCE FORM</td>
           <td class="value"><?php echo $row['Source_Form']; ?> </td>
           <td class="key">&nbspPWID</td>
           <td class="value"><?php echo $row['Woman_ID']; ?> </td>
           <td class="key">&nbspBABY ID</td>
           <td class="value"><?php echo $row['Baby_ID']; ?> </td>
           <td class="key">&nbspUNIT</td>
           <td class="value"><?php echo $row['Unit']; ?> </td>
           <td class="key">&nbspSUBUNIT</td>
           <td class="value"><?php echo $row['SubUnit']; ?> </td>
            <td class="key">&nbspVILLAGE</td>
           <td class="value"><?php echo $row['Village']; ?> </td>
            <td class="key">&nbspHAMLET</td>
           <td class="value"><?php echo $row['Hamlet']; ?> </td>
           <td class="key">&nbspPW_H_NAME</td>
           <td class="value"><?php echo $row['Husband_RDW']; ?> </td>
           
       </tr>
   </table>        
 </div> 
 
 <!-- =======================BODY SECTION==========================-->
 
 <div id="data">
     <table>
         <tr>
             <td>SOURCE FORM</td>
             <td><?php echo $row['Source_Form']; ?></td>
         </tr>
         <tr>
             <td>PWID</td>
             <td><?php echo $row['Woman_ID']; ?></td>
         </tr>
          <tr>
             <td>PW-HUSBAND NAME</td>
             <td><?php echo $row['Husband_RDW']; ?></td>
         </tr>
          <tr>
             <td>BABY ID</td>
             <td><?php echo $row['Baby_ID']; ?></td>
         </tr>
         <tr>
             <td>BABY GENDER(M/F)</td>
             <td><?php echo $row['baby_gender']; ?></td>
         </tr>
         <tr>
             <td>ADDRESS</td>
             <td><?php echo $row['address']; ?></td>
         </tr>
         <tr>
             <td>WHO CLUSTER</td>
             <td><?php echo $row['WHO_cluster_ID']; ?></td>
         </tr>
         <tr>
             <td>NUMBER OF BABIES BORN</td>
             <td><?php echo $row['Number_of_babies_born']; ?></td>
         </tr>
         <tr>
             <td>DATE OF BIRTH</td>
             <td><?php echo $row['DOB']; ?></td>
         </tr>
         <tr>
             <td>DATE OF BIRTH(CONFIRM)</td>
             <td><?php echo $row['date_of_birth_confirm']; ?></td>
         </tr>
         <tr>
             <td>DATE OF EVENT CAPTURED</td>
             <td><?php echo $row['Date_of_Event_Capture']; ?></td>
         </tr>
         <tr>
             <td>DATE OF DEATH (SOURCE FORM)</td>
             <td><?php echo $row['Date_of_Death_in_Source_form']; ?></td>
         </tr>
         <tr>
             <td>DATE OF ENROLLMENT</td>
             <td><?php echo $row['Date_of_Enrollment']; ?></td>
         </tr>
         <tr>
             <td>REASON FOR DEATH</td>
             <td><?php echo $row['reason_of_death_of_the_baby']; ?></td>
         </tr>
         <tr>
             <td>DATE FORM RECEIVED</td>
             <td><?php echo $row['Date_Created_Local']; ?></td>
         </tr>
         <tr >
             <td colspan = "2" class="col_span">DETAILS OF THE CASE</td>
         </tr>    
         <tr >    
             <td colspan = "2"><?php echo $row['Details_Of_the_Case']; ?></td>
         </tr>
     </table>
     
 </div>
 
 <div id = remark_container >
    <?php foreach($remark as $rem){
        echo '<div class="dialogbox">'; ?>
        
        <div class = "icon">
            <span><?php echo $rem['Remark_by']; ?></span>            
        </div>
        
        
        
     <?php   echo    '<div class="body">';
        echo        '<span class="tip tip-left"></span>';
                   echo '<div class="message">';
                   echo "<span>".$rem['Remark']."</span>";
                   echo '</div>';
                   
                   echo '<div class="time">';
                   echo "<span>".$rem['Remark_time']."</span>";
                   echo '</div>';
            echo '</div>';
        echo '</div>';
        } 
       ?>
 </div>
 <!--=================End of data div============================-->
 
    
<!-- =================Footer======================= -->
<div id = "footer">
    
    <div id = "remark">  
   <table>  
       <tr>
        <form id="remark_form" action="update_data.php" method="GET" > 
            <td> REMARK:</td>
            <td><input type="text" size="90" name="remark" required></td>
            <input type='hidden' name='case_id' value="<?php echo "$id";?>" />
            <input type='hidden' name='page_id' value="<?php echo "$page_id";?>" />  
            
            <?php switch($tab) {
                
                case "pending":?>
                                <td><input type = "submit" value="APPROVED" name="action" class="but" style="background:#339966;" ></input></td>
                                <td><input type = "submit" value="DIS-APPROVED" name= "action" class="but" style="background:#ff944d;"></input></td>
                                <td><input type = "submit" value="SEND TO IT" name= "action" class="but" style="background:#ffba33;"></input></td>
                                <td><input type = "submit" value="SEND TO FIELD" name= "action" class="but" style="background:#6699ff;"></input></td>
                      <?php break; 
                case "it": ?>
                                
                                <td><input type = "submit" value="RE-REVIEW" name= "action" class="but" style="background:#ffba33;"></input></td>
                                <td><input type = "submit" value="SEND TO FIELD" name= "action" class="but" style="background:#6699ff;"></input></td>
                      <?php break; 
                      
                      
                case "field":?>
                                
                                <td><input type = "submit" value="RE-REVIEW" name= "action" class="but" style="background:#ff944d;"></input></td>
                                <td><input type = "submit" value="SEND TO IT" name= "action" class="but" style="background:#ffba33;"></input></td>
                                
                      <?php break;
                      
                case "review":?>
                                
                                <td><input type = "submit" value="APPROVED" name="action" class="but" style="background:#339966;" ></input></td>
                                <td><input type = "submit" value="DIS-APPROVED" name= "action" class="but" style="background:#ff944d;"></input></td>
                                <td><input type = "submit" value="SEND TO IT" name= "action" class="but" style="background:#ffba33;"></input></td>
                                <td><input type = "submit" value="SEND TO FIELD" name= "action" class="but" style="background:#6699ff;"></input></td>
                                
                      <?php break;
                DEFAULT:?>
                                <td><input type = "submit" value="APPROVED" name="action" class="but" style="background:#339966;" ></input></td>
                                <td><input type = "submit" value="DIS-APPROVED" name= "action" class="but" style="background:#ff944d;"></input></td>
                                <td><input type = "submit" value="SEND TO IT" name= "action" class="but" style="background:#ffba33;"></input></td>
                                <td><input type = "submit" value="SEND TO FIELD" name= "action" class="but" style="background:#6699ff;"></input></td>
                      <?php break;  
            }?>
            
                
            
            
            </form>
            
                     
       </tr>
  </table>
     
    </div>
    <!-- End of remark div-->
  
</div> 
<!-- End of footer div-->


</body>
    
</html>
