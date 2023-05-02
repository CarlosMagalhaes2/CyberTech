<?php
include_once("ligacao.php");



$ID = $_POST['ID'];
$Nome = $_POST['Nome'];
$Fabricante = $_POST['Fabricante'];
$Preco = $_POST['Preco'];
$Categoria = $_POST['Categoria'];
$Stock = $_POST['Stock'];
$ResumoCategorias = $_POST['ResumoCategorias'];
$Desconto = $_POST['Desconto'];
$ValorDesconto = $_POST['ValorDesconto'];
$Destaque = $_POST['Destaque'];
$Descricao = $_POST['Descricao'];
$ImagemPrincipal = $_POST['ImagemPrincipal'];



$resultado = $ligacao->query("SELECT * FROM produtos WHERE ID = $ID");
if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {

if ($ImagemPrincipal == NULL){
    $ImagemPrincipal = $row['ImagemPrincipal'];
}


}}



$atualizar = "UPDATE produtos SET Nome='$Nome', Fabricante='$Fabricante', Preco='$Preco', 
Categoria='$Categoria', Stock='$Stock', ResumoCategorias='$ResumoCategorias', Desconto='$Desconto', 
ValorDesconto='$ValorDesconto', Destaque='$Destaque', Descricao='$Descricao', ImagemPrincipal='$ImagemPrincipal' WHERE ID=$ID";

if ($ligacao->query($atualizar) === TRUE) {
    header("Location: admin.php");
    die();
} else {
    echo "Erro: " . $atualizar . "<br>" . $ligacao->error;
}
