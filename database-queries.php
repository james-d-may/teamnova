<?php ini_set('display_errors','On'); 
error_reporting(E_ALL); ?>

<?php
  $m = new MongoClient("mongodb://choicecall:ds063859ds063859ds063859@ds063859.mongolab.com:63859/heroku_app31199003");
  var_dump($m);
  // $db = $m -> 'manchester';

  // function getCompanyName($phonenumber)
  // {
  //   $user_c = $db -> users;
  //   $user = array(
  //     'phonenumber' => $phonenumber
  //   );

  //   $user = $user_c -> findOne($user);
  //   return $user['orgname'];
  // }

  // function getChoices($phonenumber)
  // {
  //   $user_c = $db -> users;
  //   $user = $user_c -> findOne(array(
  //     'phonenumber' => $phonenumber,
  //   ));
  //   if ($user['active'])
  //   {
  //     return $user['activeMenu'];
  //   }
  //    else {
  //      return $user['busyMenu'];
  //    }
  //  }
?>

<p> <?php echo "hello" ?> </p>


