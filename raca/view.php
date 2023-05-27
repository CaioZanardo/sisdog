<?php require "../_helpers/index.php";
echo siteHeader("Ver Raça");
require("../_config/connection.php");
require("../dao/raca.php");

$racaDAO = new Raca();
$product = false;
$error = false;

if (!$_GET || !isset($_GET["id"])) {
    header('Location: index.php?message=Id da raca não informado!');
    die();
}

$idraca = $_GET["id"];

try {
    $raca = $racaDAO->getById($idraca);
} catch (Exception $e) {
    $error = $e->getMessage();
}

 if (!$raca || $error) {
    header('Location: index.php?message=Erro ao recuperar dados da Raça!');
    die();
} 


?>

    <section class="container mt-5 mb-5">
        <div class="row mb-3">
            <div class="col">
                <h1>Visualizar raças</h1>
            </div>
        </div>

        <div class="mb-3">
            <h3>raca</h3>
            <p><?= $raca["raca"] ?></p>
        </div>
 
        <a href="index.php" class="btn btn-primary">Voltar</a>
       
    </section>
<?php require "../_partials/footer.php"; ?>