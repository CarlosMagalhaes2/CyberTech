<?php
include_once("ligacao.php");

$id = $_GET['ID'];

$apagarCarateristicas = "DELETE FROM carateristicas WHERE IdProduto = $id";
$apagar = "DELETE FROM produtos WHERE ID=$id";

if ($ligacao->query($apagarCarateristicas) === TRUE) {
    if ($ligacao->query($apagar) === TRUE) {
        header("Location: admin.php");
        die();
    } else {
        echo "Erro: " . $apagar . "<br>" . $ligacao->error;
    }
}
