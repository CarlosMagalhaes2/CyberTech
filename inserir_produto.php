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
    $Categoria = $_POST['Categoria'];
    $Stock = $_POST['Stock'];
    $ResumoCategorias = $_POST['ResumoCategorias'];
    $Desconto = $_POST['Desconto'];
    $ValorDesconto = $_POST['ValorDesconto'];
    $Destaque = $_POST['Destaque'];
    $Descricao = $_POST['Descricao'];

    $inserir = "INSERT INTO produtos SET Nome='$Nome', Fabricante='$Fabricante', Preco='$Preco', 
Categoria='$Categoria', Stock='$Stock', ResumoCategorias='$ResumoCategorias', Desconto='$Desconto', 
ValorDesconto='$ValorDesconto', Destaque='$Destaque', Descricao='$Descricao', ImagemPrincipal='$ImagemPrincipal'";

if($ligacao->query($inserir)===TRUE){
    header("Location: admin.php");
    die();
}else{
    echo "Erro: " . $inserir . "<br>" , $ligacao->$error;
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

    <script src="tinymce/tinymce.min.js"></script>
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
        <div class="row">


            <span class="texto-destaques ml-5"><img src="imgs/barra.webp" height="30px" class="barra"> Inserir Produto</span>

            <div class="container text-white mb-5 mt-5">
                <div class="row">
                    <div class="col-12 mb-5">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="form-group">

                                <label>Nome</label>
                                <input type="text" class="form-control mb-4" name="Nome" value="">

                                <label>Fabricante</label>
                                <input type="text" class="form-control mb-4" name="Fabricante" value="">

                                <label>Preco</label>
                                <input type="text" class="form-control mb-4" name="Preco" value="">

                                <label>Categoria</label>
                                <input type="text" class="form-control mb-4" name="Categoria" value="">

                                <label>Stock</label>
                                <input type="text" class="form-control mb-4" name="Stock" value="">

                                <label>Resumo das Carateristicas</label>
                                <textarea class="form-control  mb-4" rows="2" name="ResumoCategorias"> </textarea>

                                <label>Desconto <i>[0 Não || 1 Sim]</i></label>
                                <input type="text" class="form-control mb-4" name="Desconto" value="">

                                <label>Valor do Desconto</label>
                                <input class="form-control  mb-4" name="ValorDesconto" value="">

                                <label>Destaque <i>[0 Não || 1 Sim]</i></label>
                                <input type="text" class="form-control mb-4" name="Destaque" value="">

                                <label>Descrição</label>
                                <textarea class="form-control  mb-4" rows="20" id="Descricao" name="Descricao"></textarea>


                                <div class="form-group">
                                    <label>Imagem Principal</label>
                                    <P>
                                        <input type="file" name="uploadfile">
                                </div>

                                <button type="reset" class="btn btn-primary">Cancelar</button>
                                <button type="submit" class="btn btn-primary" name="submitform">Gravar</button>
                            </div>


                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>