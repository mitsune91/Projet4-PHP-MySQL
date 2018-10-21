<?php $title = SITE_NAME; ?>

<?php ob_start(); ?>


<?php
while ($data = $posts->fetch()) {
    ?>


    <div class="container">
        <div class="row justify-content-center" id="postTitle">
            <h3 class="col-4"><?= htmlspecialchars($data['title']) ?></h3>
            <div class="col-4">
                <p>
                    <small>Le <?= $data['creation_date_fr'] ?> par <?= $data['author'] ?></small>
                </p>
            </div>
        </div>
        <div class="row ">
            <p class="col-12"><?= nl2br($data['post_summary']) ?>...</p>
            <p class="col-12"><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire la suite</a></p>
        </div>

    </div>
    <hr>


    <?php
}
$posts->closeCursor();

?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
