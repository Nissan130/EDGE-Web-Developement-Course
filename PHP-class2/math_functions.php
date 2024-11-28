<?php
    //1. Absolute value
    echo "abs():"."<br>";
    echo abs(-10)."<br>";
    echo abs(5.5)."<br><br>";
    print("<br>"); 

    //2.ceiling
    echo "2. ceil():"."<br>";
    echo ceil(4.3)."<br>";
    echo ceil(-4.3)."<br><br>";
    print("<br>"); 

    //3. floor
    echo "3. floor():"."<br>";
    echo floor(4.3)."<br>";
    echo floor(-4.3)."<br><br>";
    print("<br>"); 

    //3. floor
    echo "4. round():"."<br>";
    echo round(4.5)."<br>";
    echo round(4.4)."<br><br>";
    echo round(4.567, 2)."<br><br>";
    print("<br>"); 

    //5. power
    echo "5. pow():"."<br>";
    echo pow(2,3)."<br>";
    echo pow(5,2)."<br><br>";
    print("<br>"); 

    //6. square root
    echo "6. sqrt():"."<br>";
    echo sqrt(16)."<br>";
    echo sqrt(20)."<br><br>";
    print("<br>"); 

    //7. maximum value
    echo "7. max():"."<br>";
    echo max(1,3,7,2)."<br>";
    echo max([1,5,9])."<br><br>";
    print("<br>");

     //8. minimum value
     echo "7. min():"."<br>";
     echo min(1,3,7,2)."<br>";
     echo min([1,5,9])."<br><br>";
     print("<br>");

     //9. Random number
     echo "8. rand():"."<br>";
     echo rand()."<br>";
     echo rand(10,50)."<br><br>";
     print("<br>");

     //10. Better Random number
     echo "10. mt_rand():"."<br>";
     echo mt_rand()."<br>";
     echo mt_rand(100,200)."<br><br>";
     print("<br>");

      //11. value of pi
      echo "11. pi():"."<br>";
      echo pi()."<br>";
      echo pi()*pow(5,2)."<br><br>";
      print("<br>");

      //12. Degree of radians and vice versa
      echo "12. deg2rad and rad2deg:"."<br>";
      echo deg2rad(180)."<br>";
      echo rad2deg(pi())."<br><br>";
      print("<br>");

      //13. Trigonometric functions
      echo "13. Trigonometric functions:"."<br>";
      echo sin(deg2rad(30))."<br>";
      echo cos(deg2rad(60))."<br>";
      echo tan(deg2rad(45))."<br><br>";
      print("<br>");

      //14. Logarithomic functions
      echo "14. Log() and log10():"."<br>";
      echo log(2.7123)."<br>";
      echo log10(1000)."<br><br>";
      print("<br>");

      //15. Number formatting
      echo "15. number_format():"."<br>";
      echo number_format(1234567.8910,2)."<br>";
      print("<br>");

       //Example Appication: Area and circumference of a circle
        $radius = 7;
        $area = pi()*pow($radius,2);
        $circumference = 2 * pi()* $radius;

        print("<br>");
        echo "Example appication - Circle calculations: <br>";
        echo "Area: ". number_format($area,2)."<br>";
        echo "Circumference: ". number_format($circumference,2). "<br>";


?>