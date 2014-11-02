<?php

    // Functions for different actions
    // Text Function
    function text($message) {
        echo "<Say>$message</Say>";
    }

    // Redirect Function
    function redirect($phonenumber) {
        echo "<Dial> $phonenumber </Dial>";
        echo '<Say> Sorry we failed to connect you. </Say>';
    }

    // Voicemail Function
    function voicemail() {
        echo '<Say>Please leave a 10 second message.</Say>';
        echo '<Record maxLength="10" action="mailto.php" />';
    }

    // If available or busy sub menu Function
    function ifaorb($available,$formatA,$formatB,$pnumber,$message) {
        if ($available) {

            switch ($formatA) {
            case "redirect":
            redirect($pnumber);
            break;
            case "voicemail":
            echo '<Say> Sorry they cant take your call at present. Alternatively.</Say>';
            voicemail();
            break;
            case "text":
            text($message);
            break;
            default:
            echo "Sorry we failed to connect you.";
            }

        } else {

            switch ($formatB) {
            case "redirect":
            redirect($pnumber);
            break;
            case "voicemail":
            echo '<Say> Sorry they cant take your call at present. Alternatively.</Say>';
            voicemail();
            break;
            case "text":
            text($message);
            break;
            default:
            echo "Sorry we failed to connect you.";
            }
        }

    }

    function subMenu($choiceA,$choiceB,$choiceC,$choiceD) {

        // Create subchoice array
        $subchoices = array($choiceA, $choiceB, $choiceC, $choiceD);

        echo '<Gather numDigits="1" action="handleSubKey.php" method="POST">';

        $j = 0;

        while ($subchoices[$j] != NULL) {

            $k = $j+1;
            echo "<Say>Press $k to $subchoices[$j].</Say>";
        $j++;}

        echo '</Gather>';

    }

?>