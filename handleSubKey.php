<?php
    
    // header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

    include "handleKey.php";

 ?>

 <Response>

<?php redirect("07429059825") ?>
 	
    <?php if ($_REQUEST['Digits'] == '1') { ?>

        <!-- Query to see what form choice 1 is and collect associated varibales --> 

        <?php redirect("07429059825") ?>

    <?php } elseif ($_REQUEST['Digits'] == '2') { ?>

        <!-- Query to see what form choice 2 is and collect associated varibales -->

        <?php redirect("07477161555") ?>

     <?php } ?>
</Response>