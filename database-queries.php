<?php
  $m = new MongoClient();
  $db = $m -> selectDB("mongodb://<dbuser>:<dbpassword>@ds049170.mongolab.com:49170/manchester");

  function getCompanyName($phonenumber)
  {
    $user_c = $db -> 'users';
    $user = array(
      'phonenumber' => $phonenumber
    );

    $user = $user_c -> findOne($user);
    return $user['orgname'];
  }

  function getChoices($phonenumber)
  {
    $user_c = $db -> 'Users';
    $user = $user_c -> findOne(array(
      'phonenumber' => $phonenumber,
    ));
    if ($user['active'])
    {
      return $user['activeMenu'];
    }
     else {
       return $user['busyMenu'];
     }
   }
?>
