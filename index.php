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
    $utilizador = $_SESSION['userEmail'];
    $passwd = $_SESSION['userPasswd'];

    $consultaUser = "SELECT * FROM utilizadores WHERE Email = '$utilizador' and Passwd = '$passwd' LIMIT 1";
    $resultadoUser = $ligacao->query($consultaUser);
    if ($resultadoUser->num_rows > 0) {
      while ($row = $resultadoUser->fetch_assoc()) {
        $Id_utilizador = $row['ID'];
      }
    }
    include('header_user.php');
  }

  ?>

  <!-- Carousel  -->
  <div class="container-fluid-container mb-5">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <?php
          $consultaCarrossel1 = "SELECT * FROM carrossel WHERE local = 1";
          $resultadoCarrossel1 = $ligacao->query($consultaCarrossel1);
          if ($resultadoCarrossel1->num_rows > 0) {
            while ($row = $resultadoCarrossel1->fetch_assoc()) {
              ?>
              <a href=".<?php echo $row["url"]?>">
              <img src="imgs/<?php echo $row["imagem"] ?>" class="d-block w-100" alt="...">
              </a>
            <?php
            }
          }
          ?>
        </div>
        <div class="carousel-item">

        <?php
          $consultaCarrossel2 = "SELECT * FROM carrossel WHERE local = 2";
          $resultadoCarrossel2 = $ligacao->query($consultaCarrossel2);
          if ($resultadoCarrossel2->num_rows > 0) {
            while ($row = $resultadoCarrossel2->fetch_assoc()) {
              ?>
              <a href=".<?php echo $row["url"]?>">
              <img src="imgs/<?php echo $row["imagem"] ?>" class="d-block w-100" alt="...">
              </a>
            <?php
            }
          }
          ?>
        </div>
        <div class="carousel-item">
        <?php
          $consultaCarrossel3 = "SELECT * FROM carrossel WHERE local = 3";
          $resultadoCarrossel3 = $ligacao->query($consultaCarrossel3);
          if ($resultadoCarrossel3->num_rows > 0) {
            while ($row = $resultadoCarrossel3->fetch_assoc()) {
              ?>
              <a href=".<?php echo $row["url"]?>">
              <img src="imgs/<?php echo $row["imagem"] ?>" class="d-block w-100" alt="...">
              </a>
            <?php
            }
          }
          ?>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <div class="container caixa-index text-center">
    <div class="row justify-content-between mx-3">
      <div class="col-lg mt-2">
        <a class="link-quadrados" href="categorias.php?Categoria=Portáteis&order=contador:desc"><img
            src="imgs/icons/laptop.png" width="120px">
          <p>Portáteis</p>
        </a>
      </div>
      <div class="col-lg mt-2">
        <a class="link-quadrados" href="categorias.php?Categoria=Desktops&order=contador:desc"><img
            src="imgs/icons/Desktops.png" width="120px">
          <p>Desktops</p>
        </a>
      </div>
      <div class="col-lg mt-2">
        <a class="link-quadrados" href="categorias.php?Categoria=Componentes&order=contador:desc"><img
            src="imgs/icons/Componentes.png" width="120px">
          <p>Componentes</p>
        </a>
      </div>
      <div class="col-lg mt-2">
        <a class="link-quadrados" href="categorias.php?Categoria=Smartphones&order=contador:desc"><img
            src="imgs/icons/Smartphones.png" width="120px">
          <p>Smartphones</p>
        </a>
      </div>
      <div class="col-lg mt-2">
        <a class="link-quadrados" href="categorias.php?Categoria=Som&order=contador:desc"><img src="imgs/icons/Som.png"
            width="120px">
          <p>Som</p>
        </a>
      </div>
      <div class="col-lg mt-2">
        <a class="link-quadrados" href="categorias.php?Categoria=Imagem&order=contador:desc"><img
            src="imgs/icons/Monitores.png" width="120px">
          <p>Imagem</p>
        </a>
      </div>
      <div class="col-lg mt-2">
        <a class="link-quadrados" href="categorias.php?Categoria=Periféricos&order=contador:desc"><img
            src="imgs/icons/Perifericos.png" width="120px">
          <p>Perifericos</p>
        </a>
      </div>


    </div>
  </div>

  <div class="container">
    <div class="row mt-5">
      <div class="col-9">
        <p class="texto-destaques">
          <span class="texto-destaques ml-5"><img src="imgs/barra.webp" height="30px" class="barra"> Produtos em
            Destaque</span>
        </p>
      </div>
    </div>
  </div>
  <div class="container text-center ">
    <div class="row justify-content-between ">
      <?php
      $destaques = "SELECT * 
      FROM produtos 
      INNER JOIN carateristicas   
      ON produtos.ID = carateristicas.IdProduto 
      WHERE Destaque = 1 
      ORDER BY contador DESC
      LIMIT 4";

      $resultadoDestaques = $ligacao->query($destaques);
      if ($resultadoDestaques->num_rows > 0) {
        while ($row = $resultadoDestaques->fetch_assoc()) {
          $IdProdutoDestaques = $row['ID'];
          ?>
          <div class="card mx-3 text-start d-flex" style="width: 18rem">
            <a href="detalhes.php?ID=<?php echo $row['ID'] ?>">
              <img class="card-img-top" src="imgs/produtos/<?php echo $row["ImagemPrincipal"] ?>" alt="Card image cap">
            </a>
            <div class="card-body align-items-end pb-0">
              <h6 class="card-header card-title text-truncate-2 px-0">
                <a class="card-title" href="detalhes.php?ID=<?php echo $row['ID'] ?>">
                  <?php echo $row["Nome"] ?> <br>
                  <span style="color:transparent"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                      fill="currentColor" class="bi bi-0-circle" viewBox="0 0 16 16">
                      <path
                        d="M7.988 12.158c-1.851 0-2.941-1.57-2.941-3.99V7.84c0-2.408 1.101-3.996 2.965-3.996 1.857 0 2.935 1.57 2.935 3.996v.328c0 2.408-1.101 3.99-2.959 3.99ZM8 4.951c-1.008 0-1.629 1.09-1.629 2.895v.31c0 1.81.627 2.895 1.629 2.895s1.623-1.09 1.623-2.895v-.31c0-1.8-.621-2.895-1.623-2.895Z" />
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Z" />
                    </svg>
                  </span>
              </h6>
              </a>
              <div class="card-text align-items-middle">
                <p class="font-12 text-truncate-2">
                  |
                  <?php
                  echo $row["Fabricante"]; ?> |
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
                  <div class="col-2">
                    <?php
                    $queryFavoritosDestaques = "SELECT * FROM favoritos WHERE id_utilizador = $Id_utilizador AND idProduto = $IdProdutoDestaques";
                    $resultadoFavoritosDestaques = $ligacao->query($queryFavoritosDestaques);
                    if ($resultadoFavoritosDestaques->num_rows > 0) {
                      while ($row = $resultadoFavoritosDestaques->fetch_assoc()) {
                        ?>
                        <a href="apagar_favoritos.php?ID=<?= $IdProdutoDestaques; ?>" class="btn btn-favs-added">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="bi bi-star-fill"
                            viewBox="0 0 16 16">
                            <path
                              d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                          </svg>
                        </a>
                        <?php
                      }
                    } else {
                      ?>
                    <form method="post" action="favoritos.php?ID=<?= $IdProdutoDestaques ?>">
                      <input type="hidden" name="idProduto" value="<?= $IdProdutoDestaques ?>">
                      <button type="submit" name="adicionar" value="adicionar" class="btn btn-favoritos">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="bi bi-star"
                          viewBox="0 0 16 16">
                          <path
                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                        </svg>
                      </button>
                    </form>
                    <?php
                    }
                    ?>
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
  <div class="container">
    <div class="row mt-3 mx-1 align-center">
      <?php
      $consultaAnuncio1 = "SELECT * FROM anuncios WHERE local = 1";
      $resultadoAnuncio1 = $ligacao->query($consultaAnuncio1);
      if ($resultadoAnuncio1->num_rows > 0) {
        while ($row = $resultadoAnuncio1->fetch_assoc()) {
          ?>
          <a href=".<?php echo $row["url"] ?>"><img src="imgs/<?php echo $row["imagem"] ?>" class="banners caixa-index"></a>
          <?php
        }
      }
      ?>
    </div>
  </div>
  <!------------------------------------------------- PROMOÇÕES ------------------------------------------------>
  <div class="container mt-3">
    <div class="row mx-1">
      <p class="texto-destaques">
        <span class="texto-destaques ml-5"><img src="imgs/barra.webp" height="30px" class="barra"> Promoções</span>
      </p>
    </div>
  </div>
  <div class="container text-center">
    <div class="row justify-content-between ">

      <?php
      $descontos = "SELECT * 
      FROM produtos 
      INNER JOIN carateristicas   
      ON produtos.ID = carateristicas.IdProduto 
      WHERE Desconto = 1 LIMIT 4";

      $resultadoDescontos = $ligacao->query($descontos);
      if ($resultadoDescontos->num_rows > 0) {
        while ($row = $resultadoDescontos->fetch_assoc()) {
          $IdProdutoDescontos = $row['ID'];
          ?>
          <div class="card mx-3 text-start d-flex" style="width: 18rem;">
            <a href="detalhes.php?ID=<?php echo $row['ID'] ?>">
              <img class="card-img-top" src="imgs/produtos/<?php echo $row["ImagemPrincipal"] ?>" alt="Card image cap">
            </a>
            <div class="card-body align-items-end pb-0">
              <h6 class="card-header card-title text-truncate-2 px-0">
                <a class="card-title" href="detalhes.php?ID=<?php echo $row['ID'] ?>">
                  <?php echo $row["Nome"] ?> <br>
                  <span style="color:transparent"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                      fill="currentColor" class="bi bi-0-circle" viewBox="0 0 16 16">
                      <path
                        d="M7.988 12.158c-1.851 0-2.941-1.57-2.941-3.99V7.84c0-2.408 1.101-3.996 2.965-3.996 1.857 0 2.935 1.57 2.935 3.996v.328c0 2.408-1.101 3.99-2.959 3.99ZM8 4.951c-1.008 0-1.629 1.09-1.629 2.895v.31c0 1.81.627 2.895 1.629 2.895s1.623-1.09 1.623-2.895v-.31c0-1.8-.621-2.895-1.623-2.895Z" />
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Z" />
                    </svg>
                  </span>
              </h6>
              </a>
              <div class="card-text align-items-middle">
                <p class="font-12 text-truncate-2">
                  |
                  <?php
                  echo $row["Fabricante"]; ?> |
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
                  <div class="col-2">
                    <?php
                    $queryFavoritosDescontos = "SELECT * FROM favoritos WHERE id_utilizador = $Id_utilizador AND idProduto = $IdProdutoDescontos";
                    $resultadoFavoritosDescontos = $ligacao->query($queryFavoritosDescontos);
                    if ($resultadoFavoritosDescontos->num_rows > 0) {
                      while ($row = $resultadoFavoritosDescontos->fetch_assoc()) {
                        ?>
                        <a href="apagar_favoritos.php?ID=<?= $IdProdutoDescontos; ?>" class="btn btn-favs-added">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="bi bi-star-fill"
                            viewBox="0 0 16 16">
                            <path
                              d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                          </svg>
                        </a>
                        <?php
                      }
                    } else {
                      ?>
                    <form method="post" action="favoritos.php?ID=<?= $IdProdutoDescontos ?>">
                      <input type="hidden" name="idProduto" value="<?= $IdProdutoDescontos ?>">
                      <button type="submit" name="adicionar" value="adicionar" class="btn btn-favoritos">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="bi bi-star"
                          viewBox="0 0 16 16">
                          <path
                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                        </svg>
                      </button>
                    </form>
                    <?php
                    }
                    ?>
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
  <div class="container">
    <div class="row mt-3 mx-1 align-center">
      <?php
      $consultaAnuncio2 = "SELECT * FROM anuncios WHERE local = 2";
      $resultadoAnuncio2 = $ligacao->query($consultaAnuncio2);
      if ($resultadoAnuncio2->num_rows > 0) {
        while ($row = $resultadoAnuncio2->fetch_assoc()) {
          ?>
          <a href=".<?php echo $row["url"] ?>"><img src="imgs/<?php echo $row["imagem"] ?>" class="banners caixa-index"></a>
          <?php
        }
      }
      ?>
    </div>
  </div>
  <!------------------------------------------------- NOVIDADES ------------------------------------------------>
  <div class="container mt-3">
    <div class="row mx-1">
      <p class="texto-destaques">
        <span class="texto-destaques ml-5"><img src="imgs/barra.webp" height="30px" class="barra"> Novidades</span>
      </p>
    </div>
  </div>
  <div class="container text-center">
    <div class="row justify-content-between ">

      <?php
      $novidades = "SELECT * 
      FROM produtos 
      INNER JOIN carateristicas   
      ON produtos.ID = carateristicas.IdProduto
      ORDER BY ID DESC
      LIMIT 4";
      $resultadoNovidades = $ligacao->query($novidades);
      if ($resultadoNovidades->num_rows > 0) {
        while ($row = $resultadoNovidades->fetch_assoc()) {
          $IdProdutoNovidades = $row['ID'];
          ?>
          <div class="card mx-3 text-start d-flex" style="width: 18rem;">
            <a href="detalhes.php?ID=<?php echo $row['ID'] ?>">
              <img class="card-img-top" src="imgs/produtos/<?php echo $row["ImagemPrincipal"] ?>" alt="Card image cap">
            </a>
            <div class="card-body align-items-end pb-0">
              <h6 class="card-header card-title text-truncate-2 px-0">
                <a class="card-title" href="detalhes.php?ID=<?php echo $row['ID'] ?>">
                  <?php echo $row["Nome"] ?> <br>
                  <span style="color:transparent"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                      fill="currentColor" class="bi bi-0-circle" viewBox="0 0 16 16">
                      <path
                        d="M7.988 12.158c-1.851 0-2.941-1.57-2.941-3.99V7.84c0-2.408 1.101-3.996 2.965-3.996 1.857 0 2.935 1.57 2.935 3.996v.328c0 2.408-1.101 3.99-2.959 3.99ZM8 4.951c-1.008 0-1.629 1.09-1.629 2.895v.31c0 1.81.627 2.895 1.629 2.895s1.623-1.09 1.623-2.895v-.31c0-1.8-.621-2.895-1.623-2.895Z" />
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Z" />
                    </svg>
                  </span>
              </h6>
              </a>
              <div class="card-text align-items-middle">
                <p class="font-12 text-truncate-2">
                  |
                  <?php
                  echo $row["Fabricante"]; ?> |
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
                  <div class="col-2">
                    <?php
                    $queryFavoritosNovidades = "SELECT * FROM favoritos WHERE id_utilizador = $Id_utilizador AND idProduto = $IdProdutoNovidades";
                    $resultadoFavoritosNovidades = $ligacao->query($queryFavoritosNovidades);
                    if ($resultadoFavoritosNovidades->num_rows > 0) {
                      while ($row = $resultadoFavoritosNovidades->fetch_assoc()) {
                        ?>
                        <a href="apagar_favoritos.php?ID=<?= $IdProdutoNovidades; ?>" class="btn btn-favs-added">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="bi bi-star-fill"
                            viewBox="0 0 16 16">
                            <path
                              d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                          </svg>
                        </a>
                        <?php
                      }
                    } else {
                      ?>
                    <form method="post" action="favoritos.php?ID=<?= $IdProdutoNovidades ?>">
                      <input type="hidden" name="idProduto" value="<?= $IdProdutoNovidades ?>">
                      <button type="submit" name="adicionar" value="adicionar" class="btn btn-favoritos">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="bi bi-star"
                          viewBox="0 0 16 16">
                          <path
                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                        </svg>
                      </button>
                    </form>
                    <?php
                    }
                    ?>
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
  <?php include "footer.php"; ?>


  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>