<?= $v->insert('templates/navbar') ?>

<div class="clear"></div>
    <section class="background-create">
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
        <div class="form-create">
            <form action="<?= $router->route(''); ?>" method="post">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" value="<?= $note['title']; ?>">
                </div><!--form-control-->

                <div class="form-group">
                    <label for="">Text</label>
                    <textarea id="text" name="text"><?= $note['text']; ?></textarea>
                    <span>Characters: </span><span id="count"></span>
                    <input id="countForm" type="hidden" name="character">
                </div><!--form-control-->
                
                
                <div class="form-group">
                        <input type="submit" value="Save">
                </div><!--form-group-->
            </form>
        </div><!--form-note-->
    </div><!--container-->
</section><!--background-create-->

<script type="module" src="<?= URL ?>/public/js/index.js"></script>
</body>
</html>

