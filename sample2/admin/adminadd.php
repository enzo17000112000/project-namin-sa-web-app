<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style1.css">
    </head>
    
    <body>
    <center>

    <div id="links">
    
        <font face="Comic Sans Serif" size="40" color="white">       
            <a href="<?php echo "admin.php";?>">Index</a>&nbsp;        
            <a href="<?php echo "adminadd.php";?>">Users</a>&nbsp;        
            <a href="<?php echo "adminedit.php";?>">Items</a>&nbsp;
            <a href="<?php echo "clientorder.php";?>">Orders</a>&nbsp;
            <a href="<?php echo "http://localhost:9062/sample2/index.php";?>">Logout</a>&nbsp;
        </font>
        
    </div>

        <font face="Comic Sans Serif" size="20" color="white"> 
        ADD NEW RECORD
        </font>
        </center>
        <div id="login2">
        
        <center>
        <br>
            <FORM name='phpBasicMathVersion2' method='post'action='adminadd.php' onsubmit="checkUserInput();">
                <font face="Comic Sans Serif" color="white">      
                USER NAME: <input type='text' name='txt2' size=25>
                USER PASSWORD: <input type='password' name='txt3' size=25>
                ACCESS LEVEL: <input type='text' name='txt4' size=25>
                </font>
                </div>
                <center>
                <font face="Comic Sans Serif" size="20" color="white">
                    &nbsp;&nbsp;&nbsp;&nbsp;(admin || user)
                </font></center><br>
                <center>
                
                <input type='submit' name='submit1' value ='SUBMIT'> 
                           
                 </center><br>
                
                </center>
        </FORM>
        </div>
        
        <?php
            if(isset($_POST['submit1'])){
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
                $varIDNO = mysql_real_escape_string($_POST['txt1']);
                $varUNAME=mysql_real_escape_string($_POST['txt2']);
                $varUPASS=md5(mysql_real_escape_string($_POST['txt3']));
                $varULEVEL=mysql_real_escape_string($_POST['txt4']);
                
                // SAVE/ INSERT DATA TO TABLE
                $sql="INSERT INTO user (username, pass, level)VALUES ('$varUNAME', '$varUPASS', '$varULEVEL')";
                mysql_query($sql)or die(mysql_error());
                // SHOW SUCCESS MESSAGE
                echo "1 record added";
                // CLOSE THE DATABASE    
                mysql_close($db);
                // LOAD ANOTHER PAGE
                //location.replace()
                header("location:adminadd.php");
                 
            }
        ?>
		
		 <?php
        function dbConnect(){
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
        }
        dbConnect();
        // QUERY
        $result = mysql_query("SELECT * FROM user");
		$aaa=mysql_num_rows($result);
		?>
        <center>
            <table border='10' width='1000'>
        <tr>
        <th>ID</th>
        <th>USER NAME</th>
        <th>ACCESS LEVEL</th>
	
        </tr>

        <?php while($row = mysql_fetch_array($result)) {
			
		?>
		
         <tr>
		<td><center><?php echo $row['user_id'];?></td>
        <td><?php echo $row['username'];?></td>
      
        <td><?php echo $row['level'];?> </td>
		
        </tr>
      
        <?php } ?>

        </table>
        </center>
        
        <br>
    <center>
    <font color="white">
       TYPE THE USER ID OF THE RECORD<BR>
       YOU WANT TO DELETE
       <div id="login3">
            <form action="adminadd.php" method="post">
            USER_ID  :  <input type="text" name="txt15">
            <input type="submit" name='submit15' value='DELETE'>
		</div>
        </form>
    </font>
           </center>

        <?php
			
            if(isset($_POST['submit15'])){
            // GET THE SEARCH CRITERIA FROM THE FORM
            $searchCriteria=$_POST['txt15'];
            // CONNECT TO DATABASE
            dbConnect();
            mysql_query("DELETE FROM user WHERE user_id='$searchCriteria'")
            or die(mysql_error());
            printf("DATA DELETED!!!");
            mysql_close($db);
            // LOAD ANOTHER PAGE
            //location.replace()
            header("Location:adminadd.php");
            }
        ?>  
    </body>
    
</html>
