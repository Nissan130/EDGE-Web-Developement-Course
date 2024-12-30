<?php
    //define a class
    class City {
        //properties
        public $name;
        public $population;

        //constructor to initialize properties
        public function __construct($name, $population) {
            $this->name = $name;
            $this->population=$population;
        }

        //method to display city details
        public function displayDetails() {
            return "The city of " . $this->name. " has a population of " . $this->population . " people.";
        }
    }

    //create an object and pass values to the constructor
    $city1 = new City("Rajshahi",1000000);

    //Access the object's method
    echo $city1->displayDetails();

?>