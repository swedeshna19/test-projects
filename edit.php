
<?php
require('dbconnect.php');

?>

<?php
              
           
              $form_id= $_GET['form_id'];
              if(isset($_POST['update'])){
    
                $name = ($_POST['name']);
                $email = ($_POST['email']);
                $message = ($_POST['message']);
                $gender = ($_POST['gender']);
            
                try {
                  $sql = "UPDATE form_details SET name = :name, email = :email,message = :message,gender=:gender WHERE form_id =:form_id ";
                  $stmt = $conn->prepare($sql);        
                  $stmt->bindParam(':form_id', $form_id);
                  $stmt->bindParam(':name', $name);
                  $stmt->bindParam(':email', $email);
                  $stmt->bindParam(':message', $message);
                  $stmt->bindParam(':gender',$gender);
                
                  $stmt->execute();
                  header("Location:records_list.php"); 
                }
                catch(PDOException $e)
                {
                echo "Error: " . $e->getMessage();
                }
          
              }
            $sql = "SELECT *
            FROM form_details where form_id='$form_id'";
          
            $q = $conn->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $row = $q->fetch();
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
     <form method="POST" > 
            
     





            <div class="field">
                <label class="label ">Name</label>
                <div class="control">
               
                <input class="input is-primary" name="name" type="text" id="name" value="<?php echo htmlspecialchars($row['name']);?>"/>
                
                
                
                </div>
            </div>
      
          <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left has-icons-right">
              <input class="input is-danger" type="email" name="email" id="email" value="<?php echo htmlspecialchars($row['email']);?>"/>
             
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
              <textarea class="textarea" id="message" name="message"   ><?php echo htmlspecialchars($row['message']);?></textarea>
              
            </div>
          </div> 
        
          <div class="field">
              <div class="label">Gender</div>
            <div class="control">
              <label class="radio">
              <input type="radio" name="gender" value="male" <?php if($row['gender']=='male'){echo 'checked';}?>/>
                          
                MALE
              </label>


              <label class="radio"> 
                <input type="radio" name="gender" value="female"  <?php if($row['gender']=='female'){echo 'checked';}?>/>               
                
                FEMALE
              </label>
            </div>
            </div>

             <div class="field">
            <div class="control">

             <input class="input is-primary" name="form_id" type="hidden" id="name" value="<?php echo htmlspecialchars($row['form_id']);?>"/>
                
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

