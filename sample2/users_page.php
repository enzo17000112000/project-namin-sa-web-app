<?php
session_start(); 
if(!$_SESSION['logged']){ 
    header("Location: index.php"); 
    exit; 
} 
echo 'Welcome, '.$_SESSION['studentName'];


?>