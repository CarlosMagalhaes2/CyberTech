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
            <div class="col-9">
            <?php
                $consultaCategoria = "SELECT Nome FROM produtos WHERE ID = $ID";
                $resultadoCategoria = $ligacao->query($consultaCategoria);


                if ($resultadoCategoria->num_rows > 0) {
                    while ($row = $resultadoCategoria->fetch_assoc()) {
                ?>
                        <span class="texto-destaques ml-5"><img src="imgs/barra.webp" height="30px" class="barra"> <?php echo $row["Nome"] ?></span> </span>

                <?php
                    }
                }
                ?>
            </div>
            <div class="col-1"></div>
            <div class="col-1">
                <a href="editar_carateristicas.php?ID=<?php echo $ID ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="White" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                </a>
            </div>

            <div class="col-1">
                <a href="inserir_carateristicas.php?ID=<?php echo $ID ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="White" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                </a>
            </div>
        </div >
        <div class="table-responsive mt-3">
            <table class="table-dark table-bordered border-dark ">
                <thead>
                    <tr>
                        <th scope="col">Processador</th>
                        <th scope="col">Memoria Ram</th>
                        <th scope="col">Placa Grafica</th>
                        <th scope="col">Placa Grafica 2</th>
                        <th scope="col">Armazenamento</th>
                        <th scope="col">Tipo de Armazenamento</th>
                        <th scope="col">Resolução</th>
                        <th scope="col">Tamanho do ecrã</th>
                    </tr>
                </thead>
                <tbody class="font-12">
                    <?php
                    if ($resultado->num_rows > 0) {
                        while ($row = $resultado->fetch_assoc()) {
                    ?>
                            <tr>
                                <th class="mx-1">
                                    <?php echo $row['Processador'] ?>
                                </th>
                                <th>
                                    <?php echo $row['MemoriaRAM'] ?>
                                </th>
                                <th>
                                    <?php echo $row['PlacaGrafica'] ?>
                                </th>
                                <th>
                                    <?php echo $row['PlacaGrafica2'] ?>
                                </th>
                                <th>
                                    <?php echo $row['Armazenamento'] ?>
                                </th>
                                <th>
                                    <?php echo $row['TipoArmazenamento'] ?>
                                </th>
                                <th>
                                    <?php echo $row['Resolucao'] ?>
                                </th>
                                <th>
                                    <?php echo $row['TamanhoEcra'] ?>
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