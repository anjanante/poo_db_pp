<?php
require_once '../../config/config.php';

require_once INCLUDES_ROOT.'/header.php';

use Classes\Article;
$article = Article::findById($_GET['id']);
?>

<ul class="list-group">
  <li class="list-group-item">ID : <?php echo $article->id; ?></li>
  <li class="list-group-item">Title : <?php echo $article->title; ?></li>
  <li class="list-group-item">Content : <?php echo $article->content; ?></li>
  <li class="list-group-item">Date : <?php echo $article->date; ?></li>
</ul>

<?php
require_once INCLUDES_ROOT.'/footer.php';
?>