<?php error_reporting(E_ALL && E_NOTICE && E_WARNING); ?>
<?php
include_once("ligacao.php");
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <link rel="shortcut icon" href="imgs/faviconLogo.ico" />
    <title>Cybertech</title>


</head>

<body>

    <?php

    if (!isset($_SESSION['userEmail']) or (!isset($_SESSION['userPasswd']))) {
        include('header.php');
    } else {
        include('header_user.php');
    }
    ?>

    <div class="container mb-5">
        <div class="row mt-3">
            <div class="col">
                <span class="texto-destaques font-25 ml-5"><img src="imgs/barra.webp" height="30px" class="barra"> Serviços </span>
            </div>
        </div>
        <div class="row my-3 text-center justify-content-md-center">
            <div class="col-auto text-white font-22 texto-destaques " style="border-bottom: #00A0B8 solid 2px;">
                Alguns dos nossos serviços incluem:
            </div>

        </div>

        <div class="row mx-5 mt-5 text-white">
            <div class="col-3">
                <div class="row text-center">
                    <div class="col">
                        <img src="imgs/Servicos1.png" height="150px ">
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        Reparação de Computadores
                    </div>
                </div>

            </div>
            <div class="col-3">
                <div class="row text-center">
                    <div class="col">
                        <img src="imgs/Servicos2.png" height="150px">
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        Diagnósticos Gratuitos
                    </div>
                </div>

            </div>
            <div class="col-3">
                <div class="row text-center">
                    <div class="col">
                        <img src="imgs/Servicos3.png" height="150px">
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        Instalações de Redes
                    </div>
                </div>

            </div>
            <div class="col-3">
                <div class="row text-center">
                    <div class="col">
                        <img src="imgs/Servicos4.png" height="150px">
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        Recolha e Entrega de Equipamentos
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container text-white mb-5">
        <div class="row my-3 text-center justify-content-md-center">
            <div class="col-auto text-white font-22 texto-destaques " style="border-bottom: #00A0B8 solid 2px;">
                Fale Connosco
            </div>
        </div>
        <div class="row">

            <div class="col"></div>


                <div class="col-6">
                    <div class="row justify-content-md-center">
                        <div class="col-10">
                            <form>
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="emailServicos" aria-describedby="emailHelp">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nomeServicos">
                                <label class="form-label">Assunto</label>
                                <input type="text" class="form-control" id="assuntoServicos">
                                <label class="form-label">Mensagem</label>
                                <textarea class="form-control  mb-4" rows="5" height="50px" id="Mensagem" name="Texto"></textarea>
                                <input type="submit" class=" btn btn-produtos" value="Enviar">

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col"></div>

            </div>
        </div>
        <?php include "footer.php"; ?>


        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>