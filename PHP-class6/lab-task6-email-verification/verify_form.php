<?php
include 'database_config.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];
} else {
    die("No email provided.");
}

// Delete expired data if the verification time has passed
$expiry_time = 30; // Time in seconds
$current_time = time();

// Query to check if the email exists and has exceeded the expiry time
$stmt = $conn->prepare("SELECT created_at FROM temporary_users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($created_at);
if ($stmt->fetch()) {
    $creation_time = strtotime($created_at);
    if (($current_time - $creation_time) > $expiry_time) {
        // Delete the record
        $delete_stmt = $conn->prepare("DELETE FROM temporary_users WHERE email = ?");
        $delete_stmt->bind_param("s", $email);
        $delete_stmt->execute();

        // Redirect to signup page
        header("Location: signup.php?error=timeout");
        exit();
    }
}
$stmt->close();
?>

<h4>A verification code is sent to <?php echo htmlspecialchars($email); ?></h4>
<form method="POST" action="verify_code.php" id="verificationForm">
    <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
    <input type="text" name="verification_code" placeholder="Enter 6-digit code" required><br><br>
    <button type="submit" id="verifyButton">Verify</button>
</form>
<p id="timer" style="color: red; font-weight: bold;"></p>

<script>
// Timer settings 
let countdown = 120;

// Display the timer
function updateTimer() {
    const timerElement = document.getElementById('timer');
    const minutes = Math.floor(countdown / 60);
    const seconds = countdown % 60;

    timerElement.textContent = `Time remaining: ${minutes}:${seconds.toString().padStart(2, '0')}`;

    if (countdown > 0) {
        countdown--;
    } else {
        // Disable the form and show timeout message
        document.getElementById('verificationForm').style.pointerEvents = "none";
        document.getElementById('verifyButton').disabled = true;
        timerElement.textContent = "Time is up! Please request a new code.";

        // Redirect to signup page after timeout
        setTimeout(() => {
            window.location.href = 'signup.php?error=timeout';
        }, 3000); // Redirect after 3 seconds
    }
}

// Update the timer every second
setInterval(updateTimer, 1000);

// Initialize the timer display
updateTimer();
</script>
