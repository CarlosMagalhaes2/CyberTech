<?php
session_start();
unset(
    $_SESSION['userId'],
    $_SESSION['userNome'],
    $_SESSION['userEmail'],
    $_SESSION['userPasswd']
);
$_SESSION['logout'] = "Logout efetuado com sucesso";
header("Location: login.php");