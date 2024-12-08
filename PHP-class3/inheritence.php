<?php
    //define a base class
    class River {
        //properties
        public $name;

        //method to see the river's name
        public function setName($riverName) {
            $this->name =$riverName;
        }

        //method to get the river name
        public function getName() {
            return "The river's name is: ". $this->name . ".";
        }
 }
        //define a derived class that inherits from the river
        class FamousRiver extends River {
            //method specific to FamousRiver
            public function describe() {
                return $this->name . "is one of the most important rivers in Bangladesh";
            }
        }

    //Create an object of the derived class
    $River1 = new FamousRiver();

    //set the river name using the method from the base class
    $River1->setName("Padma");

    //Access methods from both base and derived classes

    echo $River1 ->getName() . "<br>";
    echo $River1 ->describe();

?>