<?php

require_once '../../config/config.php';

use Classes\Article;
$title ="Update an article";

if(!$_GET['id']){
  header('Location: show.php');
}

require_once INCLUDES_ROOT.'/header.php';

if(!empty($_POST)){
    $parameters = [];
    $parameters['title'] = ($_POST['title'])? $_POST['title'] : null;
    $parameters['content'] = ($_POST['content'])? $_POST['content'] : null;
    $parameters['date'] = ($_POST['date'])? $_POST['date'] : null;

    $article = new Article($parameters);
    // $article->merge_attributes();
    $article->update($_GET['id']);
}

$article = Article::findById($_GET['id']);

?>
<form action="#" method="POST">
  <div class="form-group">
    <label for="title">title</label>
    <input type="text" class="form-control" id="title" name="title" value="<?php echo $article->title; ?>">
  </div>
  <div class="form-group">
    <label for="content">content</label>
    <textarea class="form-control" id="content" rows="3" name="content"><?php echo $article->content; ?></textarea>
  </div>
  <!-- <div class="form-group">
    <label for="image">image</label>
    <input type="file" class="form-control-file" id="image">
  </div> -->
  <div class="form-group">
    <label for="date">date</label>
    <input type="date" class="form-control" id="date" name="date"  value="<?php echo date("Y-m-d", strtotime($article->date)); ?>">
  </div>

  <div class="form-group">
    <input type="submit" name="submit">
  </div>
</form>


<?php
require_once INCLUDES_ROOT.'/footer.php';
?>