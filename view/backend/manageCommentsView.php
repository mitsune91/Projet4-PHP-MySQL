<?php $title = SITE_NAME.'-'.'Gestion des commentaires'; ?>


<?php ob_start(); ?>
<div class="container table-responsive">
<table class="table table-striped row">

    <tr>
        <th scope="col">ID</th>
        <th scope="col">Article</th>
        <th scope="col">Auteur</th>
        <th scope="col">Commentaire</th>
        <th scope="col" >Date de publication</th>
        <th scope="col" >Statut</th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>

    <tr>
        <?php
        while ($data = $comments->fetch()) {
            ?>

        <th ><?php echo nl2br(htmlspecialchars($data['id'])); ?></th>
        <td ><a href="index.php?action=post&id=<?php echo htmlspecialchars($data['post_id']); ?>" target=_blank>Voir l'article</a></td>
        <td><?php echo htmlspecialchars($data['author']); ?></td>
        <td><?php echo htmlspecialchars($data['comment']); ?></td>
        <td><?php echo htmlspecialchars($data['comment_date_fr']); ?></td>
            <td>
                <?php if($data['status'] == 'valid'){
                        ?>
                        <span id="statusValid"><p>Non signalé</p></span>
                        <?php
                        }else{
                        ?>
                        <span id="statusWarning"><p>Signalé</p></span>
                        <?php
                        }
         ?></td>
        <td><a href="index.php?action=editCommentView&amp;id=<?php echo $data['id']; ?>">Editer</a></td>
        <td><a href="index.php?action=deleteComment&amp;id=<?php echo $data['id']; ?>" onclick="return confirm('Etes vous sur de vouloir supprimer ce commentaire ?')"><button type="button" class="btn btn-danger">Supprimer</button></a></td>

    </tr>

        <?php
        }
        $comments->closeCursor();
        ?>

    </table>
</div>

<?php $content = ob_get_clean(); ?>


<?php require('view/backend/template.php'); ?>
