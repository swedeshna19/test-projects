<?php
    $servername = "localhost";
    $username = "root";
    $password = "root123";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=form", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo 'connected to database';
         
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