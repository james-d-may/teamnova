<?php
    
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

    // include 'variables.php';


    $text = "hello, world";
    $number = "123";


    // // if the caller pressed anything but 1 send them back
    // if($_REQUEST['Digits'] != '1'and $_REQUEST['Digits'] != '2' and $_REQUEST['Digits'] != '3' and $_REQUEST['Digits'] != '4') {
    //     header("Location: twilioPA.php");
    //     die;
    // }
     
    // the user pressed a key, query for the type of action

    // Functions for different actions
    // Text Function
    function text($message) {
        echo '<Say>$message</Say>';
    }

    // Redirect Function
    function redirect($phonenumber) {
        echo '<Dial> $phonenumber </Dial>';
        echo '<Say> Sorry we failed to connect you. </Say>';
    }

    // Voicemail Function
    function voicemail() {
        echo '<Say>Please leave a 10 second message.</Say>';
        echo '<Record maxLength="5" action="mailto.php" />';
    }

    // If available or busy sub menu Function
    function ifaorb($available,$formatA,$formatB,$phonenumber,$message) {
        if ($available) {

  
                echo "Sorry to connect you.";

        } else {

                echo "Sorry we failed to connect you.";
        }

    }
    

?>

<p> <?php ifaorb(FALSE,"redirect","text",$number,$text) ?> </p>

