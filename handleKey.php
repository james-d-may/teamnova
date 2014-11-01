<?php
    
    include 'twilioPA';

    // if the caller pressed anything but 1 send them back
    if($_REQUEST['Digits'] != '1'and $_REQUEST['Digits'] != '2' and $_REQUEST['Digits'] != '3' and $_REQUEST['Digits'] != '4') {
        header("Location: twilioPA.php");
        die;
    }
     
    // the user pressed 1, connect the call to Twilio department
    // the user pressed 2, connect the call to Haskell department
    // the user pressed 3, connect the call to Tetris department
    // the user pressed 4, connect the call to Boffins department
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <?php if ($_REQUEST['Digits'] == '1') { 

        if ($user1available) { ?>
            <Dial><?php echo $user1No ?></Dial>
            <Say>The call failed or the remote party hung up.  Goodbye.</Say>
        <?php } else { ?>
            <Say>Sorry the <?php echo $department1 ?> department is busy right now. Please call back later.</Say>
        <?php } ?>

    <?php } elseif ($_REQUEST['Digits'] == '2') {

        if ($user2available) { ?>
            <Dial><?php echo $user2No ?></Dial>
            <Say>The call failed or the remote party hung up.  Goodbye.</Say>
        <?php } else { ?>
            <Say>Sorry the <?php echo $department2 ?> department is busy right now. Please call back later.</Say>
        <?php } ?>

    <?php } elseif ($_REQUEST['Digits'] == '3') {

        if ($user3available) { ?>
            <Dial><?php echo $user3No ?></Dial>
            <Say>The call failed or the remote party hung up.  Goodbye.</Say>
        <?php } else { ?>
            <Say>Sorry the <?php echo $department3 ?> department is busy right now. Please call back later.</Say>
        <?php } ?>

    <?php } elseif ($_REQUEST['Digits'] == '4') {

        if ($user4available) { ?>
            <Dial><?php echo $user4No ?></Dial>
            <Say>The call failed or the remote party hung up.  Goodbye.</Say>
        <?php } else { ?>
            <Say>Sorry the <?php echo $department4 ?> department is busy right now. Please call back later.</Say>
        <?php } ?>

    <?php } ?>
</Response>