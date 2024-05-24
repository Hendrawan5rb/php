<?php
setcookie('identifier', '', time() - 36000, '/');
setcookie('login', '', time() - 36000, '/');

session_start();
// $_SESSION[];
session_unset();
session_destroy();

header("Location: /auth/login.php");
