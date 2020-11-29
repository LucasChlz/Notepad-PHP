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
    <title>Sig In</title
</head>
<body>
<nav class="nav-bar">
    <div class="container">
        <div class="logo">
            <a href=""><img src="public/images/logo.png" alt=""></a>
        </div>
        <ul>
            <li><a href="<?= $router->route('loginUserPage'); ?>"><img src="public/images/login.png" alt=""></a></li>
            <li><a href="<?= $router->route('newUserPage'); ?>"><img src="public/images/register.png" alt=""></a></li>
        </ul>
    </div>
</nav>

