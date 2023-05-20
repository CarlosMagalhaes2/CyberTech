<?php
include_once("ligacao.php");

$ID = $_POST['ID'];
$Nome = $_POST['Nome'];
$Fabricante = $_POST['Fabricante'];
$Preco = $_POST['Preco'];
$Stock = $_POST['Stock'];
$Desconto = $_POST['Desconto'];
$ValorDesconto = $_POST['ValorDesconto'];
$Destaque = $_POST['Destaque'];
$Descricao = $_POST['Descricao'];
// $ImagemPrincipal = $_POST['ImagemPrincipal'];
$Processador = $_POST['Processador'];
$MemoriaRAM = $_POST['MemoriaRAM'];
$PlacaGrafica = $_POST['PlacaGrafica'];
$PlacaGrafica2 = $_POST['PlacaGrafica2'];
$Armazenamento = $_POST['Armazenamento'];
$TipoArmazenamento = $_POST['TipoArmazenamento'];
$Resolucao = $_POST['Resolucao'];
$TamanhoEcra = $_POST['TamanhoEcra'];
$SistemaOperativo = $_POST['SistemaOperativo'];



if($ValorDesconto === null or $ValorDesconto === 0){
    $ValorDesconto = null;
}


$atualizar = "UPDATE produtos SET Nome='$Nome', Fabricante='$Fabricante', Preco='$Preco', Stock='$Stock', Desconto='$Desconto', 
ValorDesconto='$ValorDesconto', Destaque='$Destaque', Descricao='$Descricao' WHERE ID=$ID";

$atualizarCarateristicas = "UPDATE carateristicas SET Processador='$Processador', MemoriaRAM='$MemoriaRAM', PlacaGrafica='$PlacaGrafica', 
PlacaGrafica2='$PlacaGrafica2', Armazenamento='$Armazenamento', TipoArmazenamento='$TipoArmazenamento', Resolucao='$Resolucao', 
TamanhoEcra='$TamanhoEcra', SistemaOperativo='$SistemaOperativo' WHERE IdProduto=$ID";

if ($ligacao->query($atualizar) === TRUE and $ligacao->query($atualizarCarateristicas) === TRUE) {
    header("Location: admin.php");
    die();
} else {
    echo "Erro: " . $atualizar . "<br>" . $ligacao->error;
}