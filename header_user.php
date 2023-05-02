<?php
session_start();
?>


<d class="container-fluid-container">
    <nav class="navbar  sticky-top navbar-expand-lg navbar-brand-center">
        <div class="container">
            <ul class="navbar-nav mr-auto mr-0">
                <li class="nav-item mx-2">
                    <div class="dropdown">
                        <button class="btn btn-produtos dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Produtos
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="categorias.php?Categoria='Portáteis'">Portateis</a></li>
                            <li><a class="dropdown-item" href="categorias.php?Categoria='Desktops'">Desktops</a></li>
                            <li><a class="dropdown-item" href="categorias.php?Categoria='Componentes'">Componentes</a></li>
                            <li><a class="dropdown-item" href="categorias.php?Categoria='Smartphones'">Smartphones</a></li>
                            <li><a class="dropdown-item" href="categorias.php?Categoria='Imagem e Som'">Imagem e Som</a></li>
                            <li><a class="dropdown-item" href="categorias.php?Categoria='Periféricos'">Periféricos</a></li>
                            <li><a class="dropdown-item" href="categorias.php?Categoria='Cabos e Acessórios'">Cabos e Acessórios</a></li>
                            <li><a class="dropdown-item" href="categorias.php?Categoria='Consolas'">Consolas</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item mx-2">
                    <a class="btn btn-produtos" href="servicos.php" role="button">Serviços</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="btn btn-produtos" href="contactos.php" role="button">Contactos</a>
                </li>
            </ul>

            <a class="navbar-brand margin-top25" href="https://localhost/Cybertech">
                <img src="imgs/IconLogo.png" alt="logo" width="80" height="80" alt="" />
            </a>
            <ul class="navbar-nav navbar-right  mb-2 mb-lg-0">
                <li class=nav-item mr-2 ml-2>
                    <form class="d-flex form-pesquisa" action="resultadopesquisa.php" method="post" role="search">
                        <input class="form-control me-2" type="search" name="pesquisa" placeholder="Pesquisa" aria-label="Search">
                    </form>
                </li>
                <li class="nav-item mr-2 ml-4">
                    <a class="btn btn-carrinho" href="carrinho.php" role="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#E7F6F2" class="bi bi-cart-fill icon" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <div class="dropdown">
                        <button class="btn btn-carrinho dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-fill icon" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>
                        </button>
                        <ul class="dropdown-menu">
                            <?php
                            if (isset($_SESSION['userEmail']) or (isset($_SESSION['userPasswd']))) {

                                $utilizador = $_SESSION['userEmail'];
                                $passwd = $_SESSION['userPasswd'];
                            
                                $consultaUser =  "SELECT * FROM utilizadores WHERE Email = '$utilizador' and Passwd = '$passwd' LIMIT 1";
                                $resultadoUser = $ligacao->query($consultaUser);
                            
                            
                                if ($resultadoUser->num_rows > 0) {
                                    while ($row = $resultadoUser->fetch_assoc()) {
                                        if ($row["Permissoes"] == 1) {
                                            ?><li><a class="dropdown-item" href="admin.php">Admin</a></li> <?php
                                        }
                                    }
                                }
                            } ?>
                            <li><a class="dropdown-item" href="logout.php" onclick="return confirm('Tem a certeza que quer sair da sua conta?')">Logout</a></li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
    </nav>
</d iv>