<?php $title = SITE_NAME.'-'.'Gestion des articles'; ?>


<?php ob_start(); ?>

<div class="table-responsive">
<table class="table table-striped row">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Titre</th>
        <th scope="col">Auteur</th>
        <th scope="col">Publié le</th>
        <th scope="col">Editer</th>
        <th scope="col">Supprimer</th>
    </tr>

    <tr>
        <?php
        while ($data = $posts->fetch()) {
            ?>
        <th scope="row"><?php echo nl2br(htmlspecialchars($data['id'])); ?></th>
        <td><?php echo htmlspecialchars($data['title']); ?></td>
        <td><?php echo htmlspecialchars($data['author']); ?></td>
        <td><?php echo htmlspecialchars($data['creation_date_fr']); ?></td>
        <td><a href="index.php?action=editPostView&amp;id=<?php echo $data['id']; ?>">Editer</a></td>
        <td><a href="index.php?action=deletePost&amp;id=<?php echo $data['id']; ?>" onclick="return confirm('Etes vous sur de vouloir supprimer cet article ?')"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
    </tr>

        <?php
        }
        $posts->closeCursor();
        ?>

    </table>
</div>

<?php $content = ob_get_clean(); ?>


<?php require('view/backend/template.php'); ?>
