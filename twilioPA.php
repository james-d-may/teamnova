<?php

    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

    // include 'variables.php';

    // Query database to get account info and top tier options
    $m = new MongoClient();
    $db = $m -> selectDB("manchester");

    

    $companyname = "e";

    // Company Email to send recording to
    $companyemail = "";

    // Set words for choices
    $choice1 = "punch a cat";
    $choice2 = "saw a banana";
    $choice3 = "e";
    $choice4 = "";
    $choice5 = "";
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