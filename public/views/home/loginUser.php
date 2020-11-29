<?= $v->insert('templates/navbar'); ?>
<section class="background">
    <?php if (!empty($err)): ?>
        <div class="boxAlert">
        <p><?= $err; ?></p>
        </div><!--boxAlert-->
    <?php endif; ?>
   <div class="container">
        <section class="form-container">
            <h1>Log Into Your Account</h1>
            <form action="<?= $router->route('loginUserPost'); ?>" method="post">
                <div class="form-group">
                    <label for="">E-mail</label>
                    <input type="text" name="email">
                </div><!--form-group-->

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" name="password">
                </div><!--form-group-->

                <div class="form-group">
                    <input type="submit" value="Log In">
                </div><!--form-group-->
            </form>
        </section><!--form-container-->
   </div><!--containert-->
</section><!--background-->
</body>
</html>