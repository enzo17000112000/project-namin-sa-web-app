 <?php
			ob_start();
            if(isset($_POST['submit19'])){
            // GET THE SEARCH CRITERIA FROM THE FORM
            $searchCriteria=$_POST['txt19'];
            // CONNECT TO DATABASE
            dbConnect();
            mysql_query("DELETE FROM `order` WHERE order_id='$searchCriteria'")
            or die(mysql_error());
           // printf("DATA DELETED!!!");
           // mysql_close($db);
            // LOAD ANOTHER PAGE
            //location.replace()
            header('Location:order.php');
            }
       ?> 