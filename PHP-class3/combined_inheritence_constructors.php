<?php
    //define a class
    class City {
        //properties
        public $name;
        public $population;

        //constructor to initialize the properties
        public function __construct($name,$population){
            $this->name = $name;
            $this->population = $population;
        }

        public function displayDetails() {
            return "The city: " . $this->name . " has a total population ". $this->population;
        }
    }

    //define a derived class that inherits from the city
    class HistoricalCity extends City{
        //additional property for historical significance
        public $historicalImportance;
        public function __construct($name, $population, $historicalImportance) {
            parent::__construct($name, $population);
            $this->historicalImportancee = $historicalImportance;
        }

        public function displayFullDetails() {
            return $this->displayDetails() . " Historical Importance: ". $this->historicalImportance; 
        }

    }

    $rajshahi = new HistoricalCity("Rajshahi",100000, "known for its mangoes and historical significance");
    echo $rajshahi->displayFullDetails();




?>