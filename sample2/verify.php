<?php
if(isset($_POST['errsubmit'])){
    header("Location: index.php"); 
}
if(isset($_POST['submit'])){ 

    $DB_Host='localhost';
    $DB_UserName= 'root';
    $DB_UserPassword='';
    $DB_Name='adajar';
    
    $db = mysql_connect($DB_Host,$DB_UserName,$DB_UserPassword)or die("Error connecting to database."); 
    
    mysql_select_db($DB_Name, $db)or die("Couldn't select the database."); 
   
    $varuser  = mysql_real_escape_string($_POST['username']); 
    $varpass = mysql_real_escape_string($_POST['password']);
    $sql = mysql_query("SELECT * FROM user  
                        WHERE username='$varuser' AND 
                        pass='$varpass' 
                        LIMIT 1"); 

    if(mysql_num_rows($sql) == 1){ 
        
        header ("Location: items.php");
    }else{ 
        header("Location: errorLogin.php"); 
        exit; 
    }
}else{    
    header("Location: index.php");     
    exit;         
}
