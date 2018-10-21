<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark  row  ">
        <ul class="navbar-nav  ">
            <li class="nav-item col-sm-4 "><a href="index.php" class="nav-link">Accueil</a></li>




            <li class="nav-item text-light col-sm-4" style="margin-top: .5em;"><?php if (isset($_SESSION['nickname'])) {
                    if ($_SESSION['userLevel'] == "admin") { ?>
                        admin : <?= htmlspecialchars($_SESSION['nickname']); ?>
                    <?php } else {
                        ?> membre <?= htmlspecialchars(($_SESSION['nickname']));
                    }
                ?></li> <li class="nav-item col-sm-4"><a href="index.php?action=logout" class="nav-link">
                    <button type="button" class="btn btn-outline-danger"> Se deconnecter</button></a>
                <?php }else{ ?></li>
            <li>


                <form action="index.php?action=login" method="post" class="form-inline ">
                    <div class="row">
                        <div class="col">

                            <input type="text"
                                   placeholder="Pseudo" name="userNickname" id="userNickname" class="form-control col"
                                   required>
                        </div>
                        <div class="col">

                            <input type="password" placeholder="Mot de passe" name="userPassword" id="userPassword"
                                   class="form-control col"
                                   required>

                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-success">Se connecter</button>
                        </div>
                    </div>
                </form>


            </li>
            <!--<li class="nav-item col-sm"><a href="index.php?action=creationUser" class="nav-link">Nous rejoindre</a></li>-->

            <?php } ?>

        </ul>

    </nav>
</div>