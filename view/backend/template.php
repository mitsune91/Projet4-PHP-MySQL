<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title><?= $title ?></title>

    <!--Script tinymce-->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=qp3ik491f88dxh07zvi6an5i3i0i8l5b9vjxd839mg87en3b"></script>
    <script>tinymce.init({selector: 'textarea#postContent'});</script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">


</head>

<body>
<?php include('include/nav.php'); ?>

<?php include ('include/adminNav.php')?>
<h1 style="text-align: center;"><strong><?php echo SITE_TITLE ?></strong></h1>
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-sm-12">




            <?= $content ?>


        </div>


    </div>

</div>




<script src="public/vendor/jquery/jquery.min.js"></script>
<script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
