
  <?php
        require('dbconnect.php');

       echo 'The details submitted are the following:' . '<br>';
       
       


   
if(isset($_POST['name'])){
    
    echo 'Name:';
    $name = ucwords($_POST['name']);
    echo $name .'<br>';  
    echo 'Email:';
    $email = ($_POST['email']);
    echo $email . '<br>';
    echo "<br>";
    echo 'Message:';
    $message = ($_POST['message']);
    echo $message . '<br>';
    echo 'Gender:';
    $gender = ($_POST['gender']);
    echo $gender . '<br>';

  
}
   

     
    echo '<br>';
   

    
    
    
    try {
        
        $stmt = $conn->prepare("INSERT INTO form_details (name, email,message,gender)
        VALUES (:name,:email,:message,:gender)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':gender', $gender);
        $stmt->execute();
       
        echo "New record created successfully";
    }
    catch(PDOException $e)
    {
    echo "Connection insertion: " . $e->getMessage();
    }

        

?>



 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
</head>
<body>
<form>

   
   <a href="records_list.php" class="button is-primary">View Records</a>
   

</form>
  
</body>
</html>
    











