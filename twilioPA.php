<?php

	// Set names for departments
	$department1 = "Twilio";
	$department2 = "Haskell";
	$department3 = "Tetris";
	$department4 = "Real Nerds";

	// Set numbers for departments

	$user1No = 07956996347;
	$user1No = 07453276863;
	$user1No = 07757672217;
	$user1No = 07429059825;

	//Check whether users are free
	$user1available = FALSE;
	$user2available = TRUE;
	$user3available = TRUE;
	$user4available = FALSE;

	// Greet caller
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

// Ask which department the user is interested in

// Collect key input

// If department user is busy then:
// Tell caller that user is busy and to leave a message
// Collect message and convert into text
// Email this text to user with associated info

// Else redirect to users number

?>
<Response>
    <Say>Hello you've reached Team Nova.</Say>
    <Gather numDigits="1" action="handleKey.php" method="POST">
        <Say>To speak with the <?php echo $department1 ?> department, press 1.  
            Press 2 to speak witht the <?php echo $department2 ?> department.
            Press 3 to speak with the <?php echo $department3 ?> department.
            Press 4 to speak with the <?php echo $department4 ?> department.  
            Press any other key to start over.</Say>
    </Gather>
</Response>