<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL ?>/public/style/bootstrap.min.css">
    <link rel="stylesheet" href="<?= URL ?>/public/style/index.css">
    <title>Sig In</title
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light nav-yellow">
  <button class="navbar-toggler btn btn-outline-success my-2 my-sm-0" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <div class="navbar-nav mr-auto mt-2 mt-lg-0">
        <a class="navbar-brand" href="#">NotePad</a>
    </div>
    <li class="form-inline my-2 my-lg-0">
        <a class="nav-link" href="#">Log In</a>
    </li>
  </div>
</nav>
<?php if (!empty($err)): ?>
    <h2 class="text-white"><?= $err; ?></h2>
<?php endif; ?>

<?php if (!empty($sucess)): ?>
    <h2 class="text-white"><?= $sucess; ?></h2>
<?php endif; ?>
<div class="container mt-5 text-white">
    <h2 class="text-center">Fill all Fields</h2>
    <form method="POST" action="<?= $router->route('newUserPost'); ?>">
        <div class="form-group">
        <label class="text-white" for="">Nickname</label>
        <input type="text" class="form-control" name="nickname">
    </div>
    <div class="form-group">
        <label class="text-white" for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label class="text-white" for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-confirm">Send</button>
    </form>
</div>
</body>
</html>