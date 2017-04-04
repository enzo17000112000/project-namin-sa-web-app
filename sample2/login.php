<?php

if(isset($_POST['submit'])){ 

    $DB_Host='localhost';
    $DB_UserName= 'root';
    $DB_UserPassword='';
    $DB_Name='enzo';
    
    $db = mysql_connect($DB_Host,$DB_UserName,$DB_UserPassword)or die("Error connecting to database."); 
    
    mysql_select_db($DB_Name, $db)or die("Couldn't select the database."); 
	
    $varuser  = mysql_real_escape_string($_POST['user']); 
    $varpass = md5(mysql_real_escape_string($_POST['pass']));
    $sql = mysql_query("SELECT * FROM user  
                        WHERE username='$varuser' AND 
                        pass='$varpass' 
                        LIMIT 1"); 
	
    if(mysql_num_rows($sql) == 1){ 
        
         $row = mysql_fetch_array($sql); 
        session_start(); 
        $_SESSION['studentNumber']      = $row['username']; 
        $_SESSION['studentName']        = $row['pass']; 
        $_SESSION['studentAccessLevel'] = $row['level']; 
        $_SESSION['logged'] = TRUE; 
        if (($_SESSION['studentAccessLevel']) == 'admin'){
         header ("Location: /sample2/admin/admin.php");
        exit;}
		else{ 
        header ("Location: items.php");
            exit;
    }}
	else{ 
        echo '<script language="javascript">';
echo 'alert("YOU ARE AN UNAUTHORIZED USER")';

echo '</script>';

        exit; }
}
?>
<?php

if(isset($_POST['register'])){ 

    $DB_Host='localhost';
    $DB_UserName= 'root';
    $DB_UserPassword='';
    $DB_Name='enzo';
    
    $db = mysql_connect($DB_Host,$DB_UserName,$DB_UserPassword)or die("Error connecting to database."); 
    
    mysql_select_db($DB_Name, $db)or die("Couldn't select the database."); 
	
    header("Location: register.php");}
?>

