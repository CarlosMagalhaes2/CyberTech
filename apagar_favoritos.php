<?php
include_once("ligacao.php");

session_start();

if (isset($_SESSION['userEmail']) or (isset($_SESSION['userPasswd']))) {

    $utilizador = $_SESSION['userEmail'];
    $passwd = $_SESSION['userPasswd'];

    $consultaUser = "SELECT * FROM utilizadores WHERE Email = '$utilizador' and Passwd = '$passwd' LIMIT 1";
    $resultadoUser = $ligacao->query($consultaUser);
    if ($resultadoUser->num_rows > 0) {
        while ($row = $resultadoUser->fetch_assoc()) {
            $Id_utilizador = $row['ID'];
        }
    }
}

$id = $_GET['ID'];


$apagar = "DELETE FROM favoritos WHERE idProduto=$id AND id_utilizador=$Id_utilizador";

if ($ligacao->query($apagar) === TRUE) {
    header("Location: index.php");
    die();
} else {
    echo "Erro: " . $apagar . "<br>" . $ligacao->error;
}