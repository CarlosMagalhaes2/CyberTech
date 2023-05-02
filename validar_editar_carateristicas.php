<?php 
include_once("ligacao.php");

$ID = $_POST['ID'];
$Processador = $_POST['Processador'];
$MemoriaRAM = $_POST['MemoriaRAM'];
$PlacaGrafica = $_POST['PlacaGrafica'];
$PlacaGrafica2 = $_POST['PlacaGrafica2'];
$Armazenamento = $_POST['Armazenamento'];
$TipoArmazenamento = $_POST['TipoArmazenamento'];
$Resolucao = $_POST['Resolucao'];
$TamanhoEcra = $_POST['TamanhoEcra'];
$SistemaOperativo = $_POST['SistemaOperativo'];

$atualizar = "UPDATE carateristicas SET Processador='$Processador', MemoriaRAM='$MemoriaRAM', PlacaGrafica='$PlacaGrafica', 
PlacaGrafica2='$PlacaGrafica2', Armazenamento='$Armazenamento', TipoArmazenamento='$TipoArmazenamento', Resolucao='$Resolucao', 
TamanhoEcra='$TamanhoEcra', SistemaOperativo='$SistemaOperativo' WHERE IdProduto=$ID";

if ($ligacao->query($atualizar) === TRUE) {
    header("Location: admin.php");
    die();
} else {
    echo "Erro: " . $atualizar . "<br>" . $ligacao->error;
}
?>
