<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
        
    </center>

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
            <table border='1'>
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
        
        <br><br><br>
    <center>
       TYPE THE USER ID OF THE RECORD<BR>
       YOU WANT TO DELETE<BR><br><br>
       <form action="admindelete.php" method="post">
            USERNAME  :  <input type="text" name="txt1">
            <input type="submit" name='submit1' value='DELETE'>
		
        </form>
           </center>

        <?php
			
            if(isset($_POST['submit1'])){
            // GET THE SEARCH CRITERIA FROM THE FORM
            $searchCriteria=$_POST['txt1'];
            // CONNECT TO DATABASE
            dbConnect();
            mysql_query("DELETE FROM user WHERE user_id='$searchCriteria'")
            or die(mysql_error());
            printf("DATA DELETED!!!");
            mysql_close($db);
            // LOAD ANOTHER PAGE
            //location.replace()
            header("Location:admindelete.php");
            }
        ?>  
	
		
    </body>
    
</html>