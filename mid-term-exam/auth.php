<?php
session_start();
if (!isset($_SESSION['username'])) {
    // Display the Bootstrap alert
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
        <title>Redirecting...</title>
    </head>
    <body>
        <div class='container mt-5'>
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>Notice:</strong> Please login to access this page.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
        </div>
        <script>
            // Redirect to the login page after 3 seconds
            setTimeout(function() {
                window.location.href = 'login.php';
            }, 1000);
        </script>
    </body>
    </html>";
    exit;
}
?>
