<?php $title = SITE_NAME . '-' . htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<!--AFFICHAGE DES ARTICLES-->
<div class="container">


    <div class="row">
        <!-- Title -->
        <h2 class="col" style="text-align: center;"><?= htmlspecialchars($post['title']) ?></h2>

        <!-- Author -->

        <p class="col align-self-end">
            Par
            <?= $post['author'] ?> Le <?= $post['creation_date_fr'] ?>
        </p>
    </div>
    <hr>


    <div class="row"><!-- Post Content -->
        <p class="col-12"><?= nl2br($post['content']) ?></p>
    </div>
    <p>
        <?php
        //Mode edition depuis l'article si connecter en Admin
        if (isset($_SESSION['userLevel']) && $_SESSION['userLevel'] == 'admin') {
            ?>
            <a href="index.php?action=editPostView&amp;id=<?php echo $post['id']; ?>">
                <button class="btn btn-secondary" type="button">Editer</button>
            </a>

            <a href="index.php?action=deletePost&amp;id=<?php echo $post['id']; ?>">
                <button class="btn btn-danger" type="button"
                        onclick="return confirm('Etes vous sur de vouloir supprimer cet article ?')">Supprimer
                </button>
            </a>

            <?php
        }
        ?>
    </p>
    <hr>
    <div class="row">

        <h2 class="col" style="text-align: center;">Commentaires</h2>
    </div>
    <?php /*
    if (isset($_SESSION['nickname'])) {
        */ ?>
        <!--FORMULAIRE D'ENVOI DE COMMENTAIRE -->
        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
            <!-- Comments Form -->
            <div>
                <h5>Commenter cet article</h5>
                <div class="form-group">
                    <label for="nickname" class="col-md-6 col-form-label">Pseudo</label>
                    <div>
                        <input type="text" class="form-control" id="nickname" name="author"
                               value="<?php if (isset($_SESSION['nickname'])) echo $_SESSION['nickname'] ?>"
                               required>
                    </div>
                </div>
                <div>
                    <div class="form-group">
                                <textarea class="form-control" id="comment" name="comment" rows="3"
                                          placeholder="Mon commentaire"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Commenter</button>
                </div>
            </div>
        </form>
        <?php /*
    } else {
        ?>
        <div>
            <p>Veuillez vous authentifier pour pouvoir commenter cet article.</p>
            <p>Si vous n'avez pas encore de compte vous pouvez en créer un <a
                        href="index.php?action=creationUser">ici</a>.</p>
        </div>
        <?php
    }

    */?>
    <span id="signalMessage">
                <p><?php
                    //message info signalement commentaire
                    if (isset($message)) {

                        echo $message;
                    }
                    ?>
                </p>
            </span>
    <!--AFFICHAGE DES COMMENTAIRES-->

    <?php
    while ($comment = $comments->fetch()) {
        if ($comment['status'] != 'warned') {

            ?>
            <div class="row">
                <div class="col">
                    <h5><strong><?= htmlspecialchars($comment['author']) ?></strong>
                        le <?= $comment['comment_date_fr'] ?></h5>
                    <?= nl2br(htmlspecialchars($comment['comment'])) ?>
                </div>
                <div class="row">
                    <div class="col">
                        <p><a href="index.php?action=signal&amp;id=<?php echo $comment['id']; ?>">
                            <button class="btn btn-danger" type="button">Signaler</button>
                        </a></p>
                        <br>

                    </div>
                </div>
            </div><hr>

            <?php
        } else {
            ?>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong>
                le <?= $comment['comment_date_fr'] ?></p>
            <p>Commentaire en attente de modération.</p>
            <?php
        }
    }
    ?>

</div>


<?php $content = ob_get_clean(); ?>


<?php require('view/frontend/template.php'); ?>
