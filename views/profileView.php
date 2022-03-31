<?php
require_once '../controllers/getGalleryController.php';
session_start();

if (!$_SESSION['user']) {
    header('Location: /');
}
$dir_original = "../public/uploads/original/";
$dir_mini = "../public/uploads/mini/";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Профиль</title>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/jquery.fancybox.min.css">
</head>
<body>

<!-- Профиль -->

<form>
    <h2 style="margin: 10px 0;"><?= $_SESSION['user']['login'] ?></h2>
    <a href="../controllers/logoutController.php" class="logout">Выход</a>
</form>


<div class="container">

    <div class="row">
        <?php foreach ($_SESSION['gallery'] as $image): ?>
            <div class="col-md-3 col-sm-4 col-xs-6 thumb">
                <a data-fancybox="gallery" class="fancyimage"  rel="group" href="<?=$dir_original . $image ?>">
                    <img class="img-responsive" src="<?= $dir_mini . $image?>"  alt=""/>
                </a>
                <form action="../controllers/deleteController.php" method="get">
                    <input type="hidden" name="name" value="<?=$image?>" />
                    <input type="submit" value="Удалить" />
                </form>
            </div>

        <?php endforeach; ?>
    </div>

</div>

<form action="../controllers/uploadController.php" enctype="multipart/form-data" method="post">
    <input name="picture" type="file" />
    <input type="submit" value="Загрузить" />
    <?php
    if ($_SESSION['upload_msg']) {
        echo '<p class="msg"> ' . $_SESSION['upload_msg'] . ' </p>';
    }
    unset($_SESSION['upload_msg']);
    ?>

</form>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.fancybox.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("a.fancyimage").fancybox();
    });
</script>
</body>
</html>