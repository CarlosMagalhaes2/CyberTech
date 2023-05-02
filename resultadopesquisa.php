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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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

  <div class="container mt-3">
    <div class="container">
      <div class="row mb-3">
        <div class="col">
          <span class="texto-destaques"><img src="imgs/barra.webp" height="30px" class="barra"> Resultados da Pesquisa</span>
        </div>
      </div>
    </div>
    <div class="container text-center">
      <div class="row justify-content-start mb">
        <?php
        $pesquisa = $_POST['pesquisa'];
        $resultadoPesquisa = "SELECT * FROM produtos WHERE Nome LIKE '%$pesquisa%'";
        $resultadoPesquisa = $ligacao->query($resultadoPesquisa);

        if ($resultadoPesquisa->num_rows > 0) {
          while ($row = $resultadoPesquisa->fetch_assoc()) {
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




  <!--Footer-->
  <?php include "footer.php"; ?>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>