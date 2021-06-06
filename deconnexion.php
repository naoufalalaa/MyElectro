<?php
session_start();
if(isset($_SESSION['id'])){
    $_SESSION = array();
    session_destroy();
    header("Location: connect.php");
}
else{
    header('location: connect.php');
}
?>