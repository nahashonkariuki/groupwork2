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
        <div class="btn-group col-md-offset-1 col-sm-offset-1" style="padding-top: 3%;padding-bottom: 3%" role="group">
            <a href="create.php" class="btn btn-success" role="button">Create</a>
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
                        <td><a class="btn btn-info" href="update.php?id=<?php echo $r['id']; ?>">Edit</a> <a
                                    class="btn btn-danger" href="delete.php?id=<?php echo $r['id']; ?>">Delete</a></td>
                    </tr>

                    <?php } ?>
                </table>
                <div class="btn-group col-md-offset-1 col-sm-offset-1" style="padding-top: 3%;padding-bottom: 3%" role="group">
                    <a href="logout.php" class="btn btn-success" role="button">log out</a>
                </div>
            </div>
        </div>
    </body>
</html>