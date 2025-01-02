<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
    
    

    echo "<script>alert('Logout Successfull')</script>";
    echo "<script>window.open('dashboard.php','_self')</script>";

?>