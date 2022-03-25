<?php
require_once('database.php');
if (!empty($database)) {
    $res = $database->read();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Heroes</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
</div>
<div class="container">
    <div class="row">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Real Name</th>
                <th>Short Bio</th>
                <th>Long Bio</th>
                <th></th>
            </tr>

            <?php while ($r = mysqli_fetch_assoc($res)){ ?>
                <tr>
                    <td><?php echo $r['id']; ?></td>
                    <td><?php echo $r['name']; ?></td>
                    <td><?php echo $r['real_name']; ?></td>
                    <td><?php echo $r['short_bio']; ?></td>
                    <td><?php echo $r['long_bio']; ?></td>

                </tr>
            <?php } ?>
        </table>
    </div>
</div>
</body>
</html>
