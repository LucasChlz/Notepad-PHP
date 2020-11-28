<?= $v->insert('templates/navbar'); ?>
<?php if (!empty($err)): ?>
    <h2 class="text-white"><?= $err; ?></h2>
<?php endif; ?>

<?php if (!empty($sucess)): ?>
    <h2 class="text-white"><?= $sucess; ?></h2>
<?php endif; ?>
<section class="background">
   <div class="container">
        <section class="form-container">
            <h1>Create Your Account Now!</h1>
            <form action="<?= URL; ?>/new" method="post">
                <div class="form-group">
                    <label for="">NickName</label>
                    <input type="text" name="nickname">
                </div><!--form-group-->

                <div class="form-group">
                    <label for="">E-mail</label>
                    <input type="text" name="email">
                </div><!--form-group-->

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" name="password">
                </div><!--form-group-->

                <div class="form-group">
                    <input type="submit">
                </div><!--form-group-->
            </form>
        </section><!--form-container-->
   </div><!--containert-->
</section><!--background-->
</body>
</html>