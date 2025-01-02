<?php

include 'dbconnect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM employees WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    // Redirect after deletion
    header("Location: dashboard.php");
    exit();
} else {
    echo "ID not specified!";
}
?>