<?php require "../_helpers/index.php";
echo siteHeader("Editar Raça");
require("../_config/connection.php");
require("../dao/raca.php");
$racaDAO = new Raca();

$raca = false;
$error = false;

if (!$_GET || !isset($_GET["id"])) {
    header('Location: index.php?message=Id da raça não informado!');
    die();
}

$idraca = $_GET["id"];
$raca = $racaDAO->getById($idraca);

if (!$raca || $error) {
    header('Location: index.php?message=Erro ao recuperar dados da raça!');
    die();
}

$updateError = false;
$rs = false;
if ($_POST) {
    try {
        $raca = $_POST["p_raca"];        
        $rs = $racaDAO->update($idraca, $raca);
        
        if ($rs) {
            header('Location: index.php?message=Raça atualizada com sucesso!');
            die();
        }
    } catch (Exception $e) {
        $updateError = $e->getMessage();
    }
}

?>

<body>



    <section class="container mt-5 mb-5">

        <?php if ($_POST && (!$rs || $upadeError)) : ?>
            <p>
                Erro ao alterar o raça.
                <?= $error ? $error : "Erro desconhecido." ?>
            </p>
        <?php endif; ?>

        <div class="row mb-3">
            <div class="col">
                <h1>Editar raça</h1>
            </div>
        </div>

        <form action="" method="post">

            <div class="mb-3">
                <label for="p_nome" class="form-label">raca</label>
                <input type="text" class="form-control" id="p_raca" name="p_raca" placeholder="raca de cachorro" value="<?= $raca["raca"] ?>">
            </div>

            <a href="index.php" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-success">Salvar</button>

        </form>
    </section>

    <?php require "../_partials/footer.php"; ?>