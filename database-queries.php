<?php
  $m = new MongoClient();
  $db = $m -> selectDB("mongodb://choicecall:ds063859ds063859ds063859@ds063859.mongolab.com:63859/heroku_app31199003");

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
