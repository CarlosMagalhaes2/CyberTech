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

$local = $_GET['local'];

if (isset($_POST['submitform'])) {
    $nomeCampanha = $_POST['nomeCampanha'];
    $imagemAntiga = $_POST['ImagemAntiga'];
    $url = $_POST['url'];

    $pasta = "imgs/";
    $imagem = $_FILES['uploadfile']['name'];
    $temp_name = $_FILES['uploadfile']['tmp_name'];

    if ($imagem != "") {
        if (file_exists($pasta . $imagem)) {
            $imagem = time() . '_' . $imagem;
        }
        $fpasta = $pasta . $imagem;
        move_uploaded_file($temp_name, $fpasta);
    } else {
        // Mantém a imagem existente se nenhuma nova imagem for enviada
        $imagem = $imagemAntiga;
    }

    $atualizar = "UPDATE anuncios SET nomeCampanha='$nomeCampanha',imagem='$imagem',url='$url' WHERE local = $local";
    if ($ligacao->query($atualizar) === TRUE) {
        header("Location: anuncios.php");
        die();
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
    <?php include 'header_user.php'; ?>

    <div class="container my-5">
        <?php
        $consultaAnuncio = "SELECT * FROM anuncios WHERE local = $local";
        $resultadoAnuncio = $ligacao->query($consultaAnuncio);
        if ($resultadoAnuncio->num_rows > 0) {
            while ($row = $resultadoAnuncio->fetch_assoc()) {
                ?>
                <div class="row ">
                    <div class="d-flex justify-content-center">
                        <div class="col-6">
                            <div class="linha"></div>
                        </div>

                        <div class="mx-1">
                            <p class="font-22 bold">
                                <?php echo $local ?>
                            </p>
                        </div>
                        <div class="col-6">
                            <div class="linha"></div>
                        </div>
                    </div>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label>Nome da Campanha</label>
                        <input type="text" class="form-nome mb-2" name="nomeCampanha"
                            value="<?php echo $row["nomeCampanha"] ?>">
                    </div>
                    <div class="row mb-3">
                        <label>URL (exemplo:"/categorias.php?Categoria=Portáteis&order=contador:desc")</label>
                        <input type="text" class="form-resto mb-2" name="url" value="<?php echo $row["url"] ?>">
                    </div>
                    <div class="row ">
                        <input type="hidden" class="form-nome mb-2" name="ImagemAntiga" value="<?php echo $row["imagem"] ?>">
                        <label>Imagem da Campanha (imagens 1920x120)</label>
                        <div id="preview"></div>
                        <img class="banners caixa-index" id="imagem-preview" src="imgs/<?php echo $row['imagem']; ?>"
                            alt="Imagem do produto" width="100%" style="margin-top:5px !important">
                        <div class="row d-flex justify-content-center">
                            <input type="file" name="uploadfile" class="form-control upload-btn" onchange="previewImage(this)"
                                accept="image/*">
                        </div>
                        <div class="row mt-3">
                                <div class="col-10"></div>
                                <div class="col"><button type="reset" class="btn btn-primary">Cancelar</button></div>
                                <div class="col"><button type="submit" class="btn btn-primary" name="submitform">Gravar</button></div>
                            </div>

                </form>
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
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('imagem-preview').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>