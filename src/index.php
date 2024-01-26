<?php
session_start();
?>
<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="public/assets/css/bootstrap.rtl.min.css"
          integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link href="public/assets/css/bootstrap.min.css" rel="stylesheet">

    <title>صفجه اصلی</title>
</head>
<body>

<div class="container">
    <div class="row">
        <?php include 'resources/views/layouts/menu.html' ?>
        <div class="col-md-4 col-md-offset-4 mx-auto mt-md-5 pt-md-5">
            <?php if(isset($_SESSION['message'])) : ?>
                <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
                <?php
                unset($_SESSION['message']);
            endif;
            ?>

            <?php if(isset($_SESSION['errors'])) : ?>
                <?php foreach ($_SESSION['errors'] as $error): ?>
                    <h5 class="alert alert-danger"><?= $error; ?></h5>
                <?php endforeach; ?>
                <?php
                unset($_SESSION['errors']);
            endif;
            ?>
            <?php include 'resources/views/wallet/wallet.html' ?>
        </div>
    </div>
</div>

<script src="public/assets/js/bootstrap.bundle.js">
</script>
</body>
</html>