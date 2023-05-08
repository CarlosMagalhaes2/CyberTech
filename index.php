<?php error_reporting(E_ALL && E_NOTICE && E_WARNING); ?>
<?php
include_once("ligacao.php");
session_start();
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
  ?>

  <!-- Carousel  -->
  <div class="container-fluid-container mb-5">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="imgs/slider1.webp" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="imgs/slider2.webp" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="imgs/slider3.webp" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <div class="container-fluid caixa-index text-center">
    <div class="row justify-content-between mx-3">
      <div class="col-lg mt-2">
        <a class="link-quadrados" href="categorias.php?Categoria='Portáteis'"><img src="imgs/icons/laptop.png" width="120px">
          <p>Portáteis</p>
        </a>
      </div>
      <div class="col-lg mt-2">
        <a class="link-quadrados" href="categorias.php?Categoria='Portáteis'"><img src="imgs/icons/Desktops.png" width="120px">
          <p>Desktops</p>
        </a>
      </div>
      <div class="col-lg mt-2">
        <a class="link-quadrados" href="categorias.php?Categoria='Portáteis'"><img src="imgs/icons/Componentes.png" width="120px">
          <p>Componentes</p>
        </a>
      </div>
      <div class="col-lg mt-2">
        <a class="link-quadrados" href="categorias.php?Categoria='Portáteis'"><img src="imgs/icons/Smartphones.png" width="120px">
          <p>Smartphones</p>
        </a>
      </div>
      <div class="col-lg mt-2">
        <a class="link-quadrados" href="categorias.php?Categoria='Portáteis'"><img src="imgs/icons/Monitores.png" width="120px">
          <p>Imagem e som</p>
        </a>
      </div>
      <div class="col-lg mt-2">
        <a class="link-quadrados" href="categorias.php?Categoria='Portáteis'"><img src="imgs/icons/Perifericos.png" width="120px">
          <p>Perifericos</p>
        </a>
      </div>
      <div class="col-lg mt-2">
        <a class="link-quadrados" href="categorias.php?Categoria='Portáteis'"><img src="imgs/icons/Cabos.png" width="120px">
          <p>Cabos e Acessórios</p>
        </a>
      </div>
      <div class="col-lg mt-2">
        <a class="link-quadrados" href="categorias.php?Categoria='Portáteis'"><img src="imgs/icons/Consolas.png" width="120px">
          <p>Consolas</p>
        </a>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row mt-5">
      <p class="texto-destaques">
        <span class="texto-destaques ml-5"><img src="imgs/barra.webp" height="30px" class="barra"> Produtos em Destaque</span>
      </p>
    </div>
  </div>
  <div class="container-fluid text-center">
    <div class="row justify-content-center">

      <?php
      $destaques = "SELECT * 
      FROM produtos 
      WHERE Destaque = 1 LIMIT 4";

      $resultadoDestaques = $ligacao->query($destaques);
      if ($resultadoDestaques->num_rows > 0) {
        while ($row = $resultadoDestaques->fetch_assoc()) {
      ?>


          <div class="card mx-3 text-start d-flex" style="width: 18rem;">
            <a href="detalhes.php?ID=<?php echo $row['id'] ?>">
              <img class="card-img-top" src="imgs/produtos/<?php echo $row["foto_principal"] ?>" alt="Card image cap">
            </a>
            <div class="card-body align-items-end pb-0">
              <h6 class="card-header card-title text-truncate-2 px-0"><?php echo $row["nome"] ?> <br>
                  <span style="color:transparent"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-0-circle" viewBox="0 0 16 16">
                      <path d="M7.988 12.158c-1.851 0-2.941-1.57-2.941-3.99V7.84c0-2.408 1.101-3.996 2.965-3.996 1.857 0 2.935 1.57 2.935 3.996v.328c0 2.408-1.101 3.99-2.959 3.99ZM8 4.951c-1.008 0-1.629 1.09-1.629 2.895v.31c0 1.81.627 2.895 1.629 2.895s1.623-1.09 1.623-2.895v-.31c0-1.8-.621-2.895-1.623-2.895Z" />
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Z" />
                    </svg>
                  </span> </h6>
              <div class="card-text align-items-middle">
                <p class="font-12 text-truncate-2"><?php echo $row["resumo_produto"] ?></p>
              </div>
            </div>
            <div class="card-footer align-items-end justify-content-end pt-0 pb-0">
              <div class="card-text">
                <?php if ($row["desconto"] == 0) {
                ?>

                  <span class="preco"><?php echo $row["preco"] ?> €</span><br>
                  <span style="color:transparent"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-0-circle" viewBox="0 0 16 16">
                      <path d="M7.988 12.158c-1.851 0-2.941-1.57-2.941-3.99V7.84c0-2.408 1.101-3.996 2.965-3.996 1.857 0 2.935 1.57 2.935 3.996v.328c0 2.408-1.101 3.99-2.959 3.99ZM8 4.951c-1.008 0-1.629 1.09-1.629 2.895v.31c0 1.81.627 2.895 1.629 2.895s1.623-1.09 1.623-2.895v-.31c0-1.8-.621-2.895-1.623-2.895Z" />
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Z" />
                    </svg>
                  </span>

                <?php
                } elseif ($row["desconto"] == 1) {
                  $preco_desconto = $row["preco"] - $row["valor_desconto"]
                ?>
                  <span class="preco-desconto mt-n3"> <?php echo $preco_desconto ?> € </span><span class="badge text-bg-warning">-<?php echo $row["valor_desconto"] ?> €</span>
                  <p class="preco-riscado"> <?php echo $row["preco"] ?> €</p>

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
  <div class="container-fluid">
    <div class="row mt-3 mx-1 align-center">
      <img src="imgs/banner1.webp" width="1400px" style="  border-radius: 25px; padding: 20px;">
    </div>
  </div>
  <div class="container mt-3">
    <div class="row mx-1">
      <p class="texto-destaques">
        <span class="texto-destaques ml-5"><img src="imgs/barra.webp" height="30px" class="barra"> Promoções</span>
      </p>
    </div>
  </div>
  <div class="container text-center">
    <div class="row justify-content-center ">

      <?php
      $descontos = "SELECT * 
    FROM produtos
    WHERE Desconto = 1 LIMIT 4";
      $resultadoDescontos = $ligacao->query($descontos);
      if ($resultadoDescontos->num_rows > 0) {
        while ($row = $resultadoDescontos->fetch_assoc()) {
      ?>
          <div class="card text-white bg-dark mx-3 text-start d-flex" style="width: 18rem;">
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
  <div class="container">
    <div class="row mt-3 mx-1 align-center">
      <img src="imgs/banner2.webp" width="1400px" style="  border-radius: 25px; padding: 20px;">
    </div>
  </div>
  <div class="container mt-3">
    <div class="row mx-1">
      <p class="texto-destaques">
        <span class="texto-destaques ml-5"><img src="imgs/barra.webp" height="30px" class="barra"> Novidades</span>
      </p>
    </div>
  </div>
  <div class="container text-center">
    <div class="row justify-content-center ">

      <?php
      $novidades = "SELECT * 
    FROM produtos
    ORDER BY ID DESC
    LIMIT 4";
      $resultadoNovidades = $ligacao->query($novidades);
      if ($resultadoNovidades->num_rows > 0) {
        while ($row = $resultadoNovidades->fetch_assoc()) {
      ?>
          <div class="card text-white bg-dark mx-3 text-start d-flex" style="width: 18rem;">
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
  <?php include "footer.php"; ?>


  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>