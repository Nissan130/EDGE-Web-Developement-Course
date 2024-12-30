<?php
    $day = date("l"); //Get the current day of the week (e.g. "Monday");

    switch($day) {
        case "Monday":
            echo "Start of the work week! Lets make it productive";
            break;
        case "Tuesday":
            echo "It's Tuesday! Keep up the momentum.";
            break;
        case "Wednesday":
             echo "Midweek already! You are doing great ";
             break;
        case "Thursday":
             echo "Almost there! It's thursday";
             break;
        case "Friday":
             echo "Happy Friday! The weekend is near";
             break;
        case "Saturday":
             echo "It's the weekend! Time to relax and recharge.";
             break;
        case "Sunday":
             echo "Enjoy your Sunday! Get ready for week ahead.";
             break;
        default:
            echo "Invalid day: Something went wrong.";       
    }
    /*
        Common variations with date();
        Here are some  other useful format specifiers
        "D": Short day name (e.g., "Wed").
        "F": Full Month name (e.g., "November").
        "Y": Year in 4 digits (e.g., "2024").
        "m": Month as a number (e.g., "11").
        "d": Day of the month as a number (e.g., "27").
    */
?>