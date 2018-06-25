
  <?php

  
       echo 'The details submitted are the following:';
       
    if(isset($_POST['name'])){
         echo "<br>";
         echo 'Name:';
         $name = ucwords($_POST['name']);
         echo $name;
         echo "<br>";
         echo 'Email:';
         $email = ($_POST['email']);
         echo $email;
         echo "<br>";
         echo 'Message:';
         $message = ($_POST['message']);
         echo $message;
         echo "<br>";
         echo 'Gender:';
         $gender = ($_POST['gender']);
         echo $gender;

    
       
    }

    echo '<br>';
   

    
    $servername = "localhost";
    $username = "root";
    $password = "root123";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=form", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "The Database is Connected successfully"; 

        echo '<br>';
        $sql = "INSERT INTO form_details (name, email,message,gender)
        VALUES ('$name', '$email', '$message','$gender')";
        $conn->prepare($sql);
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
      
        }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
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
    











