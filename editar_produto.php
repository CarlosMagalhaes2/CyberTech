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
        <div class="row">

            <?php
            $consultaCategoria = "SELECT * FROM produtos WHERE ID = $ID";
            $resultadoCategoria = $ligacao->query($consultaCategoria);


            if ($resultadoCategoria->num_rows > 0) {
                while ($row = $resultadoCategoria->fetch_assoc()) {
                    ?>
                    <span class="texto-destaques ml-5"><img src="imgs/barra.webp" height="30px" class="barra"> ID do Produto:
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
                    <div class="container text-white bg-azul my-3 mr-1">
                        <div class="row">
                            <div class="col-6 my-3 text-center">
                                <img src="imgs/produtos/<?php echo $row["ImagemPrincipal"] ?>" width="90%" class="border_10px">
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12 mt-2">
                                    
                                        <input type="text" class="form-control mb-4" name="Nome"
                                            value="<?php echo $row["Nome"] ?>">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <?php if ($row["Desconto"] == 0) {
                                        $precoAtual = $row["Preco"];
                                        ?>

                                        <p class="preco-detalhes">
                                            <?php echo $row["Preco"] ?> €
                                        </p>
                                        <?php
                                    } elseif ($row["Desconto"] == 1) {
                                        $precoAtual = $row["Preco"] - $row["ValorDesconto"]
                                            ?>
                                        <span class="preco-desconto-detalhes">
                                            <?php echo $precoAtual ?> € <span
                                                class="badge text-bg-warning-detalhes text-bg-warning">-
                                                <?php echo $row["ValorDesconto"] ?> €
                                            </span>
                                            <p class="preco-riscado">
                                                <?php echo $row["Preco"] ?> €
                                            </p>

                                            <?php
                                    }
                                    ?>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <form method="post" action="carrinho.php?ID=<?= $row['ID']; ?>">
                                            <input type="number" class="quantidade-produtos" name="Quantidade" placeholder="1"
                                                min="1" value="1" max="<?php echo $row["Stock"] ?>" required <?php if ($row["Stock"] == 0) { ?>disabled <?php } ?>>
                                            <?php if ($row["Stock"] != 0) {

                                                ?>
                                                <input type="hidden" name="Imagem" value="<?php echo $row['ImagemPrincipal']; ?>">
                                                <input type="hidden" name="NomeProduto" value="<?= $row['Nome']; ?>">
                                                <input type="hidden" name="StockProduto" value="<?= $row['Stock']; ?>">
                                                <input type="hidden" name="Preco" value="<?= $precoAtual; ?>">
                                                <button type="submit" name="adicionar" value="adicionar"
                                                    class="btn btn-adicionar-carrinho"> <svg xmlns="http://www.w3.org/2000/svg"
                                                        width="26" height="26" fill="currentColor" class="bi bi-cart"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                    </svg>
                                                </button>
                                            </form>
                                            <?php
                                            } else {
                                                ?>
                                            <button type="button" class="btn btn-danger" disabled>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                                                    class="bi bi-x-circle" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                </svg>
                                            </button>
                                            <?php
                                            }
                                            ?>

                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <?php
                                        if ($row["Stock"] <= 3 && $row["Stock"] > 0) {
                                            ?>
                                            <p class="texto-stock-low">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                    class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                </svg> Apenas
                                                <?php echo $row["Stock"] ?> em stock!
                                            </p>
                                            <?php
                                        } elseif ($row["Stock"] == 0) {
                                            ?>
                                            <p class="texto-stock-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                    class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                                </svg> Sem stock!
                                            </p>
                                            <?php
                                        } else {
                                            ?>
                                            <p class="texto-stock">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg> Em stock
                                            </p>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <tbody>
                                        <?php
                                        if ($row["Processador"] != NULL) {
                                            ?>
                                            <td>
                                                <p class="text_white weight_600"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" fill="currentColor" class="bi bi-cpu" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z" />
                                                    </svg>
                                            </td>
                                            <td><span class="text_white">
                                                    <?php echo $row["Processador"] ?>
                                                </span></td>
                                            <?php
                                        }
                                        if ($row["MemoriaRAM"] != NULL) {
                                            ?>
                                            <td>
                                                <p class="text_white weight_600"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" fill="currentColor" class="bi bi-memory" viewBox="0 0 16 16">
                                                        <path
                                                            d="M1 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.586a1 1 0 0 0 .707-.293l.353-.353a.5.5 0 0 1 .708 0l.353.353a1 1 0 0 0 .707.293H15a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H1Zm.5 1h3a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5Zm5 0h3a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5Zm4.5.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-4ZM2 10v2H1v-2h1Zm2 0v2H3v-2h1Zm2 0v2H5v-2h1Zm3 0v2H8v-2h1Zm2 0v2h-1v-2h1Zm2 0v2h-1v-2h1Zm2 0v2h-1v-2h1Z" />
                                                    </svg>
                                            </td>
                                            <td><span class="text_white">
                                                    <?php echo $row["MemoriaRAM"] ?>
                                                </span></td>
                                            <?php
                                        }
                                        if ($row["PlacaGrafica"] != NULL) {
                                            ?>
                                            <td>
                                                <p class="text_white weight_600"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" fill="currentColor" class="bi bi-gpu-card" viewBox="0 0 16 16">
                                                        <path
                                                            d="M4 8a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm7.5-1.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z" />
                                                        <path
                                                            d="M0 1.5A.5.5 0 0 1 .5 1h1a.5.5 0 0 1 .5.5V4h13.5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5H2v2.5a.5.5 0 0 1-1 0V2H.5a.5.5 0 0 1-.5-.5Zm5.5 4a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5ZM9 8a2.5 2.5 0 1 0 5 0 2.5 2.5 0 0 0-5 0Z" />
                                                        <path
                                                            d="M3 12.5h3.5v1a.5.5 0 0 1-.5.5H3.5a.5.5 0 0 1-.5-.5v-1Zm4 1v-1h4v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5Z" />
                                                    </svg>
                                            </td>
                                            <td><span class="text_white">
                                                    <?php echo $row["PlacaGrafica"] ?>
                                                </span></td>

                                            <?php
                                        }
                                        if ($row["Armazenamento"] != NULL) {
                                            ?>
                                            <td>
                                                <p class="text_white weight_600"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" fill="currentColor" class="bi bi-hdd" viewBox="0 0 16 16">
                                                        <path
                                                            d="M4.5 11a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zM3 10.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                                        <path
                                                            d="M16 11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V9.51c0-.418.105-.83.305-1.197l2.472-4.531A1.5 1.5 0 0 1 4.094 3h7.812a1.5 1.5 0 0 1 1.317.782l2.472 4.53c.2.368.305.78.305 1.198V11zM3.655 4.26 1.592 8.043C1.724 8.014 1.86 8 2 8h12c.14 0 .276.014.408.042L12.345 4.26a.5.5 0 0 0-.439-.26H4.094a.5.5 0 0 0-.44.26zM1 10v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1z" />
                                                    </svg>
                                            </td>
                                            <td><span class="text_white">
                                                    <?php echo $row["Armazenamento"] ?>
                                                    <?php if ($row["TipoArmazenamento"] != NULL) {
                                                        echo $row["TipoArmazenamento"];
                                                    } ?>
                                                </span></td>
                                            <?php
                                        }
                                        if ($row["Resolucao"] != NULL) {
                                            ?>
                                            <td>
                                                <p class="text_white weight_600"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" fill="currentColor" class="bi bi-aspect-ratio"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                                                        <path
                                                            d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z" />
                                                    </svg>
                                            </td>
                                            <td><span class="text_white">
                                                    <?php echo $row["Resolucao"] ?>
                                                    <?php if ($row["TamanhoEcra"] != NULL) {
                                                        echo $row["TamanhoEcra"];
                                                    } ?>
                                                </span></td>
                                            <?php
                                        }
                                        if ($row["SistemaOperativo"] != NULL) {
                                            ?>
                                            <td>
                                                <p class="text_white weight_600"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                                        <path
                                                            d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                                    </svg>
                                            </td>
                                            <td><span class="text_white">
                                                    <?php echo $row["SistemaOperativo"] ?>
                                                </span></td>

                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                    </table>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="container bg-azul text-white">
                        <div class="row">
                            <p class="text-white bold texto-descricao font-22">Descrição</p>
                        </div>
                        <p class="text-white">
                            <?php echo $row["Descricao"] ?>
                        </p>

                    </div>
                    <?php
                }
            }
            ?>
            <div class="container text-white mb-5 mt-5">
                <div class="row">
                    <div class="col-12 mb-5">
                        <form action="validar_editar_produto.php" method="POST">
                            <div class="form-group">
                                <label>ID</label>
                                <?php
                                if ($resultado->num_rows > 0) {
                                    while ($row = $resultado->fetch_assoc()) {
                                        ?>
                                        <input type="text" class="form-control mb-4" name="ID" value="<?php echo $row["ID"] ?>"
                                            readonly>

                                        <label>Nome</label>
                                        <input type="text" class="form-control mb-4" name="Nome"
                                            value="<?php echo $row["Nome"] ?>">

                                        <label>Fabricante</label>
                                        <input type="text" class="form-control mb-4" name="Fabricante"
                                            value="<?php echo $row["Fabricante"] ?>">

                                        <label>Preco</label>
                                        <input type="number" class="form-control mb-4" name="Preco"
                                            value="<?php echo $row["Preco"] ?>">

                                        <label>Categoria</label>
                                        <input type="text" class="form-control mb-4" name="Categoria"
                                            value="<?php echo $row["Categoria"] ?>">

                                        <label>Stock</label>
                                        <input type="text" class="form-control mb-4" name="Stock"
                                            value="<?php echo $row["Stock"] ?>">

                                        <label>Resumo das Carateristicas</label>
                                        <textarea class="form-control  mb-4" rows="2"
                                            name="ResumoCategorias"> <?php echo $row["ResumoCategorias"] ?> </textarea>

                                        <label>Desconto <i>[0 Não || 1 Sim]</i></label>
                                        <input type="text" class="form-control mb-4" name="Desconto"
                                            value="<?php echo $row["Desconto"] ?>">

                                        <label>Valor do Desconto <i>[Se não tiver em desconto não preencher]</i></label>
                                        <input type="number" class="form-control  mb-4" name="ValorDesconto"
                                            value="<?php echo $row["ValorDesconto"] ?>">

                                        <label>Destaque <i>[0 Não || 1 Sim]</i></label>
                                        <input type="text" class="form-control mb-4" name="Destaque"
                                            value="<?php echo $row["Destaque"] ?>">

                                        <label>Descrição</label>
                                        <textarea class="form-control  mb-4" rows="20" id="Descricao"
                                            name="Descricao"><?php echo $row["Descricao"] ?></textarea>


                                        <div class="form-group">
                                            <label>Imagem Principal</label>
                                            <P>
                                                <input type="file" name="ImagemPrincipal">
                                        </div>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
</body>

</html>