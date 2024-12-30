<?php
    //1. Indexed Array (Numerical index) 
    $fruits = ["Apple", "Banana", "Orange", "Grapes", "Pinaple"];

    echo "Indexed array: <br>";
    for($i = 0; $i<=count($fruits); $i++) {
        echo "Fruit $i: ". $fruits[$i]. "<br>";
    }
    print("<br>");

    //using for each
    echo "Using for each loop <br>";
    foreach($fruits as $fruit) {
        echo "Fruit: ". $fruit. "<br>";
    }
    echo "<br>";

    //2. Associative array (Named indexed)
    $person = [
        "name"=> "John",
        "age" => 30,
        "city" => "Dhaka",
        "job" => "Software Engineer"
    ];

    echo "<br>";
    echo "<br> Associative Array:<br>";
    foreach($person as  $key => $value) {
        echo "$key: $value <br>";
    }
    echo "<br>";

    //Multidimensional array (Array of arrays)
    $employees = [
        ["name" => "AAA", "position" => "Manager", "salary" => 500000],
        ["name" => "BBB", "position" => "Developer", "salary" => 400000],
        ["name" => "CCC", "position" => "Designer", "salary" => 350000]
    ];

    echo "<br>";
    echo "Multidimensional array: <br>";
    foreach($employees as $employee) {
        echo "name: " . $employee["name"]. ", position: ". $employee["position"]. ", salary: ". $employee["salary"]. "<br>";
    }
    echo "<br>";

    //4. Looping through an array using  a while loop (Indexed array)
    echo "<br> Using while loop for indexed array<br>";
    $i = 0;
    while($i < count($fruits)) {
        echo "Fruits: ". $fruits[$i] . "<br>";
        $i++;
    }
    echo "<br>";

?>