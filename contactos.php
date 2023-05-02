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
        <div class="row my-3">
            <div class="col">
                <span class="texto-destaques font-25 ml-5"><img src="imgs/barra.webp" height="30px" class="barra"> Contactos </span>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3600.5302535274536!2d-8.573734384586915!3d40.97691907930407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd247f4ca850adb1%3A0x9e5e187b4ece85bd!2sCol%C3%A9gio%20de%20Lamas!5e1!3m2!1spt-PT!2spt!4v1673190183725!5m2!1spt-PT!2spt" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col">
                <div class="row justify-content-md-center text-white">
                    <div class="col">
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
        </div>
        <div class="row text-white text-center mt-5">
            <div class="col-4">
                <div class="row">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                    </svg>
                </div>
                <div class="row text-center mt-2">
                    <div class="col">
                        apoio@cybertech.pt
                    </div>

                </div>

            </div>
            <div class="col-4">
                <div class="row">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                    </svg>
                </div>
                <div class="row text-center mt-2">
                    <div class="col">
                        935267371<br>
                        221581224
                    </div>
                </div>

            </div>
            <div class="col-4">
                <div class="row">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-map-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.598-.49L10.5.99 5.598.01a.5.5 0 0 0-.196 0l-5 1A.5.5 0 0 0 0 1.5v14a.5.5 0 0 0 .598.49l4.902-.98 4.902.98a.502.502 0 0 0 .196 0l5-1A.5.5 0 0 0 16 14.5V.5zM5 14.09V1.11l.5-.1.5.1v12.98l-.402-.08a.498.498 0 0 0-.196 0L5 14.09zm5 .8V1.91l.402.08a.5.5 0 0 0 .196 0L11 1.91v12.98l-.5.1-.5-.1z" />
                    </svg>
                </div>
                <div class="row text-center mt-2">
                    <div class="col">
                        Rua da Salgueirinha, n.º 325,<br>
                        4535-368 Santa Maria de Lamas

                    </div>

                </div>

            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>