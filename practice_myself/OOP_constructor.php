<?php
    class Person {
        public $name;
        
        //constructor
        function __construct($name) {
            $this->name = $name;
        }
        function get_name() {
            return $this->name;
        }
    }

    $student = new Person("Md Nissan Ali");
    echo "My name is " . $student->get_name();

?>