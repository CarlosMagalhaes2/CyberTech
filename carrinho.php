<?php error_reporting(E_ALL && E_NOTICE && E_WARNING); ?>
<?php
include_once("ligacao.php");
session_start();

if (isset($_SESSION['userEmail']) or (isset($_SESSION['userPasswd']))) {

    $utilizador = $_SESSION['userEmail'];
    $passwd = $_SESSION['userPasswd'];

    $consultaUser =  "SELECT * FROM utilizadores WHERE Email = '$utilizador' and Passwd = '$passwd' LIMIT 1";
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

    $Nome = $_POST['NomeProduto'];
    $Preco = $_POST['Preco'];
    $Imagem = $_POST['Imagem'];
    $Quantidade = $_POST['Quantidade'];
    $StockProduto = $_POST['StockProduto'];

    $consultaCarrinho = mysqli_query($ligacao, "SELECT * FROM carrinho WHERE Nome = '$Nome' AND Id_utilizador = '$Id_utilizador'") or die('query failed');

    if (mysqli_num_rows($consultaCarrinho) > 0) {
        $message[] = 'Produto já se encontra no carrinho!';
    } else {
        mysqli_query($ligacao, "INSERT INTO carrinho (Id_utilizador, Nome, Preco, Imagem, Quantidade, StockProduto) VALUES('$Id_utilizador', '$Nome', '$Preco', '$Imagem', '$Quantidade', '$StockProduto')") 
        or die('query failed');
        $message[] = 'Produto adicionado com sucesso!';
    }
};

if (isset($_POST['update_carrinho'])) {
    $atualizar_quantidade = $_POST['Quantidade_carrinho'];
    $atualizar_carrinho = $_POST['Id_carrinho'];
    mysqli_query($ligacao, "UPDATE carrinho SET Quantidade = '$atualizar_quantidade' WHERE ID = '$atualizar_carrinho'") or die('query failed');
    $message[] = 'Quantidade atualizada com sucesso';
}

if (isset($_GET['remover'])) {
    $remover_id = $_GET['remover'];

    mysqli_query($ligacao, "DELETE FROM carrinho WHERE ID = '$remover_id'") or die('query failed');
    header('location:carrinho.php');
}

if (isset($_GET['apagar_tudo'])) {
    mysqli_query($ligacao, "DELETE FROM carrinho WHERE Id_utilizador = '$Id_utilizador'") or die('query failed');
    header('location:carrinho.php');
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

    if (isset($message)) {
        foreach ($message as $message) {
            echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
        }
    }
    ?>


    <div class="container my-3">
        <div class="row">
            <div class="col">
                <span class="texto-destaques ml-5"><img src="imgs/barra.webp" height="30px" class="barra"> Carrinho de Compras</span>
            </div>
        </div>
        <div class="row">
            <div class="col-9">

                <div class="container my-3">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table bg-azul">
                                <thead>
                                    <th scope="col">Produto</th>
                                    <th scope="col">Detalhes</th>
                                    <th scope="col">Preco</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Total</th>
                                </thead>
                                <?php
                                $consulta = "SELECT * FROM carrinho WHERE id_utilizador = '$Id_utilizador'";
                                $resultado = $ligacao->query($consulta);

                                if ($resultado->num_rows > 0) {
                                    while ($row = $resultado->fetch_assoc()) {

                                        $Total = $row['Preco'] * $row['Quantidade'];
                                ?>
                                        <tr class="my-2 align-middle">
                                            <th class="mx-1">
                                                <img src="imgs/produtos/<?php echo $row['Imagem'] ?> " class="border_10px
                                        ." width="100px">
                                            </th>
                                            <th class="mx-1" width="300px">
                                                <?php echo $row['Nome'] ?>
                                            </th>
                                            <th class="mx-1">
                                                <?php echo $row['Preco'] ?> €
                                            </th>
                                            <th class="mx-1">

                                                <form action="" method="post">
                                                    <input type="hidden" name="Id_carrinho" value="<?php echo $row['ID']; ?>">
                                                    <input type="number" min="1" class="form_atualizar_carrinho" name="Quantidade_carrinho" max="<?php echo $row["StockProduto"] ?>" value="<?php echo $row['Quantidade']; ?>">
                                                    <label class="btn">
                                                        <input type="submit" name="update_carrinho" value="" class="option-btn ml-1 " hidden>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#00A0B8" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                                            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                                                        </svg>
                                                    </label>
                                                </form>
                                            </th>
                                            <th class="mx-1">
                                                <?php echo number_format($Total, 2) ?> €
                                            </th>
                                            <th class="text-center">
                                                <a href="carrinho.php?remover=<?php echo $row['ID']; ?>" class="delete-btn link-quadrados" onclick="return confirm('Remover item do carrinho?');">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                                    </svg>
                                                </a>
                                            </th>

                                        </tr>
                                        <?php
                                        $Total_compra += $Total;
                                        ?>


                                <?php

                                    }
                                }
                                $IVA = $Total_compra * 0.23;
                                if ($Total_compra > 300) {
                                    $portes = 0;
                                } else {
                                    $portes = 4.50;
                                }
                                $ValorFinal = $Total_compra + $portes;
                                ?>
                                <tr>
                                    <th colspan="2"> <a href="index.php" class="link-quadrados"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                                            </svg>
                                            Continuar a comprar
                                        </a>
                                    </th>

                                    <th></th>
                                    <th></th>
                                    <th class="" colspan="2">
                                        <a href="carrinho.php?apagar_tudo" onclick="return confirm('Apagar todos os items do carrinho?');" class="delete-btn link-quadrados"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                            </svg>
                                            Limpar Carrinho
                                        </a>
                                    </th>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="container bg-azul  my-3">
                    <div class="row">
                        <div class="col">
                            <p class="texto-destaques TituloResumo">Resumo da Compra</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">

                            <p class="bold">Produtos:<span class="ValoresResumo"> <?php echo $Total_compra ?> € </span></p>
                            <p class="bold">IVA(23%):<span class="ValoresResumo"> <?php echo number_format($IVA, 2) ?> € </span></p>
                            <p class="bold">Portes:<span class="ValoresResumo"> <?php echo number_format($portes, 2) ?> € </span></p>
                            <p class="bold">Total:<span class="ValoresResumo"> <?php echo number_format($ValorFinal, 2) ?> € </span></p>
                            <p><a href="#" class="btn btn-produtos <?php echo ($Total_compra > 1) ? '' : 'disabled'; ?>">Finalizar Compra</a></p>

                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>