<?php
    /*Operators in PHP
    */
    //Arithmatic
    $var1 = 5;
    $var2 = 14;

    echo $var1 + $var2;
    echo "Var1 + Var2: ".($var1+$var2)."<br>";
    echo "Var1 - Var2: ".($var1-$var2)."<br>";
    echo "Var1 * Var2: ".($var1*$var2)."<br>";
    echo "Var2 / Var1: ".($var2/$var1)."<br>";
    echo "Var2 % Var1: ".($var2%$var1)."<br>";
    echo "Var1 ** Var2: ".($var1**$var2)."<br>";


    //assignment operator
    $salary = 65000.0;
    $salary +=5000;

    echo "New Salary: ".$salary."<br>";

    //post increment
    $i=5;
    echo $i++."<br>";
    echo $i."<br>";

    //pre-increment
    $j=5;
    echo ++$j."<br>";
    echo $j;

    //Task: -=, *=, /=, %=.

    $var1+=5;
    echo "<br>";
    echo " Var1 after +5: ".$var1."<br>";
    $var1-=5;
    echo " Var1 after -5: ".$var1."<br>";
    $var1*=5;
    echo " Var1 after *5: ".$var1."<br>";
    $var1/=5;
    echo " Var1 after /5: ".$var1."<br>";
    $var1 %=5;
    echo " Var1 after %5: ".$var1."<br>";

    //comparative....
    $a = 10;
    $b = 11;

    echo "<br>";

    //Logical operator
    $A = true;
    $B = false;

    echo "<br>A and B: " . ($A and $B);
    echo "<br>A or B: " . ($A or $B);
    echo "<br>A xor B: " . ($A xor $B);
    echo "<br>A and B: " . ($A && $B);
    echo "<br>A or B: " . ($A || $B);
    echo "<br>A xor B: " . ($A ^ $B);



?>