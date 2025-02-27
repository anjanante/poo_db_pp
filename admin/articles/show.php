<?php
require_once '../../config/config.php';
use Classes\Article;
$articles = Article::findAll();

$title ="Articles list";
require_once INCLUDES_ROOT.'/header.php';
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">content</th>
      <th scope="col">date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">#</th>
      <td>MARK</td>
      <td>Otto</td>
      <td>twitter</td>
    </tr>
  </tbody>
</table>





<?php
require_once INCLUDES_ROOT.'/footer.php';
?>