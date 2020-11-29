<?= $v->insert('templates/navbar'); ?>
<div class="clear"></div>
<section class="background-list">
    <div class="container-create">
        <div class="container-list">
            <?php foreach($notes as $note): ?>
            <div class="notes-single">
                <p>Title: <?= $note['title']; ?></p>
                <span>Created At: </span>
            </div><!--notes-single-->
            <?php endforeach; ?>
        </div><!--container-list-->
    </div><!--container--create-->
</section><!--background-list-->
</body>
</html>