<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">MyCompany</h5>
  <?php if($session->isLoggedIn()){ ?>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="/../admin/articles/show.php">Articles</a>
    <a class="p-2 text-dark" href="/../admin/users/show.php">Users</a>
  </nav>
  <?php }  ?>
  <?php if($session->isLoggedIn()){ ?>
  <a class="btn btn-outline-danger" href="/../admin/logout.php">Logout</a>
  <?php }else{ ?>
  <a class="btn btn-outline-primary" href="/../admin/login.php">Login</a>
  <?php } ?>
</div>

<div class="container">