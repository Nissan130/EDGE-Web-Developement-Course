<?php
    include 'dbconnect.php';
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM employees WHERE id=:id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        $stmt->execute();
        $record = $stmt->fetch();
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // $id = $_POST['id'];
        $employeeName = $_POST['employeeName'];
        $employeePosition = $_POST['employeePosition'];
        $employeeSalary = $_POST['employeeSalary'];
        $employeeStatus = $_POST['employeeStatus'];

        $update_query = "UPDATE employees SET name=:name, position=:position, salary=:salary, status=:status  WHERE id=:id ";
        $stmt = $conn->prepare($update_query);

        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        $stmt->bindParam(':name',$employeeName);
        $stmt->bindParam(':position',$employeePosition);
        $stmt->bindParam(':salary',$employeeSalary);
        $stmt->bindParam(':status',$employeeStatus);
        
        

        if($stmt->execute()) {
            echo "<script>alert('Employee updated successfully')</script>";
            echo "<script>window.open('dashboard.php','_self')</script>";
            
        } else {
            echo "<script>alert('Something went wrong');</script>";
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
        <h2>Update Employee</h2>
        <form id="addEmployeeForm" method="post">
            <div class="mb-3">
                <label for="employeeName" class="form-label">Employee Name</label>
                <input type="text" class="form-control" id="employeeName" name="employeeName" placeholder="Enter employee name" value="<?php echo $record['name'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="employeePosition" class="form-label">Position</label>
                <input type="text" class="form-control" id="employeePosition" name="employeePosition" value="<?php echo $record['position'] ?>" placeholder="Enter position" required>
            </div>
            <div class="mb-3">
                <label for="employeeSalary" class="form-label">Salary</label>
                <input type="number" class="form-control" id="employeeSalary" name="employeeSalary" placeholder="Enter salary" value="<?php echo $record['salary'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="employeeStatus" class="form-label">Status</label>
                <select class="form-select" id="employeeStatus" name="employeeStatus">
                    <option value="<?php echo $record['status'] ?>"><?php echo $record['status'] ?></option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</body>
</html>