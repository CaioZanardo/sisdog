<?php require "../_helpers/index.php";
echo siteHeader("Adicionar dog");
require("../_config/connection.php");
require("../dao/dog.php");
require("../dao/raca.php");

$dogDAO = new Dog();
$racaDAO = new Raca();

$result = false;
$error = false;
if ($_POST) {
    try {
        $idraca  = $_POST["p_idraca"];
        $porte = $_POST["p_porte"];
        $nac = $_POST["p_nac"];
        
        $result = $dogDAO->insert($idraca, $porte, $nac);
         if ($result) {
            header('Location: index.php?message=dog inserido com sucesso!');
            die();
        } 
    } catch (Exception $e) {
        $error = $e->getMessage();
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

    <?php if ($_POST && (!$result || $error)) : ?>
        <p>
            Erro ao salvar a dog.
            <?= $error ? $error : "Erro desconhecido." ?>
        </p>
    <?php endif; ?>

    <div class="row mb-3">
        <div class="col">
            <h1>Adicionar dog</h1>
        </div>
    </div>

    <form action="" method="post">
        <div class="row">

            <div class="mb-3">
                <label for="p_idraca" class="form-label">Selecione a raca da dog</label>
                <select class="form-select" id="p_idraca" name="p_idraca" required>
                    <option value="">-- Selecione um --</option>

                    <?php foreach ($racas as $raca) : ?>
                        <option value="<?= $raca->id ?>">
                            <?= $raca->raca ?>
                        </option>
                    <?php endforeach; ?>

                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <label for="p_porte" class="form-label">porte</label>
                <input type="text" class="form-control" id="p_porte" name="p_porte" />
            </div>
            <div class="col-9">
                <label for="p_nac" class="form-label">nac</label>
                <input type="text" class="form-control" id="p_nac" name="p_nac" />
            </div>
        </div>
        
        
        <div class="row">
            <div class="col">
                <a href="index.php" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>

    </form>
</section>

<?php require "../_partials/footer.php"; ?>