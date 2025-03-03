<?php

require_once '../../config/config.php';

use Classes\User;
$title ="Add user";
require_once INCLUDES_ROOT.'/header.php';

if(!empty($_POST)){

    $parameters = [];
    $parameters['firstname'] = ($_POST['firstname'])? $_POST['firstname'] : null;
    $parameters['lastname'] = ($_POST['lastname'])? $_POST['lastname'] : null;
    $parameters['email'] = ($_POST['email'])? $_POST['email'] : null;
    $parameters['password'] = ($_POST['password'])? $_POST['password'] : null;

    $user = new User($parameters);
    $user->validation();
    $user->save();

}

if(isset($user->errors))
{
  foreach($user->errors as $error)
  {
    echo '<div class="alert alert-danger" role="alert">';
    echo $error;
    echo '</div>';
  }
}

?>

<form action="#" method="POST">
  <div class="form-group">
    <label for="firstname">firstname</label>
    <input type="text" class="form-control" id="firstname" name="firstname">
  </div>
  <div class="form-group">
    <label for="lastname">lastname</label>
    <input type="text" id="lastname" rows="3" name="lastname" class="form-control">
  </div>
  <div class="form-group">
    <label for="email">email</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="password">password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="form-group">
    <input type="submit" name="submit">
  </div>
</form>


<?php
require_once INCLUDES_ROOT.'/footer.php';
?>