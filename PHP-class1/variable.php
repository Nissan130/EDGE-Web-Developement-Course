<?php
    /* PHP data types
    1. String
    2. Number
    3. Boolear
    4. Array
    5. Object
    6. NULL
    */

    //string
    $Name = 'Khan';
    $Address = 'Rajshahi, 6504, Bangladesh';
    echo "His name is $Name"." "."and his address is $Address";
    //Integer
    $Age = 45;
    echo "<br>He is now early $Age";

    //Float: Fractional
    $Salary = 46532.23;
    $reduction = 0.01;
     echo "<br> His gross salary is: ".($Salary-$Salary*$reduction)."<br>";

     //Boolean
     $var1= true;
     $var2 = false;
     $is_ok = false;
     echo "<br>".var_dump($is_ok);

     //Array 
     $Country_list = array("USA","UK", "Germany","France","Italy");
     echo "$Country_list[0], $Country_list[2]";
     echo "<br>";
     print_r($Country_list);
     echo "<br>";
     echo implode(", ",$Country_list);
     echo "<br>";
     echo var_dump($Salary, $Age);


?>