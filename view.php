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
        $sql = "SELECT *
        FROM form_details where form_id='$form_id'";
       
      

        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
    }

  
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }

        

?>


<!DOCTYPE html>
<html>
    <head>
        <title>view record</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    </head>
    <body>

    <div class="container">
            <h1 class="is-bold">record details</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>form_id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>message</th>
                        <th>gender</th>
                        <th>record created</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $row = $q->fetch() ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['form_id']) ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></a></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['message']) ?></td>
                            <td><?php echo htmlspecialchars($row['gender']) ?></td>
                            <td><?php echo htmlspecialchars($row['field_created_at']) ?></td>
                            

                        </tr>
                    
                </tbody>
            </table>