<?php 

 if (isset($_GET['selected_pwid'])) 
    {
        $selected_pwid=($_GET['selected_pwid']); 
    }
$pwid = implode(',', $selected_pwid);    
echo $pwid;
    
    
?>