<?php
$servername = "localhost";
    $username = "root";
    $password = "root123";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=form", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
         
         

        $sql = 'SELECT *
        FROM form_details';
        

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
        <title>display records</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    </head>
    <body>

    <div class="container">
            <h1 class="is-bold">RECORD SUBMITTED</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>form_id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>message</th>
                        <th>gender</th>
                        <th>record created</th>
                        <th>edit</th>
                        <th>delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['form_id']) ?></td>
                            <td><a href="<?php echo 'view.php?form_id='.$row['form_id']?>"> <?php echo htmlspecialchars($row['name']);?></a></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['message']) ?></td>
                            <td><?php echo htmlspecialchars($row['gender']) ?></td>
                            <td><?php echo htmlspecialchars($row['field_created_at']) ?></td>
                            <td><a href="<?php echo 'edit.php?form_id='.$row['form_id']?>">edit</a></td>
                            <td onclick="return confirm('Do you want to delete?')"><a href="<?php echo 'delete.php?form_id='.$row['form_id']?>">delete</a></td>

                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

           

        
   
          
    </body>
</html>