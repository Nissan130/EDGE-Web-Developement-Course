<?php
if (isset($_GET['email'])) {
    $email = $_GET['email'];
} else {
    die("No email provided.");
}
?>
<h4>A verification code is sent at <?php echo $email; ?> </h4>
<form method="POST" action="verify_code.php">
    <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
    <input type="text" name="verification_code" placeholder="Enter 6-digit code" required><br><br>
    <button type="submit">Verify</button>
</form>
