<?php error_reporting(E_ALL && E_NOTICE && E_WARNING);
include_once("ligacao.php");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <link rel="shortcut icon" href="imgs/faviconLogo.ico" />
    <title>Cybertech</title>

</head>

<body>

    <?php include "header.php"; ?>

    <div class="container ">
        <div class="row my-3">
            <div class="col-9">
                <?php
                $Categoria = $_GET['Categoria'];
                $ordem = $_GET['order'];
                $partes = explode(':', $ordem);
                $selecao = $partes[0];
                $orientacao = $partes[1];

                $consulta = "SELECT * FROM produtos
                INNER JOIN carateristicas   
                ON produtos.ID = carateristicas.IdProduto 
                where Categoria = '$Categoria' AND Desconto = 1
                ORDER BY ";

                $consulta .= "$selecao $orientacao";

                $resultado = $ligacao->query($consulta);

                ?>

                <span class="texto-destaques ml-5"><img src="imgs/barra.webp" height="30px" class="barra">
                    <?php echo $Categoria;
                    if ($Categoria == null) {
                        echo ("Produtos");
                    } ?> em Promoção!
                </span>
            </div>
            <div class="col">
                <label>Ordenar por:</label>
                <select class="select-ordem" id="productOrder">
                    <option value="contador:desc">Relevância</option>
                    <option value="Preco:asc">Preço mais baixo</option>
                    <option value="Preco:desc">Preço mais alto</option>
                    <option value="Nome:asc">Nome (Ascendente)</option>
                    <option value="Nome:desc">Nome (Descendente)</option>
                </select>
            </div>

        </div>

        <div class="row mt-2">

            <?php

            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    ?>
                    <div class="card m-3 text-start d-flex" style="width: 18rem">
                        <a href="detalhes.php?ID=<?php echo $row['ID'] ?>">
                            <img class="card-img-top" src="imgs/produtos/<?php echo $row["ImagemPrincipal"] ?>"
                                alt="Card image cap">
                        </a>
                        <div class="card-body align-items-end pb-0">
                            <h6 class="card-header card-title text-truncate-2 px-0">
                                <a class="card-title" href="detalhes.php?ID=<?php echo $row['ID'] ?>">
                                    <?php echo $row["Nome"] ?> <br>
                                    <span style="color:transparent"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-0-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M7.988 12.158c-1.851 0-2.941-1.57-2.941-3.99V7.84c0-2.408 1.101-3.996 2.965-3.996 1.857 0 2.935 1.57 2.935 3.996v.328c0 2.408-1.101 3.99-2.959 3.99ZM8 4.951c-1.008 0-1.629 1.09-1.629 2.895v.31c0 1.81.627 2.895 1.629 2.895s1.623-1.09 1.623-2.895v-.31c0-1.8-.621-2.895-1.623-2.895Z" />
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Z" />
                                        </svg>
                                    </span>
                            </h6>
                            </a>
                            <div class="card-text align-items-middle">
                                <p class="font-12 text-truncate-2">
                                    <?php
                                    if ($row["Processador"] != NULL) {
                                        echo $row["Processador"]; ?> |
                                        <?php
                                    }
                                    if ($row["MemoriaRAM"] != NULL) {
                                        echo $row["MemoriaRAM"]; ?> |
                                        <?php
                                    }
                                    if ($row["PlacaGrafica"] != NULL) {
                                        echo $row["PlacaGrafica"]; ?> |
                                        <?php
                                    }
                                    if ($row["PlacaGrafica2"] != NULL) {
                                        echo $row["PlacaGrafica2"]; ?> |
                                        <?php
                                    }
                                    if ($row["Armazenamento"] != NULL) {
                                        echo $row["Armazenamento"]; ?> |
                                        <?php
                                    }
                                    if ($row["TipoArmazenamento"] != NULL) {
                                        echo $row["TipoArmazenamento"]; ?> |
                                        <?php
                                    }
                                    if ($row["Resolucao"] != NULL) {
                                        echo $row["Resolucao"]; ?> |
                                        <?php
                                    }
                                    if ($row["TamanhoEcra"] != NULL) {
                                        echo $row["TamanhoEcra"]; ?> |
                                        <?php
                                    }
                                    if ($row["SistemaOperativo"] != NULL) {
                                        echo $row["SistemaOperativo"]; ?> |
                                        <?php
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="card-footer align-items-end justify-content-end pt-0 pb-0">
                            <div class="card-text">
                                <?php if ($row["Desconto"] == 0) {
                                    ?>

                                    <span class="preco">
                                        <?php echo $row["Preco"] ?> €
                                    </span><br>
                                    <span style="color:transparent"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-0-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M7.988 12.158c-1.851 0-2.941-1.57-2.941-3.99V7.84c0-2.408 1.101-3.996 2.965-3.996 1.857 0 2.935 1.57 2.935 3.996v.328c0 2.408-1.101 3.99-2.959 3.99ZM8 4.951c-1.008 0-1.629 1.09-1.629 2.895v.31c0 1.81.627 2.895 1.629 2.895s1.623-1.09 1.623-2.895v-.31c0-1.8-.621-2.895-1.623-2.895Z" />
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Z" />
                                        </svg>
                                    </span>

                                    <?php
                                } elseif ($row["Desconto"] == 1) {
                                    $preco_desconto = $row["Preco"] - $row["ValorDesconto"]
                                        ?>
                                    <span class="preco-desconto mt-n3">
                                        <?php echo $preco_desconto ?> €
                                    </span><span class="badge text-bg-warning">-
                                        <?php echo $row["ValorDesconto"] ?> €
                                    </span>
                                    <p class="preco-riscado">
                                        <?php echo $row["Preco"] ?> €
                                    </p>

                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            }
            ?>
        </div>
    </div>
    </div>
    </div>

    <?php include "footer.php"; ?>
    <!-- JavaScript Bundle with Popper -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var selectElement = document.getElementById('productOrder');
            var currentUrl = window.location.href;
            var orderParam = getUrlParam('order');

            // Set the selected option based on the orderParam
            if (orderParam) {
                for (var i = 0; i < selectElement.options.length; i++) {
                    if (selectElement.options[i].value === orderParam) {
                        selectElement.options[i].selected = true;
                        break;
                    }
                }
            }

            // Update the URL when the select value changes
            selectElement.addEventListener('change', function () {
                var order = this.value;
                var updatedUrl = updateUrlParam(currentUrl, 'order', order);
                window.location.href = updatedUrl;
            });

            // Helper function to get URL parameter value
            function getUrlParam(param) {
                var urlParams = new URLSearchParams(window.location.search);
                return urlParams.get(param);
            }

            // Helper function to update URL parameter value
            function updateUrlParam(url, param, value) {
                var urlParams = new URLSearchParams(window.location.search);
                urlParams.set(param, value);
                return url.split('?')[0] + '?' + urlParams.toString();
            }
        });
    </script>


</body>

</html>