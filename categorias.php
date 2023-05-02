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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">

  <link rel="shortcut icon" href="imgs/faviconLogo.ico" />
  <title>Cybertech</title>

</head>

<body>

  <?php include "header.php"; ?>

  <div class="container ">
    <div class="row mt-3">

      <?php
      $Categoria = $_GET['Categoria'];
      $consulta = "SELECT * FROM produtos
      where Categoria = $Categoria";

      $consultaCategoria = "SELECT Categoria FROM produtos 
      where Categoria = $Categoria
      LIMIT 1";

      $resultado = $ligacao->query($consulta);

      $resultadoCategoria = $ligacao->query($consultaCategoria);


      if ($resultadoCategoria->num_rows > 0) {
        while ($row = $resultadoCategoria->fetch_assoc()) {
      ?>
          <span class="texto-destaques ml-5"><img src="imgs/barra.webp" height="30px" class="barra"> <?php echo $row["Categoria"] ?></span>

      <?php
        }
      }
      ?>
    </div>

    <div class="row mt-2">
      
        <?php

        if ($resultado->num_rows > 0) {
          while ($row = $resultado->fetch_assoc()) {
        ?>
            <div class="card text-white bg-dark mx-3 mb-3 text-start d-flex" style="width: 18rem;">
            <a href="detalhes.php?ID=<?php echo $row['ID'] ?>">
              <img class="card-img-top" src="imgs/produtos/<?php echo $row["ImagemPrincipal"] ?>" alt="Card image cap">
            </a>
            <div class="card-body align-items-end pb-0">
              <h6 class="card-header text-truncate-2 px-0"><?php echo $row["Nome"] ?>  <br>
                  <span style="color:transparent"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-0-circle" viewBox="0 0 16 16">
                      <path d="M7.988 12.158c-1.851 0-2.941-1.57-2.941-3.99V7.84c0-2.408 1.101-3.996 2.965-3.996 1.857 0 2.935 1.57 2.935 3.996v.328c0 2.408-1.101 3.99-2.959 3.99ZM8 4.951c-1.008 0-1.629 1.09-1.629 2.895v.31c0 1.81.627 2.895 1.629 2.895s1.623-1.09 1.623-2.895v-.31c0-1.8-.621-2.895-1.623-2.895Z" />
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Z" />
                    </svg>
                  </span>  </h6>
              <div class="card-text align-items-middle">
                <p class="font-12 text-truncate-2"><?php echo $row["ResumoCategorias"] ?></p>
              </div>
            </div>
            <div class="card-footer align-items-end justify-content-end pt-0 pb-0">
              <div class="card-text">
                <?php if ($row["Desconto"] == 0) {
                ?>
                  <span class="preco"><?php echo $row["Preco"] ?> €</span><br>
                  <span style="color:transparent"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-0-circle" viewBox="0 0 16 16">
                      <path d="M7.988 12.158c-1.851 0-2.941-1.57-2.941-3.99V7.84c0-2.408 1.101-3.996 2.965-3.996 1.857 0 2.935 1.57 2.935 3.996v.328c0 2.408-1.101 3.99-2.959 3.99ZM8 4.951c-1.008 0-1.629 1.09-1.629 2.895v.31c0 1.81.627 2.895 1.629 2.895s1.623-1.09 1.623-2.895v-.31c0-1.8-.621-2.895-1.623-2.895Z" />
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Z" />
                    </svg>
                  </span>
                <?php
                } elseif ($row["Desconto"] == 1) {
                  $precoDesconto = $row["Preco"] - $row["ValorDesconto"]
                ?>
                  <span class="preco-desconto mt-n3"> <?php echo $precoDesconto ?> € </span> <span class="badge text-bg-warning">-<?php echo $row["ValorDesconto"] ?> €</span>
                  <p class="preco-riscado"> <?php echo $row["Preco"] ?> €</p>

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
  <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</body>

</html>