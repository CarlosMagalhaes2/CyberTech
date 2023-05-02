<?php
include_once("ligacao.php");

$nome = $_POST['Nome'];
$email = $_POST['Email'];
$password = $_POST['Passwd'];

$inserir = "INSERT INTO utilizadores (Nome, Email, Passwd) VALUES ('$nome', '$email', '$password')";

if ($ligacao->query($inserir) === TRUE){
    header("Location: login.php");
    die();
} else{
    echo "Erro: " . $inserir . "<br>" . $ligacao->error;
}
?>