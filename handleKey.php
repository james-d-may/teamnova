<?php

    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

    include 'functions.php';
    include 'variables.php';

    function process($activity, $int)
    {
      switch($activity["action"]){
        case "redirect":
        redirect($activity["phonenumber"]);
        break;
        case "text":
        text($activity["text"]);
        break;
        case "voicemail":
        voicemail();
        break;

      }
    }

?>

<Response>

  <?php
    $keypress = (int) $_REQUEST['Digits'];

    process($currentActivity[$keypress-1]);
    ?>

</Response>
