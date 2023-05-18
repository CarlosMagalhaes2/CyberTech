<?php include_once("ligacao.php");
session_start();


if (!isset($_SESSION['userEmail']) or (!isset($_SESSION['userPasswd']))) {
    header("Location: login.php");
}
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

    <script src="tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#Descricao',
            language: 'pt_BR',
            menubar: false,
            branding: false,
            toolbar: 'undo redo | bold italic underline strikethrough | fontsize | ltr rtl',
            toolbar_sticky: true,

        });
    </script>

</head>

<body>
    <?php include 'header_admin.php'; ?>

    <?php

    $ID = $_GET['ID'];
    $consulta = "SELECT * FROM produtos  
    INNER JOIN carateristicas   
    ON produtos.ID = carateristicas.IdProduto 
    WHERE ID = $ID";
    $resultado = $ligacao->query($consulta);

    ?>
    <div class="container mt-5 mb-5">
        <div class="row">

            <?php
            $consultaCategoria = "SELECT * FROM produtos WHERE ID = $ID";
            $resultadoCategoria = $ligacao->query($consultaCategoria);


            if ($resultadoCategoria->num_rows > 0) {
                while ($row = $resultadoCategoria->fetch_assoc()) {
            ?>
                    <span class="texto-destaques ml-5"><img src="imgs/barra.webp" height="30px" class="barra"> ID do Produto : <?php echo $row["ID"] ?> -> <?php echo $row["Nome"] ?></span> </span>

            <?php
                }
            }
            ?>

            <div class="container text-white mb-5 mt-5">
                <div class="row">
                    <div class="col-12 mb-5">
                        <form action="validar_editar_carateristicas.php" method="POST">
                            <div class="form-group">
                                <?php
                                if ($resultado->num_rows > 0) {
                                    while ($row = $resultado->fetch_assoc()) {
                                ?>
                                        <input type="text" class="form-control mb-4" name="ID" value="<?php echo $row["ID"] ?>" HIDDEN>
                                        
                                        <label>Processador</label>
                                        <input type="text" class="form-control mb-4" name="Processador" value="<?php echo $row["Processador"] ?>">

                                        <label>Memoria RAM</label>
                                        <input type="text" class="form-control mb-4" name="MemoriaRAM" value="<?php echo $row["MemoriaRAM"] ?>">

                                        <label>Placa Grafica 1</label>
                                        <input type="text" class="form-control mb-4" name="PlacaGrafica" value="<?php echo $row["PlacaGrafica"] ?>">

                                        <label>Placa Grafica 2</label>
                                        <input type="text" class="form-control mb-4" name="PlacaGrafica2" value="<?php echo $row["PlacaGrafica2"] ?>">

                                        <label>Armazenamento</label>
                                        <input type="text" class="form-control  mb-4" name="Armazenamento" value=" <?php echo $row["Armazenamento"] ?>">

                                        <label>Tipo de Armazenamento</label>
                                        <input type="text" class="form-control mb-4" name="TipoArmazenamento" value="<?php echo $row["TipoArmazenamento"] ?>">

                                        <label>Resolucao</label>
                                        <input type="text" class="form-control mb-4" name="Resolucao" value="<?php echo $row["Resolucao"] ?>">

                                        <label> Tamanho do Ecra</label>
                                        <input type="text" class="form-control mb-4" name="TamanhoEcra" value="<?php echo $row["TamanhoEcra"] ?>">

                                        <label>Sistema Operativo</label>
                                        <input type="text" class="form-control mb-4" name="SistemaOperativo" value="<?php echo $row["SistemaOperativo"] ?>">

                                        <button type="reset" class="btn btn-primary">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Gravar</button>
                            </div>


                        </form>
                <?php }
                                } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include 'footer.php'; ?>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>