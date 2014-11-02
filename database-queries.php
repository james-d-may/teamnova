<?php
  $m = new MongoClient();
  $db = $m -> selectDB("");

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
