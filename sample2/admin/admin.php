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
        
        
        <div id="login">
        <font face="Comic Sans Serif" size="100" color="white">
         WELCOME <?php echo $customer ?>
        </font>
        </div>
    </center>
        <?php
        // put your code here
        
        ?>
    </body>
</html>