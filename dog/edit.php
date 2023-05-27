<?php require "../_helpers/index.php";
echo siteHeader("Editar dog");
require("../_config/connection.php");

require("../dao/dog.php");
require("../dao/raca.php");
$dogDAO = new Dog();
$racaDAO = new Raca();

$dog = false;
$error = false;

if (!$_GET || !isset($_GET["id"])) {
    header('Location: index.php?message=Id da dog não informado!');
    die();
}

$idDog = $_GET["id"];

try {
    $dog = $dogDAO->getById($idDog);
} catch (Exception $e) {
    $error = $e->getMessage();
}

if (!$dog || $error) {
    header('Location: index.php?message=Erro ao recuperar dados da dog!');
    die();
}

$upadeError = false;
$updateResult = false;
if ($_POST) {
    try {
        $idraca  = $_POST["p_idraca"];
        $porte = $_POST["p_porte"];
        $nac = $_POST["p_nac"];
        
        $rs = $dogDAO->update($idDog, $idraca, $porte, $nac);
        
        if ($rs) {
            header('Location: index.php?message=dog alterada com sucesso!');
            die();
        }
    } catch (Exception $e) {
        $upadeError = $e->getMessage();
    }
}
try {
    $racas = $racaDAO->getAll();
} catch (Exception $e) {
    header('Location: index.php?message=Erro ao recuperar racas!');
    die();
}

?>


<section class="container mt-5 mb-5">

    <?php if ($_POST && (!$rs || $upadeError)) : ?>
        <p>
            Erro ao alterar o cachorro.
            <?= $error ? $error : "Erro desconhecido." ?>
        </p>
    <?php endif; ?>

    <div class="row mb-3">
        <div class="col">
            <h1>Editar dog</h1>
        </div>
    </div>

    <form action="" method="post">
    <div class="row">

        <div class="mb-3">
            <label for="p_idraca" class="form-label">Selecione a raça do dog</label>
            <select class="form-select" id="p_idraca" name="p_idraca" required>
                <option value="">-- Selecione um --</option>

                <?php foreach ($racas as $raca) : ?>
                    <option value="<?= $raca->id ?>" <?= $raca->id == $dog["idraca"] ? "selected" : "" ?> >
                        <?= $raca->raca ?>
                </option>

                <?php endforeach; ?>

            </select>
        </div>        
        
        <div class="row mb-3">
            <div class="col-3">
                <label for="p_porte" class="form-label">Porte</label>
                <input type="text" class="form-control" id="p_porte" name="p_porte" value="<?= $dog["porte"] ?>" />
            </div>
            <div class="col-9">
                <label for="p_nac" class="form-label">Nac</label>
                <input type="text" class="form-control" id="p_nac" name="p_nac" value="<?= $dog["nac"] ?>"/>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="index.php" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-success">Atualizar</button>
            </div>
        </div>

    </form>
</section>

<?php require "../_partials/footer.php"; ?>