<?php
    include 'dbconnect.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $employeeName = $_POST['employeeName'];
        $employeePosition = $_POST['employeePosition'];
        $employeeSalary = $_POST['employeeSalary'];
        $employeeStatus = $_POST['employeeStatus'];

        $query = "INSERT INTO employees(name,position,salary,status)VALUES(:name,:position,:salary,:status)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':name',$employeeName);
        $stmt->bindParam(':position',$employeePosition);
        $stmt->bindParam(':salary',$employeeSalary);
        $stmt->bindParam(':status',$employeeStatus);
        
        if($stmt->execute()) {
            echo "<script>alert('Employee added successfully')</script>";
            echo "<script>window.open('Dashboard.php','_self')</script>";
        }
        else {
            echo "<script>alert('Something went wrong')</script>";
        }
        
    }
?>

<!-- AddEmployee.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="Dashboard.php">Employee Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="Dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="AddEmployee.php">Add Employee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="DeleteEmployeePage.php">Delete Employee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>

    <div class="container mt-5">
        <h2>Add Employee</h2>
        <form id="addEmployeeForm" method="post">
            <div class="mb-3">
                <label for="employeeName" class="form-label">Employee Name</label>
                <input type="text" class="form-control" id="employeeName" name="employeeName" placeholder="Enter employee name" required>
            </div>
            <div class="mb-3">
                <label for="employeePosition" class="form-label">Position</label>
                <input type="text" class="form-control" id="employeePosition" name="employeePosition" placeholder="Enter position" required>
            </div>
            <div class="mb-3">
                <label for="employeeSalary" class="form-label">Salary</label>
                <input type="number" class="form-control" id="employeeSalary" name="employeeSalary" placeholder="Enter salary" required>
            </div>
            <div class="mb-3">
                <label for="employeeStatus" class="form-label">Status</label>
                <select class="form-select" id="employeeStatus" name="employeeStatus">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Add Employee</button>
        </form>
    </div>
</body>
</html>