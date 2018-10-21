<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">


    <title><?= $title ?></title>


</head>
<body>
<!-- Nav + login + info user if connected-->
<?php include ('include/nav.php');?>
<?php if (isset($_SESSION['userLevel']) &&$_SESSION['userLevel']=='admin'){ ?>
 <?php include ('include/adminNav.php');
?>
<?php } ?>
<h1 style="text-align: center;"><?php echo SITE_TITLE ?>
</h1>
<?= $content ?>


<!-- Bootstrap core JavaScript -->
<script src="public/vendor/jquery/jquery.min.js"></script>
<script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>




