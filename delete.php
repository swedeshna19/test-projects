<?php
    require('dbconnect.php');
   
    
    try {
       
         
            $form_id = $_GET['form_id'];
            $sql = "DELETE FROM form_details  WHERE form_id='$form_id'";        
            $q = $conn->prepare($sql);
            $q->execute();
            header("Location:records_list.php");   

    }

  
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }

        

?>