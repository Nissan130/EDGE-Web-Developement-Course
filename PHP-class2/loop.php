<?php
    //Using for loop
    echo "Using for loop: <br>";
    for($i=1; $i<=10; $i++) {
        echo "The square of $i is : ". ($i*$i). '<br>';
        echo("<br>");
    }

    echo('<br>');

    //Using WHILE loop
    echo "<br>Using WHILE loop: <br>";
    $i= 1;
    while($i<=10){
        echo "The square of $i is : ". ($i*$i) . "<br>";
        $i++;
        echo ("<br>");
    }
    echo("<br>");

    //Using DO-WHILE loop
    echo "<br>Using DO-WHILE loop: <br>";
    $i= 1;
    do {
        echo "The square of $i is : ". ($i*$i) . "<br>";
        $i++;
        echo ("<br>");
    } while($i<=10);
    echo("<br>");

    //Using FOREACH loop
    echo "<br> using FOREACH loop: <br>";
    $numbers = array(1,3,5,7,9,11);
    foreach($numbers as $num) {
        echo "The square of $num is : ". ($num*$num) . "<br>";
        echo "<br>";
    }

    //break statement
    echo "Break statement <br>"
    for($i = 1; $i<=10; $i++) {
        if($i == 6) {
            echo "Breaking the loop at $i. <br>";
            break;
        }
        echo "Number: $i <br>";
    }

    print("<br>")

?>