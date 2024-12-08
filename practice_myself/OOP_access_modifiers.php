<?php
    class Fruits {
        //access modifiers
        public $name;
        protected $color;
        private $weight;
    }

    $mango = new Fruits();
    $mango->name = "Mango";
    $mango->color = "Green";
    $mango->weight = 300;

?>