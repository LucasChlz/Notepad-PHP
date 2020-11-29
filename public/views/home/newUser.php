<?= $v->insert('templates/navbar'); ?>

<section class="background">
    <?php if (!empty($err)): ?>
        <div class="boxAlert">
        <p><?= $err; ?></p>
        </div><!--boxAlert-->
    <?php endif; ?>
    
    <?php if (!empty($sucess)): ?>
        <div class="boxAlert">
        <p><?= $sucess; ?></p>
        </div><!--boxAlert-->
    <?php endif; ?>
   <div class="container-create">
        <section class="form-container">
            <h1>Create Your Account Now!</h1>
            <form action="<?= $router->route('newUserPost'); ?>" method="post">
                <div class="form-group">
                    <label for="">NickName</label>
                    <input type="text" name="nickname">
                </div><!--form-group-->

                <div class="form-group">
                    <label for="">E-mail</label>
                    <input type="email" name="email">
                </div><!--form-group-->

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" name="password">
                </div><!--form-group-->

                <div class="form-group">
                    <input type="submit" value="Register">
                </div><!--form-group-->
            </form>
        </section><!--form-container-->
   </div><!--containert-->
</section><!--background-->
</body>
</html>