<?php
include 'auth.php';
include 'dbconnect.php';

// Fetch employee data
$query = "SELECT * FROM employees";
$stmt = $conn->prepare($query);
$stmt->execute();
$records = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        <h2>Employee Dashboard</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Generate table rows dynamically
                if (!empty($records)) {
                    foreach ($records as $record) {
                        echo "<tr>
                                <td>{$record['id']}</td>
                                <td>{$record['name']}</td>
                                <td>{$record['position']}</td>
                                <td>{$record['salary']}</td>
                                <td>{$record['status']}</td>
                                <td class='text-center'>
                                    <a href='UpdateEmployee.php?id={$record['id']}' class='btn btn-success'>Update</a>
                                    <a href='DeleteEmployee.php?id={$record['id']}' class='btn btn-danger'>Delete</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No employees found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>