<?php
session_start();
$_SESSION = [];
session_destroy();
setcookie(session_name(), 0, time(), '/');
header('Location: index.php');


?>