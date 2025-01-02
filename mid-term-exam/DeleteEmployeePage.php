<?php
include 'auth.php';
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $query = "DELETE FROM employees WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    header("Location: dashboard.php");
    exit();
} 
?>

<!-- DeleteEmployee.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="Dashboard.php">Employee Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="Dashboard.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="AddEmployee.php">Add Employee</a></li>
                <li class="nav-item"><a class="nav-link" href="DeleteEmployeePage.php">Delete Employee</a></li>
                <?php
                if (isset($_SESSION['username'])) {
                    // echo "Session is set: " . $_SESSION['id']; 
                    echo "<li class='nav-item'><a class='nav-link' href='logout.php'>Logout</a></li>";
                } else {
                    // echo "Session is not set"; 
                    echo "<li class='nav-item'><a class='nav-link' href='login.php'>Login</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
    <div class="container mt-5">
        <h2>Delete Employee</h2>
        <form method="post">
            <label for="id">Employee ID:</label>
            <input type="text" class="form-control" name="id">
            <input class="btn btn-danger mt-3" type="submit" value="Delete Employee">
        </form>
    </div>
</body>
</html>