<?php
// Start the session
session_start();
$customer=$_SESSION['studentNumber'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style2.css">
    </head>
    <body id="int">
    <div id="links">
    <center>
        
        <font face="Comic Sans Serif" size="40">
		<a href="<?php echo "items.php";?>">Menu</a>&nbsp;&nbsp;&nbsp;
		<a href="<?php echo "order.php";?>">My Orders</a>&nbsp;&nbsp;&nbsp;
        <a href="<?php echo "index.php";?>">Logout</a>&nbsp;&nbsp;&nbsp;
		</font>
		
       
        <br><br>
        </center>
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
		echo "<center><font face='Comic Sans Serif' size='100' color='white'>WELCOME  " .$_SESSION['studentNumber'];
        echo "<center></font><br>
        
        
            <table border='10' width='1200'>
        <tr>
        <th><font face='Comic Sans Serif' color='white'>ITEM NO.</th>
        <th><font face='Comic Sans Serif' color='white'>NAME</th>
        <th><font face='Comic Sans Serif' color='white'>SIZE</th>
        <th><font face='Comic Sans Serif' color='white'>PRICE</th>
		<th><font face='Comic Sans Serif' color='white'>PHOTO</th>
        </tr>";

        while($row = mysql_fetch_array($result)) {

        echo "<tr>";
        echo "<td><font face='Comic Sans Serif' color='white'><center>" . $row['item_id'] . "</td>";
        echo "<td><font face='Comic Sans Serif' color='white'>" . $row['itemname'] . "</td>";
        echo "<td><font face='Comic Sans Serif' color='white'>" . $row['itemsize'] . "</td>";
        echo "<td><font face='Comic Sans Serif' color='white'>" . $row['itemprice'] . "</td>";
		echo "<td><center><font face='Comic Sans Serif' color='white'><img src='admin/" . $row['picture'] . "' width='100' height='100'></td>";
		
        echo "</tr>";
        
        }

        echo "</table>";
        echo "</center>";

        ?>
        <!--
        FORM USED TO SELECT RECORD TO BE UPDATED
        -->
			
    <center>
        <br><br>
      
        <form action="items.php" method="post">
            <font face='Comic Sans Serif' color='white'>TYPE ITEM NO.  :  <input type="text" name="txt16">
            <input type="submit" name='submit16' id='btn' value='ADD TO CART'>
        </form>
    </center>
         <?php
        // CHECK IF BUTTON TO UPDATE IS CLICKED
        if(isset($_POST['submit16'])){
            // GET THE SEARCH CRITERIA FROM THE FORM
            $searchCriteria1=$_POST['txt16'];
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
			else{
			echo "<script type='text/javascript'>alert('ITEM NOT FOUND!')</script>";
			header("Location:items.php");
			}
            
            
            echo "<FORM METHOD='POST' NAME='UPDATER_FORM' ACTION='items.php'>";
            echo "<center>";
			echo "           <center><img src='admin/" . $row['picture'] . "' width='100' height='100' name='uPicture'><BR>";
            echo "<font face='Comic Sans Serif' color='white'>ITEM NO.             <INPUT READONLY NAME='uTXT13' VALUE='$tempIDNO'><BR>";
            echo "<font face='Comic Sans Serif' color='white'>ITEM NAME            <INPUT READONLY NAME='uTXT23' VALUE='$tempUNAME'><BR>";
            echo "<font face='Comic Sans Serif' color='white'>ITEM SIZE            <INPUT READONLY NAME='uTXT33' VALUE='$tempUPASS'><BR>";
            echo "<font face='Comic Sans Serif' color='white'>PRICE                <INPUT READONLY NAME='uTXT43' VALUE='$tempULEVEL'><BR>";
			echo "<font face='Comic Sans Serif' color='white'>QUANTITY             <INPUT TYPE='NUMBER' NAME='uTXT53' VALUE='' required><BR>";
            echo "<input type='submit' name='updateSave' value='SAVE'>";
            echo "</center>";
            echo "</FORM>";
			
        }
        if(isset($_POST['updateSave'])){
            $date = new DateTime();
			$day = $date->format('l, F jS, Y');
			$utempIDNO=$_POST['uTXT13'];
            $utempUNAME=$_POST['uTXT23'];
            $utempUPASS=$_POST['uTXT33'];
            $utempULEVEL=$_POST['uTXT43'];
			$utempULEVEL2=$_POST['uTXT53'];
			$client=$customer;
			$utotal=$utempULEVEL*$utempULEVEL2;
            mysql_query("INSERT INTO `order` ( `client`, `order_id`, `orderitem_id`, `ordername`, `ordersize`, `orderprice`, `orderquantity`, `customer`, `total`, `day` )
			VALUES ('$client', null, $utempIDNO, '$utempUNAME', '$utempUPASS', '$utempULEVEL', '$utempULEVEL2', '$customer', '$utotal', '$day')")
            or die(mysql_error());
			
            
		
        }
     
        ?>
		
		
	 
		<br><br>
		
      
    
     
    </body>
    
</html>
