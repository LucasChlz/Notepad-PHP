<?= $v->insert('templates/navbar'); ?>
<div class="clear"></div>
<section class="background-list">
    <div class="container-create">
        <div class="container-list">
            <?php foreach($notes as $note): ?>
            <div class="notes-single">
                <a class="viewNote" href="<?= $router->route('viewNote', [
                    "id" => $note['id']
                ]) ?>"><p>Title: <?= $note['title']; ?></p></a>
                <div class="info">
                    <span>Characters: <?= $note['characters']; ?></span> /
                    <span>Created At: <?= $note['created_at']; ?></span>
                </div>
                <form action="" method="post">
                    <div class="delete">
                        <a href="<?= $router->route('deleteNote', [
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