<?php
require_once '../../config/config.php';
use Classes\User;
$users = User::findAll();

$title ="list of users";
require_once INCLUDES_ROOT.'/header.php';
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">firstname</th>
      <th scope="col">lastname</th>
      <th scope="col">email</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($users as $user) { ?>
    <tr>
      <th scope="row"><?php echo $user->id; ?></th>
      <td><?php echo $user->firstname; ?></td>
      <td><?php echo $user->lastname; ?></td>
      <td><?php echo $user->email; ?></td>
      <td class="col-4"><a href="modify.php?id=<?php echo $user->id; ?>" class="btn btn-warning">modifier</a><a href="delete.php?id=<?php echo $user->id; ?>" class="btn btn-danger">supprimer</a></td>
    </tr>
<?php } ?>
  </tbody>
</table>





<?php
require_once INCLUDES_ROOT.'/footer.php';
?>