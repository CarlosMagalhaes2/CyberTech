<?php include_once("ligacao.php");
session_start();

if (!isset($_SESSION['userEmail']) or (!isset($_SESSION['userPasswd']))) {
    header("Location: login.php");
}

if (isset($_POST['submitform'])) {
    $IdCategoria = $_POST['IdProduto'];
    $IdProduto = $_POST['IdProduto'];
    $NomeProduto = $_POST['NomeProduto'];
    $Processador = $_POST['Processador'];
    $MemoriaRAM = $_POST['MemoriaRAM'];
    $PlacaGrafica = $_POST['PlacaGrafica'];
    $PlacaGrafica2 = $_POST['PlacaGrafica2'];
    $Armazenamento = $_POST['Armazenamento'];
    $TipoArmazenamento = $_POST['TipoArmazenamento'];
    $Resolucao = $_POST['Resolucao'];
    $TamanhoEcra = $_POST['TamanhoEcra'];
    $SistemaOperativo = $_POST['SistemaOperativo'];

    $inserir = "INSERT INTO carateristicas SET IdCategoria='$IdCategoria', IdProduto='$IdProduto', NomeProduto='$NomeProduto', Processador='$Processador', 
    MemoriaRAM='$MemoriaRAM', PlacaGrafica='$PlacaGrafica', PlacaGrafica2='$PlacaGrafica2', Armazenamento='$Armazenamento', 
    TipoArmazenamento='$TipoArmazenamento', Resolucao='$Resolucao', TamanhoEcra='$TamanhoEcra', SistemaOperativo='$SistemaOperativo'";

    

    if ($ligacao->query($inserir) === TRUE) {

        header("Location: admin.php");

        die();
    } else {
        echo "Erro: " . $inserir . "<br>", $ligacao->$error;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <link rel="shortcut icon" href="imgs/faviconLogo.ico" />

</head>

<body>
    <?php include 'header_admin.php'; ?>
    <?php

    $ID = $_GET['ID'];
    $consulta = "SELECT * FROM produtos  
    WHERE ID = $ID";
    $resultado = $ligacao->query($consulta);

    ?>

    <div class="container mt-5 mb-5">
        <div class="row">

            <span class="texto-destaques ml-5"><img src="imgs/barra.webp" height="30px" class="barra"> Inserir Carateristicas</span>

            <div class="container text-white mb-5 mt-5">
                <div class="row">
                    <div class="col-12 mb-5">
                        <?php
                        if ($resultado->num_rows > 0) {
                            while ($row = $resultado->fetch_assoc()) { ?>
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">

                                        <label>Nome do Produto</label>
                                        <input type="text" class="form-control mb-4" name="NomeProduto" value="<?php echo $row["Nome"] ?>" readonly>

                                        <label>ID do Produto</label>
                                        <input type="text" class="form-control mb-4" name="IdProduto" value="<?php echo $row["ID"] ?>" readonly>

                                        <label>Processador</label>
                                        <input type="text" class="form-control mb-4" name="Processador" value="">

                                        <label>Memoria RAM</label>
                                        <input type="text" class="form-control mb-4" name="MemoriaRAM" value="">

                                        <label>Placa Gráfica</label>
                                        <input type="text" class="form-control mb-4" name="PlacaGrafica" value="">

                                        <label>Placa Gráfica 2</label>
                                        <input type="text" class="form-control mb-4" name="PlacaGrafica2" value="">

                                        <label>Armazenamento</label>
                                        <input type="text" class="form-control mb-4" name="Armazenamento" value="">

                                        <label>Tipo de Armazenamento</label>
                                        <input type="text" class="form-control  mb-4" name="TipoArmazenamento" value="">

                                        <label>Resolução</label>
                                        <input type="text" class="form-control mb-4" name="Resolucao" value="">

                                        <label>Tamanho do Ecrã</label>
                                        <input type="text" class="form-control  mb-4" name="TamanhoEcra" value="">

                                        <label>Sistema Operativo</label>
                                        <input type="text" class="form-control  mb-4" name="SistemaOperativo" value="">

                                        <button type="reset" class="btn btn-primary">Cancelar</button>
                                        <button type="submit" class="btn btn-primary" name="submitform">Gravar</button>
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