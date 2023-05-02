<?php

$servername="localhost";
$username="root";
$password="";
$dbname="cybertech";

$ligacao = new mysqli($servername, $username, $password, $dbname);

mysqli_set_charset($ligacao, 'utf8');
/*
if($ligacao->connect_error){
    die("A ligação falhou!".$ligacao->connect_error);
}
else{
    echo("Ligação ok!");
}
*/
?>