<?php
    session_start();
     include 'dbconnect.php';
    

     if($_SERVER['REQUEST_METHOD'] == "POST") {
         $username = $_POST['username'];
         $user_password = $_POST['password'];
 
         $query = "SELECT * FROM admin_users WHERE username=:username";
         $stmt = $conn->prepare($query);
         $stmt->bindParam(':username',$username);
         $stmt->execute();
         $user = $stmt->fetch();

         $hashed_password = $user['password'];
         
         if(password_verify($user_password,$hashed_password)) {
             echo "<script>alert('Login Successfull')</script>";
             echo "<script>window.open('dashboard.php','_self')</script>";
         } else {
             echo "<script>alert('Login failed. Try Again')</script>"; 
             echo "<script>window.open('login.php','_self')</script>";
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
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>
    <div class="container">
        <form action="" method="post">
            <h2 class="text-center mt-5">Login</h2>
            <div class="mb-3 mt-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
            <div class="mb-3">
                <p>Don't have an account? <a class="link-danger" href="signup.php">Signup</a></p>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

</body>

</html>