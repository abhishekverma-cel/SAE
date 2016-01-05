<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php


 include("../lib/dbconnect.php");
 
 $con = new database_connect();

try {
   
    /*** The SQL SELECT statement ***/
    $sql = "SELECT * FROM SAE.CurrentSAE limit 1";
            
        $stmt = $con->db->prepare($sql);
        $stmt->execute();
        
        $result=$stmt->fetchall();
                
        include("./mpdf57/mpdf.php");// path to pdf library mpdf 5.7

	//HTML to input to pdf library
    
        foreach ($result as $row ) // Start generating html file for each pwid
        {    
        $html ='<html>
    
                    <head>
                        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <link rel="stylesheet" href="./pdf_style.css"> 
                        <script src="script/script.js"></script>
                        <title>SAE Management System</title>
                    </head>  

                    <body>
                          <div id = "body">
                            <table id = "data">
                                  
                                  <tr> 
                                        <td class = "key">PWID</td>
                                        <td class = "value">'.$row['Woman_ID'].'</td>
                                  </tr>
                                  
                                  <tr> 
                                        <td class = "key">PW-HUSBAND NAME</td>
                                        <td class = "value">'.$row['Husband_RDW'].'</td>
                                  </tr>
                                  
                                  <tr> 
                                        <td class = "key">NUMBER OF BABIES BORN</td>
                                        <td class = "value">'.$row['Number_of_babies_born'].'</td>
                                  </tr>  
                                  
                                  <tr> 
                                        <td class = "key">BABY ID</td>
                                        <td class = "value">'.$row['Baby_ID'].'</td>
                                  </tr>
                                  
                                  <tr> 
                                        <td class = "key">VILLAGE</td>
                                        <td class = "value">'.$row['Village'].'</td>
                                  </tr>
                                   <tr> 
                                        <td class = "key">HAMLET</td>
                                        <td class = "value">'.$row['Hamlet'].'</td>
                                  </tr>
                                  
                                  <tr> 
                                        <td colspan = "2" class = "key" style="text-align: center;text-decoration: underline;">CASE DETAILS</td>
                                  </tr>
                                  <tr>      
                                        <td colspan = "2" class = "value">'.$row['Details_Of_the_Case'].'</td>
                                  </tr>  
                                      
                                                 
                            </table>
                          </div> <!-- End of Body DIV -->                    
                    </body>';
	

        

        
                    
                    //*****************PDF generation script*****************
                    echo $html;
                    $mpdf=new mPDF(); 

                    $mpdf->autoScriptToLang = true;
                    $mpdf->baseScript = 1;
                    $mpdf->autoVietnamese = true;
                    $mpdf->autoArabic = true;

                    $mpdf->autoLangToFont = true;

                    $mpdf->WriteHTML($html);
                    //$mpdf->Output();
                    $mpdf->Output('C:/wamp/www/SAE/pdf_generate/PDFS/'.$row['Woman_ID'].'.pdf','F'); 
                    //echo "Exported".$row['pwid'];

                    unset($mpdf);

        }// End of for each loop
        
    /*** close the database connection ***/
        $con = null;
} //End of try 
catch(PDOException $e)
    {
    echo $e->getMessage();
    }



?>