<?php
session_start();

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
     
     echo 'Área restrita<br>';
     print_r($_SESSION);
}else {
     header("Location: login.php");
}


?>