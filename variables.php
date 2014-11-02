 <?php

    $json = file_get_contents('https://choicecall.herokuapp.com/twilio?number=01566232012');
    $obj = (json_decode($json, true));

    // Company Name
    $companyname = $obj["orgname"];

    // Company Email to send recording to
    $companyemail = $obj["username"];

    $activeActivity = $obj["activeMenu"]["options"];
    var_dump($obj["activeMenu"]["options"]);
    echo "@@@@@@@@@@@@@@";
    $busyActivity = $obj["busyMenu"]["options"];
    var_dump($obj["busyMenu"]["options"]);
    echo "@@@@@@@@@@@@@@";
    $isActive = $obj["isActive"];
    var_dump($obj["isActive"]);

    $nochoices = if ($isActive)
    {
      sizeof($activeActivity);
    } else {
      sizeof($busyActivity);
    }

    if ($isActive) {
        $choice1text =
    } 
 

?>
