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
    <?php foreach ($articles as $article) { ?>
        <tr>
        <th scope="row"><?= $article->id; ?></th>
        <td><?= $article->title; ?></td>
        <td><?= $article->content; ?></td>
        <td><?= $article->date; ?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>





<?php
require_once INCLUDES_ROOT.'/footer.php';
?>