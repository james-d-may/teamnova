<?php
    
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

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

<Response>
    <?php if ($_REQUEST['Digits'] == '1') { ?>

        <!-- Query to see what form choice 1 is and collect associated varibales --> 

        <?php redirect("07757672217") ?>

    <?php } elseif ($_REQUEST['Digits'] == '2') { ?>

        <!-- Query to see what form choice 2 is and collect associated varibales -->

        <?php voicemail() ?>

    <?php } elseif ($_REQUEST['Digits'] == '3') {?>

        <!-- Query to see what form choice 3 is and collect associated varibales -->

        <?php text("We're creating an advanced voicemail which you can customise, through a simple web interface. It's going to be awesome so keep an eye out for it.") ?>

    <?php } elseif ($_REQUEST['Digits'] == '4') { ?>

        <!-- Query to see what form choice 4 is and collect associated varibales -->

        <?php ifaorb(FALSE,"redirect","voicemail","07757672217",NULL) ?>

    <?php } elseif ($_REQUEST['Digits'] == '5') { ?>

        <!-- Query to see what form choice 4 is and collect associated varibales -->

        <?php subMenu("Speak, with Josh.","Speak, to Lukas",NULL,NULL) ?>

    <?php } ?>
</Response>

