<?php
    //define a class
    class Car {
        //class attributes
        public $brand;
        public $color;

        //method to set car properties
        public function setDetails($brand, $color) {
            $this ->brand = $brand ;
            $this->color = $color;
        }

        //method to get car details
        public function display() {
            return "This car is a ". $this->color. "". $this->brand.".";
        }
    }

    //create an object from the class
    $Car1 = new Car();
    
    //set the object properties using the method
    $Car1->setDetails("Toyota", "blue");

    //access the object method
    echo $Car1 ->display();
    echo "<br>".$Car1->brand; //Can access the number attribute(public)

?>