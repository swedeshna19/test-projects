<?php
    $servername = "localhost";
    $username = "root";
    $password = "root123";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=form", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'connected to database';
         
        $form_id= $_GET['form_id'];
        $sql = "SELECT *
        FROM form_details where form_id='$form_id'";
       
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $row = $q->fetch();


        if(isset($_POST['update'])){
            $newname=$_POST['name'];
            $newemail=$_POST['email'];
            $newmessage=$_POST['message'];
            $newgender=$_POST['gender'];
            $sql="UPDATE form_details SET name='$newname',email='$newemail',message='$newmessage',gender='$newgender'
               WHERE form_id='$form_id'";
            $q = $conn->query($sql);
            echo "meta http-equiv='refresh' content='0;url=dbconfig.php'>";
  
        }
       
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
    <title>Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
</head>
    <body>
    <div class="container">
     <form method="POST" action="dbconfig.php"> 

            <div class="field">
                <label class="label ">Name</label>
                <div class="control">
               
                <input class="input is-primary" name="newname" type="text" id="name" value="<?php echo htmlspecialchars($row['name']);?>">
                <input class="input is-primary" name="form_id" type="hidden" id="name" value="<?php echo htmlspecialchars($row['form_id']);?>">
                
                
                </div>
            </div>
      
          <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left has-icons-right">
              <input class="input is-danger" type="email" name="newemail" id="email" value="<?php echo htmlspecialchars($row['email']);?>">
             
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
              <textarea class="textarea" id="message" name="newmessage"   ><?php echo htmlspecialchars($row['message']);?></textarea>
              
            </div>
          </div> 
        
          <div class="field">
              <div class="label">Gender</div>
            <div class="control">
              <label class="radio">
                <input type="radio" id="gen" value="<?php echo htmlspecialchars($row['gender']) ?>" name="newgender">
                
                MALE
              </label>
              <label class="radio">
                <input type="radio" id="gen" value="<?php echo htmlspecialchars($row['gender']) ?>" name="newgender">
                
                FEMALE
              </label>
            </div>
            </div>
   
          <div class="field">
            <div class="control">
                <input type="submit" class="button is-info" name="update" id="submit"  value="update"/>
            </div>
            
          </div>

        
          </form>
          </div>


    
         
          
         

    </body>
    </html>

