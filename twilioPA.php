<?php

    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

    // Query database to get account info and top tier options
    // $m = new MongoClient();
    // $db = $m -> selectDB("manchester");

    // Store callers number
    $callersnumber = $_REQUEST['From'];

    $companyname = "team nova";

    // Company Email to send recording to
    $companyemail = "may.d.james@gmail.com";

    // Set words for choices
    $choice1 = "Speak direct to Taimur.";
    $choice2 = "Just leave a message.";
    $choice3 = "Hear more about who we are";
    $choice4 = "Speak to Taimur";
    $choice5 = "Speak to our backend department";
    $choice6 = "";
    $choice7 = "";
    $choice8 = "";
    $choice9 = "";

    // Create choice array
    $choices = array($choice1, $choice2, $choice3, $choice4, $choice5, $choice6, $choice7, $choice8, $choice9);

    // Collect key input
    // Loop through choices to create menu

?>
<Response>
    <Say>Hello you've reached <?php echo $companyname ?>.</Say>
    <Gather numDigits="1" action="handleKey.php" method="POST">
        <?php $i = 0; ?>

        <?php while ($choices[$i] != NULL) { ?>
            <Say>Press <?php echo ($i+1) ?> to <?php echo $choices[$i] ?>.</Say>
        <?php $i++;} ?> 
    </Gather>
</Response>