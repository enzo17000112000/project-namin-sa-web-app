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
        $result = mysql_query("SELECT * FROM `order` WHERE customer='$customer'") or die(mysql_error());
		$aaa=mysql_num_rows($result);
		?>
        <center><font face='Comic Sans Serif' color='white' size='30' padding='20 px'>
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
		<center>
      
       <form action="order.php" method="post">
            ORDER # :  <input type="text" name="txt19">
            <input type="submit" name='submit19' id='btn' value='REMOVE ORDER'>
		
        </form>
		
           </center>
<?php include('itemsdelete.php'); ?>
        
        <br><br><br>
			
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
		
		<p><span onclick="printPage('print.php');" style="cursor:pointer;text-decoration:underline;color:#0000ff;">PRINT RESERVATION!</span></p>
<script type="text/javascript">
function closePrint () {
  document.body.removeChild(this.__container__);
}

function setPrint () {
  this.contentWindow.__container__ = this;
  this.contentWindow.onbeforeunload = closePrint;
  this.contentWindow.onafterprint = closePrint;
  this.contentWindow.focus(); // Required for IE
  this.contentWindow.print();
}

function printPage (sURL) {
  var oHiddFrame = document.createElement("iframe");
  oHiddFrame.onload = setPrint;
  oHiddFrame.style.visibility = "hidden";
  oHiddFrame.style.position = "fixed";
  oHiddFrame.style.right = "0";
  oHiddFrame.style.bottom = "0";
  oHiddFrame.src = sURL;
  document.body.appendChild(oHiddFrame);
}
</script>
		



</center>
		

    </body>
    
</html>