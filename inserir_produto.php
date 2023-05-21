<?php include_once("ligacao.php");
session_start();

if (!isset($_SESSION['userEmail']) or (!isset($_SESSION['userPasswd']))) {
    header("Location: login.php");
}

if (isset($_POST['submitform'])) {
    $pasta = "imgs/produtos/";
    $ImagemPrincipal = $_FILES['uploadfile']['name'];
    $temp_name = $_FILES['uploadfile']['tmp_name'];

    if ($ImagemPrincipal != "") {
        if (file_exists($pasta . $ImagemPrincipal)) {
            $ImagemPrincipal = time() . '_' . $ImagemPrincipal;
        }
        $fpasta = $pasta . $ImagemPrincipal;
        move_uploaded_file($temp_name, $fpasta);
    }

    $ID = $_POST['ID'];
    $Nome = $_POST['Nome'];
    $Fabricante = $_POST['Fabricante'];
    $Preco = $_POST['Preco'];
    $Stock = $_POST['Stock'];
    $Desconto = $_POST['Desconto'];
    $ValorDesconto = $_POST['ValorDesconto'];
    $Destaque = $_POST['Destaque'];
    $Descricao = $_POST['Descricao'];

    $inserir = "INSERT INTO produtos SET Nome='$Nome', Fabricante='$Fabricante', Preco='$Preco', Stock='$Stock', Desconto='$Desconto', 
ValorDesconto='$ValorDesconto', Destaque='$Destaque', Descricao='$Descricao', ImagemPrincipal='$ImagemPrincipal'";

    if ($ligacao->query($inserir) === TRUE) {
        header("Location: admin.php");
        die();
    } else {
        echo "Erro: " . $inserir . "<br>", $ligacao->$error;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <link rel="shortcut icon" href="imgs/faviconLogo.ico" />

    <script src="tinymce/tinymce.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        tinymce.init({
            selector: '#Descricao',
            language: 'pt_BR',
            menubar: false,
            branding: false,
            toolbar: 'undo redo | bold italic underline strikethrough | fontsize | ltr rtl',
            toolbar_sticky: true,

        });
    </script>
</head>

