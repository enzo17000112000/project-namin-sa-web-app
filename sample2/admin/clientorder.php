<?php
// Start the session
session_start();
$customer=$_SESSION['studentNumber'];
?>
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
        $result = mysql_query("SELECT * FROM `order` ORDER BY day") or die(mysql_error());
		$aaa=mysql_num_rows($result);
		?>
        <center>
        
        <table border='10'>

        <tr>
        <th><font color='yellow'>ORDER #:</th>
        <th><font color='yellow'>ITEM #:</th>
        <th><font color='yellow'>ITEM NAME</th>
		<th><font color='yellow'>ITEM SIZE</th>
        <th><font color='yellow'>ITEM PRICE</th>
        <th><font color='yellow'>QUANTITY</th>
		<th><font color='yellow'>TOTAL</th>
		<th><font color='yellow'>DATE OF RESERVATION</th>
        <th><font color='yellow'>CLIENT NAME</th>
	
        </tr>

        <?php while($row = mysql_fetch_array($result)) {
			
		?>
		
         <tr>
		<td><center><font size="5"><?php echo $row['order_id'];?></td>
        <td><center><font size="5"><?php echo $row['orderitem_id'];?></td>
		<td><center><font size="5"><?php echo $row['ordername'];?> </td>
		<td><center><font size="5"><?php echo $row['ordersize'];?></td>
		<td><center><font size="5"><?php echo $row['orderprice'];?> </td>
		<td><center><font size="5"><?php echo $row['orderquantity'];?> </td>
		<td><center><font size="5"><?php echo $row['total'];?> </td>
		<td><center><font size="5"><?php echo $row['day'];?> </td>
        <td><center><font size="5"><?php echo $row['client'];?> </td>
		
        </tr>
      
        <?php } ?>
    </body>
</html>