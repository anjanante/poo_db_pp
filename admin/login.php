<?php
require_once '../config/config.php';
use Classes\User;


$title ="Login form";
require_once INCLUDES_ROOT.'/header.php';


if(!empty($_POST))
{
    User::userConnect();
}
?>

<form action="#" method="POST">
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