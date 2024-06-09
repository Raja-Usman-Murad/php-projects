<?php
session_start();
echo "logging you out please wait...";
// session_unset();
session_destroy();
header('Location: /forum/index.php');
?>