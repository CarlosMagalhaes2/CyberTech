<?php
error_reporting(E_ALL && E_NOTICE && E_WARNING);
include_once('ligacao.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <link rel="shortcut icon" href="imgs/faviconLogo.ico" />
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <div class="row mt-5 mb-5">

            <div class="col-1"></div>
            <div class="col-4">
                <div class="row">
                    <p class="preco">LOGIN</p>
                </div>
                <div class="row d-sm-flex">
                    <form role="search" action="validarlogin.php" method="post">
                        <div class="form-group mb-3 ">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control mb-3" id="exampleInputEmail1" name="email" placeholder="Enter email" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="passwd" placeholder="Password" required class="form-control">
                            <small id="emailHelp" class="form-text text-muted mb-3">Nunca partilhe a sua password com ninguém.</small>
                            <p>

                                <?php

                                if (isset($_SESSION['Erro'])) {
                                    echo $_SESSION['Erro'];
                                    unset($_SESSION['Erro']);
                                } ?>
                            </p>

                            <p>
                                <?php
                                if (isset($_SESSION['logout'])) {
                                    echo $_SESSION['logout'];
                                    unset($_SESSION['logout']);
                                }
                                ?>
                            </p>

                        </div>


                        <button type="submit" class="btn col-12 text-white" style="background-color: #00A0B8;">Confirmar</button>
                    </form>
                </div>


            </div>
            <div class="col-2 d-flex justify-content-center text-center mt-5">
                <img src="imgs/barraLogin.png" width="10px" height="350px" style="border-radius:10px">
            </div>
            <div class="col-4">
                <div class="row">
                    <p class="preco">CRIAR CONTA</p>
                </div>
                <div class="row d-sm-flex">
                    <form role="search" action="efetuaregisto.php" method="post">
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1">Nome</label>
                            <input class="form-control" id="exampleFormControlTextarea1" name="Nome" rows="1" placeholder="Nome" required class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control mb-3" id="exampleInputEmail1" name="Email" aria-describedby="emailHelp" placeholder="Email" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="Password" placeholder="Password" required class="form-control">
                            <small id="emailHelp" class="form-text text-muted mb-3">Nunca partilhe a sua password com ninguém.</small>
                        </div>
                        <div class="form-check mt-3">
                            <input type="checkbox" class="form-check-input mb-3" id="exampleCheck1" required class="form-check-input">
                            <label class="form-check-label mb-3" for="exampleCheck1" style=" font-size:13px">Li e aceito os Termos e Condições e confirmo que tenho mais de 16 anos de idade.</label>
                        </div>
                        <button type="submit" class="btn col-12 text-white" style="background-color: #00A0B8">Confirmar</button>
                    </form>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </div>





    <?php include 'footer.php' ?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>