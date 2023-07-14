<?php error_reporting(E_ALL && E_NOTICE && E_WARNING); ?>
<?php
include_once("ligacao.php");
session_start();

if (isset($_SESSION['userEmail']) or (isset($_SESSION['userPasswd']))) {

    $utilizador = $_SESSION['userEmail'];
    $passwd = $_SESSION['userPasswd'];

    $consultaUser = "SELECT * FROM utilizadores WHERE Email = '$utilizador' and Passwd = '$passwd' LIMIT 1";
    $resultadoUser = $ligacao->query($consultaUser);
    if ($resultadoUser->num_rows > 0) {
        while ($row = $resultadoUser->fetch_assoc()) {
            $Id_utilizador = $row['ID'];
        }
    }
}

if (!isset($_SESSION['userEmail']) or (!isset($_SESSION['userPasswd']))) {
    header("Location: login.php");
}

if (isset($_POST['adicionar'])) {

    $idProduto = $_POST['idProduto'];

    $consultaCarrinho = mysqli_query($ligacao, "SELECT * FROM favoritos WHERE idProduto = '$idProduto'  AND Id_utilizador = '$Id_utilizador'") or die('query failed');

    if (mysqli_num_rows($consultaCarrinho) > 0) {
        mysqli_query($ligacao, "DELETE FROM favoritos WHERE idProduto = '$idProduto' AND Id_utilizador = '$Id_utilizador'") or die('query failed');
        header('location:favoritos.php');
    } else {
        mysqli_query($ligacao, "INSERT INTO favoritos (Id_utilizador, idProduto) VALUES('$Id_utilizador','$idProduto')") or die('query failed');
        $message[] = 'Produto adicionado com sucesso!';
    }
}
;


if (isset($_POST['remover'])) {

    $idProduto = $_POST['idProduto'];

    mysqli_query($ligacao, "DELETE FROM favoritos WHERE idProduto = '$idProduto' AND Id_utilizador = '$Id_utilizador'") or die('query failed');
    header('location:favoritos.php');
}


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

    <?php

    if (!isset($_SESSION['userEmail']) or (!isset($_SESSION['userPasswd']))) {
        include('header.php');
    } else {
        include('header_user.php');
    }

    ?>


    <div class="container my-3">
        <div class="row">
            <div class="col">
                <span class="texto-destaques ml-5"><img src="imgs/barra.webp" height="30px" class="barra">
                    Favoritos</span>
            </div>
        </div>
        <div class="container text-center ">
            <div class="row  ">
                <?php
                $pesquisa = "SELECT * 
                FROM favoritos 
                INNER JOIN utilizadores ON favoritos.id_utilizador = utilizadores.ID
                INNER JOIN produtos ON favoritos.idProduto = produtos.ID
                INNER JOIN carateristicas  ON produtos.ID = carateristicas.IdProduto 
                WHERE utilizadores.ID = '$Id_utilizador'";

                $resultadoDestaques = $ligacao->query($pesquisa);
                if ($resultadoDestaques->num_rows > 0) {
                    while ($row = $resultadoDestaques->fetch_assoc()) {
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
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Z" />
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
                                    <div class="row">
                                        <div class="col-10">
                                            <?php if ($row["Desconto"] == 0) {
                                                ?>

                                                <span class="preco">
                                                    <?php echo $row["Preco"] ?> €
                                                </span><br>
                                                <span style="color:transparent"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-0-circle" viewBox="0 0 16 16">
                                                        <path
                                                            d="M7.988 12.158c-1.851 0-2.941-1.57-2.941-3.99V7.84c0-2.408 1.101-3.996 2.965-3.996 1.857 0 2.935 1.57 2.935 3.996v.328c0 2.408-1.101 3.99-2.959 3.99ZM8 4.951c-1.008 0-1.629 1.09-1.629 2.895v.31c0 1.81.627 2.895 1.629 2.895s1.623-1.09 1.623-2.895v-.31c0-1.8-.621-2.895-1.623-2.895Z" />
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Z" />
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
                                        <div class="col-2">
                                            <form method="post" action="favoritos.php?remover=<?php echo $row['ID']; ?>">
                                                <input type="hidden" name="idProduto" value="<?= $row['ID']; ?>">
                                                <button type="submit" name="remover" value="remover"
                                                    class="btn btn-favoritos btn-favs">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>