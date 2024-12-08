<?php
    //Examples of inheritance

    //Base class
    class Fruit {
        public $name;
        public $color;

        //methods
        public function __construct($name,$color) {
            $this->name = $name;
            $this->color = $color;
        }
        public function get_fruit() {
            echo "This is {$this->name} and color is {$this->color}";
        }
    }

    //child class
    class Mango extends Fruit {
        public function message() {
            echo "Am I Mango? ";
        }
    }

    $mango = new Mango("Mango","Green");
    echo $mango->message();
    echo $mango->get_fruit();
?>