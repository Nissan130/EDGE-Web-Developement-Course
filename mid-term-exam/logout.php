<?php
    session_start();
    session_unset();
    session_destroy();
    

    echo "<script>alert('Logout Successfull')</script>";
    echo "<script>window.open('dashboard.php','_self')</script>";

?>