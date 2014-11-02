 <?php

    $json = file_get_contents('https://choicecall.herokuapp.com/twilio?number=01566232012');
    $obj = (json_decode($json, true));

    // Company Name
    $companyname = $obj["orgname"];

    // Company Email to send recording to
    $companyemail = $obj["username"];

    //No of top tier choices
    $nochoices = if ($isActive)
    {
      sizeof($activeActivity);
    } else {
      sizeof($busyActivity);
    }

    array(13) { ["_id"]=> string(24) "5455c0ddd9111b080022b454" ["__v"]=> int(0) ["activeMenu"]=> array(2) { ["name"]=> string(6) "Active" ["options"]=> array(2) { [0]=> array(3) { ["text"]=> string(15) "New menu option" ["action"]=> string(8) "redirect" ["phonenumber"]=> string(11) "07757672217" } [1]=> array(3) { ["text"]=> string(2) "Hi" ["action"]=> string(4) "text" ["phonenumber"]=> string(11) "07757672217" } } } ["phonenumber"]=> string(11) "01566232012" ["busyMenu"]=> array(2) { ["name"]=> string(4) "Busy" ["options"]=> array(0) { } } ["provider"]=> string(5) "local" ["updated"]=> string(24) "2014-11-02T05:28:32.714Z" ["created"]=> string(24) "2014-11-02T05:27:57.586Z" ["roles"]=> array(1) { [0]=> string(4) "user" } ["isActive"]=> bool(true) ["username"]=> string(25) "lukas.kobis@univ.ox.ac.uk" ["yoname"]=> string(13) "LUKAS19940000" ["orgname"]=> string(10) "choicecall" }

    $activeActivity = $obj["activeMenu"]["options"];
    $busyActivity = $obj["busyMenu"]["options"];
    $isActive = $obj["isActive"];

    $currentActivity = if ($isActive)
    {
      $activeActivity;
    } else {
      $busyActivity;
    }
?>
