<?php
    require_once('database.php');
    if (!empty($database)) {
        $res = $database->read();
        $r = mysqli_fetch_assoc($res);
        if (isset($_POST) & !empty($_POST)) {
            $name = $database->sanitize($_POST['name']);
            $real_name = $database->sanitize($_POST['real_name']);
            $short_bio = $database->sanitize($_POST['short_bio']);
            $long_bio = $database->sanitize($_POST['long_bio']);


            $res = $database->create($name, $real_name, $short_bio, $long_bio);
            if ($res) {
                header('location: view.php');
            } else {
                echo "testing" . $res;
            }

        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Hero</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <form method="post" class="form-horizontal col-md-8 col-md-offset-1">
            <h2>Add a Hero</h2>
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name"/>
                </div>
            </div>

            <div class="form-group">
                <label for="real_name" class="col-sm-3 control-label">Real Name</label>
                <div class="col-sm-9">
                    <input type="text" name="real_name" class="form-control" id="real_name" placeholder="Real Name"/>
                </div>
            </div>

            <div class="form-group">
                <label for="short_bio" class="col-sm-3 control-label">Short Bio</label>
                <div class="col-sm-9">
                    <textarea name="short_bio" class="form-control" id="short_bio" placeholder="Short Bio"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="long_bio" class="col-sm-3 control-label">Long Bio</label>
                <div class="col-sm-9">
                    <textarea name="long_bio" class="form-control" id="long_bio" placeholder="Long Bio"></textarea>
                </div>
            </div>

            <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="submit"/>
        </form>
    </div>
</div>
</body>
</html>