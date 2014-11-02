<?php
    
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

    include 'functions.php';
    include 'variables.php';
    
?>

<Response> 

    <?php if ($_REQUEST['Digits'] == '1') { ?>

        <!-- Query to see what form choice 1 is and collect associated varibales --> 

        <?php redirect("07956996347") ?>

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

