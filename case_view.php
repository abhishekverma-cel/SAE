<html>
    
 <head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/case_style.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script/script.js"></script>
   <title>SAE Management System</title>
</head>  

<?php

$action= $_GET['action'];
$id=$_GET['recordkey'];


 include("lib/dbconnect.php");
 
 try {
 $sql = "Select * From SAE.CurrentSAE WHERE recordid = '$id'";
 
 $stmt = $db->query($sql);
 $result = $stmt->fetch(PDO::FETCH_ASSOC); 
 
 }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
     /*   foreach($result as $key=>$val)
    {
    echo $key.' - '.$val.'<br />';
    }
   */     
        
        
  /*** close the database connection ***/
    $db = null;

?>
<!-- End of php Data connection -->


<body>
 
 <!-- =================Header====================== -->
 <div id = "header">
     <h2>SAE CASE</h2>
 </div>  
 
 <!-- ================Sub Header=================== -->
 <div id = "subheader">
   <table>
       <tr>
           <td class="key">SOURCE FORM</td>
           <td class="value"><?php echo $result['Source_Form']; ?> </td>
           <td class="key">&nbspPWID</td>
           <td class="value"><?php echo $result['Woman_ID']; ?> </td>
           <td class="key">&nbspBABY ID</td>
           <td class="value"><?php echo $result['Baby_ID']; ?> </td>
           <td class="key">&nbspUNIT</td>
           <td class="value"><?php echo $result['Unit']; ?> </td>
           <td class="key">&nbspSUBUNIT</td>
           <td class="value"><?php echo $result['SubUnit']; ?> </td>
            <td class="key">&nbspVILLAGE</td>
           <td class="value"><?php echo $result['Village']; ?> </td>
            <td class="key">&nbspHAMLET</td>
           <td class="value"><?php echo $result['Hamlet']; ?> </td>
           <td class="key">&nbspPW_H_NAME</td>
           <td class="value"><?php echo $result['Husband_RDW']; ?> </td>
           
       </tr>
   </table>        
 </div> 
 
 <!-- =======================BODY SECTION==========================-->
 
 <div id="data">
     <table>
         <tr>
             <td>SOURCE FORM</td>
             <td><?php echo $result['Source_Form']; ?></td>
         </tr>
         <tr>
             <td>PWID</td>
             <td><?php echo $result['Woman_ID']; ?></td>
         </tr>
          <tr>
             <td>PW-HUSBAND NAME</td>
             <td><?php echo $result['Husband_RDW']; ?></td>
         </tr>
          <tr>
             <td>BABY ID</td>
             <td><?php echo $result['Baby_ID']; ?></td>
         </tr>
         <tr>
             <td>BABY GENDER(M/F)</td>
             <td><?php echo $result['baby_gender']; ?></td>
         </tr>
         <tr>
             <td>ADDRESS</td>
             <td><?php echo $result['address']; ?></td>
         </tr>
         <tr>
             <td>WHO CLUSTER</td>
             <td><?php echo $result['WHO_cluster_ID']; ?></td>
         </tr>
         <tr>
             <td>NUMBER OF BABIES BORN</td>
             <td><?php echo $result['Number_of_babies_born']; ?></td>
         </tr>
         <tr>
             <td>DATE OF BIRTH</td>
             <td><?php echo $result['DOB']; ?></td>
         </tr>
         <tr>
             <td>DATE OF BIRTH(CONFIRM)</td>
             <td><?php echo $result['date_of_birth_confirm']; ?></td>
         </tr>
         <tr>
             <td>DATE OF EVENT CAPTURED</td>
             <td><?php echo $result['Date_of_Event_Capture']; ?></td>
         </tr>
         <tr>
             <td>DATE OF DEATH (SOURCE FORM)</td>
             <td><?php echo $result['Date_of_Death_in_Source_form']; ?></td>
         </tr>
         <tr>
             <td>DATE OF ENROLLMENT</td>
             <td><?php echo $result['Date_of_Enrollment']; ?></td>
         </tr>
         <tr>
             <td>REASON FOR DEATH</td>
             <td><?php echo $result['reason_of_death_of_the_baby']; ?></td>
         </tr>
         <tr>
             <td>DATE FORM RECEIVED</td>
             <td><?php echo $result['Date_Created_Local']; ?></td>
         </tr>
         <tr >
             <td colspan = "2" class="col_span">DETAILS OF THE CASE</td>
         </tr>    
         <tr >    
             <td colspan = "2"><?php echo $result['Details_Of_the_Case']; ?></td>
         </tr>
     </table>
     
 </div>
 
    
<!-- =================Footer======================= -->
<div id = "footer">
    
    <div id = "remark">  
   <table>  
       <tr>
        <form id="remark_form" action="update_data.php" method="get" > 
            <td> REMARK:</td>
            <td><input type="text" size="90" name="remark" required></td>
         </form>   
            <td><a href="#">APPROVED</a></td>
            <td><a href="#">DIS APPROVED</a></td>
            <td><a href="#">SEND TO IT</a></td>
            <td><a href="#">SEND TO FIELD</a></td>
       </tr>
  </table>
    </div>
    <!-- End of remark div-->
</div> 
<!-- End of footer div-->


</body>
    
</html>
