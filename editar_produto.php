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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
        <form action="validar_editar_produto.php" method="POST">
            <div class="row">

                <?php
                $consultaCategoria = "SELECT * FROM produtos WHERE ID = $ID";
                $resultadoCategoria = $ligacao->query($consultaCategoria);


                if ($resultadoCategoria->num_rows > 0) {
                    while ($row = $resultadoCategoria->fetch_assoc()) {
                        ?>
                        <span class="texto-destaques ml-5"><img src="imgs/barra.webp" height="30px" class="barra"> ID do
                            Produto:
                            <?php echo $row["ID"] ?>
                        </span> </span>

                        <?php  
                    }
                }
                ?>
                
                <?php
                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        ?>
                        <input type="text" class="form-control mb-4" style="display:none" name="ID" value="<?php echo $row["ID"] ?>" readonly>
                        <div class="container bg-azul my-3 mr-1">
                            <div class="row">

                                <div class="col-6 my-3 text-center">
                                    <img src="imgs/produtos/<?php echo $row["ImagemPrincipal"] ?>" width="90%"
                                        class="caixa-index border_10px">
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            <label>Nome</label>
                                            <input type="text" class="form-nome mb-2" name="Nome"
                                                value="<?php echo $row["Nome"] ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="label">Preço</label>
                                            <input type="number" min="1" step="any" class="form-preco mb-4" name="Preco"
                                                value="<?php echo $row["Preco"] ?>">
                                        </div>
                                        <div class="col-3">
                                            <fieldset id="desconto">
                                                <p style="margin:0">Em desconto?</p>
                                                <input type="radio" id="html" name="Desconto" value="1" required>
                                                <label for="html">Sim</label><br>
                                                <input type="radio" id="css" name="Desconto" value="0">
                                                <label for="css">Não</label><br>
                                            </fieldset>
                                        </div>
                                        <div class="col-3">
                                            <label class="label">Valor do Desconto</label>
                                            <input type="number" min="0" step="any" class="form-desconto mb-4"
                                                name="ValorDesconto" value="<?php echo $row["ValorDesconto"] ?>">
                                        </div>
                                        <div class="col-3">
                                            <fieldset id="Destaque">
                                                <p style="margin:0">Destacar?</p>
                                                <input type="radio" id="html" name="Destaque" value="1" required>
                                                <label for="html">Sim</label><br>
                                                <input type="radio" id="css" name="Destaque" value="0">
                                                <label for="css">Não</label><br>
                                            </fieldset>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="label">Stock</label>
                                            <input type="number" min="0" class="form-resto" name="Stock"
                                                value="<?php echo $row["Stock"] ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 my-3">
                                            <label>Fabricante</label>
                                            <input type="text" class="form-resto" name="Fabricante"
                                                value="<?php echo $row["Fabricante"] ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="accordion-carateristicas" id="accordionExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseOne" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                        <p class="bold" style="margin-bottom:3px;">Carateristicas</p>
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse show"
                                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <!-----------------------------------------ACCORDION BODY ---------------------------------->
                                                    <div class="accordion-body">
                                                        <div class="row">
                                                            <div class="col-12 mt-2">
                                                                <label>Processador</label>
                                                                <input type="text" class="form-resto" name="Processador"
                                                                    value="<?php echo $row["Processador"] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 mt-2">
                                                                <label>Memoria RAM</label>
                                                                <input type="text" class="form-resto" name="MemoriaRAM"
                                                                    value="<?php echo $row["MemoriaRAM"] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 mt-2">
                                                                <label>Placa Grafica</label>
                                                                <input type="text" class="form-resto" name="PlacaGrafica"
                                                                    value="<?php echo $row["PlacaGrafica"] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 mt-2">
                                                                <label>Placa Grafica Integrada</label>
                                                                <input type="text" class="form-resto" name="PlacaGrafica2"
                                                                    value="<?php echo $row["PlacaGrafica2"] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 mt-2">
                                                                <label>Armazenamento</label>
                                                                <input type="text" class="form-resto" name="Armazenamento"
                                                                    value="<?php echo $row["Armazenamento"] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 mt-2">
                                                                <label>Tipo de Armazenamento</label>
                                                                <input type="text" class="form-resto" name="TipoArmazenamento"
                                                                    value="<?php echo $row["TipoArmazenamento"] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 mt-2">
                                                                <label>Resolucao</label>
                                                                <input type="text" class="form-resto" name="Resolucao"
                                                                    value="<?php echo $row["Resolucao"] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 mt-2">
                                                                <label>Tamanho do Ecra</label>
                                                                <input type="text" class="form-resto" name="TamanhoEcra"
                                                                    value="<?php echo $row["TamanhoEcra"] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 mt-2">
                                                                <label>Sistema Operativo</label>
                                                                <input type="text" class="form-resto" name="SistemaOperativo"
                                                                    value="<?php echo $row["SistemaOperativo"] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="container bg-azul">
                            <div class="row">
                                <p class="bold texto-descricao font-22">Descrição</p>
                            </div>
                            <p>
                                <textarea class="form-control  mb-4" rows="20" id="Descricao"
                                    name="Descricao"><?php echo $row["Descricao"] ?></textarea>
                            </p>

                            <div class="row">
                                <div class="col-10"></div>
                                    <div class="col"><button type="reset" class="btn btn-primary">Cancelar</button></div>
                                    <div class="col"><button type="submit" class="btn btn-primary">Gravar</button></div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </form>
    </div>


    <?php include 'footer.php'; ?>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
</body>

</html>