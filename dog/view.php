<?php require "../_helpers/index.php";
echo siteHeader("Ver dog");
require("../_config/connection.php");

require("../dao/dog.php");

$dogDAO = new Dog();

$dog = false;
$error = false;

if (!$_GET || !$_GET["id"]) {
    header('Location: index.php?message=Id da dog não informado!');
    die();
}

$iddog = $_GET["id"];

try {
    $dog = $dogDAO->getById($iddog);
} catch (Exception $e) {
    echo "Id: ".$iddog."<br>";
    $error = $e->getMessage();
}

if (!$dog || $error) {
    header('Location: index.php?message=Erro ao recuperar dados da dog!');
    die();
}


?>


    <section class="container mt-5 mb-5">
        <div class="row mb-3">
            <div class="col">
                <h1>Visualizar dog</h1>
            </div>
        </div>

        <div class="mb-3">
            <h3>raca</h3>
            <p><?= $dog["raca"] ?></p>
        </div>
        
        <div class="mb-3">
            <h3>porte</h3>
            <p><?= $dog["porte"] ?></p>
        </div>
        
        <div class="mb-3">
            <h3>nac</h3>
            <p><?= $dog["nac"] ?></p>
        </div>
        <a href="index.php" class="btn btn-primary">Voltar</a>
    </section>

<?php require "../_partials/footer.php"; ?>