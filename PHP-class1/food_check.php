<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Check</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="food_check.php" method="post">
        <label for="food">Enter a food name for order: </label><br>
        <input type="string" id="food" name="food">
        <button type="submit">Submit</button>
    </form>
</body>
</html>


<?php

  if($_SERVER["REQUEST_METHOD"] = "POST"){
        $food = $_POST["food"];

        if(!is_string($food)){
            echo 'Please Enter a valid food name';
        } 
        else {
           
            if($food == "Burger"){
                $code  = 101;
            }
            elseif($food == "Sandwitch"){
                $code = 102;
            }
            elseif($food == "Pizza"){
                $code = 103;
            }
            elseif($food == "Biriyani"){
                $code = 104;
            }
            elseif($food == "Teheri"){
                $code = 105;
            }
            elseif($food == "Beef"){
                $code = 106;
            }
            elseif($food == "Mutton"){
                $code = 107;
            }
            else {
                $code = "Not Found";
            }
            echo "You have order $food <br>";
            echo "Code: $code";

            
        }

        
}

?>