<?php
    $host = "localhost";
    $dbName = "practice_mydb";
    $username = "root";
    $password = "";

   try {
        $conn = new PDO("mysql:host=$host; dbname=$dbName", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Database Connected Successfully";

        // //sql query for create a table 
        // $sql_table_create = "CREATE TABLE my_guests (
        //     id INT AUTO_INCREMENT PRIMARY KEY ,
        //     firstname VARCHAR(50) NOT NULL,
        //     lastname VARCHAR(50) NOT NULL,
        //     email VARCHAR(100),
        //     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP )";
        // $conn->exec($sql_table_create);
        // echo "Table is created successfully";    

   } catch (PDOException $e) {
        echo "Connection Failed. ". $e->getMessage();
   }

?>