<?php
error_reporting(E_ALL && E_NOTICE && E_WARNING);
include_once('ligacao.php');
session_start();


if ((isset($_POST['email'])) && (isset($_POST['passwd']))) {

    $utilizador = mysqli_real_escape_string($ligacao, $_POST['email']);
    $passwd = mysqli_real_escape_string($ligacao, $_POST['passwd']);

    $resultado_utilizador = "SELECT * FROM utilizadores WHERE Email = '$utilizador' and Passwd = '$passwd' LIMIT 1"; 

    $resultado_utilizador = mysqli_query($ligacao, $resultado_utilizador);
    $resultado = mysqli_fetch_assoc($resultado_utilizador);
    if(isset($resultado)){
        if($resultado['Permissoes'] == 1){
            $_SESSION['userId'] = $resultado['ID'];
            $_SESSION['userNome'] = $resultado['Nome'];
            $_SESSION['userEmail'] = $resultado['Email'];
            $_SESSION['userPasswd'] = $resultado['Passwd'];
            header("Location: admin.php");
        }
        else{
            $_SESSION['userId'] = $resultado['ID'];
            $_SESSION['userNome'] = $resultado['Nome'];
            $_SESSION['userEmail'] = $resultado['Email'];
            $_SESSION['userPasswd'] = $resultado['Passwd'];
            header("Location: index.php");
        }
    }
    else{
        $_SESSION['Erro'] = "Utilizador ou password Inválida";
        header("Location: login.php"); 
    }
} else {
    $_SESSION['Erro'] = "Utilizador ou password Inválida";
        header("Location: login.php"); 
}




?>