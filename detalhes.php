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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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

    $utilizador = $_SESSION['userEmail'];
    $passwd = $_SESSION['userPasswd'];

    $consultaUser = "SELECT * FROM utilizadores WHERE Email = '$utilizador' and Passwd = '$passwd' LIMIT 1";
    $resultadoUser = $ligacao->query($consultaUser);
    if ($resultadoUser->num_rows > 0) {
        while ($row = $resultadoUser->fetch_assoc()) {
            $Id_utilizador = $row['ID'];
        }
    }

    ?>

    <?php
    $ID = $_GET['ID'];
    $consulta = "SELECT * FROM produtos  
    INNER JOIN carateristicas   
    ON produtos.ID = carateristicas.IdProduto 
    where ID = $ID";

    $resultado = $ligacao->query($consulta);
    ?>


    <?php
    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $IdProduto = $row['ID'];
            $contador = $row['contador'] + 1;
            $categoria = $row['Categoria'];
            $subCategoria = $row['SubCategoria'];
            $nomeProduto = $row['Nome'];
            mysqli_query($ligacao, "UPDATE produtos set contador = $contador WHERE ID = $IdProduto") or die('query failed');


            if (isset($_SESSION['userEmail']) or (isset($_SESSION['userPasswd']))) {
                $consultaUserEditar = "SELECT * FROM utilizadores WHERE Email = '$utilizador' and Passwd = '$passwd' LIMIT 1";
                $resultadoUserEditar = $ligacao->query($consultaUserEditar);
                if ($resultadoUserEditar->num_rows > 0) {
                    while ($rowuser = $resultadoUserEditar->fetch_assoc()) {
                        if ($rowuser["Permissoes"] == 1) {

                            ?>
                            <div class="container d-flex justify-content-end">
                                <a class="btn  btn-editar-disabled " href='/CyberTech/editar_produto.php?ID=<?php echo $row['ID'] ?>'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg>
                                    Este produto foi visto
                                    <?php echo $contador ?> vezes!
                                </a>
                                <a class="btn btn-editar mx-5" href='/CyberTech/editar_produto.php?ID=<?php echo $row['ID'] ?>'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                    Editar
                                </a>
                                <a class="btn btn-danger" href='./apagar_produto.php?ID=<?php echo $row['ID'] ?>'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd"
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg> Eliminar
                                </a>
                            </div>
                            <?php
                        }
                    }
                }
            }

            ?>

            <div class="container">
                <div class="row mt-3">
                    <span class="texto-destaques ml-5"><img src="imgs/barra.webp" height="30px" class="barra">
                        <a class="link-quadrados"
                            href="./categorias.php?Categoria=<?php echo $categoria ?>&order=contador:desc"> <?php echo $categoria ?> </a> >
                <a class="link-quadrados"
                    href="./subCategorias.php?Categoria=<?php echo $categoria ?>&SubCategoria=<?php echo $subCategoria ?>&order=contador:desc">
                    <?php echo $subCategoria ?> </a> >
                <?php echo $nomeProduto ?>
            </span>

        </div>
    </div>
    <div class="container  bg-azul my-3 mr-1">


        <div class="row">
            <div class="col-6 my-3 text-center">
                <div class="container-imagem">
                    <img src="imgs/produtos/<?php echo $row["ImagemPrincipal"] ?>" width="90%"
                        class="caixa-index border_10px">
                    <?php
                    $queryFavoritos = "SELECT * FROM favoritos WHERE id_utilizador = $Id_utilizador AND idProduto = $IdProduto";
                    $resultadoFavoritos = $ligacao->query($queryFavoritos);
                    if ($resultadoFavoritos->num_rows > 0) {
                        while ($rowFavs = $resultadoFavoritos->fetch_assoc()) {
                            ?>
                            <a href="apagar_favoritos.php?ID=<?= $IdProduto; ?>" class="btn btn-imagens btn-favs-added">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="bi bi-star-fill"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            </a>
                            <?php
                        }
                    } else {
                        ?>
                    <form method="post" action="favoritos.php?ID=<?= $IdProduto ?>">
                        <input type="hidden" name="idProduto" value="<?= $IdProduto ?>">
                        <button type="submit" name="adicionar" value="adicionar" class="btn btn-imagens btn-favoritos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="bi bi-star"
                                viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </button>
                    </form>
                    <?php
                    }
                    ?>

                        </div>

                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12 mt-2">
                                <p class="texto-nome">
                            <?php echo $row["Nome"] ?>
                        </p>
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
                                    <?php echo $precoAtual ?> € <span class="badge text-bg-warning-detalhes text-bg-warning">-
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
                            <input type="number" class="quantidade-produtos" name="Quantidade" placeholder="1" min="1"
                                value="1" max="<?php echo $row["Stock"] ?>" required <?php if ($row["Stock"] == 0) { ?>disabled <?php } ?>>
                            <?php if ($row["Stock"] != 0) {

                                ?>
                                <input type="hidden" name="Imagem" value="<?php echo $row['ImagemPrincipal']; ?>">
                                <input type="hidden" name="NomeProduto" value="<?= $row['Nome']; ?>">
                                <input type="hidden" name="StockProduto" value="<?= $row['Stock']; ?>">
                                <input type="hidden" name="Preco" value="<?= $precoAtual; ?>">
                                <button type="submit" name="adicionar" value="adicionar" class="btn btn-adicionar-carrinho">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                                        class="bi bi-cart" viewBox="0 0 16 16">
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
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
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
                                <p class=" weight_600"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-cpu" viewBox="0 0 16 16">
                                        <path
                                            d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z" />
                                    </svg>
                            </td>
                            <td><span class="">
                                    <?php echo $row["Processador"] ?>
                                </span></td>
                            <?php
                        }
                        if ($row["MemoriaRAM"] != NULL) {
                            ?>
                                <td>
                                    <p class=" weight_600"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-memory" viewBox="0 0 16 16">
                                            <path
                                                d="M1 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.586a1 1 0 0 0 .707-.293l.353-.353a.5.5 0 0 1 .708 0l.353.353a1 1 0 0 0 .707.293H15a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H1Zm.5 1h3a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5Zm5 0h3a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5Zm4.5.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-4ZM2 10v2H1v-2h1Zm2 0v2H3v-2h1Zm2 0v2H5v-2h1Zm3 0v2H8v-2h1Zm2 0v2h-1v-2h1Zm2 0v2h-1v-2h1Zm2 0v2h-1v-2h1Z" />
                                        </svg>
                                </td>
                                <td><span class="">
                                        <?php echo $row["MemoriaRAM"] ?>
                                    </span></td>
                                <?php
                        }
                        if ($row["PlacaGrafica"] != NULL) {
                            ?>
                                    <td>
                                        <p class=" weight_600"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-gpu-card" viewBox="0 0 16 16">
                                                <path
                                                    d="M4 8a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm7.5-1.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z" />
                                                <path
                                                    d="M0 1.5A.5.5 0 0 1 .5 1h1a.5.5 0 0 1 .5.5V4h13.5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5H2v2.5a.5.5 0 0 1-1 0V2H.5a.5.5 0 0 1-.5-.5Zm5.5 4a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5ZM9 8a2.5 2.5 0 1 0 5 0 2.5 2.5 0 0 0-5 0Z" />
                                                <path
                                                    d="M3 12.5h3.5v1a.5.5 0 0 1-.5.5H3.5a.5.5 0 0 1-.5-.5v-1Zm4 1v-1h4v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5Z" />
                                            </svg>
                                    </td>
                                    <td><span class="">
                                            <?php echo $row["PlacaGrafica"] ?>
                                        </span></td>

                                    <?php
                        }
                        if ($row["Armazenamento"] != NULL) {
                            ?>
                                    <td>
                                        <p class=" weight_600"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-hdd" viewBox="0 0 16 16">
                                                <path
                                                    d="M4.5 11a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zM3 10.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                                <path
                                                    d="M16 11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V9.51c0-.418.105-.83.305-1.197l2.472-4.531A1.5 1.5 0 0 1 4.094 3h7.812a1.5 1.5 0 0 1 1.317.782l2.472 4.53c.2.368.305.78.305 1.198V11zM3.655 4.26 1.592 8.043C1.724 8.014 1.86 8 2 8h12c.14 0 .276.014.408.042L12.345 4.26a.5.5 0 0 0-.439-.26H4.094a.5.5 0 0 0-.44.26zM1 10v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1z" />
                                            </svg>
                                    </td>
                                    <td><span class="">
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
                                        <p class=" weight_600"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-aspect-ratio" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                                                <path
                                                    d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z" />
                                            </svg>
                                    </td>
                                    <td><span class="">
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
                                        <p class=" weight_600"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                                <path
                                                    d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                            </svg>
                                    </td>
                                    <td><span class="">
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

    <div class="container bg-azul ">
        <div class="row">
            <p class="bold texto-descricao font-22">Descrição</p>
        </div>

        <p>
            <?php echo $row["Descricao"] ?>
        </p>

    </div>
    <?php
        }
    }
    ?>

    <?php include 'footer.php' ?>
    <!-- JavaScript Bundle with Popper -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>