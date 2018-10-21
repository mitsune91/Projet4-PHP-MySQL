<?php $title = SITE_NAME.'-'.'Ecrire un article'; ?>


<?php ob_start(); ?>

<form action="index.php?action=newPost" method="post" >
  <div class="form-group">
      <label for="author">Auteur</label>
      <input type="text" class="form-control" id="author"  placeholder="Votre peudo" name="author" value="" required>
  </div>
  <div class="form-group">
      <label for="title">Titre</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Titre de l'article"  required>
  </div>
  <div class="form-group">
      <label for="postContent">Contenu de l'article</label>
      <textarea id="postContent" name="content" rows="15"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Publier</button>
</form>

<?php $content = ob_get_clean(); ?>


<?php require('view/backend/template.php'); ?>
