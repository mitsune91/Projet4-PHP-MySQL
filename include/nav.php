<nav class="navbar navbar-expand-lg navbar-dark bg-dark  ">
    <ul class="navbar-nav container-fluid ">
        <li class="nav-item col-sm "><a href="index.php" class="nav-link">Accueil</a></li>

        <li class="nav-item col-sm"><a href="#" class="nav-link">A propos</a></li>


        <li class="nav-item col-sm "><?php if (isset($_SESSION['nickname'])) {
                if ($_SESSION['userLevel'] == "admin") { ?>
                    admin : <?= htmlspecialchars($_SESSION['nickname']); ?>
                <?php } else {
                    ?> membre <?= htmlspecialchars(($_SESSION['nickname']));
                }
                ?> <a href="index.php?action=logout" class="nav-link">Se deconnecter</a>
            <?php }else{ ?>
        <li>


            <form action="index.php?action=login" method="post" class="form-inline ">
                <div class="row">
                    <div class="col-sm">

                        <input type="text"
                               placeholder="Pseudo" name="userNickname" id="userNickname" class="form-control col"
                               required>
                    </div>
                    <div class="col-sm">

                        <input type="password" placeholder="Mot de passe" name="userPassword" id="userPassword"
                               class="form-control col"
                               required>

                    </div>
                    <div class="col-sm">
                        <button type="submit" class="btn btn-success">Se connecter</button>
                    </div>
                </div>
            </form>


        </li>
        <!--<li class="nav-item col-sm"><a href="index.php?action=creationUser" class="nav-link">Nous rejoindre</a></li>-->

        <?php } ?>

    </ul>

</nav>
