<?php
    //define a class
    class District {
        //private property (can not access directly outside the class)
        private $name;

        //public method to set the value of the private property
        public function setName($districtName) {
            $this->name = $districtName;
        }

        // public function to get the value of the private property 
        public function getName() {
            return $this->name;
        }
    }

    //create an object from the class
    $District1 = new District();

    //set the private property value using the setter method
    $District1->setName("Dhaka");

    //get the private property value using the getter the method
    echo "The district is: ". $District1->getName();


?>
