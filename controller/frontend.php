<?php
session_start();
// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AuthManager.php');
require_once('model/UserManager.php');

//AFFICHE LA LISTE DES ARTICLES
function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    //affichage de la liste des billets
    require('view/frontend/listPostsView.php');
}

//AFFICHE UN ARTICLE
function post($postId = null, $message = null)
//Passage en option de l'id article et du message pour le signalement de commentaire
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    //Dans le cas ou un commentaire a été signalé $postId contient l'id de l'article
    if(isset($postId)){
        $_GET['id'] = $postId;
    }
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    require('view/frontend/postView.php');
}
//AJOUT D'UN COMMENTAIRE PAR L'USER
function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false){
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

//VERIFICATION DE L'EXISTENCE D'UN MEMBRE EN BDD LOrs de la connexion
function verifyMember($userPassword, $userNickname)
{
    $authManager = new AuthManager();
    $member = $authManager->getMember($userNickname);

    //comparaison du mdp saisie avec le mdp hash de la bdd
    $isPasswordCorrect = password_verify($userPassword, $member['password']);
    //Si $member=false le membre n'est pas existant en bdd
    try{
        if (!$member)
        {
            throw new Exception('Mauvais utilisateur ou mot de passe!');
        }
        else
        //Le membre existe 2 possibilité le mdp corresponds
        {
        //A FAIRE : Creation des variables de session
            if ($isPasswordCorrect) {
                $_SESSION['id'] = $member['id'];
                $_SESSION['nickname'] = $member['nickname'];
                $_SESSION['password'] = $member['password'];
                $_SESSION['mail'] = $member['mail'];
                $_SESSION['userLevel'] = $member['userLevel'];
                //on redirige vers la page d'accueil qui prendra en compte les variable de session
                header('location:index.php');
            }
        //Le mdp corresponds pas
            else {
                throw new Exception('Mauvais utilisateur ou mot de passe!');
            }
        }
    }
    catch(Exception $e){
         $authInfo = $e->getMessage();
         ob_start();
         ?>
         <div id="wrongPass">
            <p class="alert alert-danger"><?php  echo 'Erreur : ' . $e->getMessage(); ?></p>

            <p>Vous n'etes pas administrateur ?  <a href="index.php">Retourner au blog</a></p>
        </div>
        <?php
        $content = ob_get_clean();
        require('view/frontend/template.php');
    }
}

//ADD member
/*function addMember($nickname, $mail, $password, $password2)
{
    try
    {
        $userManager = new UserManager();
        //Vérification de l'existance ou non du pseudo dans la bdd et verification sur les champs du formulaire
        $checkMember = $userManager->checkNickname($nickname);
        if(!$checkMember){
            if(preg_match('#[a-zA-Z0-9_]#', $nickname)){
                if($password == $password2){
                    if(preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ", $mail)){
                        $pass_hash = password_hash($password, PASSWORD_DEFAULT);
                        //envoi au modele pour insertion dans BDD
                        $push = $userManager->pushMember($nickname, $pass_hash, $mail);
                        throw new Exception('Votre compte a été créé avec succès');
                    }else{
                       throw new Exception('veuillez vérifier votre adresse email');
                        }
                }else{
                    throw new Exception('Les mots de passe ne correspondent pas');;
                    }
            }else{
                throw new Exception('Un ou plusieurs caractères non autorisé dans le mot de passe');
                }
        }else{
            throw new Exception('Ce pseudo est déjà utilisé');
            }
    }
    catch(Exception $e){
         $info = $e->getMessage();
         require('view/frontend/newAcountView.php');
    }
}
*/

function logout()
{
    session_destroy ();
    header('location:index.php');
}

?>
