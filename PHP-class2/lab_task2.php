<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci Number</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="lab_task2.php" method="post" class="form">
        <h1>Find a Specific Fibonacci Number</h1>
        <label for="fibonacci_number">Enter a number:</label><br>
        <input type="number" id="fibonacci_number" name="fibonacci_number" required>
        <button type="submit">Submit</button>

        <!-- PHP Output Section -->
        <div class="output">
            <?php
            function fibonacci($num, $num1, $num2) {
                echo $num1 . " ";
                if ($num == 1) {
                    return $num1;
                }
                $temp = $num2;
                $num2 = $num1 + $num2;
                $num1 = $temp;
                $num--;
                return fibonacci($num, $num1, $num2);
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $num = intval($_POST['fibonacci_number']);
                if ($num <= 0) {
                    echo '<div>Invalid input! Please enter a positive number.</div>';
                } else {
                    echo '<div>Fibonacci series: ';
                    $result = fibonacci($num, 1, 1);
                    echo '</div>';
                    echo "<div>The $num-th Fibonacci number is: $result</div>";
                }
            }
            ?>
        </div>
    </form>
</body>
</html>