<body>
    <?php include 'header_admin.php'; ?>

    <?php


    ?>
    <div class="container mt-5 mb-5">
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="row">

                <div class="container bg-azul my-3 mr-1">
                    <div class="row">

                        <div class="col-6 my-3 text-center">
                            <div id="preview"></div>
                            <label>Profile Photo</label>
                            <br>
                            <input type="file" name="ImagemPrincipal" id="ImagemPrincipal" onchange="previewImagem(this)"
                                accept="image/*">

                            <script>
                                function previewImagem(input1) {
                                    $('.PreviewImg').remove();
                                    if (input1.files && input1.files[0]) {
                                        $(input1.files).each(function () {
                                            var reader = new FileReader();
                                            reader.readAsDataURL(this);
                                            reader.onload = function (e) {
                                                $("#preview").append("<img class='PreviewImg caixa-index border_10px' src='" + e.target.result + "' style='width: 90%; margin-bottom: 15px'>");
                                            }
                                        });
                                    }
                                }
                            </script>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <label>Nome</label>
                                    <input type="text" class="form-nome mb-2" name="Nome" value="Nome ...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label class="label">Preço</label>
                                    <input type="number" min="1" step="any" class="form-preco mb-4" name="Preco"
                                        value="">
                                </div>
                                <div class="col-3">
                                    <fieldset id="desconto">
                                        <p style="margin:0">Em desconto?</p>
                                        <input type="radio" id="html" name="Desconto" value="1" required>
                                        <label for="html">Sim</label><br>
                                        <input type="radio" id="css" name="Desconto" value="0">
                                        <label for="css">Não</label><br>
                                    </fieldset>
                                </div>
                                <div class="col-3">
                                    <label class="label">Valor do Desconto</label>
                                    <input type="number" min="0" step="any" class="form-desconto mb-4"
                                        name="ValorDesconto" value="">
                                </div>
                                <div class="col-3">
                                    <fieldset id="Destaque">
                                        <p style="margin:0">Destacar?</p>
                                        <input type="radio" id="html" name="Destaque" value="1" required>
                                        <label for="html">Sim</label><br>
                                        <input type="radio" id="css" name="Destaque" value="0">
                                        <label for="css">Não</label><br>
                                    </fieldset>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label class="label">Stock</label>
                                    <input type="number" min="0" class="form-resto" name="Stock" value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 my-3">
                                    <label>Fabricante</label>
                                    <input type="text" class="form-resto" name="Fabricante" value="Fabricante ...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label>Categoria</label>
                                    <div class="select">
                                        <select id="Categoria">
                                            <option selected>Categoria ...</option>
                                            <option value="Portáteis">Portáteis</option>
                                            <option value="Desktops">Desktops</option>
                                            <option value="Componentes">Componentes</option>
                                            <option value="Smartphones">Smartphones</option>
                                            <option value="Som">Som</option>
                                            <option value="Imagem">Imagem</option>
                                            <option value="Periféricos">Periféricos</option>
                                            <option value="CabosAcessórios">Cabos e Acessórios</option>
                                            <option value="Consolas">Consolas</option>
                                        </select>
                                        <div class="select_arrow">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label>Subcategoria</label>
                                    <div class="select">
                                        <select id="SubCategoria">
                                            <option selected>Subcategoria ...</option>
                                            <optgroup label="Portáteis">
                                                <option value="Portáteis">Portáteis Windows</option>
                                                <option value="Desktops">Portáteis Apple</option>
                                            </optgroup>
                                            <optgroup label="Desktops">
                                                <option value="Desktops Gaming">Desktops Gaming</option>
                                                <option value="Workstations">Workstations</option>
                                                <option value="All-in-One">All-in-One</option>
                                            </optgroup>
                                            <optgroup label="Desktops">
                                                <option value="Desktops Gaming">Desktops Gaming</option>
                                                <option value="Workstations">Workstations</option>
                                                <option value="All-in-One">All-in-One</option>
                                            </optgroup>
                                        </select>
                                        <div class="select_arrow">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="accordion-carateristicas" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                <p class="bold" style="margin-bottom:3px;">Carateristicas</p>
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <!-----------------------------------------ACCORDION BODY ---------------------------------->
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="col-12 mt-2">
                                                        <label>Processador</label>
                                                        <input type="text" class="form-resto" name="Processador"
                                                            value="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mt-2">
                                                        <label>Memoria RAM</label>
                                                        <input type="text" class="form-resto" name="MemoriaRAM"
                                                            value="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mt-2">
                                                        <label>Placa Grafica</label>
                                                        <input type="text" class="form-resto" name="PlacaGrafica"
                                                            value="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mt-2">
                                                        <label>Placa Grafica Integrada</label>
                                                        <input type="text" class="form-resto" name="PlacaGrafica2"
                                                            value="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mt-2">
                                                        <label>Armazenamento</label>
                                                        <input type="text" class="form-resto" name="Armazenamento"
                                                            value="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mt-2">
                                                        <label>Tipo de Armazenamento</label>
                                                        <input type="text" class="form-resto" name="TipoArmazenamento"
                                                            value="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mt-2">
                                                        <label>Resolucao</label>
                                                        <input type="text" class="form-resto" name="Resolucao" value="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mt-2">
                                                        <label>Tamanho do Ecra</label>
                                                        <input type="text" class="form-resto" name="TamanhoEcra"
                                                            value="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mt-2">
                                                        <label>Sistema Operativo</label>
                                                        <input type="text" class="form-resto" name="SistemaOperativo"
                                                            value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>

                </div>

                <div class="container bg-azul">
                    <div class="row">
                        <p class="bold texto-descricao font-22">Descrição</p>
                    </div>
                    <p>
                        <textarea class="form-control  mb-4" rows="20" id="Descricao" name="Descricao"></textarea>
                    </p>

                    <div class="row">
                        <div class="col-10"></div>
                        <div class="col"><button type="reset" class="btn btn-primary">Cancelar</button></div>
                        <div class="col"><button type="submit" class="btn btn-primary">Gravar</button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php include 'footer.php'; ?>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
</body>

</html>