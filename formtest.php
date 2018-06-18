
  <?php
   
   if(filter_has_var(INPUT_POST,'submit')){
       echo 'The details submitted are the following:';
       
       
   }
   

    if(isset($_POST['name'])){
         echo "<br>";
         echo 'Name:';
         $name = htmlentities($_POST['name']);
         echo $name;
         echo "<br>";
         echo 'Email:';
         $email = htmlentities($_POST['email']);
         echo $email;
         echo "<br>";
         echo 'Message:';
         $message = htmlentities($_POST['message']);
         echo $message;
         echo "<br>";
         echo 'Gender:';
         $gender = htmlentities($_POST['gender']);
         echo $gender;

    
       
    }
    $posted=false;
    if( $_POST ) {
        $posted = true;
        $result= $_POST['name'];
    }



$servername = "localhost";
$username = "root";
$password = "root123";
$dbname = "form";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO form_details (name, email,message,gender)
VALUES ('swedeshna', 'swedeshna19@gmail.com', 'hello',FEMALE)";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


   
    
   
    
    

    


   
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</head>
    <body>

  
    <div class="container">
    <?php
    if( $posted ) {
      if( $result ) 
        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
      else
        echo "<script type='text/javascript'>alert('failed!')</script>";
    }
  ?>
     <form method="POST" action="formtest.php">

            <div class="field">
                <label class="label ">Name</label>
                <div class="control">
                <input class="input is-primary" name="name"type="text" id="name" placeholder="Input Name">
                </div>
            </div>
      
          <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left has-icons-right">
              <input class="input is-danger" type="email" name="email" id="email"  placeholder="Email input">
              <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
              </span>
              <span class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
              </span>
            </div>
            
          </div>
          
          
          
           <div class="field">
            <label class="label">Message</label>
            <div class="control">
              <textarea class="textarea" id="message" name="message"  placeholder="Textarea"></textarea>
            </div>
          </div> 
        
          <div class="field">
              <div class="label">Gender</div>
            <div class="control">
              <label class="radio">
                <input type="radio" id="gen" value="Male" name="gender">
                MALE
              </label>
              <label class="radio">
                <input type="radio" id="gen" value="Female" name="gender">
                FEMALE
              </label>
            </div>
            </div>
   
          <div class="field">
            <div class="control">
                <input type="submit" class="button is-info" name="submit" id="submit"  value="submit" />
            </div>
            
          </div>
          </form>
          </div>

          

    </body>


</html>