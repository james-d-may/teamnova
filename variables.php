 <?php

    $json = file_get_contents('https://choicecall.herokuapp.com/twilio?number=01566232012');
    $obj = (json_decode($json, true));

    // Company Name
    $companyname = $obj["orgname"];

    // Company Email to send recording to
    $companyemail = $obj["username"];

    //No of top tier choices
    $nochoices = 0;


    if ($isActive)
    {
      $nochoices = sizeof($activeActivity);
    } else {
      $ nochoices = sizeof($busyActivity);
    }
    $activeActivity = $obj["activeMenu"]["options"];
    $busyActivity = $obj["busyMenu"]["options"];
    $isActive = $obj["isActive"];

    $nochoices = if ($isActive)
    {
      sizeof($activeActivity);
    } else {
      sizeof($busyActivity);
    } 

    $currentActivity = if ($isActive)
    {
      $activeActivity;
    } else {
      $busyActivity;
    }


?>
