<?php
    class Person {
        public $name;
        public $age;

        //constructor
        function __construct($name, $age) {
            $this->name = $name;
            $this->age  = $age;
        }
        //destructor
        function __destruct() {
            echo "My name is {$this->name} and I am {$this->age} years old.";
        }
    }

    //object creation
    $student = new Person("Md Nissan Ali", 23);
?>