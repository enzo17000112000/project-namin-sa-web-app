<!DOCTYPE html>
<html>
<head>
        
    <title>enzo sample login</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body id="main" style="padding:100px;">
    <div id='links'>
        
         
</head>
    <center>


        <br><br>
  
        <a href="<?php echo "index.php";?>">HOME</a>&nbsp;
       
        <br><br><br>
    </center>
<body>
    <h1>REGISTER HERE</h1>    
       
    <center>
        
        <br><br>
        

            <FORM name='phpBasicMathVersion2' method='post' action='register.php' onsubmit="checkUserInput();">
            
                USERNAME:&nbsp;&nbsp; <input type='text' name='item_name' size=25 required><br><br>              
                PASSWORD:<input type='password' name='quantity' size=25 required><br><br>
                
                
                    
                <input type='submit' name='add_item' id='btn' value ='REGISTER NOW'> 
                
                           
                <br><br>
                </div>

    </center>
            </FORM>
        
        <br><br>
        <?php
            if(isset($_POST['add_item'])){
                // CONNECT TO A DATABASE
                // INITIALIZE CONNECTION VALUES
                $DB_Host='localhost';
                $DB_UserName= 'root';
                $DB_UserPassword='';
                $DB_Name='enzo';
                // CONNECT
                $db = mysql_connect($DB_Host,$DB_UserName,$DB_UserPassword)or die("Error connecting to database."); 
                // SELECT THE DATABASE
                mysql_select_db($DB_Name, $db)or die("Couldn't select the database.");
                // INITIALIZE VARIABLES
                $varIDNO = mysql_real_escape_string($_POST['item_name']);
                $varUNAME=md5(mysql_real_escape_string($_POST['quantity']));
                $ulevel = "user";
                
                // SAVE/ INSERT DATA TO TABLE
                $sql="INSERT INTO user (username, pass, level )VALUES ('$varIDNO', '$varUNAME', 'user')";
                mysql_query($sql)or die(mysql_error());
                
                // SHOW SUCCESS MESSAGE
                 echo "<script type='text/javascript'>alert('YOU ARE NOW REGISTERED!')</script>";
                // CLOSE THE DATABASE    
                mysql_close($db);
                // LOAD ANOTHER PAGE
                //location.replace()
               // header("location:index.php");
                 
            }
			?>

			
		
		
     
    </body>


    
</html>
