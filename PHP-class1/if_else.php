<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Calculator</title>
</head>

<body>
    <form action="if_else.php" method="post">

        <label for="marks">Enter your marks: </label><br>
        <input type="number" id="marks" name="marks" required>
        <button type="submit">Submit</button>

    </form>
</body>

</html>
<?php

    if($_SERVER["REQUEST_METHOD"] = "POST"){
        //Get the marks from the use input
        $marks = $_POST['marks'];

        //validate the input
        if(!is_numeric($marks) || $marks < 0 || $marks > 100) {
            echo "Please enter a valid mark between 0 and 100.";
        }
        else{
            //Apply if-else conditions to assign grades
            if($marks >=80){
                $grade = "A+";
            }
            elseif($marks >=70 and $marks <=79){
                    $grade = "A";                
            }
            elseif($marks >=60 and $marks <=69){
            $grade = "A-";
            }
            elseif($marks >=50 and $marks <=59){
                $grade = "B+";
                }
            elseif($marks >=40 and $marks <=49){
                    $grade = "B-";
                   }
           elseif($marks >=33 and $marks <=39){
                    $grade = "C";
                 }
                 else{
                    $grade = "F";
                 }

                 //output
                 echo "Your marks: $marks <br>";
                 echo "Your Grade: $grade";
        }
    }


?>