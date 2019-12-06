<?php
session_start();
unset($_SESSION['mmnlogin']);
unset($_SESSION['nome']);
session_unset();
session_destroy();
header("Location: login.php");
exit();