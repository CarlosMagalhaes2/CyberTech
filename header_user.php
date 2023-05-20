<?php
session_start();
?>
<div class="offcanvas offcanvas-start" id="demo">
    <div class="offcanvas-header">
        <a class="navbar-brand mx-3" href="/CyberTech">
            <img src="imgs/IconLogo2White.png" alt="logo" height="55" alt="" />
        </a>
        <button type="button" data-bs-theme="dark" class="btn-close btn-close-white text-reset"
            data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <div class="accordion accordion-flush" id="menu">
            <!-- Portateis -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed tamanho-user" type="button" data-bs-toggle="collapse"
                        data-bs-target="#Portateis" aria-expanded="false" aria-controls="Portateis">
                        <img src="imgs/icons/laptopSemCirculo.png" width="35px" class="pd-5"> Portáteis
                    </button>
                </h2>
                <div id="Portateis" class="accordion-collapse collapse" data-bs-parent="#menu">
                    <div class="accordion-body">
                        <ul class="dropdown">
                            <li><a class="dropdown-item" href="#">Portáteis Windows</a></li>
                            <li><a class="dropdown-item" href="#">Portáteis Apple</a></li>
                            <li><a class="dropdown-item" href="#">Todos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Desktops -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed tamanho-user" type="button" data-bs-toggle="collapse"
                        data-bs-target="#Desktops" aria-expanded="false" aria-controls="Desktops">
                        <img src="imgs/icons/DesktopsSemCirculo.png" width="35px" class="pd-5"> Desktops
                    </button>
                </h2>
                <div id="Desktops" class="accordion-collapse collapse" data-bs-parent="#menu">
                    <div class="accordion-body">
                        <ul class="dropdown">
                            <li><a class="dropdown-item" href="#">Desktops Gaming</a></li>
                            <li><a class="dropdown-item" href="#">Workstations</a></li>
                            <li><a class="dropdown-item" href="#">Computadores All-in-one</a></li>
                            <li><a class="dropdown-item" href="#">Todos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Componentes -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed tamanho-user" type="button" data-bs-toggle="collapse"
                        data-bs-target="#Componentes" aria-expanded="false" aria-controls="Componentes">
                        <img src="imgs/icons/ComponentesSemCirculo.png" width="35px" class="pd-5"> Componentes
                    </button>
                </h2>
                <div id="Componentes" class="accordion-collapse collapse" data-bs-parent="#menu">
                    <div class="accordion-body">
                        <ul class="dropdown">
                            <li><a class="dropdown-item" href="#">Portáteis Windows</a></li>
                            <li><a class="dropdown-item" href="#">Portáteis Apple</a></li>
                            <li><a class="dropdown-item" href="#">Todos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Smartphones -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed tamanho-user" type="button" data-bs-toggle="collapse"
                        data-bs-target="#Smartphones" aria-expanded="false" aria-controls="Smartphones">
                        <img src="imgs/icons/SmartphonesSemCirculo.png" width="35px" class="pd-5"> Smartphones
                    </button>
                </h2>
                <div id="Smartphones" class="accordion-collapse collapse" data-bs-parent="#menu">
                    <div class="accordion-body">
                        <ul class="dropdown">
                            <li><a class="dropdown-item" href="#">Portáteis Windows</a></li>
                            <li><a class="dropdown-item" href="#">Portáteis Apple</a></li>
                            <li><a class="dropdown-item" href="#">Todos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Som -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed tamanho-user" type="button" data-bs-toggle="collapse"
                        data-bs-target="#Som" aria-expanded="false" aria-controls="Som">
                        <img src="imgs/icons/SomSemCirculo.png" width="35px" class="pd-5"> Som
                    </button>
                </h2>
                <div id="Som" class="accordion-collapse collapse" data-bs-parent="#menu">
                    <div class="accordion-body">
                        <ul class="dropdown">
                            <li><a class="dropdown-item" href="#">Monitores</a></li>
                            <li><a class="dropdown-item" href="#">Televisões</a></li>
                            <li><a class="dropdown-item" href="#">Todos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Imagem -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed tamanho-user" type="button" data-bs-toggle="collapse"
                        data-bs-target="#Imagem" aria-expanded="false" aria-controls="Imagem">
                        <img src="imgs/icons/MonitoresSemCiruclo.png" width="35px" class="pd-5"> Imagem
                    </button>
                </h2>
                <div id="Imagem" class="accordion-collapse collapse" data-bs-parent="#menu">
                    <div class="accordion-body">
                        <ul class="dropdown">
                            <li><a class="dropdown-item" href="#">Monitores</a></li>
                            <li><a class="dropdown-item" href="#">Televisões</a></li>
                            <li><a class="dropdown-item" href="#">Todos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Perifericos -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed tamanho-user" type="button" data-bs-toggle="collapse"
                        data-bs-target="#Perifericos" aria-expanded="false" aria-controls="Perifericos">
                        <img src="imgs/icons/PerifericosSemCirculo.png" width="35px" class="pd-5"> Periféricos
                    </button>
                </h2>
                <div id="Perifericos" class="accordion-collapse collapse" data-bs-parent="#menu">
                    <div class="accordion-body">
                        <ul class="dropdown">
                            <li><a class="dropdown-item" href="#">Portáteis Windows</a></li>
                            <li><a class="dropdown-item" href="#">Portáteis Apple</a></li>
                            <li><a class="dropdown-item" href="#">Todos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Cabos e Acessórios -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed tamanho-user" type="button" data-bs-toggle="collapse"
                        data-bs-target="#CabosAcessorios" aria-expanded="false" aria-controls="CabosAcessorios">
                        <img src="imgs/icons/CabosSemCirculo.png" width="35px" class="pd-5"> Cabos e Acessórios
                    </button>
                </h2>
                <div id="CabosAcessorios" class="accordion-collapse collapse" data-bs-parent="#menu">
                    <div class="accordion-body">
                        <ul class="dropdown">
                            <li><a class="dropdown-item" href="#">Portáteis Windows</a></li>
                            <li><a class="dropdown-item" href="#">Portáteis Apple</a></li>
                            <li><a class="dropdown-item" href="#">Todos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Consolas -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed tamanho-user" type="button" data-bs-toggle="collapse"
                        data-bs-target="#Consolas" aria-expanded="false" aria-controls="Consolas">
                        <img src="imgs/icons/ConsolasSemCirculo.png" width="35px" class="pd-5"> Consolas
                    </button>
                </h2>
                <div id="Consolas" class="accordion-collapse collapse" data-bs-parent="#menu">
                    <div class="accordion-body">
                        <ul class="dropdown">
                            <li><a class="dropdown-item" href="#">Portáteis Windows</a></li>
                            <li><a class="dropdown-item" href="#">Portáteis Apple</a></li>
                            <li><a class="dropdown-item" href="#">Todos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <div class="col-3 d-flex">
            <button class="btn mx-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-list-nested"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
            <a class="navbar-brand mx-3" href="/CyberTech">
                <img src="imgs/IconLogo2.png" alt="logo" height="45" alt="" />
            </a>
        </div>
        <!-- Pesquisa -->
        <div class="col-6">
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="input-group">
                    <input type="text" class="form-control input-lg" id="search-church" placeholder="Pesquisa">
                    <div class="input-group-btn">
                        <button type="submit" class="btn-pesquisa">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col d-flex justify-content-end">
            <!-- Botão Favoritos -->
            <li class="nav-item ">
                <a class="btn btn-carrinho" href="carrinho.php" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#E7F6F2"
                        class="bi bi-cart-fill icon" viewBox="0 0 16 16">
                        <path
                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                    </svg>
                </a>
            </li>
            <!-- Botão Carrinho -->
            <li class="nav-item ">
                <a class="btn btn-carrinho" href="carrinho.php" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#E7F6F2"
                        class="bi bi-cart-fill icon" viewBox="0 0 16 16">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                </a>
            </li>
            <!-- User -->
            <li class="nav-item dropdown">
                <a class="btn btn-carrinho tamanho-user" href="#" role="button" href="/CyberTech/login.php"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Ola,
                    <?php
                    if (isset($_SESSION['userEmail']) or (isset($_SESSION['userPasswd']))) {

                        $utilizador = $_SESSION['userEmail'];
                        $passwd = $_SESSION['userPasswd'];

                        $consultaUser = "SELECT * FROM utilizadores WHERE Email = '$utilizador' and Passwd = '$passwd' LIMIT 1";
                        $resultadoUser = $ligacao->query($consultaUser);


                        if ($resultadoUser->num_rows > 0) {
                            while ($row = $resultadoUser->fetch_assoc()) {
                                echo $row["Nome"];
                            }
                        }
                    }
                    ?>

                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/CyberTech/logout.php">Logout</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>

            </li>
        </div>
    </div>
</nav>