<?php
include 'database_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email exists in the `users` table
    $stmt = $conn->prepare("SELECT password, is_verified FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($hashed_password, $is_verified);
    $stmt->fetch();

    if ($hashed_password && password_verify($password, $hashed_password)) {
        if ($is_verified) {
            echo "<script>alert('Login Successful')</script>";
            // Redirect to the dashboard or homepage
            header("Location: index.php");
            exit();
        } else {
            // User exists but not verified
            echo "<script>alert('Please verify your email before logging in.')</script>";
            header("Location: verify_form.php?email=" . urlencode($email));
            exit();
        }
    } else {
        // Invalid email or password
        echo "<script>alert('Invalid email or password.')</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!-- Login Form -->
<h2>Login</h2>
<form method="POST" action="">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>
