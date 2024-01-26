<?php
global $conn;
session_start();
include('./config/DbConfig.php');

$wallets = $conn->query('SELECT * FROM wallets')->fetchAll();
$sum = $conn->query('SELECT * FROM wallets')->fetchAll();

$sql = "SELECT sum(amount) as rate_sum, count(*) as record_count FROM wallets";
$query = $conn->query($sql);
$row = $query->fetch(PDO::FETCH_ASSOC);
if ($row) {
    $sum = $row['rate_sum'];
    $count = $row['record_count'];
}

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
        <div class="col-md-12 mt-4">

        <p><span>موجودی کیف پول شما :</span>&nbsp;<span><?php echo $sum?? 0 ?></span>&nbsp;<span>ریال</span></p>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">مقدار شارژ</th>
            </tr>
            </thead>
            <tbody>
                <?php
                if ($wallets) {
                    $count = 1;
                    foreach($wallets as $wallet) {
                        ?>
                        <tr>
                            <td><?php echo $count ?></td>
                            <td><?php echo $wallet['amount'] ?></td>
                        </tr>
                        <?php
                        $count++;
                    }
                }
                ?>
            </tbody>
        </table>
        </div>
    </div>
</div>

<script src="public/assets/js/bootstrap.bundle.js">
</script>
</body>
</html>