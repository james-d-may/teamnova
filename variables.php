 <?php

    $json = file_get_contents('https://choicecall.herokuapp.com/twilio?number=01566232012');
    $obj = (json_decode($json, true));

    // Company Name
    $companyname = $obj["orgname"];

    // Company Email to send recording to
    $companyemail = $obj["username"];

<<<<<<< HEAD
=======
    //No of top tier choices
    $nochoices = if ($isActive)
    {
      sizeof($activeActivity);
    } else {
      sizeof($busyActivity);
    }

>>>>>>> 7b2a5b2a3f2fc6df55d589ccdede1f28ae2216c0
    $activeActivity = $obj["activeMenu"]["options"];
    $busyActivity = $obj["busyMenu"]["options"];
    $isActive = $obj["isActive"];

<<<<<<< HEAD
    $nochoices = if ($isActive)
    {
      sizeof($activeActivity);
    } else {
      sizeof($busyActivity);
    } 
=======
    $currentActivity = if ($isActive)
    {
      $activeActivity;
    } else {
      $busyActivity;
    }
>>>>>>> 7b2a5b2a3f2fc6df55d589ccdede1f28ae2216c0

?>
