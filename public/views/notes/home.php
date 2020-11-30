<?= $v->insert('templates/navbar'); ?>
<div class="clear"></div>
<section class="background-list">
    <div class="container-create">
        <div class="container-list">
            <?php foreach($notes as $note): ?>
            <div class="notes-single">
                <p>Title: <?= $note['title']; ?></p>
                <span>Characters: <?= $note['characters']; ?> </span></br>
                <span>Created At: <?= $note['created_at']; ?></span>
                <form action="" method="post">
                    <div class="delete">
                        <a href="<?= $router->route('deletePost', [
                            "id" => $note['id']
                        ]); ?>">Delete</a>
                    </div><!--delete-->
                </form>
            </div><!--notes-single-->
            <?php endforeach; ?>
        </div><!--container-list-->
    </div><!--container--create-->
</section><!--background-list-->
</body>
</html>