<?php
session_start();
echo "Logged out successfully";
header("Location:defaultView.php");
session_destroy();
?>