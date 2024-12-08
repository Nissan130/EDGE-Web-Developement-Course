<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP based problem</title>
</head>
<body>
    <form action="lab_task3.php" method="post">
        <label for="city_name">Enter</label>
        <input type="string" id="city_name" name="city_name">
        <button type="submit">Submit</button>
    </form>
</body>
</html>

<?php
     //define a class
     class District {
        //private property (can not access directly outside the class)
        private $cityName;

        //public method to set the value of the private property
        public function setName($cityName) {
            $this->cityName = $cityName;
        }

        // public function to get the value of the private property 
        public function getName() {
            return $this->cityName;
        }
    }

    $District1 = new District();
    $count = 5;
    while($count--) {
        
    if($_SERVER["REQUEST_METHOD"] = "POST"){
        //Get the marks from the use input
        $cityName = $_POST['city_name'];

        //validate the input
        if(!is_string($cityName)) {
            echo "Please enter a valid city name.";
        } else {
             //create an object from the class
              $District1->setName($cityName);
             echo "The district is: ". $District1->getName();
        }
       
    }
    }




?>