<?php
// Start the session
session_start();
$customer=$_SESSION['studentNumber'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body id="int">
   
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
        $result = mysql_query("SELECT * FROM `order` WHERE customer='$customer'") or die(mysql_error());
		$aaa=mysql_num_rows($result);
		?>
        <center><font face='Comic Sans Serif' color='white' size='30' padding='20 px'>MY ORDER
            <table border='10'>
        <tr>
        <th><font face='Comic Sans Serif' color='white'>ORDER #:</th>
        <th><font face='Comic Sans Serif' color='white'>ITEM #:</th>
        <th><font face='Comic Sans Serif' color='white'>ITEM NAME</th>
		<th><font face='Comic Sans Serif' color='white'>ITEM SIZE</th>
        <th><font face='Comic Sans Serif' color='white'>ITEM PRICE</th>
        <th><font face='Comic Sans Serif' color='white'>QUANTITY</th>
		<th><font face='Comic Sans Serif' color='white'>TOTAL</th>
	
        </tr>

        <?php while($row = mysql_fetch_array($result)) {
			
		?>
		
         <tr>
       
		<td><font face='Comic Sans Serif' color='white'><center><?php echo $row['order_id'];?></td>
        <td><font face='Comic Sans Serif' color='white'><center><?php echo $row['orderitem_id'];?></td>
		<td><font face='Comic Sans Serif' color='white'><center><?php echo $row['ordername'];?> </td>
		<td><font face='Comic Sans Serif' color='white'><center><?php echo $row['ordersize'];?></td>
		<td><font face='Comic Sans Serif' color='white'><center><?php echo $row['orderprice'];?> </td>
		<td><font face='Comic Sans Serif' color='white'><center><?php echo $row['orderquantity'];?> </td>
		<td><font face='Comic Sans Serif' color='white'><center><?php echo $row['total'];?> </td>
		
        </tr>
      
        <?php } ?>

        </table>
        </center>
        
        <br>
			
		<center>
		<?php
                $client=$customer;
				$sumexpenses = mysql_query("SELECT SUM(total) as total FROM `order` where client='$client'");
                $total = mysql_fetch_array($sumexpenses);
				echo "TOTAL OF " .$total['total']. "  PESOS";
				echo "<br><br><br><br>";
				echo "NAME OF CLIENT  :  " . $customer;
				echo "<br>";
				$date = new DateTime();
				echo "DATE OF RESERVATION  :  " . $date->format('l, F jS, Y');
				

		?>	
		<br><br>
		



</center>
		

    </body>
    
</html>