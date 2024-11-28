<?php
    $Address = "RUET, Rajshahi-6204";
    echo "The address is: ".$Address;
    echo "<br>";

    $len = strlen($Address);
    echo "Length of string: ".$len;
    echo "<br>";

    //word count
    echo "Total words: ".str_word_count($Address)."<br>";
    echo "Reverse of Address: ".strrev($Address)."<br>";

    echo "Position of Rajshahi: ".strpos($Address, "Bangla");

    echo "<br>";
    $new_address = str_replace("RUET","CSE",$Address);
    echo "New Address: ".$new_address;

    echo str_repeat($Address,5)."<br>";

?>