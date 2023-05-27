<?php require "../_helpers/index.php";
echo siteHeader("Adicionar Raça");
require("../_config/connection.php");

require("../dao/raca.php");
$racaDAO = new Raca();

$result = false;
$error = false;


if ($_POST) {
    try {
        $raca = $_POST["p_raca"];
        $rs = $racaDAO->insert($raca);

        if ($rs) {
            header('Location: index.php?message=raca inserida com sucesso!');
            die();
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}


?>

<body>



    <section class="container mt-5 mb-5">

        <?php if ($_POST && (!$result || $error)) : ?>
            <p>
                Erro ao salvar a nova raca.
                <?= $error ? $error : "Erro desconhecido." ?>
            </p>
        <?php endif; ?>

        <div class="row mb-3">
            <div class="col">
                <h1>Adicionar Raça</h1>
            </div>
        </div>

        <form action="" method="post">
            <div class="mb-3">
                <label for="p_nome" class="form-label">Raça</label>
                <input type="text" class="form-control" id="p_raca" name="p_raca" placeholder="raca de cachorro">
            </div>

            <a href="index.php" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </section>

    <?php require "../_partials/footer.php"; ?>