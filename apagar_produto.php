<?php
include_once("ligacao.php");

$id = $_GET['ID'];
$apagar = "DELETE FROM produtos WHERE ID=$id";
$apagarCarateristicas = "DELETE FROM carateristicas WHERE IdProduto = $id";


if ($ligacao->query($apagar) === TRUE) {
    if ($ligacao->query($apagarCarateristicas) === TRUE) {
        header("Location: admin.php");
        die();
    } else {
        echo "Erro: " . $apagar . "<br>" . $ligacao->error;
    }
}
