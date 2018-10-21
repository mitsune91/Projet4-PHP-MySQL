<?php
require('controller/frontend.php');
require('controller/backend.php');
//Routeur
$accesdenied = 'Vous tentez d\'accéder à un espace réservé aux administrateurs !';
const SITE_NAME = 'Blog';
const SITE_TITLE ='Voyage en Alaska';   
try {

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
                listPosts();
        }

        elseif ($_GET['action'] == 'post') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    post();
                }
                else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
        }
        //Ajouter un commentaire
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                        addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }else{
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        //Login d'un membre existant
        elseif ($_GET['action'] == 'login'){
            if (isset($_POST['userNickname']) && !empty($_POST['userNickname']) && isset($_POST['userPassword']) && !empty($_POST['userPassword']))
            {
                verifyMember($_POST['userPassword'], $_POST['userNickname']);
            }else{
                throw new Exception('Tous les champs ne sont pas remplis');
            }
        }
        //redirection vers la View de creation de membre
       /* elseif ($_GET['action'] == 'creationUser') {
           require('view/frontend/newAcountView.php');
        }*/
        //Creation d'un nouveau membre
        /*elseif ($_GET['action'] == 'newUser') {
            if (isset($_POST['nickname']) && !empty($_POST['nickname'])
                && isset($_POST['mail']) && !empty($_POST['mail'])
                && isset($_POST['password']) && !empty($_POST['password'])
                && isset($_POST['password2']) && !empty($_POST['password2']))
            {
                addMember($_POST['nickname'], $_POST['mail'], $_POST['password'], $_POST['password2']  );
            }else {
                throw new Exception('Tous les champs ne sont pas remplis');
            }
        }*/
        //Acces a la zone d'administration
        elseif($_GET['action'] == 'admin'){
            if(isset($_SESSION['userLevel']) && $_SESSION['userLevel'] == 'admin'){
                require('view/backend/adminPanelView.php');
            }else{
                throw new Exception($accesdenied);
            }
        }
        //vers la page d'ecriture d'un article
        elseif($_GET['action'] == 'writeNewPost'){
            if(isset($_SESSION['userLevel']) && $_SESSION['userLevel'] == 'admin'){
                require('view/backend/newPostView.php');

            }else{
                throw new Exception($accesdenied);
            }

        }
        //Ecrire un nouvel article depuis la zone admin
        elseif($_GET['action'] == 'newPost'){
            if (!empty($_POST['author']) && !empty($_POST['content'])&& !empty($_POST['title'])){
                newPost($_POST['title'], $_POST['author'], $_POST['content']);

            }else {
            throw new Exception('Tous les champs ne sont pas remplis');
            }
        }
        //vers la page de gestion des articles
        elseif($_GET['action'] == 'managePosts'){
            if(isset($_SESSION['userLevel']) && $_SESSION['userLevel'] == 'admin'){
                listPostsBack();
            }else{
                throw new Exception($accesdenied);
            }
        }
        //Suppression d'un article
        elseif($_GET['action'] == 'deletePost'){
            if(isset($_SESSION['userLevel']) && $_SESSION['userLevel'] == 'admin'){
                if(isset($_GET['id']) && $_GET['id'] > 0){
                    deletePost($_GET['id']);
                }else{
                    throw new Exception('Aucun id d\'article');
                }
            }else{
                throw new Exception($accesdenied);
            }
        }
        //Vers la page d'edition d'article
        elseif ($_GET['action'] == 'editPostView') {
            if(isset($_SESSION['userLevel']) && $_SESSION['userLevel'] == 'admin'){
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    viewEditPost($_GET['id']);
                }else {
                    throw new Exception('Aucun article à éditer !');
                }
            }else{
                throw new Exception($accesdenied);
            }
        }
        //validation de l'edition de l'article
        elseif($_GET['action'] == 'editPost'){
            if(isset($_SESSION['userLevel']) && $_SESSION['userLevel'] == 'admin'){
                if (isset($_GET['id']) && $_GET['id'] > 0)

                   {
                        editPost($_GET['id'], $_POST['title'], $_POST['author'], $_POST['content']);
                    }

                else{
                    throw new Exception('Aucun id d\'article');
                }
            }else{
                throw new Exception($accesdenied);
            }
        }
        //vers la page de gestion des commentaires
        elseif($_GET['action'] == 'manageComments'){
            if(isset($_SESSION['userLevel']) && $_SESSION['userLevel'] == 'admin'){
                listCommentsBack();
            }else{
                throw new Exception($accesdenied);
            }
        }
        //signalement d'un commentaire
        elseif ($_GET['action'] == 'signal') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                warnedCom($_GET['id']);
            }else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        //vers la vue edition de commentaire
        elseif ($_GET['action'] == 'editCommentView') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                viewEditCom($_GET['id']);
            }else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        //validation de l'edition de commentaire
        elseif($_GET['action'] == 'editComment'){
            if(isset($_SESSION['userLevel']) && $_SESSION['userLevel'] == 'admin'){
                if (isset($_GET['id']) && $_GET['id'] > 0){
                    editCom($_GET['id'], $_POST['author'], $_POST['comment'], $_POST['status']);
                }else{
                    throw new Exception('Aucun id de commentaire');
                }
            }else{
                throw new Exception($accesdenied);
            }
        }
         //Suppression d'un commentaire
        elseif($_GET['action'] == 'deleteComment'){
            if(isset($_SESSION['userLevel']) && $_SESSION['userLevel'] == 'admin'){
                if(isset($_GET['id']) && $_GET['id'] > 0){
                    deleteCom($_GET['id']);
                }else{
                    throw new Exception('Aucun id d\'article');
                }
            }else{
                throw new Exception($accesdenied);
            }
        }
        //vers la page de gestion des membres
        elseif($_GET['action'] == 'manageUsers'){
            if(isset($_SESSION['userLevel']) && $_SESSION['userLevel'] == 'admin'){
                listUsers();
            }else{
                throw new Exception($accesdenied);
            }
        }
        //supression d'un membre
        elseif($_GET['action'] == 'deleteUser'){
            if(isset($_SESSION['userLevel']) && $_SESSION['userLevel'] == 'admin'){
                if(isset($_GET['id']) && $_GET['id'] > 0){
                    deleteUser($_GET['id']);
                }else{
                    throw new Exception('Aucun id d\'article');
                }
            }else{
                throw new Exception($accesdenied);
            }
        }
        //logout membre
        elseif ($_GET['action'] == 'logout'){
            logout();
        }
    }
    //Affichage de la liste des billets
    else{
        listPosts();
        }
}

//Gestion des erreurs
catch(Exception $e) {
    ob_start();
    ?>

    <div id="errorPage">
        <p><?php  echo 'Erreur : ' . $e->getMessage(); ?></p>
        <p><a href="index.php">Retour à l'accueil</a></p>
    </div>

    <?php
    $content = ob_get_clean();

    require('view/frontend/template.php');

}
?>
