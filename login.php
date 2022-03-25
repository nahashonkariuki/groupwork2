<?php

$servername = "localhost";
$username = "nahashon";
$password = "kariuki";
$dbname = "heroes";
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
//else {
//  echo "Connected successfully";
// }
//require_once("db_connection.php");
//include("functions.php");

$username = $password = "";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    session_start();
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
}

// something was posted
//    $username = $_POST['username'];
//    $password = $_POST['password'];



function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (!empty($username) && !empty($password) && !is_numeric($username)) {

//read from database
    $sql = "select * from user where username = '$username' limit 1";
    $result = $connection->query($sql);

    if ($result) {
        if ($result && mysqli_num_rows($result) > 0) {

            $user = mysqli_fetch_assoc($result);

            if ($user['password'] === $password) {

                $_SESSION['id'] = $user['id'];
                header("Location: view.php");
                die;
            } else {
                echo "wrong username or password!";
            }
        }
    }
}
//        echo "wrong username or password!";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>

<style type="text/css">

    #text {

        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: solid thin #aaa;
        width: 100%;
    }

    #button {

        padding: 10px;
        width: 100px;
        color: white;
        background-color: lightblue;
        border: none;
    }

    #box {

        background-color: grey;
        margin: auto;
        width: 300px;
        padding: 20px;
    }

</style>

<div id="box">

    <form method="post">
        <div style="font-size: 20px;margin: 10px;color: white;">Login</div>
        <input id="text" type="text" name="username"><br><br>
        <input id="text" type="password" name="password"><br><br>
        <input id="button" type="submit" value="Login"><br><br>
        <a href="signup.php">Click to Signup</a><br><br>
        <input type="checkbox" class="check-box" name="remember_me"/><span
        >Remember Password</span

    </form>
</div>
</body>
</html>
