<?php include_once("ligacao.php");
session_start();

if (!isset($_SESSION['userEmail']) or (!isset($_SESSION['userPasswd']))) {
    header("Location: login.php");
}

if (isset($_SESSION['userEmail']) or (isset($_SESSION['userPasswd']))) {

    $utilizador = $_SESSION['userEmail'];
    $passwd = $_SESSION['userPasswd'];

    $consultaUser = "SELECT * FROM utilizadores WHERE Email = '$utilizador' and Passwd = '$passwd' LIMIT 1";
    $resultadoUser = $ligacao->query($consultaUser);


    if ($resultadoUser->num_rows > 0) {
        while ($row = $resultadoUser->fetch_assoc()) {
            if ($row["Permissoes"] != 1) {

                header("Location:index.php");
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <link rel="shortcut icon" href="imgs/faviconLogo.ico" />
</head>

<body>
    <?php include 'header_admin.php'; ?>

    <div class="container my-5">
        <div class="row ">
            <div class="d-flex justify-content-center">
                <div class="col-5">
                    <div class="linha"></div>
                </div>

                <div class="mx-5">
                    <p class="font-22 bold">Anúncio 1</p>
                </div>
                <div class="col-5">
                    <div class="linha"></div>
                </div>
            </div>
        </div>
        <div class="row mt-3 mx-1 align-center">
            <?php
            $consultaAnuncio1 = "SELECT * FROM anuncios WHERE local = 1";
            $resultadoAnuncio1 = $ligacao->query($consultaAnuncio1);
            if ($resultadoAnuncio1->num_rows > 0) {
                while ($row = $resultadoAnuncio1->fetch_assoc()) {
                    ?>
                    <a href="./editar_anuncio.php?local=1"><img src="imgs/<?php echo $row["imagem"] ?>"
                            class="banners caixa-index"></a>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <div class="container my-5">
        <div class="row ">
            <div class="d-flex justify-content-center">
                <div class="col-5">
                    <div class="linha"></div>
                </div>

                <div class="mx-5">
                    <p class="font-22 bold">Anúncio 2</p>
                </div>
                <div class="col-5">
                    <div class="linha"></div>
                </div>
            </div>
        </div>
        <div class="row mt-3 mx-1 align-center">
            <?php
            $consultaAnuncio2 = "SELECT * FROM anuncios WHERE local = 2";
            $resultadoAnuncio2 = $ligacao->query($consultaAnuncio2);
            if ($resultadoAnuncio2->num_rows > 0) {
                while ($row = $resultadoAnuncio2->fetch_assoc()) {
                    ?>
                    <a href="./editar_anuncio.php?local=2"><img src="imgs/<?php echo $row["imagem"] ?>"
                            class="banners caixa-index"></a>
                    <?php
                }
            }
            ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>