<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL ?>/public/style/index.css">
    <link rel="stylesheet" href="<?= URL ?>/public/style/form.css">
    <link rel="stylesheet" href="<?= URL ?>/public/style/animation.css">
    <link rel="stylesheet" href="<?= URL ?>/public/style/box.css">
    <link rel="stylesheet" href="<?= URL ?>/public/style/navbar.css">
    <title>Notes</title
</head>
<body>
<nav class="nav-bar">
    <div class="container">
        <div class="logo">
            <a href="<?= $router->route('homeNote'); ?>"><img src="<?= URL ?>/public/images/logo.png" alt=""></a>
        </div>
        <ul>
            <?php if (!isset($_SESSION['loginNote'])): ?>
                <li><a href="<?= $router->route('loginUserPage'); ?>"><img src="<?= URL ?>/public/images/login.png" alt=""></a></li>
                <li><a href="<?= $router->route('newUserPage'); ?>"><img src="<?= URL ?>/public/images/register.png" alt=""></a></li>
            <?php endif; ?>
            <?php if (isset($_SESSION['loginNote'])): ?>
                <li><a href="<?= $router->route('logoutNote') ?>"><img src="<?= URL ?>/public/images/logout.png" alt=""></a></li>    
                <li><a href="<?= $router->route('createNote') ?>"><img src="<?= URL ?>/public/images/create.png" alt=""></a></li>    
            <?php endif; ?>
        </ul>
    </div>
</nav>

