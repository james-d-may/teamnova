<?php
    
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

    // include 'variables.php';

    // // if the caller pressed anything but 1 send them back
    // if($_REQUEST['Digits'] != '1'and $_REQUEST['Digits'] != '2' and $_REQUEST['Digits'] != '3' and $_REQUEST['Digits'] != '4') {
    //     header("Location: twilioPA.php");
    //     die;
    // }
     
    // the user pressed a key, query for the type of action

    // Functions for different actions
    // Text Function
    function text($message) {
        echo "<Say>$message</Say>";
    }

    // Redirect Function
    function redirect($phonenumber) {
        echo "<Dial>$phonenumber</Dial>";
        echo "<Say> Sorry we failed to connect you. </Say>";
    }

    // Voicemail Function
    function voicemail() {
        echo "<Say>Please leave a 10 second message.</Say>";
        echo "<Record maxLength="5" action="mailto.php" />";
    }


    function ifaorb($available,$formatA,$formatB,$phonenumber,$message) {
        if ($available) {

            switch ($formatA) {
                case "redirect":
                redirect($phonenumber);
                break;
                case "voicemail":
                echo "<Say> Sorry they can't take your call at present. Alternatively.</Say>"
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
                redirect($phonenumber);
                break;
                case "voicemail":
                echo "<Say> Sorry they can't take your call at present. Alternatively.</Say>"
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

        echo "<Gather numDigits="1" action="handleSubKey.php" method="POST">"
        
        $j = 0;

        while ($subchoices[$j] != NULL) {
            echo "<Say>Press ($j+1) to $subchoices[$j] ?>.</Say>"
        $j++;}

        echo "</Gather>"

    }

?>
<Response>
    <?php if ($_REQUEST['Digits'] == '1') { ?>

        <!-- Query to see what form choice 1 is and collect associated varibales --> 

    <?php } elseif ($_REQUEST['Digits'] == '2') { ?>

        <!-- Query to see what form choice 2 is and collect associated varibales -->

    <?php } elseif ($_REQUEST['Digits'] == '3') {?>

        <!-- Query to see what form choice 3 is and collect associated varibales -->

    <?php } elseif ($_REQUEST['Digits'] == '4') { ?>

        <!-- Query to see what form choice 4 is and collect associated varibales -->

    <?php } ?>
</Response>