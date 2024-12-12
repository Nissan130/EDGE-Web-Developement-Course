<?php
    $host = "localhost";
    $dbname = "database_management_sysytem";
    $username = "root";
    $password = "";

    try {
        // echo "Database Connected Succcessfully";
        $conn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
        $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Database Connected Succefully";
    } catch (PDOException $e) {
        echo "Connection Failed: ". $e->getMessage();
    }

?>