<?php
//if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true) {
    require_once('database.php');
    $id = $_GET['id'];
    if (!empty($database)) {
        $res = $database->read($id);
        $r = mysqli_fetch_assoc($res);
        if (isset($_POST) & !empty($_POST)) {
            $name = $database->sanitize($_POST['name']);
            $real_name = $database->sanitize($_POST['real_name']);
            $short_bio = $database->sanitize($_POST['short_bio']);
            $long_bio = $database->sanitize($_POST['long_bio']);


            $res = $database->update($id, $name, $real_name, $short_bio, $long_bio);
            if ($res) {
                header('location: view.php');
            } else {
                echo "testing";
                echo $res;
            }
        }
   // }
//} else {
//    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Hero</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <form method="post" class="form-horizontal col-md-6 col-md-offset-3">
            <h2>Update Operation in CRUD Application</h2>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" value="<?php echo $r['name'] ?>"
                           placeholder="Name"/>
                </div>
            </div>

            <div class="form-group">
                <label for="real_name" class="col-sm-2 control-label">Real Name</label>
                <div class="col-sm-10">
                    <input type="text" name="real_name" class="form-control" id="real_name"
                           value="<?php echo $r['real_name'] ?>" placeholder="Real Name"/>
                </div>
            </div>

            <div class="form-group">
                <label for="short_bio" class="col-sm-2 control-label">Short Bio</label>
                <div class="col-sm-10">
                    <textarea name="short_bio" class="form-control" id="short_bio"
                              placeholder="Short Bio"><?php echo $r['short_bio'] ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="long_bio" class="col-sm-2 control-label">Long Bio</label>
                <div class="col-sm-10">
                    <textarea name="long_bio" class="form-control" id="long_bio"
                              placeholder="Long Bio"><?php echo $r['long_bio'] ?></textarea>
                </div>
            </div>

            <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Update"/>
        </form>
    </div>
</div>
</body>
</html>