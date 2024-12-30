<?php
    // class Fruit {
    //     public $name;
    //     public $color;

    //     // methods 
    //     function set_Name($name) {
    //        $this->name = $name;
    //     }
    //     function set_color($color) {
    //         $this->color =$color;
    //     }
    //     function get_Name() {
    //         return "Fruit name : ". $this->name;
    //     }
    //     function get_color() {
    //         return "Color is: " . $this->color;
    //     }
    // }

    // $fruit1 = new Fruit();
    // $fruit1->set_Name("Apple");
    // $fruit1->set_color("Red");
    // echo $fruit1->get_Name();
    // echo "<br>";
    // echo $fruit1->get_color();

    class Person {

        //properties
        public $name;
        public $age;

        //methods
        public function set_name($name) {
            $this->name = $name;
        }
        public function set_age($age) {
            $this->age = $age;
        }

        public function get_name() {
            return $this->name;
        }
        public function get_age() {
            return $this->age;
        }
    }

    $student = new Person();
    $student->set_name("Md Nissan Ali");
    echo $student->get_name();

?>