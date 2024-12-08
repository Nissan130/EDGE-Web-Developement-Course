<?php
    class GoodBye {
        const LAST_MESSAGE = "Goodbye! See you again.";
        // echo GoodBye::LAST_MESSAGE;
    public function byebye() {
        echo self::LAST_MESSAGE;
    }
    }
    
    $goodbye = new GoodBye();
    $goodbye->byebye();
?>