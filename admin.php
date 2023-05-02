<?php include_once("ligacao.php");
session_start();

if (!isset($_SESSION['userEmail']) or (!isset($_SESSION['userPasswd']))) {
    header("Location: login.php");
}

if (isset($_SESSION['userEmail']) or (isset($_SESSION['userPasswd']))) {

    $utilizador = $_SESSION['userEmail'];
    $passwd = $_SESSION['userPasswd'];

    $consultaUser =  "SELECT * FROM utilizadores WHERE Email = '$utilizador' and Passwd = '$passwd' LIMIT 1";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <link rel="shortcut icon" href="imgs/faviconLogo.ico" />
</head>

<body>
    <?php include 'header_admin.php'; ?>

    <?php

    $consulta = "SELECT * FROM produtos";
    $resultado = $ligacao->query($consulta);

    ?>
    <div class="container mt-5 mb-5">
        <div class="row">
            <table class="table-dark table-bordered border-dark ">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">ID</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Fabricante</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Carateristicas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($resultado->num_rows > 0) {
                        while ($row = $resultado->fetch_assoc()) {
                    ?>
                            <tr>
                                <th width="20px">
                                    <a href='apagar_produto.php?ID=<?php echo $row['ID'] ?>'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg></a>
                                </th>
                                <th width="40px">
                                    <a href='editar_produto.php?ID=<?php echo $row['ID'] ?>'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg></a>
                                </th>
                                <th>
                                    <?php echo $row['ID'] ?>
                                </th>
                                <th width="110px">
                                    <a href="detalhes.php?ID=<?php echo $row['ID'] ?>">
                                        <img src="imgs/produtos/<?php echo $row['ImagemPrincipal'] ?>" alt="..." class="img-fluid img-thumbnail m-1" width="100px">
                                    </a>
                                </th>
                                <th class="align-top">
                                    <a class="text-white" href="detalhes.php?ID=<?php echo $row['ID'] ?>">
                                        <?php echo $row['Nome'] ?>
                                    </a>
                                </th>
                                <th class="align-top">
                                    <?php echo $row['Fabricante'] ?>
                                </th>
                                <th class="align-top">
                                    <?php echo $row['Categoria'] ?>
                                </th>
                                <th class="align-top" width="120px">
                                    <?php echo $row['Preco'] ?> €
                                </th>
                                <th class="align-top">
                                    <?php echo $row['Stock'] ?>
                                </th>
                                <th class="align-top">
                                    <a href="carateristicas.php?ID=<?php echo $row['ID'] ?>">Carateristicas</a>
                                </th>
                            </tr>


                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>