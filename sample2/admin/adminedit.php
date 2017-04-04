
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style1.css">
    </head>
    <body>

    <center>

    <div id="links">
    
        <font face="Comic Sans Serif" size="100" color="white">       
            <a href="<?php echo "admin.php";?>">Index</a>&nbsp;        
            <a href="<?php echo "adminadd.php";?>">Users</a>&nbsp;        
            <a href="<?php echo "adminedit.php";?>">Items</a>&nbsp;
            <a href="<?php echo "clientorder.php";?>">Orders</a>&nbsp;
            <a href="<?php echo "http://localhost:9062/sample2/index.php";?>">Logout</a>&nbsp;
        </font>

    </div>
        
        
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
        $result = mysql_query("SELECT * FROM items");
				
				
        echo "<center>

        
            <table border='10' width='1000'>
        <tr>
        <th><font color='yellow'>ITEM NO.</th>
        <th><font color='yellow'>NAME</th>
        <th><font color='yellow'>SIZE</th>
        <th><font color='yellow'>PRICE</th>
		<th><font color='yellow'>PHOTO</th>
        </tr>";

        while($row = mysql_fetch_array($result)) {
        echo "<tr>";
        echo "<td><center><font size='5'>" . $row['item_id'] . "</td>";
        echo "<td><center><font size='5'>" . $row['itemname'] . "</td>";
        echo "<td><center><font size='5'>" . $row['itemsize'] . "</td>";
        echo "<td><center><font size='5'>" . $row['itemprice'] . "</td>";
		echo "<td><center><img src='" . $row['picture'] . "' width='125' height='125'></td>";
		
        echo "</tr>";
        
        }

        echo "</table>";
        echo "</center>";
        ?>
        <!--
        FORM USED TO SELECT RECORD TO BE UPDATED
        -->

        <div id="login1">
        
        <center>
        <br>

        <font color="white">

            ADD NEW ITEM<br><br>
        
            <FORM name='phpBasicMathVersion2' method='post' action='adminedit.php' onsubmit="checkUserInput();" enctype="multipart/form-data">
                      
                ITEM NAME <input type='text' name='txt21' size=100 required><br><br>
                ITEM SIZE &nbsp;&nbsp;&nbsp;<input type='text' name='txt31' size=100 required><br><br>
                PRICE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='txt41' size=100 required><br><br>
                Upload Image<br><br>
                <input type="file" name="file" id="fileToUpload" required>   <br><br>
                <input type='submit' name='submit12' value ='SUBMIT'> 
            
            </FORM>

        </font>

        </center>

        </div>
       
        <?php
            if(isset($_POST['submit12'])){
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
                $varIDNO = mysql_real_escape_string($_POST['txt11']);
                $varUNAME=mysql_real_escape_string($_POST['txt21']);
                $varUPASS=mysql_real_escape_string($_POST['txt31']);
                $varULEVEL=mysql_real_escape_string($_POST['txt41']);
                //PHOTO-------------------------------------------------------------------------------
				$name = $_FILES ['file']['name'];
				$size = $_FILES ['file']['size'];
				$type = $_FILES ['file']['type'];
				$tmp_name = $_FILES ['file'] ['tmp_name'];
				
				if (isset($name)){
					if (!empty($name)){
						$location= 'pic/';
						$aaa = $location.$name;
						move_uploaded_file($tmp_name, $location.$name);
							
						
					} else {
					echo "please choose a file";
					}
				}
				
						
				// SAVE/ INSERT DATA TO TABLE
				$sql="INSERT INTO items (itemname, itemsize, itemprice, picture)VALUES ('$varUNAME', '$varUPASS', '$varULEVEL',  '$aaa')";
				mysql_query($sql)or die(mysql_error());
                // SHOW SUCCESS MESSAGE
				echo "1 record added";
                // CLOSE THE DATABASE    
                mysql_close($db);
                // LOAD ANOTHER PAGE
                //location.replace()
                header("location:adminedit.php");
                 
            }
        ?>
		<?php 
		
		?>
        
        <div id="login1">
        
        <center>

        <font color="white">
      
        <form action="adminedit.php" method="post">
            TYPE ITEM NO.  :  <input type="text" name="txt13">
            <input type="submit" name='submit13' value='EDIT'>
        </form>

        </font>

        </center>

        </div>
        
    </center>
        <?php
        // CHECK IF BUTTON TO UPDATE IS CLICKED
        if(isset($_POST['submit13'])){
            // GET THE SEARCH CRITERIA FROM THE FORM
            $searchCriteria1=$_POST['txt13'];
            // CONNECT TO DATABASE
            dbConnect();
            $sql=mysql_query("SELECT * FROM items WHERE item_id='$searchCriteria1'")
                or die(mysql_error());
            // FIND THE DATA WITHIN THE TABLE
            if(mysql_num_rows($sql) == 1){ 
            $row = mysql_fetch_array($sql);          
            $tempIDNO=$row['item_id'];
            $tempUNAME=$row['itemname'];
            $tempUPASS=$row['itemsize'];
            $tempULEVEL=$row['itemprice'];
            printf("<center>DATA FOUND</center>");
            }
            
            echo "<FORM METHOD='POST' NAME='UPDATER_FORM' ACTION='adminedit.php'>";
            echo "<center>";
            echo "ITEM NO.             <INPUT READONLY NAME='uTXT13' VALUE='$tempIDNO'><BR>";
            echo "ITEM NAME             <INPUT TYPE='TEXT' NAME='uTXT23' VALUE='$tempUNAME'><BR>";
            echo "ITEM SIZE              <INPUT TYPE='TEXT' NAME='uTXT33' VALUE='$tempUPASS'><BR>";
            echo "PRICE              <INPUT TYPE='TEXT' NAME='uTXT43' VALUE='$tempULEVEL'><BR>";
            echo "<input type='submit' name='updateSave' value='SAVE'>";
            echo "</center>";
            echo "</FORM>";
            
        }
        if(isset($_POST['updateSave'])){
            $utempIDNO=$_POST['uTXT13'];
            $utempUNAME=$_POST['uTXT23'];
            $utempUPASS=$_POST['uTXT33'];
            $utempULEVEL=$_POST['uTXT43'];
            mysql_query("UPDATE items
                        SET item_id='$utempIDNO', itemname='$utempUNAME',itemsize='$utempUPASS',itemprice='$utempULEVEL'
                        WHERE item_id='$utempIDNO'") 
            or die(mysql_error());
            printf("DATA SUCCESSFULLY UPDATED");
			header("location:adminedit.php");
        }
     
        ?>
		
        
        <div id="login1">
        
        <center>

        <font color="white">
           <form action="adminedit.php" method="post">
                TYPE ITEM NO. :  <input type="text" name="txt14">
                <input type="submit" name='submit14' value='DELETE'>
    		
            </form>
        </font>

        </center>

        
        </div>
		
		<?php
			
            if(isset($_POST['submit14'])){
            // GET THE SEARCH CRITERIA FROM THE FORM
            $searchCriteria=$_POST['txt14'];
            // CONNECT TO DATABASE
            dbConnect();
            mysql_query("DELETE FROM items WHERE item_id='$searchCriteria'")
            or die(mysql_error());
            printf("DATA DELETED!!!");
            mysql_close($db);
            // LOAD ANOTHER PAGE
            //location.replace()
            header("Location:adminedit.php");
            }
        ?>  
      
    </body>
   
</html>
