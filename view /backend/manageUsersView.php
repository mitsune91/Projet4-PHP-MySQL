<?php $title = SITE_NAME.'-'.'Gestion des membres'; ?>


<?php ob_start(); ?>
<div class="table-responsive">
<table class="table table-striped row">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Pseudo</th>
        <th scope="col">E-mail</th>
        <th scope="col">privilège</th>
        <th scope="col">Date de inscription</th>
        <th scope="col"></th>

    </tr>

    <tr>
        <?php
        while ($data = $users->fetch()) {
            ?>
        <th scope="row"><?php echo nl2br(htmlspecialchars($data['id'])); ?></th>
        <td><?php echo htmlspecialchars($data['nickname']); ?></td>
        <td><?php echo htmlspecialchars($data['mail']); ?></td>
        <td><?php echo htmlspecialchars($data['userLevel']); ?></td>
        <td><?php echo htmlspecialchars($data['inscription_date_fr']); ?></td>
        <td><a href="index.php?action=deleteUser&amp;id=<?php echo $data['id']; ?>" onclick="return confirm('Etes vous sur de vouloir supprimer ce membre ?')"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
    </tr>

        <?php
        }
        $users->closeCursor();
        ?>

    </table>
</div>

<?php $content = ob_get_clean(); ?>


<?php require('view/backend/template.php'); ?>
