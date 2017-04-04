<!DOCTYPE html>
<html>
<head>
        
    <title>enzo sample login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="main" style="padding:100px;">
    <div id="login">
    <h1>LOGIN</h1>

        <form  method="POST">
            <p>
                <label>Username:</label>
                <input type="text" id="user" placeholder= " username" name="user"   />
            </p>
            <p>
                <label>Password:</label>
                <input type="password" id="pass" placeholder= " password" name="pass"    />
            </p>
                <input type="submit" name="submit" id="btn" value="Login" style="height: 25px; width: 100px"  >
              
                <input type="submit" name="register" id="btn" value="Register" style="height: 25px; width: 100px">
               

        </form>
        <?php include('dbcon.php'); ?>
        <?php include('login.php'); ?>

    </div>

</body>
</html>
