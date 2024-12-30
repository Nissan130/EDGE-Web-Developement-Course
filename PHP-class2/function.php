<?php


    //Generating primes
    //Function to check if a number is prime
    function isPrime($number) {
        if($number <= 1) {
            return false; // 0 and 1 are not prime numbers
        }

        for($i = 2; $i<=sqrt($number); $i++) {
            if($number%$i == 0){
                return false;
            }
        }
        return true;
    }

    // Function to generate prime numbers between 1 to 1000
    function generatePrimeNumbers($start, $end) {
        $primes = [];

        for($num = $start; $num <= $end; $num++){
            if(isPrime($num)) {
                $primes[] = $num; //add prime number to array
            }
        }
        return $primes;
    }

    //Generate and display prime numbes  between 1 to 1000
    $primeNumbers = generatePrimeNumbers(1,1000);
    echo "Prime numbers between 1 and 1000<br>";
    echo implode(", ",$primeNumbers). "<br>";

?>