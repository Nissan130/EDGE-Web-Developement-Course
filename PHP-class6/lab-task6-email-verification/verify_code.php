<?php
include 'database_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $verification_code = $_POST['verification_code'];

    // Check if the email and verification code match an unverified user
    $stmt = $conn->prepare("SELECT id, name, email, password FROM temporary_users WHERE email = ? AND verification_code = ? AND is_verified = 0");
    $stmt->bind_param("ss", $email, $verification_code);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        // Bind result variables
        $stmt->bind_result($id, $name, $email, $password);
        $stmt->fetch();

        // Update the `is_verified` status
        $update_stmt = $conn->prepare("UPDATE temporary_users SET is_verified = 1 WHERE email = ?");
        $update_stmt->bind_param("s", $email);

        if ($update_stmt->execute()) {
            // Insert verified user into the `users` table
            $insert_stmt = $conn->prepare("INSERT INTO users (name, email, password, created_at) VALUES (?, ?, ?, NOW())");
            $insert_stmt->bind_param("sss", $name, $email, $password);

            if ($insert_stmt->execute()) {
                // Delete the record from `temporary_users`
                $delete_stmt = $conn->prepare("DELETE FROM temporary_users WHERE email = ?");
                $delete_stmt->bind_param("s", $email);
                $delete_stmt->execute();

                echo "<script>alert('Your email has been verified! You can now log in.')</script>";
                // Redirect to login page
                header("Location: login.php");
                exit();
            } else {
                echo "Error inserting into users table: " . $insert_stmt->error;
            }

            $insert_stmt->close();
        } else {
            echo "Error updating verification status: " . $update_stmt->error;
        }

        $update_stmt->close();
    } else {
        echo "Invalid verification code.";
    }

    $stmt->close();
    $conn->close();
}
?>
