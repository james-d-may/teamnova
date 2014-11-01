<?php

	// Greet caller
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

    include 'variables.php';

// Ask which department the user is interested in

// Collect key input

// If department user is busy then:
// Tell caller that user is busy and to leave a message
// Collect message and convert into text
// Email this text to user with associated info

// Else redirect to users number

?>
<Response>
    <Say>Hello you've reached <?php echo $companyname ?>.</Say>
    <Gather numDigits="1" action="handleKey.php" method="POST">
        <Say>To speak with the <?php echo $department1 ?> department, press 1.  
            Press 2 to speak witht the <?php echo $department2 ?> department.
            Press 3 to speak with the <?php echo $department3 ?> department.
            Press 4 to speak with the <?php echo $department4 ?> department.  
            Press any other key to start over.</Say>
    </Gather>
</Response>