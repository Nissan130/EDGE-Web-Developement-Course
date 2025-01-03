<?php
    include 'dbconnect.php';

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
        // $password = $_POST['password'];

        $query = "INSERT INTO admin_users(username,password) VALUES(:username,:password)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':password',$password);
        
        if( $stmt->execute()) {
            echo "<script>alert('Signup Successfull')</script>";
            echo "<script>window.open('login.php','_self')</script>";
        } else {
            echo "<script>alert('Signup failed. Try Again')</script>"; 
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                    <?php
                     session_start();
                       if(isset($_SESSION['username'])) {
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='logout.php'>Logout</a>
                    </li>";
                       } else {
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='login.php'>Login</a>
                    </li>";
                       }
                    ?>
                </ul>
            </div>
        </div>
</nav>
    <div class="container">
        <form action="" method="post">
            <h2 class="text-center mt-5">SignUp</h2>
            <div class="mb-3 mt-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
            </div>
            <div class="mb-3">
                <p>Already have an account? <a class="link-danger" href="login.php">Login</a></p>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>